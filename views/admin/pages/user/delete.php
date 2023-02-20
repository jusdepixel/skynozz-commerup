<h1 class="mb-5">Utilisateur - Suppression</h1>
<?php
$page = '/admin/' . PAGE . '?id=';
$uri = $_SERVER['REQUEST_URI'];
$id = str_replace($page, '', $uri);

userDelete($id);