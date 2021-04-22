<?php
  session_start();
  if($_SESSION['r']=='head'){
	  	require_once('dbconnect.php');
  ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Post notice</title>

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
			<table><tr><td><b>Enter notice subject</b></td><td> <input type="text" name="subject" required> </td></tr>
			<tr><td><b>Enter notice content</b></td><td> <textarea width=80  height=80 name="cont" ></textarea> 
			</td></tr>
			<tr><td> <b>Notice to whom?</b> </td><td> <select name="to">
						<option value="instructor">Instructor</option>
						<option value="srudent">Student</option>
						<option value="all">All</option>
						</select> </td></tr>
			 <tr><td><input type="submit" name="btn3" value="Publish"> </td><td>
			<input type="submit" name="btn4" value="Clear"> </td></tr> </table>
		</form>

<?php
  if(isset($_POST['btn3'])){  //when create button is clicked
	  	if($connection){ // if db connection succeed
				$sub = $_POST['subject'];
				$cont = $_POST['cont'];
				$to = $_POST['to'];
				$postDate = date('Y')."-".date('m')."-".date('d');
				$sql="insert into notice (noticeId,noticeSubject,noticeContent,noticeTo,postedDate)values(null,'$sub','$cont','$to','$postDate')";
				if(mysqli_query($connection,$sql)){
					echo "Notice is posted successfuly";
				}else{
					echo "Falied to post notice: ".mysqli_error($connection);
				}
			 mysqli_close($connection);
			}else
				echo "Failed to establish db connection.";  
  }

 if(isset($_POST['btn2'])){ //When Clear button is clicked
        header('Location: postNotice.php');
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
