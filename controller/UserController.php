<?php
class UserController extends Controller
{
    public function register()
    {
        global $router;
        $model = new UserModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $rawPass = $_POST['password'];
            $password = password_hash($rawPass, PASSWORD_DEFAULT);
            $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
            $registrationDate =
                $user = new User([
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'password' => $password,
                    'email' => $email,

                ]);

            $model->createUser($user);
            header('Location: ' . $router->generate('register'));
        } else {
            echo self::getRender('register.html.twig', []);
        }
    }
    public function login()
    {
        if (!$_POST) {
            echo self::getRender('login.html.twig', []);
        } else {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $model = new UserModel();
            $user = $model->getUserByEmail($email);

            if ($user) {
                if (password_verify($password, $user->getPassword())) {
                    $_SESSION['uid'] = $user->getUid();
                    $_SESSION['email'] = $user->getEmail();
                    $_SESSION['connect'] = true;
                    $_SESSION['firstName'] = $user->getFirstName();
                    global $router;
                    header('Location: ' . $router->generate('dashboard'));
                    exit();
                } else {
                    $message = "Email / mot de passe incorrect!";
                    echo self::getRender('login.html.twig', ['message' => $message]);
                }
            } else {
                $message = "Email / mot de passe incorrect!";
                echo self::getRender('register.html.twig', ['message' => $message]);
            }
        }
    }

    public function logout()
    {
        session_destroy();

        global $router;
        header('Location: ' . $router->generate('home'));
        exit();
    }

    public function dashboard()
    {
        // Vérifiez si l'utilisateur est connecté
        if (!isset($_SESSION['connect']) || $_SESSION['connect'] !== true) {
            // Redirigez l'utilisateur vers la page de connexion si nécessaire
            global $router;
            header('Location: ' . $router->generate('login'));
            exit();
        }

        // Récupérez le prénom de l'utilisateur à partir de la base de données
        $userId = $_SESSION['uid'];

        $userModel = new UserModel();
        $user = $userModel->getUserById($userId);
        $firstName = $user->getFirstName();
        $email = $user->getEmail();

        // Récupérez les propriétés de l'utilisateur à partir de la base de données
        $propertyModel = new PropertyModel();
        $userProperties = $propertyModel->getUserProperties($userId);

        // Récupérez les favoris de l'utilisateur à partir de la base de données
        $favoriteModel = new FavoriteModel();
        $userFavorites = $favoriteModel->getFavoriteByUidModel($userId);

        // Récupérez les moyennes des commentaires des propriétés favorites à partir de la base de données
        $commentModel = new CommentModel();
        foreach ($userFavorites as $favorite) {
            $propertyId = $favorite->getPropertyId();
            $averageRating = $commentModel->getAverageRating($propertyId);
            $favorite->getProperty()->setAverageRating($averageRating);
        }

        // Récupérez les réservations de l'utilisateur à partir de la base de données
        $reservationModel = new ReservationModel();
        $userReservations = $reservationModel->getReservationModel($userId);

        // Récupérez les réservations de l'utilisateur à partir de la base de données
        $reservationModel = new ReservationModel();
        $userReservations = $reservationModel->getReservationModel($userId);

        // Récupérez les moyennes des commentaires des propriétés réservées à partir de la base de données
        $commentModel = new CommentModel();
        foreach ($userReservations as $reservation) {
            $propertyId = $reservation->getPropertyId();
            $averageRating = $commentModel->getAverageRating($propertyId);
            $reservation->getProperty()->setAverageRating($averageRating);
        }

        // Récupérez la note moyenne de l'utilisateur à partir de la base de données
        $commentModel = new CommentModel();

        // Récupérez les propriétés louées par l'utilisateur (propriétaire)
        $userRentedProperties = [];

        foreach ($userProperties as $property) {
            $propertyId = $property->getPropertyId();
            $reservations = $reservationModel->getReservationsByProperty($propertyId);

            // Si la propriété a des réservations, ajoutez-la à la liste des propriétés louées par l'utilisateur
            if (!empty($reservations)) {
                $userRentedProperties[] = $property;
            }

            // Récupérez la moyenne des notes pour cette propriété
            $averageRating = $commentModel->getAverageRating($propertyId);

            // Ajoutez la moyenne des notes à la propriété actuelle
            $property->setAverageRating($averageRating);
        }


        // Récupérez les images liées à chaque propriété du propriétaire
        $propertyImagesModel = new PropertyImagesModel();
        foreach ($userProperties as $property) {
            $propertyId = $property->getPropertyId();
            $propertyImages = $propertyImagesModel->getPropertyImagesModel($propertyId);
            $property->setPropertyImages($propertyImages);
        }

        // Récupérez les images liées à chaque propriété favorite
        $propertyImagesModel = new PropertyImagesModel();
        foreach ($userFavorites as $favorite) {
            $propertyId = $favorite->getPropertyId();
            $propertyImages = $propertyImagesModel->getPropertyImagesModel($propertyId);
            $favorite->getProperty()->setPropertyImages($propertyImages);
        }

        // Récupérez les images liées à chaque propriété réservée
        $propertyImagesModel = new PropertyImagesModel();
        foreach ($userReservations as $reservation) {
            $propertyId = $reservation->getPropertyId();
            $propertyImages = $propertyImagesModel->getPropertyImagesModel($propertyId);

            // Check if the property is set before calling setPropertyImages()
            if ($reservation->getProperty()) {
                $reservation->getProperty()->setPropertyImages($propertyImages);
            }
        }

        // Préparez les données à envoyer à la vue
        $data = [
            'firstName' => $firstName,
            'email' => $email,
            'userProperties' => $userProperties,
            'userFavorites' => $userFavorites,
            'userReservations' => $userReservations,
            'userRentedProperties' => $userRentedProperties,
            'averageRating' => $averageRating
        ];

        // Affichez la vue avec les données
        echo self::getRender('dashboard.html.twig', $data);
    }

    public function editPropertySession()
    {
        // Vérifiez si l'utilisateur est connecté
        if (!isset($_SESSION['connect']) || $_SESSION['connect'] !== true) {
            // Redirigez l'utilisateur vers la page de connexion si nécessaire
            global $router;
            header('Location: ' . $router->generate('login'));
            exit();
        }

        // Récupérez le prénom de l'utilisateur à partir de la base de données
        $userId = $_SESSION['uid'];
        $userModel = new UserModel();
        $user = $userModel->getUserById($userId);
        $firstName = $user->getFirstName();
        $email = $user->getEmail();

        // Récupérez les propriétés de l'utilisateur à partir de la base de données
        $data = [
            'firstName' => $firstName,
            'email' => $email,

        ];
        echo self::getRender('dashboard.html.twig', $data);
    }

    public function editUser()
    {
        if (!$_POST) {
            $uid = $_SESSION['uid'];
            //Récupérer les infos du user dans BDD
            $userModel = new UserModel();
            $user = $userModel->getUserById($uid);

            echo self::getRender('dashboard-options.html.twig', []); //info: user est un objet
        } else {
            // Récupérer les information du  formulaire
            $uid = $_SESSION['uid'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $birthDate = $_POST['birthDate'];
            $phoneNumber = $_POST['phoneNumber'];
            // $picture = $_FILES['picture'];
            $pictureName = $_FILES['picture']['name'];
            $password = $_POST['password'];
            $confirmation = $_POST['confirmation'];
            // var_dump($_POST);
            // var_dump($_FILES);
            // condition pour verfier le mot de passe
            if ($password != $confirmation) {
                $message = 'Mot de passe incorrecte';
                echo self::getrender('dashboard-options.html.twig', ['message' => $message]);
            } else {

                if (isset($_POST['submit']) && $_FILES['picture']) {

                    //explode: la premier valeur c'est le séparteur et le deuxieme après la point 
                    $tabExtension = explode('.', $_FILES['picture']['name']);
                    //Tableau des extensions que l'on accepte
                    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
                    $extension = strtolower(end($tabExtension));

                    if (in_array($extension, $extensions)) {
                        $userModel = new UserModel();
                        $user = $userModel->getUserById($uid);
                        $user->setUid($uid);
                        $user->setEmail($email);
                        $user->setPhoneNumber($phoneNumber);
                        $user->setPicture($pictureName);

                        $querryResult = $userModel->editUser($user);

                        if ($querryResult) {
                            $uploadDir = 'asset/media/profils/';
                            $uploadFile = $uploadDir . $_FILES['picture']['name'];



                            // Déplacer le fichier temporaire vers le dossier final
                            $controleUpload = move_uploaded_file($_FILES['picture']['tmp_name'], $uploadFile);
                            echo self::getRender('dashboard-options.html.twig', ['user' => $user]);
                            exit();
                            if (!$controleUpload) {
                                $message = "Une erreur est survenue lors du téléchargement de l'image. Veuillez réessayer.";
                                echo self::getRender('dashboard-option.html.twig', ['message' => $message]);
                            }
                        }
                    } else {
                        $message = "Cette extension n'est pas autorisée.";
                        echo self::getRender('dashboard-options.html.twig', ['message' => $message]);
                    }
                }
            }
        }
    }

    public function delete()
    {
        $uid = $_SESSION['uid'];
        // Vérifie si la méthode de la requête HTTP est POST et si le paramètre "_method" est défini à "DELETE"
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Crée un nouvel objet 
            $user = new UserModel();
            //appelle ta fonction
            $user->delete($uid);
            session_destroy();
            //réinitialiser la session
            $_SESSION = [];
            echo self::getRender('homepage.html.twig', []);
            exit();
        }
    }
}
