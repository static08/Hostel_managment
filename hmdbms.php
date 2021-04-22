<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
$link=mysqli_connect("localhost","root","","hostel");
// Check Connection
if(!$link)
{
	die("Connection Failed.".mysqli_connect_error());
	echo "<br>";
}
else
echo "";
/*
else 
echo "Connection successfull.".mysqli_get_host_info($link);
//Creating database
$sql="CREATE DATABASE hostel";
if(mysqli_query($link,$sql))
{
	echo "New databse is created .";
}
else
{
	echo "Error: Database not created.".mysqli_error($link);
}
// Close connection
mysqli_close($link);
*/
?>
<body>
</body>
</html>
