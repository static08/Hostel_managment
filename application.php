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
		$id=$row['ID'];
		$name=$row['Name'];
		//echo $s_user;
		//$_SESSION['user_name']=$row['Name'];
		//header("location:rdetail.php");

$food=$day=$month=$year=$dr=$room=$pay="";
$errid=$errname=$errfood=$errdr=$errroom=$errstay=$serr=$errpay="";
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	echo"B";
	if (isset($_POST['submit']))
	{
		
			$check=1;
			
			// Name Vlidation
			$name = htmlspecialchars(trim($_POST['name']));
			
			if( empty($name))
			{
				$errname= 'Name is Required';
				$check=0;
			}
			else
			{
				if (!preg_match("/^[A-Za-z ]+$/",$name))
				{
					$errname= "Only alphabets";
					$check=0;
				}
				
			}
			
			
			//ID Varification.
			$id= htmlspecialchars(trim($_POST['id']));
			if(empty($_POST['id']))
			{ 
				$errreg="ID No. is required.";
				$check=0;
			}
			/*else
			{
				if(!preg_match("/^\d$/",$id))
				{
					$errreg="number is required .";
					$check=0;
				}
			}*/
			
			
			// Food Validation 
			if(empty($_POST['food']))
			{
				$errfood= 'Please enter food avalaibility ';
				$check=0;
			}
			else 
			{
				$food=$_POST['food'];
			}
			echo $food.$check;
			// Pay Validation 
			if(empty($_POST['pay']))
			{
				$errpay= 'Please enter';
				$check=0;
			}
			else 
			{
				$pay=$_POST['pay'];
			}
			
			//Stay Validation
			$day=$_POST['day'];
			$month=$_POST['month'];
			$year=$_POST['year'];
			$stay=$year."-".$month."-".$day;
			if($day=='day'||$month=='month'||$year=='year')
			{
				$errstay='Enter when to check in';
				$check=0;

			}
			
			//Room Validation
			$room=$_POST['room'];
			
			// Duration Validation
			
			$dr=$_POST['dr'];
			if(empty($dr))
			{
				$errdr="Enter duration of stay";
				$check=0;
			}
			echo $dr.$check;
			echo "D";
			echo $check;
			if($check==1)
			{
					
					{
						
									$cmd= "Insert into roomD (ID,Name,Room,Food,CheckIn,Duration,Fee) Values ('$id','$name','$room','$food','$stay','$dr','$pay') ";
									echo "1".$cmd;
									if(mysqli_query($link,$cmd))
									{
										
										$serr="Room Alloted";
										//echo $cmd;
										$name=$food=$day=$month=$year=$stay=$id=$dr=$pay="";
										?><br /><table border="2"><tr><th><a href="profile.php">Profile</a></th></tr></table><?php
									}
									else
									{
										//echo $cmd;
										echo "Room already alloted";
										?><br /><table border="2"><tr><th><a href="profile.php">Profile</a></th></tr></table><?php
									}
						}	
					}		
							
				
			}
		
}
}
?>
<form method="post" action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']);?>" >
<table border="2" bgcolor="#CCCCCC">
<tr bgcolor="#CC00CC"> <th colspan='3'>Application Form </th></tr>
<tr><td>ID No:</td><td><input type="text" value="<?php echo $id;?>" name="id"/></td><td><?php echo $errid;?></td></tr>
<tr><td>Name:</td><td><input type="text" value="<?php echo $name;?>" name="name" /></td><td><?php echo $errname;?></td></tr>

<tr><td>Food: </td><td> Yes <input type="radio" name="food" value="Y" <?php if($food=='Y') echo "checked";?>/>No <input type="radio" name="food" value="N" <?php if($food=='N') echo "checked";?>/></td><td><?php echo $errfood;?></td></tr>
<tr><td>Room:</td><td><select name="room"><option value="Room"><?php if(empty($room)) echo 'Room'; else echo $room;?></option>
<?php
for ($i=100 ; $i<=200;$i++)
{
	echo "<option value='".$i."'>".$i."</option>";	
} 
?>
</td><td><?php echo $errroom;?></td></tr>
</select>
<tr><td>Stay From : </td>
<td>Day : <select name="day">
<option value="day"><?php if(empty($day)) echo 'Day'; else echo $day;?></option>
<?php 
for ($i=1 ; $i<=31;$i++)
{
	echo "<option value='".$i."'>".$i."</option>";	
}
?>
</select>
Month : <select name="month">
<option value="month"><?php if(empty($month)) echo 'Month'; else echo $month;?></option>
<?php 
for ($i=1 ; $i<=12;$i++)
{
	echo "<option value='".$i."'>".$i."</option>";	
}
?>
</select>
Year : <select name="year">
<option value="year"><?php if(empty($year)) echo 'Year'; else echo $year;?></option>
<?php 
for ($i=1990 ; $i<=2010;$i++)
{
	echo "<option value='".$i."'>".$i."</option>";	
}
?>
</select>

</td>
<td><?php echo $errstay; ?> </td>
</tr>



<tr><td>Duration:</td><td><select name="dr"><option value="days"><?php if(empty($dr)) echo 'Days'; else echo $errdr;?></option>
<?php
for ($i=1 ; $i<=15;$i++)
{
	echo "<option value='".$i."'>".$i."</option>";	
} 
?>
</td><td><?php echo $errdr;?></td></tr>
</select>
<tr><td>Payment: </td><td> Paid <input type="radio" name="pay" value="Paid" <?php if($pay=='Paid') echo "checked";?>/>Not Paid <input type="radio" name="pay" value="Not Paid" <?php if($pay=='Not Paid') echo "checked";?>/></td><td><?php echo $errpay;?></td></tr>

<tr align="center"><td><input type="submit" name="submit" value="Submit" /></td><td><input type="submit" name="cancel" value="Cancel" /></td></tr>
<tr><td colspan="3" align="center" bgcolor="#66CC33"><?php echo $serr;?></td></tr>
</table>
</form>

<br />
<br />
<br />
<table border="2">
<tr><th><a href="profile.php">Profile</a></th></tr>
<tr><th><a href="update1.php">Update Info</a></th></tr>
<tr><th><a href="rdetail1.php">Room Detail</a></th></tr>
<tr><th><a href="logoutus.php">Log out</a></th></tr>
</table>
<body>
</body>
</html>
