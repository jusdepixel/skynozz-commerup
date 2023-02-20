<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

define("ROOT", dirname(__FILE__, 1));
const CONFIG = ROOT . '/config';
require_once CONFIG . '/define.php';
require_once CONFIG . '/firewall.php';

require_once FUNCTIONS . '/db.php';
require_once FUNCTIONS . '/session.php';
require_once FUNCTIONS . '/notify.php';
require_once FUNCTIONS . '/field.php';
require_once FUNCTIONS . '/package.php';

loading();
verify();
firewall();

if (IS_ADMIN) {
    $page = ADMIN_PAGES;
    $partials = ADMIN_PARTIALS;
} else {
    $page = SITE_PAGES;
    $partials = SITE_PARTIALS;
}

include $partials . "/_header.php";

if (PAGE) {
    $file = $page . "/" . PAGE . ".php";
    if (file_exists($file)) {
        include $file;
    } else {
        include $page . "/error.php";
    }
} else {
    include $page . "/home.php";
}

if (http_response_code() !== 302) {
    showNotify();
}

include $partials . "/_footer.php";