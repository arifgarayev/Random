<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to BOLT EU</title>
</head>
<body>
    

<?php


$servername = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'drivers';

$conn = new mysqli($servername, $username, $password, $dbname);

$conn -> set_charset("utf8");

$query = "SELECT * FROM drivers.drivers WHERE USERNAME='{$_POST["USERNAME"]}' AND PASSWORD='{$_POST["PASSWORD"]}'";

$query_out = $conn->query($query);

if ($query_out -> num_rows > 0)
{
    while ($query_ou = $query_out->fetch_assoc())
    {
        echo "Welcome " . $query_ou['F_NAME'] . ' ' . $query_ou["L_NAME"] . "<br>";

        echo "Your username is: {$query_ou['USERNAME']}";
    }
}
else
{
    echo 'This Driver doesn\'t exist';
}

$conn->close();
?> 


</body>
</html>