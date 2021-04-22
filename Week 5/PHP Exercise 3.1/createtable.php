 <?php
    define("HOSTNAME","localhost");
   define("USERNAME","root");
   define("PASSWORD","");
   $connection=mysqli_connect(HOSTNAME,USERNAME,PASSWORD);
   if($connection){
	if(mysqli_select_db($connection,"registrar")){
		$sql="create table course(
				CCode varchar(10) primary key,
				CTitle varchar(25), CrHr integer)";
		if(mysqli_query($connection,$sql))
			echo "Table Created Successfully";
		else
			die("Table not created:".mysqli_error($connection));
		}
	 mysqli_close($connection);
	}else
		die("connection failed:".mysqli_error($connection));
 ?>
