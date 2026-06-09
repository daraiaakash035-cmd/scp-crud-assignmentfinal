<?php

$host = "localhost";
$user = "a30105201_a30105201";
$password = "Toiohomai1234";
$database = "a30105201_scp_database";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
