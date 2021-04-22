<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<table>
<form action="adm6.php" method="get">
<tr><td>Find ID: </td><td><input type="text" name="id"  /></td></tr>
<tr><td><input type="submit" name="search" value="Search" /></td>
</tr>
</form>
</table>
<?php
if(isset($_POST['back']))
{
	header("location:dash.php");
}
?>

<form method="post">
<input type="submit" name="back" value="Back" />
</form>
<body>
</body>
</html>
