<?php

class User
{
    private $uid;
    private $firstName;
    private $lastName;
    private $birthDate;
    private $email;
    private $password;
    private $phoneNumber;
    private $picture;

    public function __construct(array $post){
        $this->hydrate($post);
    }

    private function hydrate(array $post){
        foreach ($post as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    //GETTERS
    public function getUid()
    {
        return $this->uid;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
    public function getPicture()
    {
        return $this->picture;
    }

    //SETTERS
    public function setUid(int $uid)
    {
        $this->uid = $uid;
    }

    public function setFirstName(String $firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    public function setBirthDate(string $birthDate)
    {
        $this->birthDate = $birthDate;
    }

    public function setEmail(String $email)
    {
        $this->email = $email;
    }

    public function setPassword(String $password)
    {
        $this->password = $password;
    }

    public function setPhoneNumber(String $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
    public function setPicture(String $picture)
    {
        $this->picture = $picture;
    }

}
