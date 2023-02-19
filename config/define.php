<?php

const FUNCTIONS = ROOT . '/functions';

const VIEWS = '/views';
const ASSETS = VIEWS . '/assets';
const CSS = ASSETS . '/css';
const JS = ASSETS . '/js';
const IMG = ASSETS . '/images';

const SITE = ROOT . VIEWS . '/site';
const SITE_PAGES = SITE . '/pages';
const SITE_FORMS = SITE . '/forms';
const SITE_PARTIALS = SITE . '/partials';

define("IS_ADMIN", str_replace(ROOT, '', $_SERVER['SCRIPT_FILENAME']) === "/admin.php");

const ADMIN = ROOT . VIEWS . '/admin';
const ADMIN_PAGES = ADMIN . '/pages';
const ADMIN_FORMS = ADMIN . '/forms';
const ADMIN_PARTIALS = ADMIN . '/partials';

const URI = '?page=';

if (IS_ADMIN) {
    $_GET['page'] = str_replace("admin/", "", $_GET['page']);
}

define("PAGE", array_key_exists('page', $_GET) ? $_GET['page'] : null);