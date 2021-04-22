<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
include "hmdbms.php";
session_start();
$session_user=$_SESSION['email_id'];
$sql="select * from Info where Email='$session_user'";
$res_session=mysqli_query($link,$sql);
if(mysqli_num_rows($res_session)>0)
{
	$row=mysqli_fetch_array($res_session);
	$user_name=$row['Name'];
}
else
{
	mysqli_close($con);
	header("location:login.php");
}
?>
</body>
</html>
