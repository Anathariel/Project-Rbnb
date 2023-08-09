<?php
class ArticleModel extends Model
{
 public function getOneArticle(int $idArticle){

    $req = $this->getDb()->prepare('SELECT `uid`,`idArticle`, `image`, `title`, `content`,`date` FROM `article` WHERE `idArticle`= :idArticle');

    // $req->bindParam('uid',$uid,PDO::PARAM_INT);
    $req->bindParam('idArticle',$idArticle,PDO::PARAM_INT);
    $req->execute();

    $article = new Article($req->fetch(PDO::FETCH_ASSOC));

    return $article;
  }

}
  

 