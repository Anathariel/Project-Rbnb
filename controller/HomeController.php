<?php

class HomeController extends Controller {
    public function home()
    {
        $propertyModel = new PropertyModel();
        $propertys = $propertyModel->getLastPropertys();
        echo self::getRender('homepage.html.twig',['propertys' => $propertys]);
    }
}