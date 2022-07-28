<?php
namespace Controllers;
require_once ('libraries/utils.php');
class Vehicle {
    public function index(): void
    {
        session_start();
        $modelVehic = new \Models\Vehicle();
        $modelType = new \Models\Type();
        $modelSession = new \Models\Session();
        $searchCars = null;
        $departPost = null ;
        $arrivePost = null ;
        $nbJours = null ;
        $currentUser = $modelSession->isLoggedIn();
        $today = date("Y-m-d");
        $type = $modelType->findType();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idPost = $_POST['type'] ?? '';
            $departPost = $_POST['depart'] ?? '';
            $arrivePost = $_POST['arrive'] ?? '';
            $searchCars = $modelVehic->findVehicleFree();
            if (isset($departPost,$arrivePost)){
                $nbJours = calculNbDay($departPost,$arrivePost);
            }
        }
        $pageTitle = "Accueil";
        \Renderer::render('pageContent/index', compact('departPost','today', 'searchCars', 'pageTitle', 'currentUser' , 'arrivePost' , 'nbJours','type' ));
    }
    public function find(): void
    {
        $modelVehic = new \Models\Vehicle();
        $vehicules = $modelVehic->findNameType();
        $pageTitle = "Liste Véhicules";
        \Renderer::render('pageContent/vehicle', compact('vehicules','pageTitle' ));
    }
}