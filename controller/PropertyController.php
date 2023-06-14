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
                $propertyTypeModel->setPropertyType($propertyType);

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
                $hostLanguageModel->setHostLanguage($hostLanguage);

                header('Location: ' . $router->generate('home'));
            } else {
                $message = 'Oops, something went wrong sorry. Try again later';
                echo self::getRender('addproperty.html.twig', ['message' => $message]);
            }
        }
    }
}
