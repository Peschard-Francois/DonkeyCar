<?php
namespace Models;
require_once ('Model.php');
class Reservation extends Model {
    public function insert()
    {
        $modelSession = new \Models\Session();
        $idvehiculePost = $_POST['idvehicule'] ?? '';
        $totalPost = $_POST['total'] ?? '';
        $date1Post = $_POST['date1'] ?? '';
        $date2Post = $_POST['date2'] ?? '';
        $option1Post = $_POST['option1'] ?? '';
        $option2Post = $_POST['option2'] ?? '';
        $option3Post = $_POST['option3'] ?? '';
        $option4Post = $_POST['option4'] ?? '';
        $currentUser = $modelSession->isLoggedIn();
        $iduser = $currentUser['id'];
        $statement =  $this->pdo->prepare("INSERT INTO `reservation` (dateReservationDebut,dateReservationFin,insuranceReservation,adddriverReservation,babyseatReservation,gpsReservation,prixTotalReservation,vehicle_idvehicle,user_id)
                    VALUES(:date1Post,:date2Post,:option1Post,:option2Post,:option3Post,:option4Post,:total,'$idvehiculePost','$iduser');");
        $statement->bindValue(':date1Post', $date1Post);
        $statement->bindValue(':date2Post', $date2Post);
        $statement->bindValue(':option1Post', $option1Post);
        $statement->bindValue(':option2Post', $option2Post);
        $statement->bindValue(':option3Post', $option3Post);
        $statement->bindValue(':option4Post', $option4Post);
        $statement->bindValue(':total', $totalPost);
        $statement->execute();
    }

    public function allById(string $userProfile): bool|array
    {
        $query = $this->pdo->prepare("SELECT * FROM vehicle INNER JOIN reservation ON vehicle.idvehicle = reservation.vehicle_idvehicle INNER JOIN user ON user.id = reservation.user_id WHERE user.username = :userProfile;");
        $query->bindValue(':userProfile', $userProfile);
        $query->execute();
        $reservationalls = $query->fetchAll();
        return $reservationalls;
    }
}