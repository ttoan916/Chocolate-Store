<?php
$server = "localhost";
$user = "student";
$password = "password";
$database = "sets";

$connection = mysqli_connect($server,$user,$password,$database) or die('connection failed');

return $connection;