<?php

class HostLanguage
{
    private $hostLanguageId;
    private $propertyId;
    private $anglais;
    private $français;
    private $allemand;
    private $japonais;
    private $italien;
    private $russe;
    private $espagnol;
    private $chinois;
    private $arabe;

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

    public function getAnglais()
    {
        return $this->anglais;
    }

    public function getFrançais()
    {
        return $this->français;
    }

    public function getAllemand()
    {
        return $this->allemand;
    }

    public function getJaponais()
    {
        return $this->japonais;
    }

    public function getItalien()
    {
        return $this->italien;
    }

    public function getRusse()
    {
        return $this->russe;
    }

    public function getEspagnol()
    {
        return $this->espagnol;
    }

    public function getChinois()
    {
        return $this->chinois;
    }

    public function getArabe()
    {
        return $this->arabe;
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

    public function setAnglais(bool $anglais)
    {
        $this->anglais = $anglais;
    }

    public function setFrançais(bool $français)
    {
        $this->français = $français;
    }

    public function setAllemand(bool $allemand)
    {
        $this->allemand = $allemand;
    }

    public function setJaponais(bool $japonais)
    {
        $this->japonais = $japonais;
    }

    public function setItalien(bool $italien)
    {
        $this->italien = $italien;
    }

    public function setChinois(bool$chinois)
    {
        $this->chinois = $chinois;
    }

    public function setArabe(bool $arabe)
    {
        $this->arabe = $arabe;
    }
}
