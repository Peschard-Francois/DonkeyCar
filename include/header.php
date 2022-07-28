<?php
require_once ('src/models/Session.php');

$modelSession = new \Models\Session();
$currentUser = $modelSession->isLoggedIn();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
<<<<<<< HEAD
    <nav class="navbar navbar-expand-lg opacity-50 bg-light">
        <div class="container-fluid">
            <img src="src/css/assets/donkeycar.png" alt="" width="30" height="24">
            <a class="navbar-brand" href="../index.php">DonkeyCar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../vehicule.php">Véhicules</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../contact.php">Contact</a>
                    </li>
                </ul>
                <?php if ($currentUser) : ?>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active " href="/useraccount.php">Profil</a>
                            <a class="nav-link active" href="/logout.php">Déconnexion</a>
                        <?php else : ?>
                            <a class="nav-link active" href="/login.php">Connexion</a>
                            <a class="nav-link active" href="/register.php">S'enregistrer</a>
                        <?php endif; ?>
                        </li>
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item nav-link active" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </li>
                    </ul>
=======
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <img src="src/css/assets/donkeycar.png" alt="" width="30" height="24">
        <a class="navbar-brand" href="../index.php">DonkeyCar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="index.php?controller=vehicle&task=index">Véhicules</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="index.php?controller=user&task=contact">Contact</a>
                </li>
            </ul>
            <?php if ($currentUser) : ?>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active " href="index.php?controller=user&task=show">Profil</a>
                    <a class="nav-link active" href="index.php?controller=session&task=logout">Déconnexion</a>
                    <?php else : ?>
                        <a class="nav-link active" href="index.php?controller=session&task=login">Connexion  </a>
                        <a class="nav-link active" href="index.php?controller=user&task=newUser">S'enregistrer</a>
                    <?php endif; ?>
                </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item nav-link active" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                </li>
            </ul>
>>>>>>> 36b1a36 (Make all POO & MVCÃ & CodeStyle)

        </div>
    </div>
</nav>
</body>

</html>