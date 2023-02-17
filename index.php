<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'functions/db.php';
require_once 'functions/session.php';
require_once 'functions/notify.php';
require_once 'functions/user.php';
require_once 'functions/cart.php';


$uri = "?page=";
$page = array_key_exists('page', $_GET) ? $_GET['page'] : null;

include "views/site/partials/_header.php";

if ($page) {
    $file = "views/site/$page.php";
    if (file_exists($file)) {
        include $file;
    } else {
        include "views/site/pages/error.php";
    }
} else {
    include "views/site/pages/home.php";
}

include "views/site/partials/_footer.php";