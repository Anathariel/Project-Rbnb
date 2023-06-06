<?php
abstract class Controller {
    private static $loader;
    private static $twig;
    private static $render;

    private static function setLoader(){
        self::$loader = new \Twig\Loader\FilesystemLoader('./view');
    }

    private static function setTwig(){
        self::$twig = new \Twig\Environment(self::getLoader(), [
            'cache' => false,
            'debug' => true
        ]);
        self::$twig->addExtension(new \Twig\Extension\DebugExtension());
        self::$twig->addGlobal('session', $_SESSION);
    }

    private static function setRender(String $template, array $datas){
        $model = new PostModel();
        $posts = $model->getLastTenPosts();
        $new = ['posts' => $posts] + $datas;
        self::$render = self::getTwig()->render($template, $new);
    }

    protected static function getRender(String $template, array $datas){
        if(self::$render == null){
            self::setRender($template, $datas);
        }
        return self::$render;
    }
    protected static function getLoader(){
        if(self::$loader == null){
            self::setLoader();
        }
        return self::$loader;
    }

    protected static function getTwig(){
        if(self::$twig == null){
            self::setTwig();
        }
        return self::$twig;
    }
}