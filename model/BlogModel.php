<?php
class BlogModel extends Model
{
    public function getAllArticlesModel()
    {
        // The SQL to join the article and user tables
        $req = $this->getDb()->prepare(
            'SELECT a.`articleId`, a.`title`, a.`extract`, a.`image`, a.`author`, 
             CONCAT(u.`firstName`, " ", u.`lastName`) AS authorName, 
             a.`date` 
             FROM `article` a 
             JOIN `user` u ON a.`author` = u.`uid`
             ORDER BY a.`date` DESC'
        );
        $req->execute();

        $allArticlesModelData = $req->fetchAll(PDO::FETCH_ASSOC);

        if (!$allArticlesModelData) {
            return null;
        }

        $allArticles = [];
        foreach ($allArticlesModelData as $articleModelData) {
            // Instead of creating an Article object, we just append the array directly
            $allArticles[] = $articleModelData;
        }

        return $allArticles;
    }
}