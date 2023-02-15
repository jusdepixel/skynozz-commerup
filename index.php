<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'functions/db.php';
require_once 'functions/session.php';
require_once 'functions/notify.php';
require_once 'functions/user.php';
require_once 'functions/cart.php';

include "views/includes/_header.php";

$page = $_GET['page'];

if ($page) {
    $file = "views/pages/site/$page.php";
    if (file_exists($file)) {
        include $file;
    } else {
        include "views/pages/site/error.php";
    }
} else {
    include "views/pages/site/home.php";
}

include "views/includes/_footer.php";