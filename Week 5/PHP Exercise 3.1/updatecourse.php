<html><body><form action="" method="post">
<table width=300><tr><td><fieldset><legend>Search Course</legend>
<input type="text" name="coursecode" placeholder="Course Code" required><input type="submit" name="search" value="Search"></fieldset></td></tr></table></form>
	<?php
	$con=mysqli_connect("localhost","root","","registrar");
	if($con)
	{
	if(isset($_POST["search"]))
	{
			$coursecode=$_POST["coursecode"];
			$sql="select * from course where CCode='$coursecode'";
			$result=mysqli_query($con,$sql);
			while($row=mysqli_fetch_assoc($result))
			{
				echo "<form action='' method=\"post\">	Course Code ";
	            echo "<input type=text name=ccode value='".$row["CCode"]."'required><br>";
				echo "Course Title <input type=text name=ctitle value='".$row["CTitle"]."'required><br>";
				echo "Credit Hour <input type=text name=crhr value='".$row["CrHr"]."'required><br>";
				echo "<input type=submit name=save value=Save>&nbsp;";
	            echo "<input type=submit name=delete value=Delete></form>";
			}
		
	}else if(isset($_POST["save"]))
	{
			$ccode=$_POST["ccode"];
			$ctitle=$_POST["ctitle"];
			$crhr=$_POST["crhr"];
			$sql="update course set CTitle='$ctitle',CrHr='$crhr' where CCode='$ccode'";
			if(mysqli_query($con,$sql))
				echo "Course detail updated successfully";
			else	
				die("Record not updated:".mysqli_error($con));
	}else if(isset($_POST["delete"]))
	{
			$ccode=$_POST["ccode"];
			$sql="delete from course where CCode='$ccode'";
			if(mysqli_query($con,$sql))
				echo "Record deleted successfully";
			else	
				die("Record not deleted:".mysqli_error($con));
	}
	mysqli_close($con);
	}else
	die("Connection Failed:".mysqli_error($con));
	?>
</body></html>
