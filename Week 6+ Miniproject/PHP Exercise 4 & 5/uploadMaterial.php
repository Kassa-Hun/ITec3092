<?php
  session_start();
  if($_SESSION['r']=='instructor'){
	  require_once('dbconnect.php');
  ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Upload material</title>

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

<section> <b>Upload compressed course material (zip/rar only)</b><!-- Content-->
<article>
<?php
  	  	if($connection){ // if db connection succeed
				$id = $_SESSION['i'];
				$sql="select * from account a, assignedcourse ac, course c 
				where (a.userId = '$id' AND ac.instructorId = '$id') AND (ac.courseCode = c.courseCode) ";
				$res=mysqli_query($connection,$sql);
				if(mysqli_num_rows($res)>0){
					?>
					<form action=" " method="POST" enctype="multipart/form-data">

					Course code<select name="cc">
					<?php
					while($row = mysqli_fetch_assoc($res)){
						echo "<option value='".$row['courseCode']."'>".$row['courseCode']."</option>";
					}
					echo "</select><br/>";
					?>
					Attach course material<input type="file" name="material" > <br/>
					<input type="submit" name="btn1" value="Upload"> 
					</form>
			<?php
				}else{
					echo "Error: ".mysqli_error($connection);
				}
			}else
				echo "Failed to establish db connection.";  

	if(isset($_POST['btn1'])){
       $cc = $_POST['cc'];
       $sql = "select * from assignedcourse where courseCode='$cc'";
	   $res = mysqli_query($connection,$sql);
	   if(mysqli_num_rows($res)>0){
		   while($row = mysqli_fetch_assoc($res))
				$courseCompleted = $row['IsCourseCompleted'];
		   if($courseCompleted!="yes"){
			   if(empty($_FILES['material']['error'])){
				 $uf = $_FILES['material']['tmp_name'];
				 $ufn = $_FILES['material']['name'];
				 $path = "UploadedCourseMaterial/".$cc;
				 if(!file_exists($path))
					mkdir($path);
				 $extension = pathinfo($ufn,PATHINFO_EXTENSION);
				 $supportedFileFormat = array("rar","zip");
				 if(in_array($extension,$supportedFileFormat)){
					 if(move_uploaded_file($uf,$path."/$ufn")){
						 $sql = "update assignedcourse set UploadedCourseMaterialPath = '$path/$ufn' where courseCode='$cc' AND instructorId='".$_SESSION['i']."'";
						 if(mysqli_query($connection,$sql))
							 echo "Course material is uploaded.";
					 }else
						 echo "Unable to upload the material";
				 }else
					 echo "File is not supported";
			   }else
				   echo "Uploading a file encouters an error";
		   }else
			   echo "You cannot uploaded material to a completed course.";
	   }else
		   echo "There is no record";
	 
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
mysqli_close($connection);
}else{
		if(isset($_SESSION['r'])){
			$role = $_SESSION['r'];
			header("Location: $role.php");
		}else
			header('Location: logout.php');
}
?>
