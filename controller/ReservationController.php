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
}
