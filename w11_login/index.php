<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
          width: 300px;
          text-align: center;
          font-size: 16px;
          margin-left: auto;
          margin-right: auto;
          margin-top: auto;
        }

        td{
            padding: 7px;
        }
        </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form using PHP and MSQL</title>
</head>
<body>


<h2 style="text-align: center;">Login form using PHP and MSQL</h2>

<form action="login.php" method="POST">

<table>
    <tr><th colspan="2"> System  Login </th></tr>
    <tr><td>Username</td><td><input type="text" name="USERNAME" required/></td></tr>
    <tr><td>Password</td><td><input type="password" name="PASSWORD" required/></td></tr>
    <tr>
        <td colspan="2">
            <input type="reset" name="RESET" />
            <input type="submit" name="SUBMIT" value="Login" />
        </td>
        <!-- <td></td> -->
    </tr>


</table>


</form>
    
</body>
</html>