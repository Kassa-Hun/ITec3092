<html><body>
<h1>Course Registration Form</h1><hr>
<?php
if(isset($_POST["register"])){
	$ccode=$_POST["ccode"];
	$ctitle=$_POST["ctitle"];
	$crhr=$_POST["crhr"];
	$connection=mysqli_connect("localhost","root","","registrar");
	if($connection)
	{
		$sql="Insert into course(CCode,CTitle,CrHr)values('$ccode','$ctitle','$crhr')";
			if(mysqli_query($connection,$sql))
				echo "<b><i><font color=red>Record inserted successfully</font></i></b>";
			else
				die("Record not inserted:".mysqli_error($connection));
		mysqli_close($connection);
	}else
		die("connection failed:".mysqli_error($connection));
}
?>
<form action="" method="post">
<table><tr><td>Course Code:<input type="text" name="ccode" required></td></tr>
<tr><td>Course Title:<input type="text" name="ctitle" required></td></tr>
<tr><td>Credit Hour:<input type="number" name="crhr" required></td></tr>
<tr><td><input type="submit" value="Register" name="register">&nbsp;<input type="reset" name="reset" value="Reset"></td></tr></table>
</form><hr></body></html>

