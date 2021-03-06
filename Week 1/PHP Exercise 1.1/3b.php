<?php
	defined('PI')?null:define("PI",3.14);
	$radius1="3.5";
	$area1=constant("PI")*(pow($radius1,2));
	$radius2=2.5;
	$area2=PI*($radius2*$radius2);
	echo 'Radius of the first circle $radius1 and second circle $radius2<br/>';
	echo "Area of the first Circle is:".$area1."<br/>";
	echo "Area of the second circle:".$area2."<br/>";
	echo "Area of the first Circle is:{$area1}<br/>";
	echo "Area of the second circle:$area2<br/>";
?>
