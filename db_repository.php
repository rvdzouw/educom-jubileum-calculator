<?php 

    function connectToDatabase() {
        $servername = "127.0.0.1";
        $username = "rubens_webshop_user";
        $password = "test1234";
        $database = "rubens_jubileum_calculator";

        mysqli_report(MYSQLI_REPORT_OFF);
        $conn = @mysqli_connect($servername, $username, $password, $database);    

        if (!$conn) {
            throw new Exception("Can not connect to database. Error: " . mysqli_connect_error());
        }
        return $conn;
    }

    function findUserByName($name) {
        $conn = connectToDatabase();
        try {
            $name = mysqli_real_escape_string($conn, $name);
            $sql = "SELECT * FROM people WHERE name=$name";
            $result = mysqli_query($conn, $sql);
            if ($result == false) {
                throw new Exception("Query failed, SQL: " . $sql . " Error: " . mysqli_error($conn));
            }
            $person = mysqli_fetch_assoc($result);
            return $person; 
        }
        finally {
            closeDB($conn);
        }
    }

    function updatePeopleList($name, $birthdate) {
        $conn = connectToDatabase();
        try{
            $name = mysqli_real_escape_string($conn, $name);
            $birthdate = mysqli_real_escape_string($conn, $birthdate);
            $sql = "INSERT INTO people (name, birthdate) VALUES ('$name', '$birthdate')";
            
            mysqli_query($conn, $sql);
            if (!mysqli_query($conn, $sql)) {
                throw new Exception("Query failed, SQL: " . $sql . "Error: " . mysqli_error($conn));
            }
        }
        finally {
            mysqli_close($conn);
        }
    }

    function showPeopleList() {
        $conn = connectToDatabase();
        
        $sql = "SELECT  name, birthdate FROM people";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo $row["name"]. " " . $row["birthdate"]. "<br>";
            }
        } else {
            echo "0 results";
        }
        
        mysqli_close($conn);
    }