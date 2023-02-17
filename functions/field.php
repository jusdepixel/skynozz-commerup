<?php

function input($label="field", $name="fieldname", $type="text") {
    return '
        <div class="form-floating mb-3">
            <input 
                type="' . $type .'" 
                id="' . $name .'" 
                name="' . $name .'" 
                value="' . (array_key_exists($name, $_POST) ? $_POST[$name] : "") . '"
                class="form-control" 
                placeholder="' . $label .'"
            >
            <label for="floatingInput">' . $label .'</label>
        </div>
    ';
}