<?php

class Tag
{
    private $tagId;
    private $type;
    private $slug;

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
    public function getTagId()
    {
        return $this->tagId;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    //SETTERS
    public function setTagId(int $tagId)
    {
        $this->tagId = $tagId;
    }

    public function setType(String $type)
    {
        $this->type = $type;
    }

    public function setSlug(String $slug)
    {
        $this->slug = $slug;
    }
}
