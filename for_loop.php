<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For loop</title>
</head>
<body>
    <h1>For loop</h1>    

<?php

    //MAN406 

    $x = 8;
    $block = "#";

    for ($i = 1; $i <= $x; $i++)
            {
                for ($j = 0; $j <= $x - $i; $j++)
                {
                    if ($j == $x - $i)
                    {
                        print_r($block);

                        for ($l = 1; $l < $i; $l++)
                        {
                            print_r($block);

                        }
                    }
                    else
                    {
                        echo "&nbsp;";
                    }
                }

                for ($j = 0; $j <= $i; $j++)
                {
                    if ($j == $i)
                    {
                        echo "&nbsp;&nbsp;";

                        for ($l = 0; $l < $i; $l++)
                        {
                            print_r($block);

                        }
                        echo "<br>";
                    }


                }

            }



    echo "<br> <br>";

    $my_array = array("salam", "sagol");

    foreach ($my_array as $greeting)
    {
        echo $greeting, "<br>";
    }


    

?>


</body>
</html>