<?php


    function validateInput() {
        
        $name = $birthdate = "";
        $nameErr = $birthdateErr = "";
        $genericErr = "";
        $valid = false;

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (empty(getPostVar('name'))) { 
                    $nameErr="* Vul de naam in";
                } else { 
                    $name=test_input(getPostVar('name'));
                }

                if (empty(getPostVar('birthdate'))) {
                    $birthdateErr ="* Vul een Geboortedatum in";
                } else {
                    $birthdate=test_input(getPostVar('birthdate'));                
                }
                if ($nameErr === "" && $birthdateErr === "") {   
                    $valid = true;
                
            }
        }                
        return array("name" => $name, "birthdate" => $birthdate, "nameErr" => $nameErr, "birthdateErr" => $birthdateErr, "genericErr" => $genericErr, "valid" => $valid);
    } 

        
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>
