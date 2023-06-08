<?php

class AccomodationType
{
    private $accommodationTypeId;
    private $propertyId;
    private $piscine;
    private $parkingGratuit;
    private $jacuzzi;
    private $wifi;
    private $laveLinge;
    private $secheLinge;
    private $climatisation;
    private $chauffage;
    private $espaceTravailDedie;
    private $television;
    private $secheCheveux;
    private $ferRepasser;
    private $stationRechargeVehiElectriques;
    private $litBebe;
    private $salleSport;
    private $barbecue;
    private $petitDejeuner;
    private $cheminee;
    private $logementFumeur;
    private $detecteurFumee;
    private $detecteurMonoxyDeCarbone;
    

    public function __construct(array $post)
    {
        $this->hydrate($post);
    }

    private function hydrate(array $post)
    {
        foreach ($post as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    //GETTERS
    public function getAccommodationTypeId()
    {
        return $this->accommodationTypeId;
    }

    public function getPropertyId()
    {
        return $this->propertyId;
    }

    public function getPiscine()
    {
        return $this->piscine;
    }

    public function getParkingGratuit()
    {
        return $this->parkingGratuit;
    }

    public function getJacuzzi()
    {
        return $this->jacuzzi;
    }

    public function getWifi()
    {
        return $this->wifi;
    }

    public function getLaveLinge()
    {
        return $this->laveLinge;
    }

    public function getSecheLinge()
    {
        return $this->secheLinge;
    }

    public function getClimatisation()
    {
        return $this->climatisation;
    }

    public function getChauffage()
    {
        return $this->chauffage;
    }

    public function getEspaceTravailDedie()
    {
        return $this->espaceTravailDedie;
    }

    public function getTelevision()
    {
        return $this->television;
    }

    public function getSecheCheveux()
    {
        return $this->secheCheveux;
    }

    public function getFerRepasser()
    {
        return $this->ferRepasser;
    }

    public function getStationRechargeVehiElectriques()
    {
        return $this->stationRechargeVehiElectriques;
    }

    public function getLitBebe()
    {
        return $this->litBebe;
    }

    public function getSalleSport()
    {
        return $this->salleSport;
    }

    public function getBarbecue()
    {
        return $this->barbecue;
    }

    public function getPetitDejeuner()
    {
        return $this->petitDejeuner;
    }

    public function getCheminee()
    {
        return $this->cheminee;
    }

    public function getLogementFumeur()
    {
        return $this->logementFumeur;
    }

    public function getDetecteurFumee()
    {
        return $this->detecteurFumee;
    }

    public function getDetecteurMonoxyDeCarbone()
    {
        return $this->detecteurMonoxyDeCarbone;
    }

    //SETTERS
    public function setAccommodationTypeId(int $accommodationTypeId)
    {
        $this->accommodationTypeId = $accommodationTypeId;
    }

    public function setPropertyId(int $propertyId)
    {
        $this->propertyId = $propertyId;
    }

    public function setPiscine(bool $piscine)
    {
        $this->piscine = $piscine;
    }

    public function setParkingGratuit(bool $parkingGratuit)
    {
        $this->parkingGratuit = $parkingGratuit;
    }

    public function setJacuzzi(bool $jacuzzi)
    {
        $this->jacuzzi = $jacuzzi;
    }

    public function setWifi(bool $wifi)
    {
        $this->wifi = $wifi;
    }

    public function setLaveLinge(bool $laveLinge)
    {
        $this->laveLinge = $laveLinge;
    }

    public function setSecheLinge(bool $secheLinge)
    {
        $this->secheLinge = $secheLinge;
    }

    public function setClimatisation(bool $climatisation)
    {
        $this->climatisation = $climatisation;
    }

    public function setChauffage(bool $chauffage)
    {
        $this->chauffage = $chauffage;
    }

    public function setEspaceTravailDedie(bool $espaceTravailDedie)
    {
        $this->espaceTravailDedie = $espaceTravailDedie;
    }

    public function setTelevision(bool $television)
    {
        $this->television = $television;
    }

    public function setSecheCheveux(bool $secheCheveux)
    {
        $this->secheCheveux = $secheCheveux;
    }

    public function setFerRepasser(bool $ferRepasser)
    {
        $this->ferRepasser = $ferRepasser;
    }

    public function setStationRechargeVehiElectriques(bool $stationRechargeVehiElectriques)
    {
        $this->stationRechargeVehiElectriques = $stationRechargeVehiElectriques;
    }

    public function setLitBebe(bool $litBebe)
    {
        $this->litBebe = $litBebe;
    }

    public function setSalleSport(bool $salleSport)
    {
        $this->salleSport = $salleSport;
    }

    public function setBarbecue(bool $barbecue)
    {
        $this->barbecue = $barbecue;
    }

    public function setPetitDejeuner(bool $petitDejeuner)
    {
        $this->petitDejeuner = $petitDejeuner;
    }

    public function setCheminee(bool $cheminee)
    {
        $this->cheminee = $cheminee;
    }

    public function setLogementFumeur(bool $logementFumeur)
    {
        $this->logementFumeur = $logementFumeur;
    }

    public function setDetecteurMonoxyDeCarbone(bool $detecteurMonoxyDeCarbone)
    {
        $this->detecteurMonoxyDeCarbone = $detecteurMonoxyDeCarbone;
    }
}
