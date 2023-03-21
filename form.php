<?php
    function showEntryForm($data) {
    echo '<form method="post" action="index.php"
    <label for="name" class="name">Naam:</label>
    <label for="birthdate" class="birthdate">Geboortedatum: </label><br>
    <input type="text" name="name" class="name" value="' . $data["name"] . '">
    <input type="text" name="birthdate" class="birthdate" value="' . $data["birthdate"] . '">
    <input name="page" value="submit" type="hidden">
    <input name="submit" value="+" type="submit" id="submit"><br>
    <span class="error">' . $data["nameErr"] . '</span>
    <span class="error">' . $data["birthdateErr"] . '</span>';
    }
    
?>