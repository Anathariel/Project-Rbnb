<?php

class HomeController extends Controller
{
    public function home()
    {
        $propertyModel = new PropertyModel();
        $propertys = $propertyModel->getLastPropertys();
        $propertyImagesModel = new PropertyImagesModel();

        $tagModel = new TagModel();
        $bestTags = $tagModel->getBestTags();

        $propertysWithImages = [];
        foreach ($propertys as $property) {
            $propertyImages = $propertyImagesModel->getPropertyImagesModel($property->getPropertyId());
            $propertysWithImages[] = $property;
        }

        echo self::getRender('homepage.html.twig', ['propertys' => $propertysWithImages, 'bestTags' => $bestTags, 'propertyImages' => $propertyImages]);
    }
}

