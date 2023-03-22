<?php

function deletePerson($userid) {
$conn = connectToDatabase();

//Define the query
$sql = "DELETE FROM people WHERE id=$userid";

//sends the query to delete the entry
$result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) { 
// //if it updated

//     echo '<strong>Persoon is verwijderd uit de database</strong><br /><br />';
//  } else { 
// //if it failed    
//     echo '<strong>Verwijderen mislukt</strong><br /><br />';
//     } 
}
?>