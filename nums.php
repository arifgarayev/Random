<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numbers in PHP</title>
</head>
<body>

<h1>Numbers in PHP</h1>

    <?php
        echo "This is the maximum intiger in 64 bit environments ", PHP_INT_MAX, "<br>";

        $x = 5229.12385;
        
        echo "Check if $x is intiger? ", var_dump(is_int($x)), "<br>";


        $x = 1.9e411;
        var_dump($x);
        echo "<br>";
        $x = "59.85" + 100;
        var_dump(is_numeric($x));
        echo "<br>";
        $x = "Hello";
        var_dump(is_numeric($x));


        $float = 324.111;

        echo "<br>";
        $intiger_of_float = (int) $float;

        echo "Intiger of $float is ", $intiger_of_float;


    ?>
    
</body>
</html>