<?php
    //crear conexion con la base de datos
    function conectar(){
        // mysql_connect("hosting","usuario","contrasena","nombreBaseDatos")
        $sqlcon = mysql_connect("","","") or die ("could not connect to mysql");
        mysql_select_db("antorcha_Bicicletas",$sqlcon)or die ("could not connect to DB");
        mysql_set_charset("utf8",$sqlcon);

        return $sqlcon;
    }
    function sacarProductos(){
        $con = conectar();
        $sql="";
        if (isset($_GET['cat'])) {
            $sql = "SELECT * FROM productos where idCategoria='".mysql_real_escape_string($_GET['cat'])."' " ;
        }else{
            $sql = "SELECT * FROM productos " ;
        }
        
        $query = mysql_query($sql, $con) or die (mysql_error($con));
        $iner=0;
        $answr= array();
        while ($row =mysql_fetch_array($query)) {
            $answr[$iner]=$row;
            $iner++;
        }
        return $answr;
    }
    function sacarPromImg(){
        $con = conectar();
        $sql = "SELECT * FROM promimg " ;
        
        $query = mysql_query($sql, $con) or die (mysql_error($con));
        $iner=0;
        $answr= array();
        while ($row =mysql_fetch_array($query)) {
            $answr[$iner]=$row;
            $iner++;
        }
        return $answr;
    }
    function producto($id){
        $con = conectar();
        //saco el producto
        $sql = "SELECT * FROM productos where id='".$id."' " ;
        $query = mysql_query($sql, $con) or die (mysql_error($con));
        $row =mysql_fetch_array($query);
        $answr= array();
        $answr['prod']=$row;
        //saco las imágenes
        $sql = "SELECT * FROM imagen where idprod='".$id."' " ;
        $query = mysql_query($sql, $con) or die (mysql_error($con));
        $iner=0;
        $imagenes= array();
        while ($row =mysql_fetch_array($query)) {
            $imagenes[$iner]=$row;
            $iner++;
        }
        $answr['imagenes']=$imagenes;
        //saco los reviews
        $sql = "SELECT * FROM reviews where idProd='".$id."' " ;
        $query = mysql_query($sql, $con) or die (mysql_error($con));
        $iner=0;
        $reviews= array();
        while ($row =mysql_fetch_array($query)) {
            $reviews[$iner]=$row;
            $iner++;
        }
        $answr['reviews']=$reviews;
        return $answr;
    }
    function sacarCategorias(){
        $con = conectar();

        $sql = "SELECT * FROM categoria" ;
        $query = mysql_query($sql, $con) or die (mysql_error($con));
        $iner=0;
        $answr= array();
        while ($row =mysql_fetch_array($query)) {
            $answr[$iner]=$row;
            $iner++;
        }
        return $answr;
    }
    function sacarProductosCarrito(){
        $con = conectar();

        $sql = "SELECT * FROM productos where 0" ;
        foreach ($_SESSION['cart'] as $key => $value) {
            $sql=$sql." OR id='".$key."' ";
        }
        $query = mysql_query($sql, $con) or die (mysql_error($con));
        $iner=0;
        $answr= array();
        while ($row =mysql_fetch_array($query)) {
            $answr[$iner]=$row;
            $iner++;
        }
        return $answr;
    }
    function register($correo,$contrasena,$nombre){
        $con = conectar();

        $sql = "INSERT INTO `antorcha`.`usuario` (`correo`, `contrasena`, `nombre`) VALUES ('".mysql_real_escape_string($correo)."', '".md5($contrasena)."', '".mysql_real_escape_string($nombre)."')" ;
        
        $query = mysql_query($sql, $con) or die (mysql_error($con));
        
    }
    function login($correo,$contrasena){
        $con = conectar();

        $sql = "SELECT * FROM `usuario` WHERE `correo` = '".mysql_real_escape_string($correo)."' AND `contrasena` = '".md5($contrasena)."';" ;
        
        $query = mysql_query($sql, $con) or die (mysql_error($con));
        if(mysql_fetch_array($query)){
            return true;
        }else{
            return false;
        }
    }
    
?>