<h4 class="mb-3">Mes coordonnées</h4>
<div class="col-6">
    <?= input("Prénom", "firstname") ?>
</div>
<div class="col-6">
    <?= input("Nom", "lastname") ?>
</div>
<div class="col-12">
    <?= input("Adresse", "address") ?>
</div>
<div class="col-6">
    <?= input("Code postal", "zip") ?>
</div>
<div class="col-6">
    <?= input("Ville", "city") ?>
</div>
<div class="col-12">
    <?= input("Téléphone", "phone") ?>
</div>
<div class="col-6 mt-2 form-text mb-3">
    <span class="text-danger fw-bold">*</span> Tous les champs sont obligatoires
</div>