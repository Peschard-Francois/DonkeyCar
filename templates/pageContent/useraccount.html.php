<h1>Menu Profil</h1>
<h2>Bonjour <?= $currentUser['username'] ?></h2>
<form action="index.php?controller=user&task=show" method="post">
    <div class="col-md-2">
        <label for="id">id d'utilisateur :</label>
        <input type="text" value="<?= $username[0]['id'] ?>" class="form-control" id="id" name="id" required>
    </div>
    <div class="row">
        <div class="col-md">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" value="<?= $username[0]['username'] ?>" class="form-control" id="username" name="username" required>
        </div>
        <div class="col-md">
            <label for="email">E-mail :</label>
            <input type="email" value="<?= $username[0]['email'] ?>" class="form-control" id="email" name="email" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <label for="lastname">Nom :</label>
            <input type="text" value="<?= $username[0]['lastname'] ?>" class="form-control" id="lastname" name="lastname" required>
        </div>
        <div class="col-md">
            <label for="firstname">Prénom :</label>
            <input type="text" value="<?= $username[0]['firstname'] ?>" class="form-control" id="firstname" name="firstname" required>
        </div>
    </div>
    <div class="form-group">
        <label for="adress">Adresse :</label>
        <input type="text" value="<?= $username[0]['adress'] ?>" class="form-control" id="adress" name="adress" required>
    </div>
    <div class="row">
        <div class="col-md-2">
            <label for="zipcode">Code Postal :</label>
            <input type="text" value="<?= $username[0]['zipcode'] ?>" class="form-control" id="zipcode" name="zipcode" required>
        </div>
        <div class="col-md-3">
            <label for="city">Ville :</label>
            <input type="text" value="<?= $username[0]['city'] ?>" class="form-control" id="city" name="city" required>
        </div>
    </div>
    <div class="col-md-2">
        <label for="phone">Téléphone :</label>
        <input type="text" value="<?= $username[0]['phone'] ?>" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="button">
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </div>
</form>
<div>
    <?php foreach ($reservationalls as $reservationall) : ?>
        <h2><?= $reservationall['brandVehicle'] ?> <?= $reservationall['modelsVehicle'] ?></h2>
        <img class="imgCars" src="<?= $reservationall['imgVehicle'] ?>" alt="Image du véhicule">
        <h3><?= $reservationall['dateReservationDebut'] ?> <?= $reservationall['dateReservationFin'] ?></h3>
    <?php endforeach ?>
</div>