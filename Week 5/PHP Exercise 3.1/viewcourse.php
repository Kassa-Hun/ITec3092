<html><body>
<?php
	$connection=mysqli_connect("localhost","root","","registrar");
	if($connection){
	$sql="select * from course";
	$result=mysqli_query($connection,$sql);
	if($result){
	echo "<table border=1><tr><th>Course Code</th><th>Course Title</th><th>Credit
	Hour</th></tr>";
	while($rows=mysqli_fetch_assoc($result))	{
	echo "<tr><td>".$rows["CCode"]."</td><td>".$rows["CTitle"]."</td><td>".$rows["CrHr"]."</td></tr>";
	}
	echo "</table>";
	}else
	die("unable to retrieve the records:".mysqli_error($connection));
	mysqli_close($connection);
	}else
	die("connection failed:".mysqli_error($connection));
?>
</body></html>