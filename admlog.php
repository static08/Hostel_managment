<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
$userid=$pass=$err="";
if(isset($_POST['check']))
{
	$value_u=$_POST['userid'];
	$value_p=$_POST['pass'];
	setcookie("user",$value_u,time()+86400,"/");
	setcookie("pass",$value_p,time()+86400,"/");
}
if(isset($_COOKIE['user']))
{
	$userid=$_COOKIE['user'];
}
if(isset($_COOKIE['pass']))
{
	$pass=$_COOKIE['pass'];
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
include "hmdbms.php";
if(isset($_POST['login']))
{
	$userid=$_POST['userid'];
	$pass=$_POST['pass'];
	//$salt=sha1($userid);
	//$enc_pass=crypt($pass,$salt);
	
	if(($userid=="ADMIN") && ($pass=="Asd!23"))
	{
	
		//$_SESSION['user_name']=$row['Name'];
		//session_start();
		//$_SESSION['email_id']=$row['Email'];
		header("location:dash.php");
	}
	else 
	{
		$err="Either user id or password is incorrect.";
	}
	}
if(isset($_POST['back']))
{
	header("location:adm7.php");
}
?>
<body>
<form action="" method="post">
<table>
<tr><td colspan="3" align="center">ADMIN LOGIN</td></tr>
<tr><td>Admin ID:</td><td><input type="text" name="userid" value="<?php echo $userid;?>" /></td><td><?php echo $err;?></td></tr>
<tr><td>Password:</td><td><input type="password" name="pass" value="<?php echo $pass;?>" /></td><td><input type="checkbox" name="check" />Remember me</td></tr>
<tr><td><input type="submit" name="back" value="Back" /></td><td><input type="submit" name="login" value="Log In" /></td><td>Student <a href="registration.php">Click Here</a></td></tr>
</table>
</form>
<body>
</body>
</html>
