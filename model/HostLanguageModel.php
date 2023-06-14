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

        $hostLanguage = new HostLanguage($hostLanguageModelData);

        return $hostLanguage;
    }

    public function setHostLanguage(HostLanguage $hostLanguage)
{
    $propertyId = $hostLanguage->getPropertyId();
    $anglais = $hostLanguage->getAnglais();
    $français = $hostLanguage->getFrançais();
    $allemand = $hostLanguage->getAllemand();
    $japonais = $hostLanguage->getJaponais();
    $italien = $hostLanguage->getItalien();
    $russe = $hostLanguage->getRusse();
    $espagnol = $hostLanguage->getEspagnol();
    $chinois = $hostLanguage->getChinois();
    $arabe = $hostLanguage->getArabe();

    $req = $this->getDb()->prepare('INSERT INTO `hostLanguage`(`propertyId`, `anglais`, `français`, `allemand`, `japonais`, `italien`, `russe`, `espagnol`, `chinois`, `arabe`) VALUES (:propertyId, :anglais, :francais, :allemand, :japonais, :italien, :russe, :espagnol, :chinois, :arabe)');

    $req->bindParam('propertyId', $propertyId, PDO::PARAM_INT);
    $req->bindParam('anglais', $anglais, PDO::PARAM_BOOL);
    $req->bindParam('francais', $français, PDO::PARAM_BOOL);
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
