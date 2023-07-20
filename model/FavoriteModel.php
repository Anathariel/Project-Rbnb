<?php
class FavoriteModel extends Model
{
    public function addFavoriteModel(Favorite $favorite)
    {
        $propertyId = $favorite->getPropertyId();
        $userId = $favorite->getUid();

        $stmt = $this->getDb()->prepare('INSERT INTO favorite (`uid`, `propertyId`) VALUES (:uid, :propertyId)');
        $stmt->bindParam(':uid', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':propertyId', $propertyId, PDO::PARAM_INT);

        $stmt->execute();
    }
}
