<?php
namespace Controllers;
require_once('libraries/utils.php ');
class Reservation{
    public function insertForm (): void
    {



        if(!empty($_GET['id']&& $_GET['marque'] && $_GET['modele'] && $_GET['type'] && $_GET['energy'] && $_GET['seats'] && $_GET['boiteVitesse'] && $_GET['datedepart'] && $_GET['datefin'] && $_GET['prix'] && $_GET['nbjour'] ))
        {
            $idvehicleGet = $_GET['id'];
            $marqueGet = $_GET['marque'];
            $modeleGet = $_GET['modele'];
            $typeGet = $_GET['type'];
            $energyGet = $_GET['energy'];
            $seatsGet = $_GET['seats'];
            $boiteVitesseGet = $_GET['boiteVitesse'];
            $datedepartGet = trim($_GET['datedepart']);
            $datefinGet = $_GET['datefin'];
            $prixGet = (int)$_GET['prix'];
            $nbjourGet = (int)$_GET['nbjour'];
        }

        $total = calculOption($prixGet,$nbjourGet);
        $pageTitle = "Location";
        \Renderer::render('pageContent/location', compact('idvehicleGet', 'marqueGet', 'pageTitle' ,'modeleGet', 'typeGet' , 'energyGet', 'seatsGet', 'boiteVitesseGet', 'datedepartGet', 'datefinGet' , 'total'));


    }
    public function insertBdd(): void
    {
        $model = new \Models\Reservation();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $searchCars = $model->insert();
            header('Location: /index.php');
        }

    }
}