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
        $req = $this->getDb()->prepare('SELECT `property`.`propertyId`, `property`.`title`, `property`.`priceNight`, `property`.`address`, `property`.`description`, `property`.`latitude`, `property`.`longitude`, `user`.`firstName`, `property`.`owner`  FROM `property`
        JOIN `user` ON `property`.`owner` = `user`.`uid` WHERE `property`.`propertyId` = :id');
        $req->bindParam('id', $id, PDO::PARAM_INT);
        $req->execute();

        $propertyData = $req->fetch(PDO::FETCH_ASSOC);

        $property = new Property($propertyData);

        $propertyOwner = $property->getOwner();

        $req2 = $this->getDb()->prepare('SELECT `firstName`, `lastName`, `birthDate`, `email`, `phoneNumber` FROM `user` WHERE `uid` = :id');
        $req2->bindParam('id', $propertyOwner, PDO::PARAM_INT);
        $req2->execute();

        $ownerData = $req2->fetch(PDO::FETCH_ASSOC);
        $property->setOwner($ownerData);

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
        $address = $property->getAddress();
        $city = $property->getCity();
        $postalCode = $property->getPostalCode();
        $department = $property->getDepartment();
        $region = $property->getRegion();
        $country = $property->getCountry();
        $latitude = $property->getLatitude();
        $longitude = $property->getLongitude();

        $req = $this->getDb()->prepare('INSERT INTO `property`(`owner`, `title`, `description`, `priceNight`, `address`, `city`, `postalCode`, `department`, `region`, `country`, `latitude`, `longitude`) VALUES (:owner, :title, :description, :priceNight, :address, :city, :postalCode, :department, :region, :country, :latitude, :longitude)');

        $req->bindParam('owner', $owner, PDO::PARAM_INT);
        $req->bindParam('title', $title, PDO::PARAM_STR);
        $req->bindParam('description', $description, PDO::PARAM_STR);
        $req->bindParam('priceNight', $priceNight, PDO::PARAM_STR);
        $req->bindParam('address', $address, PDO::PARAM_STR);
        $req->bindParam('city', $city, PDO::PARAM_STR);
        $req->bindParam('postalCode', $postalCode, PDO::PARAM_INT);
        $req->bindParam('department', $department, PDO::PARAM_STR);
        $req->bindParam('region', $region, PDO::PARAM_STR);
        $req->bindParam('country', $country, PDO::PARAM_STR);
        $req->bindParam('latitude', $latitude, PDO::PARAM_STR);
        $req->bindParam('longitude', $longitude, PDO::PARAM_STR);

        $req->execute();
    }

    public function editPropertyModel(int $propertyId, string $title, string $description, $priceNight)
    {
        $db = $this->getDb();
        $stmt = $db->prepare('UPDATE `property` SET `title` = :title, `description` = :description, `priceNight` = :priceNight WHERE `propertyId` = :propertyId');
        $stmt->bindParam(':propertyId', $propertyId, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':priceNight', $priceNight, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function deletePropertyModel($propertyId)
    {
        $req = $this->getDb()->prepare('DELETE FROM `property` WHERE `propertyId` = :propertyId');
        $req->bindParam('propertyId', $propertyId, PDO::PARAM_INT);
        $req->execute();
    }

    public function getUserProperties($userId)
    {
        $properties = [];

        $req = $this->getDb()->prepare('SELECT `propertyId`, `title`, `priceNight`, `address`, `description` FROM `property` WHERE `owner` = :userId');
        $req->bindParam('userId', $userId, PDO::PARAM_INT);
        $req->execute();

        while ($property = $req->fetch(PDO::FETCH_ASSOC)) {
            $properties[] = new Property($property);
        }

        return $properties;
    }

    public function countUserProperties($userId)
    {
        $req = $this->getDb()->prepare('SELECT COUNT(*) AS count FROM `property` WHERE `owner` = :userId');
        $req->bindParam('userId', $userId, PDO::PARAM_INT);
        $req->execute();

        $result = $req->fetch(PDO::FETCH_ASSOC);
        $count = $result['count'];

        return $count;
    }
}
