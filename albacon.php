<?php
session_start();
// SE LLAMA A LOS ARCHIVOS NECESARIOS
  require('02-albacon-php/01-variables-albacon.php');
  require('02-albacon-php/01-funciones-albacon.php');
?>
<!doctype html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<title>ALBACON</title>
	<link rel="stylesheet" type="text/css" href="01-albacon-css/00-estilos-albacon.css" MEDIA="screen"/>
  <link rel="shortcut icon" href="05-albacon-fotos/icon_naranja.ico" type="image/x-icon"/>
  <script type="text/javascript" src="03-albacon-js/jquery-3.7.0.js"></script>
  <script type="text/javascript" src="03-albacon-js/albacon.js"></script>
  <script type="text/javascript" src="03-albacon-js/albacon-camara.js"></script>
  <script type="text/javascript" src="03-albacon-js/albacon-webcam.js"></script>
</head>

<body>
<!-- ////////////////////////////////////////////////////////  CABECERA  ///////////////////////////////////////////////// -->
<div id="cabecera" class="cabecera" style="background-image:url('05-albacon-fotos/01-albacon-nombre.png');background-color:rgba(255,255,255,0.8);">
    <!--<h1>ALBACÓN</h1>-->
    <h1 style="text-shadow: 2px 2px 4px rgba(0,0,0,0.15);letter-spacing:-1px;"><strong>G</strong>estión de <strong>S</strong>olicitudes y <strong>C</strong>ontrol de <strong>A</strong>ccesos</h1>
<div id="datosCabecera" class="datosCabecera" style="">
<?php
  echo 'UTC SESION: '.@$UTCsesion;
  echo '<br>PASOS: '.@$pasos;
  echo '<br>EMPRESA sesion: '.@$nameEmpresa;
  echo '<br>ESTILO ELEGIDO: '.@$estiloDeWEB;

  //echo '<br>NOMBRE: '.$nombreR;
  //echo '<br>APELLIDOS: '.$apellidosR;
  echo '<br>CORREO: '.$correoR;
?>
</div>
</div>
<!-- ////////////////////////////////////////////////////////////  FOOTER  /////////////////////////////////////////////////// -->
<footer id="footer" style="">
<table style="width:100%;" cellspacing="0" cellpadding="0">
  <tr>
<!-- *************************************************************************************************************  form 1: VOLVER ************ -->
    <td class="tdFooter" style="border:none;">
	    <form id="volverAlbacon" action="albacon.php" method="post">
	      <input type="hidden" name="pasos" value="0"/>
	      <button id="inicioUno" style="margin-bottom:6px;" value="">Albacón Principal</button>
      </form>
    </td>
<!-- *************************************************************************************************************  form 2: NUEVO ************* -->	  
    <td class="tdFooter" style="">
      <form id="nuevoProyecto" action="albacon.php" method="post">
        <input type="hidden" name="pasos" value="1"/>
        <button id="inicioDos" style="margin-bottom:6px;" value="">Nuevo Proyecto</button>
      </form>
    </td>
<!-- ****************************************************************************************************************************************** -->	 
    <td class="tdFooter" style="">
        <button id="inicioTres" style="margin-bottom:6px;" value="">Contacta con Albacón</button>
    </td>
	  <td class="tdFooter" style="">
        <button id="inicioCuatro" style="margin-bottom:6px;" value="">Enlaces de interés</button>
    </td>
	  <td class="tdFooter" style="">
    <p style="font-size:12px;margin-top:0px;">Web diseñada por Alejandro Peñalba Rincón</p><p style="font-size:10px;margin-top:-14px;">© Copyright</p>
    </td>
  </tr>
</table>
</footer>
<!-- ///////////////////////////////////////////////////////  CONTENEDOR   /////////////////////////////////////////////// -->
<div id="contenedor" class="contenedor" style="background-image:url('05-albacon-fotos/fondo-07.png');background-size:cover;">
<?php
// **************************************************  CONTENIDO PHP  *********************************************************************************
// ****************************************************************************************************************************************************
// 1- SE MUESTRA PANTALLA PRINCIPAL DE LA EMPRESA  *****************************************************************************************
if(@$pasos==0){
  require('02-albacon-php/01-variables-albacon.php');
  pantallaAlbacon();
?>
  <script>
    history.replaceState(null, null, "albacon.php?pasos=<?php echo $pasos;?>");
  </script>
<?php
};
// 2- SE MUESTRA FORMULARIO DE REGISTRO  ****************************************************************************************************
if(@$pasos==1){
  require('02-albacon-php/01-variables-albacon.php');
  pantallaAlbacon();formularioRegistro();
?>
  <script>
    history.replaceState(null, null, "albacon.php?pasos=<?php echo $pasos;?>");
  </script>
<?php
};
// 3- SE PROCESA EL REGISTRO Y MUESTRA PANTALLA DE ACCESOS A LA EMPRESA  *********************************************************************
if(@$pasos==2){
  require('02-albacon-php/01-variables-albacon.php');
  procesarRegistro();
  mandarCorreo();
  //gestionarSesion();
?>
  <script>
    history.replaceState(null, null, "albacon.php?pasos=<?php echo $pasos;?>");
  </script>
<?php
};
?>
<!-- DIVISIONES DE AVISOS ***************************************************************************************************************************-->
<div id="avisoAlbacon" name="avisoAlbacon" class="oscurecerContenedor" style="display:none;">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAviso" style="">
    <div id="tituloAviso" class="tituloAviso"></div>
    <div id="mensajeAviso" class="mensajeAviso"></div>
      <a href="javascript:cerrarAvisoAlbacon();">ACEPTAR</a>
  </div>
</div><!-- FINAL avisoAutorizados *******************************************************************************************************************-->

</div><!-- FINAL DEL CONTENEDOR (PANEL PRINCIPAL)-->


<!-- ////////////////////////////////////  SOBRAAAAAAAS   /////////////////////////////////////  -->
<!--
// 2- SE MUESTRA PANTALLA CERRAR SESION ******************************************************************************************************
if(@$pasos==100){
    require('02-albacon-php/01-variables-albacon.php');
    cerrarSesion();
};
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// CUARTA FUNCION: GESTIONAR SESION
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function gestionarSesion(){
  //session_start();

  // Destruir todas las variables de sesión.
  session_unset();
  
  // Finalmente, destruir la sesión.
  session_destroy();
  
  // Redirigir a la página de destino.
  //header("Location: albacon.php");
  exit;

};

// SE CONFIGURA LA SESION
/*
  if(@$pasos==0){
    unset($nameEmpresa);
    session_destroy();
    unset($UTCsesion);
    unset($pasos);
};
*/

-->
</body>
</html>