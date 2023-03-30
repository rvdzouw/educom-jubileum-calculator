<?php 
    function showEntryForm($data) {
    echo '<form method="post" action="index.php">
            <tr>
              <td>
                <input type="text" name="name" class="name" value="' . getArrayVar($data, "name") . '">
              </td>
              <td>
                <input type="date" name="birthdate" class="birthdate" value="' . getArrayVar($data,"birthdate") . '">
                <input name="action" value="'.getArrayVar($data, 'action', 'submit').'" type="hidden">
                <input name="id" value = "'. getArrayVar($data, 'id', 0) . '" type = "hidden">                
                <input name="submit" value="+" type="submit" id="submit"><br>
              </td>
            </tr>
            <tr>
              <td>
                <span class="error">' . getArrayVar($data, "nameErr") . '</span>
              </td>
              <td>
                <span class="error">' . getArrayVar($data, "birthdateErr") . '</span>
              </td>
            </tr>
        </form><br>'; 

    }

    function showDeleteButton() { // html arrays in POST data                 
    echo '<tr>
            <td></td><td></td><td></td><td>
              <input type="hidden" value="delete" name="action">
              <input type="submit" value="Verwijderen">
              </form>
            </td>
           </tr>';
    }
    
    function showDeleteAll() {
        echo '<form method="post" action="index.php">
                <tr>
                <td></td><td></td><td></td><td>
                  <input type="hidden" value="deleteall" name="action">
                  <input type="submit"value="Allen verwijderen"
                </td>
                </tr>
              </form>';                
    }           
?>