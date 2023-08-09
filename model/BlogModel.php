<?php

class BlogModel extends Model
{
    public function getAllArticlesModel()
    {
        $req = $this->getDb()->prepare('SELECT `articleId`, `title`, `extract`, `image`, `author`, `date` FROM `article` ORDER BY `date` DESC');
        $req->execute();

        $allArticlesModelData = $req->fetchAll(PDO::FETCH_ASSOC);

        if (!$allArticlesModelData) {
            // Gérer le cas où aucune commodité n'est trouvée pour la propriété spécifiée
            return null;
        }

        $allArticles = [];
        foreach ($allArticlesModelData as $articleModelData) {
            $article = new Article($articleModelData);
            $allArticles[] = $article;
        }

        return $allArticles;
    }

    public function getOneArticleModel($articleId)
    {
        $req = $this->getDb()->prepare('SELECT `articleId`, `title`, `extract`, `image`, `content`, `author`, `date` FROM `article` WHERE `articleId` = :articleId');
        $req->bindParam('articleId', $articleId, PDO::PARAM_INT);
        $req->execute();

        $articleModelData = $req->fetch(PDO::FETCH_ASSOC);

        if (!$articleModelData) {
            // Gérer le cas où aucune commodité n'est trouvée pour la propriété spécifiée
            return null;
        }

        $article = new Article($articleModelData);

        return $article;
    }
}
