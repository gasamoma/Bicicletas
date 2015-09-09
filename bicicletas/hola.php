<html>
<head>
	<meta charset="utf-8">
	<title>hola mundo</title>
</head>
<body>

	<h1>mi primera página</h1>
	<h2>mi primera página</h2>
	<h3>mi primera página</h3>
	<h4>mi primera página</h4>
	<h5>mi primera página</h5>
	<label>hola: <?php
	 if (isset($_POST['number1'])) {
		echo $_POST['number1']+$_POST['number2'];
	}
	?>
	</label> 
	<form action="hola.php" method="post">
		<label>escribe tu numero 1: </label><input type="number"  name="number1"/>
		<label>escribe tu numero 2: </label><input type="number"  name="number2"/>
		<input type="submit" value="Submit">
	</form>
</body>
</html>