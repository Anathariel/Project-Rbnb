<?php
class PropertyAmenitiesModel extends Model
{
    public function getPropertyAmenities(int $propertyId)
    {
        $req = $this->getDb()->prepare('SELECT `beds`, `bedrooms`, `bathrooms`, `toilets` FROM `propertyamenities` WHERE `propertyId` = :propertyId');
        $req->bindParam('propertyId', $propertyId, PDO::PARAM_INT);
        $req->execute();

        $amenitiesData = $req->fetch(PDO::FETCH_ASSOC);

        if (!$amenitiesData) {
            // Gérer le cas où aucune commodité n'est trouvée pour la propriété spécifiée
            return null;
        }

        $amenities = new PropertyAmenities($amenitiesData);

        return $amenities;
    }
}
