<?php

require_once 'uploadFile.php';

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
        $propertyType = $propertyTypeModel->getPropertyTypeModel($id);
        $comments = $commentModel->getCommentModel($id);
        $averageRating = $commentModel->getAverageRating($id);
        $propertyCount = $propertyModel->countUserProperties($property->getOwner()['uid']);


        $oneProperty = $router->generate('baseProperty');
        echo self::getRender('property.html.twig', ['property' => $property, 'oneProperty' => $oneProperty, 'propertyCount' => $propertyCount, 'propertyAmenities' => $propertyAmenities, 'houseRules' => $houseRules, 'accommodationType' => $accommodationType, 'hostLanguage' => $hostLanguage, 'propertyImages' => $propertyImages, 'cancellationPolicy' => $cancellationPolicy, 'comments' => $comments, 'propertyType' => $propertyType, 'averageRating' => $averageRating]);
    }

    // C R U D
    public function createProperty()
    {
        global $router;
        if (!$_POST) {
            $userId = $_SESSION['uid'];
            $userModel = new UserModel();
            $user = $userModel->getUserById($userId);
            $firstName = $user->getFirstName();
            $email = $user->getEmail();

            echo self::getRender('addproperty.html.twig', [
                'id' => $user,
                'firstName' => $firstName,
                'email' => $email,
            ]);
        } else {
            if (isset($_POST['submit'])) {
                $title = isset($_POST['title']) ? $_POST['title'] : '';
                $description = isset($_POST['description']) ? $_POST['description'] : '';
                $priceNight = isset($_POST['price-night']) ? $_POST['price-night'] : '';
                $address = isset($_POST['address']) ? $_POST['address'] : '';
                $city = isset($_POST['city']) ? $_POST['city'] : '';
                $postalCode = isset($_POST['postalCode']) ? $_POST['postalCode'] : '';
                $department = isset($_POST['department']) ? $_POST['department'] : '';
                $region = isset($_POST['region']) ? $_POST['region'] : '';
                $country = isset($_POST['country']) ? $_POST['country'] : '';
                $latitude = isset($_POST['latitude']) ? $_POST['latitude'] : '';
                $longitude = isset($_POST['longitude'])? $_POST['longitude'] : '';

                $propertyType = $_POST['property-type'];

                $hostLanguages = isset($_POST['host-languages']) ? $_POST['host-languages'] : [];

                $accomodationTypes = isset($_POST['accommodation-types']) ? $_POST['accommodation-types'] : [];

                $checkInTime = $_POST['check-in-time'];
                $checkOutTime = $_POST['check-out-time'];
                $maxGuests = $_POST['max-guests'];

                $tags = isset($_POST['tags']) ? $_POST['tags'] : [];

                $owner = $_SESSION['uid'];

                $property = new Property([
                    'title' => $title,
                    'description' => $description,
                    'priceNight' => $priceNight,
                    'address' => $address,
                    'city' => $city,
                    'postalCode' => $postalCode,
                    'department' => $department,
                    'region' => $region,
                    'country' => $country,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'owner' => $owner,
                ]);

                $propertyModel = new PropertyModel();
                $propertyModel->addProperty($property);

                $lastInsertedId = $propertyModel->getLastInsertedId(); // Récupérer l'ID de la dernière insertion


                $imageMainURL = '';
                $image1URL = '';
                $image2URL = '';
                $image3URL = '';
                $image4URL = '';

                if (isset($_FILES['imageMain']['name']) && !empty($_FILES['imageMain']['name'])) {
                    $uploadDir = 'asset/media/locations/';
                    $imageMainURL = uploadFile($_FILES['imageMain'], $uploadDir);
                }

                if (isset($_FILES['image1']['name']) && !empty($_FILES['image1']['name'])) {
                    $uploadDir = 'asset/media/locations/';
                    $image1URL = uploadFile($_FILES['image1'], $uploadDir);
                }

                if (isset($_FILES['image2']['name']) && !empty($_FILES['image2']['name'])) {
                    $uploadDir = 'asset/media/locations/';
                    $image2URL = uploadFile($_FILES['image2'], $uploadDir);
                }

                if (isset($_FILES['image3']['name']) && !empty($_FILES['image3']['name'])) {
                    $uploadDir = 'asset/media/locations/';
                    $image3URL = uploadFile($_FILES['image3'], $uploadDir);
                }

                if (isset($_FILES['image4']['name']) && !empty($_FILES['image4']['name'])) {
                    $uploadDir = 'asset/media/locations/';
                    $image4URL = uploadFile($_FILES['image4'], $uploadDir);
                }

                $propertyImagesModel = new PropertyImagesModel();
                $propertyImagesModel->setPropertyImagesModel($lastInsertedId, $imageMainURL, $image1URL, $image2URL, $image3URL, $image4URL);


                $propertyType = new PropertyType([
                    'propertyId' => $lastInsertedId,
                    'house' => ($propertyType === 'house') ? 1 : 0,
                    'flat' => ($propertyType === 'flat') ? 1 : 0,
                    'guesthouse' => ($propertyType === 'guesthouse') ? 1 : 0,
                    'hotel' => ($propertyType === 'hotel') ? 1 : 0,
                ]);

                $propertyTypeModel = new PropertyTypeModel();
                $propertyTypeModel->setPropertyTypeModel($propertyType);

                $hostLanguage = [
                    'propertyId' => $lastInsertedId,
                    'english' => in_array('anglais', (array) $hostLanguages) ? 1 : 0,
                    'french' => in_array('français', (array) $hostLanguages) ? 1 : 0,
                    'german' => in_array('allemand', (array) $hostLanguages) ? 1 : 0,
                    'japanese' => in_array('japonais', (array) $hostLanguages) ? 1 : 0,
                    'italian' => in_array('italien', (array) $hostLanguages) ? 1 : 0,
                    'russian' => in_array('russe', (array) $hostLanguages) ? 1 : 0,
                    'spanish' => in_array('espagnol', (array) $hostLanguages) ? 1 : 0,
                    'chinese' => in_array('chinois', (array) $hostLanguages) ? 1 : 0,
                    'arabic' => in_array('arabe', (array) $hostLanguages) ? 1 : 0,
                ];

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


                $houseRules = new HouseRules([
                    'propertyId' => $lastInsertedId,
                    'checkInTime' => $checkInTime,
                    'checkOutTime' => $checkOutTime,
                    'maxGuests' => $maxGuests
                ]);

                $houseRulesModel = new HouseRulesModel();
                $houseRulesModel->setHouseRulesModel($houseRules);

                $propertyAmenities = new PropertyAmenities([
                    'propertyId' => $lastInsertedId,
                    'bedrooms' => $_POST['bedrooms'],
                    'beds' => $_POST['beds'],
                    'bathrooms' => $_POST['bathrooms'],
                    'toilets' => $_POST['toilets']
                ]);

                $propertyAmenitiesModel = new PropertyAmenitiesModel();
                $propertyAmenitiesModel->setPropertyAmenitiesModel($propertyAmenities);

                $tags = isset($_POST['tags']) ? $_POST['tags'] : [];
                $tagModel = new TagModel();
                $tagModel->setTagsModel($lastInsertedId, $tags);


                header('Location: ' . $router->generate('home'));
            } else {
                $message = 'Oops, something went wrong sorry. Try again later';
                echo self::getRender('addproperty.html.twig', ['message' => $message]);
            }
        }
    }

    public function editProperty($id)
    {
        global $router;
        $propertyModel = new PropertyModel();
        $hostLanguageModel = new HostLanguageModel();
        $accommodationTypeModel = new AccomodationTypeModel();
        $propertyTypeModel = new PropertyTypeModel();
        $houseRulesModel = new HouseRulesModel();
        $propertyAmenitiesModel = new PropertyAmenitiesModel();
        $tagModel = new TagModel();
        $propertyImagesModel = new PropertyImagesModel();

        $property = $propertyModel->getOneProperty($id);
        $oldHostLanguage = $hostLanguageModel->getHostLanguageModel($id);
        $accommodationType = $accommodationTypeModel->getAccomodationTypeModel($id);
        $propertyType = $propertyTypeModel->getPropertyTypeModel($id);
        $houseRules = $houseRulesModel->getHouseRules($id);
        $propertyAmenities = $propertyAmenitiesModel->getPropertyAmenities($id);
        $tags = $tagModel->getAllTags();
        $selectedTags = $tagModel->getSelectedTagsForProperty($id);
        $propertyImages = $propertyImagesModel->getPropertyImagesModel($id);


        if ($property instanceof Property) {
            if (!$_POST) {
                $userId = $_SESSION['uid'];
                $userModel = new UserModel();
                $user = $userModel->getUserById($userId);
                $firstName = $user->getFirstName();
                $email = $user->getEmail();

                echo self::getRender('editproperty.html.twig', [
                    'property' => $property,
                    'id' => $id,
                    'firstName' => $firstName,
                    'email' => $email,
                    'oldHostLanguage' => $oldHostLanguage,
                    'propertyType' => $propertyType,
                    'accommodationType' => $accommodationType,
                    'houseRules' => $houseRules,
                    'propertyAmenities' => $propertyAmenities,
                    'tags' => $tags,
                    'selectedTags' => $selectedTags,
                    'propertyImages' => $propertyImages
                ]);
            } else {
                if (isset($_POST['submit'])) {
                    $title = isset($_POST['title']) ? $_POST['title'] : '';
                    $description = isset($_POST['description']) ? $_POST['description'] : '';
                    $priceNight = isset($_POST['price-night']) ? $_POST['price-night'] : '';
                    $address = isset($_POST['address']) ? $_POST['address'] : '';
                    $city = isset($_POST['city']) ? $_POST['city'] : '';
                    $postalCode = isset($_POST['postalCode']) ? $_POST['postalCode'] : '';
                    $department = isset($_POST['department']) ? $_POST['department'] : '';
                    $region = isset($_POST['region']) ? $_POST['region'] : '';
                    $country = isset($_POST['country']) ? $_POST['country'] : '';
                    $latitude = isset($_POST['latitude']) ? $_POST['latitude'] : '';
                    $longitude = isset($_POST['longitude']) ? $_POST['longitude'] : '';
                    $propertyType = $_POST['property-type'];
                    $hostLanguages = isset($_POST['host-languages']) ? $_POST['host-languages'] : [];
                    $accomodationTypes = isset($_POST['accommodation-types']) ? $_POST['accommodation-types'] : [];

                    $checkInTime = isset($_POST['check-in-time']) ? $_POST['check-in-time'] : [];
                    $checkOutTime = isset($_POST['check-out-time']) ? $_POST['check-out-time'] : [];
                    $maxGuests = isset($_POST['max-guests']) ? $_POST['max-guests'] : [];

                    $tags = isset($_POST['tags']) ? $_POST['tags'] : [];


                    $propertyModel->editPropertyModel($id, $title, $description, $priceNight, $address, $city, $postalCode, $department, $region, $country, $latitude, $longitude);

                    $propertyType = new PropertyType([
                        'propertyId' => $id,
                        'house' => ($propertyType === 'house') ? 1 : 0,
                        'flat' => ($propertyType === 'flat') ? 1 : 0,
                        'guesthouse' => ($propertyType === 'guesthouse') ? 1 : 0,
                        'hotel' => ($propertyType === 'hotel') ? 1 : 0,
                    ]);

                    $propertyTypeModel->editPropertyTypeModel($propertyType);


                    $newHostLanguage = [
                        'propertyId' => $id,
                        'english' => in_array('anglais', (array) $hostLanguages) ? 1 : 0,
                        'french' => in_array('français', (array) $hostLanguages) ? 1 : 0,
                        'german' => in_array('allemand', (array) $hostLanguages) ? 1 : 0,
                        'japanese' => in_array('japonais', (array) $hostLanguages) ? 1 : 0,
                        'italian' => in_array('italien', (array) $hostLanguages) ? 1 : 0,
                        'russian' => in_array('russe', (array) $hostLanguages) ? 1 : 0,
                        'spanish' => in_array('espagnol', (array) $hostLanguages) ? 1 : 0,
                        'chinese' => in_array('chinois', (array) $hostLanguages) ? 1 : 0,
                        'arabic' => in_array('arabe', (array) $hostLanguages) ? 1 : 0,
                    ];

                    $hostLanguageModel->editHostLanguageModel($newHostLanguage);


                    $propertyAmenities = new PropertyAmenities([
                        'propertyId' => $id,
                        'bedrooms' => $_POST['bedrooms'],
                        'beds' => $_POST['beds'],
                        'bathrooms' => $_POST['bathrooms'],
                        'toilets' => $_POST['toilets']
                    ]);

                    $propertyAmenitiesModel = new PropertyAmenitiesModel();
                    $propertyAmenitiesModel->editPropertyAmenitiesModel($propertyAmenities);


                    $houseRules = new HouseRules([
                        'propertyId' => $id,
                        'checkInTime' => $checkInTime,
                        'checkOutTime' => $checkOutTime,
                        'maxGuests' => $maxGuests
                    ]);

                    $houseRulesModel = new HouseRulesModel();
                    $houseRulesModel->editHouseRulesModel($houseRules);

                    $accomodationType = new AccomodationType([
                        'propertyId' => $id,
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
                    $accomodationTypeModel->editAccomodationTypeModel($accomodationType);


                    $oldPropertyImages = $propertyImagesModel->getPropertyImagesModel($id);

                    $imageMainURL = '';
                    $image1URL = '';
                    $image2URL = '';
                    $image3URL = '';
                    $image4URL = '';


                    $uploadDir = 'asset/media/locations/';

                    if (isset($_FILES['imageMain']['name']) && !empty($_FILES['imageMain']['name'])) {
                        $oldImagePath = $uploadDir . $oldPropertyImages->getImageMainURL();
                        if (file_exists($oldImagePath)) {
                            if (!unlink($oldImagePath)) {
                                error_log('Failed to delete ' . $oldImagePath . ': ' . print_r(error_get_last(), true));
                            }
                        }
                        $imageMainURL = uploadFile($_FILES['imageMain'], $uploadDir);
                    } else {
                        $imageMainURL = $oldPropertyImages->getImageMainURL();
                    }

                    if (isset($_FILES['image1']['name']) && !empty($_FILES['image1']['name'])) {
                        $oldImagePath = $uploadDir . $oldPropertyImages->getImage1URL();
                        if (file_exists($oldImagePath)) {
                            if (!unlink($oldImagePath)) {
                                error_log('Failed to delete ' . $oldImagePath . ': ' . print_r(error_get_last(), true));
                            }
                        }
                        $image1URL = uploadFile($_FILES['image1'], $uploadDir);
                    } else {
                        $image1URL = $oldPropertyImages->getImage1URL();
                    }

                    if (isset($_FILES['image2']['name']) && !empty($_FILES['image2']['name'])) {
                        $oldImagePath = $uploadDir . $oldPropertyImages->getImage2URL();
                        if (file_exists($oldImagePath)) {
                            if (!unlink($oldImagePath)) {
                                error_log('Failed to delete ' . $oldImagePath . ': ' . print_r(error_get_last(), true));
                            }
                        }
                        $image2URL = uploadFile($_FILES['image2'], $uploadDir);
                    } else {
                        $image2URL = $oldPropertyImages->getImage2URL();
                    }

                    if (isset($_FILES['image3']['name']) && !empty($_FILES['image3']['name'])) {
                        $oldImagePath = $uploadDir . $oldPropertyImages->getImage3URL();
                        if (file_exists($oldImagePath)) {
                            if (!unlink($oldImagePath)) {
                                error_log('Failed to delete ' . $oldImagePath . ': ' . print_r(error_get_last(), true));
                            }
                        }
                        $image3URL = uploadFile($_FILES['image3'], $uploadDir);
                    } else {
                        $image3URL = $oldPropertyImages->getImage3URL();
                    }

                    if (isset($_FILES['image4']['name']) && !empty($_FILES['image4']['name'])) {
                        $oldImagePath = $uploadDir . $oldPropertyImages->getImage4URL();
                        if (file_exists($oldImagePath)) {
                            if (!unlink($oldImagePath)) {
                                error_log('Failed to delete ' . $oldImagePath . ': ' . print_r(error_get_last(), true));
                            }
                        }
                        $image4URL = uploadFile($_FILES['image4'], $uploadDir);
                    } else {
                        $image4URL = $oldPropertyImages->getImage4URL();
                    }

                    $propertyImagesModel = new PropertyImagesModel();
                    $propertyImagesModel->editPropertyImagesModel($id, $imageMainURL, $image1URL, $image2URL, $image3URL, $image4URL);



                    $tagModel = new TagModel();
                    $tags = array_filter($tags); // Supprime les valeurs vides
                    $tagModel->editSelectedTagsForProperty($id, $tags);


                    header('Location: ' . $router->generate('home'));
                } else {
                    echo self::getRender('editproperty.html.twig', [
                        'property' => $property,
                        'id' => $id,
                    ]);
                }
            }
        } else {
            $message = 'Oops, something went wrong sorry. Try again later';
            echo self::getRender('editproperty.html.twig', ['message' => $message]);
        }
    }

    public function deleteProperty(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['_method'] === 'DELETE') {
            $propertyModel = new PropertyModel();
            $propertyModel->deletePropertyModel($id);

            global $router;
            header('Location: ' . $router->generate('home'));
            exit;
        }
    }
}
