<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables</title>
</head>
<body>
    
<h1>Playing with variables</h1>

    <?php 



        $z = 5 + 103;

        echo $z, " &nbsp;", is_int($z); 


        function myVar() {
            $z = 1; // declare local var

            global $z; // local var trashed due to declaration of global var with the same namespace

            $x = 255; // local scope

            
            echo "<br><p>My local scope's var X is $x</p>";
            echo "<br>My global scope's var Z is $z";
          }
          myVar();
          
        echo '<br>', $z;  
        

        // new variables to test another syntaxic sugar


        $k = 14;
        $i = 52;
        

        echo "<br>";

        function syntaxSugar() {

            $GLOBALS['k'] = $GLOBALS['k'] + $GLOBALS['i'];
        
        }

        syntaxSugar();

        echo "Changed global var using GLOBALS syntax = ", $k;


        function staticSyntax(){
            static $t = 1;
            
            $t++;

            echo "<br>", $t;
        }

        staticSyntax();

        staticSyntax();


        $x = 54;
        $y = 21;

        echo "<br>" . "Sum of string intigers: " . "$x" + "$y";

        print "<br> Testing print() function";

        
    ?>


</body>
</html>