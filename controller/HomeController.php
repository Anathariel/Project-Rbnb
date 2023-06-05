<?php

class HomeController extends Controller
{
    public function home()
    {
        $propertyModel = new PropertyModel();
        $propertys = $propertyModel->getLastPropertys();

        $tagModel = new TagModel();
        $tags = $tagModel->getAllTags();

        echo self::getRender('homepage.html.twig', ['propertys' => $propertys, 'tags' => $tags]);
    }
}
