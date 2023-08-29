<?php
class UserController extends Controller
{
    public function register()
    {
        global $router; // On importe la variable $router définie ailleurs dans le code (probablement pour la gestion des routes)

        $model = new UserModel(); // Instanciation du modèle utilisateur

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Si la requête est de type POST, cela signifie qu'un formulaire a été soumis

            // Récupération des données du formulaire
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $rawPass = $_POST['password'];

            // Hachage du mot de passe à l'aide de la fonction password_hash
            $password = password_hash($rawPass, PASSWORD_DEFAULT);

            // Validation et nettoyage de l'adresse e-mail à l'aide de filter_var
            $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);

            // Création d'un nouvel objet User avec les données du formulaire
            $user = new User([
                'firstName' => $firstName,
                'lastName' => $lastName,
                'password' => $password,
                'email' => $email,
            ]);

            // Appel de la méthode createUser() du modèle pour créer un nouvel utilisateur dans la base de données
            $model->createUser($user);

            // Redirection vers la page d'inscription après avoir créé l'utilisateur
            header('Location: ' . $router->generate('register'));
        } else {
            // Si la requête n'est pas de type POST, afficher le formulaire d'inscription
            echo self::getRender('register.html.twig', []);
        }
    }

    public function login()
    {
        if (!$_POST) {
            echo self::getRender('register.html.twig', []);
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
                    echo self::getRender('register.html.twig', ['message' => $message]);
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
    //CRUD USER

    public function editUser()
    {
        global $router; // On importe la variable $router définie ailleurs dans le code (probablement pour la gestion des routes)

        if (!$_POST) {
            // Si aucune donnée POST n'est reçue, afficher le formulaire de modification
            echo self::getRender('dashboard-options.html.twig', []);
        } else {
            // Si des données POST sont reçues, procéder à la mise à jour de l'utilisateur

            // Récupération des données POST
            $uid = $_SESSION['uid'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $birthDate = $_POST['birthDate'];
            $phoneNumber = $_POST['phoneNumber'];

            // Vérification si une image a été envoyée
            $hasPicture = isset($_FILES['picture']) && $_FILES['picture']['error'] == 0;
            $pictureName = $hasPicture ? $_FILES['picture']['name'] : null;

            if (isset($_POST['submit'])) {
                $isValidPicture = false;

                if ($hasPicture) {
                    // Sépare le nom du fichier en segments en utilisant le point comme séparateur
                    $tabExtension = explode('.', $_FILES['picture']['name']);

                    // Liste des extensions de fichiers image autorisées
                    $extensions = ['jpg', 'png', 'jpeg', 'gif'];

                    // Récupère la dernière partie du tableau d'extensions, qui devrait être l'extension du fichier
                    $extension = strtolower(end($tabExtension));

                    // Vérifie si l'extension extraite du nom de fichier est dans la liste des extensions autorisées
                    $isValidPicture = in_array($extension, $extensions);
                }

                if ($hasPicture && !$isValidPicture) {
                    // Si l'extension de l'image n'est pas autorisée, afficher un message d'erreur
                    $message = "Cette extension n'est pas autorisée.";
                    echo self::getRender('dashboard-options.html.twig', ['message' => $message]);
                } else {
                    // Instanciation du modèle utilisateur
                    $userModel = new UserModel();
                    $user = $userModel->getUserById($uid);

                    // Mise à jour des informations de l'utilisateur
                    $user->setFirstName($firstName);
                    $user->setLastName($lastName);
                    $user->setEmail($email);
                    $user->setPhoneNumber($phoneNumber);
                    $user->setBirthDate($birthDate);

                    if ($hasPicture) {
                        // Si une nouvelle image est fournie, mettre à jour le nom de l'image dans les données utilisateur
                        $user->setPicture($pictureName);
                    }

                    // Appel de la méthode editUser() du modèle pour effectuer la mise à jour dans la base de données
                    $querryResult = $userModel->editUser($user);

                    if ($querryResult && $hasPicture) {
                        // Si la mise à jour a réussi et qu'une image a été fournie, tenter de télécharger l'image
                        $uploadDir = 'asset/media/profils/';
                        $uploadFile = $uploadDir . $_FILES['picture']['name'];
                        $controleUpload = move_uploaded_file($_FILES['picture']['tmp_name'], $uploadFile);

                        if (!$controleUpload) {
                            // Si le téléchargement de l'image échoue, afficher un message d'erreur
                            $message = "Une erreur est survenue lors du téléchargement de l'image. Veuillez réessayer.";
                            echo self::getRender('dashboard-options.html.twig', ['message' => $message]);
                        }
                    }

                    // Une fois la mise à jour réussie, rediriger l'utilisateur vers le tableau de bord
                    $_SESSION['flash_message'] = "Modification réussie";
                    header('Location: ' . $router->generate('dashboard'));
                }
            }
        }
    }


    // Récupérer le fichier photo
    public function delete()
    {
        global $router;
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
            header('Location: ' . $router->generate('home'));
            exit();
        }
    }
}




           