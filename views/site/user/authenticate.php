<?php
    require_once 'functions/field.php';
    create();
?>

<h1>Authenticate</h1>
<div class="row">
    <div class="col-6">
        <h3 class="mb-4">Créer mon compte</h3>
        <?= showNotify() ?>
        <form method="post" action="<?= $uri ?>user/authenticate">
            <input type="hidden" name="redirect" value="home">
            <div class="row">
                <div class="col-12"><?= input($label="Email", $name="email", $type="email") ?></div>
                <div class="col-12"><?= input($label="Mot de passe", $name="password", $type="password") ?></div>
                <div class="col-6"><?= input($label="Prénom", $name="firstname") ?></div>
                <div class="col-6"><?= input($label="Nom", $name="lastname") ?></div>
                <div class="col-12"><?= input($label="Adresse", $name="address") ?></div>
                <div class="col-6"><?= input($label="Code postal", $name="zip") ?></div>
                <div class="col-6"><?= input($label="Ville", $name="city") ?></div>
                <div class="col-12"><?=  input($label="Téléphone", $name="phone") ?></div>
                <div class="col-12">
                    <button name="user_create" type="submit" class="btn btn-primary">Créer mon compte</button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-6">
        <h3 class="mb-4">Se connecter</h3>
        <?= showNotify() ?>
        <form method="post" action="<?= $uri ?>user/authenticate">
            <input type="hidden" name="redirect" value="home">
            <div class="row">
                <div class="col-12"><?= input($label="Email", $name="email", $type="email") ?></div>
                <div class="col-12"><?= input($label="Mot de passe", $name="password", $type="password") ?></div>
                <div class="col-12">
                    <button name="user_login" type="submit" class="btn btn-primary">Se connecter</button>
                </div>
            </div>
        </form>

    </div>

</div>