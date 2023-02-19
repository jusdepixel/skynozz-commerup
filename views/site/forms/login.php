<h4 class="mb-3">Je m'identifie</h4>
<div class="col-12">
    <?= input("Email", "login_email", "email") ?>
</div>
<div class="col-12">
    <?= input("Mot de passe", "login_password", "password") ?>
</div>
<div class="col-12">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
            Se souvenir de moi pendant 7 jours
        </label>
    </div>
</div>
<div class="form-text mt-4 mb-3 col-6">
    Vous avez oublié votre mot de passe ? <a href="/user/lost-password">Cliquez ici !</a>
</div>