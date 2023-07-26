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
            var_dump($reservation);

            $reservationModel = new ReservationModel();
            $reservationModel->addReservationModel($reservation);

            header('Location: ' . $router->generate('dashboard'));
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
                header('Location: ' . $router->generate('dashboard'));
                exit();
            }
        } else {
            echo self::getRender('dashboard.html.twig', []);
        }
    }
}
