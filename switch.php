<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Switch statement</title>
</head>
<body>

<h1>Try to compare hours using swtich statement rather than if</h1>

<?php

    $now_dt = date("H");

    switch ($now_dt){
        case $now_dt < 12:
            echo "Good Morning";
            break;
        case $now_dt < 20:
            echo "Have a good day";
            break;
        
        default:
        echo "Good Night";


    }

?>


    
</body>
</html>