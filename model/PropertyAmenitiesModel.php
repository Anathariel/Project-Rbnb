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

    public function setPropertyAmenitiesModel(PropertyAmenities $propertyAmenities)
    {
        $propertyId = $propertyAmenities->getPropertyId();
        $bedrooms = $propertyAmenities->getBedrooms();
        $beds = $propertyAmenities->getBeds();
        $bathrooms = $propertyAmenities->getBathrooms();
        $toilets = $propertyAmenities->getToilets();

        $req = $this->getDb()->prepare('INSERT INTO `propertyamenities` (`propertyId`, `bedrooms`, `beds`, `bathrooms`, `toilets`) VALUES (:propertyId, :bedrooms, :beds, :bathrooms, :toilets)');

        $req->bindParam(':propertyId', $propertyId, PDO::PARAM_INT);
        $req->bindParam(':bedrooms', $bedrooms, PDO::PARAM_INT);
        $req->bindParam(':beds', $beds, PDO::PARAM_INT);
        $req->bindParam(':bathrooms', $bathrooms, PDO::PARAM_INT);
        $req->bindParam(':toilets', $toilets, PDO::PARAM_INT);

        $req->execute();
    }
}
