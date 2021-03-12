<?php
/**
 * Created by PhpStorm.
 * User: kass
 * Date: 07-04-2017
 * Time: 21:52
 */
 ?>
    <table align="center" border='1' >
    <caption><b>Arithmetic Operation</b></caption>
    <tr><td><fieldset><legend><b>Enter values for:</b></legend>
    <form action=" " method="GET">
    Num1<input type="text" name='n1' value="<?php if(isset($_GET['n1'])) echo $_GET['n1'];?>"><br/>
    Num2<input type="text" name='n2' value="<?php if(isset($_GET['n2'])) echo $_GET['n2'];?>"></fieldset>
    <fieldset><legend><b>Operators</b></legend>
    Addition<input type="radio" name='op1' value='+' checked> <br/>
    Subtraction<input type="radio" name='op1' value='-'><br/>
    Multiplication<input type="radio" name='op1' value='*'><br/>
    Division<input type="radio" name='op1' value='/'><br/>
	Remainder<input type="radio" name='op1' value='%'></fieldset>
     <input type="submit" name='btn1' value='Calculate by operator'>&nbsp
     <input type="submit" name='btn2' value='Calculate all'></form>
<?php
class SimpleCalculator{
	function ArithmeticOperation($x,$y,$opr){
        switch ($opr) {
            case '+':
                $res = ($x + $y);
                break;
            case '-':
                $res = ($x - $y);
                break;
            case '*':
                $res = ($x * $y);
                break;
            case '/':
			case '%':
                if ($y != 0)
                    $res = ($opr=='/')? ($x / $y): ($x % $y);
                else
                    $res = "Division by zero is prohibited";
                break;
        }
        return $res;
    }
	function PerformArithmetic($x,$y){
         $add = ($x + $y);
         $sub = ($x - $y);
         $mul = ($x * $y);
         $div= ($y != 0)?($x / $y):"Division by zero is prohibited";
         $modl = ($y!= 0)?($x % $y):"Division by zero is prohibited";
  
        return array($add,$sub,$mul,$div,$modl);
	}

	function validator($num1,$num2){
		if(($num1!=null && (is_numeric($num1)||is_float($num1))) && ($num2!=null &&	
		(is_numeric($num2)||is_float($num2))))
			return true;
		else
			return false;
	}
}

$sc=new SimpleCalculator();
if(isset($_GET['btn1'])){
	$n1=$_GET['n1']; 	
	$n2=$_GET['n2']; 	
	$op=$_GET['op1'];
    echo "<br/>";
    echo ($sc->validator($n1,$n2))==true?$sc->ArithmeticOperation($n1,$n2,$op):"Invalid Input"."</td></tr></table>";
}
if(isset($_GET['btn2'])){
	if($sc->validator($_GET['n1'],$_GET['n2'])){
		$values=$sc->PerformArithmetic($_GET['n1'],$_GET['n2']);
		foreach($values as $results)
	        echo "<br/>".$results;
	}else
		echo "<br/> Invalid input";
	echo "</td></tr></table>";
}
?>