<?php

function isAuthenticated() {
    return (bool)getSession()['id'];
}

function verify() {
    global $mysqli;

    if (!isAuthenticated()) {
        $sql = $mysqli->query("SELECT id FROM users WHERE id = " . getSession()['id']);
        $user = $sql->fetch_array(MYSQLI_ASSOC);

        if (! $user) {
            session_destroy();
        }
    }
}

function create() {
    if (array_key_exists('user_create', $_POST)) {
        global $mysqli;

        $fieldsError = [];

        $email = ($_POST['email'] ? $_POST['email'] : $fieldsError[] = "email");
        $password = ($_POST['password'] ? $_POST['password'] : $fieldsError[] = "password");
        $phone = ($_POST['phone'] ? $_POST['phone'] : $fieldsError[] = "phone");
        $firstname = ($_POST['firstname'] ? $_POST['firstname'] : $fieldsError[] = "firstname");
        $lastname = ($_POST['lastname'] ? $_POST['lastname'] : $fieldsError[] = "lastname");
        $address = ($_POST['address'] ? $_POST['address'] : $fieldsError[] = "address");
        $zip = ($_POST['zip'] ? $_POST['zip'] : $fieldsError[] = "zip");
        $city = ($_POST['city'] ? $_POST['city'] : $fieldsError[] = "city");

        if ($email && isExistantEmail($email)) {
            $fieldsError[] = 'email';
            $status = "danger";
            $icon = "x-lg";
            $message = "Votre email existe déjà.";
        }

        if (count($fieldsError) === 0) {
            $password_hash = hashPassword($password);

            $res = $mysqli->query("
                INSERT INTO users (email, password, phone, firstname, lastname, address, zip, city) 
                VALUES('$email', '$password_hash', '$phone', '$firstname', '$lastname', '$address', '$zip', '$city')
            ");

            if ($res) {
                $_POST = [];
                $status = "success";
                $icon = "check-lg";
                $message = "Votre compte a bien été créé.";
            } else {
                $status = "danger";
                $icon = "x-lg";
                $message = "Erreur de création de votre compte.";
            }

        } else {
            $status = "danger";
            $icon = "x-lg";
            $message = "Veuillez vérifier votre saisie : <br />";
            $message .= implode("<br /> ", $fieldsError);
        }

        setNotify($status, $message, $icon);
    }
}

function isExistantEmail($email) {
    global $mysqli;

    $sql = $mysqli->query("SELECT id FROM users WHERE email = '$email'");
    $user = $sql->fetch_array(MYSQLI_ASSOC);

    return (bool)$user;
}

function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

function update() {
    global $mysqli;

    $address = $_POST['address'];
    $zip = $_POST['zip'];
    $city = $_POST['city'];

    $res = $mysqli->query("
        UPDATE users (address, zip, city) 
        VALUES('$address', '$zip', '$city') 
        WHERE id = " . getSession()['id'] . "
    ");

    return (bool)$res;
}

function login() {
    global $mysqli;

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = $mysqli->query("SELECT id, password AS password_hash FROM users WHERE email = '$email';");
    $user = $sql->fetch_array(MYSQLI_ASSOC);

    if ($user) {
        if (password_verify($password, $user->password_hash)) {
            setSession('id', $user->id);
            setNotify(true, "Connexion réussie !");
        }
    } else {
        setNotify(false, "Erreur de connexion !");
    }
}

function logout() {
    unsetSession(getSession()['id']);
}