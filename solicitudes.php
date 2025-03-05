<?php
session_start();
?>
<!doctype html>
<?php
// SE LLAMA A LOS ARCHIVOS NECESARIOS
header('Content-type: text/html; charset=utf-8');
require('02-albacon-php/04-variables-solicitudes.php');
require('02-albacon-php/04-funciones-solicitudes.php');
// SE CONFIGURA LA SESION
if(@$pasos==100){
  //session_destroy();
  unset($UTCsesion);
  unset($pasos);
  unset($accion);
  unset($IDusuario);
  unset($codigoSolicitante);
  unset($nombreUsuario);   
  unset($apellidosUsuario);
  unset($telefonoUsuario);
  unset($correoUsuario);
  };
?>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="refresh">
  <meta name="description" content="Página destinada a externalizar el trabajo de control de accesos realizado por vigilantes de seguridad en edificios de empresas públicas y privadas. Agilizar autorizaciones de acceso a edificios. Seguridad privada.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<title>Solicitudes Accesos <?php echo @$nombreEmpresa;?></title>
	<link rel="stylesheet" type="text/css" href="01-albacon-css/<?php echo $estiloCSS;?>" MEDIA="screen"/>
    <link rel="shortcut icon" href="05-albacon-fotos/favicon-v.ico" type="image/x-icon"/>
  <!-- SE INCLUYEN ARCHIVOS JAVASCRIPT -->
    <script type="text/javascript" src="03-albacon-js/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="03-albacon-js/solicitudes.js"></script>
</head>

<body>
<!-- ////////////////////////////////////////////////////////  CABECERA  ///////////////////////////////////////////////// -->
<div id="cabecera" class="cabecera" style="background-image:url('05-albacon-fotos/01-albacon-nombre.png');background-repeat:no-repeat;
  background-position:left center;">
    <h1 style="margin-top:10px;margin-bottom:6px">GESTIÓN DE ACCESOS&nbsp-&nbsp<?php echo str_replace('_',' ',@$nombreEmpresa);?> </h1>
    <h2>SOLICITUDES DE ACCESOS</h2>
  <div class="datosCabecera">
<?php
    //echo $contrasena;
    echo 'UTC SESION: '.@$UTCsesion;
    //echo '<br>SESION: '.@$finSesion;
    echo '<br>PASOS: '.@$pasos;
    echo '<br>ACCION: '.@$accion;
    echo '<br>CORREO ENVIADO: '.$correoEnviado;
    echo '<br>ESTILO WEB: '.@$estiloDeWEB;
    echo '<br>ARCHIVO ESTILO: '.$estiloCSS;
    echo '<br>NOMBRE EMPRESA: '.@$nombreEmpresa;
    //echo '<br>CORREO DESTINATARIO: '.@$correoDestinatario;
    //echo '<br>ID SOLICITANTE: '.@$IDusuario;
    //echo '<br>CORREO SOLICITANTE: '.@$correoUsuario;
    //echo '<br>Código Solicitante: '.@$codigoSolicitante;
    //echo '<br>Destinatario: '.@$correoDestinatario;
    //echo '<br>CC: '.@$conCopia;
    //echo '<br>CCO: '.@$conCopiaOculta;
    //echo '<br>Variable BORRAR: '.$borrar;
    //echo '<br>Variable ORDENAR: '.$ordenar;
    echo '<br>Variable COMPROBAR USUARIO: '.$comprobarUsuario;
    //echo '<br>Variable CANCELAR SOLICITUD: '.$cancelarSolicitud;
    //echo '<br>Variable ENTRADA DE DATOS: '.$entradaDatos;
    //echo '<br>Responsable: '.$igualSolicitante;
    //echo '<br>Validez: '.$caducado;
    //echo '<p style="font-size: 15px;padding-bottom:0.5%;text-align:left;"><strong>Nº accesos enviados:&nbsp&nbsp</strong>'.$contadorFilas.'</p>'; 
    //echo '<br>Nº Solicitudes: '.$numSolicitudes.'<br>Edificio: '.$edificioVisita.'<br>Datos: '.$entradaDatos.'<br>Responsable: '.$igualSolicitante.'<br>';
    //echo '<br>Datos excel: '; print(@$datosExcel);
    //echo '<br>New QR: '.@$inputQR;
    //echo '<br>Resp QR: '.@$inputIDResp;
      //$inputNombre = ucfirst($inputNombre);
      //$inputApellidos = ucwords(@$inputApellidos);
    //echo '<br>'.$inputNombre.' '.$inputApellidos.' - '.$inputEmpresa;
    echo '<br>ID RESPONSABLE: '.@$IDresponsable;
    echo '<br>RESPONSABLE: '.@$nombreResponsable.' '.utf8_encode(@$apellidosResponsable);
    echo '<br>CORREO RESPONSABLE: '.@$correoResponsable;
    //echo '<br>TELEFONO RESPONSABLE: '.@$telefonoResponsable;
    //echo '<br>INPUT ID_RESPONSABLE: '.$inputIDResp;
?>
  </div>
  <div class="sesionCabecera"><!-- Inicio div sesionCabecera -->
    <form id="unloginUsuario" name="unloginUsuario" action="<?php echo strtolower($nombreEmpresa).'.php';?>" method="get">
      <input type="hidden" id="empresa" name="empresa" value="<?php echo $nombreEmpresa;?>"/>
      <input type="hidden" id="estiloWEB" name="estiloWEB" value="<?php echo $estiloDeWEB;?>"/>
      <input type="hidden" id="pasos" name="pasos" value="100"/>
      <button id="BTN-Unlogin" class="btnSesion">
        <?php 
          if((@$pasos<>0 & @$pasos<>16 & @$pasos<>17 & @$pasos<>19 & @$pasos<>100)&(@$IDusuario<>"")){echo " Cerrar Sesión";}else{if((@$pasos==16 & @$correoDestinatario=='')||(@$pasos==17 & @$correoDestinatario=='')||(@$pasos==19 & @$correoDestinatario=='')){echo " Cerrar Sesión";}else{echo " Solicitante";};};
        ?>
        <img src="05-albacon-fotos/munieco.png"/>
      </button>
    </form>
    <?php
      if(@$pasos<>0 & @$pasos<>100 & @$pasos<>16 & @$pasos<>17 & @$pasos<>19){echo '<p style="font-size: 14px;margin-top:3px;">'.$nombreUsuario.' '.$apellidosUsuario.'</p>';}else{};
      if((@$pasos==16 & @$correoDestinatario=='')||(@$pasos==17 & @$correoDestinatario=='')||(@$pasos==19 & @$correoDestinatario=='')){echo '<p style="font-size: 14px;margin-top:3px;">'.$nombreUsuario.' '.$apellidosUsuario.'</p>';}else{};
      //echo '<br>Variable de sesion: '.@session_id();
    ?>
  </div>
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
<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX  CONTENIDO: MOSTRAR LAS DIFERENTES PANTALLAS DEPENDIENDO DEL AVANCE EN EL PROCESO XXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
<div id="contenedor" class="contenedor" style="">
<?php
// 1- SE MUESTRA PANTALLA DE LOGIN  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if((@$pasos==0||@$pasos==1||@$pasos==100)){pantallaLoginUsuario();@$correoEnviado = $_SESSION['correoEnviado'] = 1;
?>
  <script>
    history.replaceState(null, null, "solicitudes.php?pasos=<?php echo $pasos;?>");
  </script>
<?php
};
if(@$pasos==200){cambiarContrasena();pantallaLoginUsuario();};
if(@$pasos==201){mostrarRestablecerContrasena();pantallaLoginUsuario();};
if(@$pasos==202){validarDatosAutorizado();pantallaLoginUsuario();};
if(@$pasos==203){cambiarContrasenaOlvido();pantallaLoginUsuario();};

// 2- SE MUESTRA ENTRADA DE DATOS INICIALES  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==2||(@$pasos==15& @$correoDestinatario <>'')){mostrarPrimerosDatos();
  ?>
  <script>
  history.replaceState(null, null, "solicitudes.php?pasos=<?php echo $pasos;?>");
</script>
<?php
};

// 3- SI HAY MAS DE UNA COINCIDENCIA SE MUESTRA LISTADO DE RESPONSABLES Y SI ES ENTRADA DE DATOS MANUAL O POR EXCEL XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==5 & $comprobarUsuario==9 & $entradaDatos=='excel' & $igualSolicitante=='si'){mostrarEntradaExcel();
?>
  <script>
    history.replaceState(null, null, "solicitudes.php?pasos=<?php echo $pasos;?>");
  </script>
<?php


};
if(@$pasos==5 & $comprobarUsuario==9 & $entradaDatos=='manual' & $igualSolicitante=='si'){mostrarEntradaManual();};
if(@$pasos==5 & $comprobarUsuario==9 & $entradaDatos=='excel' & $igualSolicitante<>'si'){mostrarEntradaExcel();validarResponsable();};
if(@$pasos==5 & $comprobarUsuario==9 & $entradaDatos=='manual' & $igualSolicitante<>'si'){validarResponsable();mostrarEntradaManual();};
if(@$pasos==5 & $comprobarUsuario==10 & $entradaDatos=='excel' & $igualSolicitante<>'si'){mostrarEntradaExcel();};
if(@$pasos==5 & $comprobarUsuario==10 & $entradaDatos=='manual' & $igualSolicitante<>'si'){mostrarEntradaManual();};

// 3.1 - SE MUESTRA MENSAJE DE ERRORES  ---------------------------------------------------------------------------------------------------------------
if(@$pasos==5 & $caducado=='si' & $entradaDatos=='excel'){mostrarDatosAccesos();mostrarAvisoResponsable();};
if(@$pasos==5 & $caducado=='si' & $entradaDatos=='manual'){mostrarAvisoResponsable();};

// 4- SE PROCESAN LOS DATOS INTRODUCIDOS DESDE EXCEL Y SE MUESTRAN  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==6){validarNumSolicitudes();
}else{}; // Si el NUMERO de accesos coincide se ejecuta el procesado de los datos desde excel

// 5- SE PROCESAN LOS DATOS INTRODUCIDOS DE FORMA MANUAL Y SE MUESTRAN  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==7){procesarManual();mostrarDatosAccesos();mostrarTablaAccesos();}else{};

// 6- SE MUESTRA LA FILA ELEGIDA PARA EDITAR EL ACCESO  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==8){mostrarEditarAcceso($editar,$codigoSolicitante);};

// 7- SE ACTUALIZA EL ACCESOS ELEGIDO LA BASE "acceos_Temp" Y SE MUESTRA LA TABLA DE ACCESOS ACTUALIZADA  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==9){actualizarAccesos($editar,$codigoSolicitante);mostrarDatosAccesos();mostrarTablaAccesos();};

// 8- SE MUESTRA LA FILA ELEGIDA PARA BORRAR EL ACCESO XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==10){mostrarBorrarAcceso($borrar,$codigoSolicitante);};
if(@$pasos==11){mostrarBorrarAcceso($borrar,$codigoSolicitante);mostrarAvisoUltimoAcceso();};

// 9- SE BORRA EL ACCESO ELEGIDO DE LA BASE "accesos_Temp" Y SE MUESTRA LA TABLA DE ACCESOS ACTUALIZADA Y ORDENADA XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==12 & $ultimoAcceso<>1){borrarAccesos01($borrar,$codigoSolicitante);mostrarDatosAccesos();mostrarTablaAccesos();};
if(@$pasos==12 & $ultimoAcceso==1){mostrarDatosAccesos();mostrarTablaAccesos();};
if(@$pasos==2 & $ultimoAcceso==1){borrarAccesos01($borrar,$codigoSolicitante);};

// 10- SE BORRAN LOS DATOS DE LA BASE TEMPORAL CADA VEZ QUE SE CANCELA SOLICITUD XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if($cancelarSolicitud=='SI'){borrarBaseTemp($codigoSolicitante);};

// 11- SE PASAN LOS DATOS DE LA BASE TEMPORAL A LA BASE PUENTE, SE CREAN LOS CODIGOS QR, EL ARCHIVO PDF Y SE MUESTRA PANTALLA DE ENVIO XXXXXXXXXXXXXXXXX
if(@$pasos==13){pasarAccesos();generarPDF($codigoSolicitante);mostrarCorreo();}else{};

// 12- SE ENVIA EL CORREO Y SE BORRAN LOS DATOS DE LA BD accesos_temp, LOS QR'S Y EL ARCHIVO PDF (CERRANDO LA SESION) XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==16 & @$correoDestinatario<>''){pantallaLoginUsuario();mandarCorreo();
  //session_destroy();
  unset($UTCsesion);
  unset($pasos);
  unset($accion);
  unset($IDusuario);
  unset($codigoSolicitante);
  unset($nombreUsuario);   
  unset($apellidosUsuario);
  unset($telefonoUsuario);
  unset($correoUsuario);
  unset($correoEnviado);
  @$correoEnviado=$_SESSION['correoEnviado'] = 1;}
elseif(@$pasos==16 & @$correoDestinatario==''){mostrarCorreo();avisoSinDestinatario();}else{};

// 13- SE ENVIA EL CORREO Y SE BORRAN LOS DATOS DE LA BD accesos_temp, LOS QR'S Y EL ARCHIVO PDF (SIN CERRAR SESION) XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
if(@$pasos==15 & @$correoDestinatario<>''){mandarCorreo();
  unset($UTCsesion);
  @$UTCsesion = $_SESSION['UTCsesion'] = time();
  @$codigoSolicitante = $_SESSION['codigoSolicitante']= $IDusuario.'-'.$UTCsesion;
  unset($correoEnviado);
  @$correoEnviado=$_SESSION['correoEnviado'] = 1;}
elseif(@$pasos==15 & @$correoDestinatario==''){mostrarCorreo();avisoSinDestinatario();}else{};

// 14- SE MUESTRA EL BUSCADOR PARA EDITAR O PARA BORRAR ACCESOS SOLICITADOS ANTERIORMENTE POR ESE MISMO SOLICITANTE
if(@$pasos==3||@$pasos==4){mostrarBuscadorAccesos();pantallaLoginUsuario();}else{};

// 15- SE MUESTRA PANTALLA DE IDENTIFICACION OK SI SE CANCELA EL BUSCADOR O SE CANCELA PRIMEROS DATOS
if(@$pasos==1&(@$accion==1||@$accion==2||@$accion==3)){identificacionOK();}else{};

// 16- SE REALIZA BUSQUEDA  DE ACUERDO A LA SELECCION DEL USUARIO
if(@$pasos==301){buscador();}else{};

// 17- SE REALIZA LA ACTUALIZACION DEL ACCESO SELECCIONADO POR EL USUARIO Y SE MUESTRA PANTALLA DE ENVIO CORREO, O AVISO DE ERROR SI HAY INPUTS VACIOS
//  ACTUALIZAR --------

if(@$pasos==302 & ($inputDNI==''||$inputNombre==''||$inputApellidos==''||$inputEmpresa==''||$inputVehiculo==''||$inputFechaInicial==''||
$inputFechaFinal==''||$inputMotivo==''||$inputEdificio==''||$inputObservaciones=='')){inputActualizarVacio();};

if(@$pasos==302 & ($inputDNI<>''&$inputNombre<>''&$inputApellidos<>''&$inputEmpresa<>''&$inputVehiculo<>''&$inputFechaInicial<>''&
$inputFechaFinal<>''&$inputMotivo<>''&$inputEdificio<>''&$inputObservaciones<>'')){procesarActualizar();mostrarCorreo();};

/*
if(@$pasos==302 & ($inputDNI==''||$inputNombre==''||$inputApellidos==''||$inputEmpresa==''||$inputVehiculo==''||$inputFechaInicial==''||
$inputFechaFinal==''||$inputMotivo==''||$inputEdificio==''||$inputObservaciones=='')){inputActualizarVacio();};

if(@$pasos==302 & ($inputDNI<>''&$inputNombre<>''&$inputApellidos<>''&$inputEmpresa<>''&$inputVehiculo<>''&$inputFechaInicial<>''&
$inputFechaFinal<>''&$inputMotivo<>''&$inputEdificio<>''&$inputObservaciones<>'')){validarFechas(@$fechaInicial,@$fechaFinal);
//  procesarActualizar();mostrarCorreo();
}else{};

if(@$pasos==302 & ($inputDNI<>''&$inputNombre<>''&$inputApellidos<>''&$inputEmpresa<>''&$inputVehiculo<>''&$inputFechaInicial<>''&
$inputFechaFinal<>''&$inputMotivo<>''&$inputEdificio<>''&$inputObservaciones<>'')){
  procesarActualizar();mostrarCorreo();
}else{};
*/

//  ANULAR ------------
if(@$pasos==303 & ($inputDNI==''||$inputNombre==''||$inputApellidos==''||$inputEmpresa==''||$inputVehiculo==''||$inputFechaInicial==''||
$inputFechaFinal==''||$inputMotivo==''||$inputEdificio==''||$inputObservaciones=='')){inputActualizarVacio();};

if(@$pasos==303 & ($inputDNI<>''&$inputNombre<>''&$inputApellidos<>''&$inputEmpresa<>''&$inputVehiculo<>''&$inputFechaInicial<>''&
$inputFechaFinal<>''&$inputMotivo<>''&$inputEdificio<>''&$inputObservaciones<>'')){procesarAnular();mostrarCorreo();};




//if(@$pasos==303){procesarAnular();mostrarCorreo();}else{};
//if(@$pasos==303 & ($inputDNI||$inputNombre||$inputApellidos||$inputEmpresa||$inputVehiculo||$inputFechaInicial||
//$inputFechaFinal||$inputMotivo||$inputEdificio||$inputObservaciones)<>''){procesarAnular();mostrarCorreo();}else{inputActualizarVacio();};


// 18- SE MANDA CORREO CON QR ACTUALIZADO, O ACCESO ANULADO Y SE CIERRA LA SESION
if(@$pasos==17 & @$correoDestinatario<>''){pantallaLoginUsuario();mandarCorreo01();
  //session_destroy();
  unset($UTCsesion);
  unset($pasos);
  unset($accion);
  unset($IDusuario);
  unset($codigoSolicitante);
  unset($nombreUsuario);   
  unset($apellidosUsuario);
  unset($telefonoUsuario);
  unset($correoUsuario);
  //unset($IDResponsable);
  unset($correoEnviado);
  @$correoEnviado=$_SESSION['correoEnviado'] = 1;}
elseif(@$pasos==17 & @$correoDestinatario==''){mostrarCorreo();avisoSinDestinatario();}else{};

// 19- SE ENVIA EL CORREO CON QR ACTUALIZADO, O ACCESO ANULADO Y CONTINUA LA SESION
if(@$pasos==18 & @$correoDestinatario<>''){mandarCorreo01();pantallaLoginUsuario();identificacionOK();
  unset($UTCsesion);
  @$UTCsesion = $_SESSION['UTCsesion'] = time();
  @$codigoSolicitante = $_SESSION['codigoSolicitante']= $IDusuario.'-'.$UTCsesion;
  unset($correoEnviado);
  @$correoEnviado=$_SESSION['correoEnviado'] = 1;}
elseif(@$pasos==18 & @$correoDestinatario==''){mostrarCorreo();avisoSinDestinatario();}else{};

// 20- MOSTRAR AVISO CUANDO SE ACTUALIZA ACCESO CON INPUT VACIOS

//};// FIN DEL ELSE SI O HAY INPUTS VACIOS
?>
<!-- DIVISION DE AVISOS *******************************************************************************************************************-->
<div id="avisoSolicitudes" name="avisoSolicitudes" class="oscurecerContenedor" style="display:none;top:15%;height:80.2%;">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAviso" style="">
    <div id="tituloAviso" class="tituloAviso"></div>
    <div id="mensajeAviso" class="mensajeAviso"></div>
      <a href="javascript:cerrarAvisoSolicitudes();">ACEPTAR</a>
  </div><!-- FINAL mostrarAviso -->
</div><!-- FINAL avisoSolicitudes -->
<!-- **************************************************************************************************************************************-->
 
<!-- DIVISION DE AVISO PARA FUNCION ACTUALIZAR Y BORRAR ACCESOS ***************************************************************************-->
<div id="avisoSolicitudes2" name="avisoSolicitudes" class="oscurecerContenedor" style="display:none;top:15%;height:80.2%;">
  <div id="mostrarAviso2" name="mostrarAviso" class="mostrarAviso">
    <div id="tituloAviso2" class="tituloAviso"></div>
    <div id="mensajeAviso2" class="mensajeAviso"></div>
      <a href="javascript:cerrarAvisoSolicitudes2();">ACEPTAR</a>
  </div><!-- FINAL mostrarAviso -->
</div><!-- FINAL avisoSolicitudes -->
<!-- **************************************************************************************************************************************-->

</div><!-- Final div "contenedor" -->
</body>
</html>