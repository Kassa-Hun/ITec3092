<?php
$string="PHP String Functions";
$fullname="Mitiku Mamo Woldie";
$name=substr($fullname,0,6); 
$fathername=substr($fullname,7,4);
$gfathername=substr($fullname,12);
echo '[' . str_pad($string,40,'=',STR_PAD_BOTH) . "]<br>";
echo "First name is:<b><i>".$name."</i></b><br>";
echo "Father Name is:<b><i>".$fathername."</i></b><br>";
echo "Grandfather Name is:<b><i>".$gfathername."</i></b><br>";
$name="Henok";
$fullname=substr_replace($fullname,$name,0,6);
echo "Now your full name is:<b><i>".$fullname."</i></b><br>";
$noc=strlen($name)+strlen($fathername)+strlen($gfathername);
echo "Your full name is <b>$noc characters</b> long or <b>$noc bytes</b><br> ";
$noc=strlen($fullname) - substr_count($fullname," ");
echo "Your full name is <b>$noc characters</b> long or <b>$noc bytes</b><br> ";
echo "The number of characters in <i> $fullname</i> are :<b>".strlen($fullname)."</b><br>";
echo "<b>o</b> is found <b>".substr_count($fullname,"o")."</b> times in your full name<br>";
echo "<b>o</b> is first found at <b>".strpos($fullname,"o")."rd</b> position in your full name<br>";
echo "<b>o</b> is lastly found at <b>".strrpos($fullname,"o")."th</b> position in your full name<br>";
echo "<b>String</b> is found in \"<b>".strstr($string,"String")."\"</b><br/>";
echo "<b>Fun</b> is found in \"<b>".strchr($string,"Fun")."\"</b><br/>";
echo "The number of characters found in the string <b>$string</b> that contains the characters in <b>PHPds</b> string are :<b>".strspn($string,"PHPasbn")."</b><br>";
echo "The number of characters found in the string <b>$string</b> before any part of <b>String</b> string are found :<b>".strcspn($string,"String")."</b><br>";
echo "Look how funny it is when my name is reversed:<b>".strrev($fullname)."</b><br>";
$username=" comoros ";
echo strlen($username)."!=".strlen(trim($username));
echo "<br/>".str_repeat('=',36);
?>
