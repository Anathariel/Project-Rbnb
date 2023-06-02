<?php

class Favorite
{
    private $favoriteId;
    private $uid;
    private $propertyId;
    private $addedDate;

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
    public function getFavoriteId()
    {
        return $this->favoriteId;
    }

    public function getUid()
    {
        return $this->uid;
    }

    public function getPropertyId()
    {
        return $this->propertyId;
    }

    public function getAddedDate()
    {
        return $this->addedDate;
    }

    //SETTERS
    public function setFavoriteId(int $favoriteId)
    {
        $this->favoriteId = $favoriteId;
    }

    public function setUid(int $uid)
    {
        $this->uid = $uid;
    }

    public function setPropertyId(int $propertyId)
    {
        $this->propertyId = $propertyId;
    }

    public function setAddedDate(string $addedDate)
    {
        $this->addedDate = $addedDate;
    }
}
