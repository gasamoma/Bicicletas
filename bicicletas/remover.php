<?php 
session_start();
if (is_numeric($_GET['id'])) {
	unset($_SESSION['cart'][$_GET['id']]);
	header("Location: cart.php");
	die();
}else{echo "Not hacking today";}
?>