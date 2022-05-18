<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create table</title>
</head>
<body>

<?php

$server = "localhost";
$username = "root";
$password = "root";
$db_name = "Drivers";

$mysql_object = new mysqli($server, $username, $password, $db_name);


$query = "CREATE TABLE Users(
    id INT(15) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(25) NOT NULL,
    lastname VARCHAR(25) NOT NULL,
    username VARCHAR(30) NOT NULL,
    password_ VARCHAR(30) NOT NULL,
    date_of_birth DATE NOT NULL,
    email VARCHAR(30),
    reg_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

$mysql_object->query($query);

$mysql_object->close();


?>
    
</body>
</html>