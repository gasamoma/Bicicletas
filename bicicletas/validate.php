<?php 
session_start();
include 'consultas.php';
if (isset($_POST['correo'])&&isset($_POST['nombre'])&&isset($_POST['pass'])&&isset($_POST['Rpass'])) {
	if ($_POST['pass']!=$_POST['Rpass']) {
		 $_SESSION["correo"]=$_POST['correo'];
		 $_SESSION["nombre"]=$_POST['nombre'];
		 echo "wrong pass";
		 header("Location: Register.php");
	}else{
		//TODO MAIL CHECKER
		register($_POST['correo'] , $_POST['pass'] , $_POST['nombre']);
		header("Location: Login.php");
	}
}elseif (isset($_POST['correo'])&&isset($_POST['pass'])) {
	if (login($_POST['correo'],$_POST['pass'] ) ) {
		$_SESSION["usr"]=$_POST['correo'];

		//$_SESSION["utip"]=true; si es administrador
		header("Location: Formularios.php");
	}else{
		//no existe
		$_SESSION["error"]=true;
		header("Location: LoginU.php");
	}
}else{
	header("Location: Login.php");
}
?>