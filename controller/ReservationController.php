<?php

class ReservationController extends Controller
{
    public function addReservation()
    {
        global $router;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['uid'];
            $propertyId = $_POST['propertyId'];
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];
            $numTravelers = $_POST['numTravelers'];
            $totalPrice = $_POST['totalPrice'];

            $reservation = new Reservation([
                'uid' => $userId,
                'propertyId' => $propertyId,
                'checkInDate' => $startDate,
                'checkoutDate' => $endDate,
                'numTravelers' => $numTravelers,
                'totalPrice' => $totalPrice
            ]);
            // var_dump($reservation);

            $reservationModel = new ReservationModel();
            $reservationModel->addReservationModel($reservation);

            $_SESSION['flash_message'] = 'Votre réservation à bien été pris en compte.';
            header('Location: ' . $router->generate('dashboard'));
        }
    }

    public function checkAvailability($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $date = $_GET['date'];
            $propertyId = $_GET['propertyId'];

            $reservationModel = new ReservationModel();
            $isAvailable = $reservationModel->isDateAvailableModel($propertyId, $date);

            header('Content-Type: application/json');
            echo json_encode($isAvailable);
        }
    }

    public function deleteReservation()
    {
        $userId = $_SESSION['uid'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['_method'] === 'DELETE') {
            if (isset($_POST['propertyId'])) {
                $propertyId = $_POST['propertyId'];
                $reservationModel = new ReservationModel();

                $reservationModel->deleteReservationModel($propertyId, $userId);

                global $router;
                $_SESSION['flash_message'] = 'Votre réservation à été annulé avec succès.';
                header('Location: ' . $router->generate('dashboard'));
                exit();
            }
        } else {
            $message = 'Une erreur est survenue. Réessayer plus tard.';
            echo self::getRender('dashboard.html.twig', ['message' => $message]);
        }
    }
}
