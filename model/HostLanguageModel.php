<?php
class HostLanguageModel extends Model
{
    public function getHostLanguageModel(int $propertyId)
    {
        $req = $this->getDb()->prepare('SELECT `anglais`, `français`, `allemand`, `japonais`, `italien`, `russe`, `espagnol`, `chinois`, `arabe` FROM `hostlanguage` WHERE `propertyId` = :propertyId');
        $req->bindParam('propertyId', $propertyId, PDO::PARAM_INT);
        $req->execute();

        $hostLanguageModelData = $req->fetch(PDO::FETCH_ASSOC);

        if (!$hostLanguageModelData) {
            // Gérer le cas où aucune commodité n'est trouvée pour la propriété spécifiée
            return null;
        }

        $hostLanguage = new HostLanguage($hostLanguageModelData);

        return $hostLanguage;
    }
}
