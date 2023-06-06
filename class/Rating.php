<?php

class Rating
{
    private $ratingId;
    private $uid;
    private $propertyId;
    private $rating;
    private $comment;

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
    public function getRatingId ()
    {
        return $this->ratingId ;
    }

    public function getUid()
    {
        return $this->uid;
    }

    public function getPropertyId()
    {
        return $this->propertyId;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function getComment()
    {
        return $this->comment;
    }

    //SETTERS
    public function setRatingId(int $ratingId)
    {
        $this->ratingId = $ratingId;
    }

    public function setUid(int $uid)
    {
        $this->uid = $uid;
    }

    public function setPropertyId(int $propertyId)
    {
        $this->propertyId = $propertyId;
    }

    public function setRating(int $rating)
    {
        $this->rating = $rating;
    }

    public function setComment(int $comment)
    {
        $this->comment = $comment;
    }
}
