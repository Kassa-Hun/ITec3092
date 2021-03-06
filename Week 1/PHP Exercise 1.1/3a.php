<?php
		//variable Declaration
		$num=30;
		$num%=3;
		function valueofnum(){
			$num=25;
			$x=(($num%5)==0)?($num/5):($num*=2);
			print "x=".$x;
			}
		valueofnum();
		echo "<br>num1=$num<br>num2=";
		$num+=30;
		echo $num;
?>
