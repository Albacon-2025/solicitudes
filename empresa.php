<?php
session_start();
// SE LLAMA A LOS ARCHIVOS NECESARIOS
require('02-albacon-php/02-variables-empresa.php');
require('02-albacon-php/02-funciones-empresa.php');

// SE OBTIENEN LOS DATOS PARA MONTAR EL ARCHIVO DE LA EMPRESA Y LA VARIABLES DE SESION (MUY IMPORTANTE - SE REALIZA EN ESTE ARCHIVO)
mysqli_query($conexion_db, "SET NAMES 'utf8'"); // FUNDAMENTAL PARA LOS CARACTERES EN ESPAÑOL (NO QUITAR NUNCA)
$conexion_db;
$baseDatos;
$sql="SELECT * FROM registro_empresas WHERE EMPRESA_REGISTRO ='$empresa'";
$result=mysqli_query($conexion_db,$sql);
$datosEmpresa=mysqli_fetch_array($result);

// SE DA VALOR A LAS VARIABLES DE SESION
@$nombreEmpresa = $_SESSION['nombreEmpresa'] = $datosEmpresa[4];
@$estiloDeWEB = $_SESSION['estiloDeWEB'] = $datosEmpresa[8];
//  VARIABLES PARA ELEGIR ESTILO DE LA WEB
if($estiloDeWEB == 'azul'){$estiloCSS = '00-estilos-azul.css';$iconoCSS = 'icon_azul.ico'; }
elseif($estiloDeWEB == 'blanco'){$estiloCSS = '00-estilos-blanco.css';$iconoCSS = 'icon_blanco.ico'; }
elseif($estiloDeWEB == 'negro'){$estiloCSS = '00-estilos-negro.css';$iconoCSS = 'icon_negro.ico'; }
elseif($estiloDeWEB == 'verde'){$estiloCSS = '00-estilos-verde.css';$iconoCSS = 'icon_verde.ico'; }
elseif($estiloDeWEB == 'rojo'){$estiloCSS = '00-estilos-rojo.css';$iconoCSS = 'icon_rojo.ico'; }
else{@$estiloCSS = '00-estilos-azul.css';};

mysqli_close($conexion_db); // Se cierra conexion

?>
<!doctype html>
<?php

// SE CONFIGURA LA SESION
if(@$pasos==102){
  session_destroy();
  unset($UTCsesion);
  unset($pasos);
  /*
  unset($IDvigilante);
  unset($nombreVigilante);
  unset($apellidosVigilante);
  */
};
?>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<title><?php echo strtoupper(str_replace('_',' ',$nombreEmpresa));?></title>
	<link rel="stylesheet" type="text/css" href="01-albacon-css/<?php echo $estiloCSS;?>" MEDIA="screen"/>
  <link rel="shortcut icon" href="05-albacon-fotos/<?php echo $iconoCSS;?>" type="image/x-icon"/>
  <script type="text/javascript" src="03-albacon-js/jquery-3.7.0.js"></script>
  <script type="text/javascript" src="03-albacon-js/albacon.js"></script>
  <script type="text/javascript" src="03-albacon-js/albacon-camara.js"></script>
  <script type="text/javascript" src="03-albacon-js/albacon-webcam.js"></script>
</head>

<body>
<!-- ////////////////////////////////////////////////////////  CABECERA  ///////////////////////////////////////////////// -->
<div id="cabecera" class="cabecera" style="background-image:url('05-albacon-fotos/01-albacon-nombre.png');">
    <!--<h1>DIRECCION DE SEGURIDAD&nbsp-&nbsp<?php echo str_replace('_',' ',$nombreEmpresa);?></h1>-->
    <h1 style="text-shadow: 2px 2px 4px rgba(0,0,0,0.15);letter-spacing:-1px;"><strong>G</strong>estión de <strong>S</strong>olicitudes y <strong>C</strong>ontrol de <strong>A</strong>ccesos</h1>
    <!--<h2>GESTIÓN DE SOLICITUDES Y CONTROL DE ACCESOS</h2>-->
    <h2><?php echo strtoupper(str_replace('ñ','Ñ',str_replace('_',' ',$nombreEmpresa)));?>&nbsp-&nbspDIRECCION DE SEGURIDAD</h2>
<div id="datosCabecera" class="datosCabeceraEmpresa" style="">
<?php
  echo 'UTC SESION: '.@$UTCsesion;
  echo '<br>PASOS: '.@$pasos;
  echo '<br>EMPRESA sesión: '.@$nombreEmpresa;
  echo '<br>ESTILO sesión: '.@$estiloDeWEB;
  //echo '<br>CONTRASEÑA: '.@$contrasenia;
  //echo '<br>COMPROBAR VIGILANTE: '.@$comprobarVigilante;
  //echo '<br>FECHA DE VALIDEZ: '.@$registroVigilante[8];
  //echo '<br>ORIGEN: '.@$rutaOrigenCSS;
  //echo '<br>DESTINO: '.@$rutaDestinoCSS;
?>
</div>
</div>
<!-- ////////////////////////////////////////////////////////////  FOOTER  /////////////////////////////////////////////////// -->
<footer id="footer" style="">
<table style="margin-top:-3px;width:100%;text-align:center;border:none;" cellspacing="0" cellpadding="0">
  <tr>
	  <td class="tdFooter" style="border:none;">
	    <form id="nuevoProyecto" action="albacon.php" method="post">
	      <input type="hidden" name="pasos" value="0"/>
	      <button id="inicioUno" style="" value="">Albacón Principal</button>
      </form>
    </td>
	  <td class="tdFooter" style="">
	    <!--
        <form id="" action="albacon.php" method="get">
          <input type="hidden" name="pasos" value="1"/>
          <button id="inicioDos" style="" value="">Nuevo Proyecto</button>
        </form>
        -->
    </td>
	  <td class="tdFooter" style="">
        <button id="inicioTres" style="" value="">Contacta con Albacón</button>
    </td>
	  <td class="tdFooter" style="">
        <button id="inicioCuatro" style="" value="">Enlaces de interés</button>
    </td>
	  <td class="tdFooter" style="">
        <p style="font-size:12px;margin-top:4px;">Web diseñada por Alejandro Peñalba Rincón</p><p style="font-size:10px;margin-top:-14px;">© Copyright</p>
    </td>
  </tr>
</table>
</footer>
<!-- ///////////////////////////////////////////////////////  CONTENEDOR   /////////////////////////////////////////////// -->
<!--<div id="contenedor" style="background-image:url('05-albacon-fotos/fondo_04.png');">-->
<div id="contenedor" class="contenedor" style="">
<?php
// **************************************************  CONTENIDO PHP  *********************************************************************************
// 1- SE MUESTRA PANTALLA PRINCIPAL DE LA EMPRESA  ****************************************************************************************************
if(@$pasos==0){
    require('02-albacon-php/02-variables-empresa.php');
    pantallaEmpresa();
?>
<!--
  <script>
    history.replaceState(null, null, "<?php echo strtolower($nombreEmpresa);?>.php?pasos=<?php echo $pasos;?>");
  </script>
  -->
<?php
};

// 2- SE MUESTRA PANTALLA CERRAR SESION **************************************************************************************************************
if(@$pasos==100){
    require('02-albacon-php/02-variables-empresa.php');
    pantallaEmpresa();cerrarSesion();
?>
  <script>
    history.replaceState(null, null, "<?php echo strtolower($nombreEmpresa);?>.php?pasos=<?php echo $pasos;?>");
  </script>
<?php
};
?>
<!-- DIVISIONES DE AVISOS ***************************************************************************************************************************-->
<div id="avisoControl" name="avisoControl" class="oscurecerContenedor" style="display:none;">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAvisoControl" style="display:block;position:absolute;z-index:999;top:36%;left:31%;width:38%">
    <div id="tituloAviso" class="tituloAviso"></div>
    <div id="mensajeAviso" class="mensajeAviso"></div>
      <a href="javascript:cerrarAvisoControl();">ACEPTAR</a>
  </div>
</div><!-- FINAL avisoAutorizados *******************************************************************************************************************-->

</div><!-- FINAL DEL CONTENEDOR (PANEL PRINCIPAL)-->

</body>
</html>