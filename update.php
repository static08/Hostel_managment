<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>


<?php
include "hmdbms.php";
$name=$reg=$email=$gen=$no=$pass=$cpass=$day=$month=$year=$dob=$id='';
$errname=$errreg=$erremail=$errgen=$errno=$errpass=$errcpass=$serr=$errdob='';
?>
<?php
if(!empty($_GET))
{
	$id=$_GET['id'];
	$cmd="Select * from Info where ID= $id";
	$res= mysqli_query($link,$cmd);
	if (mysqli_num_rows($res)>0)
	{	
		$row= mysqli_fetch_array($res);
		$reg=$row['Reg'];
		$name=$row['Name'];
		$gen=$row['Gender'];
		$dob=$row['DOB'];
		$day= substr($dob,8);
		$month= substr($dob,5,2);
		$year= substr($dob,0,4);
		$email=$row['Email'];
		$no=$row['Mob'];
		$pass=$row['Pass'];
		$cpass=$pass;
	

?>
<form method='post' action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']);?>">
<table>
<tr><th colspan="3">Upadate the form </th></tr>
<tr><td>Reg : </td><td><input type="text" name='reg' value="<?php echo $reg;?>" /></td><td><?php echo $errreg;?></td></tr>
<tr><td>Name : </td><td><input type="text" name='name' value="<?php echo $name;?>" /></td><td><?php echo $errname;?></td></tr>
<tr><td>Gender </td><td>Male 
  <input type="radio" value= 'M' name='gen' <?php if($gen=='M') echo "checked"; ?> /> Female <input type="radio" value= 'F' name='gen' <?php if($gen=='F') echo "checked"; ?> /></td>
  <td><?php echo $errgen;?></td></tr>
<tr><td>DOB : </td>
<td>Day : <select name="day">
<option value="day">Day</option>
<?php 
for ($i=1 ; $i<=31;$i++)
{
	if($i==$day)
	{
		echo '<option value="'.$i.'" selected>'.$i.'</option>';
	}
	else
	{
		echo "<option value='".$i."'>".$i."</option>";	
	}
}
?>
</select>
Month : <select name="month">
<option value="month">Month</option>
<?php 
for ($i=1 ; $i<=12;$i++)
{
	if($i==$month)
	{
		echo '<option value="'.$i.'" selected>'.$i.'</option>';
	}
	else
	{
		echo "<option value='".$i."'>".$i."</option>";	
	}
}
?>
</select>
Year : <select name="year">
<option value="year">Year</option>
<?php 
for ($i=1990 ; $i<=2020;$i++)
{
	if($i==$year)
	{
		echo '<option value="'.$i.'" selected>'.$i.'</option>';
	}
	else
	{
	echo "<option value='".$i."'>".$i."</option>";	
	}
}
?>
</select></td>
<td><?php echo $errdob; ?> </td>
</tr>
<tr><td>Email : </td><td><input type="text" name='email' value="<?php echo $email;?>" /></td><td><?php echo $erremail;?></td></tr>
<tr><td>Phone No. : </td><td><input type="text" name='mob'  value="<?php echo $no;?>" /></td><td><?php echo $errno;?></td></tr>
<tr><td>Password : </td><td><input type="password" name='pass' value="<?php echo $pass;?>" /></td><td><?php echo $errpass;?></td></tr>
<tr><td>Confirm Password : </td><td><input type="password" name="cpass" value="<?php echo $cpass;?>"/></td><td><?php echo $errcpass;?></td></tr>
<tr><td colspan="3"><input type="hidden" name="id" value="<?php echo $id;?>"/></td></tr>
<tr><td colspan="3" align="center"><input type="submit" name="cancel" value="Cancel" /><input type="Submit" name="update"  value="Update"/></td></tr>
<tr><td colspan="3" align="center"><?php echo $serr; ?></td>
</tr>
</table>
</form>
<?php
}
else 
{
	echo "There is no record with id = ".$id;
}
}
if (isset($_POST['update']))
	{
			$check=1;
			// Name Vlidation
			$name = htmlspecialchars(trim($_POST['name']));
			
			if( empty($name))
			{
				$nameErr= 'Name is Required';
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
			//Registration No.
			$reg= htmlspecialchars(trim($_POST['reg']));
			if(empty($_POST['reg']))
			{ 
				$errreg="Registration No. is required.";
				$check=0;
			}
			else
			{
				if(!preg_match("/^\d{6}$/",$reg))
				{
					$errreg=" 6 digit number is required .";
					$check=0;
				}
			}
			
			// Gender Validation 
			if(empty($_POST['gen']))
			{
				$errgen= 'Please enter gender';
			}
			else 
			{
				$gen=$_POST['gen'];
			}
			
			//DOB Validation
			$day=$_POST['day'];
			$month=$_POST['month'];
			$year=$_POST['year'];
			$dob=$year."-".$month."-".$day;
			if($day=='day'||$month=='month'||$year=='year')
			{
				$dobErr='Enter your DOB';
			}
			// Email Validation
			$email = htmlspecialchars(trim($_POST['email']));
			
			if( empty($email))
			{
				$erremail= 'Email is Required';
				$check=0;
			}
			else
			{
				if (!preg_match("/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/",$email))
				{
					$erremail= "Wrong Input";
					$check=0;
				}
			}
			
			// Phn no Validation
			$no = htmlspecialchars(trim($_POST['mob']));
			
			if( empty($no))
			{
				$errno= 'Phone number is Required';
				$check=0;
			}
			else
			{
				if (!preg_match("/^\d{10}$/",$no))
				{
					$noerr= "Only 10 digit mobileNumber";
					$check=0;
				}
			}
			
			// Password Validation
			$pass = htmlspecialchars(trim($_POST['pass']));
			
			if( empty($pass))
			{
				$errpass= 'Password is Required';
				$check=0;
			}
			else
			{
				if (!preg_match("/^((?=.*\d)(?=.*[A-Z])(?=.*\W).{6,10})$/",$pass))
				{
					$errpass= "Password should contain a special character , a capital letter, a number and should be of atleast 6 letters";
					$check=0;
				}
			}
			
			// Confirm-Password Validation
			$cpass = htmlspecialchars(trim($_POST['cpass']));
			
			if( empty($cpass))
			{
				$errcpass= 'Confirm Password is Required';
				$check=0;
			}
			else 
			{
				if($cpass!=$pass)
				{
					$errcpass='Password do not match .';
					$check=0;
				}
			}
			$id=$_POST['id'];
			if($check==1)
			{
				
				$cmd="update Info set Reg='$reg',Name='$name',Gender='$gen',DOB='$dob',Email='$email',Mob='$no',Pass='$pass' where ID=$id";
					
					if(mysqli_query($link,$cmd))
					{
					?>
						<table ><tr bgcolor="#66CC33"><th>Data Updated</th></tr></table>
						<br /><table border="2"><tr><th> <a href="profile.php"> Profile </a></th></tr> <?php
						$name=$gen=$email=$no=$reg=$dob=$pass="";	
						//echo $cmd;
					}
				
				
			}
			else
				{
				
					?>
					<form method='post' action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']);?>">
<table>
<tr><th colspan="3">Upadate the form </th></tr>
<tr><td>Reg : </td><td><input type="text" name='reg' value="<?php echo $reg;?>" /></td><td><?php echo $errreg;?></td></tr>
<tr><td>Name : </td><td><input type="text" name='name' value="<?php echo $name;?>" /></td><td><?php echo $errname;?></td></tr>
<tr><td>Gender </td><td>Male 
  <input type="radio" value= 'M' name='gen' <?php if($gen=='M') echo "checked"; ?> /> Female <input type="radio" value= 'F' name='gen' <?php if($gen=='F') echo "checked"; ?> /></td>
  <td><?php echo $errgen;?></td></tr>
<tr><td>DOB : </td>
<td>Day : <select name="day">
<option value="day">Day</option>
<?php 
for ($i=1 ; $i<=31;$i++)
{
	if($i==$day)
	{
		echo '<option value="'.$i.'" selected>'.$i.'</option>';
	}
	else
	{
		echo "<option value='".$i."'>".$i."</option>";	
	}
}
?>
</select>
Month : <select name="month">
<option value="month">Month</option>
<?php 
for ($i=1 ; $i<=12;$i++)
{
	if($i==$month)
	{
		echo '<option value="'.$i.'" selected>'.$i.'</option>';
	}
	else
	{
		echo "<option value='".$i."'>".$i."</option>";	
	}
}
?>
</select>
Year : <select name="year">
<option value="year">Year</option>
<?php 
for ($i=1990 ; $i<=2020;$i++)
{
	if($i==$year)
	{
		echo '<option value="'.$i.'" selected>'.$i.'</option>';
	}
	else
	{
	echo "<option value='".$i."'>".$i."</option>";	
	}
}
?>
</select></td>
<td><?php echo $errdob; ?> </td>
</tr>
<tr><td>Email : </td><td><input type="text" name='email' value="<?php echo $email;?>" /></td><td><?php echo $erremail;?></td></tr>
<tr><td>Phone No. : </td><td><input type="text" name='mob'  value="<?php echo $no;?>" /></td><td><?php echo $errno;?></td></tr>
<tr><td>Password : </td><td><input type="password" name='pass' value="<?php echo $pass;?>" /></td><td><?php echo $errpass;?></td></tr>
<tr><td>Confirm Password : </td><td><input type="password" name="cpass" value="<?php echo $cpass;?>"/></td><td><?php echo $errcpass;?></td></tr>
<tr><td colspan="3"><input type="hidden" name="id" value="<?php echo $id;?>"/></td></tr>
<tr><td colspan="3" align="center"><input type="submit" name="cancel" value="Cancel" /><input type="Submit" name="update"  value="Update"/></td></tr>
<tr><td colspan="3" align="center"><?php echo $serr; ?></td>
</tr>
</table>
</form>
					<?php
				}
			
			
			
		}
		


?>


<br />
<br />
<br />
<table border="2">
<tr><th><a href="profile.php">Profile</a></th></tr>
<tr><th><a href="application.php">Book Room</a></th></tr>
<tr><th><a href="rdetail1.php">Room Detail</a></th></tr>
<tr><th><a href="logoutus.php">Log out</a></th></tr>
</table>

<body>
</body>
</html>

