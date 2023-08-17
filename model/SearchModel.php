<?php

class SearchModel extends Model
{

    // public function getSearchResult($searchTerm)
    // {
    //     $searchTerm = '%' . strtolower($searchTerm) . '%';

    //     $req = $this->getDb()->prepare("SELECT `propertyId`, `title`, `description`, `priceNight`, `address`, `city`, `postalCode`, `department`, `region`, `country` FROM `property`"
    //         . " WHERE LOWER(`title`) LIKE :search_term"
    //         . " OR LOWER(`priceNight`) LIKE :search_term"
    //         . " OR LOWER(`address`) LIKE :search_term"
    //         . " OR LOWER(`city`) LIKE :search_term"
    //         . " OR LOWER(`postalCode`) LIKE :search_term"
    //         . " OR LOWER(`department`) LIKE :search_term"
    //         . " OR LOWER(`region`) LIKE :search_term"
    //         . " OR LOWER(`country`) LIKE :search_term"
    //         . " ORDER BY `propertyId`");

    //     $req->bindValue(':search_term', $searchTerm, PDO::PARAM_STR);
    //     $req->execute();

    //     $result = $req->fetchAll(PDO::FETCH_ASSOC);

    //     return $result;
    // }

    public function getSearchResult($searchTerm, $arrivalDate, $departureDate, $travelers)
    {
        $searchTerm = '%' . strtolower($searchTerm) . '%';
        $maxGuestsCondition = "";

        if ($travelers !== '') {
            $maxGuestsCondition = " AND `houserules`.`maxGuests` >= :travelers";
        }

        $req = $this->getDb()->prepare("SELECT 
        `property`.`propertyId`, 
        `title`, 
        `description`, 
        `priceNight`, 
        `address`, 
        `city`, 
        `postalCode`, 
        `department`, 
        `region`, 
        `country`, 
        `houserules`.`houseRulesId`, 
        `houserules`.`checkInTime`, 
        `houserules`.`checkOutTime`, 
        `houserules`.`maxGuests` 
    FROM `property` 
    INNER JOIN `houserules` ON `houserules`.`propertyId` = `property`.`propertyId` 
    WHERE (LOWER(`title`) LIKE :search_term"
            . " OR LOWER(`priceNight`) LIKE :search_term"
            . " OR LOWER(`address`) LIKE :search_term"
            . " OR LOWER(`city`) LIKE :search_term"
            . " OR LOWER(`postalCode`) LIKE :search_term"
            . " OR LOWER(`department`) LIKE :search_term"
            . " OR LOWER(`region`) LIKE :search_term"
            . " OR LOWER(`country`) LIKE :search_term)"
            . " AND (`houserules`.`checkInTime` = :arrival_date OR :arrival_date = '')"
            . " AND (`houserules`.`checkOutTime` = :departure_date OR :departure_date = '')"
            . $maxGuestsCondition
            . " ORDER BY `propertyId`");

        $req->bindValue(':search_term', $searchTerm, PDO::PARAM_STR);
        $req->bindValue(':arrival_date', $arrivalDate, PDO::PARAM_STR);
        $req->bindValue(':departure_date', $departureDate, PDO::PARAM_STR);
        if ($travelers !== '') {
            $req->bindValue(':travelers', intval($travelers), PDO::PARAM_INT);
        }
        $req->execute();

        $result = $req->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
