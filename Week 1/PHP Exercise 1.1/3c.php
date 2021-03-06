<?php 
		$test1=11.75;    $test2=7.56;  $project=11.125;  $ass1=12.65;   $final=35.94;
		$total=$test1+$test2+$project+$ass1+$final; //79.025
		echo "Total Mark=$total<br/>";
		echo "Total Mark=".number_format($total,2)."<br/>"; //79.03
		$total=round($test1)+floor($test2)+ceil($project)+ceil($ass1)+ceil($final); //80
		echo "Total Mark=$total<br/>";
		echo "Your lucky number from 1 to 10 is:".mt_rand(1,10);

	?>
