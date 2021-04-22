<?php
	session_start();
	if($_SESSION['r']=='admin')
	{
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Manage account</title>

<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>

<header>  <!-- Header-->
	<?php include_once('header.php'); ?>
</header>

<nav> <!-- Naviagation-->
<ul>
  <form action=" " method="post"> 
	 <input type="submit" name="btn1" value="Manage account"> |
	 <input type="submit" name="btn2" value="Logout"></form>
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
}else
	header("Location: logout.php");
?>
<?php
	if(isset($_POST['btn1']))
		header("Location: manageaccount.php");
	if(isset($_POST['btn2']))
		header("Location: logout.php");
?>
