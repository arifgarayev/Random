<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math functions</title>
</head>
<body>
    
    <?php

        echo "The pi number is ", pi();

        echo "<br>";

        echo "The minimum of 0, 150, 30, 20, -8, -200 is ", (min(0, 150, 30, 20, -8, -200));  // return -200

        echo "<br>";

        echo "Absolute value of -1243.44 is ", (abs(-1243.44));

        echo "<br>";

        echo(round(0.59));

        echo "<br>";

        echo "Generate random number ",  rand();

    ?>

</body>
</html>