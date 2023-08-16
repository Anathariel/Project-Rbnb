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

    public function editUser()
    {   
        global $router;
        if (!$_POST) {
            echo self::getRender('dashboard-options.html.twig', []);
        } else {
            $uid = $_SESSION['uid'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $birthDate = $_POST['birthDate'];
            $phoneNumber = $_POST['phoneNumber'];

            $hasPicture = isset($_FILES['picture']) && $_FILES['picture']['error'] == 0;
            $pictureName = $hasPicture ? $_FILES['picture']['name'] : null;

            if (isset($_POST['submit'])) {
                $isValidPicture = false;

                if ($hasPicture) {
                    $tabExtension = explode('.', $_FILES['picture']['name']);
                    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
                    $extension = strtolower(end($tabExtension));
                    $isValidPicture = in_array($extension, $extensions);
                }

                if ($hasPicture && !$isValidPicture) {
                    $message = "Cette extension n'est pas autorisée.";
                    echo self::getRender('dashboard-options.html.twig', ['message' => $message]);
                } else {
                    $userModel = new UserModel();
                    $user = $userModel->getUserById($uid);
                    $user->setFirstName($firstName);
                    $user->setLastName($lastName);
                    $user->setUid($uid);
                    $user->setFirstName($firstName);
                    $user->setLastName($lastName);
                    $user->setEmail($email);
                    $user->setPhoneNumber($phoneNumber);
                    $user->setBirthDate($birthDate);

                    if ($hasPicture) {
                        $user->setPicture($pictureName);
                    }

                    $querryResult = $userModel->editUser($user);

                    if ($querryResult && $hasPicture) {
                        $uploadDir = 'asset/media/profils/';
                        $uploadFile = $uploadDir . $_FILES['picture']['name'];
                        $controleUpload = move_uploaded_file($_FILES['picture']['tmp_name'], $uploadFile);

                        if (!$controleUpload) {
                            $message = "Une erreur est survenue lors du téléchargement de l'image. Veuillez réessayer.";
                            echo self::getRender('dashboard-options.html.twig', ['message' => $message]);
                        }
                    }
                    $_SESSION['flash_message'] = "Modification réussie";
                    header('Location: ' . $router->generate('dashboard'));
                    // echo self::getRender('dashboard-options.html.twig', ['message' => $message]);
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
