<?php

class AccomodationType
{
    private $accommodationTypeId;
    private $type;

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
    public function getAccommodationTypeId()
    {
        return $this->accommodationTypeId;
    }

    public function getType()
    {
        return $this->type;
    }

    //SETTERS
    public function setAccommodationTypeId(int $accommodationTypeId)
    {
        $this->accommodationTypeId = $accommodationTypeId;
    }

    public function setType(String $type)
    {
        $this->type = $type;
    }
}
