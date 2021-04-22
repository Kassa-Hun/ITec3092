<?php
  session_start();
  ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>HTML5</title>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
</script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>

<header>  <!-- Header-->
	<?php include_once('header.php'); ?>
</header>

<nav> <!-- Naviagation-->
<ul>
  <li> <a href="index.php"> Home </a></li>
  <li> | <a href="#"> About us </a></li>
  <li> | <a href="#"> Contact us </a></li>
  <li> | <a href="createaccount.php"> Create account </a></li>
  <li> | <a href="logout.php"> Logout </a></li>
</ul>
</nav>

<section> <!-- Content-->
<article>
   <form action="createaccount.php" method="POST">
			<b>Enter sername </b><input type="text" name="username" required> <br/>
			<b>Enter password </b><input type="text" name="passwd" required> <br/>
			 <input type="submit" name="btn3" value="Create"> 
			<input type="reset" name="btn4" value="Clear"> <br/>
		</form>

<?php
  if(isset($_SESSION['u'],$_SESSION['p'])){
	require_once('dbconnect.php');
  if(isset($_POST['btn3'])){  //when create button is clicked
	  	if($connection){ // if db connection succeed
			$username=$_POST['username'];
			$password=$_POST['passwd'];
			  //make sure that username and password exist on the db
				$sql="insert into user values('$username','$password',1)";
				if(mysqli_query($connection,$sql)){
					echo "User account is successfuly created";
				}else{
					echo "Error: ".mysqli_error($connection);
					//header('Location: createaccount.php');
				}
			 mysqli_close($connection);
			}else
				echo "Failed to establish db connection.";  
  }

 if(isset($_POST['btn2'])){ //When Clear button is clicked
        header('Location: login.php');
  }

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
