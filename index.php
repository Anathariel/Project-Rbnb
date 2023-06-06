<?php
session_start();
require_once './vendor/altorouter/altorouter/AltoRouter.php';
require_once './vendor/autoload.php';

$router = new AltoRouter();
$router->setBasePath('/projet/project-rbnb');

// Si le router vous pose problèmes ou semble trop confus, n'hésitez pas à allez lire le fichier index.php dans l'exemple dans le vendor/altorouter
// ROUTES 
$router->map('GET','/', 'HomeController#home', 'home');

// Register
$router->map('GET|POST','/registration', 'UserController#register', 'register');

// Log-in/out form route
$router->map('GET|POST','/login', 'UserController#login', 'login');
$router->map('GET','/logout', 'UserController#logout', 'logout');



// MATCH :
$match = $router->match();
var_dump($match);

if (is_array($match)) {
    list($controller, $action) = explode('#', $match['target']);
    $obj = new $controller();


    if (is_callable(array($obj, $action))) {
        call_user_func_array(array($obj, $action), $match['params']);
    }
}