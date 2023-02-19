<?php
    require_once 'functions/field.php';

    if (!array_key_exists('user_update', $_POST)) {
        $user = getSession()['user'];
        foreach($user as $key => $value) {
            $_POST[$key] = $value;
        }
    }
?>

<h1 class="mb-5">Mon compte</h1>

<form method="post"
      class="needs-validation <?= array_key_exists('user_update', $_POST) ? "was-validated" : "" ?>"
      action="/user/account"
      novalidate
>
    <div class="row">
        <?php include SITE_FORMS . "/coords.php"; ?>
        <div class="col-6 d-flex">
            <button name="user_update" type="submit" class="btn btn-primary mb-4 ms-auto">
                <i class="bi bi-check me-2"></i>
                Valider les modification
            </button>
        </div>
    </div>
</form>