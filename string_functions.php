<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String funvtions</title>
</head>
<body>

<h1>Playing around with string functions in PHP</h1>

    <?php

        $greeting = 'Merhaba, ben Arif!';

        echo "String length of word Selam is = ", strlen('Selam'), " strlen() function retunrs only int - the length of any string so obvious. <br>";

        echo "<p> Count words in sentence like: $greeting ", str_word_count($greeting), " </p>";

        echo "<p> Reversing previous sentece ", strrev($greeting), "</p>";

        echo "<p> Position of word 'ben' in $greeting starts from ", strpos($greeting, 'ben'), "th index", "</p>";

        echo "<p> Replacing word 'Merhaba' in $greeting with Selam ", str_replace('Merhaba', 'Selam', $greeting), "</p>";

    ?>
    
</body>
</html>