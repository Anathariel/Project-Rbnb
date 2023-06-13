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
        public function createProperty(){
            global $router;
            if (!$_POST) {
                echo self::getRender('addproperty.html.twig', []);
            } else {
                if (isset($_POST['submit'])) {
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $priceNight = $_POST['price-night'];
                    // $propertyType = $_POST['property-type'];


                    $owner = $_SESSION['uid'];
    
                    $property = new Property([
                        'title' => $title,
                        'description' => $description,
                        'priceNight' => $priceNight,
                        'owner' => $owner,
                    ]);

                    // $propertyType = new PropertyType([
                    //     'propertyId ' => $owner,
                    //     'house' => $house,
                    //     'flat' => $flat,
                    //     'guesthouse' => $guesthouse,
                    //     'hotel' => $hotel,
                    // ]);
    
                    $model = new PropertyModel();
                    $model->addProperty($property);
                    header('Location: ' . $router->generate('dashboard'));
                } else {
                    $message = 'Oops, something went wrong sorry. Try again later';
                    echo self::getrender('addproperty.html.twig', ['message' => $message]);
                }
            }
        }
}
