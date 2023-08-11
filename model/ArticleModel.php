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
    public function editArticle($article)
    {

        $articleId = $article->getArticleId();
        $author = $article->getAuthor();
        $image = $article->getImage();
        $title = $article->getTitle();
        $extract = $article->getExtract();
        $content = $article->getContent();
        $date = $article->getDate();

        $req = $this->getDb()->prepare('UPDATE `article` SET `articleId` =:articleId, `author`=:author, `image` =:image, `title` =:title, `extract` =:extract, `content`=:content, `date`=:date) WHERE `articleId` = :articleId');

        $req->bindParam(":articleId", $articleId, PDO::PARAM_INT);
        $req->bindParam(":author", $author, PDO::PARAM_INT);
        $req->bindParam(":image", $image, PDO::PARAM_STR);
        $req->bindParam(":title", $title, PDO::PARAM_STR);
        $req->bindParam(":extract", $extract, PDO::PARAM_STR);
        $req->bindParam(":content", $content, PDO::PARAM_STR);
        $req->bindParam(":date", $date, PDO::PARAM_STR);


        $resultCrud = $req->execute();

        return  $resultCrud;
    }
}
