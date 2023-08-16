<?php
class DashboardController extends Controller
{
    public function dashboard()
    {
        // Check if the user is logged in
        if (!isset($_SESSION['connect']) || $_SESSION['connect'] !== true) {
            global $router;
            header('Location: ' . $router->generate('login'));
            exit();
        }

        // Get the user's first name from the database
        $userId = $_SESSION['uid'];

        // Initialize $averageRating at the start
        $averageRating = null;

        // Get the user's properties from the database
        $propertyModel = new PropertyModel();
        $userProperties = $propertyModel->getUserProperties($userId);

        // Get the user's favorites from the database
        $favoriteModel = new FavoriteModel();
        $userFavorites = $favoriteModel->getFavoriteByUidModel($userId);

        // Get the user's blog posts from the database
        $articleModel = new ArticleModel();
        $userArticles = $articleModel->getArticlesByUid($userId);

        // Get the average ratings of favorite properties from the database
        $commentModel = new CommentModel();
        foreach ($userFavorites as $favorite) {
            $propertyId = $favorite->getPropertyId();
            $averageRating = $commentModel->getAverageRating($propertyId);
            if ($favorite->getProperty()) {
                $favorite->getProperty()->setAverageRating($averageRating);
            }
        }

        // Get the user's reservations from the database
        $reservationModel = new ReservationModel();
        $userReservations = $reservationModel->getReservationModel($userId);

        // Get the average ratings of booked properties from the database
        foreach ($userReservations as $reservation) {
            $propertyId = $reservation->getPropertyId();
            $averageRating = $commentModel->getAverageRating($propertyId);
            if ($reservation->getProperty()) {
                $reservation->getProperty()->setAverageRating($averageRating);
            }
        }

        // Get the properties rented by the user (owner)
        $userRentedProperties = [];
        foreach ($userProperties as $property) {
            $propertyId = $property->getPropertyId();
            $reservations = $reservationModel->getReservationsByProperty($propertyId);
            if (!empty($reservations)) {
                $userRentedProperties[] = $property;
            }
            $averageRating = $commentModel->getAverageRating($propertyId);
            $property->setAverageRating($averageRating);
        }

        // Get the images related to each property of the owner
        $propertyImagesModel = new PropertyImagesModel();
        foreach ($userProperties as $property) {
            $propertyId = $property->getPropertyId();
            $propertyImages = $propertyImagesModel->getPropertyImagesModel($propertyId);
            $property->setPropertyImages($propertyImages);
        }

        // Get the images related to each favorite property
        foreach ($userFavorites as $favorite) {
            $propertyId = $favorite->getPropertyId();
            $propertyImages = $propertyImagesModel->getPropertyImagesModel($propertyId);
            if ($favorite->getProperty()) {
                $favorite->getProperty()->setPropertyImages($propertyImages);
            }
        }

        // Get the images related to each booked property
        foreach ($userReservations as $reservation) {
            $propertyId = $reservation->getPropertyId();
            $propertyImages = $propertyImagesModel->getPropertyImagesModel($propertyId);
            if ($reservation->getProperty()) {
                $reservation->getProperty()->setPropertyImages($propertyImages);
            }
        }

        // Prepare the data to send to the view
        $data = [
            'userProperties' => $userProperties,
            'userFavorites' => $userFavorites,
            'userReservations' => $userReservations,
            'userRentedProperties' => $userRentedProperties,
            'averageRating' => $averageRating,
            'userArticles' => $userArticles
        ];

        // Display the view with the data
        echo self::getRender('dashboard.html.twig', $data);
    }
}