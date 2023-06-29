<?php
class HouseRulesModel extends Model
{
    public function getHouseRules(int $propertyId)
    {
        $req = $this->getDb()->prepare('SELECT `checkInTime`, `checkOutTime`, `maxGuests` FROM `houserules` WHERE `propertyId` = :propertyId');
        $req->bindParam('propertyId', $propertyId, PDO::PARAM_INT);
        $req->execute();

        $houseRulesData = $req->fetch(PDO::FETCH_ASSOC);

        if (!$houseRulesData) {
            // Gérer le cas où aucune règle n'est trouvée pour la propriété spécifiée
            return null;
        }

        $houseRules = new HouseRules($houseRulesData);

        return $houseRules;
    }

    public function setHouseRulesModel(HouseRules $houseRules)
    {
        $propertyId = $houseRules->getPropertyId();
        $checkInTime = $houseRules->getCheckInTime();
        $checkOutTime = $houseRules->getCheckOutTime();
        $maxGuests = $houseRules->getMaxGuests();

        $req = $this->getDb()->prepare('INSERT INTO `houserules` (`propertyId`, `checkInTime`, `checkOutTime`, `maxGuests`) VALUES (:propertyId, :checkInTime, :checkOutTime, :maxGuests)');

        $req->bindParam(':propertyId', $propertyId, PDO::PARAM_INT);
        $req->bindParam(':checkInTime', $checkInTime, PDO::PARAM_STR);
        $req->bindParam(':checkOutTime', $checkOutTime, PDO::PARAM_STR);
        $req->bindParam(':maxGuests', $maxGuests, PDO::PARAM_INT);

        $req->execute();
    }
}
