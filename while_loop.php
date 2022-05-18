<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>While loop</title>
</head>
<body>

<h1>In this code I will try a while loop</h1>

<?php
    $i = true; // initialize a boolean


    while ($i)
    {
        static $x = 0; //counter if not static then will inifinetly define as 0 in every iteration and will create and infinite loop

        if ($x == 10)
        {
            $i = false;
        }
        else
        {
            echo "The num is ", $x++, "<br>";
        }
        
        

        
    }

    echo "<br>";


    $i = 0;

    do
    {
        if ($i == 0)
        {
            echo "It will enter at least once <br>";
            $i++;
        }

        echo "The num is: ", $x, "<br>";



        $x--;


    }
    while ($x >= 0);



?>
    
</body>
</html>