 <?php
   define("HOSTNAME","localhost");
   define("USERNAME","root");
   define("PASSWORD","");
   $connection=mysqli_connect(HOSTNAME,USERNAME,PASSWORD);
   if($connection){
		$sql="create database registrar";
		if(mysqli_query($connection,$sql))
			echo "Database Created Successfully";
		else
			die("Database not created:".mysqli_error($connection));
		mysqli_close($connection);
	}else
		die("connection failed:".mysqli_error($connection));
 ?>