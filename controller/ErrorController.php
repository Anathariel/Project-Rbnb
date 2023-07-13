<?php

class ErrorController extends Controller {
    public function handle404() {

        echo self::getRender('404.html.twig', []);
    }
}