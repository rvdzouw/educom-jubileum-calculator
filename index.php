<?php

require_once('form.php');
require_once('db_repository.php');
require_once('validations.php');
require_once('user_service.php');
require_once('layout.php');

$page = getRequestedPage();
$action = getRequestedAction();
$data = processRequest($action, $page);
showResponsepage($data);

function  processRequest($action) {
    switch($action) {
        case 'submit' :
            $data = validateInput();
            if ($data['valid']) {
                savePersonToList($data['name'], $data['birthdate']);     
            }
        break;
        case 'edit' :
            $id = getUrlVar("id");
            $person = findUserByID($id);
            $data = array("name" => $person['name'], "birthdate" => $person['birthdate'], "nameErr" => '', "birthdateErr" => '', 'id'=>$id, "valid" => false);
            
        break;       
        case 'delete' :
            $data = array("name" => '', "birthdate" => '', "nameErr" => '', "birthdateErr" => '', "valid" => false);
            foreach($_POST['todelete'] as $userid) {
            deletePerson($userid); 
            }       
        break;
        case 'deleteall' :
            $data = array("name" => '', "birthdate" => '', "nameErr" => '', "birthdateErr" => '', "valid" => false);
            deleteAllData();
        break;
        default: $data = array("name" => '', "birthdate" => '', "nameErr" => '', "birthdateErr" => '', "valid" => false);
    }
    $data['action'] = $action;
    return $data;
}    

function getArrayVar($array, $key, $default = '') {
    return isset($array[$key]) ? $array[$key] : $default;
}

function getPostVar($key, $default = '') {
    return getArrayVar($_POST, $key, $default);
}

function getUrlVar($key, $default = '') {
    return getArrayVar($_GET, $key, $default);
}

function getRequestedPage() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        return getPostVar("page", "home"); 
    } else { 
        return getUrlVar("page", "home"); 
    }
}

function getRequestedAction() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        return getPostVar("action");        
    } 
    
}

function showResponsePage($data) { 
    showDocStart(); 
    showPageHead();
    showBodySection($data);
    showDocEnd();
}

function showBodysection($data) {
    showBodyStart();
    showHeader();
    showTableStart();
    showContent($data);
    showEntryForm($data);
    showTableEnd();
    showBodyEnd();
}



function showContent($data) {

    
            require_once('home.php');
            showHomeContent($data);
            
}

?> 