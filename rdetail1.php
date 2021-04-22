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
	$cmd="select * from roomD where ID='$s_user'";
	$res= mysqli_query($link,$cmd);
	if(mysqli_num_rows($res)>0)
	{	
		$row=mysqli_fetch_array($res);
		//$_SESSION['user_name']=$row['Name'];
		//header("location:rdetail.php");
		?>
<table border="2" style="border-collapse:collapse;">
<tr><th colspan="7">Room Detail</th></tr>
<tr>
<th>ID</th>
<th>Name</th>
<th>Room No</th>
<th>Food</th>
<th>Check In</th>
<th>Duration</th>
<th>Payment</th></tr>
<?php
	//while($row=mysqli_fetch_array($res))
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
	</table>
	<br />
<br />
<br />
	<?php
	}

	}
	else 
	{
		echo "No Records";
	}
	
	?>
	
<br />
<br />
<br />
<table border="2">
<tr><th><a href="application.php">Book Room</a></th></tr>
<tr><th><a href="update1.php">Update Info</a></th></tr>
<tr><th><a href="profile.php">Profile</a></th></tr>
<tr><th><a href="logoutus.php">Log out</a></th></tr>
</table>


<body>
</body>
</html>
