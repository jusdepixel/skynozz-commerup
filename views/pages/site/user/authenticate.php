<h1>Authenticate</h1>

<?php
    create();
    echo showNotify();
?>

<form method="post" action="?page=user/authenticate">
    <input type="hidden" name="redirect" value="home">

    <label>
        <input type="text"
               name="email"
                value="<?= array_key_exists('email', $_POST) ? $_POST['email'] : '' ?>"
                placeholder="email"
        />
    </label>
    <label>
        <input type="password"
               name="password"
                value="<?= array_key_exists('password', $_POST) ? $_POST['password'] : '' ?>"
                placeholder="password"
        />
    </label>
    <label>
        <input type="text"
               name="firstname"
                value="<?= array_key_exists('firstname', $_POST) ? $_POST['firstname'] : '' ?>"
                placeholder="firstname"
        />
    </label>
    <label>
        <input type="text"
               name="lastname"
                value="<?= array_key_exists('lastname', $_POST) ? $_POST['lastname'] : '' ?>"
                placeholder="lastname"
        />
    </label>
    <label>
        <input type="text"
               name="address"
                value="<?= array_key_exists('address', $_POST) ? $_POST['address'] : '' ?>"
                placeholder="address"
        />
    </label>
    <label>
        <input type="text"
               name="zip"
                value="<?= array_key_exists('zip', $_POST) ? $_POST['zip'] : '' ?>"
                placeholder="zip"
        />
    </label>
    <label>
        <input type="text"
               name="city"
                value="<?= array_key_exists('city', $_POST) ? $_POST['city'] : '' ?>"
                placeholder="city"
        />
    </label>
    <label>
        <input type="text"
               name="phone"
                value="<?= array_key_exists('phone', $_POST) ? $_POST['phone'] : '' ?>"
                placeholder="phone"
        />
    </label>

    <button name="user_create" type="submit" class="btn btn-primary">Enregistrer</button>
</form>