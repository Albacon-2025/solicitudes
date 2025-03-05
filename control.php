<?php
session_start();
?>
<!doctype html>
<?php
// SE LLAMA A LOS ARCHIVOS NECESARIOS
require('02-albacon-php/05-variables-control.php');
require('02-albacon-php/05-funciones-control.php');


// SE CONFIGURA LA SESION
if(@$pasos==100){
  session_destroy();
  unset($UTCsesion);
  unset($pasos);
  unset($IDvigilante);
 // unset($codigoVigilante);
  unset($nombreVigilante);
  unset($apellidosVigilante);
 // unset($telefonoUsuario);
 // unset($correoUsuario);
  };
?>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <title>Control Accesos Iberia</title>
  <link rel="stylesheet" type="text/css" href="01-albacon-css/<?php echo $estiloCSS;?>" MEDIA="screen"/>
  <link rel="shortcut icon" href="05-albacon-fotos/favicon-a.ico" type="image/x-icon"/>
  <script type="text/javascript" src="03-albacon-js/jquery-3.7.0.js"></script>
  <script type="text/javascript" src="03-albacon-js/control.js"></script>
  <script type="text/javascript" src="03-albacon-js/webcam.js"></script>
</head>

<body>
<!-- ******************************************************  CABECERA  ************************************************* -->
<div id="cabecera" class="cabecera" style="background-image:url('05-albacon-fotos/01-albacon-nombre.png');">
    <h1 style="margin-top:10px;margin-bottom:6px">GESTIÓN DE ACCESOS&nbsp-&nbsp<?php echo str_replace('_',' ',@$nombreEmpresa);?> </h1>
    <h2>CONTROL DE ACCESOS</h2>
  <div class="datosCabecera">
<?php
  echo 'UTC SESION: '.@$UTCsesion;
  echo '<br>PASOS: '.@$pasos;
  echo '<br>ID VIGILANTE: '.@$IDvigilante;
  echo '<br>ESTILO WEB: '.@$estiloDeWEB;
  echo '<br>ARCHIVO ESTILO: '.$estiloCSS;
  echo '<br>NOMBRE EMPRESA: '.@$nombreEmpresa;
  //echo '<br>VIGILANTE: '.@$vigilante;
  //echo '<br>CONTRASEÑA: '.@$contrasenia;
  //echo '<br>COMPROBAR VIGILANTE: '.@$comprobarVigilante;
  //echo '<br>FECHA DE VALIDEZ: '.@$registroVigilante[8];
  echo '<br>CODIGO QR: '.@$qr;
?>
  </div>
  <div class="sesionCabecera">
    <form id="unloginVigilante" name="unloginVigilante" action="<?php echo strtolower($nombreEmpresa).'.php';?>" method="post">
      <input type="hidden" id="empresa" name="empresa" value="<?php echo $nombreEmpresa;?>"/>
      <input type="hidden" id="estiloWEB" name="estiloWEB" value="<?php echo $estiloDeWEB;?>"/>
      <input type="hidden" id="pasos" name="pasos" value="100"/>
      <button id="BTN-Unlogin" class="btnSesion">
        <?php if(@$pasos<>0 & @$pasos<>100){echo " Cerrar Sesión";}else{echo " Vigilante";}; ?>
        <img src="05-albacon-fotos/munieco.png"/>
      </button>
    </form>
      <?php
        if(@$pasos<>0 & @$pasos<>100){
          echo '<p style="font-size: 14px;margin-top:3px;">'.$nombreVigilante.' '.$apellidosVigilante.'</p>';}else{};
      ?>
  </div>
  <script>
    history.replaceState(null, null, "<?php echo strtolower($nombreEmpresa);?>.php?pasos=<?php echo $pasos;?>");
  </script>
</div><!-- FINAL DE LA CABECERA -->
<!-- ******************************************************************************************************************* -->
<!-- *****************************************************  FOOTER  **************************************************** -->
<footer id="footer">
  <table style="width:100%;margin-top:-3px;text-align:center;border-top: 1px solid rgba(10, 100, 200, 1);" cellspacing="0" cellpadding="0">
    <tr>
      <td class="tdFooter" style="border:none;">
        <form id="" action="albacon.php" method="get">
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
<div id="contenedor" class="contenedor" style="">
<!-- ////////////////////////////////////////////////////////  CONTENIDO  //////////////////////////////////////////////// -->
<?php
// 1- SE MUESTRA PANTALLA DE LOGIN  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==0 or @$pasos==1 or @$pasos==100){pantallaLoginVigilante();
?>
<script>
  history.replaceState(null, null, "control.php?&pasos=<?php echo $pasos;?>");
</script>
<?php
};

// 2- SE MUESTRA PANTALLA DE TRABAJO DE CONTROL DE ACCESOS  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==2 or @$pasos==3 or @$pasos==40){mostrarPantallaControl();};
?>
<script>
  history.replaceState(null, null, "control.php?pasos=<?php echo $pasos;?>");
</script>
<?php
// 3- SE COMPRUEBA QR ESCANEADO EN CONTROL DE ACCESOS  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

// (LA LLAMADA A MOSTRAR RESULTADO DEL CODIGO SE REALIZA DENTRO DE FUNCION MOSTRAR PANTALLA DE CONTROL)

// 4- SE ACTUALIZA LA BASE DE DATOS AÑADIENDO LA HORA DE ENTRADA  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==4){actualizaAccesoQR();mostrarPantallaControl();};

// 5- OLVIDO DE CONTRASEÑA  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==20){mostrarRestablecerContrasena();pantallaLoginVigilante();};
if(@$pasos==21){validarDatosVigilante();pantallaLoginVigilante();};
if(@$pasos==22){cambiarContrasenaOlvido();pantallaLoginVigilante();};

// 6- SE MUESTRA PANTALLA DE BUSCADOR XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==30){buscadorControl();mostrarPantallaControl();};

// 7- SE MUESTRA PANTALLA CON EL LISTADO DEL RESULTADO DEL BUSCADOR XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==31){mostarListadoAccesosControl();mostrarPantallaControl();};
if(@$pasos==32){mostrarDatosAcceso();mostrarPantallaControl();};
if(@$pasos==33){actualizaAccesoQR();mostrarPantallaControl();};

// 8- SE EJECUTA LA ACTUALIZACION DE LA BASE DE DATOS DE CONTROL DE ACCESOS (SE HARA AUTOMATICAMENTE A LAS 00:15 HORAS)  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==40){actualizarBDcontrol();};

?>
<!-- DIVISIONES DE AVISOS (solo aparece con usuario y contraseña vacio) ************************************************************************** -->
<div id="avisoControl" name="avisoControl" class="oscurecerContenedor" style="display:none;height:100%;top:0px;justify-content:center;">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAviso" style="">
    <div id="tituloAviso" class="tituloAviso"></div>
    <div id="mensajeAviso" class="mensajeAviso"></div>
      <a href="javascript:cerrarAvisoControl();">ACEPTAR</a>
  </div><!-- FINAL mostrarAviso -->
</div><!-- FINAL avisoControl -->
<!-- ********************************************************************************************************************************************* -->
</div><!-- FINAL DEL CONTENEDOR -->

<!-- XXXXXXXXXXXXXXXXXX  SE PONEN AL FINAL LOS SCRIPT JS AUNQUE ESTAN EN albacon.js PARA QUE FUNCIONEN  XXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
<script>
// CODIGO PARA VER LA CAMARA Y FIJAR SU TAMAÑO
var html5QrcodeScanner = new Html5QrcodeScanner("qr-reader", { fps: 10, qrbox: 230 });
html5QrcodeScanner.render(onScanSuccess);
// ESTILOS PARA DIV DE VIDEO
  document.getElementById('qr-reader').style.border= "2px solid rgb(5, 126, 25)";
  document.getElementById('qr-reader__dashboard_section_csr').style.position ="absolute";
  document.getElementById('qr-reader__dashboard_section_csr').style.top = "-40px";
  document.getElementById('qr-reader__dashboard_section_csr').style.left = "-10%";
  document.getElementById('qr-reader__dashboard_section_csr').style.width = "120%";
  document.getElementById('qr-reader__dashboard_section_csr').style.border = "0px solid red";
  document.getElementById('qr-reader__dashboard_section_csr').style.backgroundColor = "rgba(71, 119, 53, 0)";
  
  document.getElementById('qr-reader__scan_region').style.backgroundImage = "url('fotos-archivos/albaconQR.png')";
  document.getElementById('qr-reader__scan_region').style.width = "340px";
  document.getElementById('qr-reader__scan_region').style.height = "255px";
  document.getElementById('qr-reader__scan_region').style.textAlign = "center";

  document.getElementById('qr-reader__header_message').style.position ="absolute";
  document.getElementById('qr-reader__header_message').style.zIndex = "6";
  document.getElementById('qr-reader__header_message').style.top = "-40px";
  document.getElementById('qr-reader__header_message').style.left = "-10%";
  document.getElementById('qr-reader__header_message').style.width = "120%";
  document.getElementById('qr-reader__header_message').style.backgroundColor = "rgb(250, 250, 250, 1)";
</script>

</body>
</html>
