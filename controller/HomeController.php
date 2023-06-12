<?php

class HomeController extends Controller
{
    public function home()
    {
        $propertyModel = new PropertyModel();
        $tagModel = new TagModel();
        $propertyImagesModel = new PropertyImagesModel();

        $propertys = $propertyModel->getLastPropertys();
        $lastTagsChateaux = $tagModel->getLastFiveTagsChateaux();

        $propertysWithImages = [];
        foreach ($propertys as $property) {
            $propertyImages = $propertyImagesModel->getPropertyImagesModel($property->getPropertyId());
            $property->propertyImages = $propertyImages;
            $propertysWithImages[] = $property;
        }

        echo self::getRender('homepage.html.twig', ['propertys' => $propertysWithImages, 'lastTagsChateaux' => $lastTagsChateaux, 'propertyImages' => $propertyImages]);
    }
}

