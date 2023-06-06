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

        $req = $this->getDb()->prepare('SELECT `propertyId`, `title`, `priceNight`, `address` FROM `property` WHERE `propertyId` = :id');
        $req->bindParam('id', $id, PDO::PARAM_INT);
        $req->execute();

        $property = new Property($req->fetch(PDO::FETCH_ASSOC));

        return $property;
    }
}
