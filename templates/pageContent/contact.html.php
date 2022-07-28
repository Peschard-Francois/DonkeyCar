<div class="d-flex justify-content-center">
    <h1>Restons en contact</h1>
</div>
<form action="formresult.php" method="post">
    <div class="mb-3">
        <label for="lname">Nom :</label>
        <input type="text" class="form-control" id="lname" name="user_lname" autofocus>
    </div> <br>
    <div class="mb-3">
        <label for="name">Prénom :</label>
        <input type="text" class="form-control" id="name" name="user_name" required>
    </div> <br>
    <div class="mb-3">
        <label for="email">Votre e-mail :</label>
        <input type="email" class="form-control" id="email" name="user_mail" required>
    </div> <br>
    <div class="mb-3">
        <label for="tel">Telephone :</label>
        <input type="tel" class="form-control" id="tel" name="user_tel" required>
    </div> <br>
    <div class="mb-3">
        <label for="message">Message :</label>
        <textarea class="form-control" id="message" name="user_message" required></textarea>
    </div> <br>
    <div class="button">
        <button type="submit" class="btn btn-primary">Envoyer votre message</button>
    </div>
</form>