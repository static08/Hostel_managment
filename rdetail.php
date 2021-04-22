<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<?php
include "hmdbms.php";
session_start();
$session_user=$_SESSION['user_id'];
$sql="select * from roomD ";
$res_session=mysqli_query($link,$sql);
if(mysqli_num_rows($res_session)>0)
{
	$row=mysqli_fetch_array($res_session);
	$user_name=$row['Name'];
}
else
{
	mysqli_close($link);
	header("location:profile.php");
}
?>
<body>
<?php 
include "hmdbms.php";
$cmd="Select * from roomD where ID='$session_user' ";
$res= mysqli_query($link,$cmd);
if(mysqli_num_rows($res)>0)
{
?>
<table border="2" style="border-collapse:collapse;">
<tr><th colspan="7">Your Profile</th></tr>
<tr>
<th>ID</th>
<th>Name</th>
<th>Room No</th>
<th>Food</th>
<th>Check In</th>
<th>Duration</th>
<th>Payment</th></tr>
<?php
	while($row=mysqli_fetch_array($res))
	{
	?>
	<tr>
	<td><?php echo $row['ID'];?></td>
	<td><?php echo $row['Name'];?></td>
	<td><?php echo $row['Room'];?></td>
	<td><?php echo $row['Food'];?></td>
	<td><?php echo $row['CheckIn'];?></td>
	<td><?php echo $row['Duration'];?></td>
	<td><?php echo $row['Fee'];?></td>
	</tr>
	<?php
	}
?>
</table>
<br />
<br />
<br />
<table>
<tr><th><a href="application.php">Book Room</a></th></tr>
<tr><th><a href="update1.php">Update Info</a></th></tr>
<tr><th><a href="disroom.php">Room Detail</a></th></tr>
<tr><th><a href="logoutus.php">Log out</a></th></tr>
</table>

<?php
}
else
{
echo " No Record.";
}
?>
<body>
</body>
</html>
