<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
include "hmdbms.php";
session_start();
$session_user=$_SESSION['email_id'];
$sql="select * from Info ";
$res_session=mysqli_query($link,$sql);
if(mysqli_num_rows($res_session)>0)
{
	$row=mysqli_fetch_array($res_session);
	$user_name=$row['Name'];
}
else
{
	mysqli_close($link);
	header("location:login.php");
}
?>
<body>
<?php 
include "hmdbms.php";
$cmd="Select * from Info where Email='$session_user'";
$res= mysqli_query($link,$cmd);
if(mysqli_num_rows($res)>0)
{
?>
<table border="2" style="border-collapse:collapse;">
<tr><th colspan="7">Your Profile</th></tr>
<tr>
<th>ID</th>
<th>Reg.No</th>
<th>Name</th>
<th>Gender</th>
<th>Date Of Birth</th>
<th>Email ID</th>
<th>Mobile Number</th></tr>
<?php
	while($row=mysqli_fetch_array($res))
	{
	?>
	<tr>
	<td><?php echo $row['ID'];?></td>
	<td><?php echo $row['Reg'];?></td>
	<td><?php echo $row['Name'];?></td>
	<td><?php echo $row['Gender'];?></td>
	<td><?php echo $row['DOB'];?></td>
	<td><?php echo $row['Email'];?></td>
	<td><?php echo $row['Mob'];?></td>
	</tr>
	<?php

	$_SESSION['user_id']=$row['ID'];
	}
	
?>
</table>
<br />
<br />
<br />
<table>
<tr><th><a href="application.php">Book Room</a></th></tr>
<tr><th><a href="update1.php">Update Info</a></th></tr>
<tr><th><a href="rdetail1.php">Room Detail</a></th></tr>
<tr><th><a href="logoutus.php">Log out</a></th></tr>
</table>

<?php
}
else
{
echo " No Record.";
}
?>
</body>
</html>
