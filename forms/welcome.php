<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h3>Welcome <?php echo $_POST['full_name']; ?> to the simplest HTML form in the world</h3>


    <br><br>

    <p> <?php echo $_POST['quantity_of_books']; ?> you desire to order to this EMAIL -> <?php echo $_POST['email']; ?> </p>
    
    
</body>
</html>