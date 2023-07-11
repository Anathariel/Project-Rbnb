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

    public function getLastInsertedId()
    {
        $req = $this->getDb()->query('SELECT LAST_INSERT_ID()');
        return $req->fetchColumn();
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
    public function editPropertyModel(int $propertyId, string $title, string $description, float $priceNight)
    {
        $db = $this->getDb();
        $stmt = $db->prepare('UPDATE `property` SET `title` = :title, `description` = :description, `priceNight` = :priceNight WHERE `propertyId` = :propertyId');
        $stmt->bindParam(':propertyId', $propertyId, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':priceNight', $priceNight, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getUserProperties($userId)
    {
        $propertys = [];

        $req = $this->getDb()->prepare('SELECT `propertyId`, `title`, `priceNight`, `address`, `description` FROM `property` WHERE `owner` = :userId');
        $req->bindParam('userId', $userId, PDO::PARAM_INT);
        $req->execute();

        while ($property = $req->fetch(PDO::FETCH_ASSOC)) {
            $propertys[] = new Property($property);
        }

        return $propertys;
    }

    public function deletePropertyModel($propertyId)
    {
        $req = $this->getDb()->prepare('DELETE FROM `property` WHERE `propertyId` = :propertyId');
        $req->bindParam('propertyId', $propertyId, PDO::PARAM_INT);
        $req->execute();
    }
}
