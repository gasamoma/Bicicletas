<?php 
session_start();
if (is_numeric($_GET['id'])) {
	
	$_SESSION['cart'][$_GET['id']]=true;
	header("Location: index.php");
	die();
}else{echo "Not hacking today";}
?>