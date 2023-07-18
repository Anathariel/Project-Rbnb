<?php
abstract class Controller {
    private static $loader;
    private static $twig;
    private static $render;

    private static function getLoader(){
        if (self::$loader === null) {
            self::$loader = new \Twig\Loader\FilesystemLoader('./view');
        }
        return self::$loader;
    }

    protected static function getTwig(){
        if (self::$twig === null) {
            $loader = self::getLoader();
            self::$twig = new \Twig\Environment($loader);
            self::$twig->addGlobal('session', $_SESSION);
            self::$twig->addGlobal('get', $_GET);
    
            // Add the path function to Twig environment
            self::$twig->addFunction(new \Twig\TwigFunction('path', function ($routeName) {
                global $router;
                return $router->generate($routeName);
            }));
    
            // Add the asset function to Twig environment
            self::$twig->addFunction(new \Twig\TwigFunction('asset', function ($assetPath) {
                // Modify this logic according to your asset setup
                $basePath = '/projet/project-rbnb/asset'; // Update with your base asset path
                return $basePath . $assetPath;
            }));

            // Add the user data if user is logged in
        if (isset($_SESSION['uid'])) {
            $userId = $_SESSION['uid'];
            $userModel = new UserModel();
            $user = $userModel->getUserById($userId);
            self::$twig->addGlobal('user', $user);
        }
        }
        return self::$twig;
    }
    

    protected static function setRender(string $template, $datas){

        global $router;

        //LINKS
        $tagslink = $router->generate('baseTags');

        // TAGS
        $tags = new TagModel();
        $allTags  = $tags->getAllTags();

        // LINKS TABLE + NEW ONES
        $new = [
            'tags' => $allTags, 'tagslink' => $tagslink,] + $datas;
        echo self::getTwig()->render($template, $new);
    }

    protected static function getRender($template, $datas){
        if (self::$render === null) {
            self::setRender($template, $datas);
        }
        return self::$render;
    }
}
