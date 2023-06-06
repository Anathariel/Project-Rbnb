<?php

class PropertyController extends Controller
{
    public function getOne($id)
    {
        global $router;
        $model = new PropertyModel();
        $property = $model->getOneProperty($id);
        $oneProperty = $router->generate('baseProperty');
        echo self::getRender('property.html.twig', ['property' => $property, 'oneProperty' => $oneProperty]);
    }
}
