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
        $req = $this->getDb()->prepare('SELECT `propertyId`, `title`, `priceNight`, `address`, `description`, `latitude`, `longitude`  FROM `property` WHERE `propertyId` = :id');
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

    public function addProperty(Property $property)
    {
        $owner = $property->getOwner();
        $title = $property->getTitle();
        $description = $property->getDescription();
        $priceNight = $property->getPriceNight();


        $req = $this->getDb()->prepare('INSERT INTO `property`(`owner`, `title`, `description`, `priceNight`) VALUES (:owner, :title, :description, :priceNight)');

        $req->bindParam('owner', $owner, PDO::PARAM_INT);
        $req->bindParam('title', $title, PDO::PARAM_STR);
        $req->bindParam('description', $description, PDO::PARAM_STR);
        $req->bindParam('priceNight', $priceNight, PDO::PARAM_STR);

        $req->execute();
    }
}
