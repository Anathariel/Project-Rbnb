<?php
class UserController extends Controller {
    public function register(){
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

    public function login(){
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
                    

                global $router;
                header('Location: ' . $router->generate('home'));
                exit();
                } else {
                    echo 'ERREUR MOT PASSE OU EMAIL';
                }
            } else {
                $message = "Email / password incorrect !";
                echo self::getRender('register.html.twig', ['message' => $message]);
            }
        }
    }

    public function logout(){
        session_start();
        session_destroy();

        global $router;
        header('Location: ' . $router->generate('home'));
        exit();
    }
}