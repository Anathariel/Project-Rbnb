<?php

class Property
{
    private $propertyId;
    private $title;
    private $description;
    private $priceNight;
    private $address;
    private $city;
    private $postalCode;
    private $department;
    private $region;
    private $country;
    private $latitude;
    private $longitude;
    private $availability;
    private $publicationDate;
    private $reservationOption;
    private $owner;
    public $propertyImages;
    public $averageRating;
    private $checkInDate;
    private $checkoutDate;


    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    private function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // GETTERS
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

    public function getCity()
    {
        return $this->city;
    }

    public function getPostalCode()
    {
        return $this->postalCode;
    }

    public function getDepartment()
    {
        return $this->department;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function getCountry()
    {
        return $this->country;
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

    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    public function getReservationOption()
    {
        return $this->reservationOption;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function getPropertyImages()
    {
        return $this->propertyImages;
    }

    public function getAverageRating()
    {
        return $this->averageRating;
    }

    public function getCheckInDate()
    {
        return $this->checkInDate;
    }

    public function getCheckoutDate()
    {
        return $this->checkoutDate;
    }


    // SETTERS
    public function setPropertyId(int $propertyId)
    {
        $this->propertyId = $propertyId;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function setPriceNight($priceNight)
    {
        $this->priceNight = $priceNight;
    }

    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
    }

    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    public function setDepartment(string $department)
    {
        $this->department = $department;
    }

    public function setRegion(string $region)
    {
        $this->region = $region;
    }

    public function setCountry(string $country)
    {
        $this->country = $country;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function setAvailability(bool $availability)
    {
        $this->availability = $availability;
    }

    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;
    }

    public function setReservationOption(string $reservationOption)
    {
        $this->reservationOption = $reservationOption;
    }

    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    public function setPropertyImages($propertyImages)
    {
        $this->propertyImages = $propertyImages;
    }

    public function setAverageRating($averageRating)
    {
        $this->averageRating = $averageRating;
    }

    public function setCheckInDate($checkInDate)
    {
        $this->checkInDate = $checkInDate;
    }

    public function setCheckoutDate($checkoutDate)
    {
        $this->checkoutDate = $checkoutDate;
    }
}
