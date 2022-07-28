<body class="body-profil">
<h1 class="title-profil"><span>Menu Profil</span></h1>
<h2 class="hello-profil">Bonjour <?= $currentUser['username'] ?></h2>
<form class="form-profil" action="index.php?controller=user&task=show" method="post">
    <div class="col-md-2">

        <input type="text" value="<?= $username[0]['id'] ?>" class="form-control" id="id" name="id" required hidden>
    </div>
    <div class="row">
        <div class="col-md">
            <label class="label-profil" for="username">Nom d'utilisateur :</label>
            <input type="text" value="<?= $username[0]['username'] ?>" class="form-control" id="username" name="username" required>
        </div>
        <div class="col-md">
            <label class="label-profil" for="email">E-mail :</label>
            <input type="email" value="<?= $username[0]['email'] ?>" class="form-control" id="email" name="email" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <label class="label-profil" for="lastname">Nom :</label>
            <input type="text" value="<?= $username[0]['lastname'] ?>" class="form-control" id="lastname" name="lastname" required>
        </div>
        <div class="col-md">
            <label class="label-profil" for="firstname">Prénom :</label>
            <input type="text" value="<?= $username[0]['firstname'] ?>" class="form-control" id="firstname" name="firstname" required>
        </div>
    </div>
    <div class="form-group">
        <label class="label-profil" for="adress">Adresse :</label>
        <input type="text" value="<?= $username[0]['adress'] ?>" class="form-control" id="adress" name="adress" required>
    </div>
    <div class="row">
        <div class="col-md-2">
            <label class="label-profil" for="zipcode">Code Postal :</label>
            <input type="text" value="<?= $username[0]['zipcode'] ?>" class="form-control" id="zipcode" name="zipcode" required>
        </div>
        <div class="col-md-3">
            <label class="label-profil" for="city">Ville :</label>
            <input type="text" value="<?= $username[0]['city'] ?>" class="form-control" id="city" name="city" required>
        </div>
    </div>
    <div class="col-md-2">
        <label class="label-profil" for="phone">Téléphone :</label>
        <input type="text" value="<?= $username[0]['phone'] ?>" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="button">
        <button type="submit" class="btn btn-primary btn-all">Sauvegarder</button>
    </div>
</form>
<div class="historique">
    <?php foreach ($reservationalls as $reservationall) : ?>
        <div>
            <h2><?= $reservationall['brandVehicle'] ?> <?= $reservationall['modelsVehicle'] ?> <br> Prix : <?= $reservationall['prixTotalReservation'] ?> €</h2>
            <img class="imgCars" src="<?= $reservationall['imgVehicle'] ?>" alt="Image du véhicule">
            <h3>Du  <?= $reservationall['dateReservationDebut'] ?> Au  <?= $reservationall['dateReservationFin'] ?></h3>
        </div>
    <?php endforeach ?>
</div>
</body>
