<?php

/**
 * @package User
 * @version 1.0
 * @author Jusdepixel <mandy@jusdepixel.fr>
 */

/**
 * Loading functions
 */

login();
userCreate();

if (!IS_ADMIN) {
    userUpdate();
}

/**
 * Create a user
 * @return void
 */
function userCreate(): void
{
    if (array_key_exists('user_create', $_POST)) {
        global $mysqli;

        $_POST['errors'] = [];

        $email = ($_POST['email'] ? $_POST['email'] : $_POST['errors']['email'] = "email");
        $password = ($_POST['password'] ? $_POST['password'] : $_POST['errors']['password'] = "password");
        [$firstname, $lastname, $address, $zip, $city, $phone] = checkAccount();

        if ($email && isExistantEmail($email)) {
            $_POST['errors']['email'] = "email";
            setNotify(
                "danger",
                "Ce compte existe déjà.",
                "info-circle-fill"
            );
            Header("HTTP/1.1 400 Bad Request");
        }

        if (count($_POST['errors']) === 0) {
            $password_hash = hashPassword($password);

            $res = $mysqli->query("
                INSERT INTO users (email, password, phone, firstname, lastname, address, zip, city) 
                VALUES('$email', '$password_hash', '$phone', '$firstname', '$lastname', '$address', '$zip', '$city')
            ");

            if ($res) {
                setNotify(
                    "success",
                    "Le compte a bien été créé.",
                    "check-lg"
                );
                if (IS_ADMIN) {
                    Header('Location: /admin/user/index', 302);
                } else {
                    setSession('id', mysqli_insert_id($mysqli));
                    verify();
                    Header('Location: /cart', 302);
                }
            } else {
                setNotify(
                    "danger",
                    "Erreur de création du compte.",
                    "info-circle-fill"
                );
                Header("HTTP/1.1 400 Bad Request");
            }

        } else {
            setNotify(
                "danger",
                "Veuillez vérifier votre saisie.",
                "info-circle-fill"
            );
            Header("HTTP/1.1 400 Bad Request");
        }
    }
}

/**
 * Update a user
 * @param int|null $id
 * @return void
 */
function userUpdate(?int $id = null): void
{
    $id_user = $id !== null ? $id : getSession()["id"];

    if (array_key_exists('user_update', $_POST)) {
        global $mysqli;

        $_POST['errors'] = [];

        [$firstname, $lastname, $address, $zip, $city, $phone] = checkAccount();

        if (count($_POST['errors']) === 0) {
            $res = $mysqli->query('
                UPDATE users 
                SET
                    firstname = "' . $firstname . '",
                    lastname = "' . $lastname . '",
                    address = "' . $address . '", 
                    zip = "' . $zip . '", 
                    city = "' . $city . '", 
                    phone = "' . $phone .'"
                WHERE id = ' . $id_user . ';
            ');

            if ($res) {
                setNotify(
                    "success",
                    "Le compte a bien été modifié.",
                    "check-lg");

                if (IS_ADMIN) {
                    Header('Location: /admin/user/update?id=' . $id, 302);
                } else {
                    Header('Location: /user/account', 302);
                }
            } else {
                setNotify(
                    "danger",
                    "Erreur de modification du compte.",
                    "info-circle-fill"
                );
                Header("HTTP/1.1 400 Bad Request");
            }
        } else {
            setNotify(
                "danger",
                "Veuillez vérifier votre saisie.",
                "info-circle-fill"
            );
            Header("HTTP/1.1 400 Bad Request");
        }
    }
}

/**
 * Delete a user
 * @param int $id
 * @return void
 */
function userDelete(int $id): void
{
    global $mysqli;

    $mysqli->query("
            DELETE 
            FROM users 
            WHERE id = " . $id
    );

    setNotify(
        "success",
        "Le compte a bien été supprimé.",
        "check-lg");

    Header('Location: /admin/user/index', 302);
}

/**
 * Get logged user
 * @return array|null
 */
function userGetMe(): ?array
{
    global $mysqli;

    $sql = $mysqli->query("
            SELECT id, email, firstname, lastname, address, zip, city, phone, admin 
            FROM users 
            WHERE id = " . getSession()['id']
    );
    return $sql->fetch_array(MYSQLI_ASSOC);
}

/**
 * Get one user
 * @param int $id
 * @return bool|mysqli_result
 */
function userGetOne(int $id): bool|mysqli_result
{
    global $mysqli;

    return $mysqli->query("
            SELECT * 
            FROM users 
            WHERE id = " . $id
    );
}

/**
 * Get all users
 * @return object|null
 */
function userGetAll(): ?object
{
    global $mysqli;

    return $mysqli->query("
            SELECT id, email, firstname, lastname, address, zip, city, phone, admin 
            FROM users 
            ORDER BY id DESC
    ");
}

/**
 * Utilities
 */

function isAuthenticated(): bool
{
    return (bool)getSession()['id'];
}

function isAdmin(): bool
{
    return (bool)getSession()['user']['admin'] == 1;
}

function verify(): void
{
    if (isAuthenticated()) {
        $user = userGetMe();

        if ($user) {
            setSession('user', $user);
        } else {
            unsetSession('id');
            unsetSession('user');
        }
    }
}

function isExistantEmail($email): bool
{
    global $mysqli;

    $sql = $mysqli->query("SELECT id FROM users WHERE email = '$email'");
    $user = $sql->fetch_array(MYSQLI_ASSOC);

    return (bool)$user;
}

function hashPassword($password): string
{
    return password_hash($password, PASSWORD_BCRYPT);
}

function checkAccount():array
{
    return [
        ($_POST['firstname'] ? $_POST['firstname'] : $_POST['errors']['firstname'] = "firstname"),
        ($_POST['lastname'] ? $_POST['lastname'] : $_POST['errors']['lastname'] = "lastname"),
        ($_POST['address'] ? $_POST['address'] : $_POST['errors']['address'] = "address"),
        ($_POST['zip'] ? $_POST['zip'] : $_POST['errors']['zip'] = "zip"),
        ($_POST['city'] ? $_POST['city'] : $_POST['errors']['city'] = "city"),
        ($_POST['phone'] ? $_POST['phone'] : $_POST['errors']['phone'] = "phone"),
    ];
}

function login(): void
{
    if (array_key_exists('user_login', $_POST)) {
        global $mysqli;

        $_POST['errors'] = [];

        $email = ($_POST['login_email'] ?: $_POST['errors']['login_email'] = "login_email");
        $password = ($_POST['login_password'] ?: $_POST['errors']['login_password'] = "login_password");

        $sql = $mysqli->query('
            SELECT id, firstname, password AS password_hash 
            FROM users 
            WHERE email = "' . $email . '";'
        );
        $user = mysqli_fetch_object($sql);

        if ($user) {
            if (password_verify($password, $user->password_hash)) {
                setSession('id', $user->id);
                setNotify(
                    "success",
                    "Bienvenue " . $user->firstname . " !",
                    "check-lg"
                );
                Header('Location: /user/account', 302);
            } else {
                $_POST['login_password'] = '';
                setNotify(
                    "danger",
                    "Erreur de connexion !",
                    "info-circle-fill"
                );
                Header("HTTP/1.1 403 Unauthorized");
            }
        } else {
            $_POST['login_password'] = '';
            setNotify(
                "danger",
                "Erreur de connexion !",
                "info-circle-fill"
            );
            Header("HTTP/1.1 403 Unauthorized");
        }
    }
}

function logout(): void
{
    setNotify(
        "success",
        "Déconnexion réussie, bonne journée " . getSession()['user']['firstname'] . " !",
        "check-lg"
    );
    unsetSession('id');
    unsetSession('user');
    unsetSession('notify');
    Header('Location: /', 302);
}