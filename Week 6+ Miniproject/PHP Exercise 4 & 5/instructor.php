<?php
	session_start();
	if($_SESSION['r']=='instructor'){
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Instructor</title>

<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>

<header>  <!-- Header-->
	<?php include_once('header.php'); ?>
</header>

<nav> <!-- Naviagation-->
<ul>
  <li> <a href="viewCourse.php"> View assign course </a></li>
  <li> | <a href="uploadMaterial.php"> Upload material </a></li>
  <li> | <a href="viewNotice.php"> View notice </a></li>
  <li> | <a href="logout.php"> Logout </a></li>
</ul>
</nav>

<section> <!-- Content-->
<article>



</article>
</section>

<footer>
   <?php include_once('footerpage.php'); ?>
</footer>
</body>
</html>
<?php
	}else{
		if(isset($_SESSION['r']))
			header('Location: "'.$_SESSION['r'].'".php');
		else
			header('Location: logout.php');
}
?>