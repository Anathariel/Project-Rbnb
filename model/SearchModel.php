<?php

class SearchModel extends Model
{

    public function getSearchResult($searchTerm)
    {

        $searchTerm = '%' . strtolower($searchTerm) . '%';

        $req = $this->getDb()->prepare("SELECT `propertyId`, `title`, `description`, `priceNight` FROM `property`"
            . " WHERE LOWER(`title`) LIKE :search_term"
            . " OR LOWER(`description`) LIKE :search_term"
            . " OR LOWER(`priceNight`) LIKE :search_term"
            . " ORDER BY `propertyId`");

        $req->bindValue(':search_term', $searchTerm, PDO::PARAM_STR);
        $req->execute();

        $result = $req->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
