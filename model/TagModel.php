<?php
class TagModel extends Model
{
    public function getTagsId($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            $tagIds[] = $tag->tagId;
        }
        return $tagIds;
    }

    public function getAllTags()
    {
        $tags = [];

        $req = $this->getDb()->query('SELECT `tagId`, `type`, `picto` FROM `tag`');

        while ($tag = $req->fetch(PDO::FETCH_ASSOC)) {
            $tags[] = new Tag($tag);
        }

        return $tags;
    }

    public function getBestTags()
    {
        $bestTags = [];

        $req = $this->getDb()->query('SELECT `tagId`, `type`, `picto` FROM `tag` ORDER BY `tagId` DESC LIMIT 5');

        while ($bestTag = $req->fetch(PDO::FETCH_ASSOC)) {
            $bestTags[] = new Tag($bestTag);
        }

        return $bestTags;
    }

    public function getLastFiveTagsChateaux()
    {
        $query = "SELECT `property`.`propertyId`, `property`.`title`, `property`.`priceNight`, `propertyimages`.`propertyImagesId`, `propertyimages`.`propertyId`, `propertyimages`.`imageMainURL`, `propertyimages`.`image1URL`, `propertyimages`.`image2URL`, `propertyimages`.`image3URL`, `propertyimages`.`image4URL`, `tag`.`tagId` FROM `property` INNER JOIN `propertytag` ON `property`.`propertyId` = `propertytag`.`propertyId` INNER JOIN `tag` ON `propertytag`.`tagId` = `tag`.`tagId` INNER JOIN `propertyimages` ON `property`.`propertyId` = `propertyimages`.`propertyId` WHERE `tag`.`tagId` = :tagId ORDER BY `property`.`propertyId` DESC LIMIT 4";

        $stmt = $this->getDb()->prepare($query);
        $stmt->bindValue(':tagId', 392, PDO::PARAM_INT);
        $stmt->execute();

        $lastTags = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $lastTags;
    }

    public function getLastTagChateaux()
    {
        $query = "SELECT `property`.`propertyId`, `property`.`title`, `property`.`priceNight`, `propertyimages`.`propertyImagesId`, `propertyimages`.`propertyId`, `propertyimages`.`imageMainURL`, `propertyimages`.`image1URL`, `propertyimages`.`image2URL`, `propertyimages`.`image3URL`, `propertyimages`.`image4URL`, `tag`.`tagId` FROM `property` INNER JOIN `propertytag` ON `property`.`propertyId` = `propertytag`.`propertyId` INNER JOIN `tag` ON `propertytag`.`tagId` = `tag`.`tagId`
              INNER JOIN `propertyimages` ON `property`.`propertyId` = `propertyimages`.`propertyId`
              WHERE `tag`.`tagId` = :tagId
              LIMIT 1";

        $stmt = $this->getDb()->prepare($query);
        $stmt->bindValue(':tagId', 392, PDO::PARAM_INT);
        $stmt->execute();

        $lastTagChateaux = $stmt->fetch(PDO::FETCH_ASSOC);

        return $lastTagChateaux;
    }

    public function getSelectedTagsForProperty($propertyId)
    {
        $sql = 'SELECT `tagId` FROM `propertytag` WHERE `propertyId` = :propertyId';
        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindValue(':propertyId', $propertyId, PDO::PARAM_INT);
        $stmt->execute();

        // Récupérer tous les résultats en tant que tableau d'identifiants de tags
        $tagIds = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

        return $tagIds;
    }

    public function getPropertyIdByTagId($tagId)
    {
        $sql = 'SELECT `propertyId` FROM `propertytag` WHERE `tagId` = :tagId';
        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindValue(':tagId', $tagId, PDO::PARAM_INT);
        $stmt->execute();

        // Récupérer tous les résultats en tant que tableau d'identifiants de tags
        $propertyIds = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

        return $propertyIds;
    }

    public function editSelectedTagsForProperty($propertyId, $newTags)
    {
        // Récupération des tags existants
        $sql = 'SELECT `tagId` FROM `propertytag` WHERE `propertyId` = :propertyId';
        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindValue(':propertyId', $propertyId, PDO::PARAM_INT);
        $stmt->execute();
        $existingTags = $stmt->fetchAll(PDO::FETCH_COLUMN);

        // Suppression des tags qui n'ont pas été cochés
        $tagsToRemove = array_diff($existingTags, $newTags);
        if (!empty($tagsToRemove)) {
            $sql = 'DELETE FROM `propertytag` WHERE `propertyId` = :propertyId AND `tagId` IN (' . implode(',', $tagsToRemove) . ')';
            $stmt = $this->getDb()->prepare($sql);
            $stmt->bindValue(':propertyId', $propertyId, PDO::PARAM_INT);
            $stmt->execute();
        }

        // Ajout des tags qui ont été nouvellement cochés
        $tagsToAdd = array_diff($newTags, $existingTags);
        if (!empty($tagsToAdd)) {
            $sql = 'INSERT INTO `propertytag` (`propertyId`, `tagId`) VALUES (:propertyId, :tagId)';
            $stmt = $this->getDb()->prepare($sql);
            foreach ($tagsToAdd as $tagId) {
                $stmt->bindValue(':propertyId', $propertyId, PDO::PARAM_INT);
                $stmt->bindValue(':tagId', $tagId, PDO::PARAM_INT);
                $stmt->execute();
            }
        }
    }

    public function setTagsModel($propertyId, $tags)
    {
        $sql = 'INSERT INTO `propertytag` (`propertyId`, `tagId`) VALUES (:propertyId, :tagId)';
        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindValue(':propertyId', $propertyId, PDO::PARAM_INT);

        foreach ($tags as $tagId) {
            $stmt->bindValue(':tagId', $tagId, PDO::PARAM_INT);
            $stmt->execute();
        }
    }
}
