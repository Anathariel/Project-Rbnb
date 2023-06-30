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

       // Setters

       public function setPropertyAmenitiesId($propertyAmenitiesId)
       {
           $this->propertyAmenitiesId = $propertyAmenitiesId;
       }

       public function setPropertyId($propertyId)
       {
           $this->propertyId = $propertyId;
       }
   
       public function setBedrooms($bedrooms)
       {
           $this->bedrooms = intval($bedrooms);
       }
   
       public function setBeds($beds)
       {
           $this->beds = intval($beds);
       }
   
       public function setBathrooms($bathrooms)
       {
           $this->bathrooms = intval($bathrooms);
       }
   
       public function setToilets($toilets)
       {
           $this->toilets = intval($toilets);
       }
   
}
