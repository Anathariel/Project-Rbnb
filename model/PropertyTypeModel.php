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

    public function setPropertyTypeModel(PropertyType $propertyType)
    {
        $propertyId = $propertyType->getPropertyId();
        $house = $propertyType->getHouse();
        $flat = $propertyType->getFlat();
        $guesthouse = $propertyType->getGuesthouse();
        $hotel = $propertyType->getHotel();


        $req = $this->getDb()->prepare('INSERT INTO `propertyType`(`propertyId`, `house`, `flat`, `guesthouse`, `hotel`) VALUES (:propertyId, :house, :flat, :guesthouse, :hotel)');

        $req->bindParam('propertyId', $propertyId, PDO::PARAM_INT);
        $req->bindParam('house', $house, PDO::PARAM_STR);
        $req->bindParam('flat', $flat, PDO::PARAM_STR);
        $req->bindParam('guesthouse', $guesthouse, PDO::PARAM_STR);
        $req->bindParam('hotel', $hotel, PDO::PARAM_STR);

        $req->execute();
    }
}
