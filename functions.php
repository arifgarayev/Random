<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Functions</title>
</head>
<body>

<h1>Functions using recursion in PHP</h1>
<br>

<?php

function recursive_factorial(int $intiger)
{

    if ($intiger == 1)
    {
        return $intiger;
    }

    return $intiger * recursive_factorial($intiger -1);


}


echo "Used a recursive function to find a factorial of 5: ", recursive_factorial(5);



?>
    
</body>
</html>