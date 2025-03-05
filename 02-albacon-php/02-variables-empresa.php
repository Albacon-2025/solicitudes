<?php
//  PRIMERA VARIABLE CREADA A PARTIR DEL NOMBRE DEL ARCHIVO
    @$empresa = basename($_SERVER['SCRIPT_FILENAME'],'.php');

//  VARIABLES DE SESION
    @$nombreEmpresa = $_SESSION['nombreEmpresa'];
    @$estiloDeWEB = $_SESSION['estiloDeWEB'];
    @$UTCsesion = $_SESSION['UTCsesion'] = time();

// VARIABLES CONEXION EN LOCAL
    $conexion_db = mysqli_connect("localhost","solicitante_accesos","Solicitante01");
    $baseDatos = mysqli_select_db($conexion_db,"albacon_accesos");
    mysqli_query($conexion_db, "SET NAMES 'utf8'"); // FUNDAMENTAL PARA LOS CARACTERES EN ESPAÑOL (NO QUITAR NUNCA)
// VARIABLES CONEXION EN HOSTINGER
    //$conexion_db = mysqli_connect("localhost","u134300253_albacon","Al553383bacon006.");
    //$baseDatos = mysqli_select_db($conexion_db,"u134300253_albacon_acceso");
// VARIABLES CONEXION EN 000WEHOST
    //$conexion_db = mysqli_connect("localhost","id21697939_albacon","Al553383bacon003.");
    //$baseDatos = mysqli_select_db($conexion_db,"id21697939_albacon_accesos");
// VARIABLES CONEXION EN BYETHOST
    //$conexion_db = mysqli_connect("sql211.byethost12.com","b12_32772157","Al553383bacon003.");
    //$baseDatos = mysqli_select_db($conexion_db,"b12_32772157_albacon_accesos");

// VARIABLES ENVIADAS POR FORM
    @$pasos = $_REQUEST['pasos'];

//@$estiloWEB = $_REQUEST['estiloWEB'];
//@$empresa = $empresaRegistro;
//@$empresa = $_GET['empresa'];
//@$estiloDeWEB = $_GET['estiloWEB'];
    
?>