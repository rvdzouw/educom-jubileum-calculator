<?php
echo   '<!DOCTYPE html>
<html lang="NL">
<head>
<link rel="stylesheet" href="mystyle.css">
<title>Jubileum calculator</title>
</head>
<body>';
require_once('form.php');
require_once('db_repository');

echo '<h1>Jubileum Calculator</h1>';
showEntryForm();



echo '</body></html>';

function getPostVar($key, $default = '') {
    return isset($_POST[$key]) ? $_POST[$key] : $default;
}

?> 