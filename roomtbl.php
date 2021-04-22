<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php

include "hmdbms.php";

$sql= "CREATE TABLE RoomD(
ID INT NOT NULL ,
Name VARCHAR(100) NOT NULL,
Room DECIMAL(10) NOT NULL,
Food VARCHAR(1) NOT NULL,
CheckIn VARCHAR(10) NOT NULL,
Duration DECIMAL(10) NOT NULL,
Fee VARCHAR(100) NOT NULL,
PRIMARY KEY(ID))";

if(mysqli_query($link,$sql))
{
	echo "Table created successfully.";
}
else
{
echo "Error in creating the table.";
}
?>
<body>
</body>
</html>
