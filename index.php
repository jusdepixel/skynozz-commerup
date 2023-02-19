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
require_once FUNCTIONS . '/user.php';
require_once FUNCTIONS . '/cart.php';

verify();
firewall();
create();
login();
update();

include SITE_PARTIALS . "/_header.php";

if (PAGE) {
    $file = SITE_PAGE . "/" . PAGE . ".php";
    if (file_exists($file)) {
        include $file;
    } else {
        include SITE_PAGE . "/error.php";
    }
} else {
    include SITE_PAGE . "/home.php";
}

if (http_response_code() !== 302) {
    showNotify();
}

include SITE_PARTIALS . "/_footer.php";