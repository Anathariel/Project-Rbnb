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
        $lastTags = [];

        $req = $this->getDb()->query("SELECT `tagId`, `type`, `picto` FROM `tag` WHERE `type` = 'Châteaux' ORDER BY `tagId` DESC LIMIT 5");

        while ($lastTag = $req->fetch(PDO::FETCH_ASSOC)) {
            $lastTags[] = new Tag($lastTag);
        }

        return $lastTags;
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

    public function editTagsModel($propertyId, $newTags)
    {
        // Supprime toutes les étiquettes existantes de la propriété
        $sql = 'DELETE FROM `propertytag` WHERE `propertyId` = :propertyId';
        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindValue(':propertyId', $propertyId, PDO::PARAM_INT);
        $stmt->execute();

        // Ajoute les nouvelles étiquettes à la propriété
        $sql = 'INSERT INTO `propertytag` (`propertyId`, `tagId`) VALUES (:propertyId, :tagId)';
        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindValue(':propertyId', $propertyId, PDO::PARAM_INT);

        foreach ($newTags as $tagId) {
            $stmt->bindValue(':tagId', $tagId, PDO::PARAM_INT);
            $stmt->execute();
        }
    }
}
