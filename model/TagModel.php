<?php
class TagModel extends Model
{

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
}
