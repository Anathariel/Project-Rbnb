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
}

