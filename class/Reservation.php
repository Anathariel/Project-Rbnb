<?php

class Reservation
{
    private $reservationId;
    private $uid;
    private $propertyId;
    private $checkInDate;
    private $checkoutDate;
    private $numTravelers;
    private $totalPrice;
    private $property;
    private $propertyImages;
    private $userFirstName;

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
    public function getReservationId()
    {
        return $this->reservationId;
    }

    public function getUid()
    {
        return $this->uid;
    }

    public function getPropertyId()
    {
        return $this->propertyId;
    }

    public function getCheckInDate()
    {
        return $this->checkInDate;
    }

    public function getCheckoutDate()
    {
        return $this->checkoutDate;
    }

    public function getNumTravelers()
    {
        return $this->numTravelers;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function getProperty()
    {
        return $this->property;
    }

    public function getPropertyImages()
    {
        return $this->propertyImages;
    }

    public function getUserFirstName()
    {
        return $this->userFirstName;
    }

    //SETTERS
    public function setReservationId(int $reservationId)
    {
        $this->reservationId = $reservationId;
    }

    public function setUid(int $uid)
    {
        $this->uid = $uid;
    }

    public function setPropertyId(int $propertyId)
    {
        $this->propertyId = $propertyId;
    }

    public function setCheckInDate(string $checkInDate)
    {
        $this->checkInDate = $checkInDate;
    }

    public function setCheckoutDate(string $checkoutDate)
    {
        $this->checkoutDate = $checkoutDate;
    }

    public function setNumTravelers(int $numTravelers)
    {
        $this->numTravelers = $numTravelers;
    }

    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }

    public function setProperty(Property $property)
    {
        $this->property = $property;
    }

    public function setPropertyImages(array $propertyImages)
    {
        $this->propertyImages = $propertyImages;
    }

    public function setUserFirstName(string $userFirstName)
    {
        $this->userFirstName = $userFirstName;
    }
}
