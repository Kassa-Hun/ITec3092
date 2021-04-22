<?php
	session_start();
	if(!isset($_SESSION['u'],$_SESSION['p'],$_SESSION['r'])){
  //1. Validation-Client (empty or not) and server (username and password existance on db)
  //2. if the email and password exists, 
	//2.1 create/set sessions
    //2.2 redirect the user in to his/her page 
	require('dbconnect.php');
  if(isset($_POST['btn1'])){  //when login is clicked
	  $email=$_POST['uname'];
	  $password=$_POST['passwd'];
	  if((!is_null($email) || !empty($email) || $email!="") && (!is_null($password) || !empty($password) || $password!="")){
			if($connection){ // if db connection succeed
			  //make sure that username and password exist on the db
				$password = md5($password);
				$sql="select * from account where emailaddress='$email' AND password='$password' AND status=1";
				$result=mysqli_query($connection,$sql);
				if(mysqli_num_rows($result)==1){
					while($row = mysqli_fetch_assoc($result)){
						$role = $row['role'];
						$id = $row['userId'];
					}
					$_SESSION['u'] = $email;
					$_SESSION['p'] = $password;
					$_SESSION['r'] = $role;
					$_SESSION['i'] = $id;
					if($role == 'admin')
						header('Location: admin.php');
					else if($role == 'head')
						header('Location: head.php');
					else if($role == 'instructor')
						header('Location: instructor.php');
					else if($role == 'student')
						header('Location: student.php');
					else
						header('Location: logout.php');
				}else{
					echo "email or password does not exist. ";
					header('Location: index.php');
				}
			}else
				echo "Failed to connect the system.";
	  }else
		  echo "Please fill valid username or password.";
  }

 if(isset($_POST['btn2'])){ //When Clear button is clicked
        header('Location: login.php');
  }

  
?>

<!DOCTYPE html>
<html lang="eng">
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>

<header>  <!-- Header-->
	<?php include_once('header.php'); ?>
</header>

<section> <!-- Content-->
<article>
		<form action=" " method="POST">
			<b>Email address </b><input type="text" name="uname" required> <br/>
			<b>password </b><input type="password" name="passwd" required> <br/>
			 <input type="submit" name="btn1" value="Login"> 
			<input type="submit" name="btn2" value="Clear"> <br/>
			<a href="#">Forget password</a>
		</form>
</article>
</section>

<footer>
   <?php include_once('footerpage.php'); ?>
</footer>
</body>
</html>
<?php 
	}else
		header("Location: ".$_SESSION['r'].".php");
?>