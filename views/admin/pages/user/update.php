<h1 class="mb-5">Utilisateur - Modification</h1>

<?php
    $page = '/admin/' . PAGE . '?id=';
    $uri = $_SERVER['REQUEST_URI'];
    $id = str_replace($page, '', $uri);

    userUpdate($id);

    if (!array_key_exists('user_update', $_POST)) {
        $user = userGetOne($id);

        foreach ($user->fetch_object() as $key => $value) {
            if ($key !== 'password')    $_POST[$key] = $value;
        }
    }
?>

<a href="/admin/user/index" class="btn btn-primary nav-btn-top">
    <i class="bi bi-people me-1"></i>
    Gestion des utilisateurs
</a>

<div class="clear"></div>

<form method="post"
      class="needs-validation <?= array_key_exists('user_create', $_POST) ? "was-validated" : "" ?>"
      action="/admin/user/update?id=<?= $id ?>"
      novalidate
>
    <h4 class="mb-3">Coordonnées</h4>
    <div class="row">
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
    </div>

    <div class="d-flex">
        <button name="user_update" type="submit" class="btn btn-primary mb-4 ms-auto">
            <i class="bi bi-check me-2"></i>
            Valider les modifications
        </button>
    </div>
</form>