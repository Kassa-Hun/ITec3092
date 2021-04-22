<?php
  session_start();
  if($_SESSION['r']=='instructor'){
	  require_once('dbconnect.php');
  ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>View course</title>

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

<section> <b>Major IT courses assigned to me</b><!-- Content-->
<article>
<?php
  	  	if($connection){ // if db connection succeed
				$id = $_SESSION['i'];
				$sql="select * from account a, assignedcourse ac, course c 
				where (a.userId = '$id' AND ac.instructorId = '$id') AND (ac.courseCode = c.courseCode) ";
				$res=mysqli_query($connection,$sql);
				if(mysqli_num_rows($res)>0){
					echo "<table border=1>
					<th>Course code</th><th>Course title</th><th>Credit hour</th><th>Batch</th><th>Class starts on</th>";
					while($row = mysqli_fetch_assoc($res)){
						if($row['IsCourseCompleted']!="yes"){ //if the Course is not completed
							echo "<tr><td>".$row['courseCode']."</td>";
							echo "<td>".$row['courseTitle']."</td>";
							echo "<td>".$row['courseCreditHr']."</td>";
							echo "<td>".$row['year']."</td>";
							echo "<td>".$row['courseStartedOn']."</td></tr>";
							}
						}
						echo "</table>";
					}else
						echo "There is not record.";					
			 mysqli_close($connection);
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
