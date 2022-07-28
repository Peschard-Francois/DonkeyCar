<h1>Créer un compte</h1>
<form action="index.php?controller=user&task=newUser" method="post">
    <form action="" method="post">
        <div class="mb-3">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="email">E-mail :</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password">Password :</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="lastname">Nom :</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>
        </div>
        <div class="mb-3">
            <label for="firstname">Prénom :</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>
        </div>
        <div class="mb-3">
            <label for="adress">Adresse :</label>
            <input type="text" class="form-control" id="adress" name="adress" required>
        </div>
        <div class="mb-3">
            <label for="zipcode">Code Postal :</label>
            <input type="text" class="form-control" id="zipcode" name="zipcode" required>
        </div>
        <div class="mb-3">
            <label for="city">Ville :</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="mb-3">
            <label for="phone">Téléphone :</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <?php if ($error) : ?>
            <h1 style="color: red;"><?= $error ?></h1>
        <?php endif; ?>
        <div class="button">
            <button type="submit" class="btn btn-primary btn-all">Créer compte</button>
        </div>
    </form>