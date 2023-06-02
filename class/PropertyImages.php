<?php

class PropertyImages
{
    private $propertyImagesId ;
    private $propertyId;
    private $imageURL;

    public function __construct(array $post)
    {
        $this->hydrate($post);
    }

    private function hydrate(array $post)
    {
        foreach ($post as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    //GETTERS
    public function getPropertyImagesId ()
    {
        return $this->propertyImagesId ;
    }

    public function getPropertyId()
    {
        return $this->propertyId;
    }

    public function getImageURL()
    {
        return $this->imageURL;
    }

    //SETTERS
    public function setPropertyImagesId(int $propertyImagesId)
    {
        $this->propertyImagesId = $propertyImagesId;
    }

    public function setPropertyId(int $propertyId)
    {
        $this->propertyId = $propertyId;
    }

    public function setImageURL(String $imageURL)
    {
        $this->imageURL = $imageURL;
    }
}
