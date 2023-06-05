<?php
class TagModel extends Model
{

    public function getAllTags()
    {
        $tags = [];

        $req = $this->getDb()->query('SELECT `tagId`, `type` FROM `tag`');

        while ($tag = $req->fetch(PDO::FETCH_ASSOC)) {
            $tags[] = new Tag($tag);
        }

        $req->closeCursor();

        return $tags;
    }

    public function getBestTags()
    {
        $tags = [];

        $req = $this->getDb()->query('SELECT `tagId`, `type` FROM `tag` ORDER BY `tagId` DESC LIMIT 5');

        while ($tag = $req->fetch(PDO::FETCH_ASSOC)) {
            $tags[] = new Tag($tag);
        }

        $req->closeCursor();

        return $tags;
    }
}
