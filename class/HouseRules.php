<?php

class HouseRules
{
    private $houseRulesId;
    private $propertyId;
    private $checkInTime;
    private $checkOutTime;
    private $maxGuests;

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
    public function getHouseRulesId()
    {
        return $this->houseRulesId;
    }

    public function getPropertyId()
    {
        return $this->propertyId;
    }

    public function getCheckInTime()
    {
        return $this->checkInTime;
    }

    public function getCheckOutTime()
    {
        return $this->checkOutTime;
    }

    public function getMaxGuests()
    {
        return $this->maxGuests;
    }

    //SETTERS
    public function setHouseRulesId(int $houseRulesId)
    {
        $this->houseRulesId = $houseRulesId;
    }

    public function setPropertyId(int $propertyId)
    {
        $this->propertyId = $propertyId;
    }

    public function setCheckInTime(string $checkInTime)
    {
        $this->checkInTime = $checkInTime;
    }

    public function setCheckOutTime(string $checkOutTime)
    {
        $this->checkOutTime = $checkOutTime;
    }

    public function setMaxGuests($maxGuests)
    {
        $this->maxGuests = $maxGuests;
    }
}
