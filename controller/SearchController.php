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
                'label' => $data['title'],
                'value' => $data['title'],
                'description' => $data['description'],
                'priceNight' => $data['priceNight'],
                'address' => $data['address'],
                'city' => $data['city'],
                'postalCode' => $data['postalCode'],
                'department' => $data['department'],
                'region' => $data['region'],
                'country' => $data['country'],
            ];
        }

        echo json_encode($results);
    }
}
