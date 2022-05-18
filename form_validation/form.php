<!DOCTYPE html>
<html lang="en">
<style>
._h2{ 
    text-align: center;
}

._p{
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    text-align: center;

}
._form{
    text-align: center;
}

._h3{
    text-align: center;
}

.php_p{
    text-align: center;
    font-size: 18px;
}
</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation</title>
</head>
<body>

    <h2 class="_h2">My first form Validation in PHP</h2>

    <br>

    <p class="_p">Please Register to make an order</p><br><br><br>


    <form class='_form' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

    What is your name? <input class="_input" type="text" name='name' autofocus><br><br>

    Birthdate <input type="date" name="birth_date" max="2004-01-01"><br><br>

    Username <input type="text" name="username"><br><br>

    Password <input type="password" name="pass"><br><br>

    Choose profile photo <input type="file" name="photo"><br><br>

    Gender: <input type="radio" name="gender" value="Female">Female
    <input type="radio" name="gender" value="Male">Male
    <input type="radio" name="gender" value="Other">Other
    <br><br><br>

    <input type="submit" name="submit" value="Register" width='50'>
    <br><br>


    </form>

<?php
$name = $birth_date = $username = $password = $photo = $gender = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $name = filter_data($_POST["name"]);
    $birth_date = filter_data($_POST["birth_date"]);
    $username = filter_data($_POST["username"]);
    $password = filter_data($_POST["pass"]);
    $photo = filter_data($_POST["photo"]);
    $gender = filter_data($_POST["gender"]);
  }

function filter_data($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

echo "<h3 class='_h3'> Response from the server </h3><br><br>";

if ($name){
    echo "<p class='php_p'> Your inputted name: $name </p>";
}
if ($birth_date)
{
    echo "<p class='php_p'> Your inputted birthdate: $birth_date </p>";
}
if ($username)
{
    echo "<p class='php_p'> Your inputted username: $username </p>";
}
if ($password)
{
    echo "<p class='php_p'> Your inputted password: $password </p>";
}
if ($photo)
{
    echo "<p class='php_p'> Your uploaded photo: $photo </p>";
}

if ($gender){
    echo "<p class='php_p'> Your gender is: $gender </p>";
}





?>
    
</body>
</html>