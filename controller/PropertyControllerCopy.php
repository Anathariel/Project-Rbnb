public function editProperty($id)
    {
        global $router;
        $propertyModel = new PropertyModel();
        $property = $propertyModel->getOneProperty($id);

        if (!$_POST) {
            echo self::getRender('editproperty.html.twig', [
                'property' => $property,
                'id' => $id
            ]);
        } else {
            if (isset($_POST['submit'])) {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $priceNight = $_POST['price-night'];

                if ($property instanceof Property) {
                    $propertyModel->editPropertyModel($id, $title, $description, $priceNight);

                    header('Location: ' . $router->generate('baseEditproperty'));
                } else {
                    // Gérer l'erreur si la variable $property n'est pas un objet Property
                }
            } else {
                echo self::getRender('editproperty.html.twig', [
                    'property' => $property,
                    'router' => $router
                ]);
            }
        }
    }

    public function editProperty()
    {
        global $router;
        if (!$_POST) {
            $propertyId = $_GET['id'];
            $propertyModel = new PropertyModel();
            $property = $propertyModel->getPropertyById($propertyId);

            $propertyImagesModel = new PropertyImagesModel();
            $propertyImages = $propertyImagesModel->getPropertyImagesById($propertyId);
            
            $propertyTypeModel = new PropertyTypeModel();
            $propertyType = $propertyTypeModel->getPropertyTypeById($propertyId);
            
            $hostLanguageModel = new HostLanguageModel();
            $hostLanguage = $hostLanguageModel->getHostLanguageById($propertyId);
            $accomodationTypeModel = new AccomodationTypeModel();
            $accomodationType = $accomodationTypeModel->getAccomodationTypeById($propertyId);
            $houseRulesModel = new HouseRulesModel();
            $houseRules = $houseRulesModel->getHouseRulesById($propertyId);
            $propertyAmenitiesModel = new PropertyAmenitiesModel();
            $propertyAmenities = $propertyAmenitiesModel->getPropertyAmenitiesById($propertyId);
            $tagModel = new TagModel();
            $tags = $tagModel->getTagsById($propertyId);
            echo self::getRender('editproperty.html.twig', [
                'property' => $property,
                'propertyImages' => $propertyImages,
                'propertyType' => $propertyType,
                'hostLanguage' => $hostLanguage,
                'accomodationType' => $accomodationType,
                'houseRules' => $houseRules,
                'propertyAmenities' => $propertyAmenities,
                'tags' => $tags
            ]);
        } else {
            if (isset($_POST['submit'])) {
                $propertyId = $_POST['propertyId'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $priceNight = $_POST['price-night'];
                $propertyType = $_POST['property-type'];
                $hostLanguages = isset($_POST['host-languages'])? $_POST['host-languages'] : [];
                $accomodationTypes = isset($_POST['accommodation-types'])? $_POST['accommodation-types'] : [];
                $checkInTime = $_POST['check-in-time'];
                $checkOutTime = $_POST['check-out-time'];
                $maxGuests = $_POST['max-guests'];
                $tags = isset($_POST['tags'])? $_POST['tags'] : [];
                $bedrooms = $_POST['bedrooms'];
                $beds = $_POST['beds'];
                $bathrooms = $_POST['bathrooms'];
                $toilets = $_POST['toilets'];

                $propertyModel = new PropertyModel();
                $propertyModel->editPropertyModel($propertyId, $title, $description, $priceNight);

                $propertyImagesModel = new PropertyImagesModel();
                $imageMainURL = '';
                $image1URL = '';
                $image2URL = '';
                $image3URL = '';
                $image4URL = '';
                if (isset($_FILES['imageMain']['name']) &&!empty($_FILES['imageMain']['name'])) {
                    $uploadDir = 'asset/media/locations/';
                    $imageMainURL = uploadFile($_FILES['imageMain'], $uploadDir);
                    $propertyImagesModel->editPropertyImage($propertyId, 'imageMain', $imageMainURL);
                }
                if (isset($_FILES['image1']['name']) &&!empty($_FILES['image1']['name'])) {
                    $uploadDir = 'asset/media/locations/';
                    $image1URL = uploadFile($_FILES['image1'], $uploadDir);
                    $propertyImagesModel->editPropertyImage($propertyId, 'image1', $image1URL);
                }
                if (isset($_FILES['image2']['name']) &&!empty($_FILES['image2']['name'])) {
                    $uploadDir = 'asset/media/locations/';
                    $image2URL = uploadFile($_FILES['image2'], $uploadDir);
                    $propertyImagesModel->editPropertyImage($propertyId, 'image2', $image2URL);
                }
                if (isset($_FILES['image3']['name']) &&!empty($_FILES['image3']['name'])) {
                    $uploadDir = 'asset/media/locations/';
                    $image3URL = uploadFile($_FILES['image3'], $uploadDir);
                    $propertyImagesModel->editPropertyImage($propertyId, 'image3', $image3URL);
                }
                if (isset($_FILES['image4']['name']) &&!empty($_FILES['image4']['name'])) {
                    $uploadDir = 'asset/media/locations/';
                    $image4URL = uploadFile($_FILES['image4'], $uploadDir);
                    $propertyImagesModel->editPropertyImage($propertyId, 'image4', $image4URL);
                }

                $propertyTypeModel = new PropertyTypeModel();
                $propertyTypeModel->editPropertyTypeModel($propertyId, $propertyType);

                $hostLanguageModel = new HostLanguageModel();
                $hostLanguageModel->editHostLanguageModel($propertyId, $hostLanguages);

                $accomodationTypeModel = new AccomodationTypeModel();
                $accomodationTypeModel->editAccomodationTypeModel($propertyId, $accomodationTypes);

                $houseRulesModel = new HouseRulesModel();
                $houseRulesModel->editHouseRulesModel($propertyId, $checkInTime, $checkOutTime, $maxGuests);

                $propertyAmenitiesModel = new PropertyAmenitiesModel();
                $propertyAmenitiesModel->editPropertyAmenitiesModel($propertyId, $bedrooms, $beds, $bathrooms, $toilets);

                $tagModel = new TagModel();
                $tagModel->editTagsModel($propertyId, $tags);

                header('Location: '. $router->generate('home'));
        } else {
            $propertyId = $_POST['propertyId'];
            $propertyModel = new PropertyModel();
            $property = $propertyModel->getPropertyById($propertyId);
            $propertyImagesModel = new PropertyImagesModel();
            $propertyImages = $propertyImagesModel->getPropertyImagesById($propertyId);
            $propertyTypeModel = new PropertyTypeModel();
            $propertyType = $propertyTypeModel->getPropertyTypeById($propertyId);
            $hostLanguageModel = new HostLanguageModel();
            $hostLanguage = $hostLanguageModel->getHostLanguageById($propertyId);
            $accomodationTypeModel = new AccomodationTypeModel();
            $accomodationType = $accomodationTypeModel->getAccomodationTypeById($propertyId);
            $houseRulesModel = new HouseRulesModel();
            $houseRules = $houseRulesModel->getHouseRulesById($propertyId);
            $propertyAmenitiesModel = new PropertyAmenitiesModel();
            $propertyAmenities = $propertyAmenitiesModel->getPropertyAmenitiesById($propertyId);
            $tagModel = new TagModel();
            $tags = $tagModel->getTagsById($propertyId);
            echo self::getRender('editproperty.html.twig', [
                'property' => $property,
                'propertyImages' => $propertyImages,
                'propertyType' => $propertyType,
                'hostLanguage' => $hostLanguage,
                'accomodationType' => $accomodationType,
                'houseRules' => $houseRules,
                'propertyAmenities' => $propertyAmenities,
                'tags' => $tags
            ]);
        }
    }