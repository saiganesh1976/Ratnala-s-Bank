<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "Ratnala_Bank";

$conn = mysqli_connect($server, $username, $password, $database);

if ($conn) {
} else
    die("Connection is Failed. Error: " . mysqli_connect_error());
?>