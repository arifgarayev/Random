<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data types</title>
</head>
<body>

<h1>This topic is about Data Types in PHP</h1>


    <?php

        $str = "This is string, the sequence of characters";
        $int = 5324;
        $flt = 632.1255;
        $bool = true;
        $nll = null;
        $arr = [1, 2];

        // another declaration of an array

        $arr_2 = array('W3C', 'PEP8', 'CS50', 1);
        
        echo $arr[0];

        echo "<br>", var_dump($int), '&nbsp;', var_dump($str), "&nbsp;", var_dump($flt), '&nbsp;', var_dump($bool), '&nbsp;', var_dump($nll), '&nbsp;', var_dump($arr), '&nbsp;', var_dump($arr_2);


    ?>
    
</body>
</html>