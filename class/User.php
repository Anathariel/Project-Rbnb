<?php

class User {
    private $uid;
    private $username;
    private $password;
    private $email;
    private $favoris;
    private $joined_date;

    public function __construct(array $post){
        $this->hydrate($post);
    }

    private function hydrate(array $post){
        foreach($post as $key => $value){
            $method = 'set' . ucfirst($key);

            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    //GETTERS
    public function getUid(){
        return $this->uid;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getFavoris(){
        return $this->favoris;
    }

    public function getJoined_date(){
        return $this->joined_date;
    }

    //SETTERS
    public function setUid(int $uid){
        $this->uid=$uid;
    }

    public function setUsername(String $username){
        $this->username=$username;
    }

    public function setPassword(String $password){
        $this->password=$password;
    }

    public function setEmail(String $email){
        $this->email=$email;
    }

    public function setFavoris(String $favoris){
        $this->favoris=$favoris;
    }

    public function setJoined_date(String $joined_date){
        $this->joined_date=$joined_date;
    }
}