<?php

class SearchModel extends Model
{
    public function getSearchResult($searchTerm, $arrivalDate, $departureDate, $travelers)
    {
        $searchTerm = '%' . strtolower($searchTerm) . '%';
        $maxGuestsCondition = "";

        if ($travelers !== '') {
            $maxGuestsCondition = " AND `houserules`.`maxGuests` >= :travelers";
        }

        $req = $this->getDb()->prepare("SELECT 
    `property`.`propertyId`, 
    `property`.`title`, 
    `property`.`description`, 
    `property`.`priceNight`, 
    `property`.`address`, 
    `property`.`city`, 
    `property`.`postalCode`, 
    `property`.`department`, 
    `property`.`region`, 
    `property`.`country`, 
    `houserules`.`houseRulesId`, 
    `houserules`.`checkInTime`, 
    `houserules`.`checkOutTime`, 
    `houserules`.`maxGuests`
FROM `property` 
INNER JOIN `houserules` ON `houserules`.`propertyId` = `property`.`propertyId`
LEFT JOIN `reservation` ON `reservation`.`propertyId` = `property`.`propertyId`
AND (:arrival_date BETWEEN `reservation`.`checkInDate` AND `reservation`.`checkoutDate`
OR :departure_date BETWEEN `reservation`.`checkInDate` AND `reservation`.`checkoutDate`)
WHERE (LOWER(`title`) LIKE :search_term"
            . " OR LOWER(`priceNight`) LIKE :search_term"
            . " OR LOWER(`address`) LIKE :search_term"
            . " OR LOWER(`city`) LIKE :search_term"
            . " OR LOWER(`postalCode`) LIKE :search_term"
            . " OR LOWER(`department`) LIKE :search_term"
            . " OR LOWER(`region`) LIKE :search_term"
            . " OR LOWER(`country`) LIKE :search_term)"
            . $maxGuestsCondition
            . " AND `reservation`.`propertyId` IS NULL"
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
