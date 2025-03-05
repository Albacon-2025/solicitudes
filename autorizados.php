<?php
session_start();
?>
<!doctype html>
<?php
// SE LLAMA A LOS ARCHIVOS NECESARIOS
header('Content-type: text/html; charset=utf-8');
require('02-albacon-php/03-variables-autorizados.php');
require('02-albacon-php/03-funciones-autorizados.php');
// SE CONFIGURA LA SESION
if(@$pasos==100){
  session_destroy();
  unset($UTCsesion);
  unset($pasos);
  unset($IDgestor);
  unset($codigoGestor);
  unset($nombreGestor);
  unset($apellidosGestor);
  unset($nominaGestor);   
  unset($telefonoGestor);
  unset($correoGestor);
  unset($correoEnviado);
  };
?>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="refresh">
  <meta name="description" content="Página destinada a externalizar el trabajo de control de accesos realizado por vigilantes de seguridad en edificios de empresas públicas y privadas. Agilizar autorizaciones de acceso a edificios. Seguridad privada.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<title>Autorizados Iberia</title>
		<link rel="stylesheet" type="text/css" href="accesos-archivos/00-albacon-estilos.css" MEDIA="screen"/>
    <link rel="shortcut icon" href="fotos-archivos/favicon-n.ico" type="image/x-icon"/>
  <!-- SE INCLUYEN ARCHIVOS JAVASCRIPT -->
    <script type="text/javascript" src="js-archivos/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="js-archivos/albacon-autorizados.js"></script>


</head>
<body>
<!-- ////////////////////////////////////////////////////////  CABECERA  ///////////////////////////////////////////////// -->
<div id="cabecera" class="cabecera"><!-- Inicio div cabecera -->
  <div class="logoCabecera"><!-- Inicio div logCabecera -->
    <img id="logoIberia" src="fotos-archivos/Iberia/logo-IBERIA.png" alt="Logo Iberia"/>
  </div>
  <div class="tituloCabecera"><!-- Inicio div tituloCabecera -->
    <img id="nombreIberia" src="fotos-archivos/Iberia/Nombre-IBERIA.png" alt="Logo Iberia"/>
    <h1 style="margin-top:-2px;margin-left:4px;color:rgb(224, 23, 50);border:0px solid rgb(224, 23, 50, 1);">INSTALACIONES DE IBERIA "LA MUÑOZA"</h1>
  </div>
  <div class="datosCabecera"><!-- Inicio div datosCabecera -->
<?php
    echo 'Variable UTC: '.@$UTCsesion;
    echo '<br>Variable PASOS: '.@$pasos;
    echo '<br>CORREO ENVIADO: '.@$correoEnviado;
    echo '<br>Variable ACCION: '.@$accion;
    //echo '<br>Variable ID GESTOR: '.@$IDgestor;
    //echo '<br>Variable COMPROBAR GESTOR: '.@$comprobarGestor;
    echo '<br>Nómina GESTOR: '.@$nominaGestor;
    echo '<br>Código GESTOR: '.@$codigoGestor;
    //echo '<br>TELEFONO GESTOR: '.@$telefonoGestor;
    //echo '<br>CORRREO GESTOR: '.@$correoGestor;
    //echo '<br>Variable COMPROBAR RESPONSABLE: '.@$comprobarResponsable;
	  //echo '<br>variable Nº REGISTROS: '.@$numRegistros;
    //echo '<br>Variable ENTRADA DE DATOS: '.$entradaDatos;
    //echo '<br>Datos excel: '.$autorizadosDatos;// print(@$datosExcel);
	  //echo '<br>Variable CANCELAR SOLICITUD: '.$cancelarSolicitud;
	  //echo '<br>Variable BORRAR: '.$borrar;
    //echo '<br>Variable ORDENAR: '.$ordenar;
    //echo '<br>';
    //print_r($manualNombre);
    //echo '<br>';
    //print_r($datosManuales01);
    
    //echo '<br>CORREO DESTINATARIO: '.@$correoDestinatario;
    //echo '<br>ID SOLICITANTE: '.@$IDusuario;
    //echo '<br>CORREO SOLICITANTE: '.@$correoUsuario;
    //echo '<br>ID RESPONSABLE: '.@$IDresponsable;
    //echo '<br>NOMINA DEL RESPONSABLE: '.@$nominaResponsableAutorizacion;
    echo '<br>CORREO DEL RESPONSABLE: '.@$correoResponsableAutorizacion;
    //echo '<br>Código Solicitante: '.@$codigoSolicitante;
    //echo '<br>Destinatario: '.@$correoDestinatario;
    //echo '<br>CC: '.@$conCopia;
    //echo '<br>CCO: '.@$conCopiaOculta;
    //echo '<br>Variable BORRAR: '.$borrar;
    //echo '<br>Variable ORDENAR: '.$ordenar;
    //echo '<br>Variable COMPROBAR USUARIO: '.$comprobarUsuario;
    //echo '<br>Variable CANCELAR SOLICITUD: '.$cancelarSolicitud;
    //echo '<br>Variable ENTRADA DE DATOS: '.$entradaDatos;
    //echo '<br>Responsable: '.$igualSolicitante;
    //echo '<br>Validez: '.$caducado;
    //echo '<p style="font-size: 15px;padding-bottom:0.5%;text-align:left;"><strong>Nº accesos enviados:&nbsp&nbsp</strong>'.$contadorFilas.'</p>'; 
    //echo '<br>Nº Solicitudes: '.$numSolicitudes.'<br>Edificio: '.$edificioVisita.'<br>Datos: '.$entradaDatos.'<br>Responsable: '.$igualSolicitante.'<br>';
    //echo '<br>Datos excel: '; print(@$datosExcel);
?>
  </div>
  <div class="sesionCabecera"><!-- Inicio div sesionCabecera -->
    <form id="unloginGestor" name="unloginGestor" action="autorizados.php" method="get">
      <input type="hidden" id="pasos" name="pasos" value="100"/>
      <button id="BTN-Unlogin" class="btnSesion">
        <?php 
          if((@$pasos<>0 & @$pasos<>16 & @$pasos<>17 & @$pasos<>19 & @$pasos<>100)&(@$IDgestor<>"")){echo " Cerrar Sesión";}else{if((@$pasos==16 & @$correoDestinatario=='')||(@$pasos==17 & @$correoDestinatario=='')||(@$pasos==19 & @$correoDestinatario=='')){echo " Cerrar Sesión";}else{echo " Gestor";};};
          //if(@$pasos<>0 & @$pasos<>16 & @$pasos<>100){echo " Cerrar Sesión";}else{if(@$pasos==16 & @$correoDestinatario==''){echo " Cerrar Sesión";}else{echo " Gestor";};};
        ?>
        <img src="fotos-archivos/munieco.png"/>
      </button>
    </form>
    <?php
      if(@$pasos<>0 & @$pasos<>100 & @$pasos<>16){echo '<p style="font-size: 14px;margin-top:3px;">'.utf8_decode($nombreGestor).' '.utf8_decode($apellidosGestor).'</p>';}else{};
      if(@$pasos==16 & @$correoDestinatario==''){echo '<p style="font-size: 14px;margin-top:3px;">'.utf8_decode($nombreGestor).' '.utf8_decode($apellidosGestor).'</p>';}else{};
      //echo '<br>Variable de sesion: '.@session_id();
    ?>
  </div>
  </div><!-- FINAL DE LA CABECERA -->
?>
<!-- /////////////////////////////////////////////////////////  FOOTER  ////////////////////////////////////////////////// -->
<footer id="footer">
    <img id="logoAlbacon" src="fotos-archivos/Albacon-nombre.png" style="width:18%;margin-top:3px;padding-left:8px;" alt="Logo Albacón"/>
		<p style="font-size:9px;margin-top:-12px;padding-left:42px;"><strong>© Copyright</strong></p>
		<p style="font-size:11px;margin-top:-8px;padding-left:10px;"><strong>Web diseñada por Alejandro Peñalba Rincón
    <br>albacon@hotmail.es</strong></p>
</footer>
<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX  CONTENIDO: MOSTRAR LAS DIFERENTES PANTALLAS DEPENDIENDO DEL AVANCE EN EL PROCESO XXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
<div id="contenedor" class="contenedor" style="overflow-y: auto;overflow-x: none;"><!-- Inicio div "contenedor -->
<!-- ESTE ES EL SCRIPT PARA CARACTERES PERMITIDOS EN LOS INPUT'S TEXT -->
<script>
// Función para agregar un nuevo input de texto dinámicamente
  document.getElementById('agregarInput').addEventListener('click', () => {
    const nuevoInput = document.createElement('input');
  nuevoInput.type = 'text';
  nuevoInput.placeholder = 'Escribe aquí';
  document.getElementById('contenedorInputs').appendChild(nuevoInput);
  });
// Aquí iría el código de la función permitirCaracteresEspecificos y mostrarError
// (el que te proporcioné arriba)
</script>
<?php

// 1- SE MUESTRA PANTALLA DE LOGIN  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if((@$pasos==0 or @$pasos==1 or @$pasos==100)){pantallaLoginGestor();@$correoEnviado = $_SESSION['correoEnviado'] = 1;};

if(@$pasos==200){cambiarContrasena();pantallaLoginGestor();};
if(@$pasos==201){mostrarRestablecerContrasena();pantallaLoginGestor();};
if(@$pasos==202){validarDatosGestor();pantallaLoginGestor();};
if(@$pasos==203){cambiarContrasenaOlvido();pantallaLoginGestor();};

// 2- SE MUESTRA ENTRADA DE DATOS INICIALES  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==2&@$accion<>2){formularioPrevio();};

// 3- SI HAY MAS DE UNA COINCIDENCIA SE MUESTRA LISTADO DE RESPONSABLES Y SI ES ENTRADA DE DATOS MANUAL O POR EXCEL XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==5 & $comprobarResponsable==0 & $entradaDatos=='excel' & $igualGestor=='si'){procesarCodigoGestor();autorizadosEntradaExcel();};
if(@$pasos==5 & $comprobarResponsable==0 & $entradaDatos=='manual' & $igualGestor=='si'){procesarCodigoGestor();autorizadosEntradaManual();};

if(@$pasos==5 & $comprobarResponsable==0 & $entradaDatos=='excel' & $igualGestor<>'si'){procesarCodigoGestor();autorizadosEntradaExcel();validarResponsableAutorizacion();};
if(@$pasos==5 & $comprobarResponsable==0 & $entradaDatos=='manual' & $igualGestor<>'si'){procesarCodigoGestor();validarResponsableAutorizacion();autorizadosEntradaManual();};

if(@$pasos==5 & $comprobarResponsable==1 & $entradaDatos=='excel' & $igualGestor<>'si'){procesarCodigoGestor();autorizadosEntradaExcel();};
if(@$pasos==5 & $comprobarResponsable==1 & $entradaDatos=='manual' & $igualGestor<>'si'){procesarCodigoGestor();autorizadosEntradaManual();};

// 3.1- SE MUESTRA MENSAJE DE ERRORES  ---------------------------------------------------------------------------------------------------------------
if(@$pasos==5 & $caducado=='si' & $entradaDatos=='excel'){avisoResponsableAutorizacion();};
if(@$pasos==5 & $caducado=='si' & $entradaDatos=='manual'){avisoResponsableAutorizacion();};

// 4- CASOS PARA BORRAR FILA DE CODIGO DE GESTOR  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==2 & $comprobarResponsable==''){borrarCodigoGestor();};
if(@$pasos==2 & $comprobarResponsable=='1'){borrarCodigoGestor();};

// 5- SE PROCESAN LOS DATOS INTRODUCIDOS DE FORMA MANUAL Y SE MUESTRA PANTALLA DE ENVIO CORREO  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==7){autorizadosProcesarManual();}else{};

// 4- SE PROCESAN LOS DATOS INTRODUCIDOS DESDE EXCEL Y SE MUESTRA PANTALLA DE ENVIO CORREO  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==6){validarNumRegistros();
}else{}; // Si el NUMERO de accesos coincide se ejecuta el procesado de los datos desde excel

// 6- SE ENVIA EL CORREO DE CONFIRMACION DEL REGISTRO Y SE FINALIZA SESION  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==15){mandarCorreos();pantallaLoginGestor();
  //session_destroy();
  unset($UTCsesion);
  unset($pasos);
  unset($accion);
  unset($IDgestor);
  unset($codigoGestor);
  unset($nombreGestor);   
  unset($apellidosGestor);
  unset($nominaGestor);
  unset($telefonoGestor);
  unset($correoGestor);
  unset($correoEnviado);
  @$correoEnviado=$_SESSION['correoEnviado'] = 1;
}else{};

// 7- SE ENVIA EL CORREO DE CONFIRMACION DEL REGISTRO Y SE CONTINUA CON LA SESION  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==16){mandarCorreos();pantallaLoginGestor();identificacionGestorOK();
  unset($UTCsesion);
  @$UTCsesion = $_SESSION['UTCsesion'] = time();
  @$codigoGestor = $_SESSION['codigoGestor']= $IDgestor.'-'.$UTCsesion;
  unset($correoUsuario);
  @$correoEnviado=$_SESSION['correoEnviado'] = 1;
}else{};

// 8- SE MUESTRA EL BUSCADOR PARA EDITAR O PARA ANULAR AUTORRIZADOS REGISTRADOS ANTERIORMENTE POR ESE MISMO SOLICITANTE
if((@$pasos==3||@$pasos==4)&(@$accion==2||@$accion==3)){mostrarBuscadorAutorizados();pantallaLoginGestor();}else{};

// 9- SE REALIZA BUSQUEDA  DE ACUERDO A LA SELECCION DEL USUARIO
if(@$pasos==301){buscarAutorizado();}else{};

// 10- SE MUESTRAN LOS DATOS DEL AUTORIZADO SELECCIONADO PARA ACTUALIZAR
if(@$pasos==302){actualizarAutorizado();}else{};

// 11- SE MUESTRAN LOS DATOS DEL AUTORIZADO SELECCIONADO PARA ACTUALIZAR
if(@$pasos==303){procesarActualizarAutorizado();pantallaLoginGestor();}else{};

// 12- SE MUESTRAN LOS DATOS DEL AUTORIZADO SELECCIONADO PARA ACTUALIZAR
if(@$pasos==304){procesarAnularAutorizado();pantallaLoginGestor();}else{};

// 12- SE MUESTRAN LOS DATOS DEL AUTORIZADO SELECCIONADO PARA ACTUALIZAR
if(@$pasos==305){procesarAltaAutorizado();pantallaLoginGestor();}else{};

// 13- SE MUESTRA PANTALLA DE IDENTIFICACION OK SI SE CANCELA EL BUSCADOR O SE CANCELA PRIMEROS DATOS
if(@$pasos==1&(@$accion==1||@$accion==2||@$accion==3)){identificacionGestorOK();}else{};

?>
<!-- DIVISIONES DE AVISOS *****************************************************************************************************************-->
<div id="avisoAutorizados" name="avisoAutorizados" class="oscurecerContenedor" style="display:none;">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAvisoAutorizados" style="display:block;position:absolute;z-index:999;top:36%;left:31%;width:38%">
    <div id="tituloAviso" class="tituloAviso"></div>
    <div id="mensajeAviso" class="mensajeAviso"></div>
      <a href="javascript:cerrarAvisoAutorizados();">ACEPTAR</a>
  </div><!-- FINAL mostrarAviso -->
</div><!-- FINAL avisoAutorizados -->

 <!-- DIVISION DE AVISO PARA FUNCION ACTUALIZAR Y BORRAR ACCESOS ***************************************************************************-->
<div id="avisoAuturizados2" name="avisoAutotizados2" class="oscurecerContenedor" style="display:none;">
  <div id="mostrarAviso2" name="mostrarAviso" class="mostrarAviso" style="display:block;position:absolute;z-index:999;top:36%;left:31%;width:38%">
    <div id="tituloAviso2" class="tituloAviso"></div>
    <div id="mensajeAviso2" class="mensajeAviso"></div>
      <a href="javascript:cerrarAvisoSolicitudes2();">ACEPTAR</a>
  </div><!-- FINAL mostrarAvisoAutorizados2 -->
</div><!-- FINAL autorizados2 -->
<!-- **************************************************************************************************************************************-->
</div><!-- Final div "contenedor" -->


</body>
</html>

