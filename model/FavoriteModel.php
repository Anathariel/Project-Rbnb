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

    public function getFavoriteByUidModel($userId)
    {
        $stmt = $this->getDb()->prepare('SELECT * FROM favorite WHERE uid = :uid ORDER BY addedDate DESC');
        $stmt->bindParam(':uid', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $favorites = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $favorite = new Favorite($row);

            // Récupérer les détails de la propriété associée à ce favori
            $propertyId = $favorite->getPropertyId();
            $propertyModel = new PropertyModel();
            $property = $propertyModel->getPropertyById($propertyId);
            $favorite->setProperty($property);

            $favorites[] = $favorite;
        }

        return $favorites;
    }

    public function deleteFavoriteModel($propertyId, $userId)
    {
        $stmt = $this->getDb()->prepare('DELETE FROM `favorite` WHERE `propertyId` = :propertyId AND `uid` = :uid');
        $stmt->bindParam(':propertyId', $propertyId, PDO::PARAM_INT);
        $stmt->bindParam(':uid', $userId, PDO::PARAM_INT);

        $stmt->execute();
    }
}
