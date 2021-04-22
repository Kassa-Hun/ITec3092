<?php
  session_start();
  if($_SESSION['r']=='admin'){
	require_once('dbconnect.php');
  ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Update account</title>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>

<header>  <!-- Header-->
	<?php include_once('header.php'); ?>
</header>

<nav> <!-- Naviagation-->
<ul>
  <li> <a href="logout.php"> Logout </a></li>
</ul>
</nav>

<section> <!-- Content-->
<article>
		<form action=" " method="POST">
			<b>Search a username </b><input type="text" name="acc" required> 
			 <input type="submit" name="btn3" value="Search"> <br/>
		</form>

<?php
 
	
  if(isset($_POST['btn3'])){  //when create button is clicked
	  	if($connection){ // if db connection succeed
				$acc = $_POST['acc'];
				$sql="select * from account where emailaddress = '$acc'";
				$res = mysqli_query($connection,$sql);
				if(mysqli_num_rows($res)>0){
					echo "<form action=\" \" method=\"POST\">";
					while($row = mysqli_fetch_assoc($res)){
						echo "<b>Username </b><input type=\"text\" name=\"acc\" value='".$row['emailaddress']."' readonly> <br/>";
						echo "<b>Password </b><input type=\"password\" name=\"pass\" value=''><br/>";
						echo "<b>Role </b><select name=\"rol\">".
							"<option value='admin'>Admin</option><option value='head'>Head</option>".
							"<option value='instructor'>Instructor</option><option value='student'>Student</option>".
							"</select><br/>";
						echo "<b>Status </b><select name=\"stat\">".
							"<option value='1'>Active</option><option value='0'>Inactive</option>".
							"</select><br/>";
						echo "<input type=\"submit\" name=\"btn4\" value=\"Update\"> <br/>";
					}
					echo "</form>";
				}else{
					echo "Error: ".mysqli_error($connection);
				}
			 mysqli_close($connection);
			}else
				echo "Failed to establish db connection.";  
  }

 if(isset($_POST['btn4'])){ //When Clear button is clicked
     if($connection){
		if(!empty($_POST['pass']) && strlen($_POST['pass'])>0){
			$sql = "update account set password='".md5($_POST['pass'])."', role='".$_POST['rol']."', status='".$_POST['stat']."' where emailaddress = '".$_POST['acc']."' ";
			if(mysqli_query($connection,$sql)){
				echo "User account is updated";
			}else
				echo "Unable to update user account details.";
		}else
			echo "Please fill the required fields.";
		mysqli_close($connection);
	 }else{
		echo "Failed to connect to the system";
	 }   	
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
