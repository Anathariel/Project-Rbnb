<?php

class PropertyAmenities
{
    private $propertyAmenitiesId;
    private $propertyId;
    private $bedrooms;
    private $beds;
    private $bathrooms;
    private $toilets;

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
    public function getPropertyAmenitiesId ()
    {
        return $this->propertyAmenitiesId ;
    }

    public function getPropertyId()
    {
        return $this->propertyId;
    }

    public function getBedrooms()
    {
        return $this->bedrooms;
    }

    public function getBeds()
    {
        return $this->beds;
    }

    public function getBathrooms()
    {
        return $this->bathrooms;
    }

    public function getToilets()
    {
        return $this->toilets;
    }

    //SETTERS
    public function setPropertyAmenitiesId(int $propertyAmenitiesId)
    {
        $this->propertyAmenitiesId = $propertyAmenitiesId;
    }

    public function setPropertyId(int $propertyId)
    {
        $this->propertyId = $propertyId;
    }

    public function setBedrooms(int $bedrooms)
    {
        $this->bedrooms = $bedrooms;
    }

    public function setBeds(int $beds)
    {
        $this->beds = $beds;
    }

    public function setBathrooms(int $bathrooms)
    {
        $this->bathrooms = $bathrooms;
    }

    public function setToilets(int $toilets)
    {
        $this->toilets = $toilets;
    }
}
