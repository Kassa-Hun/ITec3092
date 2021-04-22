<?php
 session_start();
 if(isset($_SESSION['u'],$_SESSION['p'],$_SESSION['r']))
	unset($_SESSION['u'],$_SESSION['p'],$_SESSION['r']);
 session_destroy();
 header('Location: index.php');
?>