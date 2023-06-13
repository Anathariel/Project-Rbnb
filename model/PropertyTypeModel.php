<?php
class PropertyTypeModel extends Model
{
    public function getPropertyTypeModel(int $propertyId)
    {
        $req = $this->getDb()->prepare('SELECT `house`, `flat`, `guesthouse`, `hotel` FROM `propertytype` WHERE `propertyId` = :propertyId');
        $req->bindParam('propertyId', $propertyId, PDO::PARAM_INT);
        $req->execute();

        $propertyTypeData = $req->fetch(PDO::FETCH_ASSOC);

        if (!$propertyTypeData) {
            // Gérer le cas où aucune commodité n'est trouvée pour la propriété spécifiée
            return null;
        }

        $propertyType = new PropertyType($propertyTypeData);

        return $propertyType;
    }
}
