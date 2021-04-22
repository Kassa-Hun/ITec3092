<?php
  session_start();
  if($_SESSION['r']=='admin'){
	  require_once('dbconnect.php');
  ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>View account</title>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>

<header>  <!-- Header-->
	<?php include_once('header.php'); ?>
</header>

<nav> <!-- Naviagation-->
<ul>
  <li>  <a href="logout.php"> Logout </a></li>
</ul>
</nav>

<section> <!-- Content-->
<article>
  

<?php
	if($connection){ // if db connection succeed
			  //make sure that username and password exist on the db
				$sql = "select * from account a, staff_student ss where a.userId = ss.idNum";
				$res = mysqli_query($connection,$sql);
				if(mysqli_num_rows($res)>0){
					$i=1;
					echo "<table border=1><tr><th>S/No.</th><th>User List</th><th>Status</th></tr>";
					while($row = mysqli_fetch_assoc($res)){
						echo "<tr><td>$i</td><td>".$row['firstName']." ".$row['lastName']."</td><td>";
						echo ($row['status']==1)?"Active":"Inactive</td></tr>";
						$i++;
					}
					echo "</table>";
					mysqli_close($connection);

				}else{
					echo "Error: ".mysqli_error($connection);
				}
			}else
				echo "Failed to establish db connection.";  

?>
</article>
</section>

<footer>
   <?php include_once('footerpage.php'); ?>
</footer>
</body>
</html>
<?php
  }else{
		if(isset($_SESSION['r'])){
			$role = $_SESSION['r'];
			header("Location: $role.php");
		}else
			header('Location: logout.php');
}
?>
