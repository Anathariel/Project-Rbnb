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

            $user = new User([
                'firstName' => $firstName,
                'lastName' => $lastName,
                'password' => $password,
                'email' => $email
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

        // Préparez les données à envoyer à la vue
        $data = [
            'firstName' => $firstName,
            'email' => $email,
            'userProperties' => $userProperties,
            'userFavorites' => $userFavorites,
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

            echo self::getRender('dashboard-options.html.twig', ['user' => $user]); //info: user est un objet

        } else {
            // Récupérer les information du  formulaire
            $uid = $_SESSION['uid'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmation = $_POST['confirmation'];
            // condition pour verfier le mot de passe
            if ($password != $confirmation) {
                $message = 'Mot de passe incorrecte';
                echo self::getrender('dashboard-options.html.twig', ['message' => $message]);
            } else {

                if (isset($_POST['submit'])) {

                    $userModel = new UserModel();
                    $user = $userModel->getUserById($uid);
                    $user->setUid($uid);
                    $user->setFirstName($firstName);
                    $user->setLastName($lastName);
                    $user->setEmail($email);
                    $user->setPassword($password);
                    $userModel->editUser($user);
                    echo self::getRender('dashboard-options.html.twig', ['user' => $user]);
                    exit();
                }
            }
        }
    }
}
