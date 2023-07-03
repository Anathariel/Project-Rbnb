<?php
class PropertyImagesModel extends Model
{
    public function getPropertyImagesModel(int $propertyId)
    {
        $req = $this->getDb()->prepare('SELECT `imageMainURL`, `image1URL`, `image2URL`, `image3URL`, `image4URL` FROM `propertyimages` WHERE `propertyId` = :propertyId');
        $req->bindParam('propertyId', $propertyId, PDO::PARAM_INT);
        $req->execute();

        $propertyImagesModelData = $req->fetch(PDO::FETCH_ASSOC);

        if (!$propertyImagesModelData) {
            // Gérer le cas où aucune commodité n'est trouvée pour la propriété spécifiée
            return null;
        }

        $propertyImages = new PropertyImages($propertyImagesModelData);

        return $propertyImages;
    }

    public function setPropertyImagesModel($propertyId, $imageMainURL, $image1URL, $image2URL, $image3URL, $image4URL)
    {
        $sql = 'INSERT INTO `propertyimages` (`propertyId`, `imageMainURL`, `image1URL`, `image2URL`, `image3URL`, `image4URL`) VALUES (:propertyId, :imageMainURL, :image1URL, :image2URL, :image3URL, :image4URL)';
        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindValue(':propertyId', $propertyId, PDO::PARAM_INT);
        $stmt->bindValue(':imageMainURL', $imageMainURL, PDO::PARAM_STR);
        $stmt->bindValue(':image1URL', $image1URL, PDO::PARAM_STR);
        $stmt->bindValue(':image2URL', $image2URL, PDO::PARAM_STR);
        $stmt->bindValue(':image3URL', $image3URL, PDO::PARAM_STR);
        $stmt->bindValue(':image4URL', $image4URL, PDO::PARAM_STR);
        $stmt->execute();
    }
}
