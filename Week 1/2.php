<?php 
    $cc1="ITec 3201";
    $cc2="ITec 3111";
	$cc3="ITec 3301";
    $cc4="ITec 3411";
	$cc1name="Distributed Systems";
	$cc2name="Data Communcation and computer networking";
	$cc3name="Multimedia";
	$cc4name="Advanced Internet Programming";
	$cc1chr=3;
	$cc2chr=4;
	$cc3chr=3;
	$cc4chr=3;
	echo "<h1 align=\"center\"><u> 3rd year 2 semester IT courses</u><h1>";
	echo "<table align=\"center\" border=\"1\" bgcolor=\"white\" cellpadding=\"0\"  cellspaning=\"0\">";
    echo "<tr bgcolor=\"silver\"><th>Course code</th><th>Course Title</th><th>Credit hrs.</th>";
	echo "<tr ><td >$cc1</td><td>$cc1name</td><td align=\"center\">$cc1chr</td>";
	echo "<tr><td>$cc2</td><td>$cc2name</td><td align=\"center\">$cc2chr</td>";
	echo "<tr ><td >$cc3</td><td>$cc3name</td><td align=\"center\">$cc3chr</td>";
	echo "<tr><td>$cc4</td><td>$cc4name</td><td align=\"center\" >$cc4chr</td>";
	echo "<tr><td colspan=\"2\" align=\"right\">Total</td> <td align=\"center\" >";
	echo (int)$cc1chr+(int)$cc2chr+(int)$cc3chr+(int)$cc4chr;
	echo "</td>";
	echo "</table >";
?>