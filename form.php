<?php
    function showEntryForm() {
    echo '<form method="post" action="calculator.php"
    <label for="name" class="name">Naam:</label>
    <label for="birthdate" class="birthdate">Geboortedatum: </label><br>
    <input type="text" name="name" class="name">
    <input type="date" name="birthday" class="birthdate">
    <input name="page" value="submit" type="hidden">
    <input name="submit" value="Toevoegen" type="submit" id="submit">';
    }
    
?>