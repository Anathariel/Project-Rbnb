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


            header('Location: ' . $router->generate('dashboard'));
        }
    }

    public function deleteFavorite()
    {
        $userId = $_SESSION['uid'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['_method'] === 'DELETE') {
            if (isset($_POST['propertyId'])) {
                $propertyId = $_POST['propertyId'];
                $favoriteModel = new FavoriteModel();

                $favoriteModel->deleteFavoriteModel($propertyId, $userId);

                global $router;
                header('Location: ' . $router->generate('dashboard'));
                exit();
            }
        } else {
            echo self::getRender('dashboard.html.twig', []);
        }
    }
}
