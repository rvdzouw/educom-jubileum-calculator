<?php

require_once('form.php');
require_once('db_repository.php');
require_once('validations.php');
require_once('delete.php');

$page = getRequestedPage();
$action = getRequestedAction();
$data = processRequest($action);
showResponsepage($data);

function  processRequest($action) {
    switch($action) {
        case 'submit' :
            $data = validateInput();
            if ($data['valid']) {
                savePersonToList($data['name'], $data['birthdate']);     
            }
        break;    
        case 'delete' :
            $data = array("name" => '', "birthdate" => '', "nameErr" => '', "birthdateErr" => '', "valid" => false);
            foreach($_POST['todelete'] as $userid) {
            deletePerson($userid); 
            }       
        break;
        default: $data = array("name" => '', "birthdate" => '', "nameErr" => '', "birthdateErr" => '', "valid" => false);
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

function getRequestedAction() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        return getPostVar("action");        
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
    echo '<form method="post" action="index.php">';
    showPeopleList();
    showDeleteButton();
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