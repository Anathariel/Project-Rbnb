<?php

class Property
{
    private $propertyId;
    private $title;
    private $description;
    private $priceNight;
    private $address;
    private $latitude;
    private $longitude;
    private $availability;
    private $publicationdate;
    private $reservationOption;
    private $owner;
    private $ownerFirstName;

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
    public function getPropertyId()
    {
        return $this->propertyId;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPriceNight()
    {
        return $this->priceNight;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function getAvailability()
    {
        return $this->availability;
    }

    public function getPublicationdate()
    {
        return $this->publicationdate;
    }

    public function getReservationOption()
    {
        return $this->reservationOption;
    }

    public function getOwner()
    {
        var_dump($this->owner);
        return $this->owner;
    }

    public function getOwnerFirstName() {
        return $this->ownerFirstName;
    }

    //SETTERS
    public function setPropertyId(int $propertyId)
    {
        $this->propertyId = $propertyId;
    }

    public function setTitle(String $title)
    {
        $this->title = $title;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function setPriceNight(string $priceNight)
    {
        $this->priceNight = $priceNight;
    }

    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function setAvailability(String $availability)
    {
        $this->availability = $availability;
    }

    public function setPublicationdate($publicationdate)
    {
        $this->publicationdate = $publicationdate;
    }

    public function setReservationOption(String $reservationOption)
    {
        $this->reservationOption = $reservationOption;
    }

    public function setOwner(int $owner)
    {
        $this->owner = $owner;
    }

    public function setOwnerFirstName($firstName) {
        $this->ownerFirstName = $firstName;
    }

}
