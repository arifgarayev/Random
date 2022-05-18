<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constants</title>
</head>
<body>

    <?php
        define("MYNAME", "Arif", false);

        echo MYNAME;

        //constant array

        define("NAMES", ['Arif', 'Kenan', 'Ruslan', 'Nazim']);

        echo "<br>";

        echo NAMES[3];

        
    ?>
    
</body>
</html>