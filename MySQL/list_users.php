<!DOCTYPE html>
<html lang="en">
<head>
        <style>
        table, th, td {
          border: 1.3px solid black;
          border-collapse: collapse;
          width: 200px;
          height: 30px;
          text-align: center;
          font-size: 20px;
          padding: 5px;
          margin-left: auto;
          margin-right: auto;
          margin-top: auto;
        }

        #table tr:nth-child(even){
            background-color: rgb(211, 209, 209);
        }
        #table tr:nth-child(odd){
            background-color: rgb(201, 248, 248);
        }
        </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List users</title>
</head>
<body>

<?php


$server = "localhost";
$username = "root";
$password = "root";
$db_name = "Drivers";

$mysql_object = new mysqli($server, $username, $password, $db_name);

$query = "SELECT id, firstname, lastname, username, password_, date_of_birth, email, reg_time FROM Users";

$res = $mysql_object->query($query);

if ($res->num_rows > 0)
{
    echo "<table id=\"table\"> <caption>MSQL INSERT DATA INTO TABLE</caption><tr><th>ID</th><th>Name</th><th>Last Name</th><th>Username</th><th>Password</th><th>Date of Birth</th><th>Email</th><th>Registration date and time</th></tr>";


    while ($row = $res->fetch_assoc())
    {
        echo "<tr><td> {$row['id']} </td> <td>{$row['firstname']}</td><td>{$row['lastname']}</td><td>{$row['username']}</td><td>{$row['password_']}</td><td>{$row['date_of_birth']}</td><td>{$row['email']}</td><td>{$row['reg_time']}</td></tr>";
    }

    echo "</table>";

}

else
{
    echo "No res";
}


$mysql_object->close();

?>

    
</body>
</html>