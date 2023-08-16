<?php

class SearchController extends Controller
{
    public function searchResult()
    {
        if ($_GET) {
            $searchTerm = $_GET['search'];
            $model = new SearchModel();
            $datas = $model->getSearchResult($searchTerm);

            $propertyImagesModel = new PropertyImagesModel();
            $averageRatingModel = new CommentModel();

            // Récupérer l'état de favori pour chaque propriété
            if (isset($_SESSION['uid'])) {
                $userId = $_SESSION['uid'];
                $favoriteModel = new FavoriteModel();
                $favoritePropertyIds = $favoriteModel->getFavoritePropertyIdsByUidModel($userId);

                foreach ($datas as &$property) {
                    $property['isFavorite'] = in_array($property['propertyId'], $favoritePropertyIds);
                }
            }

            foreach ($datas as &$property) {
                $id = $property['propertyId'];
                $propertyImages = $propertyImagesModel->getPropertyImagesModel($id);
                $property['images'] = $propertyImages;
                $averageRating = $averageRatingModel->getAverageRating($id);
                $property['averageRating'] = $averageRating;
            }
        }

        echo self::getRender('catalog.html.twig', ['result' => $datas]);
    }

    public function searchResultAjax()
    {
        $searchTerm = $_GET['term'];
        $model = new SearchModel();
        $datas = $model->getSearchResult($searchTerm);

        $results = [];
        foreach ($datas as $data) {
            $results[] = [
                'label' => $data['city'] . ', ' . $data['postalCode'] . ', ' . $data['department'] . ', ' . $data['region'] . ', ' . $data['country'],
                'value' => $data['title'],
            ];
        }

        echo json_encode($results);
    }

    public function filterByTag($id) {
        $tagModel = new TagModel();
        $propertyIds = $tagModel->getPropertyIdByTagId($id);
        
        // Assuming you have a PropertyModel to fetch details using propertyIds
        $propertyModel = new PropertyModel();
        $properties = $propertyModel->getPropertiesByIds($propertyIds);
        
        // Render the catalogue with the filtered properties
        echo self::getRender('catalog.html.twig', ['result' => $properties]);
    }
    
}
