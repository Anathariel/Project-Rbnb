<?php

class SearchController extends Controller{
    
    public function searchResult() {

        if($_POST){
            $searchTerm = $_POST['search'];
            $model = new SearchModel();
            $datas = $model->getSearchResult($searchTerm);
        }
        echo self::getRender('catalog.html.twig', []);
    }
}