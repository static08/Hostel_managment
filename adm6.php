<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php

include "hmdbms.php";
if(!empty($_GET))
{
	$id=$_GET['id'];
	$cmd="select * from Info where ID='$id'";
	$res= mysqli_query($link,$cmd);
	if(mysqli_num_rows($res)>0)
	{	
		$row=mysqli_fetch_array($res);
		//$_SESSION['user_name']=$row['Name'];
		//header("location:rdetail.php");
		?>
<table border="2" style="border-collapse:collapse;">
<tr><th colspan="7">Student Detail</th></tr>
<tr>
<th>ID</th>
<th>Reg.No</th>
<th>Name</th>
<th>Gender</th>
<th>Date Of Birth</th>
<th>Email ID</th>
<th>Mobile Number</th></tr>
<?php
	//while($row=mysqli_fetch_array($res))
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
