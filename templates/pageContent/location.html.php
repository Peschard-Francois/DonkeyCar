<script type="text/javascript">
  function updateTotal(priceToAdd, element) {
    var total = document.getElementById('total');
    if (element.checked) {
      total.value = parseInt(total.value) + priceToAdd;
    } else {
      total.value = parseInt(total.value) - priceToAdd;
    }
  }
</script>
<div class="d-flex justify-content-center">
    <h1>Louer un véhicule</h1>
</div>
<!-- ACTION A AJOUTER -->
<form action="index.php?controller=reservation&task=insertBdd" method="post">
    <div class="mb-3">
        <input type="number" value="<?= $idvehicleGet?>" class="form-control" id="idvehicule" name="idvehicule" hidden>
    </div> <br>
    <div class="mb-3">
        <label class="label-loc" for="brand">Marque :</label>
        <input type="text" value="<?= $marqueGet?>" class="form-control" id="brand" name="brand" required disabled="disabled">
    </div> <br>
    <div class="mb-3">
        <label class="label-loc" for="model">Modèle :</label>
        <input type="text" value="<?= $modeleGet?>" class="form-control" id="model" name="model" required disabled="disabled">
    </div> <br>
    <div class="mb-3">
        <label class="label-loc" for="range">Type :</label>
        <input type="text" value="<?= $typeGet?>" class="form-control" id="range" name="range" required disabled="disabled">
    </div> <br>
    <div class="mb-3">
        <label class="label-loc" for="energy">Energie :</label>
        <input type="text" value="<?= $energyGet?>" class="form-control" id="energy" name="energy" required disabled="disabled">
    </div> <br>
    <div class="mb-3">
        <label class="label-loc" for="seats">Places :</label>
        <input type="text" value="<?= $seatsGet?>" class="form-control" id="seats" name="seats" required disabled="disabled">
    </div> <br>
    <div class="mb-3">
        <label class="label-loc" for="gearbox">Boite de vitesse :</label>
        <input type="text" value="<?= $boiteVitesseGet?>" class="form-control" id="gearbox" name="gearbox" required disabled="disabled">
    </div> <br>
    <div class="mb-3">
        <label class="label-loc" for="date1">Au :</label>
        <input type="date" value="<?=$datedepartGet?>" class="form-control" id="date1" name="date1" required>
    </div>
    <div class="mb-3">
        <label class="label-loc" for="date2">Au :</label>
        <input type="date" value="<?=$datefinGet?>" class="form-control" id="date2" name="date2" required>
    </div>
    <div class="mb-3">
        <label class="label-loc" for="option1">Assurance </label>
        <input type="checkbox" onclick="javascript:updateTotal(200, this);" ="option1" name="option1">
    </div>
    <div class="mb-3">
        <label class="label-loc" for="option2">Conducteur supplémentaire </label>
        <input type="checkbox" onclick="javascript:updateTotal(100, this);" id="option2" name="option2">
    </div>
    <div class="mb-3">
        <label class="label-loc" for="option3">Siège bébé </label>
        <input type="checkbox" onclick="javascript:updateTotal(40, this);" id="option3" name="option3">
    </div>
    <div class="mb-3">
        <label class="label-loc" for="option4">GPS </label>
        <input type="checkbox" onclick="javascript:updateTotal(20, this);" id="option4" name="option4">
    </div>
    <div class="mb-3">
        <label class="label-loc" for="total">TOTAL</label>
        <input type="text" value="<?=$total?>" id="total" name="total" disabled>
    </div>
    <div class="button">
            <button type="submit" class="btn btn-primary">Louer</button>
    </div>
</form>