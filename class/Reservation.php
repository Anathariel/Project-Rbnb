<?php

class Reservation
{
    private $reservationId;
    private $uid;
    private $propertyId;
    private $checkInDate;
    private $checkoutDate;
    private $numAdults;
    private $numberChildren;
    private $status;

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

    public function getNumAdults()
    {
        return $this->numAdults;
    }

    public function getNumberChildren()
    {
        return $this->numberChildren;
    }

    public function getStatus()
    {
        return $this->status;
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

    public function setNumAdults(int $numAdults)
    {
        $this->numAdults = $numAdults;
    }

    public function setNumberChildren(int $numberChildren)
    {
        $this->numberChildren = $numberChildren;
    }

    public function setStatus(String $status)
    {
        $this->status = $status;
    }
}
