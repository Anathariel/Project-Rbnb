<?php

class PropertyType
{
    private $propertyTypeId;
    private $propertyId;
    private $house;
    private $flat;
    private $guesthouse;
    private $hotel;

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
    public function getPropertyTypeId()
    {
        return $this->propertyTypeId;
    }

    public function getPropertyId()
    {
        return $this->propertyId;
    }

    public function getHouse()
    {
        return $this->house;
    }

    public function getFlat()
    {
        return $this->flat;
    }

    public function getGuesthouse()
    {
        return $this->guesthouse;
    }

    public function getHotel()
    {
        return $this->hotel;
    }

    //SETTERS
    public function setPropertyTypeId(int $propertyTypeId)
    {
        $this->propertyTypeId = $propertyTypeId;
    }

    public function setPropertyId(int $propertyId)
    {
        $this->propertyId = $propertyId;
    }

    public function setHouse(bool $house)
    {
        $this->house = $house;
    }

    public function setFlat(bool $flat)
    {
        $this->flat = $flat;
    }

    public function setGuesthouse(bool $guesthouse)
    {
        $this->guesthouse = $guesthouse;
    }

    public function setHotel(bool $hotel)
    {
        $this->hotel = $hotel;
    }
}
