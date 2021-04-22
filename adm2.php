<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php 
include "hmdbms.php";
$cmd="Select * from roomD ";
$res= mysqli_query($link,$cmd);
if(mysqli_num_rows($res)>0)
{
?>
<table border="2" style="border-collapse:collapse;">
<tr><th colspan="7">Room Info</th></tr>
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
		}
	
if(isset($_POST['back']))
{
	header("location:dash.php");
}
?>
</table>
<form method="post">
<input type="submit" name="back" value="Back" />
</form>
<body>
</body>
</html>
