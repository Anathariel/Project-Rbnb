<?php

class FavoriteController extends Controller
{
    public function addFavorite()
    {
        global $router;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['uid'];
            $propertyId = isset($_POST['propertyId']) ? $_POST['propertyId'] : '';

            // Créer une instance de votre modèle FavoriteModel
            $favorite = new Favorite([
                'propertyId' => $propertyId,
                'uid' => $userId,
            ]);

            $favoriteModel = new FavoriteModel();
            $favoriteModel->addFavoriteModel($favorite);


            header('Location: ' . $router->generate('home', ['id' => $propertyId]));
        }
    }
}
