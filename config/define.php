<?php

const FUNCTIONS = ROOT . '/functions';

const VIEWS = '/views';
const ASSETS = VIEWS . '/assets';
const CSS = ASSETS . '/css';
const JS = ASSETS . '/js';
const IMG = ASSETS . '/images';

const SITE = ROOT . VIEWS . '/site';
const SITE_PAGE = SITE . '/pages';
const SITE_FORMS = SITE . '/forms';
const SITE_PARTIALS = SITE . '/partials';

const URI = '?page=';
define("PAGE", array_key_exists('page', $_GET) ? $_GET['page'] : null);