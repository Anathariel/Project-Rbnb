<?php
class AccomodationTypeModel extends Model
{
    public function getAccomodationTypeModel(int $propertyId)
    {
        $req = $this->getDb()->prepare('SELECT `piscine`, `parkingGratuit`, `jacuzzi`, `wifi`, `laveLinge`, `secheLinge`, `climatisation`, `chauffage`, `espaceTravailDedie`, `television`, `secheCheveux`, `ferRepasser`, `stationRechargeVehiElectriques`, `litBebe`, `salleSport`, `barbecue`, `petitDejeuner`, `cheminee`, `logementFumeur`, `detecteurFumee`, `detecteurMonoxyDeCarbone` FROM `accommodationtype` WHERE `propertyId` = :propertyId');
        $req->bindParam('propertyId', $propertyId, PDO::PARAM_INT);
        $req->execute();

        $accomodationTypeData = $req->fetch(PDO::FETCH_ASSOC);

        if (!$accomodationTypeData) {
            // Gérer le cas où aucune commodité n'est trouvée pour la propriété spécifiée
            return null;
        }

        $accomodationType = new AccomodationType($accomodationTypeData);

        return $accomodationType;
    }

    public function setAccomodationTypeModel(AccomodationType $accomodationType)
    {
        $propertyId = $accomodationType->getPropertyId();
        $piscine = $accomodationType->getPiscine();
        $parkingGratuit = $accomodationType->getParkingGratuit();
        $jacuzzi = $accomodationType->getJacuzzi();
        $wifi = $accomodationType->getWifi();
        $laveLinge = $accomodationType->getLaveLinge();
        $secheLinge = $accomodationType->getSecheLinge();
        $climatisation = $accomodationType->getClimatisation();
        $chauffage = $accomodationType->getChauffage();
        $espaceTravailDedie = $accomodationType->getEspaceTravailDedie();
        $television = $accomodationType->getTelevision();
        $secheCheveux = $accomodationType->getSecheCheveux();
        $ferRepasser = $accomodationType->getFerRepasser();
        $stationRechargeVehiElectriques = $accomodationType->getStationRechargeVehiElectriques();
        $litBebe = $accomodationType->getLitBebe();
        $salleSport = $accomodationType->getSalleSport();
        $barbecue = $accomodationType->getBarbecue();
        $petitDejeuner = $accomodationType->getPetitDejeuner();
        $cheminee = $accomodationType->getCheminee();
        $logementFumeur = $accomodationType->getLogementFumeur();
        $detecteurFumee = $accomodationType->getDetecteurFumee();
        $detecteurMonoxyDeCarbone = $accomodationType->getDetecteurMonoxyDeCarbone();

        $req = $this->getDb()->prepare('INSERT INTO `accommodationtype`(`propertyId`, `piscine`, `parkingGratuit`, `jacuzzi`, `wifi`, `laveLinge`, `secheLinge`, `climatisation`, `chauffage`, `espaceTravailDedie`, `television`, `secheCheveux`, `ferRepasser`, `stationRechargeVehiElectriques`, `litBebe`, `salleSport`, `barbecue`, `petitDejeuner`, `cheminee`, `logementFumeur`, `detecteurFumee`, `detecteurMonoxyDeCarbone`) VALUES (:propertyId, :piscine, :parkingGratuit, :jacuzzi, :wifi, :laveLinge, :secheLinge, :climatisation, :chauffage, :espaceTravailDedie, :television, :secheCheveux, :ferRepasser, :stationRechargeVehiElectriques, :litBebe, :salleSport, :barbecue, :petitDejeuner, :cheminee, :logementFumeur, :detecteurFumee, :detecteurMonoxyDeCarbone)');

        $req->bindParam('propertyId', $propertyId, PDO::PARAM_INT);
        $req->bindParam('piscine', $piscine, PDO::PARAM_BOOL);
        $req->bindParam('parkingGratuit', $parkingGratuit, PDO::PARAM_BOOL);
        $req->bindParam('jacuzzi', $jacuzzi, PDO::PARAM_BOOL);
        $req->bindParam('wifi', $wifi, PDO::PARAM_BOOL);
        $req->bindParam('laveLinge', $laveLinge, PDO::PARAM_BOOL);
        $req->bindParam('secheLinge', $secheLinge, PDO::PARAM_BOOL);
        $req->bindParam('climatisation', $climatisation, PDO::PARAM_BOOL);
        $req->bindParam('chauffage', $chauffage, PDO::PARAM_BOOL);
        $req->bindParam('espaceTravailDedie', $espaceTravailDedie, PDO::PARAM_BOOL);
        $req->bindParam('television', $television, PDO::PARAM_BOOL);
        $req->bindParam('secheCheveux', $secheCheveux, PDO::PARAM_BOOL);
        $req->bindParam('ferRepasser', $ferRepasser, PDO::PARAM_BOOL);
        $req->bindParam('stationRechargeVehiElectriques', $stationRechargeVehiElectriques, PDO::PARAM_BOOL);
        $req->bindParam('litBebe', $litBebe, PDO::PARAM_BOOL);
        $req->bindParam('salleSport', $salleSport, PDO::PARAM_BOOL);
        $req->bindParam('barbecue', $barbecue, PDO::PARAM_BOOL);
        $req->bindParam('petitDejeuner', $petitDejeuner, PDO::PARAM_BOOL);
        $req->bindParam('cheminee', $cheminee, PDO::PARAM_BOOL);
        $req->bindParam('logementFumeur', $logementFumeur, PDO::PARAM_BOOL);
        $req->bindParam('detecteurFumee', $detecteurFumee, PDO::PARAM_BOOL);
        $req->bindParam('detecteurMonoxyDeCarbone', $detecteurMonoxyDeCarbone, PDO::PARAM_BOOL);

        $req->execute();
    }

    public function editAccomodationTypeModel(AccomodationType $accomodationType)
    {
        $propertyId = $accomodationType->getPropertyId();
        $piscine = $accomodationType->getPiscine();
        $parkingGratuit = $accomodationType->getParkingGratuit();
        $jacuzzi = $accomodationType->getJacuzzi();
        $wifi = $accomodationType->getWifi();
        $laveLinge = $accomodationType->getLaveLinge();
        $secheLinge = $accomodationType->getSecheLinge();
        $climatisation = $accomodationType->getClimatisation();
        $chauffage = $accomodationType->getChauffage();
        $espaceTravailDedie = $accomodationType->getEspaceTravailDedie();
        $television = $accomodationType->getTelevision();
        $secheCheveux = $accomodationType->getSecheCheveux();
        $ferRepasser = $accomodationType->getFerRepasser();
        $stationRechargeVehiElectriques = $accomodationType->getStationRechargeVehiElectriques();
        $litBebe = $accomodationType->getLitBebe();
        $salleSport = $accomodationType->getSalleSport();
        $barbecue = $accomodationType->getBarbecue();
        $petitDejeuner = $accomodationType->getPetitDejeuner();
        $cheminee = $accomodationType->getCheminee();
        $logementFumeur = $accomodationType->getLogementFumeur();
        $detecteurFumee = $accomodationType->getDetecteurFumee();
        $detecteurMonoxyDeCarbone = $accomodationType->getDetecteurMonoxyDeCarbone();

        $req = $this->getDb()->prepare('UPDATE `accommodationtype` SET `piscine` = :piscine, `parkingGratuit` = :parkingGratuit, `jacuzzi` = :jacuzzi, `wifi` = :wifi, `laveLinge` = :laveLinge, `secheLinge` = :secheLinge, `climatisation` = :climatisation, `chauffage` = :chauffage, `espaceTravailDedie` = :espaceTravailDedie, `television` = :television, `secheCheveux` = :secheCheveux, `ferRepasser` = :ferRepasser, `stationRechargeVehiElectriques` = :stationRechargeVehiElectriques, `litBebe` = :litBebe, `salleSport` = :salleSport, `barbecue` = :barbecue, `petitDejeuner` = :petitDejeuner, `cheminee` = :cheminee, `logementFumeur` = :logementFumeur, `detecteurFumee` = :detecteurFumee, `detecteurMonoxyDeCarbone` = :detecteurMonoxyDeCarbone WHERE `propertyId` = :propertyId');

        $req->bindParam('propertyId', $propertyId, PDO::PARAM_INT);
        $req->bindParam('piscine', $piscine, PDO::PARAM_BOOL);
        $req->bindParam('parkingGratuit', $parkingGratuit, PDO::PARAM_BOOL);
        $req->bindParam('jacuzzi', $jacuzzi, PDO::PARAM_BOOL);
        $req->bindParam('wifi', $wifi, PDO::PARAM_BOOL);
        $req->bindParam('laveLinge', $laveLinge, PDO::PARAM_BOOL);
        $req->bindParam('secheLinge', $secheLinge, PDO::PARAM_BOOL);
        $req->bindParam('climatisation', $climatisation, PDO::PARAM_BOOL);
        $req->bindParam('chauffage', $chauffage, PDO::PARAM_BOOL);
        $req->bindParam('espaceTravailDedie', $espaceTravailDedie, PDO::PARAM_BOOL);
        $req->bindParam('television', $television, PDO::PARAM_BOOL);
        $req->bindParam('secheCheveux', $secheCheveux, PDO::PARAM_BOOL);
        $req->bindParam('ferRepasser', $ferRepasser, PDO::PARAM_BOOL);
        $req->bindParam('stationRechargeVehiElectriques', $stationRechargeVehiElectriques, PDO::PARAM_BOOL);
        $req->bindParam('litBebe', $litBebe, PDO::PARAM_BOOL);
        $req->bindParam('salleSport', $salleSport, PDO::PARAM_BOOL);
        $req->bindParam('barbecue', $barbecue, PDO::PARAM_BOOL);
        $req->bindParam('petitDejeuner', $petitDejeuner, PDO::PARAM_BOOL);
        $req->bindParam('cheminee', $cheminee, PDO::PARAM_BOOL);
        $req->bindParam('logementFumeur', $logementFumeur, PDO::PARAM_BOOL);
        $req->bindParam('detecteurFumee', $detecteurFumee, PDO::PARAM_BOOL);
        $req->bindParam('detecteurMonoxyDeCarbone', $detecteurMonoxyDeCarbone, PDO::PARAM_BOOL);

        $req->execute();
    }
}
