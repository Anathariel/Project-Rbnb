<?php
class PropertyModel extends Model {

    public function getLastPropertys(){
        $propertys = [];

        $req = $this->getDb()->query('SELECT `propertyId`, `title`, `priceNight`, `address` FROM `property` ORDER BY `propertyId` DESC LIMIT 4');

        while($property = $req->fetch(PDO::FETCH_ASSOC)){
            $propertys[] = new Property($property);
        }

        $req->closeCursor();

        return $propertys;
    }
    
}