<?php
class ArticleModel extends Model{
    public function getShowOneArticle($articleId)
    {
        $req = $this->getDb()->prepare('SELECT `articleId`, `title`, `extract`, `image`, `content`, `author`, `date` FROM `article` WHERE `articleId` = :articleId');

        $req->bindParam('articleId', $articleId, PDO::PARAM_INT);

        $req->execute();

        $article = $req->fetch(PDO::FETCH_ASSOC);

        return $article;
    }

    public function getArticlesByUid($uid)
    {
        $articles = [];

        $req = $this->getDb()->prepare('SELECT `articleId`, `author`, `image`, `title`, `extract`, `content`, `date` FROM `article` WHERE `author` = :uid');
        $req->bindParam('uid', $uid, PDO::PARAM_INT);
        $req->execute();

        while ($article = $req->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new Article($article);
        }
        return $articles;
    }
    //CRUD ARTICLE
    public function addArticle(Article $article)
    {

        $author = $article->getAuthor();
        $image = $article->getImage();
        $title = $article->getTitle();
        $extract = $article->getExtract();
        $content = $article->getContent();

        $req = $this->getDb()->prepare('INSERT INTO `article` (`author`, `image`, `title`, `extract`, `content`, `date`) VALUES (:author, :image,  :title, :extract, :content, NOW())');

        $req->bindParam(":author", $author, PDO::PARAM_INT);
        $req->bindParam(":image", $image, PDO::PARAM_STR);
        $req->bindParam(":title", $title, PDO::PARAM_STR);
        $req->bindParam(":extract", $extract, PDO::PARAM_STR);
        $req->bindParam(":content", $content, PDO::PARAM_STR);

        $req->execute();
    }
    public function updateArticle(Article $article)
{
 
    $articleId = $article->getArticleId();
    $author = $article->getAuthor();
    $image = $article->getImage();   
    $title = $article->getTitle();
    $extract = $article->getExtract();
    $content = $article->getContent();

    $req = $this->getDb()->prepare('UPDATE `article` SET `articleId`=:articleId,`author`=:author, `title` =:title, `image` =:image,`extract` =:extract, `content`=:content WHERE `articleId` = :articleId');

    // Liez les paramètres comme précédemment
    $req->bindParam(":articleId", $articleId, PDO::PARAM_INT);
    $req->bindParam(":author", $author, PDO::PARAM_INT);
    $req->bindParam(":image", $image, PDO::PARAM_STR);
    $req->bindParam(":title", $title, PDO::PARAM_STR);
    $req->bindParam(":extract", $extract, PDO::PARAM_STR);
    $req->bindParam(":content", $content, PDO::PARAM_STR);

    $req->execute();

    // return $updateArticle;
}
// public function updateArticle(Article $article){

//     $author = $article->getAuthor();
//     $image = $article->getImage();   
//     $title = $article->getTitle();
//     $extract = $article->getExtract();
//     $content = $article->getContent();

//     $req = $this->getDb()->prepare('UPDATE `article` SET `articleId`=:articleId,`author`=:author, `title` =:title, `image` =:image,`extract` =:extract, `content`=:content WHERE `articleId` = :articleId');

//     // Liez les paramètres comme précédemment
//     $req->bindParam(":articleId", $articleId, PDO::PARAM_INT);
//     $req->bindParam(":author", $author, PDO::PARAM_INT);
//     $req->bindParam(":image", $image, PDO::PARAM_STR);
//     $req->bindParam(":title", $title, PDO::PARAM_STR);
//     $req->bindParam(":extract", $extract, PDO::PARAM_STR);
//     $req->bindParam(":content", $content, PDO::PARAM_STR);

//     $req->execute();



// }
    public function deleteArticle($id){

        $req = $this->getDb()->prepare('DELETE FROM `article` WHERE `articleId` = :articleId');
                $req->bindParam('articleId', $id, PDO::PARAM_INT);

                $req->execute();
    }

}
