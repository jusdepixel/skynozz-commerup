<?php
session_start();
initSession();

function initSession():void
{
    if (!array_key_exists('id', getSession())) {
        setSession('id', null);
        setSession('cart', null);
    }
}

function getSession(): array
{
    return $_SESSION;
}

function setSession($key, $value): array
{
    $_SESSION[$key] = $value;

    return getSession();
}

function unsetSession($key): void
{
    setSession($key, null);
}