<?php
  session_start();
 if($_SESSION['r'] == 'admin'){
	require_once('dbconnect.php');
  ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Create account</title>

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
   <form action=" " method="POST">
			<b>Enter email address </b><input type="text" name="email" required> <br/>
			<b>Enter password </b><input type="password" name="passwd" required> <br/>
			<b>Enter role </b><select name="role"> 
				<option <?php if(isset($_POST['role'])) echo 'value="admin"'; ?>>Admin </option>
				<option <?php if(isset($_POST['role'])) echo 'value="head"';?>> Head</option>
				<option <?php if(isset($_POST['role'])) echo 'value="instructor" ';?>> Instructor </option> 
				<option <?php if(isset($_POST['role'])) echo 'value="student"';?>> Student</option>
				</select> <br/>
			<b>Enter user Id </b> <input type="text" name="uid" required> <br/>
			 <input type="submit" name="btn1" value="Create"> 
			<input type="submit" name="btn2" value="Clear"> <br/>
		</form>
<?php
  if(isset($_POST['btn1'])){  //when create button is clicked
	  	if($connection){ // if db connection succeed
			$username = $_POST['email'];
			$password = $_POST['passwd'];
			$role = $_POST['role'];
			$id = $_POST['uid'];
			if(isset($username,$password,$role,$id)){ //validate also if they are empty or not
				$password = md5($password);
				$sql="insert into account values('$username','$password','$role',1,'$id')";
				if(mysqli_query($connection,$sql)){
					echo "User account is successfuly created";
				}else{
					echo "Error: ".mysqli_error($connection);
				}
			 mysqli_close($connection);
			}else
				echo "Failed to establish db connection."; 
		}else
			echo "Please fill valid user account details";
  }

 if(isset($_POST['btn2'])){ //When Clear button is clicked
        header('Location: createAccount.php');
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
