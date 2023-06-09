<?php

class PropertyImages
{
    private $propertyImagesId ;
    private $propertyId;
    private $imageMainURL;
    private $image1URL;
    private $image2URL;
    private $image3URL;
    private $image4URL;

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

    public function getImageMainURL()
    {
        return $this->imageMainURL;
    }

    public function getImage1URL()
    {
        return $this->image1URL;
    }

    public function getImage2URL()
    {
        return $this->image2URL;
    }

    public function getImage3URL()
    {
        return $this->image3URL;
    }

    public function getImage4URL()
    {
        return $this->image4URL;
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

    public function setImageMainURL(String $imageMainURL)
    {
        $this->imageMainURL = $imageMainURL;
    }

    public function setImage1URL(String $image1URL)
    {
        $this->image1URL = $image1URL;
    }

    public function setImage2URL(String $image2URL)
    {
        $this->image2URL = $image2URL;
    }

    public function setImage3URL(String $image3URL)
    {
        $this->image3URL = $image3URL;
    }

    public function setImage4URL(String $image4URL)
    {
        $this->image4URL = $image4URL;
    }
}
