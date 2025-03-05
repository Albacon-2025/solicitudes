<?php
@session_start();
// VARIABLES RECIBIDAS POR URL
    
    @$empresa = $_GET['empresa'];
    @$estiloDeWEB = $_GET['estiloWEB'];
    
// VARIABLES DE SESION
    @$UTCsesion = $_SESSION['UTCsesion'];
    @$nombreEmpresa = $_SESSION['nombreEmpresa'];
        if(@$_SESSION['nombreEmpresa']==''){@$_SESSION['nombreEmpresa'] = @$empresa;}else{};
    @$estiloDeWEB = $_SESSION['estiloDeWEB'];
        if(@$_SESSION['estiloDeWEB']==''){@$_SESSION['estiloDeWEB'] = @$estiloWEB;}else{};

        if($estiloDeWEB == 'azul'){$estiloCSS = '00-estilos-azul.css';}
        elseif($estiloDeWEB == 'blanco'){$estiloCSS = '00-estilos-blanco.css';}
        elseif($estiloDeWEB == 'negro'){$estiloCSS = '00-estilos-negro.css';}
        elseif($estiloDeWEB == 'verde'){$estiloCSS = '00-estilos-verde.css';}
        elseif($estiloDeWEB == 'rojo'){$estiloCSS = '00-estilos-rojo.css';}
        else{@$estiloCSS = '00-estilos-azul.css';};

    @$IDvigilante = $_SESSION['IDvigilante'];
    @$nombreVigilante = $_SESSION['nombreVigilante'];
    @$apellidosVigilante = $_SESSION['apellidosVigilante'];

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

   @$vigilante = $_REQUEST['vigilante'];
   @$contrasenia = $_REQUEST['contrasenia'];
   @$comprobarVigilante = $_REQUEST['comprobarVigilante'];
   @$qr = $_REQUEST['qr'];
   @$qrEscaneado = $_REQUEST['qrEscaneado'];
   
   // Para BUSCADOR
   @$buscarDato = $_REQUEST['buscarDato'];
   @$buscarDNI = $_REQUEST['buscarDNI'];
   @$codigoQR = $_REQUEST['codigoQR'];
   
   //Para OLVIDO CONTRASEÑA
   @$nickVigilante = $_REQUEST['nickVigilante'];
   @$numeroNominaVigilante = $_REQUEST['numeroNominaVigilante'];
   @$claveNueva = $_REQUEST['claveNueva'];
   @$claveNuevaRepetida = $_REQUEST['claveNuevaRepetida'];
/*
// Variables "MENSAJES de ERROR"
   @$tipoMensaje_01 = 'INFORMACION INCOMPLETA';
   @$tipoMensaje_02 = 'AVISIO IMPORTANTE';
   @$mensaje_01 = 'DEBE INDICAR UN USUARIO VALIDO';
*/
//Variables para actualizar la BD ce control y añadir hora de entrada
   @$actualizarDNI =  $_REQUEST['datoDniQR'];
   @$actualizarVehiculo =  $_REQUEST['datoVehiculoQR'];
   @$actualizarNombre =  $_REQUEST['datoNombreQR'];
   @$actualizarApellidos =  $_REQUEST['datoApellidosQR'];
   @$actualizarEmpresa =  $_REQUEST['datoEmpresaQR'];
   @$actualizarObservaciones =  $_REQUEST['datoObservacionesQR'];
/*
   @$nameUnoVigilante = $datosVigilante[3];
   @$nameDosVigilante = $datosVigilante[4];
*/

?>