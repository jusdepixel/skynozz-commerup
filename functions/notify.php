<?php

function setNotify($status, $message, $icon) {
    $notify = [
        'status' => $status,
        'message' => $message,
        'icon' => $icon
    ];

    setSession("notify", serialize($notify));


}

function getNotify($key) {
    if (array_key_exists('notify', getSession())) {
        $notify = getSession()['notify'];
        return unserialize($notify);

    } else {
        return false;
    }
}

function showNotify() {
    $notify = getNotify('notify');

    if ($notify) {
        unsetSession('notify');
        return '
        <div class="alert alert-' . $notify['status'] . '">
            <i class="me-2 bi bi-' . $notify['icon'] . '"></i>' .
            $notify['message'] . '
        </div>
        ';
    }
}