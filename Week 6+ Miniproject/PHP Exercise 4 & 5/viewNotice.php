<?php
  session_start();
  if($_SESSION['r']=='instructor' || $_SESSION['r']=='student'){
	  require_once('dbconnect.php');
  ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>View notice</title>

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

<section> <b>Latest Notice</b><!-- Content-->
<article>
   

<?php
  	  	if($connection){ // if db connection succeed
				$role = $_SESSION['r'];
				$sql="select * from notice where noticeTo='$role' OR noticeTo='all' ORDER BY postedDate DESC";
				$res=mysqli_query($connection,$sql);
				if(mysqli_num_rows($res)>0){
					while($row = mysqli_fetch_assoc($res)){
						echo "<h4><u>".$row['noticeSubject']."</u></h4>";
						echo $row['noticeContent']."<br/><br/>";
						echo "Posted on:";
						echo substr($row['postedDate'],8)."-".substr($row['postedDate'],5,2)."-".
							 substr($row['postedDate'],0,4);
					}
					
				}else{
					echo "Error: ".mysqli_error($connection);
				}
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
