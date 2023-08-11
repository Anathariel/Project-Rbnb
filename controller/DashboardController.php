<?php
class DashboardController extends Controller
{
    public function dashboard()
    {
        // Vérifiez si l'utilisateur est connecté
        if (!isset($_SESSION['connect']) || $_SESSION['connect'] !== true) {
            // Redirigez l'utilisateur vers la page de connexion si nécessaire
            global $router;
            header('Location: ' . $router->generate('login'));
            exit();
        }

        // Récupérez le prénom de l'utilisateur à partir de la base de données
        $userId = $_SESSION['uid'];


        // Récupérez les propriétés de l'utilisateur à partir de la base de données
        $propertyModel = new PropertyModel();
        $userProperties = $propertyModel->getUserProperties($userId);

        // Récupérez les favoris de l'utilisateur à partir de la base de données
        $favoriteModel = new FavoriteModel();
        $userFavorites = $favoriteModel->getFavoriteByUidModel($userId);

        // Récupérez les articles blog de l'utilisateur à partir de la base de données
        $articleModel = new ArticleModel();
        $userArticles = $articleModel->getArticlesByUid($userId);

        // Récupérez les moyennes des commentaires des propriétés favorites à partir de la base de données
        $commentModel = new CommentModel();
        foreach ($userFavorites as $favorite) {
            $propertyId = $favorite->getPropertyId();
            $averageRating = $commentModel->getAverageRating($propertyId);
            $favorite->getProperty()->setAverageRating($averageRating);
        }

        // Récupérez les réservations de l'utilisateur à partir de la base de données
        $reservationModel = new ReservationModel();
        $userReservations = $reservationModel->getReservationModel($userId);

        // Récupérez les réservations de l'utilisateur à partir de la base de données
        $reservationModel = new ReservationModel();
        $userReservations = $reservationModel->getReservationModel($userId);

        // Récupérez les moyennes des commentaires des propriétés réservées à partir de la base de données
        $commentModel = new CommentModel();
        foreach ($userReservations as $reservation) {
            $propertyId = $reservation->getPropertyId();
            $averageRating = $commentModel->getAverageRating($propertyId);
            $reservation->getProperty()->setAverageRating($averageRating);
        }

        // Récupérez la note moyenne de l'utilisateur à partir de la base de données
        $commentModel = new CommentModel();

        // Récupérez les propriétés louées par l'utilisateur (propriétaire)
        $userRentedProperties = [];

        foreach ($userProperties as $property) {
            $propertyId = $property->getPropertyId();
            $reservations = $reservationModel->getReservationsByProperty($propertyId);

            // Si la propriété a des réservations, ajoutez-la à la liste des propriétés louées par l'utilisateur
            if (!empty($reservations)) {
                $userRentedProperties[] = $property;
            }

            // Récupérez la moyenne des notes pour cette propriété
            $averageRating = $commentModel->getAverageRating($propertyId);

            // Ajoutez la moyenne des notes à la propriété actuelle
            $property->setAverageRating($averageRating);
        }


        // Récupérez les images liées à chaque propriété du propriétaire
        $propertyImagesModel = new PropertyImagesModel();
        foreach ($userProperties as $property) {
            $propertyId = $property->getPropertyId();
            $propertyImages = $propertyImagesModel->getPropertyImagesModel($propertyId);
            $property->setPropertyImages($propertyImages);
        }

        // Récupérez les images liées à chaque propriété favorite
        $propertyImagesModel = new PropertyImagesModel();
        foreach ($userFavorites as $favorite) {
            $propertyId = $favorite->getPropertyId();
            $propertyImages = $propertyImagesModel->getPropertyImagesModel($propertyId);
            $favorite->getProperty()->setPropertyImages($propertyImages);
        }

        // Récupérez les images liées à chaque propriété réservée
        $propertyImagesModel = new PropertyImagesModel();
        foreach ($userReservations as $reservation) {
            $propertyId = $reservation->getPropertyId();
            $propertyImages = $propertyImagesModel->getPropertyImagesModel($propertyId);

            // Check if the property is set before calling setPropertyImages()
            if ($reservation->getProperty()) {
                $reservation->getProperty()->setPropertyImages($propertyImages);
            }
        }

        // Préparez les données à envoyer à la vue
        $data = [
            'userProperties' => $userProperties,
            'userFavorites' => $userFavorites,
            'userReservations' => $userReservations,
            'userRentedProperties' => $userRentedProperties,
            'averageRating' => $averageRating,
            'userArticles' => $userArticles
        ];

        // Affichez la vue avec les données
        echo self::getRender('dashboard.html.twig', $data);
    }
}
