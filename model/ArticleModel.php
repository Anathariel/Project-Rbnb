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

}