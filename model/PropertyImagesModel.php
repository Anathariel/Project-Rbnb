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
}
