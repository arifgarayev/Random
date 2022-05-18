<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array operators</title>
</head>
<body>

<h1>Array union and comparison without iteration :)</h1>


<?php

    $array_1 = ["red" => "color"];

    $array_2 = ["green" => "not color"];

    $array_union = $array_1 + $array_2;

    print_r($array_union);

    

?>
    
</body>
</html>