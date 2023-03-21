<?php

require_once('form.php');
require_once('db_repository.php');
require_once('validations.php');

$page = getRequestedPage();
$data = processRequest($page);
showResponsepage($data);

function  processRequest() {
    $data = validateInput();
    if ($data['valid']) {
        updatePeopleList($data['name'], $data['birthdate']);     
    }
    return $data;
}

function showDocStart() {
    echo   '<!DOCTYPE html>
    <html lang="NL-nl">
    <head>
    <link rel="stylesheet" href="mystyle.css">
    <title>Jubileum calculator</title>
    </head>';
}


function getPostVar($key, $default = '') {
    return isset($_POST[$key]) ? $_POST[$key] : $default;
}

function getUrlVar($key, $default = '') {
    return isset($_GET[$key]) ? $_GET[$key] : $default;
}

function getRequestedPage() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        return getPostVar("page"); 
    } else { 
        return getUrlVar("page"); 
    }
}


function showResponsePage($data) { 
    showDocStart(); 
    showBodySection($data);
    showDocEnd();
}

function showBodysection($data) {
    echo '<h1>Jubileum Calculator</h1>';
    echo '<table>';
    echo '<tr><th>Naam</th><th>Geboortedatum</th></tr>';
    showPeopleList();
    showEntryForm($data);
    echo '</table>';
}


function showDocEnd() {
    echo '</html>';
}

function savePersonToList($name, $birthdate) {
    updatePeopleList($name, $birthdate);
}






?> 