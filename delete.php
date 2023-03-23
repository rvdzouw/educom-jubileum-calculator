<?php

function deletePerson($userid) {
    $conn = connectToDatabase();

    //Define the query
    $sql = "DELETE FROM people WHERE id=$userid";

    //sends the query to delete the entry
    mysqli_query($conn, $sql);
}

function deleteAllData() {
    $conn = connectToDatabase();

    //Define the query
    $sql= "DELETE FROM people";

    //send the query to delete everything
    mysqli_query($conn, $sql);
}
?>