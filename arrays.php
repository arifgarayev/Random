<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
</head>
<body>

<h1>PHP Arrays</h1>


<?php

    // simple arrays

    $simple_array = array("Salam", "Baku");

    foreach ($simple_array as $word)
    {
        echo $word, "&nbsp;";
    }

    echo "<br><br><br>";

    //reverse iteration through array

    echo "<h1> Reverse iteration of array</h1>";

    $sample_array = array('Baku', 'Ganja', 'Shusha', 'Sumqayit', 'Mingachevir', 'Qabala');

    for($x = count($sample_array)-1; $x >= 0; $x--)
    {
        echo $sample_array[$x], "<br>";
    }


    echo "<br><br><br><br> <h1> Dictionary type array i.e. Associate </h1>";


    $capitals = array("Turkey"=>"Ankara", "Azerbaijan"=>"Baku", "Georgia"=>"Tblisi", "Russia"=>"Moscow", "Iran"=>"Tehran", "USA"=>"Washington D.C");

    foreach($capitals as $country => $city)
    {
        if ($country != "USA")
        {
            echo "Capital of $country is $city", "<br>";
        }

        else
        {
            echo "Capital of the $country is $city", "<br>";
        }
        
    }

    // for ($x = 0; $x < count($capitals); $x++)
    // {
    //     echo $capitals[$x], '<br>';
    // }

    echo "<br><br><br><br><h1> Multidimenstional Arrays </h1>";

    //initialize array 
    $two_dimensional_array = array("First row: Customer ID" => array('532', '741', '167'), "Second row: Order ID" => array('1151244', '5647', '5632'),
    "Third row: City" => array('Baku', 'Ankara', 'Istanbul'));

    foreach($two_dimensional_array as $row => $array_of_data)
    {
        echo $row, "<br>";
        for($i = 0; $i < count($array_of_data); $i++)
        {
            echo $array_of_data[$i], "<br>";
        }

        echo "<br><h1>============================================</h1><br>";


    }




?>

</body>
</html>