<?php

class Comment
{
    private $commentId;
    private $uid;
    private $propertyId;
    private $rating;
    private $commentText;
    private $firstname;

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
    public function getCommentId()
    {
        return $this->commentId;
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

    public function getCommentText()
    {
        return $this->commentText;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    //SETTERS
    public function setCommentId(int $commentId)
    {
        $this->commentId = $commentId;
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

    public function setCommentText(string $commentText)
    {
        $this->commentText = $commentText;
    }

    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }
}
