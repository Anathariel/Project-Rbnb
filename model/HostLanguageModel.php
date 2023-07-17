<?php
class HostLanguageModel extends Model
{
    public function getHostLanguageModel(int $propertyId)
    {
        $req = $this->getDb()->prepare('SELECT `anglais`, `français`, `allemand`, `japonais`, `italien`, `russe`, `espagnol`, `chinois`, `arabe` FROM `hostlanguage` WHERE `propertyId` = :propertyId');
        $req->bindParam('propertyId', $propertyId, PDO::PARAM_STR);
        $req->execute();

        $hostLanguageModelData = $req->fetch(PDO::FETCH_ASSOC);

        if (!$hostLanguageModelData) {
            // Gérer le cas où aucune commodité n'est trouvée pour la propriété spécifiée
            return null;
        }

        // convert keys to english for compatibility with Twig template
        $englishKeys = ['english', 'french', 'german', 'japanese', 'italian', 'russian', 'spanish', 'chinese', 'arabic'];
        $hostLanguage = array_combine($englishKeys, array_values($hostLanguageModelData));

        return $hostLanguage;
    }


    public function setHostLanguageModel(array $hostLanguage)
    {
        $propertyId = $hostLanguage['propertyId'];
        $anglais = $hostLanguage['english'] ? 1 : 0;
        $francais = $hostLanguage['french'] ? 1 : 0;
        $allemand = $hostLanguage['german'] ? 1 : 0;
        $japonais = $hostLanguage['japanese'] ? 1 : 0;
        $italien = $hostLanguage['italian'] ? 1 : 0;
        $russe = $hostLanguage['russian'] ? 1 : 0;
        $espagnol = $hostLanguage['spanish'] ? 1 : 0;
        $chinois = $hostLanguage['chinese'] ? 1 : 0;
        $arabe = $hostLanguage['arabic'] ? 1 : 0;

        $req = $this->getDb()->prepare('INSERT INTO `hostLanguage`(`propertyId`, `anglais`, `français`, `allemand`, `japonais`, `italien`, `russe`, `espagnol`, `chinois`, `arabe`) VALUES (:propertyId, :anglais, :francais, :allemand, :japonais, :italien, :russe, :espagnol, :chinois, :arabe)');

        $req->bindParam('propertyId', $propertyId, PDO::PARAM_INT);
        $req->bindParam('anglais', $anglais, PDO::PARAM_BOOL);
        $req->bindParam('francais', $francais, PDO::PARAM_BOOL);
        $req->bindParam('allemand', $allemand, PDO::PARAM_BOOL);
        $req->bindParam('japonais', $japonais, PDO::PARAM_BOOL);
        $req->bindParam('italien', $italien, PDO::PARAM_BOOL);
        $req->bindParam('russe', $russe, PDO::PARAM_BOOL);
        $req->bindParam('espagnol', $espagnol, PDO::PARAM_BOOL);
        $req->bindParam('chinois', $chinois, PDO::PARAM_BOOL);
        $req->bindParam('arabe', $arabe, PDO::PARAM_BOOL);

        $req->execute();
    }

    public function editHostLanguageModel(array $hostLanguage)
    {
        $propertyId = $hostLanguage['propertyId'];
        $anglais = $hostLanguage['english'] ? 1 : 0;
        $francais = $hostLanguage['french'] ? 1 : 0;
        $allemand = $hostLanguage['german'] ? 1 : 0;
        $japonais = $hostLanguage['japanese'] ? 1 : 0;
        $italien = $hostLanguage['italian'] ? 1 : 0;
        $russe = $hostLanguage['russian'] ? 1 : 0;
        $espagnol = $hostLanguage['spanish'] ? 1 : 0;
        $chinois = $hostLanguage['chinese'] ? 1 : 0;
        $arabe = $hostLanguage['arabic'] ? 1 : 0;

        $req = $this->getDb()->prepare('UPDATE `hostlanguage` SET `anglais` = :anglais, `français` = :francais, `allemand` = :allemand, `japonais` = :japonais, `italien` = :italien, `russe` = :russe, `espagnol` = :espagnol, `chinois` = :chinois, `arabe` = :arabe WHERE `propertyId` = :propertyId');

        $req->bindParam('propertyId', $propertyId, PDO::PARAM_INT);
        $req->bindParam('anglais', $anglais, PDO::PARAM_BOOL);
        $req->bindParam('francais', $francais, PDO::PARAM_BOOL);
        $req->bindParam('allemand', $allemand, PDO::PARAM_BOOL);
        $req->bindParam('japonais', $japonais, PDO::PARAM_BOOL);
        $req->bindParam('italien', $italien, PDO::PARAM_BOOL);
        $req->bindParam('russe', $russe, PDO::PARAM_BOOL);
        $req->bindParam('espagnol', $espagnol, PDO::PARAM_BOOL);
        $req->bindParam('chinois', $chinois, PDO::PARAM_BOOL);
        $req->bindParam('arabe', $arabe, PDO::PARAM_BOOL);

        $req->execute();
    }
}
