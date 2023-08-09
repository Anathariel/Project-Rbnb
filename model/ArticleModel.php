<?php
class ArticleModel extends Model
{
 public function getArticle(){

    $req = $this->getDb()->prepare('SELECT `uid`, `image`, `title`, `description`,`date` FROM `article`WHERE `uid`:uid');

    $req->bindParam('uid', $uid, PDO::PARAM_INT);

    $req->execute();

  } 

 } 