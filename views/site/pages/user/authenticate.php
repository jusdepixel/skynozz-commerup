<h1 class="mb-5">Créez votre compte CommerUp ou identifiez-vous !</h1>
<div class="row">
    <div class="col-lg-6 col-sm-12">
        <form method="post"
              class="needs-validation <?= array_key_exists('user_create', $_POST) ? "was-validated" : "" ?>"
              action="/user/authenticate"
              novalidate
        >
            <div class="row">
                <?php include SITE_FORMS . "/idents.php"; ?>
                <?php include SITE_FORMS . "/coords.php"; ?>
                <div class="col-6 d-flex">
                    <button name="user_create" type="submit" class="btn btn-primary mb-4 ms-auto">
                        <i class="bi bi-person-add me-2"></i>
                        Créer mon compte
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-lg-6 col-sm-12">
        <form method="post" action="/user/authenticate">
            <div class="row">
                <?php include SITE_FORMS . "/login.php"; ?>
                <div class="col-6 mt-4 d-flex">
                    <button name="user_login" type="submit" class="btn btn-primary ms-auto">
                        <i class="bi bi-person-check me-2"></i>
                        Me connecter
                    </button>
                </div>
            </div>
        </form>

    </div>

</div>