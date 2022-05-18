<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert records</title>
</head>
<body>

<?php

$server = "localhost";
$username = "root";
$password = "root";
$db_name = "Drivers";

$mysql_object = new mysqli($server, $username, $password, $db_name);

// $query = "INSERT INTO Users (firstname, lastname, username, password_, date_of_birth, email) VALUES ('asd', 'asd', 'asdad', 'awdawd', '1203-03-23', 'awdaw@mil.ru')";
    

// if ($mysql_object->query($query) === TRUE)
// {
//     echo TRUE;
// }
// else
// {
//     echo $mysql_object->error;
// }


// $mysql_object->close();

$users = [['Arif', 'Garayev', 'garayev99', 'easypass',
 '1999-01-21', 'garayevarif@gmail.com'], 
 ['Murad', 'Mammadli', 'murki14mammadli', 'hardpass', '1999-08-11',
'murad_mammadli_90@mail.ru'], ['Isa', 'Babayev', 'balabeyqaqa', 'qwertyaaz',
'1994-03-04', 'isabalabeyxarasp@hotmail.com'], 
['Shamil', 'Pashali', 'pashayevpetux120', 'defaultpass', '1992-12-12',
'nizamistarshibratva@alqis.az']];


//print_r($users);

$query_default = "INSERT INTO Users (firstname, lastname, username, password_, date_of_birth, email) VALUES ( ";


//$mysql_object->query($query . '( ' . $users[$i][$k] . ', ' . ' )')


for ($i = 0; $i < count($users); $i++)
{

    $query = $query_default;

    for ($k = 0; $k < count($users[$i]); $k++)
    {
        if (count($users[$i]) - 1 == $k)
        {
            $query .= "'{$users[$i][$k]}' )";
        }
        else
        {
            $query .= "'{$users[$i][$k]}', ";
        }
        
        
        
    }


    echo "<br><br> $query <br><br><br>";

    
    if ($mysql_object->query($query) === TRUE) {
        echo "New record created successfully";
      } else {
        echo $mysql_object->error;
      }


}






?>

    
</body>
</html>