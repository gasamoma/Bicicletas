<?php session_start();
include 'consultas.php'; ?>
<!DOCTYPE html>
<html >

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>A la venta Colombia</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <button type="button button-condensed" class="navbar-toggle" >
                    <a href="cart.php"><img class="icon" src="img/cart.png">(<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']):"0" ?>)</a>
                </button>
                <a class="navbar-brand" href="index.php">Antorcha Ingeniería</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="cart.php"><img class="icon" src="img/cart.png">(<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']):"0" ?>)</a>
                    </li>
                    <li>
                        <a href="#">Acerca de nosotros</a>
                    </li>
                    <li>
                        <a href="Contacto.php">Contactanos</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">A la venta Colombia</p>
                <div class="list-group">
                    <?php 
                        $query= sacarCategorias();
                        foreach ($query as $key => $value) {
                            echo "<a href=\"index.php?cat=".$value["id"]."\" class=\"list-group-item\">".$value["nombre"]."</a>" ;
                        }
                    ?>
                </div>
            </div>
            
            <div class="col-md-9">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover table-condensed">
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                            </tr>
                            <?php 
                                $query= sacarProductosCarrito();
                                $total=0;
                                foreach ($query as $key => $value) {
                                    echo "<tr>
                                            <td class=\"text-center\">".$value["nombre"]."</td>
                                            <td class=\"text-center\"><span class=\"glyphicon glyphicon-usd\"></span>".number_format($value["precio"],0,',','.' )."</td>
                                          </tr>";
                                          $total+=$value["precio"];
                                }
                                echo "<tfoot>
                                        <tr>
                                          <td class=\"text-center\">Total</td>
                                          <td class=\"text-center\"><span class=\"glyphicon glyphicon-usd\"></span>".number_format($total,0,',','.' )."</td>
                                        </tr>
                                      </tfoot>";
                            ?>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <form method="post" action="https://www.psepagos.co/PSEHostingUI/BasicTicketOffice.aspx?ID=1802" name="formulario">
                        <div class="col-md-5 col-md-offset-3">
                            <div class="text-warning"><span>INFORMACIÓN PARA EL PAGO</span></div>
                            <div class="table-responsive ">
                                <table border="0" class="table">
                                    <tr>
                                        <td>
                                            <label>Nombre</label>
                                        </td>
                                        <td >
                                            <input name="nombre_cliente" class="form-control" type="text" value="" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>NIT O CÉDULA:</label>
                                        </td>
                                        <td >
                                            <input name="id_cliente" class="form-control"  type="text" value="" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>DIRECCIÓN CORREO ELECTRÓNICO:</label>
                                        </td>
                                        <td >
                                            <input name="email" class="form-control" type="text" value="" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>TELÉFONO:</label>
                                        </td>
                                        <td >
                                            <input name="descripcion_pago" class="form-control" type="number" value="" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>VALOR TOTAL A CANCELAR:</label>
                                        </td>
                                        <td >
                                            <div class="input-group"><span class="input-group-addon">$</span><input name="total_con_iva" class="form-control" type="number" readonly="readonly" value=<?php echo "\"".$total."\""; ?>  /></div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td align="center" colspan="2">
                                            <input id="btnPay" name="btnPay" value="Pagar" class="btn btn-info" type="submit">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    
                    </form>
                </div>
                <p><img src="img/pse.png" class="pse">El pago se realizar&aacute; utilizando los servicios de PSE, realizando el d&eacute;bito desde su cuenta corriente o de ahorros.</p>
                <?php 

                //mail('gabrielsamoma@gmail.com', 'Mi título', "holas","From: gabriel_montero@hotmail.com"); ?>
                
            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4  text-left">
                    <img src="http://i1054.photobucket.com/albums/s495/juliansmm/Ebike/pagos%20online_zpsfipbzxlw.png"  height="10%" width="100%">
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 text-center">
                    <h3>Envios a todo el país</h3>
                    <p>Copyright &copy; Antorcha Ingeniería CIA Ltda. 2015</p>
                </div>
                <div class="col-sm-12 col-md-offset-3 col-md-6  col-lg-4 col-lg-offset-0 text-right">
                    <img src="http://i1054.photobucket.com/albums/s495/juliansmm/Ebike/tarjeta%20de%20credito_zpscbbo39oj.png"height="10%" width="100%">
                </div>
                
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>\
