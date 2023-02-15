<?php

session_start();

$_SESSION['id'] = null;
$_SESSION['cart'] = null;

function getSession() {
    return $_SESSION;
}

function setSession($key, $value) {
    $_SESSION[$key] = $value;

    return getSession();
}

function unsetSession($key) {
    unset($_SESSION[$key]);
}