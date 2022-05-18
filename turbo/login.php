<?php
include 'top.php';
?>

<table width="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="" method="post">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3" align="center"><strong>User Login </strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="200px"><input name="username" type="text" id="username"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="password" type="password" id="password"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="submit" value="Login">
<input type="reset" name="reset" value="Clear"></td>
</form>
</tr>
</table>
</td>

</tr>
</table>
<?php
if (isset($_POST['submit']))
{	  
	//session_start();
	$username=$_POST['username'];
	$password=$_POST['password'];

	$user_sql = "SELECT username FROM users WHERE USERNAME='$username' and PASSWORD='$password'";
	//echo $user_sql;
	$user = $conn_top->query($user_sql);

	if ($user->num_rows > 0) 
	{
		$_SESSION['login_user']=$username;
		echo "<script language='javascript' type='text/javascript'> location.href='index.php' </script>";	
	}else{
		echo "<script type='text/javascript'>alert('Invalid username or password! ')</script>";
	}


}

include 'bottom.php';
    
?>