 <?php
    class ReservationModel extends Model
    {
        public function addReservationModel(Reservation $reservation)
        {
            $propertyId = $reservation->getPropertyId();
            $userId = $reservation->getUid();
            $checkInDate = $reservation->getCheckInDate();
            $checkoutDate = $reservation->getCheckoutDate();
            $numTravelers = $reservation->getNumTravelers();
            $totalPrice = $reservation->getTotalPrice();

            $req = $this->getDb()->prepare('INSERT INTO `reservation` (`propertyId`, `uid`, `checkInDate`, `checkoutDate`, `numTravelers`, `totalPrice`) VALUES (:propertyId, :uid, :checkInDate, :checkoutDate, :numTravelers, :totalPrice)');
            $req->bindParam(':propertyId', $propertyId, PDO::PARAM_INT);
            $req->bindParam(':uid', $userId, PDO::PARAM_INT);
            $req->bindParam(':checkInDate', $checkInDate, PDO::PARAM_STR);
            $req->bindParam(':checkoutDate', $checkoutDate, PDO::PARAM_STR);
            $req->bindParam(':numTravelers', $numTravelers, PDO::PARAM_INT);
            $req->bindParam(':totalPrice', $totalPrice, PDO::PARAM_STR);
            $req->execute();
        }

        public function getReservationModel($userId)
        {
            $req = $this->getDb()->prepare('SELECT `reservation`.`reservationId`, `reservation`.`propertyId`, `reservation`.`uid`, `reservation`.`checkInDate`, `reservation`.`checkoutDate`, `reservation`.`totalPrice`, `property`.`propertyId`, `property`.`title`, `property`.`priceNight`, `property`.`address`, `property`.`city`, `property`.`postalCode`, `property`.`department`, `property`.`region`, `property`.`country`, `property`.`description` FROM `reservation` JOIN `property` ON `reservation`.`propertyId` = `property`.`propertyId` WHERE `reservation`.`uid` = :uid');
            $req->bindParam(':uid', $userId, PDO::PARAM_INT);

            $req->execute();

            $reservations = [];
            while ($reservation = $req->fetch(PDO::FETCH_ASSOC)) {
                $reservations[] = new Reservation($reservation);

                // Récupérer les détails de la propriété associée à cette réservation
                $propertyId = $reservation['propertyId'];
                $propertyModel = new PropertyModel();
                $property = $propertyModel->getPropertyById($propertyId);
                $reservations[count($reservations) - 1]->setProperty($property);
            }

            return $reservations;
        }

        public function getReservationIdModel($reservation)
        {
            return $reservation->getReservationId();
        }

        public function getUserProperties($userId)
        {
            $req = $this->getDb()->prepare('SELECT `uid`, `reservationId`, `propertyId`, `checkInDate`, `checkoutDate`, `numTravelers`,`totalPrice` FROM `property` WHERE `ownerId` = :ownerId');
            $req->bindParam(':ownerId', $userId, PDO::PARAM_INT);
            $req->execute();

            $properties = [];
            while ($property = $req->fetch(PDO::FETCH_ASSOC)) {
                $properties[] = new Property($property);
            }

            return $properties;
        }

        public function getReservationsByProperty($propertyId)
        {
            $req = $this->getDb()->prepare('SELECT `uid`, `reservationId`, `propertyId`, `checkInDate`, `checkoutDate`, `numTravelers`,`totalPrice` FROM `reservation` WHERE `propertyId` = :propertyId');
            $req->bindParam(':propertyId', $propertyId, PDO::PARAM_INT);
            $req->execute();

            $reservations = [];
            while ($reservation = $req->fetch(PDO::FETCH_ASSOC)) {
                $reservations[] = new Reservation($reservation);
            }

            return $reservations;
        }

        public function isDateAvailableModel($propertyId, $date)
        {
            $req = $this->getDb()->prepare('SELECT COUNT(*) FROM `reservation` WHERE `propertyId` = :propertyId AND :date BETWEEN `checkInDate` AND `checkoutDate`');
            $req->bindParam(':propertyId', $propertyId, PDO::PARAM_INT);
            $req->bindParam(':date', $date, PDO::PARAM_STR);
            $req->execute();
        
            $count = $req->fetchColumn();
        
            return $count == 0;
        }

        public function deleteReservationModel($propertyId, $userId)
        {
            $req = $this->getDb()->prepare('DELETE FROM `reservation` WHERE `propertyId` = :propertyId AND `uid` = :userId');
            $req->bindParam(':propertyId', $propertyId, PDO::PARAM_INT);
            $req->bindParam(':userId', $userId, PDO::PARAM_INT);
            $req->execute();
        }
    }
