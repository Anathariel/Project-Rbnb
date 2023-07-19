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
            foreach ($datas as &$property) {
                $id = $property['propertyId'];
                $propertyImages = $propertyImagesModel->getPropertyImagesModel($id);
                $property['images'] = $propertyImages;
            }
        }

        echo self::getRender('catalog.html.twig', ['result' => $datas]);
    }
}
