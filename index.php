<?php
session_start();
require_once './vendor/altorouter/altorouter/AltoRouter.php';
require_once './vendor/autoload.php';

$router = new AltoRouter();
$router->setBasePath('/AltoRouter/project-airbnb');

// Si le router vous pose problèmes ou semble trop confus, n'hésitez pas à allez lire le fichier index.php dans l'exemple dans le vendor/altorouter ou demander de l'aide
// ROUTES 
$router->map('GET|POST','/', 'home#index', 'home');


// MATCH :
$match = $router->match();
// var_dump($match);

if (is_array($match)) {
    list($controller, $action) = explode('#', $match['target']);
    $obj = new $controller();


    if (is_callable(array($obj, $action))) {
        call_user_func_array(array($obj, $action), $match['params']);
    }
}