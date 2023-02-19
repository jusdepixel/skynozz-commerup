<?php

function setNotify($status, $message, $icon): void
{
    $notify = [
        'status' => $status,
        'message' => $message,
        'icon' => $icon
    ];

    setSession("notify", serialize($notify));
}

function getNotify(): array|bool
{
    if (array_key_exists('notify', getSession())) {
        $notify = getSession()['notify'];
        return $notify !== null ? unserialize($notify) : false;
    } else {
        return false;
    }
}

function showNotify(): ?string
{
    $notify = getNotify();

    if ($notify) {
        echo '
            <div class="toast-container end-0 p-3">
                <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex m-0 alert alert-' . $notify['status'] . '">
                        <i class="me-2 bi bi-' . $notify['icon'] . '"></i>' . $notify['message'] . '
                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        
                    </div>
                </div>
            </div>
        ';

        $notify = null;
        unsetSession('notify');
    }

    return null;
}