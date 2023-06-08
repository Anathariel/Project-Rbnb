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

        $accomodationType = new PropertyAmenities($accomodationTypeData);

        return $accomodationType;
    }
}
