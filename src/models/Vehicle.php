<?php
namespace Models;
require_once ('Model.php');
class Vehicle extends Model {
    protected $table = "vehicle";
    public function findVehicleFree() :array
    {
        $idPost = $_POST['type'] ?? '';
        $departPost = $_POST['depart'] ?? '';
        $arrivePost = $_POST['arrive'] ?? '';
        $statement =  $this->pdo->prepare("SELECT * FROM vehicle INNER JOIN type ON vehicle.type_idtype = type.idtype WHERE type_idtype = :idPost AND vehicle.idvehicle NOT IN (
                    SELECT vehicle_idvehicle FROM reservation WHERE :datePost BETWEEN dateReservationDebut AND dateReservationFin AND :arrivePost BETWEEN dateReservationDebut AND reservation.dateReservationFin);");
        $statement->bindValue(':datePost', $departPost,);
        $statement->bindValue(':idPost', $idPost);
        $statement->bindValue(':arrivePost', $arrivePost,);
        $statement->execute();
        $searchCars = $statement->fetchAll();
        return $searchCars;
    }
}