<!DOCTYPE html>
<html >
<head>
    <?php session_start(); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>A la venta Colombia</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/Login.css" rel="stylesheet">

</head>


    <script src="js/prefixfree.min.js"></script>
    <body>
        <div class="body"></div>
        <div class="grad"></div>
        <div class="header">
            <div>Ingresa tus datos</div>
        </div>
        <br/>
        
        <div class="login">
            <view>
                <form action="validate.php" method="POST">
                    
                    <input type="text" placeholder="correo@example.com" name="correo"  required/>
                    <input type="password" placeholder="Password" name="pass" required/>
                    <input type="submit"  value="Registrarse" action="Registrarse"/>
                    <?php 
                    if (isset($_SESSION["error"])) {
                        echo "<label>Usuario o contraseña son invalidos</label>";
                        unset($_SESSION["error"]);unset($_SESSION["correo"]);
                    }
                    
                    
                    ?>
                    
                <form> 

            <view>
        </div>
    </body>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


</html>
