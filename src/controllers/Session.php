<?php
namespace Controllers;
class   Session {
    public function login(): void
    {
        session_start();
        $modelUser = new \Models\Session();
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $modelUser->loginCheck();
        }
        $pageTitle = "Connexion";
        \Renderer::render('pageContent/login',compact('error','pageTitle' ));
    }
    public  function logout(): void
    {
        session_start();
        $modelSession = new \Models\Session();
        $modelSession->logoutToDo();
        // Réinitialisation du tableau de session
        // On le vide intégralement
        $_SESSION = array();
        // Destruction de la session
        session_destroy();
        // Destruction du tableau de session
        unset($_SESSION);
        header('Location: /index.php');
    }
}