<?php

/**
 * Routes où l'user doit être connecté
 */
const ROUTES_LOGGED = [
    'user/account',
    'user/logout',
    'user/order',
    'user/orders',
];

/**
 * Routes où l'user doit ne PAS être connecté
 */
const ROUTES_NOT_LOGGED = [
    'user/authenticate',
];

function firewall(): void {
    if (getSession()['id']) {
        if (in_array(PAGE, ROUTES_NOT_LOGGED)) {
            Header('Location: /user/account');
        }
    } else {
        if (in_array(PAGE, ROUTES_LOGGED)) {
            Header('Location: /user/authenticate');
        }
    }
}