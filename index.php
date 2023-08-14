<?php
session_start();
require_once './vendor/altorouter/altorouter/AltoRouter.php';
require_once './vendor/autoload.php';

$router = new AltoRouter();
$router->setBasePath('/projet/project-rbnb');

// MAIN ROUTES
$router->map('GET', '/', 'HomeController#home', 'home');
$router->map('GET', '/catalogue', 'HomeController#catalogue', 'catalogue');
$router->map('GET', '/tags', '', 'baseTags');

//PROPERTY
$router->map('GET|POST', '/property/', 'PropertyController#getOne', 'baseProperty');
$router->map('GET|POST', '/property/[i:id]', 'PropertyController#getOne', 'propertyOne');

// COMMENT
$router->map('GET|POST', '/property/comment', 'CommentController#addComment', 'commentAdd');

// REGISTER
$router->map('GET|POST', '/registration', 'UserController#register', 'register');

// LOGIN/OUT
$router->map('GET|POST', '/login', 'UserController#login', 'loginForm');
$router->map('GET', '/logout', 'UserController#logout', 'logout');

// DASHBOARD
$router->map('GET', '/account', 'DashboardController#dashboard', 'dashboard');

// FAVORITES
$router->map('GET|POST', '/account', 'FavoriteController#addFavorite', 'favorite');
$router->map('POST', '/account/favorite/delete', 'FavoriteController#deleteFavorite', 'favoriteDelete');

//CRUD USER
$router->map('GET|POST', '/account/options', 'UserController#editUser', 'options');
$router->map('POST', '/account/delete', 'UserController#delete', 'deleteUser',);


// CRUD PROPERTY
$router->map('GET|POST', '/addproperty', 'PropertyController#createProperty',  'propertyAdd');

$router->map('GET|POST', '/editproperty/', '', 'baseEditproperty');
$router->map('GET|POST', '/editproperty/[i:id]', 'PropertyController#editProperty', 'propertyEdit');

$router->map('GET|POST', '/deleteproperty/', '', 'baseDeleteproperty');
$router->map('POST', '/deleteproperty/[i:id]', 'PropertyController#deleteProperty', 'propertyDelete');

// SEARCH
$router->map('GET|POST', '/search', 'SearchController#searchResult', 'search');
$router->map('GET', '/autocomplete', 'SearchController#searchResultAjax', 'autocomplete');

// RESERVATION
$router->map('GET|POST', '/reservation', 'ReservationController#addReservation', 'reservation');
$router->map('GET|POST', '/account/reservation', 'ReservationController#getReservation', 'reservationGet');
$router->map('POST', '/account/reservation/delete', 'ReservationController#deleteReservation', 'reservationDelete');

// BLOG
$router->map('GET', '/blog', 'BlogController#showAllArticles', 'blog');
$router->map('GET', '/article', '', 'basearticle');
$router->map('GET', '/article/[i:id]', 'ArticleController#showOneArticle', 'article');

//CRUD ARTICLE
$router->map('GET|POST', '/publier/', 'ArticleController#createArticle', 'articleAdd');

$router->map('GET|POST', '/edit/', '', 'baseEditArticle');
$router->map('GET|POST', '/edit/[i:id]', 'ArticleController#edit', 'editArticle');


// MATCH :
$match = $router->match();
// var_dump($match);
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
