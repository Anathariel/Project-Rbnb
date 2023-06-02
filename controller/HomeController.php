<?php

class HomeController extends Controller {
    public function home()
    {
        echo self::getRender('homepage.html.twig',[]);
    }
}