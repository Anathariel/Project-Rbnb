<?php

class Article
{
    private $uid;
    private $image;
    private $title;
    private $description;
    private $date;

  
  

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

 public function getImage()
 {
     return $this->image;
 }

 public function getTitle()
 {
     return $this->title;
 }

 public function getDescription()
 {
     return $this->description;
 }

 public function getDate()
 {
     return $this->date;
 }

 //SETTERS
 public function setUid(int $uid)
 {
     $this->uid = $uid;
 }

 public function setImage(String $image)
 {
     $this->image = $image;
 }

 public function setTItle(string $title)
 {
     $this->title = $title;
 }

 public function setDescription(string $description)
 {
     $this->description = $description;
 }

 public function setDate(String $date)
 {
     $this->date = $date;
 }


}