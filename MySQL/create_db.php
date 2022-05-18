<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create DB</title>
</head>
<body>
<?php
$server = "localhost";
$username = "root";
$password = "root";


$mysql_object = new mysqli($server, $username, $password);

$query = "CREATE DATABASE Drivers";

$mysql_object->query($query);


$mysql_object->close();
    

?>
</body>
</html>