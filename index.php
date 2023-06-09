<?php
session_start();
require_once './vendor/altorouter/altorouter/AltoRouter.php';
require_once './vendor/autoload.php';

$router = new AltoRouter();
$router->setBasePath('/projet/project-rbnb');

// ROUTES
$router->map('GET', '/', 'HomeController#home', 'home');

$router->map('GET', '/property/', '', 'baseProperty');
$router->map('GET', '/property/[i:id]', 'PropertyController#getOne', '');

$router->map('GET', '/tags', '', 'baseTags');

$router->map('GET', '/blog', 'HomeController#blog', 'blog');

// Register
$router->map('GET|POST', '/registration', 'UserController#register', 'register');

// Log-in/out form route
$router->map('GET|POST', '/login', 'UserController#login', 'loginForm');
$router->map('GET', '/logout', 'UserController#logout', 'logout');

// Dashboard Utilisateur
$router->map('GET', '/account', 'UserController#dashboard', 'dashboard');

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
    }
}
