<?php
class PropertyController extends Controller
{
    public function getOne($id)
    {
        global $router;
        $propertyModel = new PropertyModel();
        $propertyAmenitiesModel = new PropertyAmenitiesModel();
        $houseRulesModel = new HouseRulesModel();
        $accommodationTypeModel = new AccomodationTypeModel();
        $hostLanguageModel = new HostLanguageModel();
        $propertyImagesModel = new PropertyImagesModel();
        $cancellationPolicyModel = new CancellationPolicyModel();
        $commentModel = new CommentModel();
        $propertyTypeModel = new PropertyTypeModel();

        $property = $propertyModel->getOneProperty($id);
        $propertyAmenities = $propertyAmenitiesModel->getPropertyAmenities($id);
        $houseRules = $houseRulesModel->getHouseRules($id);
        $accommodationType = $accommodationTypeModel->getAccomodationTypeModel($id);
        $hostLanguage = $hostLanguageModel->getHostLanguageModel($id);
        $propertyImages = $propertyImagesModel->getPropertyImagesModel($id);
        $cancellationPolicy = $cancellationPolicyModel->getCancellationPolicyModel($id);
        $comment = $commentModel->getCommentModel($id);
        $propertyType = $propertyTypeModel->getPropertyTypeModel($id);


        $oneProperty = $router->generate('baseProperty');
        echo self::getRender('property.html.twig', ['property' => $property, 'oneProperty' => $oneProperty, 'propertyAmenities' => $propertyAmenities, 'houseRules' => $houseRules, 'accommodationType' => $accommodationType, 'hostLanguage' => $hostLanguage, 'propertyImages' => $propertyImages, 'cancellationPolicy' => $cancellationPolicy, 'comment' => $comment, 'propertyType' => $propertyType]);
    }

    // C R U D
    public function createProperty()
    {
        global $router;
        if (!$_POST) {
            echo self::getRender('addproperty.html.twig', []);
        } else {
            if (isset($_POST['submit'])) {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $priceNight = $_POST['price-night'];
                $propertyType = $_POST['property-type'];
                $hostLanguages = isset($_POST['host-languages']) ? $_POST['host-languages'] : [];
                $accomodationTypes = isset($_POST['accommodation-types']) ? $_POST['accommodation-types'] : [];


                $owner = $_SESSION['uid'];

                $property = new Property([
                    'title' => $title,
                    'description' => $description,
                    'priceNight' => $priceNight,
                    'owner' => $owner,
                ]);

                $propertyModel = new PropertyModel();
                $propertyModel->addProperty($property);

                $lastInsertedId = $propertyModel->getLastInsertedId(); // Récupérer l'ID de la dernière insertion

                $propertyType = new PropertyType([
                    'propertyId' => $lastInsertedId,
                    'house' => ($propertyType === 'house') ? 1 : 0,
                    'flat' => ($propertyType === 'flat') ? 1 : 0,
                    'guesthouse' => ($propertyType === 'guesthouse') ? 1 : 0,
                    'hotel' => ($propertyType === 'hotel') ? 1 : 0,
                ]);

                $propertyTypeModel = new PropertyTypeModel();
                $propertyTypeModel->setPropertyTypeModel($propertyType);

                $hostLanguage = new HostLanguage([
                    'propertyId' => $lastInsertedId,
                    'anglais' => in_array('anglais', (array) $hostLanguages) ? 1 : 0,
                    'français' => in_array('français', (array) $hostLanguages) ? 1 : 0,
                    'allemand' => in_array('allemand', (array) $hostLanguages) ? 1 : 0,
                    'japonais' => in_array('japonais', (array) $hostLanguages) ? 1 : 0,
                    'italien' => in_array('italien', (array) $hostLanguages) ? 1 : 0,
                    'russe' => in_array('russe', (array) $hostLanguages) ? 1 : 0,
                    'espagnol' => in_array('espagnol', (array) $hostLanguages) ? 1 : 0,
                    'chinois' => in_array('chinois', (array) $hostLanguages) ? 1 : 0,
                    'arabe' => in_array('arabe', (array) $hostLanguages) ? 1 : 0,
                ]);

                $hostLanguageModel = new HostLanguageModel();
                $hostLanguageModel->setHostLanguageModel($hostLanguage);


                $accomodationType = new AccomodationType([
                    'propertyId' => $lastInsertedId,
                    'piscine' => in_array('piscine', (array) $accomodationTypes) ? 1 : 0,
                    'parkingGratuit' => in_array('parkingGratuit', (array) $accomodationTypes) ? 1 : 0,
                    'jacuzzi' => in_array('jacuzzi', (array) $accomodationTypes) ? 1 : 0,
                    'wifi' => in_array('wifi', (array) $accomodationTypes) ? 1 : 0,
                    'laveLinge' => in_array('laveLinge', (array) $accomodationTypes) ? 1 : 0,
                    'secheLinge' => in_array('secheLinge', (array) $accomodationTypes) ? 1 : 0,
                    'climatisation' => in_array('climatisation', (array) $accomodationTypes) ? 1 : 0,
                    'chauffage' => in_array('chauffage', (array) $accomodationTypes) ? 1 : 0,
                    'espaceTravailDedie' => in_array('espaceTravailDedie', (array) $accomodationTypes) ? 1 : 0,
                    'television' => in_array('television', (array) $accomodationTypes) ? 1 : 0,
                    'secheCheveux' => in_array('secheCheveux', (array) $accomodationTypes) ? 1 : 0,
                    'ferRepasser' => in_array('ferRepasser', (array) $accomodationTypes) ? 1 : 0,
                    'stationRechargeVehiElectriques' => in_array('stationRechargeVehiElectriques', (array) $accomodationTypes) ? 1 : 0,
                    'litBebe' => in_array('litBebe', (array) $accomodationTypes) ? 1 : 0,
                    'salleSport' => in_array('salleSport', (array) $accomodationTypes) ? 1 : 0,
                    'barbecue' => in_array('barbecue', (array) $accomodationTypes) ? 1 : 0,
                    'petitDejeuner' => in_array('petitDejeuner', (array) $accomodationTypes) ? 1 : 0,
                    'cheminee' => in_array('cheminee', (array) $accomodationTypes) ? 1 : 0,
                    'logementFumeur' => in_array('logementFumeur', (array) $accomodationTypes) ? 1 : 0,
                    'detecteurFumee' => in_array('detecteurFumee', (array) $accomodationTypes) ? 1 : 0,
                    'detecteurMonoxyDeCarbone' => in_array('detecteurMonoxyDeCarbone', (array) $accomodationTypes) ? 1 : 0
                ]);

                $accomodationTypeModel = new AccomodationTypeModel();
                $accomodationTypeModel->setAccomodationTypeModel($accomodationType);


                header('Location: ' . $router->generate('home'));
            } else {
                $message = 'Oops, something went wrong sorry. Try again later';
                echo self::getRender('addproperty.html.twig', ['message' => $message]);
            }
        }
    }
}
