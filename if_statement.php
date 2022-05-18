<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>If statement</title>
</head>
<body>
    <h1>If-ElseIf-Else statment</h1>

    <?php

        $my_name = "Arsif";


        //type also must be identical because names are always string
        if ($my_name === "Arif") 
        {
            
            echo "<p> How are you doing,&nbsp;$my_name?</p><br>";
        }
        else
        {
            echo "<p> You are definitely not, Arif. You are $my_name!!!</p>";
        }


    ?>
    
</body>
</html>