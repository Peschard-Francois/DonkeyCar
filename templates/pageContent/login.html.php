<body class="body-login">
<h1 class="h1-login"><span>Connexion</span></h1>
    <form action="index.php?controller=session&task=login" method="post">
        <div class="mb-3">
            <label class="titleInput-index" for="email">E-mail :</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label class="titleInput-index" for="password">Password :</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <?php if ($error) : ?>
            <h1 style="color: red;"><?= $error ?></h1>
        <?php endif; ?>
        <div class="button">
            <button type="submit" class="btn btn-primary btn-all">Connexion</button>
        </div>
    </form>
</body>
