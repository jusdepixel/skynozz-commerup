<?php

function input($label="field", $name="fieldname", $type="text", $required="true"): string
{
    return '
        <div class="form-group form-floating mb-3 has-validation">
            <input 
                type="' . $type .'" 
                id="' . $name .'" 
                name="' . $name .'" 
                value="' . (array_key_exists($name, $_POST) ? $_POST[$name] : "") . '"
                class="form-control ' .
                    (array_key_exists('errors', $_POST) && in_array($name, $_POST['errors']) ?
                        "is-invalid"
                    :
                        "is-valid"
                    ) . '"
                placeholder="' . $label . ' ' . ($required ? "*" : "") . '"
            >
            <label for="' . $name .'">' .
                $label. ' ' .
                ($required ? "<span class='text-danger fw-bold'>*</span>" : "") . '
            </label>
        </div>
    ';
}