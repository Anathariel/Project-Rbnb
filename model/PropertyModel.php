<?php
class PropertyModel extends Model
{

    public function getLastPropertys()
    {
        $propertys = [];

        $req = $this->getDb()->query('SELECT `propertyId`, `title`, `priceNight`, `address` FROM `property` ORDER BY `propertyId` DESC LIMIT 5');

        while ($property = $req->fetch(PDO::FETCH_ASSOC)) {
            $propertys[] = new Property($property);
        }

        return $propertys;
    }

    public function getOneProperty(int $id)
    {
        $req = $this->getDb()->prepare('SELECT `propertyId`, `title`, `priceNight`, `address`, `description`, `propertyType`, `latitude`, `longitude`  FROM `property` WHERE `propertyId` = :id');
        $req->bindParam('id', $id, PDO::PARAM_INT);
        $req->execute();
    
        $propertyData = $req->fetch(PDO::FETCH_ASSOC);
    
        $property = new Property($propertyData);
    
        return $property;
    }
    
    public function getPropertyId($property)
    {
        return $property->getPropertyId();
    }
}

