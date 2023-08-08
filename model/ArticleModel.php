<?php
class ArticleModel extends Model
{
 public function getOneArticle(int $uid){

    $req = $this->getDb()->prepare('SELECT `uid`, `image`, `title`, `content`,`date` FROM `article` WHERE `uid`= :uid');

    $req->bindParam('uid',$uid,PDO::PARAM_INT);
    $req->execute();

    $article = new Article($req->fetch(PDO::FETCH_ASSOC));

    return $article;

  } 

 } 