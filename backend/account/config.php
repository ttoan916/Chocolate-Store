<?php
$server = "localhost";
$user = "student";
$password = "password";
$database = "sets";

$connection =  new mysqli($server, $user, $password,$database);

if ($connection->connect_errno) {
    die("Connection error: " . $connection->connect_error);
}

return $connection;