<?php

    function showHomeContent($data) {
        echo '<tr><th>Naam</th><th>Geboortedatum</th></tr>';
        echo '<form method="post" action="index.php">';
        $people = showPeopleList();
                foreach ($people as $person) {
                    echo '<tr>
                            <td>' . $person["name"] . '</td>
                            <td>' . $person["birthdate"] . '</td>
                            <td><input type="checkbox" name="todelete[]" value="' . $person["id"] . '"></td>
                            <td><a href="index.php?action=edit&id=' . $person["id"] . '" class="button">Aanpassen</a></td>
                        </tr>';
                }
        showEntryForm($data);                          
        showDeleteButton();
        showDeleteAll();
    }
?>
