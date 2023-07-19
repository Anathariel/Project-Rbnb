<?php
session_start();
require_once './vendor/altorouter/altorouter/AltoRouter.php';
require_once './vendor/autoload.php';

$router = new AltoRouter();
$router->setBasePath('/projet/project-rbnb');

// MAIN ROUTES
$router->map('GET', '/', 'HomeController#home', 'home');
$router->map('GET', '/blog', 'HomeController#blog', 'blog');
$router->map('GET', '/catalogue', 'HomeController#catalogue', 'catalogue');
$router->map('GET', '/tags', '', 'baseTags');

$router->map('GET|POST', '/property/', 'PropertyController#getOne', 'baseProperty');
$router->map('GET|POST', '/property/[i:id]?', 'PropertyController#getOne', 'propertyOne');

// comment
$router->map('GET|POST', '/property/comment', 'CommentController#addComment', 'commentAdd');

// Register
$router->map('GET|POST', '/registration', 'UserController#register', 'register');

// Log-in/out form route
$router->map('GET|POST', '/login', 'UserController#login', 'loginForm');
$router->map('GET', '/logout', 'UserController#logout', 'logout');

// Dashboard Utilisateur
$router->map('GET', '/account', 'UserController#dashboard', 'dashboard');
$router->map('GET', '/account/options', 'UserController#options', 'options');


// CRUD Property
$router->map('GET|POST', '/addproperty', 'PropertyController#createProperty', 'propertyAdd');

$router->map('GET|POST', '/editproperty/', '', 'baseEditproperty');
$router->map('GET|POST', '/editproperty/[i:id]', 'PropertyController#editProperty', 'propertyEdit');

$router->map('GET|POST', '/deleteproperty/', '', 'baseDeleteproperty');
$router->map('POST', '/deleteproperty/[i:id]', 'PropertyController#deleteProperty', 'propertyDelete');


// SEARCH
$router->map('GET|POST', '/search', 'SearchController#searchResult', 'search');


// MATCH :
$match = $router->match();

if (is_array($match)) {
    list($controller, $action) = explode('#', $match['target']);
    $obj = new $controller();

    if (is_callable(array($obj, $action))) {
        call_user_func_array(array($obj, $action), $match['params']);
    } else {
        // Here is where you handle the case where the route was matched,
        // but the controller or action don't exist.
        // Replace ErrorController and handle404 with your actual controller and method.
        $errorController = new ErrorController();
        $errorController->handle404();
    }
} else {
    // No route was matched
    // Replace ErrorController and handle404 with your actual controller and method.
    $errorController = new ErrorController();
    $errorController->handle404();
}