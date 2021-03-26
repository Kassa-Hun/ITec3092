<html>
<head>
</head>
<body>
<table align="center" border=1>
<tr><td><form action="" method="POST"> 			
Name:<input type="text" id="fname" name="fname" pattern="[a-zA-Z/.\s]*" title="Pls enter letters only" required
		<?php if(isset($_POST['fname'])===true) echo 'value="',htmlentities(strip_tags($_POST['fname'])),'"'?>>  <br/>
Father's Name:<input type="text" name="ftname" 
        <?php if(isset($_POST['ftname'])===true) echo 'value="',strip_tags($_POST['ftname']),'"'?>> <br/>
Date of birth:<select name="d1">
<?php
 for($i=0;$i<=31;$i++){
?>
    <option <?php if(isset($_POST['d1'])===true)echo 'value="'.$_POST['d1'].'"'?>>
	   <?php 
	      $val=array("dd");
	       if(isset($_POST['d1'])===true){
		                 echo $_POST['d1'];
	                     $selected_date=$_POST['d1'];
						 unset($_POST['d1']);
			}else{
					echo isset($val[$i])?$val[$i]:$i;
			}
		?>
	</option>
<?php
}
?>
</select>
<?php $mon=array("mm","Jan","Feb","Mar","Apr","May","Jun","July","Aug","Sep","Oct","Nov","Dec"); ?>
<select name="m1">
<?php
foreach($mon as $m){
 ?>
     <option <?php if(isset($_POST['m1'])===true) echo 'value="'.$_POST['m1'].'"'?>>
	   <?php 
	      $valm=array("mm"); static $j=0;
	       if(isset($_POST['m1'])===true){
		                 echo $_POST['m1'];
	                     $selected_month=$_POST['m1'];
						 unset($_POST['m1']);
			}else{
					  echo isset($valm[$j]) && $valm[$j]===$m?$valm[$j]:$m;
					 ++$j;
					  }
		?>
	</option>
<?php	
}
?>
</select>
<select name="y1">
<?php
for($y=1979;$y<=date('Y')-2;$y++){
  ?>
   <option <?php if(isset($_POST['y1'])===true)echo 'value="'.$_POST['y1'].'"'?>>
	   <?php 
	      $valy=array(1979=>"yyyy");
	       if(isset($_POST['y1'])===true){
		                 echo $_POST['y1'];
	                     $selected_year=$_POST['y1'];
						 unset($_POST['y1']);
					}else{
					echo isset($valy[$y])?$valy[$y]:$y;
					}
	?>
</option>
<?php
}
?>
</select><br/>
<?php $reg=array("Region","Tig","Afar","Amh","Oro","SNNP","Ben","Gam","Somali","Har","Sida","Dire","AA"); ?>
Region:<select name="r1">
<?php
foreach($reg as $r){
  ?>
   <option <?php if(isset($_POST['r1'])===true)echo 'value="'.$_POST['r1'].'"'?>>
	   <?php 
	      $valr=array("Region"); static $i=0;
	       if(isset($_POST['r1'])===true){
		       echo '<p color="red"/>',$_POST['r1'];
	           $selected_region=$_POST['r1'];
			   unset($_POST['r1']);
			}else{
				echo isset($valr[$i]) && $valr[$i]===$r?$valr[$i]:$r;
				++$i;
			 }
		?>
	</option>
<?php
}
?>
</select><br/>
   <input type="submit" name="btn1" value="Register">&nbsp;
   <input type="reset" name="btn2" value="Reset"><br/>
</form>
<!-- Here is the logic-->
<?php
if(isset($_POST['btn1'])){
    $fname=htmlentities(strip_tags($_POST['fname']));   
	$frname=$_POST['ftname'];   
	$d1=$selected_date;
    $m1=$selected_month;         
	$y1=$selected_year;           
	$r1=$selected_region;
	$returned_errors=validator($fname,$frname,$d1,$m1,$y1,$r1);
    if(empty($returned_errors)){//if there is no error
        echo "<h1 align=\"center\">Your profile</h1><hr></br/>";
        echo "Full name:<strong>$fname"." "."$frname </strong><br/>";
        echo "Date of birth: <b>$m1"." ".$d1.","."$y1</b><br/>";
        echo "Region:<b>$r1</b>";
    }
    else{
		$total_errors=count($returned_errors);
		echo 'Pls provide your: <br/>';
	  for($i=0;$i<$total_errors;$i++){
		  echo "&nbsp;&nbsp;&nbsp;&nbsp;-".substr($returned_errors[$i],13),'<br/>';
	  }
    }
    echo "</td></tr></table>";
}
if(isset($_POST['btn2'])){
	unset($fname,$ftname,$selected_date,$selected_month,$selected_year,$selected_region);
    header("Location: 2.4.php"); //redirect the user to 2.4.php page
}
function validator($fname,$frname,$d1,$m1,$y1,$r1){
	 $errors=array();
    if($fname==null)
        $errors[]="Pls fill your name";
    if($frname==null)
        $errors[]="Pls fill your father name";
    if($d1==null || $d1=="dd")
        $errors[]="Pls fill your birth day";
	if($m1==null || $m1=="mm")
        $errors[]="Pls fill your month of birth";
	if($y1==null || $y1=="yyyy")
        $errors[]="Pls fill your year of birth";
	if($r1==null ||$r1=="Region")
        $errors[]="Pls fill your region";
    return $errors;
}
?>
</body>
</html>