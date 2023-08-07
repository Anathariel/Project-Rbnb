<?php

class SearchModel extends Model
{

    public function getSearchResult($searchTerm)
    {
        $searchTerm = '%' . strtolower($searchTerm) . '%';

        $req = $this->getDb()->prepare("SELECT `propertyId`, `title`, `description`, `priceNight`, `address`, `city`, `postalCode`, `department`, `region`, `country` FROM `property`"
            . " WHERE LOWER(`title`) LIKE :search_term"
            . " OR LOWER(`priceNight`) LIKE :search_term"
            . " OR LOWER(`address`) LIKE :search_term"
            . " OR LOWER(`city`) LIKE :search_term"
            . " OR LOWER(`postalCode`) LIKE :search_term"
            . " OR LOWER(`department`) LIKE :search_term"
            . " OR LOWER(`region`) LIKE :search_term"
            . " OR LOWER(`country`) LIKE :search_term"
            . " ORDER BY `propertyId`");

        $req->bindValue(':search_term', $searchTerm, PDO::PARAM_STR);
        $req->execute();

        $result = $req->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
