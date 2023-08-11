<?php
class ArticleModel extends Model
{
    public function getShowOneArticle($articleId)
    {
        $req = $this->getDb()->prepare('SELECT `articleId`, `title`, `extract`, `image`, `content`, `author`, `date` FROM `article` WHERE `articleId` = :articleId');

        $req->bindParam('articleId', $articleId, PDO::PARAM_INT);

        $req->execute();

        $article = $req->fetch(PDO::FETCH_ASSOC);

        return $article;
    }
    //CRUD ARTICLE
    public function addArticle(Article $article)
    {

        $author = $article->getAuthor();
        // $image = $article->getImage();
        $title = $article->getTitle();
        $extract = $article->getExtract();
        $content = $article->getContent();

        $req = $this->getDb()->prepare('INSERT INTO `article` (`author`,  `title`, `extract`, `content`, `date`) VALUES (:author,  :title, :extract, :content, NOW())');

        $req->bindParam(":author", $author, PDO::PARAM_INT);
        // $req->bindParam(":image", $image, PDO::PARAM_STR);
        $req->bindParam(":title", $title, PDO::PARAM_STR);
        $req->bindParam(":extract", $extract, PDO::PARAM_STR);
        $req->bindParam(":content", $content, PDO::PARAM_STR);

        $req->execute();
    }
    public function editArticle($articleId)
    {

        $author = $articleId->getAuthor();
        // $image = $article->getImage();
        $title = $articleId->getTitle();
        $extract = $articleId->getExtract();
        $content = $articleId->getContent();


        $req = $this->getDb()->prepare('UPDATE `article` SET `articleId` =:articleId, `author`=:author, `title` =:title, `extract` =:extract, `content`=:content) WHERE `articleId` = :articleId');

        $req->bindParam(":author", $author, PDO::PARAM_INT);
        // $req->bindParam(":image", $image, PDO::PARAM_STR);
        $req->bindParam(":title", $title, PDO::PARAM_STR);
        $req->bindParam(":extract", $extract, PDO::PARAM_STR);
        $req->bindParam(":content", $content, PDO::PARAM_STR);

        $req->execute();
    }
}
