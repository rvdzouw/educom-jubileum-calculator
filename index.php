<?php

require_once('form.php');
require_once('db_repository.php');
require_once('user_service.php');
require_once('layout.php');

// $page = getRequestedPage();
$action = getRequestedAction();
$data = processRequest($action);
showResponsepage($data);

function  processRequest($action) {
    require_once('validations.php');
    $data = array('genericErr' => '');


    switch($action) {
        case 'home' :
            $data = validateInput();
            if ($data['valid']) {
                savePersonToList($data['name'], $data['birthdate']);     
            }
        break;
        case 'edit' :
            try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = getPostVar("id");
                $person = array('name' => getPostVar('name'), 'birthdate' => getPostVar('birthdate'), 'id' => $id); 
                $data = validateInput();
                if ($data['valid']) {
                        updatePerson($person);
                        $action = 'home';
                        $data['name'] = '';
                        $data['birthdate'] = '';
                
                }
            } else {
                $id = getUrlVar("id");
                $person = findUserByID($id);
                $data = array("name" => $person['name'], "birthdate" => $person['birthdate'], "nameErr" => '', "birthdateErr" => '', 'id'=>$id, "valid" => false);
            }
        }
        catch (Exception $e) {
            $data['genericErr'] = "Er is een technische storing, probeer het later nogmaals";
                LogError("authentication failed " . $e -> getMessage());
    }
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

// function getRequestedPage() {
//     if ($_SERVER["REQUEST_METHOD"] == "POST") { 
//         return getPostVar("page", "home"); 
//     } else { 
//         return getUrlVar("page", "home"); 
//     }
// }

function getRequestedAction() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        return getPostVar("action");        
    } else { 
        return getUrlVar("action", "home"); 
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
    showGenericErr($data);
    showTableEnd();
    showBodyEnd();
}



function showContent($data) {
    switch($data['action']) {
        case 'home' : 
            require_once('home.php');
            showHomeContent($data);
            break;
        case 'edit' :
            require_once('edit.php');
            showEditContent($data);
            break;
        default:
            echo 'ERROR: Page not Found';
            break;          
    }
}

function showGenericErr($data) {
    if (isset($data['genericErr'])) {
        echo '<span class="error">' . $data['genericErr'] . '</span>';
    }
     
}
function logError($message) {
    debugToConsole($message);
    
}
function debugToConsole($data) {
    $output = str_replace("'", "\\'" , $data); // escape all possible ' characters.
    if (is_array($output))
        $output = implode(',', $output);
    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
?> 