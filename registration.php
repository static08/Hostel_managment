<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
include 'hmdbms.php';
$name=$reg=$email=$gen=$no=$pass=$cpass=$day=$month=$year=$dob='';
$errname=$errreg=$erremail=$errgen=$errno=$errpass=$errcpass=$serr=$dobErr='';


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	
	
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
			$no = htmlspecialchars(trim($_POST['no']));
			
			if( empty($no))
			{
				$noerr= 'Phone number is Required';
				$check=0;
			}
			else
			{
				if (!preg_match("/^\d{10}$/",$no))
				{
					$errno= "Only 10 digit mobileNumber";
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
			
			
			if($check==1)
			{
				//echo "A";
				$cmd= "select * from Info where Email=?";
							$stmt= mysqli_prepare($link,$cmd);
							mysqli_stmt_bind_param($stmt,'s',$email);
							mysqli_stmt_execute($stmt);
							$res=mysqli_stmt_get_result($stmt);
							if(mysqli_num_rows($res)>0)
							{	
								$erremail="User ID exixt please choose another email.";
								$check=0;
								//echo"B";
							}
							else
							{
								
								
								$salt=sha1($email);
								$pass=crypt($pass,$salt);
								//echo "C";	
								/*
								$cmd="Insert into students (Name,Reg,Gender,DOB,Email,Mob,Pass) Values('$name','$reg','$gen','$dob','$email','$no','$pass')";
								if(mysqli_query($link,$cmd))
								{
									$sErr="Form Submitted";
									$name=$gen=$day=$month=$year=$dob=$email=$no=$reg="";
									
								}
								*/
								$cmd="Insert into Info (Name,Reg,Gender,DOB,Email,Mob,Pass) Values(?,?,?,?,?,?,?)";
							
									$stmt= mysqli_prepare($link,$cmd);
									mysqli_stmt_bind_param($stmt,'sdsssds',$name,$reg,$gen,$dob,$email,$no,$pass);
									if(mysqli_stmt_execute($stmt))
									{
										//$id=$_POST['ID'];
										$id=mysqli_insert_id($link);
										$serr="Form Submitted and you application id is $id";
										//echo $cmd;
										$name=$gen=$day=$month=$year=$dob=$email=$no=$pass=$cpass="";
										?><br /><table border="2"><tr><th><a href="loginus.php">Log In</a></th></tr></table><?php
									}
									/*else
									{
										echo $cmd;
									}
									*/
							}		
						}	
				
			}
		
}

?>
<form method="post" action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']);?>" >
<table>
<tr> <th colspan='3'>Student Registration </th></tr>
<tr><td>Name:</td><td><input type="text" value="<?php echo $name;?>" name="name" /></td><td><?php echo $errname;?></td></tr>
<tr><td>Registration No:</td><td><input type="text" value="<?php echo $reg;?>" name="reg" /></td><td><?php echo $errreg;?></td></tr>
<tr><td>DOB : </td>
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
<td><?php echo $dobErr; ?> </td>
</tr>

<tr><td>Email:</td><td><input type="text" value="<?php echo $email;?>" name="email" /></td><td><?php echo $erremail;?></td></tr>
<tr><td>Gender: </td><td> Male <input type="radio" name="gen" value="M" <?php if($gen=='M') echo "checked";?>/>Female <input type="radio" name="gen" value="F" <?php if($gen=='F') echo "checked";?>/></td><td><?php echo $errgen;?></td></tr>
<tr><td>Contact NO:</td><td><input type="text" name="no" value="<?php echo $no;?>" /></td><td><?php echo $errno;?></td></tr>
<tr><td>Password:</td><td><input type="password" name="pass" value="<?php echo $pass;?>" /></td><td><?php echo $errpass;?></td></tr>
<tr><td>Confirm Password:</td><td><input type="password" name="cpass" value="<?php echo $cpass;?>" /></td><td><?php echo $errcpass;?></td></tr>
<tr align="center"><td><input type="submit" name="submit" value="Submit" /></td><td><input type="submit" name="cancel" value="Cancel" /></td></tr>
<tr><td colspan="3"><?php echo $serr;?></td></tr>
</table>
</form>
<body>
</body>
</html>
