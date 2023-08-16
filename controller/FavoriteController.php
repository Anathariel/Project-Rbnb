<?php

class FavoriteController extends Controller
{
    public function addFavorite()
    {
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

            if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                // c'est une requête AJAX
                echo json_encode(['success' => true]);
                exit;
            }
        }
    }

    public function deleteFavorite()
    {
        $userId = $_SESSION['uid'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['method'] === 'DELETE') {
            if (isset($_POST['propertyId'])) {
                $propertyId = $_POST['propertyId'];
                $favoriteModel = new FavoriteModel();

                $favoriteModel->deleteFavoriteModel($propertyId, $userId);

                global $router;
                $_SESSION['flash_message'] = 'Propriété retirer de vos favoris.';
                header('Location: ' . $router->generate('dashboard'));
                exit;
            }
        } else {
            echo self::getRender('dashboard.html.twig', []);
        }
    }
}
