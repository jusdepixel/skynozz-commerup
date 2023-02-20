<h1 class="mb-5">Utilisateur - Création</h1>

<a href="/admin/user/index" class="btn btn-primary nav-btn-top">
    <i class="bi bi-people me-1"></i>
    Gestion des utilisateurs
</a>

<div class="clear"></div>

<form method="post"
      class="needs-validation <?= array_key_exists('user_create', $_POST) ? "was-validated" : "" ?>"
      action="/admin/user/create"
      novalidate
>
    <div class="row">
        <div class="col-lg-7 col-sm-12">
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
        </div>

        <div class="col-lg-5 col-sm-12">
            <h4 class="mb-3">Identifiants</h4>
            <div class="col-12">
                <?= input("Email", "email", "email") ?>
            </div>
            <div class="col-12">
                <?= input("Mot de passe", "password", "password") ?>
            </div>
        </div>

        <div class="col-12 d-flex">
            <button name="user_create" type="submit" class="btn btn-primary mb-4 ms-auto">
                <i class="bi bi-person-add me-2"></i>
                Créer le compte
            </button>
        </div>
    </div>
</form>