<?php

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "escola";
$conn = new mysqli($servername, $username, $pass, $dbname);


    if ($conn->connect_error) {
        die("Conection failed: " . $conn->connect_error);
    }

        

?>