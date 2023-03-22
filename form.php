<?php 
    function showEntryForm($data) {
    echo '<form method="post" action="index.php">
            <tr>
              <td>
                <input type="text" name="name" class="name" value="' . $data["name"] . '">
              </td>
              <td>
                <input type="date" name="birthdate" class="birthdate" value="' . $data["birthdate"] . '">
                <input name="action" value="submit" type="hidden">
                <input name="submit" value="+" type="submit" id="submit"><br>
              </td>
            </tr>
            <tr>
              <td>
                <span class="error">' . $data["nameErr"] . '</span>
              </td>
              <td>
                <span class="error">' . $data["birthdateErr"] . '</span>
              </td>
            </tr>
        </form><br>'; 

    }

    function showDeleteButton() { // html arrays in POST data                 
    echo '<tr>
            <td></td><td></td><td>
              <input type="hidden" value="delete" name="action">
              <input type="submit" value="Verwijderen">
              </form>
            </td>
           <tr>';
    }  

?>