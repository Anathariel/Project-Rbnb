<?php

class HomeController extends Controller
{
    public function home()
    {
        $propertyModel = new PropertyModel();
        $propertys = $propertyModel->getLastPropertys();

        $tagModel = new TagModel();
        $bestTags = $tagModel->getBestTags();

        echo self::getRender('homepage.html.twig', ['propertys' => $propertys, 'bestTags' => $bestTags]);
    }
}
