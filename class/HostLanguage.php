<?php

class HostLanguage
{
    private $hostLanguageId;
    private $propertyId;
    private $language;

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
    public function getHostLanguageId()
    {
        return $this->hostLanguageId;
    }

    public function getPropertyId()
    {
        return $this->propertyId;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    //SETTERS
    public function setHostLanguageId(int $hostLanguageId)
    {
        $this->hostLanguageId = $hostLanguageId;
    }

    public function setPropertyId(int $propertyId)
    {
        $this->propertyId = $propertyId;
    }

    public function setLanguage(string $language)
    {
        $this->language = $language;
    }
}
