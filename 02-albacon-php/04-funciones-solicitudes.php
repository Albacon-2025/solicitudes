<?php
/*
LISTADO DE FUNCIONES PARA SOLICITUDES.PHP
1.- MOSTRAR PANTALLA DE IDENTIFICACION CORRECTA..................................................................43
2.- MOSTRAR PANTALLA DE LOGIN USUARIO............................................................................94
3.- CAMBIO DE CONTRASEÑA........................................................................................288
4.- CAMBIO DE CONTRASEÑA POR OLVIDO.............................................................................300
5.- MOSTRAR PANTALLA RESTABLECER CONTRASEÑA.....................................................................285
6.- VALIDAR DATOS OLVIDO CONTRASEÑA.............................................................................324
7.- MOSTRAR FORMULARIO DE PRIMEROS DATOS........................................................................460
8.- VALIDAR RESPONSABLE DE LA VISITA............................................................................572
9.- AVISO DE ERROR POR CADUCIDAD RESPONSABLE....................................................................708
10.-MOSTRAR ENTRADA DE DATOS MANUAL.............................................................................740
11.-PROCESAR ENTRADA DE DATOS MANUAL............................................................................872
12.-MOSTRAR ENTRADA DE DATOS DESDE EXCEL........................................................................958
13.-VALIDACION DEL NUMERO DE ACCESOS SOLICITADOS POR EXCEL.....................................................1025
14.-PROCESAR DATOS DE ENTRADA EXCEL............................................................................1072
15.-MOSTRAR LOS DATOS INICIALES DE LOS ACCESOS SOLICITADOS.....................................................1162
16.-MOSTRAR LOS DATOS DE ACCESOS SOLICITADOS EN UNA TABLA......................................................1199
17.-MOSTRAR FILA DE DATOS DEL ACCESO SELECCIONADO PARA EDITAR DE LA TABLA DE SOLICITUDES (BOTON EDITAR)........1882
18.-ACTUALIZA LOS DATOS EN LA BASE ACCESOS_TEMP  (BOTON ACTUALIZAR)............................................1992
19.-MOSTRAR FILA DE DATOS DEL ACCESO SELECCIONADO PARA BORRAR DE LA TABLA DE SOLICITUDES (BOTON BORRAR)........2015
20.-BORRAR LOS DATOS EN LA BASE ACCESOS_TEMP (BOTON BORRAR)....................................................2126
21.-MOSTRAR AVISO DE ULTIMO ACCESO DE LA SOLICITUD ANTES DE BORRARLO...........................................2136
22.-BORRAR DATOS TEMPORALES DE LA BASE accesos_temp (BOTONES CANCELAR Y CERRAR SESION).........................2189
23.-PASAR DATOS DE "accesos_temp" A "accesos_puente" Y CREAR LOS QR's..........................................2205
24.-CREAR ARCHIVO PDF..........................................................................................2285
25.-MOSTRAR PANTALLA DE ENVIO CORREO CON LOS CODIGOS QR'S GENERADOS............................................2514
26.-MOSTRAR PANTALLA DE ENVIO CORREO PARA EL CASO DE ACCESO ANULADO............................................2606
27.-AVISO DE FALTA DE CORREO DE DESTINATARIO...................................................................2655
28.-PROCESADO Y ENVIO CORREO CON LOS CODIGOS QR'S GENERADOS CON PHPMAILER......................................2673
29.-MOSTRAR BUSCADOR DE ACCESOS SOLICITADOS PARA ACTULIZAR O BORRAR............................................2756
30.-MOSTRAR PANTALLA NO HAY COINCIDENCIAS......................................................................2833
MOSTRAR PANTALLA INPUT ACTUALIZAR VACIO
31.-MOSTRAR ACCESOS ENCONTRADOS................................................................................2852
32.-PROCESAR LOS ACCESOS SELECCIONADOS Y EDITADOS..............................................................3130
33.-MANDAR CORREO CON QR DE LOS ACCESOS ACTUALIZADOS...........................................................3309
34.-PROCESAR BORRADO DE ACCESOS SELECCIONADOS..................................................................3386
*/
header('Content-type: text/html; charset=utf-8');
require('02-albacon-php/04-variables-solicitudes.php');
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// PRIMERA FUNCION: MOSTRAR PANTALLA DE IDENTIFICACION CORRECTA
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function usuarioSolicitudesOK(){require('02-albacon-php/04-variables-solicitudes.php');?>
<div id="oscurecerContenedor" name="oscurecerContenedor" class="oscurecerContenedor" style="height:80.2%;top:15%;">
  <div id="usuarioSolicitudesOK" class="usuarioSolicitudesOK" style="background-image:url('fotos-archivos/Iberia/logo-blanco-solicitantes-p.png');background-repeat:no-repeat;background-position:top left;">
    <h3 style="color:rgb(224, 23, 50, 1);font-size:20px;margin-top:18px;">IDENTIFICACION CORRECTA</h3>
<?php
  echo '<p style="color:rgb(0, 0, 0, 0.6);">'.$nombreUsuario.' '.$apellidosUsuario.'</p>';
?>
    <div id="contieneTabla" style="margin-left:1.9%;">
      <table style="width:96%;">
        <tr>
          <td style="width:33.3%;">
            <form id="nuevoAcceso" class="linea" action="solicitudes.php" method="post">
              <input type="hidden" id="pasos" name="pasos" value="2"/>
              <input type="hidden" id="accion" name="accion" value="1"/>
              <input type="submit" class="boton" style="width:100%;height:28px;font-size:14px;" value="NUEVO ACCESO"/>
            </form>
          </td>
          <td style="width:33.3%;">
            <form id="editarAccesoUno" class="linea" action="solicitudes.php" method="post">
              <input type="hidden" id="pasos" name="pasos" value="3"/>
              <input type="hidden" id="accion" name="accion" value="2"/>
              <input type="submit" class="boton" style="width:100%;height:28px;font-size:14px;" value="EDITAR ACCESO"/>
            </form>
          </td>
          <td style="width:33.3%;">
            <form id="borrarAccesoUno" class="linea" action="solicitudes.php" method="post">
              <input type="hidden" id="pasos" name="pasos" value="4"/>
              <input type="hidden" id="accion" name="accion" value="3"/>
              <input type="submit" class="boton" style="width:100%;height:28px;font-size:14px;" value="BORRAR ACCESO"/>
            </form>
          </td>
        </tr>
        <tr>
          <td style="width:33.3%;"></td>
          <td style="width:33.3%;">
            <form id="cancelarSesion" action="solicitudes.php" method="post">
              <input type="hidden" id="pasos" name="pasos" value="100"/>
              <input type="submit" class="boton" style="width:100%;height:28px;font-size:14px;" value="CERRAR SESION"/>
            </form>
          </td>
          <td style="width:33.3%;"></td>
        </tr>
      </table>
    </div><!-- FIN div cotieneTabla -->
    <br>
  </div><!-- FIN div identificacionOK -->

<script>
history.replaceState(null, null, "solicitudes.php?pasos=<?php echo $pasos;?>");
</script>

</div><!-- FIN div avisoSolicitudes -->
<?php
}; // FINAL IDENTIFICACION OK
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// SEGUNDA FUNCION: MOSTRAR PANTALLA DE LOGIN USUARIO
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function pantallaLoginUsuario(){require('02-albacon-php/04-variables-solicitudes.php');?>
<div id="fondoLoginSolicitudes" name="fondoLoginSolicitudes" class="fondoLoginSolicitudes" style="background-image:url('05-albacon-fotos/fondo-blanco3.png');background-size:cover;">
  <div id="loginSolicitudes" name="loginSolicitudes" class="loginSolicitudes" style="">
    <h1 style="font-size:30px;"><br>DIRECCION DE SEGURIDAD</h1>
    <form id="loginUsuario" name="loginUsuario" action="solicitudes.php" method="post">
        <table style="width:100%;font-size:14px;">
            <tr>
                <td style="width:6%;"></td>
                <td style="background-color:rgb(255,255,255,0);text-align:right;height:40px;color:rgb(0, 0, 0, 0.7);width:40%;"><strong>SOLICITANTE:</strong></td>
                <td style="background-color:rgb(255,255,255,0);text-align:left;width:54%;"><input type="text" id="usuario" name="usuario" class="clave" style="" onkeypress="return caracteresPermitidos(event)" onblur="return limpiaUno()"/></td>
            </tr>
            <tr>
                <td></td>
                <td style="background-color:rgb(255,255,255,0);text-align:right;height:40px;color:rgb(0, 0, 0, 0.7);"><strong>CONTRASEÑA:</strong></td>
                <td style="background-color:rgb(255,255,255,0);text-align:left;"><input type="text" id="contrasena" name="contrasena" class="clave" style="" onkeypress="return caracteresPermitidos(event)" onblur=""/></td>
            </tr>
            <tr style="background-color: rgb(255,255,255,0);padding-left:-200px;">
                <td colspan="3" style="background-color: rgb(255,255,255,0);text-align:center;height:55px;">
                    <input type="hidden" id="comprobarUsuario" name="comprobarUsuario" value="1"/>
                    <input type="hidden" id="pasos" name="pasos" value="1"/>
                    <input type="button" id="BTN-Identificarse" class="BTN-Identificarse" value="IDENTIFICARSE" onclick="return validarUsuario()"/>
                </td>
            </tr>
        </table>
    </form>
    <form id="olvidoContrasena" name="olvidoContrasena" action="solicitudes.php" method="post">
      <table style="width:100%;">
        <tr>
          <td style="width:100%;font-size:12px;background-color:rgb(255,255,255,0);text-alignenter;">
            <button type="submit" id="pasos" name="pasos" class="BTN-OlvidoContrasena" value="201" style="">¿Ha olvidado la contraseña?</button>
          </td>
        </tr>
      </table>
    </form>
  </div><!-- FINAL div login -->
</div><!-- FINAL div fondoLogin -->
<?php
// -----------------------------------------------------------------------------------------------------------------------------------------------
// SE COMPRUEBA QUE LOS CAMPOS DE USUARIO Y CONTRASEÑA EXISTEN Y ESTAN EN VIGOR (CON PHP)
// -----------------------------------------------------------------------------------------------------------------------------------------------
if($comprobarUsuario==1){
// 1) SE REALIZA LA CONEXION CON LA BD Y LA CONSULTA  --------------------------------------------------------------------------------------------
$conexion_db;
$baseDatos;
$sql="SELECT * FROM solicitantes WHERE USUARIO='$usuario'";
$result=mysqli_query($conexion_db,$sql);
$registroUsuario=mysqli_fetch_array($result);
// 2) SE COMPRUEBA QUE EL USUARIO SEA CORRECTO ---------------------------------------------------------------------------------------------------
if(@$registroUsuario[7]<>$usuario){
?>
<div id="avisoErrorValidacion" name="avisoErrorValidacion" class="oscurecerContenedor">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAviso">
    <div class="tituloAviso">INFORMACION IMPORTANTE</div>
    <div class="mensajeAviso">DEBE INDICAR UN USUARIO VALIDO</div>
      <a href="javascript:cerrarAvisoValidacion();">ACEPTAR</a>
  </div><!-- FINAL mostrarAvisoError -->
</div><!-- FINAL mostrarAviso -->
<?php
}else{
// 3) SE EVALUA LA CONTRASEÑA DEPENDIENDO DE NUMERO DE USOS Y QUE SEA CORRECTA -------------------------------------------------------------------
// 3.1) Es primer uso y la contraseña no coincide con ninguna, ni inicial ni cambiada por usuario:
if((@$registroUsuario[8]<>$contrasena & @$registroUsuario[9]<>$contrasena) & $registroUsuario[23]<1){?>
<div id="avisoErrorValidacion" name="avisoErrorValidacion" class="oscurecerContenedor">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAviso">
    <div class="tituloAviso">INFORMACION IMPORTANTE</div>
    <div class="mensajeAviso">LA CONTRASEÑA NO ES VALIDA</div>
      <a href="javascript:cerrarAvisoValidacion();">ACEPTAR</a>
  </div><!-- FINAL mostrarAvisoError -->
</div><!-- FINAL mostrarAviso -->
<?php
;};
//  3.2) Es primer uso y la contraseña no coincide con la inicial y si con la que cambia el usuario
if((@$registroUsuario[8]<>$contrasena & @$registroUsuario[9]==$contrasena) & $registroUsuario[23]<1){?>
<div id="avisoErrorValidacion" name="avisoErrorValidacion" class="oscurecerContenedor">
  <div id="mostrarAvisoError" name="mostrarAvisoError" class="mostrarAviso">
    <div class="tituloAviso">INFORMACION IMPORTANTE</div>
    <div class="mensajeAviso">LA CONTRASEÑA NO ES VALIDA</div>
      <a href="javascript:cerrarAvisoValidacion();">ACEPTAR</a>
  </div><!-- FINAL mostrarAvisoError -->
</div><!-- FINAL mostrarAviso -->
<?php
;};
// 3.3) NO es primer uso y la contraseña no coincide ni con la inicial ni con la cambiada
if((@$registroUsuario[8]<>$contrasena & @$registroUsuario[9]<>$contrasena) & $registroUsuario[23]>=1){?>
<div id="avisoErrorValidacion" name="avisoErrorValidacion" class="oscurecerContenedor">
  <div id="mostrarAvisoError" name="mostrarAvisoError" class="mostrarAviso">
    <div class="tituloAviso">INFORMACION IMPORTANTE</div>
    <div class="mensajeAviso">LA CONTRASEÑA NO ES VALIDA</div>
      <a href="javascript:cerrarAvisoValidacion();">ACEPTAR</a>
  </div><!-- FINAL mostrarAvisoError -->
</div><!-- FINAL mostrarAviso -->
<?php
;}else{};
// 3.4) NO es primer uso y la contraseña coincide con la inicial pero no con la cambiada
if((@$registroUsuario[8]==$contrasena & @$registroUsuario[9]<>$contrasena) & $registroUsuario[23]>=1){?>
<div id="avisoErrorValidacion" name="avisoErrorValidacion" class="oscurecerContenedor">
  <div id="mostrarAvisoError" name="mostrarAvisoError" class="mostrarAvisoError">
    <div class="tituloAviso">INFORMACION IMPORTANTE</div>
    <div class="mensajeAviso">LA CONTRASEÑA NO ES VALIDA</div>
      <a href="javascript:cerrarAvisoValidacion();">ACEPTAR</a>
  </div><!-- FINAL mostrarAvisoError -->
</div><!-- FINAL mostrarAviso -->
<?php
;};
//  3.5) ES PRIMER USO y la contraseña coincide con la inicial, se requiere cambiar contraseña
if((@$registroUsuario[8]==$contrasena & @$registroUsuario[9]<>$contrasena) & $registroUsuario[23]<1){?>
<div id="fondoCambioClave" name="fondoCambioClave" class="oscurecerContenedor">
    <div id="cambioClave" name="cambioClave" class="cambioClave">
      <h3 style="color:rgb(224, 23, 50, 1);font-size:20px;margin-top:18px;">CAMBIO DE CONTRASEÑA</h3>
      <p style="font-size:18px;color:rgb(0,0,0,0.5);">ES LA PRIMERA VEZ QUE USA EL PROGRAMA<br>DEBE CAMBIAR SU CONTRASEÑA</p>
  <form id="cambioContrasena" name="cambioContrasena" class="linea" action="solicitudes.php" method="post">
    <input type="hidden" id="pasos" name="pasos" value="200"/>
    <input type="hidden" id="contrasenaInicial" name="contrasenaInicial" value="<?php echo $contrasena; ?>"/>
        <table style="width:100%;">
          <tr>
            <td style="width:40%;text-align:right;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin-left:160px;">NUEVA&nbsp&nbspCONTRASEÑA:&nbsp&nbsp&nbsp&nbsp</td>
            <td style="width:60%;text-align:left;">&nbsp&nbsp<input type="text" id="claveNueva" name="claveNueva" class="clave" maxlength="14" style="width:82%;outline:none;" onkeypress="return caracteresPermitidos(event)"/></td>
          </tr>
          <tr>
            <td style="width:40%;text-align:right;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin-left:70px;">REPETIR&nbsp&nbspCONTRASEÑA:&nbsp&nbsp</td>
            <td style="width:60%;text-align:left;">&nbsp&nbsp<input type="text" id="claveNuevaRepetida" name="claveNuevaRepetida" class="clave" maxlength="14" style="width:82%;outline:none;" onkeypress="return caracteresPermitidos(event)"/></td>
          </tr>
          <tr>
            <td style="width:40%;font-size:4px;"><br></td>
            <td style="width:60%;font-size:4px;"><p style="font-size:11px;text-align:left;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin:0px;padding:0px;margin-top:-2px;margin-left:10px;">
                Use mayúsculas, minúsculas y números.<br>Mínimo 8 y máximo 14 caracteres.</p>
            </td>
          </tr>
          <tr>
            <td colspan="2"><br>
              <input type="button" class="boton" style="width:48%;height:26px;padding-bottom:0px;" onclick="return validarClaves()" value="CAMBIAR CONTRASEÑA"/>
            </td>
          </tr>
        </table>
  </form>
    </div><!-- FIN div cambioClave -->
  </div><!-- FIN div fondoCambioClave -->
<?php  
;};
//  3.6) NO ES PRIMER uso y la contraseña coincide con la cambiada por el usuario por lo que se comprueba fecha de validez
if((@$registroUsuario[8]<>$contrasena & @$registroUsuario[9]==$contrasena) & $registroUsuario[23]>=1){
// Se evalua la fecha de validez del USUARIO, poniendo si está caducado o en vigor
// 1) Operamos con la fecha UTC de hoy
  @$utc=time();
  @$utc=date("d/m/Y", $utc);
//@$utc='10/10/2024'; // AQUI SE PUEDE CAMBIAR UTC PARA COMPROBAR EL FUNCIONAMIENTO DE LA VALIZACION
  @$fechaUTC=explode('/', $utc);
  @$diaUTC=$fechaUTC[0];@$mesUTC=$fechaUTC[1];@$anioUTC=intval($fechaUTC[2]);
    if($diaUTC[0]=='0'){$diaUTC=$diaUTC[1];}else{$diaUTC=$diaUTC;intval($diaUTC);};
    if($mesUTC[0]=='0'){$mesUTC=$mesUTC[1];}else{$mesUTC=$mesUTC;intval($mesUTC);};
// 2) Operamos la fecha de validez "$registroUsuario[19]"
  @$fechaValidez=explode('/', $registroUsuario[19]);
  @$diaValidez=$fechaValidez[0];@$mesValidez=$fechaValidez[1];@$anioValidez=intval($fechaValidez[2]);
    if($diaValidez[0]=='0'){$diaValidez=$diaValidez[1];}else{$diaValidez=$diaValidez;intval($diaValidez);};
    if($mesValidez[0]=='0'){$mesValidez=$mesValidez[1];}else{$mesValidez=$mesValidez;intval($mesValidez);};
// 3) Se comparan fechas y se pone: "Usuario no válido - caducado"
    if($anioUTC>$anioValidez){$caducado='si';}
      else{if($anioUTC==$anioValidez & $mesUTC>$mesValidez){$caducado='si';}
        else{if($anioUTC>=$anioValidez & $mesUTC==$mesValidez & $diaUTC>$diaValidez){$caducado='si';}else{$caducado='no';};};};
//  3.1) Mensaje cuando esta caducado
if($caducado=='si'){
?>
<div id="avisoErrorValidacion" name="avisoErrorValidacion" class="oscurecerContenedor" style="">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAviso" style="display:block;z-index:3;position:absolute;left:30%;">
<?php //echo 'caducado: '.$caducado; ?>
  <div class="tituloAviso">INFORMACION IMPORTANTE</div>
    <div class="mensajeAviso">EL USUARIO NO ES VALIDO POR CADUCIDAD<br>PONGASE EN CONTACTO CON LA DIRECCION DE SEGURIDAD</div>
      <a href="javascript:cerrarAvisoValidacion();">ACEPTAR</a>
  </div><!-- FINAL mostrarAvisoError -->
</div><!-- FINAL mostrarAviso -->
<?php
//  3.2) Se incia sesion correctamente y se crean las variables necesarias
}else{
// -----------------------------------------------------------------------------------------------------------------------------------------------
// TERCERO: SI USUARIO Y CONTRASEÑA SON CORRECTAS SE CREAN LAS VARIABLES DE SESION Y SE MUESTRA MENSAJE DE IDENTIFICACION CORRECTA
// -----------------------------------------------------------------------------------------------------------------------------------------------
@$UTCsesion = $_SESSION['UTCsesion'] = time();
@$IDusuario = $_SESSION['IDusuario'] = $registroUsuario[1];
@$codigoSolicitante = $_SESSION['codigoSolicitante']= $registroUsuario[1].'-'.$UTCsesion;
@$nombreUsuario = $_SESSION['nombreUsuario'] = $registroUsuario[3];
@$apellidosUsuario = $_SESSION['apellidosUsuario'] = $registroUsuario[4];
@$telefonoUsuario = $_SESSION['telefonoUsuario'] = $registroUsuario[12];
@$correoUsuario = $_SESSION['correoUsuario'] = $registroUsuario[14];
usuarioSolicitudesOK();
;};};} // Final de condicion de contraseña valida y no es primer uso
;} // Final de condicion comprobarUsuario
mysqli_close($conexion_db); // Se cierra conexion
;}; //  Final función de logeo solicitante
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// TERCERA FUNCION: CAMBIO DE CONTRASEÑA
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function cambiarContrasena(){require('02-albacon-php/04-variables-solicitudes.php');
$conexion_db;
$baseDatos;
$cambioClave='clave_usuario';
$usos=1;
$sql="UPDATE solicitantes SET CLAVE='$cambioClave',CLAVE_USUARIO='$claveNueva',USOS='$usos' WHERE CLAVE='$contrasenaInicial' ";
$result=mysqli_query($conexion_db,$sql);
mysqli_close($conexion_db); // Se cierra conexion
}; // Final funcion cambiar contraseña
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// CUARTA FUNCION: CAMBIO DE CONTRASEÑA POR OLVIDO
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function cambiarContrasenaOlvido(){require('02-albacon-php/04-variables-solicitudes.php');
$conexion_db;
$baseDatos;
$cambioClave='clave_usuario';
$usos=1;
$sql="UPDATE solicitantes SET CLAVE='$cambioClave',CLAVE_USUARIO='$claveNueva',USOS='$usos' WHERE USUARIO='$nickUsuario' ";
$result=mysqli_query($conexion_db,$sql);
mysqli_close($conexion_db); // Se cierra conexion
}; // Final funcion cambiar contraseña por olvido
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// QUINTA FUNCION: MOSTRAR PANTALLA RESTABLECER CONTRASEÑA
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mostrarRestablecerContrasena(){require('02-albacon-php/04-variables-solicitudes.php');?>
  <div id="fondoRestablecerContrasena" name="fondoRestablecerContrasena" class="oscurecerContenedor">
    <div id="restablecimientoContrasena" name="restablecimientoContrasena" class="cambioClave">
        <h3 style="color:rgba(224, 23, 50, 1);font-size:18px;margin-top:18px;">RESTABLECER CONTRASEÑA</h3>
        <p style="font-size:16px;color:rgba(0,0,0,0.8);">INDIQUE LOS SIGUIENTES DATOS</p>
    <form id="restablecerContrasena" name="restablecerContrasena" class="linea" action="solicitudes.php" method="post">
      <input type="hidden" id="pasos" name="pasos" value="202"/>
          <table style="width:100%;">
            <tr>
              <td style="width:40%;text-align:right;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin-left:160px;">SOLICITANTE:&nbsp&nbsp&nbsp&nbsp</td>
              <td style="width:60%;text-align:left;">&nbsp&nbsp<input type="text" id="nickUsuario" name="nickUsuario" maxlength="25" style="width:82%;outline:none;" onkeypress="return caracteresPermitidos(event)" onblur="return limpiaNueve()"/></td>
            </tr>
            <tr>
              <td style="width:40%;text-align:right;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin-left:70px;">Nº NOMINA/EMPLEADO:&nbsp&nbsp</td>
              <td style="width:60%;text-align:left;">&nbsp&nbsp<input type="text" id="numeroNomina" name="numeroNomina" maxlength="10" style="width:82%;outline:none;" onkeypress="return caracteresPermitidos(event)" onblur=""/></td>
            </tr>
          </table>
          <br>
          <table style="width:100%;">
            <tr>
              <td style="width:50%;text-align:right;">
                <button class="boton" style="width:100px;height:26px;" onclick="return validarDatos()">ENVIAR</button>
              </td>
    </form>
    <form action="solicitudes.php" method="post"> 
              <td style="width:50%;text-align:left;margin:0px;">
                <input type="hidden" id="pasos" name="pasos" value="100"/>
                <button class="boton" style="width:100px;height:26px;">CANCELAR</button>
    </form>
              </td>
            </tr>
          </table>
      </div><!-- FIN div restablecer contraseña -->
    </div><!-- FIN div fondo restablecer contraseña -->
<?php
}; // Final funcion mostrar restablecer contraseña
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// SEXTA FUNCION: VALIDAR DATOS OLVIDO CONTRASEÑA
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function validarDatosAutorizado(){require('02-albacon-php/04-variables-solicitudes.php');
  //require('accesos-archivos/02-funciones-solicitudes.php');
$conexion_db;
$baseDatos;
$sql="SELECT * FROM solicitantes WHERE USUARIO='$nickUsuario' ";
$result=mysqli_query($conexion_db,$sql);
$registroNickUsuario=mysqli_fetch_array($result);
// 1) SE COMPRUEBA QUE EL USUARIO EXISTA
if(@utf8_encode($registroNickUsuario[7])<>$nickUsuario){?>
    <div id="avisoErrorValidacion" name="avisoErrorValidacion" class="oscurecerContenedor">
      <div id="mostrarAviso" name="mostrarAviso" class="mostrarAviso">
        <div class="tituloAviso">INFORMACION IMPORTANTE</div>
        <div class="mensajeAviso">DEBE INDICAR UN USUARIO VALIDO</div>
          <a href="solicitudes.php?pasos=201" class="boton">ACEPTAR</a>
      </div><!-- FINAL mostrarAvisoError -->
    </div><!-- FINAL mostrarAviso -->
<?php
}else{
// 2) SE COMPRUEBA QUE EL NUMERO DE NOMINA SEA CORRECTO
if(@utf8_encode($registroNickUsuario[6])<>$numeroNomina){?>
    <div id="avisoErrorValidacion" name="avisoErrorValidacion" class="oscurecerContenedor">
      <div id="mostrarAviso" name="mostrarAviso" class="mostrarAviso">
        <div class="tituloAviso">INFORMACION IMPORTANTE</div>
        <div class="mensajeAviso">EL NUMERO DE NOMINA NO COINCIDE</div>
          <a href="solicitudes.php?pasos=201" class="boton">ACEPTAR</a>
      </div><!-- FINAL mostrarAvisoError -->
    </div><!-- FINAL mostrarAviso -->
<?php
}else{
// 2) SE COMPRUEBA QUE EL USUARIO ESTA O NO CADUCADO
// Se operamos con la fecha UTC de hoy para ver si es un usuario caducado
@$utc=time();
@$utc=date("d/m/Y", $utc);
//@$utc='10/10/2024'; // AQUI SE PUEDE CAMBIAR UTC PARA COMPROBAR EL FUNCIONAMIENTO DE LA VALIZACION
@$fechaUTC=explode('/', $utc);
@$diaUTC=$fechaUTC[0];@$mesUTC=$fechaUTC[1];@$anioUTC=intval($fechaUTC[2]);
  if($diaUTC[0]=='0'){$diaUTC=$diaUTC[1];}else{$diaUTC=$diaUTC;intval($diaUTC);};
  if($mesUTC[0]=='0'){$mesUTC=$mesUTC[1];}else{$mesUTC=$mesUTC;intval($mesUTC);};
// 2) Operamos la fecha de validez "$registroNickUsuario[19]"
@$fechaValidez=explode('/', $registroNickUsuario[19]);
@$diaValidez=$fechaValidez[0];@$mesValidez=$fechaValidez[1];@$anioValidez=intval($fechaValidez[2]);
  if($diaValidez[0]=='0'){$diaValidez=$diaValidez[1];}else{$diaValidez=$diaValidez;intval($diaValidez);};
  if($mesValidez[0]=='0'){$mesValidez=$mesValidez[1];}else{$mesValidez=$mesValidez;intval($mesValidez);};
// 3) Se comparan fechas y se pone: "Usuario no válido - caducado"
  if($anioUTC>$anioValidez){$caducado='si';}
    else{if($anioUTC==$anioValidez & $mesUTC>$mesValidez){$caducado='si';}
      else{if($anioUTC>=$anioValidez & $mesUTC==$mesValidez & $diaUTC>$diaValidez){$caducado='si';}else{$caducado='no';};};};

if($caducado=='si'){?>
  <div id="avisoErrorValidacion" name="avisoErrorValidacion" class="oscurecerContenedor">
    <div id="mostrarAviso" name="mostrarAviso" class="mostrarAviso">
  <?php //echo 'caducado: '.$caducado; ?>
    <div class="tituloAviso">INFORMACION IMPORTANTE</div>
      <div class="mensajeAviso">EL USUARIO NO ES VALIDO POR CADUCIDAD<br>PONGASE EN CONTACTO CON LA DIRECCION DE SEGURIDAD</div>        
        <a href="solicitudes.php?pasos=201" class="boton">ACEPTAR</a>
    </div><!-- FINAL mostrarAvisoError -->
  </div><!-- FINAL mostrarAviso -->
<?php
//  3.2) Se comprueba que ya haya usado el programa alguna vez
}else{
// SE EVALUA QUE HAYA USADO ALGUNA VEZ EL PROGRAMA
if($registroNickUsuario[8]=='clave_usuario'){?>
  <div id="fondoCambioClave" name="fondoCambioClave" class="oscurecerContenedor">
    <div id="cambioClave" name="cambioClave" class="cambioClave" style="height:auto;padding-bottom:10px;">
      <h3 style="color:rgb(224, 23, 50, 1);font-size:18px;margin-top:20px;">ACTUALIZAR CONTRASEÑA</h3>
  <form id="cambioContrasena" name="cambioContrasena" class="linea" action="solicitudes.php" method="post">
    <input type="hidden" id="pasos" name="pasos" value="203"/>
    <input type="hidden" id="nickUsuario" name="nickUsuario" value="<?php echo $nickUsuario; ?>"/>
        <table style="width:100%;margin-top:20px;">
          <tr>
            <td style="width:40%;text-align:right;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin-left:160px;">NUEVA&nbsp&nbspCONTRASEÑA:&nbsp&nbsp&nbsp&nbsp</td>
            <td style="width:60%;text-align:left;">&nbsp&nbsp<input type="text" id="claveNueva" name="claveNueva" class="clave" maxlength="14" style="width:82%;outline:none;" onkeypress="return caracteresPermitidos(event)"/></td>
          </tr>
          <tr>
            <td style="width:40%;text-align:right;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin-left:70px;">REPETIR&nbsp&nbspCONTRASEÑA:&nbsp&nbsp</td>
            <td style="width:60%;text-align:left;">&nbsp&nbsp<input type="text" id="claveNuevaRepetida" name="claveNuevaRepetida" class="clave" maxlength="14" style="width:82%;outline:none;" onkeypress="return caracteresPermitidos(event)"/></td>
          </tr>
          <tr>
            <td style="width:40%;font-size:4px;"><br></td>
            <td style="width:60%;font-size:4px;"><p style="font-size:11px;text-align:left;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin:0px;padding:0px;margin-top:-2px;margin-left:10px;">
                Use mayúsculas, minúsculas y números.<br>Mínimo 8 y máximo 14 caracteres.</p>
            </td>
          </tr>
          <tr>
            <td colspan="2"><br>
              <input type="button" class="boton" style="width:120px;height:26px;" onclick="return validarClaves()" value="ACTUALIZAR"/> 
            </td>
          </tr>
        </table>
  </form>
    </div><!-- FIN div cambioClave -->
  </div><!-- FIN div fondoCambioClave -->
<?php
// EL USUARIO NO HA USADO NUNCA EL PROGRAMA
}else{?>
  <div id="fondoCambioClave" name="fondoCambioClave" class="oscurecerContenedor">
    <div id="cambioClave" name="cambioClave" class="cambioClave">
      <h3 style="color:rgb(224, 23, 50, 1);font-size:20px;margin-top:18px;">CAMBIO DE CONTRASEÑA</h3>
      <p style="font-size:18px;color:rgb(0,0,0,0.7);">ES LA PRIMERA VEZ QUE USA EL PROGRAMA<br>DEBE CAMBIAR SU CONTRASEÑA</p>
  <form id="cambioContrasena" name="cambioContrasena" class="linea" action="solicitudes.php" method="post">
    <input type="hidden" id="pasos" name="pasos" value="203"/>
    <input type="hidden" id="nickUsuario" name="nickUsuario" value="<?php echo $nickUsuario; ?>"/>
        <table style="width:100%;">
          <tr>
            <td style="width:40%;text-align:right;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin-left:160px;">NUEVA&nbsp&nbspCONTRASEÑA:&nbsp&nbsp&nbsp&nbsp</td>
            <td style="width:60%;text-align:left;">&nbsp&nbsp<input type="text" id="claveNueva" name="claveNueva" class="clave" maxlength="14" style="width:82%;outline:none;" onkeypress="return caracteresPermitidos(event)"/></td>
          </tr>
          <tr>
            <td style="width:40%;text-align:right;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin-left:70px;">REPETIR&nbsp&nbspCONTRASEÑA:&nbsp&nbsp</td>
            <td style="width:60%;text-align:left;">&nbsp&nbsp<input type="text" id="claveNuevaRepetida" name="claveNuevaRepetida" class="clave" maxlength="14" style="width:82%;outline:none;" onkeypress="return caracteresPermitidos(event)"/></td>
          </tr>
          <tr>
            <td style="width:40%;font-size:4px;"><br></td>
            <td style="width:60%;font-size:4px;"><p style="font-size:11px;text-align:left;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin:0px;padding:0px;margin-top:-2px;margin-left:10px;">
                Use mayúsculas, minúsculas y números.<br">Mínimo 8 y máximo 14 caracteres.</p>
            </td>
          </tr>
          <tr>
            <td colspan="2"><br>
              <input type="button" class="boton" style="width:48%;height:26px;" onclick="return validarClaves()" value="CAMBIAR CONTRASEÑA"/>
            </td>
          </tr>
        </table>
  </form>
    </div><!-- FIN div cambioClave -->
  </div><!-- FIN div fondoCambioClave -->
<?php
}; // Final de ELSE la clave no ha sido cambiada nunca
}; // Final ELSE si no está caducado
}; // Numero de nomina es correcto
}; // Final ELSE el usuario existe
mysqli_close($conexion_db); // Se cierra conexion
}; // Final Funcion para validar datos de autorizado
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// SEPTIMA FUNCION: MOSTRAR FORMULARIO DE PRIMEROS DATOS
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mostrarPrimerosDatos(){require('02-albacon-php/04-variables-solicitudes.php');?>
<div class="oscurecerContenedor">
<div id="datosAdicionales" name="datosAdicionales" class="datosAdicionales" style="background-image:url('fotos-archivos/Iberia/Logo-Blanco-01.png');">
  <h2 style="color:rgb(224, 23, 50);height:40px;"><strong>INDIQUE LOS SIGUIENTES DATOS</strong></h2>
  <form id="primerosDatos" name="primerosDatos" action="solicitudes.php" method="post">
    <table id="datosUno" style="width:100%;border:0px solid black;">
      <tr style="height:34px;background-color:rgb(255,255,255,0);">
        <td style="text-align:left;padding-left:20px;color:rgb(224, 23, 50, 1);background-color:rgb(255,255,255,0);width:42%;border:0px solid black;">
          <h4 style="font-size:14px;margin:0px;padding:0px;">Nº DE SOLICITUDES:</h4>
        </td>
        <td style="text-align:left;background-color:rgb(255,255,255,0);width:58%;border:0px solid black;">
          <input type="text" id="numSolicitudes" name="numSolicitudes" maxlength="3" style="outline:none;"/>
        </td>
      </tr>
      <tr style="height:34px;">
        <td style="background-color:rgb(255,255,255,0);text-align:left;height:22px;padding-left:20px;color:rgb(224, 23, 50);border:0px solid black;">
          <h4 style="font-size:14px;margin:0px;padding:0px;">EDIFICIO A VISITAR:</h4>
        </td>
        <td style="text-align:left;background-color:rgb(255,255,255,0);border:0px solid black;">
          <select id="edificioVisita" name="edificioVisita" style="font-size:12px;font-family:sans-serif;background-color:rgb(255,255,255,1);width:200px;padding-top:2px;outline:none;"/>
            <option value="SELECCIONAR" selected>SELECCIONAR</option>
            <option value="SERVICIOS GENERALES">SERVICIOS GENERALES</option>
            <option value="ALMACENES GENERALES">ALMACENES GENERALES</option>
            <option value="TALLERES GENERALES">TALLERES GENERALES</option>
            <option value="SERVICIO MEDICO VUELO">SERVICIO MEDICO VUELO</option>
            <option value="SERVICIO MEDICO TIERRA">SERVICIO MEDICO TIERRA</option>
            <option value="CAE">CAE</option>
            <option value="DO & CO">DO & CO</option>
            <option value="ABASTECIMIENTO">ABASTECIMIENTO</option>
            <option value="CENTRO DE FORMACION">CENTRO DE FORMACION</option>
            <option value="PLATAFORMA AVIONES">PLATAFORMA AVIONES</option>
            <option value="HANGAR 4">HANGAR 4</option>
            <option value="HANGAR 5">HANGAR 5</option>
            <option value="HANGAR 6">HANGAR 6</option>
            <option value="HANGAR 7">HANGAR 7</option>
            <option value="RECINTO LA MUÑOZA">RECINTO LA MUÑOZA</option>
            <option value="MANDOS">MANDOS</option>
            <option value="ARCHIVO GENERAL">ARCHIVO GENERAL</option>
            <option value="ORDENADORES">ORDENADORES</option>
            <option value="CALL CENTER">CALL CENTER</option>
            <option value="END">END</option>
            <option value="IAG-CASERIO">IAG-CASERIO</option>
            <option value="SEGURIDAD">SEGURIDAD</option>
          </select>
        </td>
      </tr>
      <tr style="height:34px;">
        <td colspan="2" style="background-color:rgb(255,255,255,0);text-align:left;padding-left:20px;color:rgb(224, 23, 50);border:0px solid black;">
          <h4 style="font-size:14px;margin:0px;padding:0px;">MODO ENTRADA DATOS:</h4></td>
      </tr>
      <tr>
        <td colspan="2" style="color:rgb(0,0,0,0.5);background-color:rgb(255,255,255,0);text-align:left;padding-left:30px;border:0px solid black;">
          <strong>* De modo INDIVIDUAL</strong><input type="radio" name="entradaDatos" value="manual"><strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp* Pegando desde EXCEL</strong><input type="radio" name="entradaDatos" value="excel">
        </td>
      </tr>
      <tr style="height:34px;">
        <td colspan="2" style="background-color:rgb(255,255,255,0);text-align:left;padding-left:20px;color:rgb(224, 23, 50);border:0px solid black;">
          <h4 style="font-size:14px;margin:0px;padding:0px;">RESPONSABLE DE LA VISITA:</h4>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="color:rgb(0,0,0,0.5);background-color:rgb(255,255,255,0);text-align:left;padding-left:30px;height:20px;border:0px solid black;">
          <strong>* IGUAL al solicitante</strong>
          <label><input type="checkbox" id="igualSolicitante" name="igualSolicitante" onclick="return apagarDato()" value="si"></label>
        </td>
      </tr>
      <tr style="height:34px;">
        <td colspan="2" style="background-color:rgb(255,255,255,0);text-align:left;padding-left:48px;padding-top:2%;border:0px solid black;">
          <label id="nombreResp" name="nombreResp" class="labelEncendido">NOMBRE:</label>
          <input type="text" id="nombreResponsable" name="nombreResponsable" class="inputEncendido"/>
        </td>
      </tr>
      <tr style="height:34px;">
        <td colspan="2" style="background-color:rgb(255,255,255,0);text-align:left;padding-left:48px;border:0px solid black;">
          <label id="apellidosResp" name="apellidosResp" class="labelEncendido">APELLIDOS:</label>
          <input type="text" id="apellidosResponsable" name="apellidosResponsable" class="inputEncendido"/>
        </td>
      </tr>
    </table>
    <table style="width:100%;">
      <tr>
        <td style="background-color: rgb(255,255,255,0);text-align:right;height:55px;border:none">
          <input type="hidden" id="comprobarUsuario" name="comprobarUsuario" value="9"/>
          <input type="hidden" id="pasos" name="pasos" value="5"/>
          <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
          <input type="hidden" id="IDresponsable" name="IDresponsable" value="<?php echo $IDresponsable; ?>"/>
          <input type="button" id="continuarPrimeros" class="boton" style="width:114px;" value="CONTINUAR" onclick="validarPrimerosDatos()"/>
  </form>
        </td>
        <td style="background-color: rgb(255,255,255,0);text-align:left;height:55px;border:none">
  <form id="salir" name="salir" action="solicitudes.php" method="post">
          <input type="hidden" id="pasos" name="pasos" value="1"/>
          <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
          <input type="submit" class="boton" style="width:114px;" value="CANCELAR"/>
  </form>
        </td>
      </tr>
    </table>
</div> <!-- Final de la div "datosAdicionales" -->
<!-- comienzo div para los avisos de error de primeros datos -->
<div id="avisoPrimerosDatos" name="avisoPrimerosDatos" class="oscurecerContenedor" style="display:none;">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAviso">
    <div id="tituloAviso" class="tituloAviso"></div>
    <div id="mensajeAviso" class="mensajeAviso"></div>
      <a href="javascript:cerrarAviso();">ACEPTAR</a>
  </div><!-- FINAL mostrarAvisoError -->
</div><!-- FINAL mostrarAviso -->
</div><!-- FINAL apagarContenedor -->
<?php
}; // FINAL FUNCION DE PRIMEROS DATOS
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// OCTAVA FUNCION: VALIDAR RESPONSABLE DE LA VISITA
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function validarResponsable(){require('02-albacon-php/04-variables-solicitudes.php');
// PRIMERO: FORMATEMOS LOS CAMPOS INPUT DE NOMBRE Y APELLIDOS DEL RESPONSABLE
@$nombreResponsable =strtoupper(preg_replace('/\s+/', ' ',trim(str_replace(
  array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
  array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['nombreResponsable']))));
@$apellidosResponsable = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace(
  array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
  array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['apellidosResponsable']))));
// SEGUNDO: SE ESTABLECE LA CONEXION Y SE REALIZA LA CONSULTA
  $conexion_db;
  $baseDatos;
  $sql = "SELECT * FROM solicitantes WHERE NOMBRE LIKE '%$nombreResponsable%' OR APELLIDOS LIKE '%$apellidosResponsable%'";
  $result=mysqli_query($conexion_db,$sql);
  $num = mysqli_num_rows($result);
// TERCERO SE VALIDA SI EXISTE ESE RESPONSABLE ($num=0)
if($num==0){?>
<div id="fondoMostrarResponsable" name="fondoMostrarResponsable" class="oscurecerContenedor">
  <div id="mostrarResponsable" name="mostrarResponsable" class="mostrarResponsable" style="box-shadow:5px 5px 16px rgba(167, 167, 168, 0.9);">
    <p style="font-size:18px;">AVISO IMPORTANTE</p>
    <p style="font-size:16px;color:rgba(0,0,0,0.6);font-weight:normal;">NO HAY COINCIDENCIA PARA EL RESPONSABLE INDICADO</p>
      <form action="solicitudes.php" method="get">
        <input type="hidden" id="comprobarUsuario" name="comprobarUsuario" value="10"/>
        <input type="hidden" id="pasos" name="pasos" value="2"/>
        <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>

        <input type="hidden" id="numSolicitudes" name="numSolicitudes" value="<?php echo $numSolicitudes; ?>"/>
        <input type="hidden" id="edificioVisita" name="edificioVisita" value="<?php echo $edificioVisita; ?>"/>
        <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>

        <input type="hidden" id="IDresponsable" name="IDresponsable" value="<?php echo @$registroResponsable[1]; ?>"/>
        <input type="hidden" id="nombreResponsable" name="nombreResponsable" value="<?php echo @$registroResponsable[2]; ?>"/>
        <input type="hidden" id="apellidosResponsable" name="apellidosResponsable" value="<?php echo @$registroResponsable[3]; ?>"/>
        <input type="hidden" id="telefonoResponsable" name="telefonoResponsable" value="<?php echo @$registroResponsable[12]; ?>"/>
        <input type="hidden" id="correoResponsable" name="correoResponsable" value="<?php echo @$registroResponsable[14]; ?>"/>
        <input type="submit" class="boton" value="CANCELAR" style="margin-top:5px;">
      </form>
    </div><!-- Final div lista de Responsables de autorizacion -->
  </div><!-- Final de div para oscurecer contenido -->
<?php
}else{
//CUARTO: SE MUESTRAN LOS RESULTADOS EN UNA TABLA REALIZADA CON UN BUCLE WHILE SIEMPRE QUE HAYA MAS DE UN RESULTADO ($num>1)
?>
<div id="fondoMostrarResponsable" name="fondoMostrarResponsable" class="oscurecerContenedor">
  <div id="mostrarResponsable" name="mostrarResponsable" class="mostrarResponsable" style="box-shadow: 5px 5px 16px rgba(167, 167, 168, 0.9);">
    <p  style="font-size:18px;font-weight:bold;">SELECCIONAR RESPONSABLE DE LA SOLICITUD</p>
    <table style="width:100%;border:0px solid rgb(68, 104, 204, 1);">
<?php
$i=1;
while($i<=$num){$registroResponsable=mysqli_fetch_array($result);
            // En esta celda se evalua la fecha de validez del responsable, poniendo si está caducado o en vigor
            // 1) Operamos con la fecha UTC
            @$utc=time();
            @$utc=date("d/m/Y", $utc);
            //@$utc='10/10/2023'; // AQUI SE PUEDE CAMBIAR UTC PARA COMPROBAR EL FUNCIONAMIENTO DE LA VALIZACION
            @$fechaUTC=explode('/', $utc);
            @$diaUTC=$fechaUTC[0];@$mesUTC=$fechaUTC[1];@$anioUTC=intval($fechaUTC[2]);
              if($diaUTC[0]=='0'){$diaUTC=$diaUTC[1];}else{$diaUTC=$diaUTC;intval($diaUTC);};
              if($mesUTC[0]=='0'){$mesUTC=$mesUTC[1];}else{$mesUTC=$mesUTC;intval($mesUTC);};
        // 2) Operamos la fecha de validez "$registroResponsable[19]"
            @$fechaValidez=explode('/', $registroResponsable[19]);
            @$diaValidez=$fechaValidez[0];@$mesValidez=$fechaValidez[1];@$anioValidez=intval($fechaValidez[2]);
              if($diaValidez[0]=='0'){$diaValidez=$diaValidez[1];}else{$diaValidez=$diaValidez;intval($diaValidez);};
              if($mesValidez[0]=='0'){$mesValidez=$mesValidez[1];}else{$mesValidez=$mesValidez;intval($mesValidez);};
        // 3) Se comparan fechas y se pone: "Responsable no válido - caducado"
              if($anioUTC>$anioValidez){$caducado='si';}
                else{if($anioUTC==$anioValidez & $mesUTC>$mesValidez){$caducado='si';}
                  else{if($anioUTC>=$anioValidez & $mesUTC==$mesValidez & $diaUTC>$diaValidez){$caducado='si';}else{$caducado='no';};};};
?>
      <tr>
        <td style="width:8%;padding-left:10px;font-size:16px;font-weight:normal;color:rgba(0,0,0,0.7);"><?php echo '<strong>'.$i.' -</strong>';?></td>
        <td style="width:68%;font-size:16px;font-weight:normal;text-align:left;color:rgba(0,0,0,0.7);"><?php echo $registroResponsable[3].' '.$registroResponsable[4];?></td>
        <td style="width:24%;">
      <form action="solicitudes.php" method="post">
<?php
      if($caducado=='si'){echo '
          <input type="hidden" id="comprobarUsuario" name="comprobarUsuario" value="10"/>
          <input type="hidden" id="pasos" name="pasos" value="5"/>
          <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>

          <input type="hidden" id="numSolicitudes" name="numSolicitudes" value="'.$numSolicitudes.'"/>
          <input type="hidden" id="edificioVisita" name="edificioVisita" value="'.$edificioVisita.'"/>
          <input type="hidden" id="entradaDatos" name="entradaDatos" value="'.$entradaDatos.'"/>
          <input type="hidden" id="caducado" name="caducado" value="si"/>
          <input type="submit" class="boton-2" value="CADUCADO">
          ';}
        elseif($caducado=='no'){echo '
          <input type="hidden" id="comprobarUsuario" name="comprobarUsuario" value="10"/>
          <input type="hidden" id="pasos" name="pasos" value="5"/>
          <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>

          <input type="hidden" id="numSolicitudes" name="numSolicitudes" value="'.$numSolicitudes.'"/>
          <input type="hidden" id="edificioVisita" name="edificioVisita" value="'.$edificioVisita.'"/>
          <input type="hidden" id="entradaDatos" name="entradaDatos" value="'.$entradaDatos.'"/>

          <input type="hidden" id="IDresponsable" name="IDresponsable" value="'.$registroResponsable[1].'"/>
          <input type="hidden" id="nombreResponsable" name="nombreResponsable" value="'.$registroResponsable[3].'"/>
          <input type="hidden" id="apellidosResponsable" name="apellidosResponsable" value="'.$registroResponsable[4].'"/>
          <input type="hidden" id="telefonoResponsable" name="telefonoResponsable" value="'.$registroResponsable[12].'"/>
          <input type="hidden" id="correoResponsable" name="correoResponsable" value="'.$registroResponsable[14].'"/>
          <input type="hidden" id="caducado" name="caducado" value="no"/>
          <input type="submit" class="boton" style="width:100px;height:20px;font-size:11px;" value="SELECCIONAR">
          ';};
          ?>
        </form>
      </td>
    </tr> 
<?php
$i++;
}; // Se cierra while mostrar responsable
mysqli_close($conexion_db); //Se cierra conexion
?>
    <tr>
      <td colspan=4 style="height:30px;auto;text-align:center;padding-top:5px;">
      <form action="solicitudes.php" method="post">
        <input type="hidden" id="comprobarUsuario" name="comprobarUsuario" value="10"/>
        <input type="hidden" id="pasos" name="pasos" value="2"/>
        <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>

        <input type="hidden" id="numSolicitudes" name="numSolicitudes" value="<?php echo $numSolicitudes; ?>"/>
        <input type="hidden" id="edificioVisita" name="edificioVisita" value="<?php echo $edificioVisita; ?>"/>
        <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>
      
        <input type="hidden" id="IDresponsable" name="IDresponsable" value="<?php echo @$registroResponsable[1]; ?>"/>  
        <input type="hidden" id="nombreResponsable" name="nombreResponsable" value="<?php echo @$registroResponsable[3]; ?>"/>
        <input type="hidden" id="apellidosResponsable" name="apellidosResponsable" value="<?php echo @$registroResponsable[4]; ?>"/>  
        <input type="hidden" id="telefonoResponsable" name="telefonoResponsable" value="<?php echo @$registroResponsable[12]; ?>"/>
        <input type="hidden" id="correoResponsable" name="correoResponsable" value="<?php echo @$registroResponsable[14]; ?>"/>
        <input type="submit" class="boton" style="width:100px;height:26px;" value="CANCELAR">
      </form>
      </td>
    </tr>
  </table>
</div><!-- Final div lista de Responsables -->
</div><!-- Final de div para oscurecer contenido -->
<?php
}; //Final de ELSE para mostrar mensaje de no coincidencia
}; // Final de la funcion Validar Responsable
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// NOVENA FUNCION: AVISO DE ERROR POR CADUCIDAD RESPONSABLE
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mostrarAvisoResponsable(){require('02-albacon-php/04-variables-solicitudes.php');
  ?>
<div id="avisoSolicitudes" name="avisoSolicitudes" class="oscurecerContenedor">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAviso" style="top:28%;">
  <p style="font-size:19px;text-align:center;font-weight:bold;color:rgb(224, 23, 50, 1);">AVISO IMPORTANTE</p>
  <p style="font-size:18px;">EL RESPONSABLE INDICADO NO ES VALIDO POR CADUCIDAD<br>PONGASE EN CONTACTO CON DIRECCION DE SEGURIDAD</p>
<form action="solicitudes.php" method="post">
        
        <!--<input type="hidden" id="editarfila" name="editarfila" value="0"/>-->
        <input type="hidden" id="comprobarUsuario" name="comprobarUsuario" value="10"/>
        <input type="hidden" id="pasos" name="pasos" value="2"/>
        <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>

        <input type="hidden" id="numSolicitudes" name="numSolicitudes" value="<?php echo $numSolicitudes; ?>"/>
        <input type="hidden" id="edificioVisita" name="edificioVisita" value="<?php echo $edificioVisita; ?>"/>
        <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>

        <input type="hidden" id="IDresponsable" name="IDresponsable" value="<?php echo @$registroResponsable[1]; ?>"/>
        <input type="hidden" id="nombreResponsable" name="nombreResponsable" value="<?php echo @$registroResponsable[3]; ?>"/>
        <input type="hidden" id="apellidosResponsable" name="apellidosResponsable" value="<?php echo @$registroResponsable[4]; ?>"/>
        <input type="hidden" id="telefonoResponsable" name="telefonoResponsable" value="<?php echo @$registroResponsable[12]; ?>"/>
        <input type="hidden" id="correoResponsable" name="correoResponsable" value="<?php echo @$registroResponsable[14]; ?>"/>

        <input type="submit" class="boton" style="width:100px;height:26px;" value="ACEPTAR">
      </form>
  </div><!-- Final div mostrar aviso caducidad responsable -->
</div><!-- Final de div para oscurecer contenido -->
<?php
  ;};
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// DECIMA FUNCION: MOSTRAR ENTRADA DE DATOS MANUAL
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mostrarEntradaManual(){require('02-albacon-php/04-variables-solicitudes.php');
?>
<div id="entradaManual" name="entradaManual">
<?php
    echo '<br>';
    echo '<h1 style="text-align:center;">SOLICITUD DE ACCESOS</h1>';
    echo '<p style="font-size:14px;text-align:left;margin-bottom:-10px;padding-left:10px;"><strong>GESTOR DE LA SOLICITUD:&nbsp&nbsp</strong>'.$nombreUsuario.' '.$apellidosUsuario.'</p>';
  if(@$pasos==5&$IDresponsable<>''){
    echo '<p style="font-size:15px;margin-bottom:-8px;text-align:left;padding-left:10px;"><strong>RESPONSABLE DE LA VISITA:&nbsp&nbsp</strong>'.@$nombreResponsable.' '.utf8_encode(@$apellidosResponsable).'</p>';}
  else{
    echo '<p style="font-size:15px;margin-bottom:-8px;text-align:left;padding-left:10px;"><strong>RESPONSABLE DE LA VISITA:&nbsp&nbsp</strong>';};
    echo '<p style="font-size:14px;text-align:left;margin-bottom:-10px;padding-left:10px;"><strong>Nº DE SOLICITUDES:&nbsp&nbsp</strong>'.$numSolicitudes.'</p>';
    echo '<p style="font-size:14px;text-align:left;padding-left:10px;"><strong>EDIFICIO A VISITAR:&nbsp&nbsp</strong>'.$edificioVisita.'</p>';
// 1) SE MUESTRAN TABLA VACIA CON LA CANTIDAD DE SOLICITUDES ANOTADAS
?>
<div id="entradaManualDatos" name="entradaManualDatos">
  <div id="filaEncabezadosManual" name="filaEncabezadosManual" style="display:inline-flex;border:0px solid rgb(218, 217, 217);">
    <div class="manualEncabezado" style="width:22px;"><p style="font-size:13px;">Nº</p></div>
    <div class="manualEncabezado" style="width:8%;"><p style="margin-top:3px;font-size:13px;">DNI<br>PASAPORTE</p></div>
    <div class="manualEncabezado" style="width:11%;"><p style="font-size:14px;">NOMBRE</div>
    <div class="manualEncabezado" style="width:17%;"><p style="font-size:14px;">APELLIDOS</p></div>
    <div class="manualEncabezado" style="width:12.5%;"><p style="font-size:14px;">EMPRESA</p></div>
    <div class="manualEncabezado" style="width:6.5%;"><p style="font-size:14px;">VEHICULO</p></div>
    <div class="manualEncabezado" style="width:5.5%;"><p style="margin-top:3px;font-size:13px;">FECHA<br>INICIO</p></div>
    <div class="manualEncabezado" style="width:5.5%;"><p style="margin-top:3px;font-size:13px;">FECHA<br>FINAL</p></div>
    <div class="manualEncabezado" style="width:12%;"><p style="font-size:14px;">MOTIVO VISITA</p></div>
    <div class="manualEncabezado" style="width:18%;margin-right:4px;"><p style="font-size:14px;">OBSEVACIONES</p></div>
</div><!-- final fila de encabezados -->
<?php
for($i=1;$i<=$numSolicitudes;$i++){
?>
<form id="manualText" name="manualText" action="solicitudes.php" method="post">
<div id="filaDatosManual" name="filaDatosManual" style="display:inline-flex;border:0px solid rgb(218, 217, 217);">
  <div class="manualDato" id="div-manualNUM" name="div-manualNUM" style="width:22px;height:21px;margin-left:5px;margin-right:0px;border:0px solid rgb(180, 230, 240, 0.8);">
    <input type="text" class="manualInputDato" style="width:17px;height:21px;background-color:rgb(180, 230, 240, 0.8);border:0px;font-weight:bold;" <?php echo 'id="manualNUM'.$i.'" name="manualNUM'.$i.'"';?> readonly autocomplete="off" value="<?php echo $i;?>">
  </div>
  <div class="manualDato" id="div-manualDNI" name="div-manualDNI" style="width:8%;">
    <input type="text" class="manualInputDato" style="width:96%;" maxlength="15" <?php echo 'id="manualDNI'.$i.'" name="manualDNI'.$i.'"';?> autocomplete="off">
  </div>
  <div class="manualDato" id="div-manualNombre" name="div-manualNombre" style="width:11%;">
    <input type="text" class="manualInputDato" maxlength="20" <?php echo 'id="manualNombre'.$i.'" name="manualNombre'.$i.'"';?> autocomplete="off">
  </div>
  <div class="manualDato" id="div-manualApellidos" name="div-manualApellidos" style="width:17%;">
    <input type="text" class="manualInputDato" maxlength="40" <?php echo 'id="manualApellidos'.$i.'" name="manualApellidos'.$i.'"';?> autocomplete="off">
  </div>
  <div class="manualDato" id="div-manualEmpresa" name="div-manualEmpresa" style="width:12.5%;">
    <input type="text" class="manualInputDato" maxlength="30" <?php echo 'id="manualEmpresa'.$i.'" name="manualEmpresa'.$i.'"';?> autocomplete="off">
  </div>
  <div class="manualDato" id="div-manualVehiculo" name="div-manualVehiculo" style="width:6.5%;">
    <input type="text" class="manualInputDatoVacio" style="width:96%;" maxlength="16" <?php echo 'id="manualVehiculo'.$i.'" name="manualVehiculo'.$i.'"';?> autocomplete="off">
  </div>
  <div class="manualDato" id="div-manualFechaInicial" name="div-manualFechaInicial" style="width:5.5%;">
    <input type="text" class="manualInputDato" style="width:96%;" maxlength="10" <?php echo 'id="manualFechaInicial'.$i.'" name="manualFechaInicial'.$i.'"';?>autocomplete="off">
  </div>
  <div class="manualDato" id="div-manualFechaFinal" name="div-manualFechaFinal" style="width:5.5%;">
    <input type="text" class="manualInputDato" style="width:96%;" maxlength="10" <?php echo 'id="manualFechaFinal'.$i.'" name="manualFechaFinal'.$i.'"';?> autocomplete="off">
  </div>
  <div class="manualDato" id="div-manualMotivo" name="div-manualMotivo" style="width:12%;">
    <input type="text" class="manualInputDato" maxlength="40" <?php echo 'id="manualMotivo'.$i.'" name="manualMotivo'.$i.'"';?> autocomplete="off">
  </div>
  <div class="manualDato" id="div-manualObservaciones" name="div-manualObservaciones" style="width:18%;margin-right:4px;">
    <input type="text" class="manualInputDatoVacio" maxlength="40" <?php echo 'id="manualObservaciones'.$i.'" name="manualObservaciones'.$i.'"';?> autocomplete="off">
  </div>
</div><!-- final fila de datos accesos -->
<?php
;}; // FINAL FOR PARA MOSTRAR FILAS
?>
  <p style="font-size:6px;"></p>
</div><!-- FINAL DE LA DIV PARA ENGLOBAR TABLA entradaManualDatos-->
  <table id="botonesMostrar" style="width:99%;">
    <tr>
      <td colspan="2" style="height:12px;"></td>
    </tr>
    <tr>
      <td style="text-align:right;">
        <input type="hidden" id="pasos" name="pasos" value="7"/>
        <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>

        <input type="hidden" id="numSolicitudes" name="numSolicitudes" value="<?php echo $numSolicitudes; ?>"/>
        <input type="hidden" id="edificioVisita" name="edificioVisita" value="<?php echo $edificioVisita; ?>"/>
        <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>
  
        <input type="hidden" id="IDresponsable" name="IDresponsable" value="<?php echo utf8_encode(@$IDresponsable); ?>"/>
        <input type="hidden" id="nombreResponsable" name="nombreResponsable" value="<?php echo utf8_encode(@$nombreResponsable); ?>"/>
        <input type="hidden" id="apellidosResponsable" name="apellidosResponsable" value="<?php echo utf8_encode(@$apellidosResponsable); ?>"/>
        <input type="hidden" id="telefonoResponsable" name="telefonoResponsable" value="<?php echo @$telefonoResponsable; ?>"/>
        <input type="hidden" id="correoResponsable" name="correoResponsable" value="<?php echo utf8_encode(@$correoResponsable); ?>"/>
        <button id="botonContinuarManual" class="boton" style="width:100%;" onclick="return noEnviarManualVacio()">CONTINUAR SOLICITUD</button>
  </form><!-- Final "form manualText" -->
        </td>
        <td style="text-align:left;">
  <form id="cancelarSolicitud" action="solicitudes.php" method="post">
        <input type="hidden" id="pasos" name="pasos" value="2"/>
        <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>

        <input type="hidden" id="numSolicitudes" name="numSolicitudes" value="<?php echo $numSolicitudes; ?>"/>
        <input type="hidden" id="edificioVisita" name="edificioVisita" value="<?php echo $edificioVisita; ?>"/>
        <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>

        <input type="hidden" id="IDresponsable" name="IDresponsable" value="<?php echo utf8_encode(@$IDresponsable); ?>"/>
        <input type="hidden" id="nombreResponsable" name="nombreResponsable" value="<?php echo utf8_encode(@$nombreResponsable); ?>"/>
        <input type="hidden" id="apellidosResponsable" name="apellidosResponsable" value="<?php echo utf8_encode(@$apellidosResponsable); ?>"/>
        <input type="hidden" id="telefonoResponsable" name="telefonoResponsable" value="<?php echo @$telefonoResponsable; ?>"/>
        <input type="hidden" id="correoResponsable" name="correoResponsable" value="<?php echo utf8_encode(@$correoResponsable); ?>"/>
        <button class="boton" style="width:100%;">CANCELAR SOLICITUD</button>
      </td>
    </tr>
  </table>
  </form>
</div><!-- Final de la div "entradaManual" -->
<!-- div para mostrar error al mandar campos vacios -->
<div id="avisoManualVacio" name="avisoManualVacio" class="oscurecerContenedor" style="display:none;">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAviso">
    <div id="tituloAviso" class="tituloAviso">INFORMACION INCOMPLETA</div>
    <div id="mensajeAviso" class="mensajeAviso">DEBE RELLENAR TODOS LOS CAMPOS CORRECTAMENTE</div>
      <a href="javascript:cerrarAvisoManualVacio();">ACEPTAR</a>
  </div><!-- FINAL mostrarAvisoError -->
</div><!-- FINAL mostrarAviso -->
<?php
}; // SE CIERRA FUNCION ENTRADA MANUAL DE SOLICITUDES
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// UNDECIMA FUNCION: PROCESAR ENTRADA DE DATOS MANUAL
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function procesarManual(){require('02-albacon-php/04-variables-solicitudes.php');
//  PRIMERO SE FORMAN LOS ARRAY's CON LOS NOMBRES DE LOS "textarea" DE CADA CAMPO
  for($x=1;$x<=$numSolicitudes;$x++){$NUMtext[]='manualNUM'.$x;}
  for($x=1;$x<=$numSolicitudes;$x++){$DNItext[]='manualDNI'.$x;}
  for($x=1;$x<=$numSolicitudes;$x++){$Nombretext[]='manualNombre'.$x;}
  for($x=1;$x<=$numSolicitudes;$x++){$Apellidostext[]='manualApellidos'.$x;}
  for($x=1;$x<=$numSolicitudes;$x++){$Empresatext[]='manualEmpresa'.$x;}
  for($x=1;$x<=$numSolicitudes;$x++){$Vehiculotext[]='manualVehiculo'.$x;}
  for($x=1;$x<=$numSolicitudes;$x++){$FechaInicialtext[]='manualFechaInicial'.$x;}
  for($x=1;$x<=$numSolicitudes;$x++){$FechaFinaltext[]='manualFechaFinal'.$x;}
  for($x=1;$x<=$numSolicitudes;$x++){$Motivotext[]='manualMotivo'.$x;}
  for($x=1;$x<=$numSolicitudes;$x++){$Observacionestext[]='manualObservaciones'.$x;}
//  SEGUNDO: SE FORMAN LOS ARRAY's CON LOS DATOS DE CADA ACCESO
//    2.1) ARRAY DATO NUM
      for($x=0;$x<=$numSolicitudes-1;$x++){@$datoManualNUM[] = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace(
        array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
        array('a','A','e','E','i','I','o','O'.'u','U'),
          $_REQUEST[$NUMtext[$x]]))));};
//    2.2) ARRAY DATO DNI
      for($x=0;$x<=$numSolicitudes-1;$x++){@$datoManualDNI[] = str_replace('-','',str_replace(' ','-',strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
        array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
        array('a','A','e','E','i','I','o','O'.'u','U'),
          $_REQUEST[$DNItext[$x]]))))))));};
//    2.3) ARRAY DATO NOMBRE
      for($x=0;$x<=$numSolicitudes-1;$x++){@$datoManualNombre[] = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
        array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
        array('a','A','e','E','i','I','o','O'.'u','U'),
          $_REQUEST[$Nombretext[$x]]))))));};
//    2.4) ARRAY DATO APELLIDOS
      for($x=0;$x<=$numSolicitudes-1;$x++){@$datoManualApellidos[] = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
        array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
        array('a','A','e','E','i','I','o','O'.'u','U'),
          $_REQUEST[$Apellidostext[$x]]))))));};
//    2.5) ARRAY DATO EMPRESA
      for($x=0;$x<=$numSolicitudes-1;$x++){@$datoManualEmpresa[] = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
        array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
        array('a','A','e','E','i','I','o','O'.'u','U'),
          $_REQUEST[$Empresatext[$x]]))))));};
//    2.6) ARRAY DATO VEHICULO
      for($x=0;$x<=$numSolicitudes-1;$x++){@$datoManualVehiculo[] = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
        array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
        array('a','A','e','E','i','I','o','O'.'u','U'),
          $_REQUEST[$Vehiculotext[$x]]))))));};
//    2.7) ARRAY DATO FECHA INICIAL
      for($x=0;$x<=$numSolicitudes-1;$x++){@$datoManualFechaInicial[] = $_REQUEST[$FechaInicialtext[$x]];};
//    2.8) ARRAY DATO FECHA FINAL
      for($x=0;$x<=$numSolicitudes-1;$x++){@$datoManualFechaFinal[] = $_REQUEST[$FechaFinaltext[$x]];};
//    2.9) ARRAY DATO MOTIVO
      for($x=0;$x<=$numSolicitudes-1;$x++){@$datoManualMotivo[] = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
          array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
          array('a','A','e','E','i','I','o','O'.'u','U'),
          $_REQUEST[$Motivotext[$x]]))))));};
//    2.10) ARRAY DATO OBSERVACIONES
      for($x=0;$x<=$numSolicitudes-1;$x++){@$datoManualObservaciones[] = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
        array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
        array('a','A','e','E','i','I','o','O'.'u','U'),
          $_REQUEST[$Observacionestext[$x]]))))));};
//    2.11) SE DA VALOR A LA VARIABLE PROCESADO
      for($x=0;$x<=$numSolicitudes-1;$x++){@$datoManualProcesado[] = 'SI';};
//    2.12) SE GENERA EL CODIGO QR: NUM-IDsolicitante-UTC-IDResponsable ------- CAMPO PRIMARY KEY (Permite usar el progrma a varios usuarios a la vez)
      for($i=1;$i<=$numSolicitudes;$i++){$codigoQR[]=$i.'-'.$codigoSolicitante.'-'.$IDresponsable;};
//  TERCERO: COMPROBAMOS QUE EXISTA ALGUN REGISTRO PARA ESE CODIGO Y EVITAR ENTRADA DUPLICADA SI SE REFRESCA LA PAGINA O SI SE USAN FLECHAS ATRA/ADELANTE
//  * Para ello hacemos una primera consulta en la que obtenemos la variable $procesado, que es la cantidad de registros con PROCESADO = SI
$conexion_db;
$baseDatos;
$sql="SELECT PROCESADO FROM accesos_temp WHERE CODIGO='$codigoSolicitante' ";
$result=mysqli_query($conexion_db,$sql);
$procesado = mysqli_num_rows($result);
//  CUARTO: SE INSERTAN LOS DATOS EN LA BASE accesos_Temp CONDICIONADO A SI $procesado=0, ES DECIR NO HAY REGISTROS PARA ESA VARIABLE $codigoSolicitante
//  SI $procesado = 0 PROCESAMOS Y MOSTRAMOS
if($procesado <= 0){
$conexion_db;
$baseDatos;
for($i=1;$i<=$numSolicitudes;$i++){$i;$id=array($i);$id=$i-1;
  if($datoManualVehiculo[$id]==''){$datoManualVehiculo[$id] = 'SIN MATRICULA';}else{$datoManualVehiculo[$id];};  //  No dejar vacio dato matricula
  if($datoManualObservaciones[$id]==''){$datoManualObservaciones[$id] = 'NO PROCEDE';}else{$datoManualObservaciones[$id];}; // No dejar vacio dato observaciones
mysqli_query($conexion_db, "INSERT INTO accesos_temp (ID,CODIGO,CODIGO_QR,DNI,NOMBRE,APELLIDOS,EMPRESA,VEHICULO,FECHA_INICIO,FECHA_FINAL,MOTIVO,ID_RESPONSABLE,
OBSERVACIONES,PROCESADO)
VALUES ('$i','$codigoSolicitante','$codigoQR[$id]','$datoManualDNI[$id]','$datoManualNombre[$id]','$datoManualApellidos[$id]','$datoManualEmpresa[$id]','$datoManualVehiculo[$id]','$datoManualFechaInicial[$id]',
'$datoManualFechaFinal[$id]','$datoManualMotivo[$id]','$IDresponsable','$datoManualObservaciones[$id]','$datoManualProcesado[$id]')");};
mysqli_close($conexion_db);
;}else{}; // FINAL DE LA CONDICION DE PROCESADO
;}; //  FINALIZA FUNCION PARA PROCESAR LOS DATOS DE ENTRADA MANUAL
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// DUODECIMA FUNCION: MOSTRAR ENTRADA DE DATOS DESDE EXCEL
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mostrarEntradaExcel(){require('02-albacon-php/04-variables-solicitudes.php');?>
  <div id="mostrarEntradaExcel" name="mostrarEntradaExcel" class="oscurecerContenedor" style="">
      <div id="entradaExcel" name="entradaExcel" class="entradaExcel" style="background-image:url('fotos-archivos/Iberia/Logo-Blanco-02.png');">
          <div id="entradaExcelUno" name="entradaExcelUno" style="">
  <?php
              //echo '<br>';
              echo '<h1 style="text-align:center;margin-top:12px;">IMPORTAR DATOS</h1>';
              echo '<p style="font-size:15px;margin-top:-6px;margin-bottom:-8px;text-align:left;padding-left:10px;"><strong>GESTOR DE LA SOLICITUD:&nbsp&nbsp</strong>'.$nombreUsuario.' '.$apellidosUsuario.'</p>';
              if((@$pasos==5||@$pasos==6)&$IDresponsable<>''){
                echo '<p style="font-size:15px;margin-bottom:-8px;text-align:left;padding-left:10px;"><strong>RESPONSABLE DE LA VISITA:&nbsp&nbsp</strong>'.utf8_encode(@$nombreResponsable).' '.utf8_encode(@$apellidosResponsable).'</p>';}
              else{
              echo '<p style="font-size:15px;margin-bottom:-8px;text-align:left;padding-left:10px;"><strong>RESPONSABLE DE LA VISITA:&nbsp&nbsp</strong>';};
              echo '<p style="font-size:15px;margin-bottom:-8px;text-align:left;padding-left:10px;"><strong>EDIFICIO A VISITAR:&nbsp&nbsp</strong>'.$edificioVisita.'</p>';
              echo '<p style="font-size:15px;text-align:left;padding-left:10px;"><strong>Nº DE SOLICITUDES:&nbsp&nbsp</strong>'.$numSolicitudes.'</p>';
  ?>
          </div><!-- FINAL DE div entradaExcelUno -->
    
          <div id="mostrarBotonesUno" name="mostrarBotonesUno" class="mostrarBotonesUno" style="">
            <button id="pegar" class="boton" style="width:190px;" onclick="pegarExcel();">IMPORTAR DE EXCEL</button>
            <label id="pegadoOK" name="pegadoOK" class="pegadoOK" style="top:-6px;">LOS DATOS SE HAN IMPORTADO CORRECTAMENTE</label>
          </div>

          <div id="entradaExcelDos" name="entradaExcelDos" class="entradaExcelDos" style="">
      <form id="text" name="text" onsubmit="return validarAreaExcel();" action="solicitudes.php" method="post">
        
          <textarea id="texto" name="texto" cols="9" row="40" class="clip-text" wrap="off" autocomplete="off" style="" placeholder='&#10; PULSE "IMPORTAR" PARA PEGAR&#10; LOS DATOS COPIADOS EN EXCEL'></textarea><br>
          
          <input type="hidden" id="pasos" name="pasos" value="6"/>
          <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>

          <input type="hidden" id="numSolicitudes" name="numSolicitudes" value="<?php echo $numSolicitudes; ?>"/>
          <input type="hidden" id="edificioVisita" name="edificioVisita" value="<?php echo $edificioVisita; ?>"/>
          <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>
          
          <input type="hidden" id="IDresponsable" name="IDresponsable" value="<?php echo utf8_encode(@$IDresponsable); ?>"/>
          <input type="hidden" id="nombreResponsable" name="nombreResponsable" value="<?php echo utf8_encode(@$nombreResponsable); ?>"/>
          <input type="hidden" id="apellidosResponsable" name="apellidosResponsable" value="<?php echo utf8_encode(@$apellidosResponsable); ?>"/>
          <input type="hidden" id="telefonoResponsable" name="telefonoResponsable" value="<?php echo @$telefonoResponsable; ?>"/>
          <input type="hidden" id="correoResponsable" name="correoResponsable" value="<?php echo utf8_encode(@$correoResponsable); ?>"/>
  
          <input type="hidden" id="cancelarSolicitud"name="cancelarSolicitud" value="NO">
          
      </div><!-- Final div entradaExcelDos -->
      <div id="mostrarBotonesDos" name="mostrarBotonesDos" class="mostrarBotonesDos" style="">
      <table id="botonesMostrar" style="width:100%;">
        <tr>
          <td style="text-align:right;"><button id="enviar" class="boton" style="width:190px;">CONTINUAR SOLICITUD</button></td>
    </form>
    <form id="cambiarSolicitud" name="cambiarSolicitud" action="solicitudes.php" method="post">
          <input type="hidden" id="pasos" name="pasos" value="2"/>
          <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>

          <input type="hidden" id="numSolicitudes" name="numSolicitudes" value="<?php echo $numSolicitudes; ?>"/>
          <input type="hidden" id="edificioVisita" name="edificioVisita" value="<?php echo $edificioVisita; ?>"/>
          <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>
  
          <input type="hidden" id="IDresponsable" name="IDresponsable" value="<?php echo utf8_encode(@$IDresponsable); ?>"/>
          <input type="hidden" id="nombreResponsable" name="nombreResponsable" value="<?php echo utf8_encode(@$nombreResponsable); ?>"/>
          <input type="hidden" id="apellidosResponsable" name="apellidosResponsable" value="<?php echo utf8_encode(@$apellidosResponsable); ?>"/>
          <input type="hidden" id="telefonoResponsable" name="telefonoResponsable" value="<?php echo @$telefonoResponsable; ?>"/>
          <input type="hidden" id="correoResponsable" name="correoResponsable" value="<?php echo utf8_encode(@$correoResponsable); ?>"/>
    
          <td style="text-align:left;"><button id="cambiar" class="boton" style="width:190px;">CAMBIAR SOLICITUD</button></td>
        </tr>
    </form>
      </table>
      </div><!-- Final mostrar botones -->
    </div><!-- Final div entradaExcel -->
  </div><!-- Final div mostrarEntradaExcel -->
  <?php
  }; // FINAL DE LA FUNCION ENTRADA EXCEL
  // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// DECIMOTERCERA FUNCION: VALIDACION DEL NUMERO DE ACCESOS SOLICITADOS POR EXCEL
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function validarNumSolicitudes(){require('02-albacon-php/04-variables-solicitudes.php');
// 1) COMPROBAMOS QUE EXISTA ALGUN REGISTRO PARA ESE CODIGO Y EVITAR ENTRADA DUPLICADA SI SE REFRESCA LA PAGINA O SI SE USAN FLECHAS ATRA/ADELANTE
//  * Para ello hacemos una primera consulta en la que obtenemos la variable $procesado, que es la cantidad de registros con PROCESADO = SI
$conexion_db;
$baseDatos;
$sql="SELECT PROCESADO FROM accesos_temp WHERE CODIGO='$codigoSolicitante' ";
$result=mysqli_query($conexion_db,$sql);
// 2) SEPARAMOS POR TABULACIONES Y FILAS
@$datosFila=explode("\t",$datosExcel);
foreach($datosFila as $datosRotos){$datos[] = explode("\n", $datosRotos);};
// 3) OBTENEMOS EL CONTADOR DE FILAS:
$contadorFilas= (count($datos)-1)/8;
$limite=($contadorFilas)*8;
// 4) SE EVALUA LA CANTIDAD DE ACCESOS INTRODUCIDOS EN EL TEXTAREA DE ENTRADA EXCEL COMPARANDO CON EL NUMERO DE SOLICITUDES INDICADAS
if($numSolicitudes<>$contadorFilas){mostrarEntradaExcel();
?>
<div id="avisoSolicitudes" name="avisoSolicitudes" class="oscurecerContenedor">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAviso">
    <p style="font-size:20px;text-align:center;font-weight:bold;color:rgb(224, 23, 50, 1);">AVISO IMPORTANTE</p>
    <p style="font-size:18px;color:rgb(0,0,0,0.7);">EL NUMERO DE ACCESOS INTRODUCIDO NO COINCIDE<br>CON LA CANTIDAD DE ACCESOS SOLICITADOS</p>
      <form action="solicitudes.php" method="post">
        <input type="hidden" id="comprobarUsuario" name="comprobarUsuario" value="10"/>
        <input type="hidden" id="pasos" name="pasos" value="5"/>
        <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>

        <input type="hidden" id="numSolicitudes" name="numSolicitudes" value="<?php echo $numSolicitudes; ?>"/>
        <input type="hidden" id="edificioVisita" name="edificioVisita" value="<?php echo $edificioVisita; ?>"/>
        <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>

        <input type="hidden" id="IDresponsable" name="IDresponsable" value="<?php echo utf8_encode(@$IDresponsable); ?>"/>
        <input type="hidden" id="nombreResponsable" name="nombreResponsable" value="<?php echo utf8_encode(@$nombreResponsable); ?>"/>
        <input type="hidden" id="apellidosResponsable" name="apellidosResponsable" value="<?php echo utf8_encode(@$apellidosResponsable); ?>"/>
        <input type="hidden" id="telefonoResponsable" name="telefonoResponsable" value="<?php echo @$telefonoResponsable; ?>"/>
        <input type="hidden" id="correoResponsable" name="correoResponsable" value="<?php echo utf8_encode(@$correoResponsable); ?>"/>
        <input type="submit" class="boton" value="ACEPTAR" style="width:90px;height:26px;">
      </form>
    </div>
  </div>
<?php
;}else{procesarExcel();};  // FINAL DE LA CONDICION: SI COINCIDEN Nº DE SOLICITUDES Y ACCESOS ENVIADOS SE PROCESA  ENTRADA EXCEL
mysqli_close($conexion_db);
}; // FINAL DE VALIDACION NUMERO DE SOLICITUDES
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// DECIMOCUARTA FUNCION: PROCESAR DATOS DE ENTRADA EXCEL
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function procesarExcel(){require('02-albacon-php/04-variables-solicitudes.php');
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// PRIMERO: COMPROBAMOS QUE EXISTA ALGUN REGISTRO PARA ESE CODIGO Y EVITAR ENTRADA DUPLICADA SI SE REFRESCA LA PAGINA O SI SE USAN FLECHAS ATRA/ADELANTE
//  * Para ello hacemos una primera consulta en la que obtenemos la variable $procesado, que es la cantidad de registros con PROCESADO = SI
$conexion_db;
$baseDatos;
$sql="SELECT PROCESADO FROM  accesos_temp WHERE CODIGO='$codigoSolicitante' ";
$result=mysqli_query($conexion_db,$sql);
$procesado = mysqli_num_rows($result);
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// SEGUNDO: CONDICIONAMOS INSERTAR A SI $procesado ES 0, ES DECIR NO HAY REGISTROS PARA ESA VARIABLE $codigoSolicitante
//  SI $procesado = 0 PROCESAMOS Y MOSTRAMOS
if($procesado <= 0){
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// TERCERO: PROCESAMOS LOS DATOS
// -------------------------------------------------------------------------------------------------------------------------------------------------
// 1) SE QUITAN LAS TILDES Y LOS ESPACIOS POR DELANTE Y DETRAS, ASI COMO LOS DOBLES ESPACIOS
$datosExcel = str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
  array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
  array('a','A','e','E','i','I','o','O'.'u','U'),$datosExcel)));
// 2) SEPARAMOS POR TABULACIONES Y FILAS
@$datosFila=explode("\t",$datosExcel);
foreach($datosFila as $datosRotos){$datos[] = explode("\n", $datosRotos);};
// 3) OBTENEMOS EL CONTADOR DE FILAS:
$contadorFilas= (count($datos)-1)/8;
$limite=($contadorFilas)*8;
// 4) SE QUITAN LOS DATOS DOBLES, PARA LUEGO PODER QUITAR EL DATO DEL PRIMER DNI
for($i=0;$i<=$limite;$i){unset($datosFila[$i=$i+8]);};
// 'Dato 8 separado: <br>';
//echo 'Dato OBSERVACIONES: '.$datos[8][0].'<br>';
//echo 'Dato DNI: '.$datos[8][1].'<br>';
// 5) SE EXTRAE EL VALOR DEL PRIMER DNI
$primerDni = array_shift($datosFila);
//echo 'Dato PRIMER DNI: '.$primerDni.'<br>';
// VEMOS COMO QUEDA EL ARRAY SIN ESE PRIMER DATO (PRIMER DNI)
//echo '<strong>VEMOS COMO QUEDA EL ARRAY SIN ESE PRIMER DATO (PRIMER DNI) Y CON LOS DATOS DOBLES (DNI Y OBSERVACIONES): </strong><br>';
//print_r($datosFila);
// 6) SE CREA EL LIMITE NUEVO PARA CEAR LOS ARRAY'S DE LOS DISTINTOS DATOS
$limite2=count($datosFila)-1;
//echo 'Nuevo Limite: '.$limite2;
//echo '<hr>';
// 7) SE FORMAN LOS ARRAY's DE LOS DIFERENTES DATOS EN EL SIGUIENTE ORDEN:
//    7.1) SE FORMA CON LOS DATOS DE OBSERVACIONES
$datoObservaciones=array();
for($i=0;$i<=$limite-1;$i){$datoObservaciones[]=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($datos[$i=$i+8][0])))));};
//    7.2) SE FORMA CON LOS DATOS DE LOS DNI
@$datoDNI=array();
@$datoDNI[0]=str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace('-','',str_replace(' ','-',strtoupper(preg_replace('/\s+/', ' ',trim($primerDni)))))));
for($i=0;$i<=($limite-10);$i){$x=1+$i/8; @$datoDNI[$x++]=str_replace('-','',str_replace(' ','-',strtoupper(preg_replace('/\s+/', ' ',trim($datos[$i=$i+8][1])))));};
//    7.3) SE FORMA ARRAY DE LOS DATOS NOMBRE
@$datoNombre=array();
for($i=0;$i<=$limite2;$i=$i+7){$datoNombre[]=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($datosFila[$i])))));};
//    7.4) SE FORMA ARRAY DE LOS DATOS APELLIDOS
@$datoApellidos=array();
for($i=1;$i<=($limite2+1);$i=$i+7){$datoApellidos[]=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($datosFila[$i])))));};
//    7.5) SE FORMA ARRAY DE LOS DATOS EMPRESA 
@$datoEmpresa=array();
for($i=2;$i<=($limite2+2);$i=$i+7){$datoEmpresa[]=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($datosFila[$i])))));};
//    7.6) SE FORMA ARRAY DE LOS DATOS MATRICULA
@$datoVehiculo=array();
for($i=3;$i<=($limite2+3);$i=$i+7){$datoVehiculo[]=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($datosFila[$i])))));};
//    7.7) SE FORMA ARRAY DE LOS DATOS FECHA INICIO
@$datoFechaInicial=array();
for($i=4;$i<=($limite2+4);$i=$i+7){$datoFechaInicial[]=preg_replace('/\s+/', ' ',trim($datosFila[$i]));};
//    7.8) SE FORMA ARRAY DE LOS DATOS FECHA FINAL
@$datoFechaFinal=array();
for($i=5;$i<=($limite2+5);$i=$i+7){$datoFechaFinal[]=preg_replace('/\s+/', ' ',trim($datosFila[$i]));};
//    7.9) SE FORMA ARRAY DE LOS DATOS MOTIVO
@$datoMotivo=array();
for($i=6;$i<=($limite2+6);$i=$i+7){$datoMotivo[]=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($datosFila[$i])))));};
//    7.10) SE DA VALOR A LA VARIABLE PROCESADO
@$procesado='SI';
//    7.11) SE GENERA EL CODIGO QR: NUM-IDsolicitante-UTC-IDResponsable ------- CAMPO PRIMARY KEY (Permite usar el progrma a varios usuarios a la vez)
for($i=1;$i<=$contadorFilas;$i++){$codigoQR[]=$i.'-'.$codigoSolicitante.'-'.$IDresponsable;};
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// CUARTO: SE INSERTAN LOS DATOS EN LA BASE DE ACCESOS TEMPORALES
// -------------------------------------------------------------------------------------------------------------------------------------------------
$conexion_db;
$baseDatos;
for($i=1;$i<=$contadorFilas;$i++){$i;$id=array($i);$id=$i-1;
  if($datoVehiculo[$id]==''){$datoVehiculo[$id] = 'SIN DATO';}else{$datoVehiculo[$id];};  //  No dejar vacio dato matricula
  if($datoObservaciones[$id]==''){$datoObservaciones[$id] = 'NO PROCEDE';}else{$datoObservaciones[$id];}; // No dejar vacio dato observaciones
mysqli_query($conexion_db, "INSERT INTO accesos_temp (ID,NUM,CODIGO,CODIGO_QR,DNI,NOMBRE,APELLIDOS,EMPRESA,VEHICULO,FECHA_INICIO,FECHA_FINAL,MOTIVO,ID_RESPONSABLE,
OBSERVACIONES,PROCESADO)
VALUES ('$i','$i','$codigoSolicitante','$codigoQR[$id]','$datoDNI[$id]','$datoNombre[$id]','$datoApellidos[$id]','$datoEmpresa[$id]','$datoVehiculo[$id]','$datoFechaInicial[$id]',
'$datoFechaFinal[$id]','$datoMotivo[$id]','$IDresponsable','$datoObservaciones[$id]','$procesado')");};
mysqli_close($conexion_db);
mostrarDatosAccesos();mostrarTablaAccesos();}else{mostrarDatosAccesos();mostrarTablaAccesos();
}; // FINAL DE LA CONDICION DE PROCESADO

;}; // FINAL DE LA FUNCION PARA PROCESAR DATOS DE ENTRADA EXCEL  
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// DECIMOQUINTA FUNCION: MOSTRAR LOS DATOS INICIALES DE LOS ACCESOS SOLICITADOS
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mostrarDatosAccesos(){require('02-albacon-php/04-variables-solicitudes.php');
// SE CREA UNA TABLA A BASE DE DIV's EN VEZ DE TABLAS HTML (MAS DIFICILES DE DAR FORMATO)
?>
<div id="divMostrarAccesos" class="divMostrarAccesos" style="<?php @$pasos;if(@$pasos<>6 & @$pasos<>7 & @$pasos<>9 & @$pasos<>11 & @$pasos<>12){echo 'display:none';} ?>;">
<?php
// PARA CONOCER Y EVALUAR EL NUMERO DEFINITIVO DE SOLICITUDES ENVIADAS SE REALIZA UNA CONSULTA A LA BASE "accesos_temp"
// Se crea la variable $numResto para conocer las solicitudes reales que se van a enviar (sustituye a $numSolicitudes solo en mostrar dato)
$conexion_db;
$baseDatos;
$sql="SELECT * FROM accesos_temp WHERE CODIGO='$codigoSolicitante' ";
$result=mysqli_query($conexion_db,$sql);
$numResto = mysqli_num_rows($result);
    echo '<h1 style="text-align:center;">ACCESOS SOLICITADOS</h1>';
    echo '<p style="font-size:14px;text-align:left;margin-top:-14px;margin-bottom:-10px;"><strong>GESTOR DE LA SOLICITUD:&nbsp&nbsp</strong>'.$nombreUsuario.' '.$apellidosUsuario.'</p>';
    echo '<p style="font-size:14px;text-align:left;margin-bottom:-10px;"><strong>RESPONSABLE DE LA VISITA:&nbsp&nbsp</strong>'.$nombreResponsable.' '.utf8_encode($apellidosResponsable).'</p>';
    echo '<p style="font-size:14px;text-align:left;margin-bottom:-10px;"><strong>Nº DE SOLICITUDES:&nbsp&nbsp</strong>'.$numResto.'</p>'; //$numSolicitudes
    echo '<p style="font-size:14px;text-align:left;"><strong>EDIFICIO A VISITAR:&nbsp&nbsp</strong>'.$edificioVisita.'</p>';
    mysqli_close($conexion_db);
?>
</div>
<?php
;}; // FINAL DE LA FUNCION MOSTRAR DATOS INICIALES
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// DECIMOSEXTA FUNCION: MOSTRAR LOS DATOS DE ACCESOS SOLICITADOS EN UNA TABLA
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mostrarTablaAccesos(){require('02-albacon-php/04-variables-solicitudes.php');
// SE CREA UNA TABLA A BASE DE DIV's EN VEZ DE TABLAS HTML (MAS DIFICILES DE DAR FORMATO)
?>
  <div id="divMostrarAccesos" class="divMostrarAccesos" style="overflow-y:auto;overflow-x:none;<?php @$pasos;if(@$pasos<>6 & @$pasos<>7 & @$pasos<>9 & @$pasos<>11 & @$pasos<>12){echo 'display:none';} ?>;">
<?php
// PARA CONOCER Y EVALUAR EL NUMERO DEFINITIVO DE SOLICITUDES ENVIADAS SE REALIZA UNA CONSULTA A LA BASE "accesos_temp"
// Se crea la variable $numResto para conocer las solicitudes reales que se van a enviar (sustituye a $numSolicitudes solo en mostrar dato)
$conexion_db;
$baseDatos;
$sql="SELECT * FROM accesos_temp WHERE CODIGO='$codigoSolicitante' ";
$result=mysqli_query($conexion_db,$sql);
$numResto = mysqli_num_rows($result);
?>
  <div id="filaEncabezados" name="filaEncabezados" style="display:inline-flex;width:100%;height:32px;border:0px solid rgb(218, 217, 217);">
      <div class="divEncabezado" style="width:20px;border:1px solid rgb(255,255,255,1);background-color:rgb(255,255,255,1);"></div>
      <div class="divEncabezado" style="width:7.5%;"><p style="margin-top:3px;font-size:13px;">DNI<br>PASAPORTE</p></div>
      <div class="divEncabezado" style="width:10%;"><p style="font-size:14px;">NOMBRE</div>
      <div class="divEncabezado" style="width:15.8%;"><p style="font-size:14px;">APELLIDOS</p></div>
      <div class="divEncabezado" style="width:12%;"><p style="font-size:14px;">EMPRESA</p></div>
      <div class="divEncabezado" style="width:6.2%;"><p style="font-size:14px;">VEHICULO</p></div>
      <div class="divEncabezado" style="width:5.5%;"><p style="margin-top:3px;font-size:13px;">FECHA<br>INICIO</p></div>
      <div class="divEncabezado" style="width:5.5%;"><p style="margin-top:3px;font-size:13px;">FECHA<br>FINAL</p></div>
      <div class="divEncabezado" style="width:12%;"><p style="font-size:14px;">MOTIVO VISITA</p></div>
      <div class="divEncabezado" style="width:17%;"><p style="font-size:14px;">OBSEVACIONES</p></div>
      <div class="divEncabezado" style="width:16px;border:1px solid rgb(255,255,255,1);background-color:rgb(255,255,255,1);"></div>
      <div class="divEncabezado" style="width:16px;border:1px solid rgb(255,255,255,1);background-color:rgb(255,255,255,1);"></div>
  </div><!-- final fila de encabezados -->
  <?php
  // PRIMERO SE SELECCIONAN LOS DATOS
  $conexion_db;
  $baseDatos;
  $sql="SELECT * FROM accesos_temp WHERE CODIGO='$codigoSolicitante' ";
  $result=mysqli_query($conexion_db,$sql);
  $num = mysqli_num_rows($result);
  // SEGUNDO SE ORDENAN LOS DATOS
  $sql00= "SELECT * FROM accesos_temp WHERE CODIGO='$codigoSolicitante' ORDER BY NUM ASC ";
  $result=mysqli_query($conexion_db,$sql00);
  //VALIDACION DE FECHAS  ----------------------------------------------------------------------------------------------------------------------------
  // PRIMERO: SE GENERAN LAS VARIABLES DE FECHA ACTUAL (UTC) NECEARIAS PARA LA VALIDACION DE LA FECHAS INICIAL Y FINAL
      @$utc=time();
      @$utc=date("d/m/Y", $utc);
      //@$utc='15/11/2023'; // AQUI SE PUEDE CAMBIAR UTC PARA COMPROBAR EL FUNCIONAMIENTO DE LA VALIZACION
      @$fechaUTC=explode('/', $utc);
      @$diaUTC=$fechaUTC[0];@$mesUTC=$fechaUTC[1];@$anioUTC=intval($fechaUTC[2]);
      if($diaUTC[0]=='0'){$diaUTC=$diaUTC[1];}else{$diaUTC=$diaUTC;intval($diaUTC);};
      if($mesUTC[0]=='0'){$mesUTC=$mesUTC[1];}else{$mesUTC=$mesUTC;intval($mesUTC);};
  // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  // CON EL SIGUIENTE BUCLE FOR SE GENERAN TODAS FILAS NECESARIAS PARA MOSTRAR LOS ACCESOS SOLICITADOS   XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  for($i=1;$i<=$num;$i++){$mostrar=mysqli_fetch_array($result);$i;
  // SEGUNDO: SE GENERAN LAS VARIABLES DE FECHAS INICIAL Y FINAL DENTRO DEL BUCLE
  @$fechaI = $mostrar['FECHA_INICIO']; @$Inicial = $fechaI;
    $fechaI=explode('/', $fechaI);
    if($fechaI[0]=='0'){@$diaI=$fechaI[1];intval($diaI);}else{@$diaI=$fechaI[0];intval($diaI);};
    if($fechaI[0]=='0'){@$mesI=$fechaI[1];intval($mesI);}else{@$mesI=$fechaI[1];intval($mesI);};
    @$anioI=intval($fechaI[2]);
  @$fechaF = $mostrar['FECHA_FINAL'];@$Final=$fechaF;
    $fechaF=explode('/', $fechaF);
    if($fechaF[0]=='0'){@$diaF=$fechaF[1];intval($diaF);}else{@$diaF=$fechaF[0];intval($fechaF);};
    if($fechaF[0]=='0'){@$mesF=$fechaF[1];intval($mesF);}else{@$mesF=$fechaF[1];intval($fechaF);};
    @$anioF=intval($fechaF[2]);
  // TERCERO: CREACION DE LAS VARIABLES BISIESTO
  if($anioUTC==2024or$anioUTC==2028or$anioUTC==2032or$anioUTC==2036or$anioUTC==2040){@$bisiestoUTC='SI';}else{@$bisiestoUTC='NO';};
  if($anioI==2024or$anioI==2028or$anioI==2032or$anioI==2036or$anioI==2040){@$bisiestoI='SI';}else{@$bisiestoI='NO';};
  if($anioF==2024or$anioF==2028or$anioF==2032or$anioF==2036or$anioF==2040){@$bisiestoF='SI';}else{@$bisiestoF='NO';};
  // CUARTO: CREACION DE LAS VARIABLES CANTIDAD DE DIAS AL MES
  // 1) PARA FECHA DE HOY-UTC
  if($bisiestoUTC=='NO'){if($mesUTC==1or$mesUTC==3or$mesUTC==5or$mesUTC==7or$mesUTC==8or$mesUTC==10or$mesUTC==12){@$diasMesUTC=31;};}
  elseif($bisiestoUTC=='SI'){if($mesUTC==1or$mesUTC==3or$mesUTC==5or$mesUTC==7or$mesUTC==8or$mesUTC==10or$mesUTC==12){@$diasMesUTC_B=31;};}
  else {};
  if($bisiestoUTC=='NO'){if($mesUTC==4or$mesUTC==6or$mesUTC==9or$mesUTC==11){@$diasMesUTC=30;};}
  elseif($bisiestoUTC=='SI'){if($mesUTC==4or$mesUTC==6or$mesUTC==9or$mesUTC==11){@$diasMesUTC_B=30;};}
  else{};
  if($bisiestoUTC=='NO'){if($mesUTC==2){@$diasMesUTC=28;};}
  elseif($bisiestoUTC=='SI'){if($mesUTC==2){@$diasMesUTC_B=29;};}
  else{};
  // 2) PARA FECHA INICIAL
  if($bisiestoI=='NO'){if($mesI==1or$mesI==3or$mesI==5or$mesI==7or$mesI==8or$mesI==10or$mesI==12){@$diasMesI=31;};}
  elseif($bisiestoI=='SI'){if($mesI==1or$mesI==3or$mesI==5or$mesI==7or$mesI==8or$mesI==10or$mesI==12){@$diasMesI_B=31;};}
  else {};
  if($bisiestoI=='NO'){if($mesI==4or$mesI==6or$mesI==9or$mesI==11){@$diasMesI=30;};}
  elseif($bisiestoI=='SI'){if($mesI==4or$mesI==6or$mesI==9or$mesI==11){@$diasMesI_B=30;};}
  else{};
  if($bisiestoI=='NO'){if($mesI==2){@$diasMesI=28;};}
  elseif($bisiestoI=='SI'){if($mesI==2){@$diasMesI_B=29;};}
  else{};
  // 3) PARA FECHA FINAL
  if($bisiestoF=='NO'){if($mesF==1or$mesF==3or$mesF==5or$mesF==7or$mesF==8or$mesF==10or$mesF==12){@$diasMesF=31;};}
  elseif($bisiestoF=='SI'){if($mesF==1or$mesF==3or$mesF==5or$mesF==7or$mesF==8or$mesF==10or$mesF==12){@$diasMesF_B=31;};}
  else {};
  if($bisiestoF=='NO'){if($mesF==4or$mesF==6or$mesF==9or$mesF==11){@$diasMesF=30;};}
  elseif($bisiestoF=='SI'){if($mesF==4or$mesF==6or$mesF==9or$mesF==11){@$diasMesF_B=30;};}
  else{};
  if($bisiestoF=='NO'){if($mesF==2){@$diasMesF=28;};}
  elseif($bisiestoF=='SI'){if($mesF==2){@$diasMesF_B=29;};}
  else{};
  // QUINTO: CREACION DE VARIABLES PARA DIAS ACUMULADOS A LO LARGO DEL AÑO
  // UTC: AÑOS NO BISIESTOS (0,31,59,90,120,151,181,212,243,273,304,334)
  if($mesUTC==1&$bisiestoUTC=='NO'){$acuUTC=intval($diaUTC);};
  if($mesUTC==2&$bisiestoUTC=='NO'){$acuUTC=31+intval($diaUTC);};
  if($mesUTC==3&$bisiestoUTC=='NO'){$acuUTC=59+intval($diaUTC);};
  if($mesUTC==4&$bisiestoUTC=='NO'){$acuUTC=90+intval($diaUTC);};
  if($mesUTC==5&$bisiestoUTC=='NO'){$acuUTC=120+intval($diaUTC);};
  if($mesUTC==6&$bisiestoUTC=='NO'){$acuUTC=151+intval($diaUTC);};
  if($mesUTC==7&$bisiestoUTC=='NO'){$acuUTC=181+intval($diaUTC);};
  if($mesUTC==8&$bisiestoUTC=='NO'){$acuUTC=212+intval($diaUTC);};
  if($mesUTC==9&$bisiestoUTC=='NO'){$acuUTC=243+intval($diaUTC);};
  if($mesUTC==10&$bisiestoUTC=='NO'){$acuUTC=273+intval($diaUTC);};
  if($mesUTC==11&$bisiestoUTC=='NO'){$acuUTC=304+intval($diaUTC);};
  if($mesUTC==12&$bisiestoUTC=='NO'){$acuUTC=334+intval($diaUTC);};
  // UTC: AÑOS BISIESTOS (0,31,60,91,121,152,182,213,244,274,305,335)
  if($mesUTC==1&$bisiestoUTC=='SI'){$acuUTC_B=intval($diaUTC);};
  if($mesUTC==2&$bisiestoUTC=='SI'){$acuUTC_B=31+intval($diaUTC);};
  if($mesUTC==3&$bisiestoUTC=='SI'){$acuUTC_B=60+intval($diaUTC);};
  if($mesUTC==4&$bisiestoUTC=='SI'){$acuUTC_B=91+intval($diaUTC);};
  if($mesUTC==5&$bisiestoUTC=='SI'){$acuUTC_B=121+intval($diaUTC);};
  if($mesUTC==6&$bisiestoUTC=='SI'){$acuUTC_B=152+intval($diaUTC);};
  if($mesUTC==7&$bisiestoUTC=='SI'){$acuUTC_B=182+intval($diaUTC);};
  if($mesUTC==8&$bisiestoUTC=='SI'){$acuUTC_B=213+intval($diaUTC);};
  if($mesUTC==9&$bisiestoUTC=='SI'){$acuUTC_B=244+intval($diaUTC);};
  if($mesUTC==10&$bisiestoUTC=='SI'){$acuUTC_B=274+intval($diaUTC);};
  if($mesUTC==11&$bisiestoUTC=='SI'){$acuUTC_B=305+intval($diaUTC);};
  if($mesUTC==12&$bisiestoUTC=='SI'){$acuUTC_B=335+intval($diaUTC);};
  // INICIAL: AÑOS NO BISIESTOS (0,31,59,90,120,151,181,212,243,273,304,334)
  if($mesI==1&$bisiestoI=='NO'){$acuI=intval($diaI);};
  if($mesI==2&$bisiestoI=='NO'){$acuI=31+intval($diaI);};
  if($mesI==3&$bisiestoI=='NO'){$acuI=59+intval($diaI);};
  if($mesI==4&$bisiestoI=='NO'){$acuI=90+intval($diaI);};
  if($mesI==5&$bisiestoI=='NO'){$acuI=120+intval($diaI);};
  if($mesI==6&$bisiestoI=='NO'){$acuI=151+intval($diaI);};
  if($mesI==7&$bisiestoI=='NO'){$acuI=181+intval($diaI);};
  if($mesI==8&$bisiestoI=='NO'){$acuI=212+intval($diaI);};
  if($mesI==9&$bisiestoI=='NO'){$acuI=243+intval($diaI);};
  if($mesI==10&$bisiestoI=='NO'){$acuI=273+intval($diaI);};
  if($mesI==11&$bisiestoI=='NO'){$acuI=304+intval($diaI);};
  if($mesI==12&$bisiestoI=='NO'){$acuI=334+intval($diaI);};
  // INICIAL: AÑOS BISIESTOS (0,31,60,91,121,152,182,213,244,274,305,335)
  if($mesI==1&$bisiestoI=='SI'){$acuI_B=intval($diaI);};
  if($mesI==2&$bisiestoI=='SI'){$acuI_B=31+intval($diaI);};
  if($mesI==3&$bisiestoI=='SI'){$acuI_B=60+intval($diaI);};
  if($mesI==4&$bisiestoI=='SI'){$acuI_B=91+intval($diaI);};
  if($mesI==5&$bisiestoI=='SI'){$acuI_B=121+intval($diaI);};
  if($mesI==6&$bisiestoI=='SI'){$acuI_B=152+intval($diaI);};
  if($mesI==7&$bisiestoI=='SI'){$acuI_B=182+intval($diaI);};
  if($mesI==8&$bisiestoI=='SI'){$acuI_B=213+intval($diaI);};
  if($mesI==9&$bisiestoI=='SI'){$acuI_B=244+intval($diaI);};
  if($mesI==10&$bisiestoI=='SI'){$acuI_B=274+intval($diaI);};
  if($mesI==11&$bisiestoI=='SI'){$acuI_B=305+intval($diaI);};
  if($mesI==12&$bisiestoI=='SI'){$acuI_B=335+intval($diaI);};
  // FINAL: AÑOS NO BISIESTOS (0,31,59,90,120,151,181,212,243,273,304,334)
  if($mesF==1&$bisiestoF=='NO'){$acuF=intval($diaF);};
  if($mesF==2&$bisiestoF=='NO'){$acuF=31+intval($diaF);};
  if($mesF==3&$bisiestoF=='NO'){$acuF=59+intval($diaF);};
  if($mesF==4&$bisiestoF=='NO'){$acuF=90+intval($diaF);};
  if($mesF==5&$bisiestoF=='NO'){$acuF=120+intval($diaF);};
  if($mesF==6&$bisiestoF=='NO'){$acuF=151+intval($diaF);};
  if($mesF==7&$bisiestoF=='NO'){$acuF=181+intval($diaF);};
  if($mesF==8&$bisiestoF=='NO'){$acuF=212+intval($diaF);};
  if($mesF==9&$bisiestoF=='NO'){$acuF=243+intval($diaF);};
  if($mesF==10&$bisiestoF=='NO'){$acuF=273+intval($diaF);};
  if($mesF==11&$bisiestoF=='NO'){$acuF=304+intval($diaF);};
  if($mesF==12&$bisiestoF=='NO'){$acuF=334+intval($diaF);};
  // FINAL: AÑOS BISIESTOS (0,31,60,91,121,152,182,213,244,274,305,335)
  if($mesF==1&$bisiestoF=='SI'){$acuF_B=intval($diaF);};
  if($mesF==2&$bisiestoF=='SI'){$acuF_B=31+intval($diaF);};
  if($mesF==3&$bisiestoF=='SI'){$acuF_B=60+intval($diaF);};
  if($mesF==4&$bisiestoF=='SI'){$acuF_B=91+intval($diaF);};
  if($mesF==5&$bisiestoF=='SI'){$acuF_B=121+intval($diaF);};
  if($mesF==6&$bisiestoF=='SI'){$acuF_B=152+intval($diaF);};
  if($mesF==7&$bisiestoF=='SI'){$acuF_B=182+intval($diaF);};
  if($mesF==8&$bisiestoF=='SI'){$acuF_B=213+intval($diaF);};
  if($mesF==9&$bisiestoF=='SI'){$acuF_B=244+intval($diaF);};
  if($mesF==10&$bisiestoF=='SI'){$acuF_B=274+intval($diaF);};
  if($mesF==11&$bisiestoF=='SI'){$acuF_B=305+intval($diaF);};
  if($mesF==12&$bisiestoF=='SI'){$acuF_B=335+intval($diaF);};
  // SEXTO: SE PASAN A FORMA NUMERICA LOS ACUMULADOS PARA TRABAJAR DE FORMA SEGURA
  @$acuUTC=intval($acuUTC);
  @$acuI=intval($acuI);
  @$acuF=intval($acuF);
  @$acuUTC_B=intval($acuUTC_B);
  @$acuI_B=intval($acuI_B);
  @$acuF_B=intval($acuF_B);
  // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  // SEPTIMO: VALORACIONES DE FECHAS CON EL FORMATO -----------------------------------------------------------------------------------------------------
  // CREACION DE VARIABLES PARA CLASS DE ERROR -------------------------------------------------------------------------------------------------
  @$sinError='style="width:5.5%;color:black;background-color:rgb(255, 255, 255, 1);"';
  @$conError='style="width:5.5%;color:red;background-color:rgb(250, 195, 195, 0.5);"';
  @$conUrge='style="width:5.5%;color:red;background-color:rgb(108, 250, 115, 0.6);"';
  //@$sinNada='style="color:black;background-color:rgb(218, 217, 217, 1);"';
  //@$styleUTC='style="color:black;background-color:rgb(180, 230, 240, 1);"';
  //@$prueba='style="color:black;background-color:rgb(20,185,225,1);"';
  ?>
  <div id="filaDatos" name="filaDatos" style="display:inline-flex;width:100%;height:22px;border:0px solid rgb(218, 217, 217);">
      <div class="divDato" style="width:20px;font-weight:bold;border:1px solid rgb(218,217,217);background-color:rgb(180, 230, 240, 0.8);"><p><?php echo $i;?></p></div>
      <div class="divDato" <?php if(empty($mostrar['DNI'])){@$errorFecha=4;echo 'style="width:7.5%;background-color:rgb(250, 195, 195, 0.5);"';}else{echo 'style="width:7.5%;"';};?> ><p><?php echo $mostrar['DNI'];?></p></div>
      <div class="divDato" <?php if(empty($mostrar['NOMBRE'])){@$errorFecha=4;echo 'style="width:10%;background-color:rgb(250, 195, 195, 0.5);"';}else{echo 'style="width:10%;"';};?> ><p><?php echo $mostrar['NOMBRE'];?></p></div>
      <div class="divDato" <?php if(empty($mostrar['APELLIDOS'])){@$errorFecha=4;echo 'style="width:15.8%;background-color:rgb(250, 195, 195, 0.5);"';}else{echo 'style="width:15.8%;"';};?> ><p><?php echo $mostrar['APELLIDOS'];?></p></div>
      <div class="divDato" <?php if(empty($mostrar['EMPRESA'])){@$errorFecha=4;echo 'style="width:12%;background-color:rgb(250, 195, 195, 0.5);"';}else{echo 'style="width:12%;"';};?> ><p><?php echo $mostrar['EMPRESA'];?></p></div>
      <div class="divDato" style="width:6.2%;"><p><?php echo $mostrar['VEHICULO'];?></p></div>
      <div 
  <?php
  // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  //  CONDICIONES Y EVALUACION DE FECHAS INICIALES (DENTRO DE LA ETIQUETA DIV, PARA PODER CAMBIAR EL STYLE)
  // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  //  1) FECHAS INICIALES Y AÑOS NO BISIESTOS --------------------------------------------------------------------------------------------------
          @$condicionI00=($acuUTC==$acuI);// CONDICION MENOS DE 24 HORAS
          @$condicionI01=($anioUTC==$anioI)&($bisiestoUTC=='NO'&$bisiestoI=='NO')&($mesI==$mesUTC);
          @$condicionI02=($anioUTC==$anioI)&($bisiestoUTC=='NO'&$bisiestoI=='NO')&($mesI==($mesUTC+1));
          @$condicionI03=($anioUTC==$anioI)&($bisiestoUTC=='NO'&$bisiestoI=='NO')&($mesI>=($mesUTC+2));
  //  CONDICIONES PARA MESES DE 30 Y DE 31 DIAS (SALVO DICIEMBRE)
          @$condicionI04=($acuUTC<$acuI);
          @$condicionI05=($acuI<=($acuUTC+31));
          //@$condicionI06=(@$diasMesUTC==31&$mesUTC<>12);
          @$condicionI06=(@$diasMesUTC==31);
          @$condicionI07=(@$diasMesUTC==30);
          @$condicionI08=($diaUTC<>31&($acuI<=($acuUTC+30)));
          @$condicionI09=($diaI==31&($acuI<=($acuUTC+31)));
  //  CONDICIONES PARA MES DE FEBRERO
          @$condicionI10=(@$diasMesUTC==28);
          @$condicionI11=($diaUTC<>28&($acuI<=($acuUTC+28)));
          @$condicionI12=($diaUTC==28&($acuI<=($acuUTC+31)));
  //  ------------------------------------------------------------------------------------------------------------------------------------------
  //  1.1)  EVALUACION FECHA INICIAL PARA UTC DE MESES DE 30 DIAS  ------------------CORRECTA---------------------------------------------------
  if($condicionI07){ // 1- condicion para los meses de 30 dias
      if($condicionI01){
          if($condicionI04){$styleI=$sinError;}else{$styleI=$conError;};}
      elseif($condicionI02){
          if($condicionI08){$styleI=$sinError;}
          else{if($condicionI09){$styleI=$sinError;}else{$styleI=$conError;};};}
      elseif($condicionI03){$styleI=$conError;}
      else{$styleI=$conError;};
  }else{}; // 1- Fin
  //  1.2)  EVALUACION FECHA INICIAL PARA UTC DE MESES DE 31 DIAS (MENOS DICIEMBRE) ------------------CORRECTA----------------------------------
  if($condicionI06){ // 1- condicion para los meses de 31 dias menos diciembre
      if($condicionI01){
          if($condicionI04){$styleI=$sinError;}else{$styleI=$conError;};}
      elseif($condicionI02){
          if($condicionI05){$styleI=$sinError;}else{$styleI=$conError;};}
      elseif($condicionI03){$styleI=$conError;}
      else{$styleI=$conError;};
  }else{}; // 1- Fin
  //  1.3)  EVALUACION FECHA INICIAL PARA UTC DE MES DE FEBRERO ---------CORRECTA---------------------------------------------------------------
  if($condicionI10){ // 1- condicion para los meses de 28 dias (FEBRERO)
      if($condicionI01){
          if($condicionI04){$styleI=$sinError;}else{$styleI=$conError;};}
      elseif($condicionI02){
          if($condicionI11){$styleI=$sinError;}
          else{if($condicionI12){$styleI=$sinError;}else{$styleI=$conError;};};}
      elseif($condicionI03){$styleI=$conError;}
      else{$styleI=$conError;};
  }else{}; // 1- Fin
  // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  //  2) FECHAS INICIALES Y AÑOS BISIESTOS -----------------------------------------------------------------------------------------------------
          @$condicionI00_B=($acuUTC_B==$acuI_B);// CONDICION MENOS DE 24 HORAS
          @$condicionI01_B=($anioUTC==$anioI)&($bisiestoUTC=='SI'&$bisiestoI=='SI')&($mesI==$mesUTC);
          @$condicionI02_B=($anioUTC==$anioI)&($bisiestoUTC=='SI'&$bisiestoI=='SI')&($mesI==($mesUTC+1));
          @$condicionI03_B=($anioUTC==$anioI)&($bisiestoUTC=='SI'&$bisiestoI=='SI')&($mesI>=($mesUTC+2));
  //  CONDICIONES PARA MESES DE 30 Y DE 31 DIAS (SALVO DICIEMBRE)
          @$condicionI04_B=($acuUTC_B<$acuI_B);
          @$condicionI05_B=($acuI_B<=($acuUTC_B+31));
          //@$condicionI06_B=(@$diasMesUTC_B==31&$mesUTC<>12);
          @$condicionI06_B=(@$diasMesUTC_B==31);
          @$condicionI07_B=(@$diasMesUTC_B==30);
          @$condicionI08_B=($diaUTC<>31&($acuI_B<=($acuUTC_B+30)));
          @$condicionI09_B=($diaI==31&($acuI_B<=($acuUTC_B+31)));
  //  CONDICIONES PARA MES DE FEBRERO
          @$condicionI10_B=(@$diasMesUTC_B==29);
          @$condicionI11_B=($diaUTC<>29&($acuI_B<=($acuUTC_B+29)));
          @$condicionI12_B=($diaUTC==29&($acuI_B<=($acuUTC_B+31)));
  //  ------------------------------------------------------------------------------------------------------------------------------------------
  //  2.1)  EVALUACION FECHA INICIAL PARA UTC DE MESES DE 30 DIAS  ------------CORRECTA---------------------------------------------------------
  if($condicionI07_B){// 1- condicion para los meses de 30 dias
      if($condicionI01_B){
          if($condicionI04_B){$styleI=$sinError;}else{$styleI=$conError;};}
      elseif($condicionI02_B){
          if($condicionI08_B){$styleI=$sinError;}
          else{if($condicionI09_B){$styleI=$sinError;}else{$styleI=$conError;};};}
      elseif($condicionI03_B){$styleI=$conError;}
      else{$styleI=$conError;};
  }else{}; // 1- Fin
  //  ------------------------------------------------------------------------------------------------------------------------------------------
  //  2.2)  EVALUACION FECHA INICIAL PARA UTC DE MESES DE 31 DIAS (MENOS DICIEMBRE) ---------CORRECTA-------------------------------------------
  if($condicionI06_B){ // 1- condicion para los meses de 31 dias menos diciembre
      if($condicionI01_B){
          if($condicionI04_B){$styleI=$sinError;}else{$styleI=$conError;};}
      elseif($condicionI02_B){
          if($condicionI05_B){$styleI=$sinError;}else{$styleI=$conError;};}
      elseif($condicionI03_B){$styleI=$conError;}
      else{$styleI=$conError;};
  }else{}; // 1- Fin
  //  ------------------------------------------------------------------------------------------------------------------------------------------
  //  2.3)  EVALUACION FECHA INICIAL PARA UTC DE MES DE FEBRERO -----------------CORRECTA-------------------------------------------------------
  if($condicionI10_B){ // 1- condicion para los meses de 28 dias (FEBRERO)
      if($condicionI01_B){
          if($condicionI04_B){$styleI=$sinError;}else{$styleI=$conError;};}
      elseif($condicionI02_B){
          if($condicionI11_B){$styleI=$sinError;}
          else{if($condicionI12_B){$styleI=$sinError;}else{$styleI=$conError;};};}
      elseif($condicionI03_B){$styleI=$conError;}
      else{$styleI=$conError;};
  }else{}; // 1- Fin
  // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  //  3) EVALUACION FECHA INICIAL CON CAMBIO DE AÑO (SE EVALUA EL MES UTC DE DICIEMBRE)  -------------------------------------------------------
  //  CONDICIONES PARA MES DE DICIEMBRE EN AÑO NO BISIESTO Y ENERO EN AÑO NO BISIESTO
  @$condicionI13_A=($anioI==($anioUTC+1))&($bisiestoUTC=='NO'&$bisiestoI=='NO')&($mesUTC==12&$mesI==1);
  @$condicionI14_A=($anioI==($anioUTC+1))&($bisiestoUTC=='NO'&$bisiestoI=='NO')&($mesUTC==12&$mesI>=2);
  @$condicionI15_A=($diaI<=$diaUTC);
  //  CONDICIONES PARA MES DE DICIEMBRE EN AÑO BISIESTO Y ENERO EN AÑO NO BISIESTO
  @$condicionI13_B=($anioI==($anioUTC+1))&($bisiestoUTC=='SI'&$bisiestoI=='NO')&($mesUTC==12&$mesI==1);
  @$condicionI14_B=($anioI==($anioUTC+1))&($bisiestoUTC=='SI'&$bisiestoI=='NO')&($mesUTC==12&$mesI>=2);
  @$condicionI15_B=($diaI<=($diaUTC));
  //  CONDICIONES PARA MES DE DICIEMBRE EN AÑO NO BISIESTO Y ENERO EN AÑO BISIESTO
  @$condicionI01_C=($anioI==($anioUTC+1))&($bisiestoUTC=='NO'&$bisiestoI=='SI')&($mesUTC==12&$mesI==1);
  @$condicionI02_C=($anioI==($anioUTC+1))&($bisiestoUTC=='NO'&$bisiestoI=='SI')&($mesUTC==12&$mesI>=2);
  @$condicionI03_C=($diaI<=$diaUTC);
  //@$condicionI04_C=($acuUTC<$acuI);
  //  ------------------------------------------------------------------------------------------------------------------------------------------
  //  3.1)  EVALUACION FECHA INICIAL PARA UTC DE MES DE DICIEMBRE (AÑO UTC NO BISIESTO Y AÑO I NO BISIESTOS) ---------CORRECTA------------------
  if(@$condicionI13_A){
      if(@$condicionI15_A){$styleI=$sinError;}else{};}
  elseif(@$condicionI14_A){$styleI=$conError;}
  else{}; // 1- Fin
  //  ------------------------------------------------------------------------------------------------------------------------------------------
  //  3.2)  EVALUACION FECHA INICIAL PARA UTC DE MES DE DICIEMBRE (AÑO UTC BISIESTO Y AÑO INICIAL NO BISIESTO) -------------CORRECTA------------
  if(@$condicionI13_B){
      if(@$condicionI15_B){$styleI=$sinError;}else{};}
  elseif(@$condicionI14_B){$styleI=$conError;}
  else{}; // 1- Fin
  //  ------------------------------------------------------------------------------------------------------------------------------------------
  //  3.3)  EVALUACION PARA FECHA INICIAL UTC DE MES DE DICIEMBRE (AÑO UTC NO BISIESTO Y AÑO INICIAL BISIESTO) -----------CORRECTA--------------
  if($condicionI01_C){// 1- condicion para el mes de diciembre
      if(@$condicionI03_C){$styleI=$sinError;}else{};}
  elseif(@$condicionI02_C){$styleI=$conError;}
  else{}; // 1- Fin
  //  ------------------------------------------------------------------------------------------------------------------------------------------
  //  1) NO SE PUEDEN SOLICITAR ACCESOS CON MENOS DE 24 HORAS SI NO ES CON URGENCIA (se pone después de todas las evaluaciones de fechas)
  if(@$condicionI01&@$condicionI00){$styleI=$conUrge;$styleF=$conUrge;@$errorFecha=2;}else{}; // MENOS DE 24 HORAS
  if(@$condicionI01_B&@$condicionI00_B){$styleI=$conUrge;$styleF=$conUrge;@$errorFecha=2;}else{}; // MENOS DE 24 HORAS
  //  ------------------------------------------------------------------------------------------------------------------------------------------
  //  2) AÑO INICIAL Y FINAL NO PUEDEN SER INFERIOR AL AÑO ACTUAL NI SER SUPERIORES EN 2 AÑOS AL AÑO ACTUAL
  if(($anioI<$anioUTC)or($anioF<$anioUTC)){$styleI=$conError;$styleF=$conError;}else{};
  if(($anioI>=($anioUTC+2))or($anioF>=($anioUTC+2))){$styleI=$conError;$styleF=$conError;}else{};
  //  ------------------------------------------------------------------------------------------------------------------------------------------
  //  SE EVALUA QUE LA FECHA SEAN COHERENTES - CADA MES CON SUS DIAS CORRESPONDIENTES
  //MES INICIAL
  if($mesI==1&$diaI>=32){$styleI=$conError;};
  if(($mesI==2&$diaI>=29)&$bisiestoI=='NO'){$styleI=$conError;};
  if(($mesI==2&$diaI>=30)&$bisiestoI=='SI'){$styleI=$conError;};
  if($mesI==3&$diaI>=32){$styleI=$conError;};
  if($mesI==4&$diaI>=31){$styleI=$conError;};
  if($mesI==5&$diaI>=32){$styleI=$conError;};
  if($mesI==6&$diaI>=31){$styleI=$conError;};
  if($mesI==7&$diaI>=32){$styleI=$conError;};
  if($mesI==8&$diaI>=32){$styleI=$conError;};
  if($mesI==9&$diaI>=31){$styleI=$conError;};
  if($mesI==10&$diaI>=32){$styleI=$conError;};
  if($mesI==11&$diaI>=31){$styleI=$conError;};
  if($mesI==12&$diaI>=32){$styleI=$conError;};   
  // CONDICION PARA EL MENSAJE DE ERROR
  if($styleI==$conError){$errorFecha=1;}else{};
  ?>
      class="divDato" <?php echo $styleI; ?>><p><?php echo $mostrar['FECHA_INICIO'];?></p></div>
      <div
  <?php    
  // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  //  CONDICIONES PARA LA EVALUACION DE FECHAS FINALES +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  //  1) FECHAS FINALES Y AÑOS NO BISIESTOS (SIN CAMBIO DE AÑO) ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //  1.1) FECHAS UTC Y FECHA INICIAL EN EL MISMO MES ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  @$condicionF0101=($anioI==$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&($mesUTC==$mesI)&($mesF==$mesI);// OK
  @$condicionF0102=($anioI==$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&($mesUTC==$mesI)&($mesF==($mesI+1));// OK
  @$condicionF0103=($anioI==$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&($mesUTC==$mesI)&($mesF>=($mesI+2));// OK
  //  1.2) FECHA INICIAL MAYOR EN 1 AL MES DE FECHA UTC ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  @$condicionF0104=($anioI==$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&($mesI==($mesUTC+1))&($mesF==$mesI);// OK
  @$condicionF0105=($anioI==$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&($mesI==($mesUTC+1))&($mesF==($mesI+1));// OK
  @$condicionF0106=($anioI==$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&($mesI==($mesUTC+1))&($mesF>=($mesI+2));// OK
  //  1.3) CONDICIONES PARA VALORACION DE ACUMULADOS DE FECHAS FINALES +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  @$condicionF2001=($acuUTC<=$acuF&$acuI<=$acuF);//X
  @$condicionF2002=($diasMesI==28&$diaI<>28&($acuF<=($acuI+28)));
  @$condicionF2003=($diasMesI==28&$diaI==28&($acuF<=($acuI+31)));
  @$condicionF2004=($diasMesI==30&$diaI<>30&($acuF<=($acuI+30)));
  @$condicionF2005=($diasMesI==30&$diaI==30&($acuF<=($acuI+31)));
  @$condicionF2006=($diasMesI==31)&($acuF<=($acuI+31));
  @$condicionF2007=($acuI<=$acuF)or($acuI_B<=$acuF_B);
  @$condicionF2008=($diaF<=$diaI);
  //  2) FECHAS FINALES Y AÑOS NO BISIESTOS (CON CAMBIO DE AÑO) ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  @$condicionF0201=($anioUTC<>$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&(($mesUTC==11or$mesUTC==12)&($mesI==12)&($mesF==1));// OK
  @$condicionF0202=($anioUTC<>$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&(($mesUTC==11or$mesUTC==12)&($mesI==12)&($mesF>=2));// OK
  @$condicionF0203=($anioUTC<>$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&(($mesUTC==12)&($mesI==1)&($mesF==1));// OK
  @$condicionF0204=($anioUTC<>$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&(($mesUTC==12)&($mesI==1)&($mesF==2));// OK
  @$condicionF0205=($anioUTC<>$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&(($mesUTC==12)&($mesI==1)&($mesF>2));// OK
  //  3) FECHAS FINALES Y AÑOS BISIESTOS (SIN CAMBIO DE AÑO) +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //  3.1) FECHAS UTC Y FECHA INICIAL EN EL MISMO MES ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  @$condicionF0101_B=($anioI==$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='SI'&$bisiestoF=='SI')&($mesUTC==$mesI)&($mesF==$mesI);// OK
  @$condicionF0102_B=($anioI==$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='SI'&$bisiestoF=='SI')&($mesUTC==$mesI)&($mesF==($mesI+1));// OK
  @$condicionF0103_B=($anioI==$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='SI'&$bisiestoF=='SI')&($mesUTC==$mesI)&($mesF>=($mesI+2));// OK
  //  3.2) FECHA INICIAL MAYOR EN 1 AL MES DE FECHA UTC ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  @$condicionF0104_B=($anioI==$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='SI'&$bisiestoF=='SI')&($mesI==($mesUTC+1))&($mesF==$mesI);// OK
  @$condicionF0105_B=($anioI==$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='SI'&$bisiestoF=='SI')&($mesI==($mesUTC+1))&($mesF==($mesI+1));// OK
  @$condicionF0106_B=($anioI==$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='SI'&$bisiestoF=='SI')&($mesI==($mesUTC+1))&($mesF>=($mesI+2));// OK
  //  3.3) CONDICIONES PARA VALORACION DE ACUMULADOS DE FECHAS FINALES +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  @$condicionF2001_B=($acuUTC_B<=$acuF_B&$acuI_B<=$acuF_B);//X
  @$condicionF2002_B=($diasMesI_B==29&$diaI<>29&($acuF_B<=($acuI_B+29)));
  @$condicionF2003_B=($diasMesI_B==29&$diaI==29&($acuF_B<=($acuI_B+31)));
  @$condicionF2004_B=($diasMesI_B==30&$diaI<>30&($acuF_B<=($acuI_B+30)));
  @$condicionF2005_B=($diasMesI_B==30&$diaI==30&($acuF_B<=($acuI_B+31)));
  @$condicionF2006_B=($diasMesI_B==31)&($acuF_B<=($acuI_B+31));
  @$condicionF2007_B=($acuI_B<=$acuF_B);
  @$condicionF2008_B=($diaF<=$diaI);
  //  4) FECHAS FINALES Y AÑOS BISIESTOS (CON CAMBIO DE AÑO DE BISIESTO A NO BISIESTO) +++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  @$condicionF0201_B_01=($anioUTC<>$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='SI'&$bisiestoF=='NO')&(($mesUTC==11or$mesUTC==12)&($mesI==12)&($mesF==1));// OK
  @$condicionF0202_B_01=($anioUTC<>$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='SI'&$bisiestoF=='NO')&(($mesUTC==11or$mesUTC==12)&($mesI==12)&($mesF>=2));// OK
  @$condicionF0203_B_01=($anioUTC<>$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='NO'&$bisiestoF=='NO')&(($mesUTC==12)&($mesI==1)&($mesF==1));// OK
  @$condicionF0204_B_01=($anioUTC<>$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='NO'&$bisiestoF=='NO')&(($mesUTC==12)&($mesI==1)&($mesF==2));// OK
  @$condicionF0205_B_01=($anioUTC<>$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='NO'&$bisiestoF=='NO')&(($mesUTC==12)&($mesI==1)&($mesF>2));// OK
  //  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX   ESTOY AQUI  XXXXXXXXXXXXXXXXXXXXX CAMBIO DE AÑO EN BISIESTO
  //  5) FECHAS FINALES Y AÑOS BISIESTOS (CON CAMBIO DE AÑO DE NO BISIESTO A BISIESTO) +++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  @$condicionF0201_B=($anioUTC<>$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='SI')&(($mesUTC==11or$mesUTC==12)&($mesI==12)&($mesF==1));// 
  @$condicionF0202_B=($anioUTC<>$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='SI')&(($mesUTC==11or$mesUTC==12)&($mesI==12)&($mesF>=2));// 
  @$condicionF0203_B=($anioUTC<>$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='SI'&$bisiestoF=='SI')&(($mesUTC==12)&($mesI==1)&($mesF==1));// 
  @$condicionF0204_B=($anioUTC<>$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='SI'&$bisiestoF=='SI')&(($mesUTC==12)&($mesI==1)&($mesF==2));// 
  @$condicionF0205_B=($anioUTC<>$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='SI'&$bisiestoF=='SI')&(($mesUTC==12)&($mesI==1)&($mesF>2));// 
  //  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //  1.1)  EVALUACION FECHA FINAL AÑO NO BISIESTO: FECHA UTC MES DE 28, 30 O 31 (MENOS DICIEMBRE SIN CAMBIO DE AÑO) +++++CORRECTA++++++++++++++
  if(@$condicionF0101){
      if(@$condicionF2001){$styleF=$sinError;}
      else{$styleF=$conError;};}// LAS TRES FECHAS EN EL MISMO MES -- OK
  elseif(@$condicionF0102){
      if(@$condicionF2002){$styleF=$sinError;}
      elseif(@$condicionF2003){$styleF=$sinError;}
      elseif(@$condicionF2004){$styleF=$sinError;}
      elseif(@$condicionF2005){$styleF=$sinError;}
      elseif(@$condicionF2006){$styleF=$sinError;}
      else{$styleF=$conError;};}// MES UTC == MES I, Y MES FINAL MAYOR EN 1 -- OK
  elseif(@$condicionF0103){$styleF=$conError;}//  MES UTC == MES I, Y MES FINAL MAYOR DE 2 AL MES UTC -- OK
  elseif(@$condicionF0104){
      if(@$condicionF2007){$styleF=$sinError;}else{$styleF=$conError;};}// MES F == MES I == (MES UTC + 1)  -- OK
  elseif(@$condicionF0105){
      if(@$condicionF2002){$styleF=$sinError;}
      elseif(@$condicionF2003){$styleF=$sinError;}
      elseif(@$condicionF2004){$styleF=$sinError;}
      elseif(@$condicionF2005){$styleF=$sinError;}
      elseif(@$condicionF2006){$styleF=$sinError;}
      else{$styleF=$conError;};}// MES I == (MES UTC + 1) Y MES F == (MES I + 1) -- OK
  elseif(@$condicionF0106){$styleF=$conError;}//  MES I == (MES UTC +1), Y MES FINAL MAYOR DE 2 AL MES UTC -- OK
  else{$styleF=$conError;};// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX   OJO A ESTA CONDICION POR SI DA PROBLEMAS  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  //  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //  1.2)  EVALUACION FECHA FINAL: CAMBIO DE AÑO (AÑOS NO BISIESTOS) ++++++++++++++++++++++++++++++CORRECTA++++++++++++++++++++++++++++++++++++
  if(@$condicionF0201){
      if($condicionF2008){$styleF=$sinError;};}
  elseif(@$condicionF0202){$styleF=$conError;}
  elseif(@$condicionF0203){
      if(@$condicionF2007){$styleF=$sinError;}else{$styleF=$conError;};}
  elseif(@$condicionF0204){
      if(($diaI==31&$diasMesF==28)or($diaI==31&$diasMesF_B==29)){$styleF=$sinError;}else{$styleF=$conError;};}
  elseif(@$condicionF0205){$styleF=$conError;}
  else{};
  //  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //  1.3)  EVALUACION FECHA FINAL AÑO BISIESTO: FECHA UTC MES DE 28, 30 O 31 (MENOS DICIEMBRE SIN CAMBIO DE AÑO) ++++++CORRECTA++++++++++++++++
  if(@$condicionF0101_B){
      if(@$condicionF2001_B){$styleF=$sinError;}
      else{$styleF=$conError;};}// LAS TRES FECHAS EN EL MISMO MES -- OK
  elseif(@$condicionF0102_B){
      if(@$condicionF2002_B){$styleF=$sinError;}
      elseif(@$condicionF2003_B){$styleF=$sinError;}
      elseif(@$condicionF2004_B){$styleF=$sinError;}
      elseif(@$condicionF2005_B){$styleF=$sinError;}
      elseif(@$condicionF2006_B){$styleF=$sinError;}
      else{$styleF=$conError;};}// MES UTC == MES I, Y MES FINAL MAYOR EN 1 -- OK
  elseif(@$condicionF0103_B){$styleF=$conError;}//  MES UTC == MES I, Y MES FINAL MAYOR DE 2 AL MES UTC -- OK
  elseif(@$condicionF0104_B){
      if(@$condicionF2007_B){$styleF=$sinError;}else{$styleF=$conError;};}// MES F == MES I == (MES UTC + 1)  -- OK
  elseif(@$condicionF0105_B){
      if(@$condicionF2002_B){$styleF=$sinError;}
      elseif(@$condicionF2003_B){$styleF=$sinError;}
      elseif(@$condicionF2004_B){$styleF=$sinError;}
      elseif(@$condicionF2005_B){$styleF=$sinError;}
      elseif(@$condicionF2006_B){$styleF=$sinError;}
      else{$styleF=$conError;};}// MES I == (MES UTC + 1) Y MES F == (MES I + 1) -- OK
  elseif(@$condicionF0106_B){$styleF=$conError;}//  MES I == (MES UTC +1), Y MES FINAL MAYOR DE 2 AL MES UTC -- OK
  else{};
  //  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //  1.4)  EVALUACION FECHA FINAL: CAMBIO DE AÑO (DE BISIESTO A NO BISIESTO) ++++++++++++++++++++++++++CORRECTA++++++++++++++++++++++++++++++++
  if(@$condicionF0201_B){
      if($condicionF2008_B){$styleF=$sinError;};}
  elseif(@$condicionF0202_B){$styleF=$conError;}
  elseif(@$condicionF0203_B){
      if(@$condicionF2007_B){$styleF=$sinError;}else{$styleF=$conError;};}
  elseif(@$condicionF0204_B){$styleF=$sinError;}
  elseif(@$condicionF0205_B){$styleF=$conError;}
  else{};
  //  1.5)  EVALUACION FECHA FINAL: CAMBIO DE AÑO (DE NO BISIESTO A BISIESTO) +++++++++++++++++++CORRECTA+++++++++++++++++++++++++++++++++++++++
  if(@$condicionF0201_B_01){
      if($condicionF2008_B){$styleF=$sinError;};}
  elseif(@$condicionF0202_B_01){$styleF=$conError;}
  elseif(@$condicionF0203_B_01){
      if(@$condicionF2007_B){$styleF=$sinError;}else{$styleF=$conError;};}
  elseif(@$condicionF0204_B_01){$styleF=$sinError;}
  elseif(@$condicionF0205_B_01){$styleF=$conError;}
  else{};
  //  ------------------------------------------------------------------------------------------------------------------------------------------
  //  1) NO SE PUEDEN SOLICITAR ACCESOS CON MENOS DE 24 HORAS SI NO ES CON URGENCIA (se pone después de todas las evaluaciones de fechas)
          if(@$condicionI01&@$condicionI00){$styleI=$conUrge;$styleF=$conUrge;@$errorFecha=2;}else{}; // MENOS DE 24 HORAS
          if(@$condicionI01_B&@$condicionI00_B){$styleI=$conUrge;$styleF=$conUrge;@$errorFecha=2;}else{}; // MENOS DE 24 HORAS
  //  ------------------------------------------------------------------------------------------------------------------------------------------
  //  2)  AÑO INICIAL Y FINAL NO PUEDEN SER INFERIOR AL AÑO ACTUAL NI SER SUPERIORES EN 2 AÑOS AL AÑO ACTUAL
          if(($anioI<$anioUTC)or($anioF<$anioUTC)){$styleI=$conError;$styleF=$conError;}else{};
          if(($anioI>=($anioUTC+2))or($anioF>=($anioUTC+2))){$styleI=$conError;$styleF=$conError;}else{};
  //  ------------------------------------------------------------------------------------------------------------------------------------------
  //  SE EVALUA QUE LA FECHA SEAN COHERENTES - CADA MES CON SUS DIAS CORRESPONDIENTES
  //MES FINAL
      if($mesF==1&$diaF>=32){$styleF=$conError;};
      if(($mesF==2&$diaF>=29)&$bisiestoF=='NO'){$styleF=$conError;};
      if(($mesF==2&$diaF>=30)&$bisiestoF=='SI'){$styleF=$conError;};
      if($mesF==3&$diaF>=32){$styleF=$conError;};
      if($mesF==4&$diaF>=31){$styleF=$conError;};
      if($mesF==5&$diaF>=32){$styleF=$conError;};
      if($mesF==6&$diaF>=31){$styleF=$conError;};
      if($mesF==7&$diaF>=32){$styleF=$conError;};
      if($mesF==8&$diaF>=32){$styleF=$conError;};
      if($mesF==9&$diaF>=31){$styleF=$conError;};
      if($mesF==10&$diaF>=32){$styleF=$conError;};
      if($mesF==11&$diaF>=31){$styleF=$conError;};
      if($mesF==12&$diaF>=32){$styleF=$conError;};
  // CONDICION PARA EL MENSAJE DE ERROR
  if($styleF==$conError){$errorFecha=1;}else{};
  ?>
      class="divDato" <?php echo $styleF; ?>><p><?php echo $mostrar['FECHA_FINAL'];?></p></div>
      <div class="divDato" <?php if(empty($mostrar['MOTIVO'])){@$errorFecha=4;echo 'style="width:12%;background-color:rgb(250, 195, 195, 0.5);"';}else{echo 'style="width:12%;"';};?> ><p><?php echo $mostrar['MOTIVO'];?></p></div>
      <div class="divDato" <?php if(empty($mostrar['OBSERVACIONES'])){@$errorFecha=4;echo 'style="width:17%;background-color:rgb(250, 195, 195, 0.5);"';}else{echo 'style="width:17%;"';};?> ><p><?php echo $mostrar['OBSERVACIONES'];?></p></div>
      <div class="divDato" style="width:22px;background-color:rgb(180, 230, 240, 0.8);">
        <form action="solicitudes.php" method="GET">
          
          <input type="hidden" id="pasos" name="pasos" value="8"/>
          <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
          <input type="hidden" id="editar" name="editar" value="<?php echo $mostrar['ID']; ?>"/>

          <input type="hidden" id="numSolicitudes" name="numSolicitudes" value="<?php echo $numSolicitudes; ?>"/>
          <input type="hidden" id="edificioVisita" name="edificioVisita" value="<?php echo $edificioVisita; ?>"/>
          <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>

          <input type="hidden" id="IDresponsable" name="IDresponsable" value="<?php echo utf8_encode(@$IDresponsable); ?>"/>
          <input type="hidden" id="nombreResponsable" name="nombreResponsable" value="<?php echo utf8_encode(@$nombreResponsable); ?>"/>
          <input type="hidden" id="apellidosResponsable" name="apellidosResponsable" value="<?php echo utf8_encode(@$apellidosResponsable); ?>"/>
          <input type="hidden" id="telefonoResponsable" name="telefonoResponsable" value="<?php echo @$telefonoResponsable; ?>"/>
          <input type="hidden" id="correoResponsable" name="correoResponsable" value="<?php echo utf8_encode(@$correoResponsable); ?>"/>
          <button type="submit" class="bto-edicion"><img src="fotos-archivos/editar02.png" style="width:18px;padding-top:1px;"/></button>
        </form>
      </div>  
      <div class="divDato" style="width:22px;background-color:rgb(180, 230, 240, 0.8);">
        <form action="solicitudes.php" method="GET">
          
          <input type="hidden" id="pasos" name="pasos" value="10"/>
          <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
          <input type="hidden" id="borrar" name="borrar" value="<?php echo $mostrar['ID'];?>"/>
          
          <input type="hidden" id="numSolicitudes" name="numSolicitudes" value="<?php echo $numSolicitudes;?>"/>
          <input type="hidden" id="edificioVisita" name="edificioVisita" value="<?php echo $edificioVisita;?>"/>
          <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>
          
          <input type="hidden" id="IDresponsable" name="IDresponsable" value="<?php echo utf8_encode(@$IDresponsable); ?>"/>
          <input type="hidden" id="nombreResponsable" name="nombreResponsable" value="<?php echo utf8_encode(@$nombreResponsable); ?>"/>
          <input type="hidden" id="apellidosResponsable" name="apellidosResponsable" value="<?php echo utf8_encode(@$apellidosResponsable); ?>"/>
          <input type="hidden" id="telefonoResponsable" name="telefonoResponsable" value="<?php echo @$telefonoResponsable; ?>"/>
          <input type="hidden" id="correoResponsable" name="correoResponsable" value="<?php echo utf8_encode(@$correoResponsable); ?>"/>
          <button type="submit" class="bto-edicion"><img src="fotos-archivos/borrar02.png" style="width:15px;padding-top:1px;"/></button>
        </form>
      </div>
  </div><!-- final fila de datos -->
  <?php 
  ;}; // Finaliza el FOR (PARA CREAR LA TABLA DE DATOS)
  // SE COMPRUEBA QUE ESTEN RELLENOS TODOS LOS DATOS
  if(empty($mostrar['DNI'])){@$errorFecha=4;}else{};
  if(empty($mostrar['NOMBRE'])){@$errorFecha=4;}else{};
  if(empty($mostrar['APELLIDOS'])){@$errorFecha=4;}else{};
  if(empty($mostrar['EMPRESA'])){@$errorFecha=4;}else{};
  if(empty($mostrar['VEHICULO'])){@$errorFecha=4;}else{};
  if(empty($mostrar['FECHA_INICIO'])){@$errorFecha=4;}else{};
  if(empty($mostrar['FECHA_FINAL'])){@$errorFecha=4;}else{};
  if(empty($mostrar['MOTIVO'])){@$errorFecha=4;}else{};
  if(empty($mostrar['OBSERVACIONES'])){@$errorFecha=4;}else{};
  // SE COMPRUEBA QUE EL FORMATO DE LA FECHA INICIAL SEA "DD/MM/AAAA"
  if(isset($mostrar['FECHA_INICIO'])){
    $chars = strlen($mostrar['FECHA_INICIO']);
    $FI=str_split($mostrar['FECHA_INICIO'],$split_length = 1);
    if($chars<>10){@$errorFecha=3;}else{
      if($chars==10){
        if(($FI[2]=='/')&($FI[5]=='/')){
            if(is_numeric($FI[0])&is_numeric($FI[1])&is_numeric($FI[3])&is_numeric($FI[4])&is_numeric($FI[6])&is_numeric($FI[7])&is_numeric($FI[8])&is_numeric($FI[9])){}else{@$errorFecha=3;}
        }else{@$errorFecha=3;};}
    else{@$errorFecha=3;}
  };};// Fin primera condicion: existe fecha inicial
  // SE COMPRUEBA QUE EL FORMATO DE LA FECHA FINAL SEA "DD/MM/AAAA"
  if(isset($mostrar['FECHA_FINAL'])){
      $chars = strlen($mostrar['FECHA_FINAL']);
      $FF=str_split($mostrar['FECHA_FINAL'],$split_length = 1);
      if($chars<>10){@$errorFecha=3;}else{
        if($chars==10){
          if(($FF[2]=='/')&($FF[5]=='/')){
              if(is_numeric($FF[0])&is_numeric($FF[1])&is_numeric($FF[3])&is_numeric($FF[4])&is_numeric($FF[6])&is_numeric($FF[7])&is_numeric($FF[8])&is_numeric($FF[9])){}else{@$errorFecha=3;}
          }else{@$errorFecha=3;};}
      else{@$errorFecha=3;}
  };};// Fin primera condicion: existe fecha final
  ?>
  </div><!-- final div contenedora de table de accesos -->
  <!--   TABLA PARA MOSTRAR BOTONES -->
  <div id="errorFecha" style="width:99.6%;float:left;padding-top:10px;height:10px;color:red;display:block;text-align:left;<?php if(@$errorFecha==1 or @$errorFecha==2 or @$errorFecha==3 or @$errorFecha==4){echo 'visibily:visible;';}else{echo 'visibily:hidden;';};?>" >
    <p style="font-size:12px;height:8px;margin-top:0px;margin-left:8px;"><?php 
      if(@$errorFecha==1){echo '<strong>(*) EDITE LOS ACCESOS CON DATOS MARCADOS EN ROJO</strong>';}
      elseif(@$errorFecha==2){echo '<strong>(*) LOS ACCESOS CON FECHA DE HOY SE TRAMITAN POR VIA URGENTE</strong>';}
      elseif(@$errorFecha==3){echo '<strong>(*) EL FORMATO DE FECHA NO SE ADMITE, DEBE SER "DD/MM/AAAA"</strong>';}
      elseif(@$errorFecha==4){echo '<strong>(*) DEBE RELLENAR LOS DATOS DE LAS CASILLAS VACIAS</strong>';}
      else{};
    ?></p>
  </div>
  <div style="display:block;width:99.6%;text-align:center;padding-top:8px;">
    <table id="botonesMostrar" style="width:100%;">
      <tr>
        <td colspan="4" style="float:left;padding-left:0px;height:10px;">
        </td>
      </tr>
      <tr>
        <td style="width:25%;text-align:left;">
      </td>
        <td style="width:25%;text-align:right;">
          <form id="enviarTablaAccesos" action="solicitudes.php" method="GET">
            
            <input type="hidden" id="pasos" name="pasos" value="<?php if(@$errorFecha==1||@$errorFecha==2||@$errorFecha==3||@$errorFecha==4){echo 9;}else{echo 13;};?>"/>
            <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
            <input type="hidden" id="cancelarSolicitud"name="cancelarSolicitud" value="NO"/>

            <input type="hidden" id="numSolicitudes" name="numSolicitudes" value="<?php echo $numSolicitudes;?>"/>
            <input type="hidden" id="edificioVisita" name="edificioVisita" value="<?php echo $edificioVisita;?>"/>
            <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>

            <input type="hidden" id="IDresponsable" name="IDresponsable" value="<?php echo utf8_encode(@$IDresponsable); ?>"/>
            <input type="hidden" id="nombreResponsable" name="nombreResponsable" value="<?php echo utf8_encode(@$nombreResponsable); ?>"/>
            <input type="hidden" id="apellidosResponsable" name="apellidosResponsable" value="<?php echo utf8_encode(@$apellidosResponsable); ?>"/>
            <input type="hidden" id="telefonoResponsable" name="telefonoResponsable" value="<?php echo @$telefonoResponsable; ?>"/>
            <input type="hidden" id="correoResponsable" name="correoResponsable" value="<?php echo utf8_encode(@$correoResponsable); ?>"/>
            <button id="botonContinuar" class="boton" style="width:100%;" onclick="return noEnviarDatosVacios()">CONTINUAR SOLICITUD</button>
          </form>
        </td>
        <td style="width:25%;text-align:left;">
          <form id="" action="solicitudes.php" method="get">
            
            <input type="hidden" id="pasos" name="pasos" value="<?php if($entradaDatos=='manual'){echo 2;}else{echo 5;};?>"/>
            <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
            <input type="hidden" id="comprobarUsuario" name="comprobarUsuario" value="10"/>
            <input type="hidden" id="entradaDatos"name="entradaDatos" value="excel"/>
            <input type="hidden" id="cancelarSolicitud"name="cancelarSolicitud" value="SI"/>
            <input type="hidden" id="borrar" name="borrar" value="<?php echo $mostrar['ID'];?>"/>

            <input type="hidden" id="numSolicitudes" name="numSolicitudes" value="<?php echo $numSolicitudes;?>"/>
            <input type="hidden" id="edificioVisita" name="edificioVisita" value="<?php echo $edificioVisita;?>"/>
            <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>

            <input type="hidden" id="IDresponsable" name="IDresponsable" value="<?php echo utf8_encode(@$IDresponsable); ?>"/>
            <input type="hidden" id="nombreResponsable" name="nombreResponsable" value="<?php echo utf8_encode(@$nombreResponsable); ?>"/>
            <input type="hidden" id="apellidosResponsable" name="apellidosResponsable" value="<?php echo utf8_encode(@$apellidosResponsable); ?>"/>
            <input type="hidden" id="telefonoResponsable" name="telefonoResponsable" value="<?php echo @$telefonoResponsable; ?>"/>
            <input type="hidden" id="correoResponsable" name="correoResponsable" value="<?php echo utf8_encode(@$correoResponsable); ?>"/>
            <button class="boton" style="width:100%;">CANCELAR SOLICITUD</button>
        </td>
        <td style="width:25%;text-align:left;"></td>
          </form>
    </table>
  </div>
<?php
  mysqli_close($conexion_db);
?>
    </div>
  </div><!-- FINAL mostrarAvisoError -->
</div><!-- FINAL mostrarAviso -->
  <?php
  ;}; // FINAL DE LA FUNCION PARA MOSTRAR LOS DATOS
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// DECIMOSEPTIMA FUNCION: MOSTRAR FILA CON LOS DATOS DEL ACCESO SELECCIONADO PARA EDITAR DE LA TABLA DE SOLICITUDES (BOTON EDITAR)
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mostrarEditarAcceso($editar,$codigoSolicitante){require('02-albacon-php/04-variables-solicitudes.php');
// 1) SE EXTRAEN LOS DATOS DE LA BASE PARA GENERAR UNA TABLA EDITABLE CON LA FILA SELECCIONADA
$conexion_db;
$baseDatos;
$sql="SELECT * FROM accesos_temp WHERE ID='$editar' AND CODIGO='$codigoSolicitante' ";
$result=mysqli_query($conexion_db,$sql);
// 2) SE MUESTRAN LOS DATOS DE LA BASE PARA EDITAR EL ACCESO SELECCIONADO
while($mostrar=mysqli_fetch_array($result)){?>
<form id="textEditado" name="textEditado" action="solicitudes.php" method="get">
<div id="editarAccesos" name="editarAccesos" class="editarAccesos">
  <h2>ACTUALIZAR EL SIGUIENTE ACCESO</h2><br><br>
<div id="edicionAccesos" name="edicionAccesos" class="edicionAccesos"><!-- Inicio div engobla encabezados y datos -->
  <div  id="edicionEncabezados" name="edicionEncabezados" style="display:inline-flex;border:0px solid rgb(218, 217, 217);"><!-- Inicio fila de encabezados -->
    <div class="editarEncabezado" style="width:22px;"><p style="font-size:13px;">Nº</p></div>
    <div class="editarEncabezado" style="width:8%;"><p style="margin-top:3px;font-size:13px;">DNI<br>PASAPORTE</p></div>
    <div class="editarEncabezado" style="width:11%;"><p style="font-size:14px;">NOMBRE</div>
    <div class="editarEncabezado" style="width:17%;"><p style="font-size:14px;">APELLIDOS</p></div>
    <div class="editarEncabezado" style="width:12.5%;"><p style="font-size:14px;">EMPRESA</p></div>
    <div class="editarEncabezado" style="width:6.5%;"><p style="font-size:14px;">VEHICULO</p></div>
    <div class="editarEncabezado" style="width:5.5%;"><p style="margin-top:3px;font-size:13px;">FECHA<br>INICIO</p></div>
    <div class="editarEncabezado" style="width:5.5%;"><p style="margin-top:3px;font-size:13px;">FECHA<br>FINAL</p></div>
    <div class="editarEncabezado" style="width:12%;"><p style="font-size:14px;">MOTIVO VISITA</p></div>
    <div class="editarEncabezado" style="width:18%;margin-right:4px;"><p style="font-size:14px;">OBSEVACIONES</p></div>
  </div><!-- final fila de encabezados -->
  <div id="edicionDatos" name="edicionDatos" style="display:inline-flex;border:0px solid rgb(218, 217, 217);"><!-- Inicio fila de edicion de datos accesos -->
    <div class="editarDato" id="div-editarNUM" name="div-editarNUM" style="width:22px;height:22px;margin-left:5px;margin-right:0px;border:0px solid rgb(180, 230, 240, 0.8);background-color:rgb(180, 230, 240, 0.8);">
      <input id="editarID" name="editarID" type="text" class="editarInputDato" style="width:96%;font-weight:bold;text-align:center;margin-left:-2px;margin-top:1px;outline:none;" readonly placeholder="<?php echo $mostrar['ID'];?>" value="<?php echo $mostrar['ID'];?>" autocomplete="off">
    </div>
    <div class="editarDato" id="div-editarDNI" name="div-editarDNI" style="width:8%;">
      <input id="editarDNI" name="editarDNI" type="text" class="editarInputDato" style="width:96%;" value="<?php echo $mostrar['DNI'];?>" autocomplete="off">
    </div>
    <div class="editarDato" id="div-editarNombre" name="div-editarNombre" style="width:11%;">
      <input id="editarNombre" name="editarNombre" type="text" class="editarInputDato" value="<?php echo $mostrar['NOMBRE'];?>" autocomplete="off">
    </div>
    <div class="editarDato" id="div-editarApellidos" name="div-editarApellidos" style="width:17%;">
      <input id="editarApellidos" name="editarApellidos" type="text" class="editarInputDato" value="<?php echo $mostrar['APELLIDOS'];?>" autocomplete="off">
    </div>
    <div class="editarDato" id="div-editarEmpresa" name="div-editarEmpresa" style="width:12.5%;">
      <input id="editarEmpresa" name="editarEmpresa" type="text" class="editarInputDato" value="<?php echo $mostrar['EMPRESA'];?>" autocomplete="off">
    </div>
    <div class="editarDato" id="div-editarVehiculo" name="div-editarVehiculo" style="width:6.5%;">
      <input id="editarVehiculo" name="editarVehiculo" type="text" class="editarInputDato" style="width:96%;" value="<?php echo $mostrar['VEHICULO'];?>" autocomplete="off">
    </div>
    <div class="editarDato" id="div-editarFechaInicial" name="div-editarFechaInicial" style="width:5.5%;">
      <input id="editarFechaInicial" name="editarFechaInicial" type="text" class="editarInputDato" style="width:96%;" value="<?php echo $mostrar['FECHA_INICIO'];?>" autocomplete="off">
    </div>
    <div class="editarDato" id="div-editarFechaFinal" name="div-editarFechaFinal" style="width:5.5%;">
      <input id="editarFechaFinal" name="editarFechaFinal" type="text" class="editarInputDato" style="width:96%;" value="<?php echo $mostrar['FECHA_FINAL'];?>" autocomplete="off">
    </div>
    <div class="editarDato" id="div-editarMotivo" name="div-editarMotivo" style="width:12%; autocomplete="off"">
      <input id="editarMotivo" name="editarMotivo" type="text" class="editarInputDato" value="<?php echo $mostrar['MOTIVO'];?>" autocomplete="off">
    </div>
    <div class="editarDato" id="div-editarObservaciones" name="div-editarObservaciones" style="width:18%;margin-right:4px;">
      <input id="editarObservaciones" name="editarObservaciones" type="text" class="editarInputDato" value="<?php echo $mostrar['OBSERVACIONES'];?>" autocomplete="off">
    </div>
  </div><!-- final fila de edicion de datos accesos -->
  <p style="font-size:6px;"></p>
  </div><!-- Final div engobla encabezados y datos -->
  <table id="botonesMostrar" style="width:99%;">
    <tr><td colspan="2" style="height:12px;"></td></tr>
      <tr>
        <td style="text-align:right;">
            <input type="hidden" id="pasos" name="pasos" value="9"/>
            <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>

            <input type="hidden" id="numSolicitudes" name="numSolicitudes" value="<?php echo $numSolicitudes; ?>"/>
            <input type="hidden" id="edificioVisita" name="edificioVisita" value="<?php echo $edificioVisita; ?>"/>
            <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>
            
            <input type="hidden" id="IDresponsable" name="IDresponsable" value="<?php echo utf8_encode(@$IDresponsable); ?>"/>
            <input type="hidden" id="nombreResponsable" name="nombreResponsable" value="<?php echo utf8_encode(@$nombreResponsable); ?>"/>
            <input type="hidden" id="apellidosResponsable" name="apellidosResponsable" value="<?php echo utf8_encode(@$apellidosResponsable); ?>"/>
            <input type="hidden" id="telefonoResponsable" name="telefonoResponsable" value="<?php echo @$telefonoResponsable; ?>"/>
            <input type="hidden" id="correoResponsable" name="correoResponsable" value="<?php echo utf8_encode(@$correoResponsable); ?>"/>
            <button class="boton" style="width:120px;" onclick="return noEnviarEditarVacios()">ACTUALIZAR</button>
  </form>
        </td>
        <td style="text-align:left;">
  <form id="cancelarEdicion" action="solicitudes.php" method="get">
            <input type="hidden" id="pasos" name="pasos" value="9"/>
            <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>

            <input type="hidden" id="numSolicitudes" name="numSolicitudes" value="<?php echo $numSolicitudes; ?>"/>
            <input type="hidden" id="edificioVisita" name="edificioVisita" value="<?php echo $edificioVisita; ?>"/>
            <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>

            <input type="hidden" id="IDresponsable" name="IDresponsable" value="<?php echo utf8_encode(@$IDresponsable); ?>"/>
            <input type="hidden" id="nombreResponsable" name="nombreResponsable" value="<?php echo utf8_encode(@$nombreResponsable); ?>"/>
            <input type="hidden" id="apellidosResponsable" name="apellidosResponsable" value="<?php echo utf8_encode(@$apellidosResponsable); ?>"/>
            <input type="hidden" id="telefonoResponsable" name="telefonoResponsable" value="<?php echo @$telefonoResponsable; ?>"/>
            <input type="hidden" id="correoResponsable" name="correoResponsable" value="<?php echo utf8_encode(@$correoResponsable); ?>"/>
            <button class="boton" style="width:120px;">CANCELAR</button>
        </td>
      </tr>
    </table>
  </form>
</div>
<!-- div para mostrar error al mandar campos vacios en editar datos -->
<div id="avisoEditarVacio" name="avisoEditarVacio" class="oscurecerContenedor" style="display:none;">
<div id="mostrarAviso" name="mostrarAviso" class="mostrarAviso">
    <div id="tituloAviso" class="tituloAviso">INFORMACION INCOMPLETA</div>
    <div id="mensajeAviso" class="mensajeAviso">DEBE RELLENAR TODOS LOS CAMPOS CORRECTAMENTE</div>
      <a href="javascript:cerrarAvisoEditarVacio();">ACEPTAR</a>
  </div><!-- FINAL mostrarAvisoError -->
</div><!-- FINAL mostrarAviso -->
<?php
;}; // SE CIERRA WHILE PARA MOSTRAR FILA DEL ACCESOS SELECCIONADO
mysqli_close($conexion_db);
;}; // FINALIZA FUNCION MOSTRAR ACCESOS A EDITAR:  mostrarEditarAcceso($editarFila,$editar,$codigoSolicitante)
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// DECIMOCTAVA FUNCION: ACTUALIZA LOS DATOS EN LA BASE ACCESOS_TEMP (BOTON ACTUALIZAR)
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function actualizarAccesos($editar,$codigoSolicitante){require('02-albacon-php/04-variables-solicitudes.php');
// PRIMERO: SE FORMATEAN LOS DATOS
$editarDNI=str_replace('-','',str_replace(' ','-',strtoupper(preg_replace('/\s+/', ' ',trim($editarDNI)))));
$editarNombre=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($editarNombre)))));
$editarApellidos=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($editarApellidos)))));
$editarEmpresa=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($editarEmpresa)))));
$editarVehiculo=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($editarVehiculo)))));
$editarFechaInicial=preg_replace('/\s+/', ' ',trim($editarFechaInicial));
$editarFechaFinal=preg_replace('/\s+/', ' ',trim($editarFechaFinal));
$editarMotivo=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($editarMotivo)))));
$editarObservaciones=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($editarObservaciones)))));
//SEGUNDO: SE ACTUALIZAN LOS DATOS EN LA BASE
$conexion_db;
$baseDatos;
$sql="UPDATE accesos_temp SET DNI='$editarDNI',NOMBRE='$editarNombre',APELLIDOS='$editarApellidos',EMPRESA='$editarEmpresa',VEHICULO='$editarVehiculo',
FECHA_INICIO='$editarFechaInicial',FECHA_FINAL='$editarFechaFinal',MOTIVO='$editarMotivo',OBSERVACIONES='$editarObservaciones' 
WHERE ID='$editarID' AND CODIGO='$codigoSolicitante' ";
$result=mysqli_query($conexion_db,$sql);
mysqli_close($conexion_db);
;}; // FINAL FUNCION ACTUALIZAR DATOS actualizarAccesos($editarFila,$editar,$codigoSolicitante)
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// DECIMONOVENA FUNCION: MOSTRAR FILA CON LOS DATOS DEL ACCESO SELECCIONADO PARA BORRAR DE LA TABLA DE SOLICITUDES (BOTON BORRAR)
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mostrarBorrarAcceso($borrar,$codigoSolicitante){require('02-albacon-php/04-variables-solicitudes.php');
// PARA MOSTRAR MENSAJE SI SOLO QUEDA UN ACCESO EN LA SOLICITUD SE REALIZA UNA CONSULTA A LA BASE "accesos_temp"
// Se crea la variable $numResto para conocer las solicitudes reales que se van a enviar (sustituye a $numSolicitudes solo en mostrar dato)
$conexion_db;
$baseDatos;
$sql="SELECT * FROM accesos_temp WHERE CODIGO='$codigoSolicitante' ";
$result=mysqli_query($conexion_db,$sql);
$numResto = mysqli_num_rows($result);
// 1) SE EXTRAEN LOS DATOS DE LA BASE PARA GENERAR UNA TABLA NO EDITABLE CON LA FILA SELECCIONADA
$conexion_db;
$baseDatos;
$sql="SELECT * FROM accesos_temp WHERE ID='$borrar' AND CODIGO='$codigoSolicitante' ";
$result=mysqli_query($conexion_db,$sql);
// 2) SE MUESTRAN LOS DATOS DE LA BASE PARA GENERAR UNA TABLA EDITABLE CON LA FILA SELECCIONADA
while($mostrar=mysqli_fetch_array($result)){ ?>
<form id="textBorrado" name="textBorrado" action="solicitudes.php" method="get">
<div id="borrarAccesos" name="borrarAccesos" class="borrarAccesos">
	<h2>NO SOLICITAR EL SIGUIENTE ACCESO</h2><br><br>
  <div id="borrarDatosSolicitud" name="borrarDatosSolicitud" class="borrarDatosSolicitud"><!-- Inicio div engobla encabezados y datos -->
  <div id="borrarEncabezadosSolicitud" name="borrarEncabezadosSolicitud" style="display:inline-flex;border:0px solid rgb(218, 217, 217);"><!-- Inicio fila de encabezados -->
    <div class="borrarEncabezado" style="width:22px;"><p style="font-size:13px;">Nº</p></div>
    <div class="borrarEncabezado" style="width:8%;"><p style="margin-top:3px;font-size:13px;">DNI<br>PASAPORTE</p></div>
    <div class="borrarEncabezado" style="width:11%;"><p style="font-size:14px;">NOMBRE</div>
    <div class="borrarEncabezado" style="width:17%;"><p style="font-size:14px;">APELLIDOS</p></div>
    <div class="borrarEncabezado" style="width:12.5%;"><p style="font-size:14px;">EMPRESA</p></div>
    <div class="borrarEncabezado" style="width:6.5%;"><p style="font-size:14px;">VEHICULO</p></div>
    <div class="borrarEncabezado" style="width:5.5%;"><p style="margin-top:3px;font-size:13px;">FECHA<br>INICIO</p></div>
    <div class="borrarEncabezado" style="width:5.5%;"><p style="margin-top:3px;font-size:13px;">FECHA<br>FINAL</p></div>
    <div class="borrarEncabezado" style="width:12%;"><p style="font-size:14px;">MOTIVO VISITA</p></div>
    <div class="borrarEncabezado" style="width:18%;margin-right:4px;"><p style="font-size:14px;">OBSERVACIONES</p></div>
  </div><!-- final fila de encabezados -->
  <div id="borrarDatos" name="borraredicionDatos" style="display:inline-flex;border:0px solid rgb(218, 217, 217);"><!-- Inicio fila de edicion de datos accesos -->
    <div class="borrarDato" id="div-borrarNUM" name="div-borrarNUM" style="width:22px;height:22px;margin-left:5px;margin-right:0px;border:0px solid rgb(235, 190, 225, 1);background-color:rgb(235, 190, 225, 1);">
      <input id="borrarID" name="borrarID" type="text" class="borrarInputDato" style="width:96%;font-weight:bold;text-align:center;margin-left:-2px;margin-top:1px;outline:none;" readonly placeholder="<?php echo $mostrar['ID'];?>" value="<?php echo $mostrar['ID'];?>" autocomplete="off">
    </div>
    <div class="borrarDato" id="div-borrarDNI" name="div-borrarDNI" style="width:8%;">
      <input id="borrarDNI" name="borrarDNI" type="text" class="borrarInputDato" style="width:96%;" readonly placeholder="<?php echo $mostrar['DNI'];?>" value="<?php echo $mostrar['DNI'];?>" autocomplete="off">
    </div>
    <div class="borrarDato" id="div-borrarNombre" name="div-borrarNombre" style="width:11%;">
      <input id="borrarNombre" name="borrarNombre" type="text" class="borrarInputDato" readonly placeholder="<?php echo $mostrar['NOMBRE'];?>" value="<?php echo $mostrar['NOMBRE'];?>" autocomplete="off">
    </div>
    <div class="borrarDato" id="div-borrarApellidos" name="div-borrarApellidos" style="width:17%;">
      <input id="borrarApellidos" name="borrarApellidos" type="text" class="borrarInputDato" readonly placeholder="<?php echo $mostrar['APELLIDOS'];?>" value="<?php echo $mostrar['APELLIDOS'];?>" autocomplete="off">
    </div>
    <div class="borrarDato" id="div-borrarEmpresa" name="div-borrarEmpresa" style="width:12.5%;">
      <input id="borrarEmpresa" name="borrarEmpresa" type="text" class="borrarInputDato" readonly placeholder="<?php echo $mostrar['EMPRESA'];?>" value="<?php echo $mostrar['EMPRESA'];?>" autocomplete="off">
    </div>
    <div class="borrarDato" id="div-borrarVehiculo" name="div-borrarVehiculo" style="width:6.5%;">
      <input id="borrarVehiculo" name="borrarVehiculo" type="text" class="borrarInputDato" readonly style="width:96%;" placeholder="<?php echo $mostrar['VEHICULO'];?>" value="<?php echo $mostrar['VEHICULO'];?>" autocomplete="off">
    </div>
    <div class="borrarDato" id="div-borrarFechaInicial" name="div-borrarFechaInicial" style="width:5.5%;">
      <input id="borrarFechaInicial" name="borrarFechaInicial" type="text" class="borrarInputDato" style="width:96%;" readonly placeholder="<?php echo $mostrar['FECHA_INICIO'];?>" value="<?php echo $mostrar['FECHA_INICIO'];?>" autocomplete="off">
    </div>
    <div class="borrarDato" id="div-borrarFechaFinal" name="div-borrarFechaFinal" style="width:5.5%;">
      <input id="borrarFechaFinal" name="borrarFechaFinal" type="text" class="borrarInputDato" style="width:96%;" readonly placeholder="<?php echo $mostrar['FECHA_FINAL'];?>" value="<?php echo $mostrar['FECHA_FINAL'];?>" autocomplete="off">
    </div>
    <div class="borrarDato" id="div-borrarMotivo" name="div-borrarMotivo" style="width:12%; autocomplete="off"">
      <input id="borrarMotivo" name="borrarMotivo" type="text" class="borrarInputDato" readonly placeholder="<?php echo $mostrar['MOTIVO'];?>" value="<?php echo $mostrar['MOTIVO'];?>" autocomplete="off">
    </div>
    <div class="borrarDato" id="div-borrarObservaciones" name="div-borrarObservaciones" style="width:18%;margin-right:4px;">
      <input id="borrarObservaciones" name="borrarObservaciones" type="text" class="borrarInputDato" readonly placeholder="<?php echo $mostrar['OBSERVACIONES'];?>" value="<?php echo $mostrar['OBSERVACIONES'];?>" autocomplete="off">
    </div>
  </div><!-- final fila de datos accesos a borrar -->
  <p style="font-size:6px;"></p>
  </div><!-- Final div engobla encabezados y datos a borrar -->
  <table id="botonesMostrar" style="width:99%;">
    <tr><td colspan="2" style="height:12px;"></td></tr>
      <tr>
        <td style="text-align:right;">
            
            <input type="hidden" id="pasos" name="pasos" value="<?php if($numResto>1){echo 12;}else{echo 11;} ?>"/>
            <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
            <input type="hidden" id="borrar" name="borrar" value="<?php echo $mostrar['ID']; ?>"/>

            <input type="hidden" id="numSolicitudes" name="numSolicitudes" value="<?php echo $numSolicitudes; ?>"/>
            <input type="hidden" id="edificioVisita" name="edificioVisita" value="<?php echo $edificioVisita; ?>"/>
            <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>

            <input type="hidden" id="IDresponsable" name="IDresponsable" value="<?php echo utf8_encode(@$IDresponsable); ?>"/>
            <input type="hidden" id="nombreResponsable" name="nombreResponsable" value="<?php echo utf8_encode(@$nombreResponsable); ?>"/>
            <input type="hidden" id="apellidosResponsable" name="apellidosResponsable" value="<?php echo utf8_encode(@$apellidosResponsable); ?>"/>
            <input type="hidden" id="telefonoResponsable" name="telefonoResponsable" value="<?php echo @$telefonoResponsable; ?>"/>
            <input type="hidden" id="correoResponsable" name="correoResponsable" value="<?php echo utf8_encode(@$correoResponsable); ?>"/>
            <button class="boton" style="width:120px;">ELIMINAR</button> 
  </form>
        </td>
        <td style="text-align:left;">
  <form id="" action="solicitudes.php" method="GET">
            <input type="hidden" id="pasos" name="pasos" value="9"/>
            <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>

            <input type="hidden" id="numSolicitudes" name="numSolicitudes" value="<?php echo $numSolicitudes; ?>"/>
            <input type="hidden" id="edificioVisita" name="edificioVisita" value="<?php echo $edificioVisita; ?>"/>
            <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>

            <input type="hidden" id="IDresponsable" name="IDresponsable" value="<?php echo utf8_encode(@$IDresponsable); ?>"/>
            <input type="hidden" id="nombreResponsable" name="nombreResponsable" value="<?php echo utf8_encode(@$nombreResponsable); ?>"/>
            <input type="hidden" id="apellidosResponsable" name="apellidosResponsable" value="<?php echo utf8_encode(@$apellidosResponsable); ?>"/>
            <input type="hidden" id="telefonoResponsable" name="telefonoResponsable" value="<?php echo @$telefonoResponsable; ?>"/>
            <input type="hidden" id="correoResponsable" name="correoResponsable" value="<?php echo utf8_encode(@$correoResponsable); ?>"/>
            <button class="boton" style="width:120px;">CANCELAR</button>
        </td>
      </tr>
    </table>
  </form>
</div>
<?php
mysqli_close($conexion_db);
;}; // FINALIZA WHILE PARA MOSTRAR FILA A BORRAR
;}; // FINALIZA FUNCION MOSTRAR ACCESOS A BORRAR:  mostrarAccesoBorrar($borrar,$codigoSolicitante)
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// VIGESIMA FUNCION: BORRAR LOS DATOS EN LA BASE ACCESOS_TEMP (BOTON BORRAR)
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function borrarAccesos01($borrar,$codigoSolicitante){require('02-albacon-php/04-variables-solicitudes.php');
$conexion_db;
$baseDatos;
$sql="DELETE FROM accesos_temp WHERE ID='$borrar' AND CODIGO='$codigoSolicitante' ";
$result=mysqli_query($conexion_db,$sql);
mysqli_close($conexion_db);
;}; // FINAL DE LA FUNCION BORRAR DATOS: borrarAccesos01()
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// VIGESIMOPRIMERA FUNCION: MOSTRAR AVISO DE ULTIMO ACCESO DE LA SOLICITUD ANTES DE BORRARLO
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mostrarAvisoUltimoAcceso(){require('02-albacon-php/04-variables-solicitudes.php');
  ?>
<div id="avisoUltimoAcceso" name="avisoUltimoAcceso" class="oscurecerContenedor">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAviso">
  <p style="font-size:19px;font-weight:bold;color:rgb(224, 23, 50, 1);">AVISO IMPORTANTE</p>
  <p style="font-size:17px;">ELIMINAR EL UNICO ACCESO DE ESTA SOLICITUD Y COMENZAR NUEVA</p>
<table  style="width:100%;margin-top:5px;text-align:center;">
  <tr>
    <td style="width:50%;text-align:right;padding-right:5px;">
    <form action="solicitudes.php" method="get">
      <input type="hidden" id="pasos" name="pasos" value="2"/>
      <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
      <input type="hidden" id="borrar" name="borrar" value="<?php echo $borrar; ?>"/>
      <input type="hidden" id="ultimoAcceso" name="ultimoAcceso" value="1"/>

      <input type="hidden" id="numSolicitudes" name="numSolicitudes" value="<?php echo $numSolicitudes; ?>"/>
      <input type="hidden" id="edificioVisita" name="edificioVisita" value="<?php echo $edificioVisita; ?>"/>
      <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>

      <input type="hidden" id="IDresponsable" name="IDresponsable" value="<?php echo utf8_encode(@$IDresponsable); ?>"/>
      <input type="hidden" id="nombreResponsable" name="nombreResponsable" value="<?php echo utf8_encode(@$nombreResponsable); ?>"/>
      <input type="hidden" id="apellidosResponsable" name="apellidosResponsable" value="<?php echo utf8_encode(@$apellidosResponsable); ?>"/>
      <input type="hidden" id="telefonoResponsable" name="telefonoResponsable" value="<?php echo @$telefonoResponsable; ?>"/>
      <input type="hidden" id="correoResponsable" name="correoResponsable" value="<?php echo utf8_encode(@$correoResponsable); ?>"/>
      <input type="submit" class="boton" value="ACEPTAR" style="width:100px;height:26px;">
    </form>
    </td>
    <td style="width:50%;text-align:left;padding-left:5px;">
    <form action="solicitudes.php" method="get">
      <input type="hidden" id="pasos" name="pasos" value="12"/>
      <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
      <input type="hidden" id="borrar" name="borrar" value="<?php echo $borrar; ?>"/>
      <input type="hidden" id="ultimoAcceso" name="ultimoAcceso" value="1"/>

      <input type="hidden" id="numSolicitudes" name="numSolicitudes" value="<?php echo $numSolicitudes; ?>"/>
      <input type="hidden" id="edificioVisita" name="edificioVisita" value="<?php echo $edificioVisita; ?>"/>
      <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>
      
      <input type="hidden" id="IDresponsable" name="IDresponsable" value="<?php echo utf8_encode(@$IDresponsable); ?>"/>
      <input type="hidden" id="nombreResponsable" name="nombreResponsable" value="<?php echo utf8_encode(@$nombreResponsable); ?>"/>
      <input type="hidden" id="apellidosResponsable" name="apellidosResponsable" value="<?php echo utf8_encode(@$apellidosResponsable); ?>"/>
      <input type="hidden" id="telefonoResponsable" name="telefonoResponsable" value="<?php echo @$telefonoResponsable; ?>"/>
      <input type="hidden" id="correoResponsable" name="correoResponsable" value="<?php echo utf8_encode(@$correoResponsable); ?>"/>
      <input type="submit" class="boton" value="VOLVER" style="width:100px;height:26px;">
    </form>
    </td>
  </tr>
</table>
</div>
</div>
  <?php
  ;};
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// VIGESIMOSEGUNDA FUNCION: BORRAR DATOS TEMPORALES DE LA BASE accesos_temp (BOTONES CANCELAR Y CERRAR SESION)
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function borrarBaseTemp($codigoSolicitante){require('02-albacon-php/04-variables-solicitudes.php');
// PRIMERO SE SELECCIONAN LOS DATOS
$conexion_db;
$baseDatos;
$sql="SELECT * FROM accesos_temp WHERE CODIGO='$codigoSolicitante' ";
$result=mysqli_query($conexion_db,$sql);
$num = mysqli_num_rows($result);
for($i=1;$i<=$num;$i++){$i;
$sql0="DELETE FROM accesos_temp WHERE CODIGO='$codigoSolicitante' ";
$result0=mysqli_query($conexion_db,$sql0);
;} // FINAL DE BUCLE FOR
mysqli_close($conexion_db);
;}; // FINAL DE LA FUNCION PARA BORRAR LOS DATOS AL FINALIZAR O CERRAR SESION
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// VIGESIMOTERCERA FUNCION: PASAR DATOS DE "accesos_temp" A "accesos_puente" Y CREAR LOS QR's
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function pasarAccesos(){
  require('02-albacon-php/04-variables-solicitudes.php');
  require('04-albacon-lib/phpqrcode/qrlib.php');
// REALIZAMOS LA CONEXION CON LA BASE DE DATOS
$conexion_db;
$baseDatos;
// PRIMERO: COMPROBAMOS QUE EXISTA ALGUN REGISTRO PARA ESE CODIGO Y EVITAR ENTRADA DUPLICADA SI SE REFRESCA LA PAGINA O SI SE USAN FLECHAS ATRAS/ADELANTE
//  * Para ello hacemos una primera consulta en la que obtenemos la variable $procesado, que es la cantidad de registros con PROCESADO = SI
$sql="SELECT PROCESADO FROM accesos_puente WHERE CODIGO='$codigoSolicitante' ";
$result=mysqli_query($conexion_db,$sql);
$procesado=mysqli_num_rows($result);
// SEGUNDO: CONDICIONAMOS INSERTAR A SI $procesado ES 0, ES DECIR NO HAY REGISTROS PARA ESA VARIABLE $codigoSolicitante
//  * SI $procesado = 0 SE COPIAN LOS ACCESOS EN LA TABLA PUENTE
if($procesado <= 0){
// 1) SE INSERTAN LOS DATOS DE CADA ACCESO
  $sql00="INSERT INTO accesos_puente (CODIGO,CODIGO_QR,DNI,NOMBRE,APELLIDOS,EMPRESA,VEHICULO,FECHA_INICIO,FECHA_FINAL,MOTIVO,ID_RESPONSABLE,OBSERVACIONES,PROCESADO) 
  SELECT CODIGO,CODIGO_QR,DNI,NOMBRE,APELLIDOS,EMPRESA,VEHICULO,FECHA_INICIO,FECHA_FINAL,MOTIVO,ID_RESPONSABLE,OBSERVACIONES,PROCESADO 
  FROM accesos_temp WHERE CODIGO='$codigoSolicitante' ";
  $result00=mysqli_query($conexion_db,$sql00);
// 2) SE INSERTAN LOS DATOS COMUNES (se realizara una consulta UPDATE correspondiendo con el CODIGO del acceso)
  // 2.1) Se crean las sigientes variables para ID_SOLICITANTE, FECHA_SOLICITUD
  $fechaSolicitud = date("Y/m/d", $UTCsesion);
  $responsableVisita = utf8_encode($nombreResponsable).' '.utf8_encode($apellidosResponsable);
  // 2.2) Se actualizan los datos correspondientes al codigo del solicitante
  $sql01="UPDATE accesos_puente SET FECHA_SOLICITUD='$fechaSolicitud', EDIFICIO_VISITA='$edificioVisita',ID_RESPONSABLE='$IDresponsable',
  RESPONSABLE_VISITA='$responsableVisita',TELEFONO_RESPONSABLE='$telefonoResponsable',ID_SOLICITANTE='$IDusuario' WHERE CODIGO='$codigoSolicitante' ";
  $result01=mysqli_query($conexion_db,$sql01);
}; // FINAL DE CONDICION DE PROCESADO
// TERCERO: SE PASAN LOS DATOS CORRESPONDIENTES AL DIA MES Y AÑO DE LAS FECHAS INICIAL Y FINAL DEL ACCESO
  // * Para ello se hace una consulta en la que se obtienen las variables $procesado, $codigoQR, $fechaInicio y $fechaFinal
  $sql02="SELECT CODIGO_QR,PROCESADO,FECHA_INICIO,FECHA_FINAL FROM accesos_temp WHERE CODIGO='$codigoSolicitante' ";
    $result02=mysqli_query($conexion_db,$sql02);
    $procesadoTemp = mysqli_num_rows($result02);
// CUARTO: SE INSERTAN LOS DATOS DE FECHA INICIAL Y SE CREAN LOS "CODIGOS QR" MEDIANTE UN BUCLE FOR
  // 4.1) Se crea un array con los valores de los codigos_QR y otro para los valores de fecha inicial
    $QR=array();
    $diaInicial=array();
    $mesInicial=array();
    $anioInicial=array();
    $diaFinal=array();
    $mesFinal=array();
    $anioFinal=array();
  // 4.2) Se llenan los array's y se crean los codigos QR mediante un bucle FOR 
for($i=1;$i<=$procesadoTemp;$i++){$i;$datosExtraidos = mysqli_fetch_array($result02);
  // 4.3) Llenado de array's
    @$QR[$i]=$datosExtraidos[0];
    //Fechas iniciales
    @$marcadorFechaInicial=array();
    @$marcadorFechaInicial = explode('/', $datosExtraidos[2]);
    @$diaInicial[$i]=$marcadorFechaInicial[0];
    @$mesInicial[$i]=$marcadorFechaInicial[1];
    @$anioInicial[$i]=$marcadorFechaInicial[2];
    //Fechas finales
    @$marcadorFechaFinal=array();
    @$marcadorFechaFinal = explode('/', $datosExtraidos[3]);
    @$diaFinal[$i]=$marcadorFechaFinal[0];
    @$mesFinal[$i]=$marcadorFechaFinal[1];
    @$anioFinal[$i]=$marcadorFechaFinal[2];
  // 4.4) creacion de QR's
    $texto=array();
    $texto[$i]=$QR[$i];
    $ruta=array();
    $ruta[$i]="QR-imagenes/$QR[$i].png";
    $level="Q";
    $tamaño=10;
    $frameSize=2;
    QRcode::png($texto[$i], $ruta[$i], $tamaño, $level, $frameSize);
  }; //Finaliza Bucle FOR para llenar variables y CREAR QR's
//echo $marcadorFechaFinal[0];
// QUINTO: SE PASAN LOS DATOS DE FECHA INICIAL Y FINAL A LA BD "accesos_puente" MEDIANTE UN BUCLE FOR
for($i=1;$i<=$procesadoTemp;$i++){$id=$i;
  $sql03="UPDATE accesos_puente SET DIA_INICIO='$diaInicial[$id]', MES_INICIO='$mesInicial[$id]', ANIO_INICIO='$anioInicial[$id]', DIA_FINAL='$diaFinal[$id]', MES_FINAL='$mesFinal[$id]', ANIO_FINAL='$anioFinal[$id]' WHERE CODIGO_QR='$QR[$i]' ";
  $result03=array();
  $result03=mysqli_query($conexion_db,$sql03);
;}; // FINAL BUCLE INSERTAR NUMERO DE DIA, MES Y AÑO INICIAL Y FINAL
mysqli_close($conexion_db); // Se cierrra conexion con B
}; // FINAL DE LA FUNCION DE PASAR ACCESOS DE BD_TEMP A BD_PUENTE
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// VIGESIMOCUARTA FUNCION: CREAR ARCHIVO PDF
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function generarPDF($codigoSolicitante){
  require('02-albacon-php/04-variables-solicitudes.php');
  require('04-albacon-lib/fpdf/fpdf.php');
// COMIENZA LA CLASS PARA CREAR EL CONTENIDO DEL ARCHIVO PDF xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
class PDF extends FPDF{
// CABECERA DE PAGINA PDF xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function Header(){
// SE DEFINE EL ENCABEZADO
  $this->Image('fotos-archivos/Iberia/LogoPDF.png',13,6,40);
  $this->SetFont('Arial','B',12);
  $this->SetTextColor(200, 20, 40);
  $this->SetXY(8, 6);
  $this->Multicell(150, 5, utf8_decode("CONTROL DE ACCESOS             \nINSTALACIONES IBERIA \"LA MUÑOZA\""), 0, 'R', false);
// SE DEFINE UNA LINEA HORIZONTAL DE SEPARACION
  $this->SetDrawColor(200, 20, 40);
  $this->SetLineWidth(0.4);
  $this->Line(15, 18, 193, 18);
// SE DEFINEN LAS CELDAS DE TITULOS DE TABLA DENTRO DEL ENCABEZADO
  $this->SetFillColor(200, 20, 40);
  $this->SetTextColor(255);
  $this->SetFont('Arial','B',11);
// DOS MUTICELDAS, UNA POR DETRAS Y UNA POR DELANTE PARA CADA CELDA DE TITULO
// CELDA CANTIDAD DE ACCESOS:
  $this->SetXY(15,20.4);
  $this->Multicell(8,11," ",1,'C',true);
  $this->SetXY(15,22);
  $this->Multicell(8,8,utf8_decode("Nº"),0,'C',false);
// CELDA NOMBRE Y APELLIDOS: 
  $this->SetXY(24, 20.4);
  $this->Multicell(67,11," ",1,'C',true);
  $this->SetXY(24,22);
  $this->Multicell(67,4,"NOMBRE\nAPELLIDOS",0,'C',true);
// CELDA EMPRESA
  $this->SetXY(92,20.4);
  $this->Multicell(51,11," ",1,'C',true);
  $this->SetXY(92,22);
  $this->Multicell(51,8,"EMPRESA",0,'C',true);
// CELDA FECHAS
  $this->SetXY(144,20.4);
  $this->Multicell(30,11," ",1,'C',true);
  $this->SetXY(144,22);
  $this->Multicell(30,4,"FECHAS\nACCESO",0,'C',true);
// CELDA CODIGOS QR
  $this->SetXY(175,20.4);
  $this->Multicell(18,11," ",1,'C',true);
  $this->SetXY(175,22);
  $this->Multicell(18,4,"CODIGO\nQR",0,'C',true);
} // FINALIZA LA FUNCION HEADER ---------------------------------------------------------------------------------------------------------
// PIE DE PAGINA PDF xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function Footer(){
  $this->SetDrawColor(200, 20, 40);
  $this->SetLineWidth(0.3);
  //Posición: a 1,5 cm del final
  $this->SetY(-18);
  //Arial italic 8
  $this->SetFont('Arial','I',8);
  //Número de página
  $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}','T',0,'C');
} // FINALIZA LA FUNCION FOOTER ----------------------------------------------------------------------------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// CONTENIDO DE LA CADA PAGINA xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// 2) FUNCION PARA RELLENAR LA ULTIMA HOJA (RESTO DE SOLICITUDES) xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function filaFinalTabla($numAccesos,$numPaginas){require('02-albacon-php/04-variables-solicitudes.php');
//echo $codigoSolicitante;
// SE REALIZA CADA FILA DE LA TABLA CON DOS CELDAS POR DATO
// VALORES GENERALES DE FUENTE Y BORDES
  $this->SetTextColor(140,140,140);
  $this->SetFont('Arial','',9.5);
  $this->SetDrawColor(204,204,204);
  $this->SetLineWidth(0.4);
  $pagina=$this->PageNo();
// SE REALIZA LA CONEXION CON LA BASE DE DATOS
$conexion_db;
$baseDatos;
// SE OBTIENE EL NUMERO DE ACCESOS DEFINITIVOS Y LOS DATOS CORRESPONDIENTE PARA CREAR EL PDF
$sql06="SELECT CODIGO_QR,NOMBRE,APELLIDOS,EMPRESA,FECHA_INICIO,FECHA_FINAL FROM accesos_temp WHERE CODIGO='$codigoSolicitante' ";
$result06 = mysqli_query($conexion_db,$sql06);
$numAccesos = mysqli_num_rows($result06);
// MEDIANTE BUCLE FOR SE CREA Y LLENA EL ARRAY DE DATOS PROCEDENTES DE LA BD, QUE LUEGO SE MUESTRAN DEPENDIENDO DE MANEJADORES
for($x=0;$x<=$numAccesos;$x++){$x;$datosAccesos[$x] = mysqli_fetch_array($result06);};
// BUCLE "FOR" PARA CREAR LAS FILAS DE LA TABLA DE LA ULTIMA PAGINA, COLOCANDOLAS EN SU POSICION Y LLENAS DE DATOS DE SOLICITUDES ------------
for($i=0;$i<=($numAccesos-(($numPaginas-1)*12)-1);$i++){$i;
// SE CREA LA VARIABLE CONTADOR DEPENCIENDO DE LA PAGINA DEL ARCHIVO PDF EN LA QUE ESTEMOS (SE INTENTARA HACER UN BUCLE)
if($pagina==1){$numSolicitud=$i+1;$contador=$i+0;};
if($pagina==2){$numSolicitud=$i+13;$contador=$i+12;};
if($pagina==3){$numSolicitud=$i+25;$contador=$i+24;};
if($pagina==4){$numSolicitud=$i+37;$contador=$i+36;};
if($pagina==5){$numSolicitud=$i+49;$contador=$i+48;};
if($pagina==6){$numSolicitud=$i+61;$contador=$i+60;};
if($pagina==7){$numSolicitud=$i+73;$contador=$i+72;};
if($pagina==8){$numSolicitud=$i+85;$contador=$i+84;};
if($pagina==9){$numSolicitud=$i+97;$contador=$i+96;};
if($pagina==10){$numSolicitud=$i+109;$contador=$i+108;};
if($pagina==11){$numSolicitud=$i+121;$contador=$i+120;};
if($pagina==12){$numSolicitud=$i+133;$contador=$i+132;};
if($pagina==13){$numSolicitud=$i+145;$contador=$i+144;};
if($pagina==14){$numSolicitud=$i+157;$contador=$i+156;};
if($pagina==15){$numSolicitud=$i+169;$contador=$i+168;};
if($pagina==16){$numSolicitud=$i+181;$contador=$i+180;};
if($pagina==17){$numSolicitud=$i+193;$contador=$i+192;};
if($pagina==18){$numSolicitud=$i+205;$contador=$i+204;};
if($pagina==19){$numSolicitud=$i+217;$contador=$i+216;};
if($pagina==20){$numSolicitud=$i+229;$contador=$i+228;};
// CELDA CANTIDAD DE ACCESOS:
  $this->SetXY(15,33+($i*20));
  $this->Multicell(8,18," ",1,'C',false);
  $this->SetXY(15,33+($i*20));
  $this->Multicell(8,18,$numSolicitud,0,'C',false);
// CELDA NOMBRE Y APELLIDOS:
  $this->SetXY(24,33+($i*20));
  $this->Multicell(67,18," ",1,'C',false);
  $this->SetXY(26,38+($i*20));
  $this->Multicell(65,4.5,utf8_decode($datosAccesos[$contador]['NOMBRE']."\n".$datosAccesos[$contador]['APELLIDOS']),0,'L',false);
// CELDA EMPRESA
  $this->SetXY(92,33+($i*20));
  $this->Multicell(51,18," ",1,'C',false);
  $this->SetXY(92,33+($i*20));
  $this->Multicell(51,18,utf8_decode($datosAccesos[$contador]['EMPRESA']),0,'C',false);
// CELDA FECHAS
  $this->SetXY(144,33+($i*20));
  $this->Multicell(30,18," ",1,'C',false);
  $this->SetXY(144,37+($i*20));
  $this->Multicell(30,5,"Inicial: ".$datosAccesos[$contador]['FECHA_INICIO']."\nFinal:  ".$datosAccesos[$contador]['FECHA_FINAL'],0,'C',false);
// CELDA CODIGOS QR
  $this->SetXY(175,33+($i*20));
  $this->Multicell(18,18," ",1,'C',false);
  $this->Multicell(33+($i*20),4,$this->Image("QR-imagenes/".$datosAccesos[$contador]['CODIGO_QR'].".png",176,34+$i*20,16,16),0,'C',false);
}; // FINAL DEL BUCLE FOR PARA EL RESTO DE FILAS DELA TABLA -----------------------------------------------------------------------------
} // FINAL DE LA FUNCION filaFinalTabla() -----------------------------------------------------------------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// 1) FUNCION PARA RELLENAR HOJAS ENTERAS (12 SOLICITUDES POR HOJA) xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function filaTabla($numAccesos,$numPaginas){require('02-albacon-php/04-variables-solicitudes.php');
//echo $codigoSolicitante;
//SE REALIZA LA CONEXION CON LA  BASE DE DATOS
$conexion_db;
$baseDatos;
// SE REALIZA CADA FILA DE LA TABLA CON DOS CELDAS POR DATO
// VALORES GENERALES DE FUENTE Y BORDES
  $this->SetTextColor(140,140,140);
  $this->SetFont('Arial','',9.5);
  $this->SetDrawColor(204,204,204);
  $this->SetLineWidth(0.4);
  $pagina=$this->PageNo();
// SE OBTIENE EL NUMERO DE ACCESOS DEFINITIVOS Y LOS DATOS CORRESPONDIENTE PARA CREAR EL PDF
  $sql06="SELECT CODIGO_QR,NOMBRE,APELLIDOS,EMPRESA,FECHA_INICIO,FECHA_FINAL FROM accesos_temp WHERE CODIGO='$codigoSolicitante' ";
  $result06 = mysqli_query($conexion_db,$sql06);
  $numAccesos = mysqli_num_rows($result06);
// MEDIANTE BUCLE FOR SE CREA Y LLENA EL ARRAY DE DATOS PROCEDENTES DE LA BD, QUE LUEGO SE MUESTRAN DEPENDIENDO DE MANEJADORES
  for($x=0;$x<=$numAccesos;$x++){$x;$datosAccesos[$x] = mysqli_fetch_array($result06);};
// BUCLE FOR PARA CREAR LAS FILAS DE LA TABLA COLOCANDOLAS EN SU POSICION Y LLENAS DE DATOS DE SOLICITUDES -------------------------------------
  for($i=0;$i<=11;$i++){$i;
// SE CREAN LAS VARIABLES "CONTADOR DE SOLICITUDES" QUE DEPENDEN DE LA PAGINA DEL ARCHIVO PDF EN LA QUE ESTEMOS Y SIRVEN PARA MANEJAR LOS BUCLES
  if($pagina==1){$numSolicitud=$i+1;$contador=$i+0;};
  if($pagina==2){$numSolicitud=$i+13;$contador=$i+12;};
  if($pagina==3){$numSolicitud=$i+25;$contador=$i+24;};
  if($pagina==4){$numSolicitud=$i+37;$contador=$i+36;};
  if($pagina==5){$numSolicitud=$i+49;$contador=$i+48;};
  if($pagina==6){$numSolicitud=$i+61;$contador=$i+60;};
  if($pagina==7){$numSolicitud=$i+73;$contador=$i+72;};
  if($pagina==8){$numSolicitud=$i+85;$contador=$i+84;};
  if($pagina==9){$numSolicitud=$i+97;$contador=$i+96;};
  if($pagina==10){$numSolicitud=$i+109;$contador=$i+108;};
  if($pagina==11){$numSolicitud=$i+121;$contador=$i+120;};
  if($pagina==12){$numSolicitud=$i+133;$contador=$i+132;};
  if($pagina==13){$numSolicitud=$i+145;$contador=$i+144;};
  if($pagina==14){$numSolicitud=$i+157;$contador=$i+156;};
  if($pagina==15){$numSolicitud=$i+169;$contador=$i+168;};
  if($pagina==16){$numSolicitud=$i+181;$contador=$i+180;};
  if($pagina==17){$numSolicitud=$i+193;$contador=$i+192;};
  if($pagina==18){$numSolicitud=$i+205;$contador=$i+204;};
  if($pagina==19){$numSolicitud=$i+217;$contador=$i+216;};
  if($pagina==20){$numSolicitud=$i+229;$contador=$i+228;};
// CELDA CANTIDAD DE ACCESOS:
  $this->SetXY(15,33+($i*20));
  $this->Multicell(8,18," ",1,'C',false);
  $this->SetXY(15,33+($i*20));
  $this->Multicell(8,18,$numSolicitud,0,'C',false);
// CELDA NOMBRE Y APELLIDOS:
  $this->SetXY(24,33+($i*20));
  $this->Multicell(67,18," ",1,'C',false);
  $this->SetXY(24,38+($i*20));
  $this->Multicell(65,4.5,utf8_decode($datosAccesos[$contador]['NOMBRE']."\n".$datosAccesos[$contador]['APELLIDOS']),0,'L',false);
// CELDA EMPRESA
  $this->SetXY(92,33+($i*20));
  $this->Multicell(51,18," ",1,'C',false);
  $this->SetXY(92,33+($i*20));
  $this->Multicell(51,18,utf8_decode($datosAccesos[$contador]['EMPRESA']),0,'C',false);
// CELDA FECHAS
  $this->SetXY(144,33+($i*20));
  $this->Multicell(30,18," ",1,'C',false);
  $this->SetXY(144,37+($i*20));
  $this->Multicell(30,5,"Inicial: ".$datosAccesos[$contador]['FECHA_INICIO']."\nFinal:  ".$datosAccesos[$contador]['FECHA_FINAL'],0,'C',false);
// CELDA CODIGOS QR
  $this->SetXY(175,33+($i*20));
  $this->Multicell(18,18," ",1,'C',false);
  $this->Multicell(33+($i*20),4,$this->Image("QR-imagenes/".$datosAccesos[$contador]['CODIGO_QR'].".png",176,34+$i*20,16,16),0,'C',false);
}; // FINAL DEL BUCLE FOR PARA 12 FILAS --------------------------------------------------------------------------------------------------
} // FINAL DE LA FUNCION filaTabla() -----------------------------------------------------------------------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
}// FINAL DE LA CLASS PDF
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// A PARTIR DE AQUI ES CODIGO PARA CREAR EL ARCHIVO 
// 1) SE AÑADE UN ELEMENTO PDF
$pdf=new PDF(); 
// 2) SE OBTIENE EL NUMERO DE ACCESOS DEFINITIVOS
$conexion_db;
$baseDatos;
$sql06="SELECT NOMBRE FROM accesos_temp WHERE CODIGO='$codigoSolicitante' ";
$result06 = mysqli_query($conexion_db,$sql06);
$numAccesos = mysqli_num_rows($result06);//echo '<br>NUM: '.$numAccesos.'<br>';
if($numAccesos%12==0){$numPaginas=$numAccesos/12;}else{$numPaginas=intval($numAccesos/12)+1;};
// 3) MEDIANTE BUCLE "FOR" SE AÑADEN PAGINAS Y TABLAS CON VALORES DE ACCESSOS A CADA PAGINA (12 SOLICITUDES POR PAGINA)
for($j=1;$j<=$numPaginas-1;$j++){$pdf->AddPage();$pdf->filaTabla($numAccesos,$numPaginas);};
// 4) SE AÑADE LA ULTIMA PAGINA CON EL RESTO DE FILAS DE DATOS HASTA COMPLETAR EL NUMERO DE SOLICITUDES (SIN BUCLE)
$pdf->AddPage();$pdf->filaFinalTabla($numAccesos,$numPaginas);
// 5) SE AÑADE EL NUMERO DE PAGINAS TOTALES 
$pdf->AliasNbPages(); // Numeracion de paginas
// 6) SE CREA EL ARCHIVO PDF CORRESPONDIENTE A LA SOLICITUD EN CURSO
$pdf->Output('F', 'PDF-temp/'.$codigoSolicitante.'.pdf');
//$pdf->Output('I', 'PDF-temp/'.$codigoSolicitante.'.pdf');
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
mysqli_close($conexion_db); // Se cierrra conexion con Base de Datos
}; // FINAL DE LA FUNCION "generarPDF()"
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// VIGESIMOQUINTA FUNCION: MOSTRAR PANTALLA DE ENVIO CORREO CON LOS CODIGOS QR'S GENERADOS
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mostrarCorreo(){require('02-albacon-php/04-variables-solicitudes.php');
?>
<div id="fondoCorreo" name="fondoCorreo" class="oscurecerContenedor">
  <div id="enviarCorreo" name="enviarCorreo" class="enviarCorreo" style="<?php if($accion==3){echo 'top:24%';}else{echo 'top:18%';};?>;font-weight:normal;width:70%;height:auto;background-image:url('fotos-archivos/Iberia/Logo-Blanco-02.png');">
  <form id="formEnviarCorreo" action="solicitudes.php" method="get">
<?php
if($accion==2){echo '<h2>LA SOLICITUD DE ACCESO SE HA ACTUALIZADO CORRECTAMENTE</h2><p>ABRA EL ARCHIVO ADJUNTO Y COMPRUEBE QUE LOS DATOS SON CORRECTOS</p>';}
elseif($accion==3){echo '<h2>EL ACCESO SELECIONADO HA SIDO ANULADO CORRECTAMENTE</h2>';}
else{echo '<h2>LAS SOLICITUDES DE ACCESO SE HAN TRAMITADO CORRECTAMENTE</h2><p>ABRA EL ARCHIVO ADJUNTO Y COMPRUEBE QUE LOS DATOS SON CORRECTOS</p>';}
?>
    <p>INTRODUZCA LA DIRECCION DE CORREO DEL DESTINATARIO</p>
      <input type="hidden" id="inputNombre" name="inputNombre" value="<?php echo $inputNombre; ?>"/>
      <input type="hidden" id="inputApellidos" name="inputApellidos" value="<?php echo $inputApellidos; ?>"/>
      <input type="hidden" id="inputEmpresa" name="inputEmpresa" value="<?php echo $inputEmpresa; ?>"/>
      <input type="hidden" id="respNewQR" name="inputIDResp" value="<?php echo $inputIDResp; ?>"/>
      <input type="hidden" id="IDresponsable" name="IDresponsable" value="<?php echo $IDresponsable; ?>"/>
      <input type="hidden" id="correoResponsable" name="correoResponsable" value="<?php echo $correoResponsable; ?>"/>
      <input type="hidden" id="conCopiaOculta" name="conCopiaOculta" value="<?php if($IDresponsable<>$IDusuario){echo $correoResponsable;};?>"/>
      <input type="hidden" id="accion" name="accion" value="<?php echo @$accion; ?>"/>
      <input type="hidden" id="correoEnviado" name="correoEnviado" value="1"/>
    <table  style="width:100%;margin-top:5px;text-align:center;">
      <tr>
        <td style="width:36%;text-align:right;"><p style="font-size:16px;text-align:right;padding-right:8px;padding-bottom:8px;">Correo del destinatario: </p></td>
        <td style="width:63%;text-align:left;">
          <input type="text" id="correoDestinatario" name="correoDestinatario" placeholder="correo del destinatario" maxlength="60" style="width:70%;"/>
        </td>
      </tr>
      <tr>
        <td style="width:36%;text-align:right;"><p style="font-size:16px;text-align:right;padding-right:8px;padding-bottom:8px;">Con copia a: </p></td>
        <td style="width:63%;text-align:left;">
          <input type="text" id="conCopia" name="conCopia" placeholder="con copia a" maxlength="60" style="width:70%;"/>
        </td>
      </tr>
      <?php
// CONDICION PARA MOSTRAR EL ARCHIVO ADJUNTO
if($accion<>3){
?>
      <tr>
        <td style="width:36%;text-align:right;"><p style="font-size:16px;text-align:right;padding-right:8px;padding-bottom:8px;">Archivo con códigos QR: </p>
        </td>
        <td style="width:63%;text-align:left;">
          <a href="<?php echo 'PDF-temp/'.$codigoSolicitante.'.pdf'; ?>" target="_blank" title="VER ARCHIVO PDF" style="text-decoration:none;font-size:14px;">
            <img id="iconoPDF" class="iconoPDF" src="fotos-archivos/iconoPDFprueba05.png" style="width:48%;" alt="VER ARCHIVO PDF"/>
          </a>
        </td>
      </tr>
<?php
;}; // Fin condición
?>
    </table>
    <table  style="width:100%;margin-top:5px;text-align:center;">
      <tr>
        <td style="width:41%;text-align:right;">
  <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX  BOTON PARA ENVIAR Y CERRAR SESION  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX  -->
          <button id="enviarYsalir" name="pasos" class="boton" value="<?php if($pasos==13||$pasos==15||$pasos==16){echo 16;}else{echo 17;};?>" style="width:44%;height:28px;">ENVIAR Y TERMINAR</button>
        </td>
  <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX  BOTON PARA ENVIAR Y VOLVER AL FORMULARIO INICIAL XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX  -->
        <td style="width:41%;text-align:left;">
          <button id="enviarYnueva" name="pasos" class="boton" value="<?php if($pasos==13||$pasos==15||$pasos==16){echo 15;}else{echo 18;};?>" style="width:44%;height:28px;">ENVIAR Y CONTINUAR</button>
        </td>
      </tr>
    </form><!-- xxxxxxxxxxxx Final formulario enviar xxxxxxxxxxxxx -->
<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX  BOTON CANCELAR  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX  -->
    </table>
    <table  style="width:100%;margin-top:-5px;text-align:center;">
      <tr>
        <td style="width:18%;text-align:center;">
   <form action="solicitudes.php" method="get">
        <input type="hidden" id="pasos" name="pasos" value="<?php if($accion==2||$accion==3){echo 1;}else{echo 9;}; ?>"/>
        <input type="hidden" id="accion" name="accion" value="<?php echo @$accion; ?>"/>
        <input type="hidden" id="numSolicitudes" name="numSolicitudes" value="<?php echo $numSolicitudes; ?>"/>
        <input type="hidden" id="edificioVisita" name="edificioVisita" value="<?php echo $edificioVisita; ?>"/>
        <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>
        <input type="hidden" id="IDresponsable" name="IDresponsable" value="<?php echo utf8_encode(@$IDresponsable); ?>"/>
        <input type="hidden" id="nombreResponsable" name="nombreResponsable" value="<?php echo utf8_encode(@$nombreResponsable); ?>"/>
        <input type="hidden" id="apellidosResponsable" name="apellidosResponsable" value="<?php echo utf8_encode(@$apellidosResponsable); ?>"/>
        <input type="hidden" id="telefonoResponsable" name="telefonoResponsable" value="<?php echo @$telefonoResponsable; ?>"/>
        <input type="hidden" id="correoResponsable" name="correoResponsable" value="<?php echo utf8_encode(@$correoResponsable); ?>"/>
        <input type="submit" class="boton" value="CANCELAR" style="width:12%;margin-top:4px;height:28px;">
    </form><!-- xxxxxxxxxxxx Final formulario CANCELAR xxxxxxxxxxxxx -->
        </td>
      </tr>
    </table>
<p></p>
  </div><!-- Final div enviar correo -->
</div><!-- Final fondo -->
<?php
}; // FINAL DE FUNCION MOSTRAR PANTALLA DE ENVIO DE CORREO CON CODIGOS QR

// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// VIGESIMOSEXTA FUNCION: AVISO DE FALTA DE CORREO DE DESTINATARIO
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function avisoSinDestinatario(){?>
<div id="avisoSinDestinatario" name="avisoSinDestinatario" class="oscurecerContenedor">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAviso">
    <div id="tituloAviso" class="tituloAviso">AVISO IMPORTANTE</div>
    <div id="mensajeAviso" class="mensajeAviso">DEBE INDICAR UN CORREO VALIDO PARA EL DESTINATARIO</div>
      <a href="javascript:cerrarAvisoSinDestinatario();">ACEPTAR</a>
  </div><!-- FINAL mostrarAvisoError -->
</div><!-- FINAL mostrarAviso -->
<?php
}; // Final funcion de aviso de falta correo destinatario
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// VIGESIMOSEPTIMA FUNCION: PROCESADO Y ENVIO CORREO CON LOS CODIGOS QR'S GENERADOS CON PHPMAILER
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// LA INCLUSION DE LAS CLASES DE PHPMAILER SE HACE FUERA DE LA FUNCION
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// -------------------------------------------------------------------------------------------------------------------------------------------------
function mandarCorreo(){
  require('02-albacon-php/04-variables-solicitudes.php');
  require('PHPMailer/Exception.php');
  require('PHPMailer/PHPMailer.php');
  require('PHPMailer/SMTP.php');
$solicitante = $nombreUsuario.' '.$apellidosUsuario;
$conexion_db;
$baseDatos;
// 1) SE SOLICITA LA CLASE
  $mail = new PHPMailer(true);
  try {
// 2) CONFIGURACION DEL SERVIDOR CON GMAIL
  //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  //Enable verbose debug output
//$mail->SMTPDebug = 2;  //PONIENDO OPCION 2, SE MUESTRAN TODOS LOS PASOS DEL ENVIO DE CORREO UNA VEZ FUNCIONA BIEN SE PONE 0 O SE COMENTA
  $mail->isSMTP(); // ENVIO DE CORREO USANDO SMTP
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;  // HABILITADA SMTP AUTENTICACION
  $mail->Username = 'albacon.accesos@gmail.com'; // SMTP username (CORREO DESDE DONDE SE ENVIA)
  //$mail->Password = 'Al553383bacon006.'; //SMTP password
  $mail->Password = 'rjai wyel hxyp enhq'; //SMTP password - SE USA ESTA YA QUE SE HA ACTIVADO LA "VERIFICACION EN DOS PASOS" PARA PHPMAILER EN GMAIL
  //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465; // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  $mail->SMTPOptions = array('ssl'=>array('verify_peer'=>false,'verify_peer_name'=>false,'allow_self_signed'=> true)); // LINEA FUNDAMENTAL PARA FUNCIONAR CON LOCALHOST
// 3) CONFIGURACION DE DESTINATARIOS
  $mail->setFrom('albacon.accesos@gmail.com', 'ACCESOS IBERIA'); // QUIEN LO ENVIA - MISMO QUE USERNAME 'albacon.accesos@gmail.com',
  $mail->addAddress($correoDestinatario , $solicitante); // AQUI PODEMOS PONER EL NOMBRE Y APELLIDOS DEL USUARIO CON LA VARIABLE CORRESPONDIENTE
  //$mail->addAddress($correoDestinatario , ' USUARIO AUTORIZADO'); // AQUI PODEMOS PONER EL NOMBRE Y APELLIDOS DEL USUARIO CON LA VARIABLE CORRESPONDIENTE
  //$mail->addAddress('ellen@example.com'); // Name is optional
  //$mail->addReplyTo('info@example.com', 'Information');
  if($conCopia<>''){$mail->addCC($conCopia);}else{};// QUIEN VA EN COPIA - SE EVALUA SI SE PONE CORREO EN EL INPUT DE CC
  //if($IDresponsable<>$IDusuario){$mail->addBCC($conCopiaOculta);}else{};// QUIEN VA EN COPIA OCULTA - SE ENVIARA AL CORREO DEL RESPONSABLE SI ES DISTINTO DEL USUARIO)
  $mail->CharSet = 'UTF-8'; // PARA USO DE CARACTERES ESPECIALES DE CASTELLANO
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// 4) ADJUNTAR ARCHIVOS (Attachments)
  $mail->addAttachment('PDF-temp/'.$codigoSolicitante.'.pdf'); // SE ADJUNTARA EL ARCHIVO CORRESPONDIENTE PDF CON LOS QR'S
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
// INCLUIR IMAGENES EN EL MENSAJE
$mail->AddEmbeddedImage('fotos-archivos/Iberia/Logo-Correo.png','logo','logo IBERIA');
$mail->AddEmbeddedImage('fotos-archivos/albacon_hoja.png','hoja','hoja');
// 5) COMPOSICION DEL CORREO
  $mail->isHTML(true); // PARA ENVIAR EL CORREO EN FORMATO HTML (SECREARA LA VARIABLE $mensaje)
  $mail->Subject = @$asunto; // ASUNTO DEL CORREO
  $mail->Body = @$mensaje; // TEXTO DEL CORREO
  //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; // OTRO FORMATO DE CORREO ALTERNATIVO EN DESUSO
// 6) ENVIO DEL CORREO
 $mail->send();
// 7) CODIGO DE CONTROL - SE COMENTARA CUANDO SE ENVIE CORRECTAMENTE Y SE REALIZARA LA ACCION DE NUEVA SOLICITUD O CERRAR SESION
// echo 'ENVIADO CORRECTAMENTE';
} // Finaliza TRY
catch (Exception $e){//echo "Error en el envío del correo: {$mail->ErrorInfo}";
} // Finaliza CATCH
// 8) SE ELIMINAN LOS DATOS  -------------------------------------------------------------------------------------------------------------------------
// 8.1) SE REALIZA UN BUCLE WHILE PARA BORRAR LOS ARCHIVOS QR's
$sql="SELECT * FROM accesos_temp WHERE CODIGO='$codigoSolicitante' ";
$result=mysqli_query($conexion_db,$sql);
$n = mysqli_num_rows($result);
  $v = 1; 
  while ($v <= $n) {
    @unlink('QR-imagenes/'.$v.'-'.$codigoSolicitante.'-'.$IDresponsable.'.png');
  $v++;
  };
// 8.2) SE REALIZA UN BUCLE FOR PARA BORRAR LOS DATOS DE LA BD_TEMP
for($v=1;$v<=$n;$v++){$v;
  $sql0="DELETE FROM accesos_temp WHERE CODIGO='$codigoSolicitante' ";
  $result0=mysqli_query($conexion_db,$sql0);
  ;}; // FINAL DE BUCLE FOR
// 8.3) SE ELIMINA EL ARCHIVO PDF UNA VEZ ENVIADO
@unlink('PDF-temp/'.$codigoSolicitante.'.pdf');
// 9) SE SUMA UNO A LOS USOS DE ESE USUARIO EN LA TABLA SOLICITANTES
$sql="SELECT USOS FROM solicitantes WHERE ID ='$IDusuario' ";
$result=mysqli_query($conexion_db,$sql);
$usosSolicitante = mysqli_fetch_array($result);
//echo $usosSolicitante[0];
@$usos=$usosSolicitante[0] + 1;
//echo $usos;echo $IDusuario;
$sql01="UPDATE solicitantes SET USOS='$usos' WHERE ID='$IDusuario' ";
$result01=mysqli_query($conexion_db,$sql01);
mysqli_close($conexion_db);// SE CIERRA CONEXION CON BD
}; // FINAL DE FUNCION PROCESAR, ENVIAR CORREO CON CODIGOS QR, BORRADO DE DATOS  -------------------------------------------------------------------
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// VIGESIMOCTAVA FUNCION: MOSTRAR BUSCADOR DE ACCESOS SOLICITADOS PARA ACTULIZAR O BORRAR
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mostrarBuscadorAccesos(){require('02-albacon-php/04-variables-solicitudes.php');?>
  <div id="mostrarBuscadorAccesos" name="mostrarBuscadorAccesos" class="oscurecerContenedor">
    <div id="mostrarBotonesBuscador" name="mostrarBotonesBuscador" class="mostrarAviso" style="width:46%;height:220px;top:28%;left:27%;background-image:url('fotos-archivos/Iberia/Logo-Blanco-01.png');background-repeat:no-repeat;background-position:left center;background-size:300px;">
      <div id="tituloForm" class="tituloAviso" style="padding-top:4%;">BUSCAR ACCESOS POR:</div>
      <form id="buscarPor" name="buscarPor" action="solicitudes.php" method="get">
          <input type="hidden" id="pasos" name="pasos" value="301"/>
          <input type="hidden" id="accion" name="accion" value="<?php echo $accion; ?>"/>
        <table style="width:96%;margin-left:2%;margin-top:2%;color:rgba(0,0,0,0.5);border:0px solid black;">
          <tr>
            <td style="width:23%;text-align:left;font-weight:bold;border:0px solid black;">
              <label><input type="checkbox" id="buscarPorDNI" name="buscarDato" onclick="return encenderDatoUno()" value="dni">&nbspDNI / Pasaporte</label>
            </td>
            <td colspan=3 style="width:77%;text-align:left;border:0px solid black;">
              <input type="text" id="buscarDNI" name="buscarDNI" class="inputApagadoBuscador" style="width:42%;outline:none;" maxlength="15" onkeypress="return caracteresPermitidos(event)" disabled value="">
            </td>
          </tr>
        </table>
        <table style="width:96%;margin-left:2%;margin-top:1%;color:rgba(0,0,0,0.5);">
          <tr>
            <td style="width:15%;text-align:left;font-weight:bold;border:0px solid black;">
              <label><input type="checkbox" id="buscarPorNombreApellidos" name="buscarDato" onclick="return encenderDatoDos()" value="nombre">&nbspNombre&nbsp</label>
            </td>
            <td style="width:23%;text-align:left;border:0px solid black;">
              <input type="text" id="buscarNombre" name="buscarNombre" class="inputApagadoBuscador" maxlength="20" style="width:100%;outline:none;" onkeypress="return caracteresPermitidos(event)" disabled value="">
            </td>
            <td style="width:15%;text-align:right;font-weight:bold;border:0px solid black;">
              <label id="buscarPorNombreApellidos2" name="buscarDato" onclick="return encenderDatoDos()" value="apellido">Apellidos&nbsp</label>
            </td>
            <td style="width:47%;text-align:left;border:0px solid black;">
              <input type="text" id="buscarApellidos" name="buscarApellidos" class="inputApagadoBuscador" maxlength="30" style="width:98%;outline:none;" onkeypress="return caracteresPermitidos(event)" disabled value="">
            </td>
          </tr>
        </table>
        <table style="width:96%;margin-left:2%;margin-top:1%;color:rgba(0,0,0,0.5);">
          <tr>
            <td style="width:15%;text-align:left;font-weight:bold;border:0px solid black;">
              <input type="checkbox" id="buscarPorEmpresa" name="buscarDato" onclick="return encenderDatoTres()" value="empresa"><strong>&nbspEmpresa</strong>
            </td>
            <td colspan=3 style="width:85%;text-align:left;border:0px solid black;">
              <input type="text" id="buscarEmpresa" name="buscarEmpresa" class="inputApagadoBuscador" style="width:50%;outline:none;" maxlength="26" onkeypress="return caracteresPermitidos(event)" disabled value="">
            </td>
          </tr>
        </table>
        <table style="width:96%;margin-left:2%;margin-top:1%;color:rgba(0,0,0,0.5);">
          <tr>
            <td style="width:24%;text-align:left;font-weight:bold;border:0px solid black;">
              <input type="checkbox" id="buscarPorFechaInicio" name="buscarDato" onclick="return encenderDatoCuatro()" value="fecha"><strong>&nbspFecha de inicio&nbsp</strong>
            </td>
            <td colspan=3 style="width:76%;text-align:left;border:0px solid black;">
              <input type="text" id="buscarFechaInicio" name="buscarFechaInicio" placeholder="DD/MM/YYYY" class="inputApagadoBuscador" maxlength="10" style="width:26%;outline:none;disabled:false;" disabled onkeypress="return caracteresPermitidos(event)" value="">
            </td>
          </tr>
        </table>
        <table style="width:100%;margin-top:1%;">
          <tr>
            <td style="text-align:right;width:50%;top:10px;">
              <input type="button" id="bt-buscarPor" class="boton" style="width:40%;height:24px;font-size:14px;margin-top:8px;" onclick="return validarBuscador()" value="BUSCAR">
            </td>
      </form>
      <form id="cancelarBuscador" name="cancelarBuscador" action="solicitudes.php" method="get">
            <td style="text-align:left;width:50%;">
              <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
              <input type="hidden" id="pasos" name="pasos" value="1"/>
              <input type="submit" class="boton" style="width:40%;height:24px;font-size:14px;margin-top:8px;" name="cancelar" value="CANCELAR">
            </td>
          </tr>
        </table>
      </form><!-- Final del form para cancelar el buscador -->
    </div><!-- FINAL mostrarAvisoError -->
  </div><!-- FINAL mostrarAviso -->
<?php
}; // Fin de FUNCION mostrarBuscadorAccesos
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// VIGESIMONOVENA FUNCION: MOSTRAR PANTALLA NO HAY COINCIDENCIAS
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function sinCoincidencias(){require('02-albacon-php/04-variables-solicitudes.php');
?>
<div id="avisoSinCoincidencias" name="avisoSinCoincidencias" class="oscurecerContenedor">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAviso">
    <br><h3 style="color:rgb(224, 23, 50, 1);font-size:20px;margin-top:4px;">INFORMACION IMPORTANTE</h3>
    <p style="font-size:17px;color:rgba(0,0,0,0.5)">NO HAY COINCIDENCIAS CON EL DATO BUSCADO</p>
      <form id="cancelarActualizar" action="solicitudes.php" method="get">
        <input type="hidden" id="pasos" name="pasos" value="3"/>
        <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
        <input type="submit" class="boton" style="width:100px;height:26px;font-size:14px;" value="ACEPTAR"/>
      </form>
  </div><!-- FIN div sinCoincidencias -->
</div><!-- FIN div oscurecerContenedor -->
<?php
}; // FIN DE LA FUNCION "MOSTRAR AVISO SIN COINCIDENCIAS
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// TRIGESIMA FUNCION: MOSTRAR PANTALLA INPUT ACTUALIZAR VACIO
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function inputActualizarVacio(){require('02-albacon-php/04-variables-solicitudes.php');
?>
  <div id="avisoActualizarVacio" name="avisoActualizarVacio" class="oscurecerContenedor">
    <div id="mostrarAviso" name="mostrarAviso" class="mostrarAviso">
      <div id="tituloAviso" class="tituloAviso">INFORMACION INCOMPLETA</div>
      <div id="mensajeAviso" class="mensajeAviso">DEBE RELLENAR TODOS LOS CAMPOS CORRECTAMENTE</div>
        <a href="javascript:window.history.back();cerrarActualizarVacio();">ACEPTAR</a>
    </div><!-- FINAL mostrarAviso -->
  </div><!-- FINAL avisoActualizarVacio -->
<?php
}; // FIN FUNCION MOSTRAR AVISO INPUT VACIO
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// TRIGESIMOPRIMERA FUNCION: MOSTRAR ACCESOS ENCONTRADOS
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function buscador(){require('02-albacon-php/04-variables-solicitudes.php');
$conexion_db;
$baseDatos;
// SE CREAN LAS VARIABLES DE LOS NOMBRES DE LAS TABLAS DE LOS MESES EN QUE SE VA A REALIZAR LAS BUSQUEDA  ------------------------------------------
@$utc=time();
@$utc=date("Y/m/d", $utc);
@$fechaHoy=explode('/', $utc);
@$diaHoy=intval($fechaHoy[0]);
@$mesHoy=intval($fechaHoy[1]);
@$anioHoy=intval($fechaUTC[2]);
$nombreTabla = 'mes_'.$mesHoy;
if($mesHoy+1==13){$mesHoy01=1;}elseif($mesHoy+1==14){$mesHoy01=2;}else{$mesHoy01=$mesHoy+1;};
$nombreTabla01 = 'mes_'.$mesHoy01;
if($mesHoy+2==13){$mesHoy02=1;}elseif($mesHoy+2==14){$mesHoy02=2;}else{$mesHoy02=$mesHoy+2;};
$nombreTabla02 = 'mes_'.$mesHoy02;
echo '<br>';
echo '<br>';
echo '<h1 style="text-align:center;">ACCESOS ENCONTRADOS</h1>';
echo '<br>';
echo '<p style="font-size:14px;text-align:left;margin-top:-14px;margin-bottom:0px;margin-left:10px;"><strong>GESTOR DE LA SOLICITUD:&nbsp&nbsp</strong>'.$nombreUsuario.' '.$apellidosUsuario.'</p><br>';
// BUSCAR POR DNI xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxXXXXxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
if(@$buscarDato=='dni'){echo '<p style="font-size:14px;text-align:left;margin-top:-10px;margin-left:10px;"><strong>DNI BUSCADO:&nbsp&nbsp</strong>'.$buscarDNI.'</p>';
// PRIMERO: Obtenemos el numero de accesos (filas) cuyo 'ID_SOLICITANTE' SEA IGUAL AL ID del usuario actual y el DNI coincida con el buscado
// 1) BASE DE DATOS PUENTE
  $sql00="SELECT * FROM accesos_puente WHERE DNI ='$buscarDNI' AND ID_SOLICITANTE ='$IDusuario' ";
  $result00=mysqli_query($conexion_db,$sql00);
  $numPuente= mysqli_num_rows($result00);
// 2) BASE DE DATOS MES ACTUAL
  $sql01="SELECT * FROM $nombreTabla WHERE DNI ='$buscarDNI' AND ID_SOLICITANTE ='$IDusuario' ";
  $result01=mysqli_query($conexion_db,$sql01);
  //$accesosPuenteDNI[] = mysqli_fetch_array($result01);
  $numMesUno= mysqli_num_rows($result01);
// 3) BASE DE DATOS MES ACTUAL +1
  $sql02="SELECT * FROM $nombreTabla01 WHERE DNI ='$buscarDNI' AND ID_SOLICITANTE ='$IDusuario' ";
  $result02=mysqli_query($conexion_db,$sql02);
  $numMesDos= mysqli_num_rows($result02);
// 4) BASE DE DATOS MES ACTUAL +2
  $sql03="SELECT * FROM $nombreTabla02 WHERE DNI ='$buscarDNI' AND ID_SOLICITANTE ='$IDusuario' ";
  $result03=mysqli_query($conexion_db,$sql03);
  $numMesTres= mysqli_num_rows($result03);
}else{}; //  FINAL "IF" BUSCAR POR DNI
// BUSCAR POR NOMBRE Y APELLIDOS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
if(@$buscarDato=='nombre'){echo '<p style="font-size:14px;text-align:left;margin-top:-10px;margin-left:10px;"><strong>NOMBRE BUSCADO:&nbsp&nbsp</strong>'.$buscarNombre.' '.$buscarApellidos.'</p>';
// PRIMERO: Obtenemos el numero de accesos (filas) cuyo 'ID_SOLICITANTE' SEA IGUAL AL ID del usuario actual y el nombre coincida con el buscado
// 1) BASE DE DATOS PUENTE
  $sql00 = "SELECT * FROM accesos_puente WHERE NOMBRE LIKE '%$buscarNombre%' OR APELLIDOS LIKE '%$buscarApellidos%'";
  $result00=mysqli_query($conexion_db,$sql00);
  $numPuente= mysqli_num_rows($result00);
// 2) BASE DE DATOS MES ACTUAL
  $sql01 = "SELECT * FROM $nombreTabla WHERE NOMBRE LIKE '%$buscarNombre%' OR APELLIDOS LIKE '%$buscarApellidos%'";
  $result01=mysqli_query($conexion_db,$sql01);
  $numMesUno= mysqli_num_rows($result01);
// 3) BASE DE DATOS MES ACTUAL +1
  $sql02 = "SELECT * FROM $nombreTabla01 WHERE NOMBRE LIKE '%$buscarNombre%' OR APELLIDOS LIKE '%$buscarApellidos%'";
  $result02=mysqli_query($conexion_db,$sql02);
  $numMesDos= mysqli_num_rows($result02);
// 4) BASE DE DATOS MES ACTUAL +2
  $sql03 = "SELECT * FROM $nombreTabla02 WHERE NOMBRE LIKE '%$buscarNombre%' OR APELLIDOS LIKE '%$buscarApellidos%'";
  $result03=mysqli_query($conexion_db,$sql03);
  $numMesTres= mysqli_num_rows($result03);
}else{}; //  FINAL "IF" BUSCAR POR NOMBRE
// BUSCAR POR EMPRESA xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
if(@$buscarDato=='empresa'){echo '<p style="font-size:14px;text-align:left;margin-top:-10px;margin-left:10px;"><strong>EMPRESA BUSCADA:&nbsp&nbsp</strong>'.$buscarEmpresa.'</p>';
// PRIMERO: Obtenemos el numero de accesos (filas) cuyo 'ID_SOLICITANTE' SEA IGUAL AL ID del usuario actual y la EMPRESA coincida con la buscada
// 1) BASE DE DATOS PUENTE
  $sql00="SELECT * FROM accesos_puente WHERE EMPRESA ='$buscarEmpresa' AND ID_SOLICITANTE ='$IDusuario' ";
  $result00=mysqli_query($conexion_db,$sql00);
  $numPuente= mysqli_num_rows($result00);
// 2) BASE DE DATOS MES ACTUAL
  $sql01="SELECT * FROM $nombreTabla WHERE EMPRESA ='$buscarEmpresa' AND ID_SOLICITANTE ='$IDusuario' ";
  $result01=mysqli_query($conexion_db,$sql01);
  $numMesUno= mysqli_num_rows($result01);
// 3) BASE DE DATOS MES ACTUAL +1
  $sql02="SELECT * FROM $nombreTabla01 WHERE EMPRESA ='$buscarEmpresa' AND ID_SOLICITANTE ='$IDusuario' ";
  $result02=mysqli_query($conexion_db,$sql02);
  $numMesDos= mysqli_num_rows($result02);
// 4) BASE DE DATOS MES ACTUAL +2
  $sql03="SELECT * FROM $nombreTabla02 WHERE EMPRESA ='$buscarEmpresa' AND ID_SOLICITANTE ='$IDusuario' ";
  $result03=mysqli_query($conexion_db,$sql03);
  $numMesTres= mysqli_num_rows($result03);
}else{}; //  FINAL "IF" BUSCAR POR EMPRESA
// BUSCAR POR FECHA DE INICIO xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
if(@$buscarDato=='fecha'){echo '<p style="font-size:14px;text-align:left;margin-top:-10px;margin-left:10px;"><strong>FECHA BUSCADA:&nbsp&nbsp</strong>'.$buscarFechaInicio.'</p>';
// PRIMERO: Obtenemos el numero de accesos (filas) cuyo 'ID_SOLICITANTE' SEA IGUAL AL ID del usuario actual y la FECHA DE INICIO coincida con la buscada
// 1) BASE DE DATOS PUENTE
  $sql00="SELECT * FROM accesos_puente WHERE FECHA_INICIO ='$buscarFechaInicio' AND ID_SOLICITANTE ='$IDusuario' ";
  $result00=mysqli_query($conexion_db,$sql00);
  $numPuente= mysqli_num_rows($result00);
// 2) BASE DE DATOS MES ACTUAL
  $sql01="SELECT * FROM $nombreTabla WHERE FECHA_INICIO ='$buscarFechaInicio' AND ID_SOLICITANTE ='$IDusuario' ";
  $result01=mysqli_query($conexion_db,$sql01);
  $numMesUno= mysqli_num_rows($result01);
// 3) BASE DE DATOS MES ACTUAL +1
  $sql02="SELECT * FROM $nombreTabla01 WHERE FECHA_INICIO ='$buscarFechaInicio' AND ID_SOLICITANTE ='$IDusuario' ";
  $result02=mysqli_query($conexion_db,$sql02);
  $numMesDos= mysqli_num_rows($result02);
// 4) BASE DE DATOS MES ACTUAL +2
  $sql03="SELECT * FROM $nombreTabla02 WHERE FECHA_INICIO ='$buscarFechaInicio' AND ID_SOLICITANTE ='$IDusuario' ";
  $result03=mysqli_query($conexion_db,$sql03);
  $numMesTres= mysqli_num_rows($result03);
}else{}; //  FINAL "IF" BUSCAR POR FECHA DE INICIO
// 5) SE CREA LA VARIABLE DE Nº DE ACCESOS TOTALES ENCONTRADOS
$numTotales = $numPuente + $numMesUno + $numMesDos + $numMesTres;
// --------------------------------------------------------------------------------------------------------------------------------------------------
// SEGUNDO: SE GENERAN LOS DATOS SI HAY UNA O MAS COINCIDENCIAS CON EL DNI BUSCADO
if(@$numTotales<1){sinCoincidencias();
}else{
//  BUCLE FOR para datos procedentes de la BASE PUENTE
if($numPuente>=1){for($i=1;$i<=$numPuente;$i++){$i=$i;
  $accesosPuente[$i] = mysqli_fetch_array($result00);
  $porPuente[$i] = array($accesosPuente[$i][0],$accesosPuente[$i][2],$accesosPuente[$i][3],$accesosPuente[$i][4],$accesosPuente[$i][5],$accesosPuente[$i][6],
                        $accesosPuente[$i][7],$accesosPuente[$i][8],$accesosPuente[$i][9],$accesosPuente[$i][10],$accesosPuente[$i][12],$accesosPuente[$i][11],
                        $accesosPuente[$i][13],$accesosPuente[$i][14],$accesosPuente[$i][15],$accesosPuente[$i][16]);
  $porPuente[$i] = implode('=',$porPuente[$i]);
};}else{};
//  BUCLE FOR para datos procedentes de la BASE MES UNO
if($numMesUno>=1){for($j=1;$j<=$numMesUno;$j++){$j=$j;
  $accesosMesUno[$j] = mysqli_fetch_array($result01);
  $porMesUno[$j] = array($accesosMesUno[$j][0],$accesosMesUno[$j][1],$accesosMesUno[$j][2],$accesosMesUno[$j][3],$accesosMesUno[$j][4],$accesosMesUno[$j][5],
                        $accesosMesUno[$j][6],$accesosMesUno[$j][7],$accesosMesUno[$j][8],$accesosMesUno[$j][9],$accesosMesUno[$j][11],$accesosMesUno[$j][10],
                        $accesosMesUno[$j][12],$accesosMesUno[$j][13],$accesosMesUno[$j][14],$accesosMesUno[$j][15]);
  $porMesUno[$j] = implode('=',$porMesUno[$j]);
};}else{};
//  BUCLE FOR para datos procedentes de la BASE MES DOS
if($numMesDos>=1){for($k=1;$k<=$numMesDos;$k++){$k=$k;
  $accesosMesDos[$k] = mysqli_fetch_array($result02);
  $porMesDos[$k] = array($accesosMesDos[$k][0],$accesosMesDos[$k][1],$accesosMesDos[$k][2],$accesosMesDos[$k][3],$accesosMesDos[$k][4],$accesosMesDos[$k][5],
                        $accesosMesDos[$k][6],$accesosMesDos[$k][7],$accesosMesDos[$k][8],$accesosMesDos[$k][9],$accesosMesDos[$k][11],$accesosMesDos[$k][10],
                        $accesosMesDos[$k][12],$accesosMesDos[$k][13],$accesosMesDos[$k][14],$accesosMesDos[$k][15]);
  $porMesDos[$k] = implode('=',$porMesDos[$k]);
};}else{};
//  BUCLE FOR para datos procedentes de la BASE MES TRES
if($numMesTres>=1){for($z=1;$z<=$numMesTres;$z++){$z=$z;
  $accesosMesTres[$z] = mysqli_fetch_array($result03);
  $porMesTres[$z] = array($accesosMesTres[$z][0],$accesosMesTres[$z][1],$accesosMesTres[$z][2],$accesosMesTres[$z][3],$accesosMesTres[$z][4],$accesosMesTres[$z][5],
                         $accesosMesTres[$z][6],$accesosMesTres[$z][7],$accesosMesTres[$z][8],$accesosMesTres[$z][9],$accesosMesTres[$z][11],$accesosMesTres[$z][10],
                         $accesosMesTres[$z][12],$accesosMesTres[$z][13],$accesosMesTres[$z][14],$accesosMesTres[$z][15]);
  $porMesTres[$z] = implode('=',$porMesTres[$z]);
};}else{};
// --------------------------------------------------------------------------------------------------------------------------------------------------
// TERCERO: SE CREA EL ARRAY CON TODOS LOS VALORES ENCONTRADOS EN LAS DIFERENTES BASES DE DATOS Y SE LLENA MEDIANTE BUCLE WHILE
  @$porDatoBuscado=array();
// 1) Se llena el array con los datos de los accesos de la BD_Puente
  $i=1; 
  while($i<=$numPuente){@$porDatoBuscado[]=$porPuente[$i];$i++;};
// 2) Se llena el array con los datos de los accesos de la BD_MesUno
  $i=1;
  while($i<=$numMesUno){@$porDatoBuscado[]=$porMesUno[$i];$i++;};
// 3) Se llena el array con los datos de los accesos de la BD_MesDos
  $i=1;
  while($i<=$numMesDos){@$porDatoBuscado[]=$porMesDos[$i];$i++;};
// 4) Se llena el array con los datos de los accesos de la BD_MesTres
  $i=1;
  while($i<=$numMesTres){@$porDatoBuscado[]=$porMesTres[$i];$i++;};
// --------------------------------------------------------------------------------------------------------------------------------------------------
// CUARTO: SE CREA EL ARRAY DE DATOS SIN LOS VALORES DUPLICADOS DE LOS CODIGOS QR, QUE ES EL QUE SE MOSTRARA EN LA TABLA
  $accesosSinDuplicados = array();
  foreach($porDatoBuscado as $elemento){
    if(!in_array($elemento, $accesosSinDuplicados)){$accesosSinDuplicados[] = $elemento;};};
  $numPorDatoBuscado = count($accesosSinDuplicados);
//  BUCLE WHILE PARA MOSTRAR ACCESOS ENCONTRADOS POR EL DNI
for($i=0;$i < $numPorDatoBuscado;$i++){$i=$i;
  $porDatoSD[$i] = $accesosSinDuplicados[$i];};
for($i=0;$i < $numPorDatoBuscado;$i++){
  $mostrarPorDato = explode('=',$porDatoSD[$i]);
    $mostrarDato[$i]= array($mostrarPorDato[0],$mostrarPorDato[1],$mostrarPorDato[2],$mostrarPorDato[3],$mostrarPorDato[4],$mostrarPorDato[5],$mostrarPorDato[6],
                           $mostrarPorDato[7],$mostrarPorDato[8],$mostrarPorDato[9],$mostrarPorDato[10],$mostrarPorDato[11],$mostrarPorDato[12],$mostrarPorDato[13],
                           $mostrarPorDato[14],$mostrarPorDato[15]);
}; // Finaliza el BUCLE FOR PARA CREAR EL ARRAY DE LOS DATOS A MOSTRAR
?>
<div id="actualizarAccesos" name="actualizarAccesos" class="actualizarAccesos" style="width:99.6%;top:15%;height:auto;"><!-- Fila de encabezados -->
  <div id="filaEncabezados" name="filaEncabezados" style="display:inline-flex;width:100%;">
    <div class="actualizarEncabezado" style="width:1.4%;border-color:rgba(255,255,255,1);background-color:rgba(255,255,255,1);"></div>
    <div class="actualizarEncabezado" style="width:6%;"><p style="margin-top:3px;font-size:12px;">DNI<br>PASAPORTE</p></div>
    <div class="actualizarEncabezado" style="width:8.8%;"><p>NOMBRE</p></div>
    <div class="actualizarEncabezado" style="width:14%;"><p>APELLIDOS</p></div>
    <div class="actualizarEncabezado" style="width:10.2%;"><p>EMPRESA</p></div>
    <div class="actualizarEncabezado" style="width:5.8%;"><p>VEHICULO</p></div>
    <div class="actualizarEncabezado" style="width:5.4%;"><p style="margin-top:3px;font-size:12px;">FECHA<br>INICIO</p></div>
    <div class="actualizarEncabezado" style="width:5.4%;"><p style="margin-top:3px;font-size:12px;">FECHA<br>FINAL</p></div>
    <div class="actualizarEncabezado" style="width:14.8%;"><p>EDIFICIO A VISITAR</p></div>
    <div class="actualizarEncabezado" style="width:12%;"><p>MOTIVO VISITA</p></div>
    <div class="actualizarEncabezado" style="width:14.7%;"><p>OBSEVACIONES</p></div>
    <div class="actualizarEncabezado" style="width:1.4%;border-color:rgba(255,255,255,1);background-color:rgba(255,255,255,1);"></div>
  </div><!-- Final de encabezados -->
<?php
// SE GENERA CON BUCLE WHILE LA TABLA QUE MUESTRA LOS ACCESOS ENCONTRADOS DE ACUERDO AL DATO SELECCIONADO HHHHHHHHHHHHHHHHHHHHHHHHHH
$i=0;
while($i<@$numPorDatoBuscado){//echo $mostrarDato[$i][0];
?>
<form id="actualizar" name="actualizar" action="solicitudes.php" onsubmit="noEnviarActualizarVacios();" method="get"><!-- COMIENZA EL FORM PARA ACTUALIZAR LOS DATOS -->
  <div id="<?php echo 'filaDato-'.$i;?>" name="<?php echo 'filaDato-'.$i;?>" class="filaDato" style="display:inline-flex;width:100%;height:22px;margin-bottom:4px;border:0px solid rgb(218, 217, 217);margin-top:3px;"><!-- FILA DE CELDAS DATOS DE ACCESO -->
    <input id="<?php echo 'inputID-'.$i;?>" name="inputID" type="hidden" class="actualizarInput" value="<?php echo $mostrarDato[$i][0];?>">
    <input id="<?php echo 'inputQR-'.$i;?>" name="inputQR" type="hidden" class="actualizarInput" value="<?php echo $mostrarDato[$i][1];?>">
    <input id="<?php echo 'inputIDResp-'.$i;?>" name="inputIDResp" type="hidden" class="actualizarInput" value="<?php echo $mostrarDato[$i][12];?>">
    <input id="<?php echo 'inputNombreResp-'.$i;?>" name="inputNombreResp" type="hidden" class="actualizarInput" value="<?php echo $mostrarDato[$i][13];?>">
    <input id="<?php echo 'inputTelefonoResp-'.$i;?>" name="inputTelefonoResp" type="hidden" class="actualizarInput" value="<?php echo $mostrarDato[$i][14];?>">
          
    <div id="<?php echo 'datoNum-'.$i;?>" name="<?php echo 'datoNum-'.$i;?>" class="datoApagado" style="width:1.4%;height:22px;background-color:rgb(180, 230, 240, 0.8);font-weight:bold;">
      <label id="<?php echo 'labelNum-'.$i;?>" name="labelNum" type="text" class="actualizarInput" style="width:98%;height:20px;font-weight:bold;padding-top:2px;"><p style="margin-top:3px"><?php echo $i+1;?></p></label>
    </div>
    <div id="<?php echo 'datoDNI-'.$i;?>" name="<?php echo 'datoDNI-'.$i;?>" class="datoApagado" style="width:6%;">
      <input id="<?php echo 'inputDNI-'.$i;?>" name="inputDNI" type="text" class="actualizarInput" style="width:98%;" value="<?php echo $mostrarDato[$i][3]; ?>" autocomplete="off" disabled>
    </div>
    <div id="<?php echo 'datoNombre-'.$i;?>" name="<?php echo 'datoNombre-'.$i;?>" class="datoApagado" style="width:8.8%;">
      <input id="<?php echo 'inputNombre-'.$i;?>" name="inputNombre" type="text" class="actualizarInput" style="width:98%;" value="<?php echo $mostrarDato[$i][4];?>" autocomplete="off" disabled>
    </div>
    <div id="<?php echo 'datoApellidos-'.$i;?>" name="<?php echo 'datoApellidos-'.$i;?>" class="datoApagado" style="width:14%;">
      <input id="<?php echo 'inputApellidos-'.$i;?>" name="inputApellidos" type="text" class="actualizarInput" style="width:98%;" value="<?php echo $mostrarDato[$i][5];?>" autocomplete="off" disabled>
    </div>
    <div id="<?php echo 'datoEmpresa-'.$i;?>" name="<?php echo 'datoEmpresa-'.$i;?>" class="datoApagado" style="width:10.2%;">
      <input id="<?php echo 'inputEmpresa-'.$i;?>" name="inputEmpresa" type="text" class="actualizarInput" style="width:98%;" value="<?php echo $mostrarDato[$i][6];?>" autocomplete="off" disabled>
    </div>
    <div id="<?php echo 'datoVehiculo-'.$i;?>" name="<?php echo 'datoVehiculo-'.$i;?>" class="datoApagado" style="width:5.8%;">
      <input id="<?php echo 'inputVehiculo-'.$i;?>" name="inputVehiculo" type="text" class="actualizarInput" style="width:98%;" value="<?php echo $mostrarDato[$i][7];?>" autocomplete="off" disabled>
    </div>
    <div id="<?php echo 'datoFechaInicial-'.$i;?>" name="<?php echo 'datoFechaInicial-'.$i;?>" class="datoApagado" style="width:5.4%;">
      <input id="<?php echo 'inputFechaInicial-'.$i;?>" name="inputFechaInicial" type="text" class="actualizarInput" style="width:98%;" value="<?php echo $mostrarDato[$i][8];?>" autocomplete="off" disabled>
    </div>
    <div id="<?php echo 'datoFechaFinal-'.$i;?>" name="<?php echo 'datoFechaFinal-'.$i;?>" class="datoApagado" style="width:5.4%;">
      <input id="<?php echo 'inputFechaFinal-'.$i;?>" name="inputFechaFinal" type="text" class="actualizarInput" style="width:98%;" value="<?php echo $mostrarDato[$i][9];?>" autocomplete="off" disabled>
    </div>
    <div id="<?php echo 'datoEdificio-'.$i;?>" name="<?php echo 'datoEdificio-'.$i;?>" class="datoApagado" style="width:14.8%;">
      <input id="<?php echo 'inputEdificio-'.$i;?>" name="inputEdificio" type="text" class="actualizarInput" style="width:98%;" value="<?php echo $mostrarDato[$i][10];?>" autocomplete="off" disabled>
    </div>
    <div id="<?php echo 'datoMotivo-'.$i;?>" name="<?php echo 'datoMotivo-'.$i;?>" class="datoApagado" style="width:12%;">
      <input id="<?php echo 'inputMotivo-'.$i;?>" name="inputMotivo" type="text" class="actualizarInput" style="width:98%;" value="<?php echo $mostrarDato[$i][11];?>" autocomplete="off" disabled>
    </div>
    <div id="<?php echo 'datoObservaciones-'.$i;?>" name="<?php echo 'datoObservaciones-'.$i;?>" class="datoApagado" style="width:14.7%;">
      <input id="<?php echo 'inputObservaciones-'.$i;?>" name="inputObservaciones" type="text" class="actualizarInput" style="width:98%;" value="<?php echo $mostrarDato[$i][15];?>" autocomplete="off" disabled>
    </div>
    <div id="<?php echo 'datoBoton-'.$i;?>" name="<?php echo 'datoBoton-'.$i;?>" class="datoApagado" style="width:1.4%;background-color:rgb(180, 230, 240, 0.8);">
      <input type="button" id="<?php echo 'boton-'.$i;?>" name="botonActualizar" class="bto-actualizar" onclick="habilitarInputs(this.id);" style="height:20px;color:rgba(0,0,0,0);background-image:url(<?php if($accion==2){echo 'fotos-archivos/editar02.png';}elseif($accion==3){echo 'fotos-archivos/borrar02.png';};?>);background-size:16px;background-repeat:no-repeat;background-position:center center;margin-top:0px;" value="<?php echo $i;?>"/>
    </div>  
  </div><!--Final de Fila Dato -->  
<?php
$i++;
}; // SE CIERRA EL BUCLE WHILE PARA MOSTRAR LOS RESULTADOS EN UNA TABLA Y SIN DUPLICADOS PARA CUALQUIER DATO BUSCADO HHHHHHHHHHHHHHHHHHHHHHHHHHH
//  CONDICION PARA MOSTRAR BOTONES PARA CUALQUIER DATO BUSCADO ---------------------------------------------------------------------------------
if(@$numTotales>=1){
?>
    <input type="hidden" id="pasos" name="pasos" value="<?php if($accion==2){echo 302;}elseif($accion==3){echo 303;};?>"/>
    <input type="hidden" id="accion" name="accion" value="<?php echo @$accion;?>"/>
    <input type="hidden" id="correoEnviado" name="correoEnviado" value="<?php $correoEnviado=$_SESSION['correoEnviado'] = 0; ?>"/>
  <div id="indicacion" class="indicacion">(*) SELECCIONE UN ACCESO</div>
    <table id="botonesMostrar" style="width:99%;margin-top:0px;"><!-- TABLA PARA MOSTRAR LOS BOTONES DE ACCION -->
      <tr>
        <td style="text-align:right;">
          <input type="button" class="boton" style="width:150px;" onclick="return inputNoHabilitados();" value="<?php if($pasos==301&$accion==3){echo 'ANULAR ACCESO';}else{echo 'ACTUALIZAR';};?>" />
        </td>
</form><!-- Final del form para actualizar los datos del acceso -->
<form id="cancelarActualizadion" action="solicitudes.php" method="get">
        <td style="text-align:left;">
          <button class="boton" style="width:150px;" onclick="">CANCELAR</button>
        </td>
        <input type="hidden" id="pasos" name="pasos" value="1"/>
        <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
        <input type="hidden" id="correoEnviado" name="correoEnviado" value="<?php $correoEnviado=$_SESSION['correoEnviado'] = 0; ?>"/>
</form><!-- Final del form para cancelar la edición de los datos del acceso -->
      </tr>
    </table>
<?php
}else{}; //Final condición mostrar botones
?>
</div>
</div><!-- xxxxxxxxxxxxxxxxx  FINAL DE DIV CONTENEDORA DE ENCABEZADOS Y DATOS DE ACCESOS ENCONTRADOS (MAS DE UN ACCESOS) xxxxxxxxxxxxxxxxxxxxxxxxxx -->
<?php
mysqli_close($conexion_db);
}; // FIN DEL ELSE SI HAY MAS DE UNA COINCIDENCIA
}; // FIN DE LA FUNCION BUSCADOR QUE MUESTRA LOS RESULTADOS DEL BUSCADOR
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// TRIGESIMOSEGUNDA FUNCION: PROCESAR LOS ACCESOS SELECCIONADOS Y EDITADOS
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function procesarActualizar(){
  require('02-albacon-php/04-variables-solicitudes.php');
  require('04-albacon-lib/phpqrcode/qrlib.php');
  require('04-albacon-lib/fpdf/fpdf.php');
  validarFechas(@$fechaInicial,@$fechaFinal);

// SE VALIDA QUE LOS INPUTS RECIBIDOS NO SE MANDEN VACIOS
// 1) SE CREAN LAS VARIABLES DE LOS NOMBRES DE LAS TABLAS DE LOS MESES EN QUE SE VA A REALIZAR LAS BUSQUEDA  ----------------------------------
@$utc=time();
@$utc=date("Y/m/d", $utc);
@$fechaHoy=explode('/', $utc);
@$diaHoy=intval($fechaHoy[0]);
@$mesHoy=intval($fechaHoy[1]);
@$anioHoy=intval($fechaUTC[2]);
$nombreTabla = 'mes_'.$mesHoy;
if($mesHoy+1==13){$mesHoy01=1;}elseif($mesHoy+1==14){$mesHoy01=2;}else{$mesHoy01=$mesHoy+1;};
$nombreTabla01 = 'mes_'.$mesHoy01;
if($mesHoy+2==13){$mesHoy02=1;}elseif($mesHoy+2==14){$mesHoy02=2;}else{$mesHoy02=$mesHoy+2;};
$nombreTabla02 = 'mes_'.$mesHoy02;
// 2) SE GENERAN LOS DATOS DE DIA, MES Y AÑO INICIALES Y FINALES PARA ACTUAIZARLOS EN SU CASO
$datoFechaInicial = explode('/',$inputFechaInicial);
  $diaInicial = $datoFechaInicial[0];
  $mesInicial = $datoFechaInicial[1];
  $anioInicial = $datoFechaInicial[2];
$datoFechaFinal = explode('/',$inputFechaFinal);
  $diaFinal = $datoFechaFinal[0];
  $mesFinal = $datoFechaFinal[1];
  $anioFinal = $datoFechaFinal[2];
/*
echo '<br>SE HAN ACTUALIZADO LOS SIGUIENTES DATOS DEL ACCESO SELECIONADO POR EL USUARIO';
echo '<br>ID: '.$inputID;
echo '<br>CODIGO QR: '.$inputQR;
echo '<br>DNI/PASAPORTE: '.$inputDNI;
echo '<br>NOMBRE: '.$inputNombre;
echo '<br>APELLIDOS: '.$inputApellidos;
echo '<br>EMPRESA: '.$inputEmpresa;
echo '<br>VEHICULO: '.$inputVehiculo;
echo '<br>FECHA INICIAL: '.$inputFechaInicial;
echo '<br>FECHA FINAL: '.$inputFechaFinal;
echo '<br>EDIFICIO A VISITAR: '.$inputEdificio;
echo '<br>MOTIVO VISITA: '.$inputMotivo;
echo '<br>OBSERVACIONES: '.$inputObservaciones;
echo '<br>ID RESPONSABLE: '.$inputIDResp;
echo '<br>NOMBRE RESPONSABLE: '.$inputNombreResp;
echo '<br>TELEFONO RESPONSABLE: '.$inputTelefonoResp;
echo '<hr>';
echo 'UTC: '.$UTCsesion.'<br>';
echo 'CODIGO USUARIO: '.$codigoSolicitante.'<br>';
echo 'NOMBRE USUARIO: '.$nombreUsuario.'<br>';
echo 'APELLIDOS USUARIO: '.$apellidosUsuario.'<br>';
echo 'TELEFONO USUARIO: '.$telefonoUsuario.'<br>';
echo 'CORREO USUARIO: '.$correoUsuario.'<br>';
*/
// 2) SE CREA EL NUEVO CODIGO QR Y EL ARCHIVO PDF UTILIZANZO LOS NUEVOS DATOS DEL ACCESO
$newQR = '1-'.$codigoSolicitante.'-'.$inputIDResp;
class PDF extends FPDF{
// CABECERA DE PAGINA PDF xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  function Header(){
  // SE DEFINE EL ENCABEZADO
    $this->Image('fotos-archivos/Iberia/LogoPDF.png',13,6,40);
    $this->SetFont('Arial','B',12);
    $this->SetTextColor(200, 20, 40);
    $this->SetXY(8, 6);
    $this->Multicell(150, 5, utf8_decode("CONTROL DE ACCESOS             \nINSTALACIONES IBERIA \"LA MUÑOZA\""), 0, 'R', false);
  // SE DEFINE UNA LINEA HORIZONTAL DE SEPARACION
    $this->SetDrawColor(200, 20, 40);
    $this->SetLineWidth(0.4);
    $this->Line(15, 18, 193, 18);
  // SE DEFINEN LAS CELDAS DE TITULOS DE TABLA DENTRO DEL ENCABEZADO
    $this->SetFillColor(200, 20, 40);
    $this->SetTextColor(255);
    $this->SetFont('Arial','B',11);
  // DOS MUTICELDAS, UNA POR DETRAS Y UNA POR DELANTE PARA CADA CELDA DE TITULO
  // CELDA CANTIDAD DE ACCESOS:
    $this->SetXY(15,20.4);
    $this->Multicell(8,11," ",1,'C',true);
    $this->SetXY(15,22);
    $this->Multicell(8,8,utf8_decode("Nº"),0,'C',false);
  // CELDA NOMBRE Y APELLIDOS: 
    $this->SetXY(24, 20.4);
    $this->Multicell(67,11," ",1,'C',true);
    $this->SetXY(24,22);
    $this->Multicell(67,4,"NOMBRE\nAPELLIDOS",0,'C',true);
  // CELDA EMPRESA
    $this->SetXY(92,20.4);
    $this->Multicell(51,11," ",1,'C',true);
    $this->SetXY(92,22);
    $this->Multicell(51,8,"EMPRESA",0,'C',true);
  // CELDA FECHAS
    $this->SetXY(144,20.4);
    $this->Multicell(30,11," ",1,'C',true);
    $this->SetXY(144,22);
    $this->Multicell(30,4,"FECHAS\nACCESO",0,'C',true);
  // CELDA CODIGOS QR
    $this->SetXY(175,20.4);
    $this->Multicell(18,11," ",1,'C',true);
    $this->SetXY(175,22);
    $this->Multicell(18,4,"CODIGO\nQR",0,'C',true);
  } // FINALIZA LA FUNCION HEADER ---------------------------------------------------------------------------------------------------------
// PIE DE PAGINA PDF xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  function Footer(){
    $this->SetDrawColor(200, 20, 40);
    $this->SetLineWidth(0.3);
    //Posición: a 1,5 cm del final
    $this->SetY(-18);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}','T',0,'C');
  } // FINALIZA LA FUNCION FOOTER ----------------------------------------------------------------------------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // FUNCION PARA RELLENAR EL CONTENIDO DEL PDF xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function filaNewPDF(){require('02-albacon-php/04-variables-solicitudes.php');
// SE CREA EL NUEVO CODIGO QR UTILIZANZO EL QR ANTIGUO Y EL NUEVO CODIGO DEL SOLICITANTE ---------------------------------------------------
  $newQR = '1-'.$codigoSolicitante.'-'.$inputIDResp;
//  Creacion de QR's
  $texto=$newQR;
  $ruta="QR-imagenes/$newQR.png";
  $level="Q";
  $tamaño=10;
  $frameSize=2;
  QRcode::png($texto, $ruta, $tamaño, $level, $frameSize);
// VALORES GENERALES DE FUENTE Y BORDES
  $this->SetTextColor(140,140,140);
  $this->SetFont('Arial','',9.5);
  $this->SetDrawColor(204,204,204);
  $this->SetLineWidth(0.4);
  $pagina=$this->PageNo();
// CELDA CANTIDAD DE ACCESOS:
  $i=0;
  $this->SetXY(15,33+($i*20));
  $this->Multicell(8,18," ",1,'C',false);
  $this->SetXY(15,33+($i*20));    
  $this->Multicell(8,18,$i+1,0,'C',false);
// CELDA NOMBRE Y APELLIDOS:
  $this->SetXY(24,33+($i*20));
  $this->Multicell(67,18," ",1,'C',false);
  $this->SetXY(26,38+($i*20));
  $this->Multicell(65,4.5,utf8_decode($inputNombre."\n".$inputApellidos),0,'L',false);
// CELDA EMPRESA
  $this->SetXY(92,33+($i*20));
  $this->Multicell(51,18," ",1,'C',false);
  $this->SetXY(92,33+($i*20));
  $this->Multicell(51,18,utf8_decode($inputEmpresa),0,'C',false);
// CELDA FECHAS
  $this->SetXY(144,33+($i*20));
  $this->Multicell(30,18," ",1,'C',false);
  $this->SetXY(144,37+($i*20));
  $this->Multicell(30,5,"Inicial: ".$inputFechaInicial."\nFinal:  ".$inputFechaFinal,0,'C',false);
// CELDA CODIGOS QR
  $this->SetXY(175,33+($i*20));
  $this->Multicell(18,18," ",1,'C',false);
  $this->Multicell(33+($i*20),4,$this->Image("QR-imagenes/".$newQR.".png",176,34+$i*20,16,16),0,'C',false);
}   // FINAL DE LA CLASS PDF  ----------------------------------------------------------------------------------------------------------------
};  // FINAL DE LA FUNCION PARA AÑADIR CONTENIDO AL PDF
  $pdf=new PDF();
  $pdf->AddPage();$pdf->filaNewPDF();
  $pdf->AliasNbPages(); // Numeracion de paginas
//  SE CREA EL ARCHIVO PDF CORRESPONDIENTE A LA SOLICITUD EN CURSO
  $pdf->Output('F', 'PDF-temp/'.$codigoSolicitante.'.pdf');
// TERCERO: SE ACTUALIZAN LOS DATOS INSERTANDO LOS VALORES DEL ACCESO EDITADO EN BD_PUENTE Y ELIMINANDOLOS DE TODAS LAS BD CORRESPONDIENTES AL QR EDITADO
$conexion_db;
$baseDatos;
// CUARTO: SE BORRAN LOS ACCESOS DEL QR EDITADO DE TODAS LAS TABLAS UNA VEZ GENERADO EL NUEVO ACCESO -------------------------------------------
$sql01="DELETE FROM accesos_puente WHERE CODIGO_QR ='$inputQR' ";
$result01=mysqli_query($conexion_db,$sql01);
$sql02="DELETE FROM $nombreTabla WHERE CODIGO_QR ='$inputQR' ";
$result02=mysqli_query($conexion_db,$sql02);
$sql03="DELETE FROM $nombreTabla01 WHERE CODIGO_QR ='$inputQR' ";
$result03=mysqli_query($conexion_db,$sql03);
$sql04="DELETE FROM $nombreTabla02 WHERE CODIGO_QR ='$inputQR' ";
$result04=mysqli_query($conexion_db,$sql04);
$sql00="INSERT INTO accesos_puente (ID,CODIGO,CODIGO_QR,FECHA_SOLICITUD,DNI,NOMBRE,APELLIDOS,EMPRESA,VEHICULO,FECHA_INICIO,FECHA_FINAL,MOTIVO,EDIFICIO_VISITA,ID_RESPONSABLE,
RESPONSABLE_VISITA,TELEFONO_RESPONSABLE,OBSERVACIONES,ID_SOLICITANTE,DIA_INICIO,MES_INICIO,ANIO_INICIO,DIA_FINAL,MES_FINAL,ANIO_FINAL,PROCESADO) 
  VALUES ('1','$codigoSolicitante','$newQR','$utc','$inputDNI','$inputNombre','$inputApellidos','$inputEmpresa','$inputVehiculo','$inputFechaInicial','$inputFechaFinal','$inputMotivo',
  '$inputEdificio','$inputIDResp','$inputNombreResp','$inputTelefonoResp','$inputObservaciones','$IDusuario','$diaInicial','$mesInicial','$anioInicial','$diaFinal','$mesFinal','$anioFinal','SI') ";
$result00=mysqli_query($conexion_db,$sql00);
mysqli_close($conexion_db);
}; //Fin de la FUNCION procesarActualizar
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// TRIGESIMOTERCERA FUNCION: PROCESAR BORRADO DE ACCESOS SELECCIONADOS
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function procesarAnular(){require('02-albacon-php/04-variables-solicitudes.php');
// 1) SE CREAN LAS VARIABLES DE LOS NOMBRES DE LAS TABLAS DE LOS MESES EN QUE SE VA A REALIZAR LAS BUSQUEDA  ----------------------------------
@$utc=time();
@$utc=date("Y/m/d", $utc);
@$fechaHoy=explode('/', $utc);
@$diaHoy=intval($fechaHoy[0]);
@$mesHoy=intval($fechaHoy[1]);
@$anioHoy=intval($fechaUTC[2]);
$nombreTabla = 'mes_'.$mesHoy;
if($mesHoy+1==13){$mesHoy01=1;}elseif($mesHoy+1==14){$mesHoy01=2;}else{$mesHoy01=$mesHoy+1;};
$nombreTabla01 = 'mes_'.$mesHoy01;
if($mesHoy+2==13){$mesHoy02=1;}elseif($mesHoy+2==14){$mesHoy02=2;}else{$mesHoy02=$mesHoy+2;};
$nombreTabla02 = 'mes_'.$mesHoy02;
// 2) SE GENERAN LOS DATOS DE DIA, MES Y AÑO INICIALES Y FINALES PARA ACTUAIZARLOS EN SU CASO
$datoFechaInicial = explode('/',$inputFechaInicial);
  $diaInicial = $datoFechaInicial[0];
  $mesInicial = $datoFechaInicial[1];
  $anioInicial = $datoFechaInicial[2];
$datoFechaFinal = explode('/',$inputFechaFinal);
  $diaFinal = $datoFechaFinal[0];
  $mesFinal = $datoFechaFinal[1];
  $anioFinal = $datoFechaFinal[2];
// 3) SE GENERA LA VARIABLE PARA EL NUEVO DATO DE OBSERVACIONES
  $fechaAnulado = explode('/', $utc);
  $fechaAnulado = $fechaAnulado[2].'/'.$fechaAnulado[1].'/'.$fechaAnulado[0];
  $newObservaciones = 'ANULADO EL '.$fechaAnulado.' POR ID-'.$IDusuario;
// 4) SE ANULAN LOS ACCESOS INSERTANDO LOS VALORES DEL ACCESO ANULADO EN BD_PUENTE Y ELIMINANDOLOS DE TODAS LAS BD CORRESPONDIENTES AL QR ANULADO
$conexion_db;
$baseDatos;
// 5) SE BORRAN LOS ACCESOS DEL QR EDITADO DE TODAS LAS TABLAS UNA VEZ GENERADO EL NUEVO ACCESO -------------------------------------------
$sql01="DELETE FROM accesos_puente WHERE CODIGO_QR ='$inputQR' ";
$result01=mysqli_query($conexion_db,$sql01);
$sql02="DELETE FROM $nombreTabla WHERE CODIGO_QR ='$inputQR' ";
$result02=mysqli_query($conexion_db,$sql02);
$sql03="DELETE FROM $nombreTabla01 WHERE CODIGO_QR ='$inputQR' ";
$result03=mysqli_query($conexion_db,$sql03);
$sql04="DELETE FROM $nombreTabla02 WHERE CODIGO_QR ='$inputQR' ";
$result04=mysqli_query($conexion_db,$sql04);
$sql00="INSERT INTO accesos_puente (CODIGO,CODIGO_QR,FECHA_SOLICITUD,DNI,NOMBRE,APELLIDOS,EMPRESA,VEHICULO,FECHA_INICIO,FECHA_FINAL,MOTIVO,EDIFICIO_VISITA,ID_RESPONSABLE,
RESPONSABLE_VISITA,TELEFONO_RESPONSABLE,OBSERVACIONES,ID_SOLICITANTE,DIA_INICIO,MES_INICIO,ANIO_INICIO,DIA_FINAL,MES_FINAL,ANIO_FINAL,PROCESADO) 
  VALUES ('$codigoSolicitante','$inputQR','$utc','$inputDNI','$inputNombre','$inputApellidos','$inputEmpresa','$inputVehiculo','$inputFechaInicial','$inputFechaFinal','$inputMotivo',
  '$inputEdificio','$inputIDResp','$inputNombreResp','$inputTelefonoResp','$newObservaciones','$IDusuario','$diaInicial','$mesInicial','$anioInicial','$diaFinal','$mesFinal','$anioFinal','SI') ";
$result00=mysqli_query($conexion_db,$sql00);
mysqli_close($conexion_db);
};// fin de la condicion inputs vacios
//}; //Fin de la FUNCION PROCESAR ANULAR ACCESOS
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// TRIGESIMOCUARTA FUNCION: MANDAR CORREO CON QR DE LOS ACCESOS ACTUALIZADOS Y ANULADOS
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mandarCorreo01(){require('02-albacon-php/04-variables-solicitudes.php');
  require('PHPMailer/Exception.php');
  require('PHPMailer/PHPMailer.php');
  require('PHPMailer/SMTP.php');
$solicitante = $nombreUsuario.' '.$apellidosUsuario;
$conexion_db;
$baseDatos;
// 1) SE SOLICITA LA CLASE
  $mail = new PHPMailer(true);
  try {
// 2) CONFIGURACION DEL SERVIDOR CON GMAIL
  //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  //Enable verbose debug output
  //$mail->SMTPDebug = 2;  //PONIENDO OPCION 2, SE MUESTRAN TODOS LOS PASOS DEL ENVIO DE CORREO UNA VEZ FUNCIONA BIEN SE PONE 0 O SE COMENTA
  $mail->isSMTP(); // ENVIO DE CORREO USANDO SMTP
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;  // HABILITADA SMTP AUTENTICACION
  $mail->Username = 'albacon.accesos@gmail.com'; // SMTP username (CORREO DESDE DONDE SE ENVIA)
  //$mail->Password = 'Al553383bacon006.'; //SMTP password
  $mail->Password = 'rjai wyel hxyp enhq'; //SMTP password - SE USA ESTA YA QUE SE HA ACTIVADO LA "VERIFICACION EN DOS PASOS" PARA PHPMAILER EN GMAIL
  //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465; // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  $mail->SMTPOptions = array('ssl'=>array('verify_peer'=>false,'verify_peer_name'=>false,'allow_self_signed'=> true)); // LINEA FUNDAMENTAL PARA FUNCIONAR CON LOCALHOST
// 3) CONFIGURACION DE DESTINATARIOS
  $mail->setFrom('albacon.accesos@gmail.com', 'ACCESOS IBERIA'); // QUIEN LO ENVIA - MISMO QUE USERNAME 'albacon.accesos@gmail.com',
  $mail->addAddress($correoDestinatario , $solicitante); // AQUI PODEMOS PONER EL NOMBRE Y APELLIDOS DEL USUARIO CON LA VARIABLE CORRESPONDIENTE
  //$mail->addAddress($correoDestinatario , ' USUARIO AUTORIZADO'); // AQUI PODEMOS PONER EL NOMBRE Y APELLIDOS DEL USUARIO CON LA VARIABLE CORRESPONDIENTE
  //$mail->addAddress('ellen@example.com'); // Name is optional
  //$mail->addReplyTo('info@example.com', 'Information');
  if($conCopia<>''){$mail->addCC($conCopia);}else{};// QUIEN VA EN COPIA - SE EVALUA SI SE PONE CORREO EN EL INPUT DE CC
  //if($IDresponsable<>$IDusuario){$mail->addBCC($conCopiaOculta);}else{};// QUIEN VA EN COPIA OCULTA - SE ENVIARA AL CORREO DEL RESPONSABLE SI ES DISTINTO DEL USUARIO)
  $mail->CharSet = 'UTF-8'; // PARA USO DE CARACTERES ESPECIALES DE CASTELLANO
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// 4) ADJUNTAR ARCHIVOS (Attachments)
// 4.1) SE ADJUNTARA EL ARCHIVO PDF CORRESPONDIENTE CON QR'S DEPENDIENDO DE SI ES ACTUALIZAR O ANULAR ACCESO
if(($pasos==17||$pasos==18)&$accion==2){
  $mail->addAttachment('PDF-temp/'.$codigoSolicitante.'.pdf');}
  elseif(($pasos==17||$pasos==18)&$accion==3){};
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
// 5) INCLUIR IMAGENES EN EL MENSAJE
  $mail->AddEmbeddedImage('fotos-archivos/Iberia/Logo-Correo.png','logo','logo IBERIA');
  $mail->AddEmbeddedImage('fotos-archivos/albacon_hoja.png','hoja','hoja');
// 6) COMPOSICION DEL CORREO
  $mail->isHTML(true); // PARA ENVIAR EL CORREO EN FORMATO HTML (SECREARA LA VARIABLE $mensaje)
  $mail->Subject = @$asunto; // ASUNTO DEL CORREO
// 6.1) SE INCLUYE EL MENSAJE CORRESPONDIENTE DEPENDIENDO DE SI ES ACTUALIZAR O ANULAR ACCESO
if($accion==2){$mail->Body = @$mensaje01;}
elseif($accion==3){$mail->Body = 
  '<div style="padding:2%;padding-top:3%;font-family:Calibri;font-size:16px;text-align:justify;">
        <p style="text-align:justify;font-size:16px;">
        Estimado usuario:
        </p>
        <p style="text-align:justify;font-size:16px;">
        Le confirmamos <strong>la anulación</strong> del acceso para <strong>'.$inputNombre.' '.$inputApellidos.'</strong>, de la empresa <strong>'.$inputEmpresa.'</strong>, de acuerdo a su petición.
        </p>
        <p style="text-align:justify;font-size:16px;">
        Recuerde comunicar a la persona interesada que su acceso ha sido anulado, y que no podrá acceder a las instalaciones.
        <br><br>
        Saludos.
        </p>
        <br><br>
        <p style="color:rgb(122, 168, 236);font-size:12px;text-decoration:underline;">
        <img src="cid:logo" alt="logo" width="200"/><br>
        seguridad@iberia.com
        </p>
        <br>
        <hr>
        <p style="text-align:justify;font-size:12px;">
        <br>
        Este mensaje y sus adjuntos se dirigen exclusivamente a sus destinatarios, puede contener información privilegiada o confidencial y es para uso exclusivo de las personas o entidades de destino. Si no es usted uno de los destinatarios indicados, queda notificado de que la lectura, utilización, divulgación y/o copia sin autorización puede estar prohibida en virtud de la legislación vigente.
        <br>
        Si ha recibido este mensaje por error, le rogamos que nos lo comunique inmediatamente seguridad@iberia.com y proceda a su destrucción.
        </p>
        <hr>
        <table border="0">
          <tr>
           <td><img src="cid:hoja" alt="hoja" width="18"/></td>
           <td style="text-align:justify;font-size:12px;padding-top:-14px;">Antes de imprimir este mensaje, asegúrese de que es necesario hacerlo.</td>
          </tr>
        </table>
        </div>';
};
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; // OTRO FORMATO DE CORREO ALTERNATIVO EN DESUSO
// 7) ENVIO DEL CORREO CONDICIONADO A YA HABER ENVIADO EL CORREO
if(@$correoEnviado<>1){$mail->send();}else{};
// 8) CODIGO DE CONTROL - SE COMENTARA CUANDO SE ENVIE CORRECTAMENTE Y SE REALIZARA LA ACCION DE NUEVA SOLICITUD O CERRAR SESION
} // Finaliza TRY
catch (Exception $e){//echo "Error en el envío del correo: {$mail->ErrorInfo}";
} // Finaliza CATCH
// 9) SE BORRAN LOS DATOS GENERADOS
if($accion==2){
//  9.1) SE BORRA EL ARCHIVO QR GENERADO
      @unlink('QR-imagenes/1-'.$codigoSolicitante.'-'.$inputIDResp.'.png');
//  9.2) SE ELIMINA EL ARCHIVO PDF UNA VEZ ENVIADO
        @unlink('PDF-temp/'.$codigoSolicitante.'.pdf');
      }elseif($accion==3){};
//  10) SE SUMA UNO A LOS USOS DE ESE USUARIO EN LA TABLA SOLICITANTES
$sql="SELECT USOS FROM solicitantes WHERE ID ='$IDusuario' ";
$result=mysqli_query($conexion_db,$sql);
$usosSolicitante = mysqli_fetch_array($result);
@$usos=$usosSolicitante[0] + 1;
$sql01="UPDATE solicitantes SET USOS='$usos' WHERE ID='$IDusuario' ";
$result01=mysqli_query($conexion_db,$sql01);
mysqli_close($conexion_db);// SE CIERRA CONEXION CON BD_TEMP
}; // FINAL DE FUNCION ENVIAR CORREO CON CODIGOS QR, BORRADO DE DATOS


// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// TRIGESIMOQUINTA FUNCION: VALIDAR FECHAS INICIAL Y FINAL
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function validarFechas($fechaInicial,$fechaFinal){require('02-albacon-php/04-variables-solicitudes.php');

  //  PRIMERO SE CREAN LAS VARIABLES NECESARIAS PARA EVALUAR LAS FECHAS
  
    @$fechaInicial = @$inputFechaInicial;
    @$fechaFinal = @$inputFechaFinal;
    
    @$charsI = strlen($fechaInicial);
    @$FI=str_split($fechaInicial,$split_length = 1);
    @$charsF = strlen($fechaFinal);
    @$FF=str_split($fechaFinal,$split_length = 1);
  
  
    @$charsI = strlen($fechaInicial);
    @$FI=str_split($fechaInicial,$split_length = 1);
    @$charsF = strlen($fechaFinal);
    @$FF=str_split($fechaFinal,$split_length = 1);
    
    if(empty($fechaInicial)&empty($fechaFinal)){$mensajeErrorFecha = 'DEBE INDICAR LAS FECHAS DE INICIO Y FINALIZACION';}
    elseif(!empty($fechaInicial)&empty($fechaFinal)){$mensajeErrorFecha = 'DEBE INDICAR LA FECHA DE FINALIZACION';}
    elseif(empty($fechaInicial)&!empty($fechaFinal)){$mensajeErrorFecha = 'DEBE INDICAR LA FECHA DE INICIO';}
    else{
      if($charsI<>10 & $charsF<>10){$mensajeErrorFecha = 'FORMATOS DE FECHAS NO VALIDOS<p style=font-size:8px></p>DEBEN SER "DD/MM/AAAA"';}
      elseif($charsI<>10 & $charsF==10){$mensajeErrorFecha = 'FORMATO DE FECHA DE INICIO NO VALIDO<p style=font-size:8px></p>DEBE SER "DD/MM/AAAA"';}
      elseif($charsI==10 & $charsF<>10){$mensajeErrorFecha = 'FORMATO DE FECHA DE FINALIZACION NO VALIDO<p style=font-size:8px></p>DEBE SER "DD/MM/AAAA"';}
      else{
        if((@$FI[2]<>'/') || (@$FI[5]<>'/')){$mensajeErrorFecha = 'FORMATO DE FECHA DE INICIO NO VALIDO<p style=font-size:8px></p>DEBE SER "DD/MM/AAAA"';}
        else{
          if(!is_numeric($FI[0])||!is_numeric($FI[1])||!is_numeric($FI[3])||!is_numeric($FI[4])||!is_numeric($FI[6])||!is_numeric($FI[7])||!is_numeric($FI[8])||!is_numeric($FI[9])){$mensajeErrorFecha = 'FORMATO DE FECHA DE INICIO NO VALIDO<p style=font-size:8px></p>DEBE SER "DD/MM/AAAA"';}
          else{
            if((@$FF[2]<>'/') || (@$FF[5]<>'/')){$mensajeErrorFecha = 'FORMATO DE FECHA DE FINALIZACION NO VALIDO<p style=font-size:8px></p>DEBE SER "DD/MM/AAAA"';}
            else{
              if(!is_numeric($FF[0])||!is_numeric($FF[1])||!is_numeric($FF[3])||!is_numeric($FF[4])||!is_numeric($FF[6])||!is_numeric($FF[7])||!is_numeric($FF[8])||!is_numeric($FF[9])){$mensajeErrorFecha = 'FORMATO DE FECHA DE FINALIZACION NO VALIDO<p style=font-size:8px></p>DEBE SER "DD/MM/AAAA"';}       
              else{};
    };};};};};
  
    @$mostrarDivErrorFecha = 
    '<div id="avisoSolicitudes2" name="avisoSolicitudes" class="oscurecerContenedor" style="display:block;">
      <div id="mostrarAviso2" name="mostrarAviso" class="mostrarAviso" style="display:block;position:absolute;z-index:999;top:36%;left:31%;width:38%">
        <div id="tituloAviso2" class="tituloAviso">AVISO IMPORTANTE</div>
        <div id="mensajeAviso2" class="mensajeAviso">'.$mensajeErrorFecha.'ALEXXX</div>
      <a href="javascript:cerrarAvisoSolicitudes2();javascript:window.history.back();">ACEPTAR</a>
    </div>';
  
  
  // 1) SE COMPRUEBA QUE LOS INPUT'S NO ESTEN VACIOS
  if(empty($fechaInicial)&empty($fechaFinal)){echo $mostrarDivErrorFecha;}
  elseif(!empty($fechaInicial)&empty($fechaFinal)){echo $mostrarDivErrorFecha;}
  elseif(empty($fechaInicial)&!empty($fechaFinal)){echo $mostrarDivErrorFecha;}
  
  //  SI NO ESTAN VACIOS SE CONTINUA
  else{ // ***************************************************************************************** ELSE INPUT VACIO **************
  // 2) SE COMPRUEBA QUE EL FORMATO DE LA FECHA INICIAL SEA "DD/MM/AAAA"
  
  //  2.1) CONDICION PARA COMPROBAR QUE FECHA INICIAL TIENE 10 CARACTERES
    if($charsI<>10 || $charsF<>10){echo $mostrarDivErrorFecha;}
    // SI TIENEN 10 CARACTERES SE CONTINUA 
    else{ // ************************************************************************** ELSE INPUT MENOS 10 CARACTERES **************
  
      if(($FI[2]<>'/') || ($FI[5]<>'/')){echo $mostrarDivErrorFecha;}
        else{// SI TODOS LOS CARACTERES SON NUMERICOS NO SE HACE NADA SI NO SE MUESTRA MENSAJE
          if(!is_numeric($FI[0])||!is_numeric($FI[1])||!is_numeric($FI[3])||!is_numeric($FI[4])||!is_numeric($FI[6])||!is_numeric($FI[7])||!is_numeric($FI[8])||!is_numeric($FI[9])){echo $mostrarDivErrorFecha;}
          else{
            if(($FF[2]<>'/') || ($FF[5]<>'/')){echo $mostrarDivErrorFecha;}
            else{
              if(!is_numeric($FF[0])||!is_numeric($FF[1])||!is_numeric($FF[3])||!is_numeric($FF[4])||!is_numeric($FF[6])||!is_numeric($FF[7])||!is_numeric($FF[8])||!is_numeric($FF[9])){echo $mostrarDivErrorFecha;}
              else{
  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx  SE REALIZA LA VALIDACION DE LAS FECHAS INICIAL Y FINAL  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  
  // PRIMERO: SE GENERAN LAS VARIABLES DE FECHA ACTUAL (UTC) NECESARIAS PARA LA VALIDACION DE LA FECHAS INICIAL Y FINAL
  @$utc=time();
  @$utc=date("d/m/Y", $utc);
  echo '<br><br><br><br><p style="margin-left:15px;font-size:20px;left:10px;top:15px;"><strong>VARIABLE UTC (hoy): </strong>'.@$utc.'</p>';
  //@$utc='15/11/2023'; // AQUI SE PUEDE CAMBIAR UTC PARA COMPROBAR EL FUNCIONAMIENTO DE LA VALIZACION
  @$fechaUTC=explode('/', $utc);
  @$diaUTC=$fechaUTC[0];@$mesUTC=$fechaUTC[1];@$anioUTC=intval($fechaUTC[2]);
      if($diaUTC[0]=='0'){$diaUTC=$diaUTC[1];}else{$diaUTC=$diaUTC;intval($diaUTC);};
      if($mesUTC[0]=='0'){$mesUTC=$mesUTC[1];}else{$mesUTC=$mesUTC;intval($mesUTC);};
    
  // SEGUNDO: SE GENERAN LAS VARIABLES DE FECHAS INICIAL Y FINAL QUE SE VAN A COMPARAR ($fechaInicial y $fechaFinal)
    @$fechaI = $fechaInicial;
    @$Inicial = $fechaI;
      $fechaI=explode('/', $fechaI);
      if($fechaI[0]=='0'){@$diaI=$fechaI[1];intval($diaI);}else{@$diaI=$fechaI[0];intval($diaI);};
      if($fechaI[0]=='0'){@$mesI=$fechaI[1];intval($mesI);}else{@$mesI=$fechaI[1];intval($mesI);};
      @$anioI=intval($fechaI[2]);
      
    @$fechaF = $fechaFinal;
    @$Final=$fechaF;
      $fechaF=explode('/', $fechaF);
      if($fechaF[0]=='0'){@$diaF=$fechaF[1];intval($diaF);}else{@$diaF=$fechaF[0];intval($fechaF);};
      if($fechaF[0]=='0'){@$mesF=$fechaF[1];intval($mesF);}else{@$mesF=$fechaF[1];intval($fechaF);};
      @$anioF=intval($fechaF[2]);
  
  // TERCERO: CREACION DE LAS VARIABLES BISIESTO
    if($anioUTC==2024or$anioUTC==2028or$anioUTC==2032or$anioUTC==2036or$anioUTC==2040){@$bisiestoUTC='SI';}else{@$bisiestoUTC='NO';};
    if($anioI==2024or$anioI==2028or$anioI==2032or$anioI==2036or$anioI==2040){@$bisiestoI='SI';}else{@$bisiestoI='NO';};
    if($anioF==2024or$anioF==2028or$anioF==2032or$anioF==2036or$anioF==2040){@$bisiestoF='SI';}else{@$bisiestoF='NO';};
  
  // CUARTO: CREACION DE LAS VARIABLES CANTIDAD DE DIAS AL MES
    // 1) PARA FECHA DE HOY-UTC
    if($bisiestoUTC=='NO'){if($mesUTC==1or$mesUTC==3or$mesUTC==5or$mesUTC==7or$mesUTC==8or$mesUTC==10or$mesUTC==12){@$diasMesUTC=31;};}
    elseif($bisiestoUTC=='SI'){if($mesUTC==1or$mesUTC==3or$mesUTC==5or$mesUTC==7or$mesUTC==8or$mesUTC==10or$mesUTC==12){@$diasMesUTC_B=31;};}
    else {};
    if($bisiestoUTC=='NO'){if($mesUTC==4or$mesUTC==6or$mesUTC==9or$mesUTC==11){@$diasMesUTC=30;};}
    elseif($bisiestoUTC=='SI'){if($mesUTC==4or$mesUTC==6or$mesUTC==9or$mesUTC==11){@$diasMesUTC_B=30;};}
    else{};
    if($bisiestoUTC=='NO'){if($mesUTC==2){@$diasMesUTC=28;};}
    elseif($bisiestoUTC=='SI'){if($mesUTC==2){@$diasMesUTC_B=29;};}
    else{};
    // 2) PARA FECHA INICIAL
    if($bisiestoI=='NO'){if($mesI==1or$mesI==3or$mesI==5or$mesI==7or$mesI==8or$mesI==10or$mesI==12){@$diasMesI=31;};}
    elseif($bisiestoI=='SI'){if($mesI==1or$mesI==3or$mesI==5or$mesI==7or$mesI==8or$mesI==10or$mesI==12){@$diasMesI_B=31;};}
    else {};
    if($bisiestoI=='NO'){if($mesI==4or$mesI==6or$mesI==9or$mesI==11){@$diasMesI=30;};}
    elseif($bisiestoI=='SI'){if($mesI==4or$mesI==6or$mesI==9or$mesI==11){@$diasMesI_B=30;};}
    else{};
    if($bisiestoI=='NO'){if($mesI==2){@$diasMesI=28;};}
    elseif($bisiestoI=='SI'){if($mesI==2){@$diasMesI_B=29;};}
    else{};
    // 3) PARA FECHA FINAL
    if($bisiestoF=='NO'){if($mesF==1or$mesF==3or$mesF==5or$mesF==7or$mesF==8or$mesF==10or$mesF==12){@$diasMesF=31;};}
    elseif($bisiestoF=='SI'){if($mesF==1or$mesF==3or$mesF==5or$mesF==7or$mesF==8or$mesF==10or$mesF==12){@$diasMesF_B=31;};}
    else {};
    if($bisiestoF=='NO'){if($mesF==4or$mesF==6or$mesF==9or$mesF==11){@$diasMesF=30;};}
    elseif($bisiestoF=='SI'){if($mesF==4or$mesF==6or$mesF==9or$mesF==11){@$diasMesF_B=30;};}
    else{};
    if($bisiestoF=='NO'){if($mesF==2){@$diasMesF=28;};}
    elseif($bisiestoF=='SI'){if($mesF==2){@$diasMesF_B=29;};}
    else{};
  
  // QUINTO: CREACION DE VARIABLES PARA DIAS ACUMULADOS A LO LARGO DEL AÑO
    // UTC: AÑOS NO BISIESTOS (0,31,59,90,120,151,181,212,243,273,304,334)
    if($mesUTC==1&$bisiestoUTC=='NO'){$acuUTC=intval($diaUTC);};
    if($mesUTC==2&$bisiestoUTC=='NO'){$acuUTC=31+intval($diaUTC);};
    if($mesUTC==3&$bisiestoUTC=='NO'){$acuUTC=59+intval($diaUTC);};
    if($mesUTC==4&$bisiestoUTC=='NO'){$acuUTC=90+intval($diaUTC);};
    if($mesUTC==5&$bisiestoUTC=='NO'){$acuUTC=120+intval($diaUTC);};
    if($mesUTC==6&$bisiestoUTC=='NO'){$acuUTC=151+intval($diaUTC);};
    if($mesUTC==7&$bisiestoUTC=='NO'){$acuUTC=181+intval($diaUTC);};
    if($mesUTC==8&$bisiestoUTC=='NO'){$acuUTC=212+intval($diaUTC);};
    if($mesUTC==9&$bisiestoUTC=='NO'){$acuUTC=243+intval($diaUTC);};
    if($mesUTC==10&$bisiestoUTC=='NO'){$acuUTC=273+intval($diaUTC);};
    if($mesUTC==11&$bisiestoUTC=='NO'){$acuUTC=304+intval($diaUTC);};
    if($mesUTC==12&$bisiestoUTC=='NO'){$acuUTC=334+intval($diaUTC);};
    // UTC: AÑOS BISIESTOS (0,31,60,91,121,152,182,213,244,274,305,335)
    if($mesUTC==1&$bisiestoUTC=='SI'){$acuUTC_B=intval($diaUTC);};
    if($mesUTC==2&$bisiestoUTC=='SI'){$acuUTC_B=31+intval($diaUTC);};
    if($mesUTC==3&$bisiestoUTC=='SI'){$acuUTC_B=60+intval($diaUTC);};
    if($mesUTC==4&$bisiestoUTC=='SI'){$acuUTC_B=91+intval($diaUTC);};
    if($mesUTC==5&$bisiestoUTC=='SI'){$acuUTC_B=121+intval($diaUTC);};
    if($mesUTC==6&$bisiestoUTC=='SI'){$acuUTC_B=152+intval($diaUTC);};
    if($mesUTC==7&$bisiestoUTC=='SI'){$acuUTC_B=182+intval($diaUTC);};
    if($mesUTC==8&$bisiestoUTC=='SI'){$acuUTC_B=213+intval($diaUTC);};
    if($mesUTC==9&$bisiestoUTC=='SI'){$acuUTC_B=244+intval($diaUTC);};
    if($mesUTC==10&$bisiestoUTC=='SI'){$acuUTC_B=274+intval($diaUTC);};
    if($mesUTC==11&$bisiestoUTC=='SI'){$acuUTC_B=305+intval($diaUTC);};
    if($mesUTC==12&$bisiestoUTC=='SI'){$acuUTC_B=335+intval($diaUTC);};
    // INICIAL: AÑOS NO BISIESTOS (0,31,59,90,120,151,181,212,243,273,304,334)
    if($mesI==1&$bisiestoI=='NO'){$acuI=intval($diaI);};
    if($mesI==2&$bisiestoI=='NO'){$acuI=31+intval($diaI);};
    if($mesI==3&$bisiestoI=='NO'){$acuI=59+intval($diaI);};
    if($mesI==4&$bisiestoI=='NO'){$acuI=90+intval($diaI);};
    if($mesI==5&$bisiestoI=='NO'){$acuI=120+intval($diaI);};
    if($mesI==6&$bisiestoI=='NO'){$acuI=151+intval($diaI);};
    if($mesI==7&$bisiestoI=='NO'){$acuI=181+intval($diaI);};
    if($mesI==8&$bisiestoI=='NO'){$acuI=212+intval($diaI);};
    if($mesI==9&$bisiestoI=='NO'){$acuI=243+intval($diaI);};
    if($mesI==10&$bisiestoI=='NO'){$acuI=273+intval($diaI);};
    if($mesI==11&$bisiestoI=='NO'){$acuI=304+intval($diaI);};
    if($mesI==12&$bisiestoI=='NO'){$acuI=334+intval($diaI);};
    // INICIAL: AÑOS BISIESTOS (0,31,60,91,121,152,182,213,244,274,305,335)
    if($mesI==1&$bisiestoI=='SI'){$acuI_B=intval($diaI);};
    if($mesI==2&$bisiestoI=='SI'){$acuI_B=31+intval($diaI);};
    if($mesI==3&$bisiestoI=='SI'){$acuI_B=60+intval($diaI);};
    if($mesI==4&$bisiestoI=='SI'){$acuI_B=91+intval($diaI);};
    if($mesI==5&$bisiestoI=='SI'){$acuI_B=121+intval($diaI);};
    if($mesI==6&$bisiestoI=='SI'){$acuI_B=152+intval($diaI);};
    if($mesI==7&$bisiestoI=='SI'){$acuI_B=182+intval($diaI);};
    if($mesI==8&$bisiestoI=='SI'){$acuI_B=213+intval($diaI);};
    if($mesI==9&$bisiestoI=='SI'){$acuI_B=244+intval($diaI);};
    if($mesI==10&$bisiestoI=='SI'){$acuI_B=274+intval($diaI);};
    if($mesI==11&$bisiestoI=='SI'){$acuI_B=305+intval($diaI);};
    if($mesI==12&$bisiestoI=='SI'){$acuI_B=335+intval($diaI);};
    // FINAL: AÑOS NO BISIESTOS (0,31,59,90,120,151,181,212,243,273,304,334)
    if($mesF==1&$bisiestoF=='NO'){$acuF=intval($diaF);};
    if($mesF==2&$bisiestoF=='NO'){$acuF=31+intval($diaF);};
    if($mesF==3&$bisiestoF=='NO'){$acuF=59+intval($diaF);};
    if($mesF==4&$bisiestoF=='NO'){$acuF=90+intval($diaF);};
    if($mesF==5&$bisiestoF=='NO'){$acuF=120+intval($diaF);};
    if($mesF==6&$bisiestoF=='NO'){$acuF=151+intval($diaF);};
    if($mesF==7&$bisiestoF=='NO'){$acuF=181+intval($diaF);};
    if($mesF==8&$bisiestoF=='NO'){$acuF=212+intval($diaF);};
    if($mesF==9&$bisiestoF=='NO'){$acuF=243+intval($diaF);};
    if($mesF==10&$bisiestoF=='NO'){$acuF=273+intval($diaF);};
    if($mesF==11&$bisiestoF=='NO'){$acuF=304+intval($diaF);};
    if($mesF==12&$bisiestoF=='NO'){$acuF=334+intval($diaF);};
    // FINAL: AÑOS BISIESTOS (0,31,60,91,121,152,182,213,244,274,305,335)
    if($mesF==1&$bisiestoF=='SI'){$acuF_B=intval($diaF);};
    if($mesF==2&$bisiestoF=='SI'){$acuF_B=31+intval($diaF);};
    if($mesF==3&$bisiestoF=='SI'){$acuF_B=60+intval($diaF);};
    if($mesF==4&$bisiestoF=='SI'){$acuF_B=91+intval($diaF);};
    if($mesF==5&$bisiestoF=='SI'){$acuF_B=121+intval($diaF);};
    if($mesF==6&$bisiestoF=='SI'){$acuF_B=152+intval($diaF);};
    if($mesF==7&$bisiestoF=='SI'){$acuF_B=182+intval($diaF);};
    if($mesF==8&$bisiestoF=='SI'){$acuF_B=213+intval($diaF);};
    if($mesF==9&$bisiestoF=='SI'){$acuF_B=244+intval($diaF);};
    if($mesF==10&$bisiestoF=='SI'){$acuF_B=274+intval($diaF);};
    if($mesF==11&$bisiestoF=='SI'){$acuF_B=305+intval($diaF);};
    if($mesF==12&$bisiestoF=='SI'){$acuF_B=335+intval($diaF);};
  
  // SEXTO: SE PASAN A FORMA NUMERICA LOS ACUMULADOS PARA TRABAJAR DE FORMA SEGURA
    @$acuUTC=intval($acuUTC);
    @$acuI=intval($acuI);
    @$acuF=intval($acuF);
    @$acuUTC_B=intval($acuUTC_B);
    @$acuI_B=intval($acuI_B);
    @$acuF_B=intval($acuF_B);
  /*
  echo '<br></br>';
  echo '<br></br>';
  echo '<br></br>';
  echo '<br></br>';
  echo '<br>Acumulado UTC No Bisiesto: '.$acuUTC;
  echo '<br>Acumulado UTC Bisiesto: '.$acuUTC_B;
  echo '<br>Acumulado Inicial No Bisiesto: '.$acuI;
  echo '<br>Acumulado Inicial Bisiesto: '.$acuI_B;
  */
  // SEPTIMO: CONDICIONES Y EVALUACION DE LAS FECHAS INICIALES  -----------------------------------------------------------------------------------
  
  // 1) CONDICIONES Y EVALUACION DE FECHAS INICIALES Y AÑOS NO BISIESTOS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  
  // 1.1) CONDICIONES  ----------------------------------------------------------------------------------------------------------------------------
  
  //  1.1.1) CONDICIONES PARA FECHAS INICIALES Y AÑOS NO BISIESTOS
          @$condicionI00=($acuUTC==$acuI);// CONDICION MENOS DE 24 HORAS
          @$condicionI01=($anioUTC==$anioI)&($bisiestoUTC=='NO'&$bisiestoI=='NO')&($mesI==$mesUTC);
          @$condicionI02=($anioUTC==$anioI)&($bisiestoUTC=='NO'&$bisiestoI=='NO')&($mesI==($mesUTC+1));
          @$condicionI03=($anioUTC==$anioI)&($bisiestoUTC=='NO'&$bisiestoI=='NO')&($mesI>=($mesUTC+2));
  //  1.1.2) CONDICIONES PARA MESES DE 30 Y DE 31 DIAS (SALVO DICIEMBRE)
          @$condicionI04=($acuUTC<$acuI);
          @$condicionI05=($acuI<=($acuUTC+31));
          //@$condicionI06=(@$diasMesUTC==31&$mesUTC<>12);
          @$condicionI06=(@$diasMesUTC==31);
          @$condicionI07=(@$diasMesUTC==30);
          @$condicionI08=($diaUTC<>31&($acuI<=($acuUTC+30)));
          @$condicionI09=($diaI==31&($acuI<=($acuUTC+31)));
  //  1.1.3) CONDICIONES PARA MES DE FEBRERO
          @$condicionI10=(@$diasMesUTC==28);
          @$condicionI11=($diaUTC<>28&($acuI<=($acuUTC+28)));
          @$condicionI12=($diaUTC==28&($acuI<=($acuUTC+31)));
  
  // 1.2) EVALUACIONES  --------------------------------------------------------------------------------------------------------------------------
  
  //  1.2.1) EVALUACION FECHA INICIAL PARA UTC DE MESES DE 30 DIAS  ------------------CORRECTA----------------------------------------------------
          if($condicionI07){ // 1- condicion para los meses de 30 dias
              if($condicionI01){
                  //if($condicionI04){$styleI=$sinError;}else{$styleI=$conError;};}
                  if($condicionI04){$validacionFechaInicial=0;}else{$validacionFechaInicial=1;};}
              elseif($condicionI02){
                  if($condicionI08){$validacionFechaInicial=0;}
                  else{if($condicionI09){$validacionFechaInicial=0;}else{$validacionFechaInicial=1;};};}
              elseif($condicionI03){$validacionFechaInicial=1;}
              else{$validacionFechaInicial=1;};
          }else{}; // 1- Fin
  //  1.2.2) EVALUACION FECHA INICIAL PARA UTC DE MESES DE 31 DIAS (MENOS DICIEMBRE) ------------------CORRECTA------------------------------------
          if($condicionI06){ // 1- condicion para los meses de 31 dias menos diciembre
              if($condicionI01){
                  if($condicionI04){$validacionFechaInicial=0;}else{$validacionFechaInicial=1;};}
              elseif($condicionI02){
                  if($condicionI05){$validacionFechaInicial=0;}else{$validacionFechaInicial=1;};}
              elseif($condicionI03){$validacionFechaInicial=1;}
              else{$validacionFechaInicial=0;};
          }else{}; // 1- Fin
  //  1.2.3) EVALUACION FECHA INICIAL PARA UTC DE MES DE FEBRERO ---------CORRECTA-----------------------------------------------------------------
          if($condicionI10){ // 1- condicion para los meses de 28 dias (FEBRERO)
            if($condicionI01){
                if($condicionI04){$validacionFechaInicial=0;}else{$validacionFechaInicial=1;};}
            elseif($condicionI02){
                if($condicionI11){$validacionFechaInicial=0;}
                else{if($condicionI12){$validacionFechaInicial=0;}else{$validacionFechaInicial=1;};};}
            elseif($condicionI03){$validacionFechaInicial=1;}
            else{$validacionFechaInicial=1;};
          }else{}; // 1- Fin
  
  // 2) CONDICIONES Y EVALUACION DE FECHAS INICIALES Y AÑOS BISIESTOS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  
  //  2.1) CONDICIONES  --------------------------------------------------------------------------------------------------------------------------
  
  //  2.1.1) FECHAS INICIALES Y AÑOS BISIESTOS
            @$condicionI00_B=($acuUTC_B==$acuI_B);// CONDICION MENOS DE 24 HORAS
            @$condicionI01_B=($anioUTC==$anioI)&($bisiestoUTC=='SI'&$bisiestoI=='SI')&($mesI==$mesUTC);
            @$condicionI02_B=($anioUTC==$anioI)&($bisiestoUTC=='SI'&$bisiestoI=='SI')&($mesI==($mesUTC+1));
            @$condicionI03_B=($anioUTC==$anioI)&($bisiestoUTC=='SI'&$bisiestoI=='SI')&($mesI>=($mesUTC+2));
  //  2.1.2) CONDICIONES PARA MESES DE 30 Y DE 31 DIAS (SALVO DICIEMBRE)
            @$condicionI04_B=($acuUTC_B<$acuI_B);
            @$condicionI05_B=($acuI_B<=($acuUTC_B+31));
            //@$condicionI06_B=(@$diasMesUTC_B==31&$mesUTC<>12);
            @$condicionI06_B=(@$diasMesUTC_B==31);
            @$condicionI07_B=(@$diasMesUTC_B==30);
            @$condicionI08_B=($diaUTC<>31&($acuI_B<=($acuUTC_B+30)));
            @$condicionI09_B=($diaI==31&($acuI_B<=($acuUTC_B+31)));
  //  2.1.3) CONDICIONES PARA MES DE FEBRERO
            @$condicionI10_B=(@$diasMesUTC_B==29);
            @$condicionI11_B=($diaUTC<>29&($acuI_B<=($acuUTC_B+29)));
            @$condicionI12_B=($diaUTC==29&($acuI_B<=($acuUTC_B+31)));
  
  //  2.2) EVALUACIONES  -------------------------------------------------------------------------------------------------------------------------
  
  //  2.2.1) EVALUACION FECHA INICIAL PARA UTC DE MESES DE 30 DIAS  ------------CORRECTA----------------------------------------------------------
          if($condicionI07_B){// 1- condicion para los meses de 30 dias
              if($condicionI01_B){
                  if($condicionI04_B){$validacionFechaInicial=0;}else{$validacionFechaInicial=1;};}
              elseif($condicionI02_B){
                  if($condicionI08_B){$validacionFechaInicial=0;}
                  else{if($condicionI09_B){$validacionFechaInicial=0;}else{$validacionFechaInicial=1;};};}
              elseif($condicionI03_B){$validacionFechaInicial=1;}
              else{$validacionFechaInicial=1;};
          }else{}; // 1- Fin
  //  2.2.2) EVALUACION FECHA INICIAL PARA UTC DE MESES DE 31 DIAS (MENOS DICIEMBRE) ---------CORRECTA--------------------------------------------
          if($condicionI06_B){ // 1- condicion para los meses de 31 dias menos diciembre
              if($condicionI01_B){
                  if($condicionI04_B){$validacionFechaInicial=0;}else{$validacionFechaInicial=1;};}
              elseif($condicionI02_B){
                  if($condicionI05_B){$validacionFechaInicial=0;}else{$validacionFechaInicial=1;};}
              elseif($condicionI03_B){$validacionFechaInicial=1;}
              else{$validacionFechaInicial=1;};
          }else{}; // 1- Fin
  
  //  2.2.3)  EVALUACION FECHA INICIAL PARA UTC DE MES DE FEBRERO -----------------CORRECTA-------------------------------------------------------
          if($condicionI10_B){ // 1- condicion para los meses de 28 dias (FEBRERO)
              if($condicionI01_B){
                  if($condicionI04_B){$validacionFechaInicial=0;}else{$validacionFechaInicial=1;};}
              elseif($condicionI02_B){
                  if($condicionI11_B){$validacionFechaInicial=0;}
                  else{if($condicionI12_B){$validacionFechaInicial=0;}else{$validacionFechaInicial=1;};};}
              elseif($condicionI03_B){$validacionFechaInicial=1;}
              else{$validacionFechaInicial=1;};
          }else{}; // 1- Fin
  
  // 3) CONDICIONES Y EVALUACION FECHA INICIAL CON CAMBIO DE AÑO (SE EVALUA EL MES UTC DE DICIEMBRE) xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  
  //  3.1) CONDICIONES  --------------------------------------------------------------------------------------------------------------------------
    
  //  3.1.1) CONDICIONES PARA MES DE DICIEMBRE EN AÑO NO BISIESTO Y ENERO EN AÑO NO BISIESTO
            @$condicionI13_A=($anioI==($anioUTC+1))&($bisiestoUTC=='NO'&$bisiestoI=='NO')&($mesUTC==12&$mesI==1);
            @$condicionI14_A=($anioI==($anioUTC+1))&($bisiestoUTC=='NO'&$bisiestoI=='NO')&($mesUTC==12&$mesI>=2);
            @$condicionI15_A=($diaI<=$diaUTC);
  //  3.1.2) CONDICIONES PARA MES DE DICIEMBRE EN AÑO BISIESTO Y ENERO EN AÑO NO BISIESTO
            @$condicionI13_B=($anioI==($anioUTC+1))&($bisiestoUTC=='SI'&$bisiestoI=='NO')&($mesUTC==12&$mesI==1);
            @$condicionI14_B=($anioI==($anioUTC+1))&($bisiestoUTC=='SI'&$bisiestoI=='NO')&($mesUTC==12&$mesI>=2);
            @$condicionI15_B=($diaI<=($diaUTC));
  //  3.1.3) CONDICIONES PARA MES DE DICIEMBRE EN AÑO NO BISIESTO Y ENERO EN AÑO BISIESTO
            @$condicionI01_C=($anioI==($anioUTC+1))&($bisiestoUTC=='NO'&$bisiestoI=='SI')&($mesUTC==12&$mesI==1);
            @$condicionI02_C=($anioI==($anioUTC+1))&($bisiestoUTC=='NO'&$bisiestoI=='SI')&($mesUTC==12&$mesI>=2);
            @$condicionI03_C=($diaI<=$diaUTC);
            //@$condicionI04_C=($acuUTC<$acuI);
  
  //  3.2) EVALUACIONES  -------------------------------------------------------------------------------------------------------------------------
  
  //  3.2.1)  EVALUACION FECHA INICIAL PARA UTC DE MES DE DICIEMBRE (AÑO UTC NO BISIESTO Y AÑO I NO BISIESTOS) ---------CORRECTA------------------
          if(@$condicionI13_A){
              if(@$condicionI15_A){$validacionFechaInicial=0;}else{};}
            elseif(@$condicionI14_A){$validacionFechaInicial=1;}
          else{}; // 1- Fin
  //  3.2.2)  EVALUACION FECHA INICIAL PARA UTC DE MES DE DICIEMBRE (AÑO UTC BISIESTO Y AÑO INICIAL NO BISIESTO) -------------CORRECTA------------
          if(@$condicionI13_B){
              if(@$condicionI15_B){$validacionFechaInicial=0;}else{};}
            elseif(@$condicionI14_B){$validacionFechaInicial=1;}
          else{}; // 1- Fin
  //  3.3.3)  EVALUACION PARA FECHA INICIAL UTC DE MES DE DICIEMBRE (AÑO UTC NO BISIESTO Y AÑO INICIAL BISIESTO) -----------CORRECTA--------------
          if($condicionI01_C){// 1- condicion para el mes de diciembre
              if(@$condicionI03_C){$validacionFechaInicial=0;}else{};}
            elseif(@$condicionI02_C){$validacionFechaInicial=1;}
          else{}; // 1- Fin
  
  //  6) SE EVALUA QUE LA FECHA SEAN COHERENTES - CADA MES CON SUS DIAS CORRESPONDIENTES xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    
  //    6.1) MES INICIAL
            if($mesI==1&$diaI>=32){$validacionFechaInicial=3;}else{};
            if(($mesI==2&$diaI>=29)&$bisiestoI=='NO'){$validacionFechaInicial=3;}else{};
            if(($mesI==2&$diaI>=30)&$bisiestoI=='SI'){$validacionFechaInicial=3;}else{};
            if($mesI==3&$diaI>=32){$validacionFechaInicial=3;}else{};
            if($mesI==4&$diaI>=31){$validacionFechaInicial=3;}else{};
            if($mesI==5&$diaI>=32){$validacionFechaInicial=3;}else{};
            if($mesI==6&$diaI>=31){$validacionFechaInicial=3;}else{};
            if($mesI==7&$diaI>=32){$validacionFechaInicial=3;}else{};
            if($mesI==8&$diaI>=32){$validacionFechaInicial=3;}else{};
            if($mesI==9&$diaI>=31){$validacionFechaInicial=3;}else{};
            if($mesI==10&$diaI>=32){$validacionFechaInicial=3;}else{};
            if($mesI==11&$diaI>=31){$validacionFechaInicial=3;}else{};
            if($mesI==12&$diaI>=32){$validacionFechaInicial=3;}else{};   
  
  // OCTAVO: CONDICIONES Y EVALUACION DE LAS FECHAS FINALES  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  
    //  1) FECHAS FINALES Y AÑOS NO BISIESTOS (SIN CAMBIO DE AÑO) ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    //  1.1) FECHAS UTC Y FECHA INICIAL EN EL MISMO MES ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    @$condicionF0101=($anioI==$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&($mesUTC==$mesI)&($mesF==$mesI);// OK
    @$condicionF0102=($anioI==$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&($mesUTC==$mesI)&($mesF==($mesI+1));// OK
    @$condicionF0103=($anioI==$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&($mesUTC==$mesI)&($mesF>=($mesI+2));// OK
    //  1.2) FECHA INICIAL MAYOR EN 1 AL MES DE FECHA UTC ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    @$condicionF0104=($anioI==$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&($mesI==($mesUTC+1))&($mesF==$mesI);// OK
    @$condicionF0105=($anioI==$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&($mesI==($mesUTC+1))&($mesF==($mesI+1));// OK
    @$condicionF0106=($anioI==$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&($mesI==($mesUTC+1))&($mesF>=($mesI+2));// OK
    //  1.3) CONDICIONES PARA VALORACION DE ACUMULADOS DE FECHAS FINALES +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    @$condicionF2001=($acuUTC<=$acuF&$acuI<=$acuF);//X
    @$condicionF2002=($diasMesI==28&$diaI<>28&($acuF<=($acuI+28)));
    @$condicionF2003=($diasMesI==28&$diaI==28&($acuF<=($acuI+31)));
    @$condicionF2004=($diasMesI==30&$diaI<>30&($acuF<=($acuI+30)));
    @$condicionF2005=($diasMesI==30&$diaI==30&($acuF<=($acuI+31)));
    @$condicionF2006=($diasMesI==31)&($acuF<=($acuI+31));
    @$condicionF2007=($acuI<=$acuF)or($acuI_B<=$acuF_B);
    @$condicionF2008=($diaF<=$diaI);
    //  2) FECHAS FINALES Y AÑOS NO BISIESTOS (CON CAMBIO DE AÑO) ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    @$condicionF0201=($anioUTC<>$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&(($mesUTC==11or$mesUTC==12)&($mesI==12)&($mesF==1));// OK
    @$condicionF0202=($anioUTC<>$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&(($mesUTC==11or$mesUTC==12)&($mesI==12)&($mesF>=2));// OK
    @$condicionF0203=($anioUTC<>$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&(($mesUTC==12)&($mesI==1)&($mesF==1));// OK
    @$condicionF0204=($anioUTC<>$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&(($mesUTC==12)&($mesI==1)&($mesF==2));// OK
    @$condicionF0205=($anioUTC<>$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='NO')&(($mesUTC==12)&($mesI==1)&($mesF>2));// OK
    //  3) FECHAS FINALES Y AÑOS BISIESTOS (SIN CAMBIO DE AÑO) +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    //  3.1) FECHAS UTC Y FECHA INICIAL EN EL MISMO MES ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    @$condicionF0101_B=($anioI==$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='SI'&$bisiestoF=='SI')&($mesUTC==$mesI)&($mesF==$mesI);// OK
    @$condicionF0102_B=($anioI==$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='SI'&$bisiestoF=='SI')&($mesUTC==$mesI)&($mesF==($mesI+1));// OK
    @$condicionF0103_B=($anioI==$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='SI'&$bisiestoF=='SI')&($mesUTC==$mesI)&($mesF>=($mesI+2));// OK
    //  3.2) FECHA INICIAL MAYOR EN 1 AL MES DE FECHA UTC ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    @$condicionF0104_B=($anioI==$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='SI'&$bisiestoF=='SI')&($mesI==($mesUTC+1))&($mesF==$mesI);// OK
    @$condicionF0105_B=($anioI==$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='SI'&$bisiestoF=='SI')&($mesI==($mesUTC+1))&($mesF==($mesI+1));// OK
    @$condicionF0106_B=($anioI==$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='SI'&$bisiestoF=='SI')&($mesI==($mesUTC+1))&($mesF>=($mesI+2));// OK
    //  3.3) CONDICIONES PARA VALORACION DE ACUMULADOS DE FECHAS FINALES +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    @$condicionF2001_B=($acuUTC_B<=$acuF_B&$acuI_B<=$acuF_B);//X
    @$condicionF2002_B=($diasMesI_B==29&$diaI<>29&($acuF_B<=($acuI_B+29)));
    @$condicionF2003_B=($diasMesI_B==29&$diaI==29&($acuF_B<=($acuI_B+31)));
    @$condicionF2004_B=($diasMesI_B==30&$diaI<>30&($acuF_B<=($acuI_B+30)));
    @$condicionF2005_B=($diasMesI_B==30&$diaI==30&($acuF_B<=($acuI_B+31)));
    @$condicionF2006_B=($diasMesI_B==31)&($acuF_B<=($acuI_B+31));
    @$condicionF2007_B=($acuI_B<=$acuF_B);
    @$condicionF2008_B=($diaF<=$diaI);
    //  4) FECHAS FINALES Y AÑOS BISIESTOS (CON CAMBIO DE AÑO DE BISIESTO A NO BISIESTO) +++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    @$condicionF0201_B_01=($anioUTC<>$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='SI'&$bisiestoF=='NO')&(($mesUTC==11or$mesUTC==12)&($mesI==12)&($mesF==1));// OK
    @$condicionF0202_B_01=($anioUTC<>$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='SI'&$bisiestoF=='NO')&(($mesUTC==11or$mesUTC==12)&($mesI==12)&($mesF>=2));// OK
    @$condicionF0203_B_01=($anioUTC<>$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='NO'&$bisiestoF=='NO')&(($mesUTC==12)&($mesI==1)&($mesF==1));// OK
    @$condicionF0204_B_01=($anioUTC<>$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='NO'&$bisiestoF=='NO')&(($mesUTC==12)&($mesI==1)&($mesF==2));// OK
    @$condicionF0205_B_01=($anioUTC<>$anioF)&($bisiestoUTC=='SI'&$bisiestoI=='NO'&$bisiestoF=='NO')&(($mesUTC==12)&($mesI==1)&($mesF>2));// OK
    //  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    //  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX   ESTOY AQUI  XXXXXXXXXXXXXXXXXXXXX CAMBIO DE AÑO EN BISIESTO
    //  5) FECHAS FINALES Y AÑOS BISIESTOS (CON CAMBIO DE AÑO DE NO BISIESTO A BISIESTO) +++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    @$condicionF0201_B=($anioUTC<>$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='SI')&(($mesUTC==11or$mesUTC==12)&($mesI==12)&($mesF==1));// 
    @$condicionF0202_B=($anioUTC<>$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='NO'&$bisiestoF=='SI')&(($mesUTC==11or$mesUTC==12)&($mesI==12)&($mesF>=2));// 
    @$condicionF0203_B=($anioUTC<>$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='SI'&$bisiestoF=='SI')&(($mesUTC==12)&($mesI==1)&($mesF==1));// 
    @$condicionF0204_B=($anioUTC<>$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='SI'&$bisiestoF=='SI')&(($mesUTC==12)&($mesI==1)&($mesF==2));// 
    @$condicionF0205_B=($anioUTC<>$anioF)&($bisiestoUTC=='NO'&$bisiestoI=='SI'&$bisiestoF=='SI')&(($mesUTC==12)&($mesI==1)&($mesF>2));// 
    //  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    //  1.1)  EVALUACION FECHA FINAL AÑO NO BISIESTO: FECHA UTC MES DE 28, 30 O 31 (MENOS DICIEMBRE SIN CAMBIO DE AÑO) +++++CORRECTA++++++++++++++
    if(@$condicionF0101){
        if(@$condicionF2001){$validacionFechaFinal = 0;}
        else{$validacionFechaFinal = 1;};}// LAS TRES FECHAS EN EL MISMO MES -- OK
    elseif(@$condicionF0102){
        if(@$condicionF2002){$validacionFechaFinal = 0;}
        elseif(@$condicionF2003){$validacionFechaFinal = 0;}
        elseif(@$condicionF2004){$validacionFechaFinal = 0;}
        elseif(@$condicionF2005){$validacionFechaFinal = 0;}
        elseif(@$condicionF2006){$validacionFechaFinal = 0;}
        else{$validacionFechaFinal = 1;};}// MES UTC == MES I, Y MES FINAL MAYOR EN 1 -- OK
    elseif(@$condicionF0103){$validacionFechaFinal = 1;}//  MES UTC == MES I, Y MES FINAL MAYOR DE 2 AL MES UTC -- OK
    elseif(@$condicionF0104){
        if(@$condicionF2007){$validacionFechaFinal = 0;}else{$validacionFechaFinal = 1;};}// MES F == MES I == (MES UTC + 1)  -- OK
    elseif(@$condicionF0105){
        if(@$condicionF2002){$validacionFechaFinal = 0;}
        elseif(@$condicionF2003){$validacionFechaFinal = 0;}
        elseif(@$condicionF2004){$validacionFechaFinal = 0;}
        elseif(@$condicionF2005){$validacionFechaFinal = 0;}
        elseif(@$condicionF2006){$validacionFechaFinal = 0;}
        else{$validacionFechaFinal = 1;};}// MES I == (MES UTC + 1) Y MES F == (MES I + 1) -- OK
    elseif(@$condicionF0106){$validacionFechaFinal = 1;}//  MES I == (MES UTC +1), Y MES FINAL MAYOR DE 2 AL MES UTC -- OK
    else{$validacionFechaFinal = 1;};// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX   OJO A ESTA CONDICION POR SI DA PROBLEMAS  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
    //  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    //  1.2)  EVALUACION FECHA FINAL: CAMBIO DE AÑO (AÑOS NO BISIESTOS) ++++++++++++++++++++++++++++++CORRECTA++++++++++++++++++++++++++++++++++++
    if(@$condicionF0201){
        if($condicionF2008){$validacionFechaFinal = 0;};}
    elseif(@$condicionF0202){$validacionFechaFinal = 1;}
    elseif(@$condicionF0203){
        if(@$condicionF2007){$validacionFechaFinal = 0;}else{$validacionFechaFinal = 1;};}
    elseif(@$condicionF0204){
        if(($diaI==31&$diasMesF==28)or($diaI==31&$diasMesF_B==29)){$validacionFechaFinal = 0;}else{$validacionFechaFinal = 1;};}
    elseif(@$condicionF0205){$validacionFechaFinal = 1;}
    else{};
    //  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    //  1.3)  EVALUACION FECHA FINAL AÑO BISIESTO: FECHA UTC MES DE 28, 30 O 31 (MENOS DICIEMBRE SIN CAMBIO DE AÑO) ++++++CORRECTA++++++++++++++++
    if(@$condicionF0101_B){
        if(@$condicionF2001_B){$validacionFechaFinal = 0;}
        else{$validacionFechaFinal = 1;};}// LAS TRES FECHAS EN EL MISMO MES -- OK
    elseif(@$condicionF0102_B){
        if(@$condicionF2002_B){$validacionFechaFinal = 0;}
        elseif(@$condicionF2003_B){$validacionFechaFinal = 0;}
        elseif(@$condicionF2004_B){$validacionFechaFinal = 0;}
        elseif(@$condicionF2005_B){$validacionFechaFinal = 0;}
        elseif(@$condicionF2006_B){$validacionFechaFinal = 0;}
        else{$validacionFechaFinal = 1;};}// MES UTC == MES I, Y MES FINAL MAYOR EN 1 -- OK
    elseif(@$condicionF0103_B){$validacionFechaFinal = 1;}//  MES UTC == MES I, Y MES FINAL MAYOR DE 2 AL MES UTC -- OK
    elseif(@$condicionF0104_B){
        if(@$condicionF2007_B){$validacionFechaFinal = 0;}else{$validacionFechaFinal = 1;};}// MES F == MES I == (MES UTC + 1)  -- OK
    elseif(@$condicionF0105_B){
        if(@$condicionF2002_B){$validacionFechaFinal = 0;}
        elseif(@$condicionF2003_B){$validacionFechaFinal = 0;}
        elseif(@$condicionF2004_B){$validacionFechaFinal = 0;}
        elseif(@$condicionF2005_B){$validacionFechaFinal = 0;}
        elseif(@$condicionF2006_B){$validacionFechaFinal = 0;}
        else{$validacionFechaFinal = 1;};}// MES I == (MES UTC + 1) Y MES F == (MES I + 1) -- OK
    elseif(@$condicionF0106_B){$validacionFechaFinal = 1;}//  MES I == (MES UTC +1), Y MES FINAL MAYOR DE 2 AL MES UTC -- OK
    else{};
    //  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    //  1.4)  EVALUACION FECHA FINAL: CAMBIO DE AÑO (DE BISIESTO A NO BISIESTO) ++++++++++++++++++++++++++CORRECTA++++++++++++++++++++++++++++++++
    if(@$condicionF0201_B){
        if($condicionF2008_B){$validacionFechaFinal = 0;};}
    elseif(@$condicionF0202_B){$validacionFechaFinal = 1;}
    elseif(@$condicionF0203_B){
        if(@$condicionF2007_B){$validacionFechaFinal = 0;}else{$validacionFechaFinal = 1;};}
    elseif(@$condicionF0204_B){$validacionFechaFinal = 0;}
    elseif(@$condicionF0205_B){$validacionFechaFinal = 1;}
    else{};
    //  1.5)  EVALUACION FECHA FINAL: CAMBIO DE AÑO (DE NO BISIESTO A BISIESTO) +++++++++++++++++++CORRECTA+++++++++++++++++++++++++++++++++++++++
    if(@$condicionF0201_B_01){
        if($condicionF2008_B){$validacionFechaFinal = 0;};}
    elseif(@$condicionF0202_B_01){$validacionFechaFinal = 1;}
    elseif(@$condicionF0203_B_01){
        if(@$condicionF2007_B){$validacionFechaFinal = 0;}else{$validacionFechaFinal = 1;};}
    elseif(@$condicionF0204_B_01){$validacionFechaFinal = 0;}
    elseif(@$condicionF0205_B_01){$validacionFechaFinal = 0;}
    else{};
  
    //  SE EVALUA QUE LA FECHA SEAN COHERENTES - CADA MES CON SUS DIAS CORRESPONDIENTES
    //MES FINAL
        if($mesF==1&$diaF>=32){$validacionFechaFinal = 3;}else{};
        if(($mesF==2&$diaF>=29)&$bisiestoF=='NO'){$validacionFechaFinal = 3;}else{};
        if(($mesF==2&$diaF>=30)&$bisiestoF=='SI'){$validacionFechaFinal = 3;}else{};
        if($mesF==3&$diaF>=32){$validacionFechaFinal = 3;}else{};
        if($mesF==4&$diaF>=31){$validacionFechaFinal = 3;}else{};
        if($mesF==5&$diaF>=32){$validacionFechaFinal = 3;}else{};
        if($mesF==6&$diaF>=31){$validacionFechaFinal = 3;}else{};
        if($mesF==7&$diaF>=32){$validacionFechaFinal = 3;}else{};
        if($mesF==8&$diaF>=32){$validacionFechaFinal = 3;}else{};
        if($mesF==9&$diaF>=31){$validacionFechaFinal = 3;}else{};
        if($mesF==10&$diaF>=32){$validacionFechaFinal = 3;}else{};
        if($mesF==11&$diaF>=31){$validacionFechaFinal = 3;}else{};
        if($mesF==12&$diaF>=32){$validacionFechaFinal = 3;}else{};
  
  //  4) EVALUACION SOLICITAR ACCESOS CON MENOS DE 24 HORAS SI NO ES CON URGENCIA (se pone después de todas las evaluaciones de fechas) xxxxxxxxxx
      if((@$condicionI01&@$condicionI00)||(@$condicionI01_B&@$condicionI00_B)){$validacionFechaInicial=2;$validacionFechaFinal=2;}else{}; // FIN MENOS DE 24H
  
  //  5) EVALUACION AÑO INICIAL Y FINAL NO PUEDEN SER INFERIOR AL AÑO ACTUAL NI SER SUPERIORES EN 2 AÑOS AL AÑO ACTUAL xxxxxxxxxxxxxxxxxxxxxxxxxxx
  
  /*
      if(($anioI<$anioUTC)or($anioF<$anioUTC)){$validacionFechaInicial=4;$validacionFechaFinal=4;}else{};
      if(($anioI>=($anioUTC+2))or($anioF>=($anioUTC+2))){$validacionFechaInicial=4;$validacionFechaFinal=4;}else{};
      */
      if($anioI<$anioUTC or $anioI>=$anioUTC+2){$validacionFechaInicial=4;}else{};
      if($anioF<$anioUTC or $anioF>=$anioUTC+2){$validacionFechaFinal=4;}else{};
  
  // SE CREAN LAS VARIABLES PARA MOSTRAR LOS MENSAJES DE ERROR
  
  //  1) MENSAJE PARA ERRORES EN LA FECHAS DE INICIO Y FINALIZACION
      if($validacionFechaInicial==1 & $validacionFechaFinal==0){$mensajeError='DEBE REVISAR LA FECHA DE INICIO';}
      elseif($validacionFechaInicial==0 & $validacionFechaFinal==1){$mensajeError='DEBE REVISAR LA FECHA DE FINALIZACION';}
      elseif($validacionFechaInicial==1 & $validacionFechaFinal==1){$mensajeError='DEBE REVISAR LAS FECHAS DE INICIO Y FINALIZACION';}
      else{};   
  
  //  2) MENSAJE PARA SOLICITUDES REALIZADAS CON MENOS DE 24 HORAS DE ANTELACION
      if($validacionFechaInicial==2 & $validacionFechaFinal==2){$mensajeError='SOLICITUD REALIZADA CON MENOS DE 24 HORAS DE ANTELACION<p style=font-size:8px></p>DEBE TRAMITARLA POR METODO URGENTE<br>';}
      else{};
  
  //  3) MENSAJE PARA SOLICITUDES CON LOS DIAS DE MES NO CONCORDANTES
      if($validacionFechaInicial==3 & $validacionFechaFinal==0){$mensajeError='DEBE REVISAR LAS FECHAS DE INICIO<p style=font-size:8px></p>DIAS DE MES NO CONCUERDAN';}
      elseif($validacionFechaInicial==0 & $validacionFechaFinal==3){$mensajeError='DEBE REVISAR LAS FECHAS DE FINALIZACION<p style=font-size:8px></p>DIAS DE MES NO CONCUERDAN';}
      elseif($validacionFechaInicial==3 & $validacionFechaFinal==3){$mensajeError='DEBE REVISAR LAS FECHAS DE INICIO Y FINALIZACION<p style=font-size:8px></p>DIAS DE MES NO CONCUERDAN';}
      else{};
  
  //  4) MENSAJE PARA SOLICITUDES CON LOS DIAS DE MES NO CONCORDANTES
      if($validacionFechaInicial==4){$mensajeError='DEBE REVISAR EL AÑO DE LA FECHA DE INICIO';}else{};
      if($validacionFechaFinal==4){$mensajeError='DEBE REVISAR EL AÑO DE LA FECHA DE FINALIZACION';}else{};
      if($validacionFechaInicial==4 & $validacionFechaFinal==4){$mensajeError='DEBE REVISAR LOS AÑOS DE FECHAS DE INICIO Y FINALIZACION';}else{};
  
  //  FIN DE LAS CONDICIONES PARA LOS MENSAJES DE EVALUACION DE FECHAS
  
  @$mostrarDivError = 
      '<div id="avisoSolicitudes2" name="avisoSolicitudes" class="oscurecerContenedor" style="display:block;">
        <div id="mostrarAviso2" name="mostrarAviso" class="mostrarAviso" style="display:block;position:absolute;z-index:999;top:36%;left:31%;width:38%">
          <div id="tituloAviso2" class="tituloAviso">AVISO IMPORTANTE</div>
          <div id="mensajeAviso2" class="mensajeAviso">'.$mensajeError.'</div>
          <form id="atras" action="solicitudes.php" method="get">
            <input type="hidden" name="pasos" value="301"/>
            
        <input type="hidden" id="accion" name="accion" value=" '.$accion.' "/>
            <button type="submit" class="boton">aaceptar</button>

        <!--<a href="javascript:cerrarAvisoSolicitudes2();">ACEPTAR</a>-->
          </form>
      </div>';
  
  //  CONDICIONES PARA MOSTRAR MENSAJES DE ERROR EN FECHAS
  //if($validacionFechaInicial==2){echo $mostrarDivError;}else{};
  if($validacionFechaInicial<>0 || $validacionFechaFinal<>0){echo $mostrarDivError;}else{};


};// FIN ELSE DE $inputFechaFinal CON CARACTERES NO NUMERICOS
};// FIN ELSE DE $inputFechaFinal CON CARACTERES DISTINTOS DE '/'
};// FIN ELSE DE $inputFechaInicial CON CARACTERES NO NUMERICOS
};// FIN ELSE DE $inputFechaInicial CON CARACTERES DISTINTOS DE '/'
};// FIN ELSE DE $inputFechaInicial CON MENOS DE 10 CARACTERES
};// FIN ELSE DE $inputFechaInicial VACIA

//  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
;}; // FIN DE LA NUEVA FUNCION PARA EVALUAR FECHAS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
//  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx  



// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// DECIMOCUARTA FUNCION: PROCESAR DATOS DE ENTRADA EXCEL
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function procesarExcel_JS(){require('02-albacon-php/04-variables-solicitudes.php');
  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // PRIMERO: COMPROBAMOS QUE EXISTA ALGUN REGISTRO PARA ESE CODIGO Y EVITAR ENTRADA DUPLICADA SI SE REFRESCA LA PAGINA O SI SE USAN FLECHAS ATRA/ADELANTE
  //  * Para ello hacemos una primera consulta en la que obtenemos la variable $procesado, que es la cantidad de registros con PROCESADO = SI
  $conexion_db;
  $baseDatos;
  $sql="SELECT PROCESADO FROM  accesos_temp WHERE CODIGO='$codigoSolicitante' ";
  $result=mysqli_query($conexion_db,$sql);
  $procesado = mysqli_num_rows($result);
  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // SEGUNDO: CONDICIONAMOS INSERTAR A SI $procesado ES 0, ES DECIR NO HAY REGISTROS PARA ESA VARIABLE $codigoSolicitante
  //  SI $procesado = 0 PROCESAMOS Y MOSTRAMOS
  if($procesado <= 0){
  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // TERCERO: PROCESAMOS LOS DATOS
  // -------------------------------------------------------------------------------------------------------------------------------------------------
  // 1) SE QUITAN LAS TILDES Y LOS ESPACIOS POR DELANTE Y DETRAS, ASI COMO LOS DOBLES ESPACIOS
  $datosExcel = str_replace(
    array('á','Á','é','É','í','Í','ó','Ó','ú','Ú','ü','ñ'),
    array('a','A','e','E','i','I','o','O'.'u','U','Ü','Ñ'),
    $datosExcel);
  // 2) SEPARAMOS POR TABULACIONES Y FILAS
  @$datosFila=explode("\t",$datosExcel);
  foreach($datosFila as $datosRotos){$datos[] = explode("\n", $datosRotos);};
  // 3) OBTENEMOS EL CONTADOR DE FILAS:
  $contadorFilas= (count($datos)-1)/8;
  $limite=($contadorFilas)*8;
  // 4) SE QUITAN LOS DATOS DOBLES, PARA LUEGO PODER QUITAR EL DATO DEL PRIMER DNI
  for($i=0;$i<=$limite;$i){unset($datosFila[$i=$i+8]);};
  // 'Dato 8 separado: <br>';
  //echo 'Dato OBSERVACIONES: '.$datos[8][0].'<br>';
  //echo 'Dato DNI: '.$datos[8][1].'<br>';
  // 5) SE EXTRAE EL VALOR DEL PRIMER DNI
  $primerDni = array_shift($datosFila);
  //echo 'Dato PRIMER DNI: '.$primerDni.'<br>';
  // VEMOS COMO QUEDA EL ARRAY SIN ESE PRIMER DATO (PRIMER DNI)
  //echo '<strong>VEMOS COMO QUEDA EL ARRAY SIN ESE PRIMER DATO (PRIMER DNI) Y CON LOS DATOS DOBLES (DNI Y OBSERVACIONES): </strong><br>';
  //print_r($datosFila);
  // 6) SE CREA EL LIMITE NUEVO PARA CEAR LOS ARRAY'S DE LOS DISTINTOS DATOS
  $limite2=count($datosFila)-1;
  //echo 'Nuevo Limite: '.$limite2;
  //echo '<hr>';
  // 7) SE FORMAN LOS ARRAY's DE LOS DIFERENTES DATOS EN EL SIGUIENTE ORDEN:
  //    7.1) SE FORMA CON LOS DATOS DE OBSERVACIONES
  $datoObservaciones=array();
  for($i=0;$i<=$limite-1;$i){$datoObservaciones[]=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($datos[$i=$i+8][0])))));};
  //    7.2) SE FORMA CON LOS DATOS DE LOS DNI
  @$datoDNI=array();
  @$datoDNI[0]=str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace('-','',str_replace(' ','-',strtoupper(preg_replace('/\s+/', ' ',trim($primerDni)))))));
  for($i=0;$i<=($limite-10);$i){$x=1+$i/8; @$datoDNI[$x++]=str_replace('-','',str_replace(' ','-',strtoupper(preg_replace('/\s+/', ' ',trim($datos[$i=$i+8][1])))));};
  //    7.3) SE FORMA ARRAY DE LOS DATOS NOMBRE
  @$datoNombre=array();
  for($i=0;$i<=$limite2;$i=$i+7){$datoNombre[]=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($datosFila[$i])))));};
  //    7.4) SE FORMA ARRAY DE LOS DATOS APELLIDOS
  @$datoApellidos=array();
  for($i=1;$i<=($limite2+1);$i=$i+7){$datoApellidos[]=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($datosFila[$i])))));};
  //    7.5) SE FORMA ARRAY DE LOS DATOS EMPRESA 
  @$datoEmpresa=array();
  for($i=2;$i<=($limite2+2);$i=$i+7){$datoEmpresa[]=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($datosFila[$i])))));};
  //    7.6) SE FORMA ARRAY DE LOS DATOS MATRICULA
  @$datoVehiculo=array();
  for($i=3;$i<=($limite2+3);$i=$i+7){$datoVehiculo[]=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($datosFila[$i])))));};
  //    7.7) SE FORMA ARRAY DE LOS DATOS FECHA INICIO
  @$datoFechaInicial=array();
  for($i=4;$i<=($limite2+4);$i=$i+7){$datoFechaInicial[]=preg_replace('/\s+/', ' ',trim($datosFila[$i]));};
  //    7.8) SE FORMA ARRAY DE LOS DATOS FECHA FINAL
  @$datoFechaFinal=array();
  for($i=5;$i<=($limite2+5);$i=$i+7){$datoFechaFinal[]=preg_replace('/\s+/', ' ',trim($datosFila[$i]));};
  //    7.9) SE FORMA ARRAY DE LOS DATOS MOTIVO
  @$datoMotivo=array();
  for($i=6;$i<=($limite2+6);$i=$i+7){$datoMotivo[]=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($datosFila[$i])))));};
  //    7.10) SE DA VALOR A LA VARIABLE PROCESADO
  @$procesado='SI';
  //    7.11) SE GENERA EL CODIGO QR: NUM-IDsolicitante-UTC-IDResponsable ------- CAMPO PRIMARY KEY (Permite usar el progrma a varios usuarios a la vez)
  for($i=1;$i<=$contadorFilas;$i++){$codigoQR[]=$i.'-'.$codigoSolicitante.'-'.$IDresponsable;};
  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // CUARTO: SE INSERTAN LOS DATOS EN LA BASE DE ACCESOS TEMPORALES
  // -------------------------------------------------------------------------------------------------------------------------------------------------
  $conexion_db;
  $baseDatos;
  for($i=1;$i<=$contadorFilas;$i++){$i;$id=array($i);$id=$i-1;
    if($datoVehiculo[$id]==''){$datoVehiculo[$id] = 'SIN DATO';}else{$datoVehiculo[$id];};  //  No dejar vacio dato matricula
    if($datoObservaciones[$id]==''){$datoObservaciones[$id] = 'NO PROCEDE';}else{$datoObservaciones[$id];}; // No dejar vacio dato observaciones
  mysqli_query($conexion_db, "INSERT INTO accesos_temp (ID,NUM,CODIGO,CODIGO_QR,DNI,NOMBRE,APELLIDOS,EMPRESA,VEHICULO,FECHA_INICIO,FECHA_FINAL,MOTIVO,ID_RESPONSABLE,
  OBSERVACIONES,PROCESADO)
  VALUES ('$i','$i','$codigoSolicitante','$codigoQR[$id]','$datoDNI[$id]','$datoNombre[$id]','$datoApellidos[$id]','$datoEmpresa[$id]','$datoVehiculo[$id]','$datoFechaInicial[$id]',
  '$datoFechaFinal[$id]','$datoMotivo[$id]','$IDresponsable','$datoObservaciones[$id]','$procesado')");};
  mysqli_close($conexion_db);
  //mostrarEntradaExcel();
  mostrarDatosAccesos();mostrarTablaAccesos();
  //mostrarDatosAccesos();mostrarTablaAccesos();
  }else{mostrarDatosAccesos();mostrarTablaAccesos();
  }; // FINAL DE LA CONDICION DE PROCESADO
  ;}; // FINAL DE LA FUNCION PARA PROCESAR DATOS DE ENTRADA EXCEL  
  
  

?>
