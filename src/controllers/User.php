<?php
namespace Controllers;
class User{
    public function show(): void
    {
        $modelUser = new \Models\User();
        $modelSession = new \Models\Session();
        $currentUser = $modelSession->isLoggedIn();
        if (!$currentUser) {
            \Http::redirect('index.php?controller=user&task=login');
        }
        $error = null;
        $userProfile = $currentUser['username'];
        $username = $modelUser->finUsersById($userProfile);
        $pageTitle = "Compte";
        $reservationalls = $this->showReservation();
        $modelUser->upDateProfil($currentUser);
        \Renderer::render('pageContent/useraccount',compact('pageTitle' ,'currentUser', 'username', 'reservationalls'));
    }
    public function showReservation(): bool|array
    {
        $modelReserv = new \Models\Reservation();
        $modelSession = new \Models\Session();
        $currentUser = $modelSession->isLoggedIn();
        if (!$currentUser) {
            \Http::redirect('index.php?controller=user&task=show');
        }
        $userProfile = $currentUser['username'];
        $reservationalls = $modelReserv->allById($userProfile);
        return $reservationalls;
    }
    public function contact(){
        $modelSession = new \Models\Session();
        $modelSession->isLoggedIn();
        $pageTitle = "Contact";
        \Renderer::render('pageContent/contact',compact('pageTitle' ));
    }
    function newUser(){
        $modelUser = new \Models\User();
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $modelUser->registerToDo();
        }
        $pageTitle = "Création de compte";
        \Renderer::render('pageContent/register',compact('pageTitle' ,'error'));
    }
}