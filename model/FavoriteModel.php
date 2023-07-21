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

    public function getFavoriteByUid($userId)
    {
        $stmt = $this->getDb()->prepare('SELECT * FROM favorite WHERE uid = :uid');
        $stmt->bindParam(':uid', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $favorites = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $favorites[] = new Favorite($row);
        }

        return $favorites;
    }
}
