<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
include "hmdbms.php";
	session_start();
	$s_user=$_SESSION['user_id'];
	$cmd="select * from Info where ID='$s_user'";
	$res= mysqli_query($link,$cmd);
	if(mysqli_num_rows($res)>0)
	{	
		$row=mysqli_fetch_array($res);
		echo $s_user;
	}
		//$_SESSION['user_name']=$row['Name'];
		//header("location:rdetail.php");
		?>
<table>
<form action="update.php" method="get">
<tr><td>Your Id: </td><td><input type="text" name="id" value="<?php echo $s_user;?>" /></td></tr>
<tr><td><input type="submit" name="update" value="Update" /></td>
</tr>
</form>
</table>

<body>
</body>
</html>
