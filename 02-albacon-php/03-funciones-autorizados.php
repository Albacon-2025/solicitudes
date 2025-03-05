<?php
header('Content-type: text/html; charset=utf-8');
require('02-albacon-php/03-variables-autorizados.php');
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// PRIMERA FUNCION: MOSTRAR PANTALLA DE IDENTIFICACION CORRECTA
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function identificacionGestorOK(){require('02-albacon-php/03-variables-autorizados.php');
?>
<div id="oscurecerContenedor" name="oscurecerContenedor" class="oscurecerContenedor">
  <div id="gestorOK" class="gestorOK" style="background-image:url('fotos-archivos/Iberia/logo-gris-autorizados-p.png');">
    <h3 style="color:rgb(224, 23, 50, 1);font-size:20px;margin-top:18px;">IDENTIFICACION CORRECTA</h3>
<?php
  echo '<p style="color:rgb(0, 0, 0, 0.6);">'.utf8_decode($nombreGestor).' '.utf8_decode($apellidosGestor).'</p>';
?>
    <div id="contieneTabla" style="">
      <table style="width:96%;padding-left:4%;">
        <tr>
          <td style="width:33.3%;">
            <form id="nuevoAutorizado" class="linea" action="autorizados.php" method="get">
              <input type="hidden" id="pasos" name="pasos" value="2"/>
              <input type="hidden" id="accion" name="accion" value="1"/>
              <input type="submit" style="width:100%;height:28px;font-size:14px;" class="boton" value="NUEVO REGISTRO"/>
            </form>
          </td>

          <td style="width:33.3%;">
            <form id="editarAutorizadoUno" class="linea" action="autorizados.php" method="get">
              <input type="hidden" id="pasos" name="pasos" value="3"/>
              <input type="hidden" id="accion" name="accion" value="2"/>
              <input type="submit" style="width:100%;height:28px;font-size:14px;" class="boton" value="EDITAR REGISTRO"/>
            </form>
          </td>
          <td style="width:33.3%;text-align:left;">
            <form id="borrarAutorizadoUno" class="linea" action="autorizados.php" method="get">
              <input type="hidden" id="pasos" name="pasos" value="4"/>
              <input type="hidden" id="accion" name="accion" value="3"/>
              <input type="submit" style="width:100%;height:28px;font-size:14px;" class="boton" value="BORRAR REGISTRO"/>
            </form>
          </td>
        </tr>
        <tr>
          <td style="width:33.3%;"></td>
          <td style="width:33.3%;">
            <form id="cancelarSesion" action="autorizados.php" method="get">
              <input type="hidden" id="pasos" name="pasos" value="100"/>
              <input type="submit" style="width:100%;height:28px;font-size:14px;" class="boton" value="CERRAR SESION"/>
            </form>
          </td>
          <td style="width:33.3%;"></td>
        </tr>
      </table>
    </div><!-- FIN div contieneTabla -->
  </div><!-- FIN div gestorOK -->
</div><!-- FIN div oscurecerContenedor -->
<?php
}; // FINAL DEFUNCION IDENTIFICACION OK DEL GESTOR
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// SEGUNDA FUNCION: MOSTRAR PANTALLA DE LOGIN GESTOR
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function pantallaLoginGestor(){require('02-albacon-php/03-variables-autorizados.php');?>
<div id="fondoLogin" name="fondoLogin" class="fondoLogin" style="background-image:url('fotos-archivos/Iberia/Iberia_A350.png');background-size:cover;">
  <div id="login" name="login" class="login" style="width:100%;height:100%;background-color:rgba(255, 255, 255, 0.85);">
    <h1 style="font-size:30px;z-index:0;"><br>DIRECCION DE SEGURIDAD</h1>
    <h1>REGISTRO DE AUTORIZADOS A SOLICITAR ACCESOS</h1><br>
    <form id="loginGestor" name="loginGestor" action="autorizados.php" method="get">
        <table style="width:100%;font-size:14px;">
            <tr>
                <td style="width:6%;"></td>
                <td style="background-color: rgb(255,255,255,0);text-align:right;height:40px;color:rgb(0, 0, 0, 0.7);width:40%;"><strong>GESTOR:</strong></td>
                <td style="background-color: rgb(255,255,255,0);text-align:left;width:54%;"><input type="text" id="gestor" name="gestor" class="clave" style=""/></td>
            </tr>
            <tr>
                <td></td>
                <td style="background-color:rgb(255,255,255,0);text-align:right;height:40px;color:rgb(0, 0, 0, 0.7);"><strong>CONTRASEÑA:</strong></td>
                <td style="background-color:rgb(255,255,255,0);text-align:left;"><input type="text" id="contrasena" name="contrasena" class="clave" style=""/></td>
            </tr>
            <tr style="background-color: rgb(255,255,255,0);padding-left:-200px;">
                <td colspan="3" style="background-color: rgb(255,255,255,0);text-align:center;height:55px;">

                    <input type="hidden" id="comprobarGestor" name="comprobarGestor" value="1"/>
                    
                    <input type="hidden" id="pasos" name="pasos" value="1"/>
                    <input type="button" id="BTN-Identificarse" class="BTN-Identificarse" value="IDENTIFICARSE" onclick="validarGestor()"/>
                </td>
            </tr>
        </table>
    </form>
    <form id="olvidoContrasena" name="olvidoContrasena" action="autorizados.php" method="get">
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
// ----------------------------------------------------------------------------------------------------------------------------------------------
// SE COMPRUEBA QUE LOS CAMPOS DE GESTOR Y CONTRASEÑA EXISTEN Y ESTAN EN VIGOR (CON PHP)
// ----------------------------------------------------------------------------------------------------------------------------------------------
if($comprobarGestor==1){
// 1) SE REALIZA LA CONEXION CON LA BD Y LA CONSULTA --------------------------------------------------------------------------------------------
$conexion_db;
$baseDatos;
$sql="SELECT * FROM seguridad WHERE VIGILANTE='$gestor'";
$result=mysqli_query($conexion_db,$sql);
$registroGestor=mysqli_fetch_array($result);
// 1) SE CREA ARRAY CON LOS GESTORES CON PERMISO PARA AUTORIZAR Y SE EVALUA ESTE PERMISO
$IDpermitidos = array('1001','1002','1003','1004','1005','1006','1007','1008','1009','1010');
if (!in_array(@$registroGestor[1],$IDpermitidos)&$gestor<>''){
?>
    <div id="avisoErrorValidacion" name="avisoErrorValidacion" class="oscurecerContenedor">
    <div id="mostrarAviso" name="mostrarAviso" class="mostrarAvisoAutorizados">
      <div class="tituloAviso">INFORMACION IMPORTANTE</div>
      <div class="mensajeAviso">USTED NO DISPONE DE LOS PERMISOS REQUERIDOS</div>
        <a href="javascript:cerrarAvisoValidacion();">ACEPTAR</a>
    </div><!-- FINAL mostrarAvisoError -->
  </div><!-- FINAL mostrarAviso -->
<?php
}else{
// 2) SE EVALUA LA CONTRASEÑA DEPENDIENDO DE NUMERO DE USOS Y QUE SEA CORRECTA ------------------------------------------------------------------
// 2.1) SE EVALUA SI ES PRIMER USO DEL PROGRAMA
if (in_array(@$registroGestor[1],$IDpermitidos)&@$registroGestor[6]==0){
?>
<div id="fondoCambioClave" name="fondoCambioClave" class="oscurecerContenedor">
      <div id="cambioClave" name="cambioClave" class="cambioClaveGestor">
        <h3 style="color:rgb(224, 23, 50, 1);font-size:20px;margin-top:18px;">CAMBIO DE CONTRASEÑA</h3>
        <p style="font-size:18px;color:rgb(0,0,0,0.7);">ES LA PRIMERA VEZ QUE USA EL PROGRAMA<br>DEBE CAMBIAR SU CONTRASEÑA</p>
    <form id="cambioContrasena" name="cambioContrasena" class="linea" action="autorizados.php" method="get">
      <input type="hidden" id="pasos" name="pasos" value="200"/>
      <input type="hidden" id="gestor" name="gestor" value="<?php echo $gestor; ?>"/>
          <table style="width:100%;">
            <tr>
              <td style="width:40%;text-align:right;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin-left:160px;">NUEVA&nbsp&nbspCONTRASEÑA:&nbsp&nbsp&nbsp&nbsp</td>
              <td style="width:60%;text-align:left;">&nbsp&nbsp<input type="text" id="claveNueva" name="claveNueva" class="clave" maxlength="14" style="width:82%;border:1px solid rgba(0,0,0,1);" onkeypress="return caracteresPermitidos(event)"/></td>
            </tr>
            <tr>
              <td style="width:40%;text-align:right;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin-left:70px;">REPETIR&nbsp&nbspCONTRASEÑA:&nbsp&nbsp</td>
              <td style="width:60%;text-align:left;">&nbsp&nbsp<input type="text" id="claveNuevaRepetida" name="claveNuevaRepetida" class="clave" maxlength="14" style="width:82%;border:1px solid rgba(0,0,0,1);" onkeypress="return caracteresPermitidos(event)"/></td>
            </tr>
            <tr>
              <td style="width:40%;font-size:4px;"><br></td>
              <td style="width:60%;font-size:4px;"><p style="font-size:11px;text-align:left;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin:0px;padding:0px;margin-top:-2px;margin-left:10px;">
                  Use mayúsculas, minúsculas y números.<br>Mínimo 8 y máximo 14 caracteres.</p>
              </td>
            </tr>
            <tr>
              <td colspan="2"><br>
                <input type="button" class="boton" style="width:48%;height:26px;" onclick="return validarClavesGestor()" value="CAMBIAR CONTRASEÑA"/>
              </td>
            </tr>
          </table>
    </form>
      </div><!-- FIN div cambioClave -->
    </div><!-- FIN div fondoCambioClave -->
  <?php
  }else{
// 2.2) SI NO ES PRIMER USO SE VALIDA QUE LA CONTRASEÑA SEA CORRECTA ----------------------------------------------------------------------------
if(in_array(@$registroGestor[1], $IDpermitidos)&@$registroGestor[6]<>$contrasena){
?>
<div id="avisoErrorValidacion" name="avisoErrorValidacion" class="oscurecerContenedor">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAvisoAutorizados">
    <div class="tituloAviso">INFORMACION IMPORTANTE</div>
    <div class="mensajeAviso">LA CONTRASEÑA NO ES VALIDA</div>
      <a href="javascript:cerrarAvisoValidacion();">ACEPTAR</a>
  </div><!-- FINAL mostrarAvisoError -->
</div><!-- FINAL mostrarAviso -->
<?php
}else{
// 3) SE EVALUA LA FECHA DE VALIDEZ DEL GESTOR, PONIENDO SI ESTA CADUCADO O EN VIGOR -------------------------------------------------------------
// 1) Operamos con la fecha UTC de hoy
  @$utc=time();
  @$utc=date("d/m/Y", $utc);
//@$utc='10/10/2024'; // AQUI SE PUEDE CAMBIAR UTC PARA COMPROBAR EL FUNCIONAMIENTO DE LA VALIZACION
  @$fechaUTC=explode('/', $utc);
  @$diaUTC=$fechaUTC[0];@$mesUTC=$fechaUTC[1];@$anioUTC=intval($fechaUTC[2]);
    if($diaUTC[0]=='0'){$diaUTC=$diaUTC[1];}else{$diaUTC=$diaUTC;intval($diaUTC);};
    if($mesUTC[0]=='0'){$mesUTC=$mesUTC[1];}else{$mesUTC=$mesUTC;intval($mesUTC);};
// 2) Operamos la fecha de validez "$registroGestor[11]"
  @$fechaValidez=explode('/', $registroGestor[11]);
  @$diaValidez=$fechaValidez[0];@$mesValidez=$fechaValidez[1];@$anioValidez=intval($fechaValidez[2]);
    if($diaValidez[0]=='0'){$diaValidez=$diaValidez[1];}else{$diaValidez=$diaValidez;intval($diaValidez);};
    if($mesValidez[0]=='0'){$mesValidez=$mesValidez[1];}else{$mesValidez=$mesValidez;intval($mesValidez);};
// 3) Se comparan fechas y se pone: "Usuario no válido - caducado"
    if($anioUTC>$anioValidez){$caducado='si';}
      else{if($anioUTC==$anioValidez & $mesUTC>$mesValidez){$caducado='si';}
        else{if($anioUTC>=$anioValidez & $mesUTC==$mesValidez & $diaUTC>$diaValidez){$caducado='si';}else{$caducado='no';};};};
if($caducado=='si'){
?>
<div id="avisoErrorValidacion" name="avisoErrorValidacion" class="oscurecerContenedor">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAvisoAutorizados" style="">
  <div class="tituloAviso">INFORMACION IMPORTANTE</div>
  <div class="mensajeAviso">GESTOR NO VALIDO POR CADUCIDAD<br>PONGASE EN CONTACTO CON LA DIRECCION DE SEGURIDAD</div>
      <a href="javascript:cerrarAvisoValidacion();">ACEPTAR</a>
  </div><!-- FINAL mostrarAvisoError -->
</div><!-- FINAL mostrarAviso -->
<?php
}else{
// -----------------------------------------------------------------------------------------------------------------------------------------------
// TERCERO: SI EL GESTOR Y CONTRASEÑA SON CORRECTOS SE CREAN LAS VARIABLES DE SESION Y SE MUESTRA MENSAJE DE IDENTIFICACION CORRECTA
// -----------------------------------------------------------------------------------------------------------------------------------------------
  @$UTCsesion = $_SESSION['UTCsesion'] = time();
  @$IDgestor = $_SESSION['IDgestor'] = $registroGestor[1];
  @$codigoGestor = $_SESSION['codigoGestor']= $registroGestor[1].'-'.$UTCsesion;
  @$nombreGestor = $_SESSION['nombreGestor'] = $registroGestor[3];
  @$apellidosGestor = $_SESSION['apellidosGestor'] = $registroGestor[4];
  @$nominaGestor = $_SESSION['nominaGestor'] = $registroGestor[2];
  @$telefonoGestor= $_SESSION['telefonoGestor'] = $registroGestor[7];
  @$correoGestor = $_SESSION['correoGestor'] = $registroGestor[9];
  identificacionGestorOK();
;};};};} // Se cierran los else intermedios
;}; // Final de condicion comprobarGestor
mysqli_close($conexion_db); // Se cierra conexion
}; //  Final función de logeo gestor
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// TERCERA FUNCION: CAMBIO DE CONTRASEÑA
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function cambiarContrasena(){require('02-albacon-php/03-variables-autorizados.php');
// 1) SE REALIZA LA CONEXION CON LA BD Y LA CONSULTA --------------------------------------------------------------------------------------------
$conexion_db;
$baseDatos;
$sql="SELECT * FROM seguridad WHERE USUARIO='$gestor'";
$result=mysqli_query($conexion_db,$sql);
$registroGestor=mysqli_fetch_array($result);
$sql="UPDATE seguridad SET CLAVE='$claveNueva' WHERE NOMINA='$registroGestor[2]' ";
$result=mysqli_query($conexion_db,$sql);
mysqli_close($conexion_db); // Se cierra conexion
}; // Final funcion cambiar contraseña
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// CUARTA FUNCION: CAMBIO DE CONTRASEÑA POR OLVIDO
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function cambiarContrasenaOlvido(){require('02-albacon-php/03-variables-autorizados.php');
$conexion_db;
$baseDatos;
$sql="UPDATE seguridad SET CLAVE='$claveNueva' WHERE VIGILANTE='$nickGestor' ";
$result=mysqli_query($conexion_db,$sql);
mysqli_close($conexion_db); // Se cierra conexion
}; // Final funcion cambiar contraseña por olvido
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// QUINTA FUNCION: MOSTRAR PANTALLA RESTABLECER CONTRASEÑA DEL GESTOR
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mostrarRestablecerContrasena(){require('02-albacon-php/03-variables-autorizados.php');?>
  <div id="fondoRestablecerContrasena" name="fondoRestablecerContrasena" class="oscurecerContenedor">
    <div id="restablecimientoContrasena" name="restablecimientoContrasena" class="cambioClaveGestor" style="width:28%;left:36%">
        <h3 style="color:rgba(224, 23, 50, 1);font-size:18px;margin-top:18px;">RESTABLECER CONTRASEÑA</h3>
        <p style="font-size:16px;color:rgba(0,0,0,0.8);">INDIQUE LOS SIGUIENTES DATOS</p>
    <form id="restablecerContrasena" name="restablecerContrasena" class="linea" action="autorizados.php" method="get">
      <input type="hidden" id="pasos" name="pasos" value="202"/>
        <table style="width:100%;">
          <tr>
            <td style="width:28%;text-align:right;color:rgb(0, 0, 0, 0.45);font-weight:bold;;">GESTOR:</td>
            <td style="width:72%;text-align:left;">&nbsp&nbsp<input type="text" id="nickGestor" name="nickGestor" maxlength="25" class="clave" style="width:82%;border:1px solid rgba(0,0,0,0.3);" onkeypress="return caracteresPermitidos(event)" onblur="return limpiaNueve()"/></td>
          </tr>
          <tr>
            <td style="width:28%;text-align:right;color:rgb(0, 0, 0, 0.45);font-weight:bold;">Nº NOMINA:</td>
            <td style="width:72%;text-align:left;">&nbsp&nbsp<input type="text" id="numeroNominaGestor" name="numeroNominaGestor" class="clave" maxlength="10" style="width:82%;border:1px solid rgba(0,0,0,0.3);" onkeypress="return caracteresPermitidos(event)" onblur=""/></td>
          </tr>
        </table>
        <br>
        <table style="width:100%;">
          <tr>
            <td style="width:50%;text-align:right;">
              <button class="boton" style="width:100px;height:26px;" onclick="return validarDatosGestor()">ENVIAR</button>
            </td>
    </form>
    <form action="autorizados.php" method="get"> 
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
// SEXTA FUNCION: VALIDAR DATOS DEL GESTOR POR OLVIDO CONTRASEÑA
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function validarDatosGestor(){require('02-albacon-php/03-variables-autorizados.php');
$conexion_db;
$baseDatos;
$sql="SELECT * FROM seguridad WHERE VIGILANTE='$nickGestor' ";
$result=mysqli_query($conexion_db,$sql);
$registroNickGestor=mysqli_fetch_array($result);
// 1) SE COMPRUEBA QUE EL USUARIO EXISTA
if(@utf8_encode($registroNickGestor[5])<>$nickGestor){?>
    <div id="avisoErrorValidacionGestor" name="avisoErrorValidacionGestor" class="oscurecerContenedor">
      <div id="mostrarAviso" name="mostrarAviso" class="mostrarAvisoAutorizados">
        <div class="tituloAviso">INFORMACION IMPORTANTE</div>
        <div class="mensajeAviso">DEBE INDICAR UN USUARIO VALIDO</div>
          <a href="autorizados.php?pasos=201" class="boton">ACEPTAR</a>
      </div><!-- FINAL mostrarAvisoError -->
    </div><!-- FINAL mostrarAviso -->
<?php
}else{
// 2) SE COMPRUEBA QUE EL NUMERO DE NOMINA SEA CORRECTO
if(@utf8_encode($registroNickGestor[2])<>$numeroNominaGestor){?>
    <div id="avisoErrorValidacion" name="avisoErrorValidacion" class="oscurecerContenedor">
      <div id="mostrarAviso" name="mostrarAviso" class="mostrarAvisoAutorizados">
        <div class="tituloAviso">INFORMACION IMPORTANTE</div>
        <div class="mensajeAviso">EL NUMERO DE NOMINA NO COINCIDE</div>
          <a href="autorizados.php?pasos=201" class="boton">ACEPTAR</a>
      </div><!-- FINAL mostrarAvisoError -->
    </div><!-- FINAL mostrarAviso -->
<?php
}else{
// 3) SE COMPRUEBA SI EL USUARIO ESTA O NO CADUCADO
// 1)Se operamos con la fecha UTC de hoy para ver si es un usuario caducado
@$utc=time();
@$utc=date("d/m/Y", $utc);
//@$utc='10/10/2024'; // AQUI SE PUEDE CAMBIAR UTC PARA COMPROBAR EL FUNCIONAMIENTO DE LA VALIZACION
@$fechaUTC=explode('/', $utc);
@$diaUTC=$fechaUTC[0];@$mesUTC=$fechaUTC[1];@$anioUTC=intval($fechaUTC[2]);
  if($diaUTC[0]=='0'){$diaUTC=$diaUTC[1];}else{$diaUTC=$diaUTC;intval($diaUTC);};
  if($mesUTC[0]=='0'){$mesUTC=$mesUTC[1];}else{$mesUTC=$mesUTC;intval($mesUTC);};
// 2) Operamos la fecha de validez "$registroNickGestor[11]"
@$fechaValidez=explode('/', $registroNickGestor[11]);
@$diaValidez=$fechaValidez[0];@$mesValidez=$fechaValidez[1];@$anioValidez=intval($fechaValidez[2]);
  if($diaValidez[0]=='0'){$diaValidez=$diaValidez[1];}else{$diaValidez=$diaValidez;intval($diaValidez);};
  if($mesValidez[0]=='0'){$mesValidez=$mesValidez[1];}else{$mesValidez=$mesValidez;intval($mesValidez);};
// 3) Se comparan fechas y se pone: "Usuario no válido - caducado"
  if($anioUTC>$anioValidez){$caducado='si';}
    else{if($anioUTC==$anioValidez & $mesUTC>$mesValidez){$caducado='si';}
      else{if($anioUTC>=$anioValidez & $mesUTC==$mesValidez & $diaUTC>$diaValidez){$caducado='si';}else{$caducado='no';};};};
if($caducado=='si'){?>
  <div id="avisoErrorValidacion" name="avisoErrorValidacion" class="oscurecerContenedor">
    <div id="mostrarAviso" name="mostrarAviso" class="mostrarAvisoAutorizados">
      <?php //echo 'caducado: '.$caducado; ?>
      <div class="tituloAviso">INFORMACION IMPORTANTE</div>
      <div class="mensajeAviso">EL USUARIO NO ES VALIDO POR CADUCIDAD<br>PONGASE EN CONTACTO CON LA DIRECCION DE SEGURIDAD</div>        
        <a href="autorizados.php?pasos=201" class="boton">ACEPTAR</a>
  </div><!-- FINAL mostrarAvisoError -->
</div><!-- FINAL mostrarAviso -->
<?php

//  3.2) Se comprueba que ya haya usado el programa alguna vez
}else{
// SE EVALUA QUE HAYA USADO ALGUNA VEZ EL PROGRAMA
if($registroNickGestor[6]<>'null'){?>
  <div id="fondoCambioClave" name="fondoCambioClave" class="oscurecerContenedor">
    <div id="cambioClave" name="cambioClave" class="cambioClaveGestor" style="height:auto;padding-bottom:10px;">
      <h3 style="color:rgb(224, 23, 50, 1);font-size:18px;margin-top:20px;">ACTUALIZAR CONTRASEÑA</h3>
  <form id="cambioContrasena" name="cambioContrasena" class="linea" action="autorizados.php" method="get">
    <input type="hidden" id="pasos" name="pasos" value="203"/>
    <input type="hidden" id="nickGestor" name="nickGestor" value="<?php echo $nickGestor; ?>"/>
      <table style="width:100%;margin-top:20px;">
        <tr>
          <td style="width:40%;text-align:right;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin-left:160px;">NUEVA&nbsp&nbspCONTRASEÑA:&nbsp&nbsp&nbsp&nbsp</td>
          <td style="width:60%;text-align:left;">&nbsp&nbsp<input type="text" id="claveNueva" name="claveNueva" class="clave" maxlength="14" style="width:82%;border:1px solid rgb(0,0,0,0.3);" onkeypress="return caracteresPermitidos(event)"/></td>
        </tr>
        <tr>
          <td style="width:40%;text-align:right;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin-left:70px;">REPETIR&nbsp&nbspCONTRASEÑA:&nbsp&nbsp</td>
          <td style="width:60%;text-align:left;">&nbsp&nbsp<input type="text" id="claveNuevaRepetida" name="claveNuevaRepetida" class="clave" maxlength="14" style="width:82%;border:1px solid rgb(0,0,0,0.3);" onkeypress="return caracteresPermitidos(event)"/></td>
        </tr>
        <tr>
          <td style="width:40%;font-size:4px;"><br></td>
          <td style="width:60%;font-size:4px;"><p style="font-size:11px;text-align:left;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin:0px;padding:0px;margin-top:-2px;margin-left:10px;">
              Use mayúsculas, minúsculas y números.<br>Mínimo 8 y máximo 14 caracteres.</p>
          </td>
        </tr>
        <tr>
          <td colspan="2"><br>
            <input type="button" class="boton" style="width:120px;height:26px;" onclick="return validarClavesGestor()" value="ACTUALIZAR"/> 
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
    <div id="cambioClave" name="cambioClave" class="cambioClaveGestor">
      <h3 style="color:rgb(224, 23, 50, 1);font-size:20px;margin-top:18px;">CAMBIO DE CONTRASEÑA</h3>
      <p style="font-size:18px;color:rgb(0,0,0,0.7);">ES LA PRIMERA VEZ QUE USA EL PROGRAMA<br>DEBE CAMBIAR SU CONTRASEÑA</p>
  <form id="cambioContrasena" name="cambioContrasena" class="linea" action="autorizados.php" method="get">
    <input type="hidden" id="pasos" name="pasos" value="203"/>
    <input type="hidden" id="nickGestor" name="nickGestor" value="<?php echo $nickGestor; ?>"/>
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
            <input type="button" class="boton" style="width:48%;height:26px;" onclick="return validarClavesGestor()" value="CAMBIAR CONTRASEÑA"/>
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
function formularioPrevio(){require('02-albacon-php/03-variables-autorizados.php');?>
<div class="oscurecerContenedor">
<div class="formularioPrevio" style="background-image:url('fotos-archivos/Iberia/Logo-Gris-Autorizados.png');">
  <br>
  <h2 style="color:rgb(224, 23, 50);height:40px;"><strong>INDIQUE LOS SIGUIENTES DATOS</strong></h2>
    <form id="datosPrevios" name="datosPrevios" action="autorizados.php" method="get" class="linea">
      <table style="width:100%;border:none">
        <tr style="height:36px;">
          <td style="text-align:left;padding-left:20px;color:rgb(224, 23, 50, 1);background-color:rgb(255,255,255,0);width:42%;border:none">
            <h4 style="font-size:15px;margin:0px;padding:0px;">Nº DE REGISTROS:</h4>
          </td>
          <td style="text-align:left;background-color:rgb(255,255,255,0);width:58%;border:none;height:36px;">
            <input type="text" id="numRegistros" name="numRegistros" maxlength="3" style="width:10%;outline-color:rgb(180,230,240,1);margin-left:-20px;outline:none;">
          </td>
        <tr style="height:36px;">
          <td colspan="2" style="background-color:rgb(255,255,255,0);text-align:left;padding-left:20px;color:rgb(224, 23, 50, 1);border:none">
            <h4 style="font-size:14px;margin:0px;padding:0px;">MODO ENTRADA DATOS:</h4>
          </td>
        </tr>
            <tr>
              <td colspan="2" style="color:rgb(0,0,0,0.5);background-color:rgb(255,255,255,0);text-align:left;padding-left:30px;border:none">
                <strong>* De modo INDIVIDUAL</strong><input type="radio" id="entradaDatos" name="entradaDatos" value="manual"><strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp* Pegando desde EXCEL</strong><input type="radio" id="entradaDatos" name="entradaDatos" value="excel">
              </td>
        </tr>
        <tr style="height:34px;">
        <td colspan="2" style="background-color:rgb(255,255,255,0);text-align:left;padding-left:20px;color:rgb(224, 23, 50);border:none">
          <h4 style="font-size:14px;margin:0px;padding:0px;">RESPONSABLE DE LA AUTORIZACION:</h4>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="color:rgb(0,0,0,0.5);background-color:rgb(255,255,255,0);text-align:left;padding-left:30px;height:20px;border:none">
          <strong>* IGUAL al gestor del registro:</strong>
          <label><input type="checkbox" id="igualGestor" name="igualGestor" onclick="return apagarDatoGestor()" value="si"></label>
        </td>
      </tr>
      <tr style="height:34px;">
        <td colspan="2" style="background-color:rgb(255,255,255,0);text-align:left;padding-left:48px;padding-top:2%;border:none">
          <label id="nombreRespons" name="nombreRespons" class="labelEncendido">NOMBRE:</label>
          <input type="text" id="nombreResponsableAutorizacion" name="nombreResponsableAutorizacion" class="inputEncendido" style="margin-left:25px;width:66%;outline:none;"/>
        </td>
      </tr>
      <tr style="height:34px;">
        <td colspan="2" style="background-color:rgb(255,255,255,0);text-align:left;padding-left:48px;border:none">
          <label id="apellidosRespons" name="apellidosRespons" class="labelEncendido">APELLIDOS:&nbsp&nbsp&nbsp</label>
          <input type="text" id="apellidosResponsableAutorizacion" name="apellidosResponsableAutorizacion" class="inputEncendido" style="margin-left:9px;width:66%;outline:none;"/>
        </td>
      </tr>
      </table>
      <br>
      <table style="width:100%;">
        <tr>
          <td style="background-color: rgb(255,255,255,0);text-align:right;height:55px;border:none">
            <!--<input type="hidden" id="editarfila" name="editarfila" value="0"/>-->
            <input type="hidden" id="comprobarResponsable" name="comprobarResponsable" value="0"/>
            <input type="hidden" id="pasos" name="pasos" value="5"/>
            <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
            <!--<input type="hidden" id="procesar" name="procesar" value="0"/>    BORRAR SI NO LA PIDE EL PROGRAMA PORQUE NO SE USA -->
            <input type="button" id="continuarPrevios" class="boton" style="width:114px;" value="CONTINUAR" onclick="validarDatosPrevios()"/>
    </form>
          </td>
          <td style="background-color: rgb(255,255,255,0);text-align:left;height:55px;border:none">
    <form action="autorizados.php" method="get" class="linea">
            <input type="hidden" id="pasos" name="pasos" value="1"/>
            <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
            <input type="submit" class="boton" style="width:114px;" value="CANCELAR">     
    </form>
          </td>
        </tr>
      </table>
</div> <!-- Final de div contiene formulario previo -->
</div>
<!-- comienzo div para los avisos de error de primeros datos -->
<div id="avisoDatosPrevios" name="avisoDatosPrevios" class="oscurecerContenedor" style="display:none;">
<div id="mostrarAviso" name="mostrarAviso" class="mostrarAvisoAutorizados">
    <div id="tituloAviso" class="tituloAviso"></div>
    <div id="mensajeAviso" class="mensajeAviso"></div>
      <a href="javascript:cerrarAvisoDatosPrevios();">ACEPTAR</a>
  </div><!-- FINAL mostrarAvisoError -->
</div><!-- FINAL mostrarAviso -->
<?php
}; // FINAL FUNCION DE PRIMEROS DATOS
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// OCTAVA FUNCION: INCLUIR EL CODIGO DEL GESTOR EN LA BASE DE DATOS DE "SOLICITANTES" AL PASAR EL FORMULARIO DE DATOS PREVIOS
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// Se crea esta funcion para tener una referencia WHERE para luego incluir los datos del registro
function procesarCodigoGestor(){require('02-albacon-php/03-variables-autorizados.php');
$conexion_db;
$baseDatos;
$sql="SELECT REGISTRO_CODIGO FROM solicitantes WHERE CODIGO ='$codigoGestor' ";
$result=mysqli_query($conexion_db,$sql);
$registroCodigo = mysqli_num_rows($result);
//  CUARTO: SE INSERTAN LOS DATOS EN LA BASE solicitantes CONDICIONADO A SI $registroCodigo=0, ES DECIR NO HAY REGISTROS PARA ESA VARIABLE $codigoGestor
if($registroCodigo <= 0){
$sql = "SELECT max(ID) FROM solicitantes" ;
$result = mysqli_query($conexion_db,$sql);
$IDmaxima = mysqli_fetch_array($result);
//echo $IDmaxima[0];

$u = $IDmaxima[0]+1;
for($i=$u;$i<=($u+$numRegistros-1);$i++){$num=($i-$IDmaxima[0]);
$sql01 = "INSERT INTO solicitantes (NUM,ID,CODIGO,REGISTRO_CODIGO) VALUES ('$num','$i','$codigoGestor','SI')";
$result01 = mysqli_query($conexion_db,$sql01);
;} // Final de FOR para incluir el codigo que se usa para where
mysqli_close($conexion_db);
}; // FINAL DE LA CONDICION "REGISTRADO"
}; // FINAL DE FUNCION PROCESAR CODIGO GESTOR
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// NOVENA FUNCION: BORRAR LA FILA DONDE COINCIDE EL CODIGO DEL GESTOR SI SE PRODUCE CANCELACION DE LA AUTORIZACION (MANUAL Y EXCEL)
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function borrarCodigoGestor(){require('02-albacon-php/03-variables-autorizados.php');
$conexion_db;
$baseDatos;
  $sql="DELETE FROM solicitantes WHERE CODIGO = '$codigoGestor' ";
  $result=mysqli_query($conexion_db,$sql);
  mysqli_close($conexion_db);
;}; // FINAL DE LA FUNCION BORRAR CODIGO GESTOR
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// DECIMA FUNCION: VALIDAR RESPONSABLE DE LA AUTORIZACION
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function validarResponsableAutorizacion(){require('02-albacon-php/03-variables-autorizados.php');
// PRIMERO: FORMATEMOS LOS CAMPOS INPUT DE NOMBRE Y APELLIDOS DEL RESPONSABLE DE LA AUTORIZACION
  @$nombreResponsableAutorizacion =strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
    array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
    array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['nombreResponsableAutorizacion']))))));
  @$apellidosResponsableAutorizacion = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
    array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
    array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['apellidosResponsableAutorizacion']))))));
// SEGUNDO: SE ESTABLECE LA CONEXION Y SE REALIZA LA CONSULTA
    $conexion_db;
    $baseDatos;
    $sql = "SELECT * FROM solicitantes WHERE NOMBRE LIKE '%$nombreResponsableAutorizacion%' OR APELLIDOS LIKE '%$apellidosResponsableAutorizacion%'";
    $result=mysqli_query($conexion_db,$sql);
    $num = mysqli_num_rows($result);
// TERCERO SE VALIDA SI EXISTE ESE RESPONSABLE ($num=0)
if($num==0){?>
  <div id="fondoMostrarResponsableAutorizacion" name="fondoMostrarResponsableAutorizacion" class="oscurecerContenedor">
    <div id="mostrarResponsableAutorizacion" name="mostrarResponsableAutorizacion" class="mostrarAvisoAutorizados" style="">
      <div id="tituloAviso" class="tituloAviso">AVISO IMPORTANTE</div>
      <div id="mensajeAviso" class="mensajeAviso">NO HAY COINCIDENCIA PARA EL RESPONSABLE INDICADO</div>
    <form action="autorizados.php" method="get">
        <input type="hidden" id="comprobarResponsable" name="comprobarResponsable" value="1"/>
        <input type="hidden" id="pasos" name="pasos" value="2"/>
        <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
 
        <input type="hidden" id="numRegistros" name="numRegistros" value="<?php echo $numRegistros; ?>"/>
        <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>
          
        <input type="hidden" id="IDresponsableAutorizacion" name="IDresponsableAutorizacion" value="<?php echo @$registroResponsable[1]; ?>"/>
        <input type="hidden" id="nombreResponsableAutorizacion" name="nombreResponsableAutorizacion" value="<?php echo @$registroResponsable[3]; ?>"/>
        <input type="hidden" id="apellidosResponsableAutorizacion" name="apellidosResponsableAutorizacion" value="<?php echo @$registroResponsable[4]; ?>"/>
        <input type="hidden" id="nominaResponsableAutorizacion" name="nominaResponsableAutorizacion" value="<?php echo @$registroResponsable[6]; ?>"/>
        <input type="hidden" id="telefonoResponsableAutorizacion" name="telefonoResponsableAutorizacion" value="<?php echo @$registroResponsable[12]; ?>"/>
        <input type="hidden" id="correoResponsableAutorizacion" name="correoResponsableAutorizacion" value="<?php echo @$registroResponsable[14]; ?>"/>
        <input type="submit" class="boton" value="CANCELAR" style="margin-top:5px;width:112px;">
      </form>

    </div><!-- Final div lista de Responsables de autorizacion -->
  </div><!-- Final de div para oscurecer contenido -->
<?php
// style="box-shadow: 5px 5px 16px rgba(167, 167, 168, 0.9);
}else{
//CUARTO: SE MUESTRAN LOS RESULTADOS EN UNA TABLA REALIZADA CON UN BUCLE WHILE SIEMPRE QUE HAYA MAS DE UN RESULTADO ($num>1)
?>
<div id="fondoMostrarResponsableAutorizacion" name="fondoMostrarResponsableAutorizacion" class="oscurecerContenedor">
  <div id="mostrarResponsableAutorizacion" name="mostrarResponsableAutorizacion" class="mostrarResponsableAutorizacion">
    <p style="font-size:18px;font-weight:bold;">SELECCIONAR RESPONSABLE DE LA AUTORIZACION</p>
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
      <form action="autorizados.php" method="get">
<?php
    if($caducado=='si'){echo '
          <input type="hidden" id="comprobarResponsable" name="comprobarResponsable" value="1"/>
          <input type="hidden" id="pasos" name="pasos" value="5"/>
          <input type="hidden" id="accion" name="accion" value="'.$accion.'"/>
          <input type="hidden" id="numRegistros" name="numRegistros" value="'.$numRegistros.'"/>
          <input type="hidden" id="entradaDatos" name="entradaDatos" value="'.$entradaDatos.'"/>
          <input type="hidden" id="caducado" name="caducado" value="si"/>
          <input type="submit" class="boton-2" value="CADUCADO">
          ';}
    elseif($caducado=='no'){echo '
          <input type="hidden" id="comprobarResponsable" name="comprobarResponsable" value="1"/>
          <input type="hidden" id="pasos" name="pasos" value="5"/>
          <input type="hidden" id="accion" name="accion" value="'.$accion.'"/>
          <input type="hidden" id="numRegistros" name="numRegistros" value="'.$numRegistros.'"/>
          <input type="hidden" id="entradaDatos" name="entradaDatos" value="'.$entradaDatos.'"/>
  
          <input type="hidden" id="IDresponsableAutorizacion" name="IDresponsableAutorizacion" value="'.$registroResponsable[1].'"/>
          <input type="hidden" id="nombreResponsableAutorizacion" name="nombreResponsableAutorizacion" value="'.$registroResponsable[3].'"/>
          <input type="hidden" id="apellidosResponsableAutorizacion" name="apellidosResponsableAutorizacion" value="'.$registroResponsable[4].'"/>
          <input type="hidden" id="nominaResponsableAutorizacion" name="nominaResponsableAutorizacion" value="'.$registroResponsable[6].'"/>
          <input type="hidden" id="telefonoResponsableAutorizacion" name="telefonoResponsableAutorizacion" value="'.$registroResponsable[12].'"/>
          <input type="hidden" id="correoResponsableAutorizacion" name="correoResponsableAutorizacion" value="'.$registroResponsable[14].'"/>
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
      <td colspan=4 style="height:30px;auto; text-align: center;padding-top:5px;">
      <form action="autorizados.php" method="get">
        <input type="hidden" id="comprobarResponsable" name="comprobarResponsable" value="1"/>
        <input type="hidden" id="pasos" name="pasos" value="2"/>
        <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
  
        <input type="hidden" id="numRegistros" name="numRegistros" value="<?php echo $numRegistros; ?>"/>
        <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>
        
        <input type="hidden" id="IDresponsableAutorizacion" name="IDresponsableAutorizacion" value="<?php echo @$registroResponsable[1]; ?>"/>
        <input type="hidden" id="nombreResponsableAutorizacion" name="nombreResponsableAutorizacion" value="<?php echo @$registroResponsable[3]; ?>"/>
        <input type="hidden" id="apellidosResponsableAutorizacion" name="apellidosResponsableAutorizacion" value="<?php echo @$registroResponsable[4]; ?>"/>
        <input type="hidden" id="nominaResponsableAutorizacion" name="nominaResponsableAutorizacion" value="<?php echo @$registroResponsable[6]; ?>"/>
        <input type="hidden" id="telefonoResponsableAutorizacion" name="telefonoResponsableAutorizacion" value="<?php echo @$registroResponsable[12]; ?>"/>
        <input type="hidden" id="correoResponsableAutorizacion" name="correoResponsableAutorizacion" value="<?php echo @$registroResponsable[14]; ?>"/>
        <input type="submit" class="boton" style="width:100px;height:26px;" value="CANCELAR">
      </form>
      </td>
    </tr>
  </table>
</div><!-- Final div lista de Responsables de autorizacion -->
</div><!-- Final de div para oscurecer contenido -->
<?php
}; //Final de ELSE para mostrar mensaje de no coincidencia
}; // Final de la funcion Validar Responsable de la autorizacion
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// DECIMOPRIMERA FUNCION: AVISO DE ERROR POR CADUCIDAD RESPONSABLE DE LA AUTORIZACION
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function avisoResponsableAutorizacion(){require('02-albacon-php/03-variables-autorizados.php');
  ?>
<div id="fondoAvisoResponsableAutorizacion" name="fondoAvisoResponsableAutorizacion" class="oscurecerContenedor">
  <div id="mostrarAvisoResponsable" name="mostrarAvisoResponsable" class="mostrarAvisoAutorizados" style="text-align:center;top:28%;">
  <p style="font-size:19px;text-align:center;font-weight:bold;color:rgb(224, 23, 50, 1);">AVISO IMPORTANTE</p>
  <p style="font-size:17px;color:rgba(0,0,0,0.6);font-weight:normal;">EL RESPONSABLE INDICADO NO ES VALIDO POR CADUCIDAD<br>PONGASE EN CONTACTO CON DIRECCION DE SEGURIDAD</p>
<form action="autorizados.php" method="get">
        
        <!--<input type="hidden" id="editarfila" name="editarfila" value="0"/>-->
        <input type="hidden" id="comprobarResponsable" name="comprobarResponsable" value="1"/>
        <input type="hidden" id="pasos" name="pasos" value="2"/>
        <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>

        <input type="hidden" id="numRegistros" name="numRegistros" value="<?php echo $numRegistros; ?>"/>
        <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>

        <input type="hidden" id="IDresponsableAutorizacion" name="IDresponsableAutorizacion" value="<?php echo @$registroResponsable[1]; ?>"/>
        <input type="hidden" id="nombreResponsableAutorizacion" name="nombreResponsableAutorizacion" value="<?php echo @$registroResponsable[3]; ?>"/>
        <input type="hidden" id="apellidosResponsableAutorizacion" name="apellidosResponsableAutorizacion" value="<?php echo @$registroResponsable[4]; ?>"/>
        <input type="hidden" id="nominaResponsableAutorizacion" name="nominaResponsableAutorizacion" value="<?php echo @$registroResponsable[6]; ?>"/>
        <input type="hidden" id="telefonoResponsableAutorizacion" name="telefonoResponsableAutorizacion" value="<?php echo @$registroResponsable[12]; ?>"/>
        <input type="hidden" id="correoResponsableAutorizacion" name="correoResponsableAutorizacion" value="<?php echo @$registroResponsable[14]; ?>"/>

        <input type="submit" class="boton" style="width:100px;height:26px;" value="ACEPTAR">
      </form>
  </div><!-- Final div mostrar aviso caducidad responsable -->
</div><!-- Final de div para oscurecer contenido -->
<?php
;};
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// DECIMOSEGENDA FUNCION: MOSTRAR ENTRADA DE REGISTROS MANUAL DE DATOS DEL AUTORIZADO
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function autorizadosEntradaManual(){
// PRIMERO: LLAMAMOS A LAS VARIABLES NECESARIAS PARA LA FUNCION
require('02-albacon-php/03-variables-autorizados.php');
?>
<div id="entradaRegistrosManual" name="entradaRegistrosManual" class="entradaRegistrosManual"><br>
<?php
  echo '<h1 style="text-align:center;">REGISTRAR AUTORIZADOS</h1>';
if(@$pasos==5&$IDresponsableAutorizacion<>''){
  echo '<p style="font-size:15px;margin-top:-6px;margin-bottom:-8px;text-align:left;padding-left:10px;"><strong>GESTOR DEL REGISTRO:&nbsp&nbsp</strong>'.utf8_decode($nombreGestor).' '.utf8_decode($apellidosGestor).'</p>';
  echo '<p style="font-size:15px;margin-bottom:-8px;text-align:left;padding-left:10px;"><strong>RESPONSABLE DE LA AUTORIZACION:&nbsp&nbsp</strong>'.utf8_decode($nombreResponsableAutorizacion).' '.utf8_decode($apellidosResponsableAutorizacion).'</p>';
  echo '<p style="font-size:15px;margin-bottom:-8px;text-align:left;padding-left:10px;"><strong>Nº DE REGISTROS:&nbsp&nbsp</strong>'.$numRegistros.'</p>';
}else{
  echo '<p style="font-size:15px;margin-top:-6px;margin-bottom:-8px;text-align:left;padding-left:10px;"><strong>GESTOR DEL REGISTRO:&nbsp&nbsp</strong>'.utf8_decode($nombreGestor).' '.utf8_decode($apellidosGestor).'</p>';
  echo '<p style="font-size:15px;margin-bottom:-8px;text-align:left;padding-left:10px;"><strong>RESPONSABLE DE LA AUTORIZACION:';
  echo '<p style="font-size:15px;margin-bottom:-8px;text-align:left;padding-left:10px;"><strong>Nº DE REGISTROS:&nbsp&nbsp</strong>'.$numRegistros.'</p>';
};
// 1) SE MUESTRAN TANTAS FICHAS DE REGISTRO VACIAS COMO NUMERO DE REGISTROS INDICADOS
?>
<br>
<form id="manualText" name="manualText" action="autorizados.php" method="get">
<?php
for($i=1;$i<=$numRegistros;$i++){
?>
<div id="entradaManualRegistro" name="entradaManualRegistro" class="entradaManualRegistro" <?php if($numRegistros==1){echo 'style="margin-top:30px;" ';}else{echo 'style="margin-top:5px;" ';} ?> >

  <div class="numRegistro" style=""><p><?php echo 'Nº DE REGISTRO:&nbsp&nbsp'.$i;?></p></div>

  <div id="filaUnoEncabezadosManual" name="filaUnoEncabezadosManual" class="filaEncabezadoRegistro">
    <div class="manualEncabezadoRegistro" style="width:12%;"><P>Nº NOMINA</P></div>
    <div class="manualEncabezadoRegistro" style="width:22%;"><p>NOMBRE</P></div>
    <div class="manualEncabezadoRegistro" style="width:30%;"><p>APELLIDOS</p></div>
    <div class="manualEncabezadoRegistro" style="width:14%;"><p>EMPRESA</p></div>
    <div class="manualEncabezadoRegistro" style="width:18%;"><p>USUARIO</p></div>
  </div><!-- Final fila UNO encabezados personales -->

  <div id="filaUnoDatosManual" name="filaUnoDatosManual" class="filaDatosRegistro">
    <div class="manualDatoAutorizado" id="div-registroManualNomina" name="div-registroManualNomina" style="width:12%;">
      <input type="text" class="manualInputDatoAutorizado" maxlength="9" <?php echo 'id="registroNomina'.$i.'" name="registroNomina'.$i.'"';?> autocomplete="off">
    </div>
    <div class="manualDatoAutorizado" id="div-registroManualNombre" maxlength="20" name="div-registroManualNombre" style="width:22%;">
      <input type="text" class="manualInputDatoAutorizado" maxlength="20" <?php echo 'id="registroNombre'.$i.'" name="registroNombre'.$i.'"';?> autocomplete="off">
    </div>
    <div class="manualDatoAutorizado" id="div-registroManualApellidos" name="div-registroManualApellidos" style="width:30%;">
      <input type="text" class="manualInputDatoAutorizado" maxlength="40" <?php echo 'id="registroApellidos'.$i.'" name="registroApellidos'.$i.'"';?> autocomplete="off">
    </div>
    <div class="manualDatoAutorizado" id="div-registroManualEmpresa" maxlength="20" name="div-registroManualEmpresa" style="width:14%;">
      <input type="text" class="manualInputDatoAutorizado" <?php echo 'id="registroEmpresa'.$i.'" name="registroEmpresa'.$i.'"';?> autocomplete="off">
    </div>
    <div class="manualDatoAutorizado" id="div-registroManualUsuario" maxlength="26" name="div-registroManualUsuario" style="width:18%;">
      <input type="text" class="manualInputDatoAutorizado" <?php echo 'id="registroUsuario'.$i.'" name="registroUsuario'.$i.'"';?> autocomplete="off">
    </div>
  </div> <!-- Final DIV datos personales -->

  <div id="filaDosEncabezaDosManual" name="filaDosEncabezaDosManual" class="filaEncabezadoRegistro">
    <div class="manualEncabezadoRegistro" style="width:18%;"><p>DEPARTAMENTO</p></div>
    <div class="manualEncabezadoRegistro" style="width:30%;"><p>DIRECCION DE CONTACTO</div>
    <div class="manualEncabezadoRegistro" style="width:14%;"><p>TELEFONO</p></div>
    <div class="manualEncabezadoRegistro" style="width:8%;"><p>EXTENSION</p></div>
    <div class="manualEncabezadoRegistro" style="width:26%;"><p>CORREO</p></div>
  </div><!-- Final fila DOS encabezados de datos contacto -->

  <div id="filaDosDatosManual" name="filaDosDatosManual"  class="filaDatosRegistro">
    <div class="manualDatoAutorizado" id="div-registroManualDepartamento" name="div-registroManualDepartamento" style="width:18%;">
      <input type="text" class="manualInputDatoAutorizado" maxlength="40" <?php echo 'id="registroDepartamento'.$i.'" name="registroDepartamento'.$i.'"';?>autocomplete="off">
    </div>
    <div class="manualDatoAutorizado" id="div-registroManualDireccion" name="div-registroManualDireccion" style="width:30%;">
      <input type="text" class="manualInputDatoAutorizado" maxlength="50" <?php echo 'id="registroDireccion'.$i.'" name="registroDireccion'.$i.'"';?>autocomplete="off">
    </div>
    <div class="manualDatoAutorizado" id="div-registroManualTelefono" name="div-registroManualTelefono" style="width:14%;">
      <input type="text" class="manualInputDatoAutorizado" maxlength="9" style="width:98%;" <?php echo 'id="registroTelefono'.$i.'" name="registroTelefono'.$i.'"';?> autocomplete="off">
    </div>
    <div class="manualDatoAutorizado" id="div-registroManualExtension" name="div-registroManualExtension" style="width:8%;">
      <input type="text" class="manualInputDatoAutorizado" maxlength="6" style="width:96%;" <?php echo 'id="registroExtension'.$i.'" name="registroExtension'.$i.'"';?> autocomplete="off">
    </div>
    <div class="manualDatoAutorizado" id="div-registroManualCorreo" name="div-registroManualCorreo" style="width:26%;">
      <input type="text" class="manualInputDatoAutorizado" maxlength="40" <?php echo 'id="registroCorreo'.$i.'" name="registroCorreo'.$i.'"';?> autocomplete="off">
    </div>
  </div><!-- final fila DOS de datos contacto -->
</div> <!-- Final de DIV registro de autorizado -->

<?php
;}; // FINAL FOR PARA MOSTRAR REGISTRO A RELLENAR
?>
  </div> <!-- FINAL DE LA DIV PARA ENGLOBAR TABLA entradaManualDatos-->
  <table id="botonesMostrar" style="width:99%;">
    <tr><td colspan="2" style="height:4px;"></td></tr>
      <tr>
        <td style="text-align:right;">
          <input type="hidden" id="pasos" name="pasos" value="7"/>
          <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
          <input type="hidden" id="correoEnviado" name="correoEnviado" value="<?php $correoEnviado=$_SESSION['correoEnviado'] = 0; ?>"/>            
          <input type="hidden" id="comprobarResponsable" name="comprobarResponsable" value="<?php echo $comprobarResponsable;?>"/>
          <input type="hidden" id="cancelarSolicitud"name="cancelarSolicitud" value="NO"> 

          <input type="hidden" id="numRegistros" name="numRegistros" value="<?php echo $numRegistros; ?>"/>
          <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>
          <input type="hidden" id="IDresponsableAutorizacion" name="IDresponsableAutorizacion" value="<?php echo utf8_decode(@$IDresponsableAutorizacion); ?>"/>
          <input type="hidden" id="nombreResponsableAutorizacion" name="nombreResponsableAutorizacion" value="<?php echo utf8_decode(@$nombreResponsableAutorizacion); ?>"/>
          <input type="hidden" id="apellidosResponsableAutorizacion" name="apellidosResponsableAutorizacion" value="<?php echo utf8_decode(@$apellidosResponsableAutorizacion); ?>"/>
          <input type="hidden" id="nominaResponsableAutorizacion" name="nominaResponsableAutorizacion" value="<?php echo @$nominaResponsableAutorizacion; ?>"/>
          <input type="hidden" id="telefonoResponsableAutorizacion" name="telefonoResponsableAutorizacion" value="<?php echo @$telefonoResponsableAutorizacion; ?>"/>
          <input type="hidden" id="correoResponsableAutorizacion" name="correoResponsableAutorizacion" value="<?php echo utf8_decode(@$correoResponsableAutorizacion); ?>"/>

          <button class="boton" type="submit" style="width:100%;" onclick="return noEnviarManualAutorizadoVacio();return caracteresPermitidosManual(e);">CONTINUAR SOLICITUD</button>
  </form>
        </td>
        <td style="text-align:left;">
  <form id="" action="autorizados.php" method="get">
          <input type="hidden" id="pasos" name="pasos" value="2"/>
          <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
          <input type="hidden" id="comprobarResponsable" name="comprobarResponsable" value="<?php echo $comprobarResponsable;?>"/>
          
          <input type="hidden" id="numRegistros" name="numRegistros" value="<?php echo $numRegistros; ?>"/>
          <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>
          <input type="hidden" id="IDresponsableAutorizacion" name="IDresponsableAutorizacion" value="<?php echo utf8_decode(@$IDresponsableAutorizacion); ?>"/>
          <input type="hidden" id="nombreResponsableAutorizacion" name="nombreResponsableAutorizacion" value="<?php echo utf8_decode(@$nombreResponsableAutorizacion); ?>"/>
          <input type="hidden" id="apellidosResponsableAutorizacion" name="apellidosResponsableAutorizacion" value="<?php echo utf8_decode(@$apellidosResponsableAutorizacion); ?>"/>
          <input type="hidden" id="nominaResponsableAutorizacion" name="nominaResponsableAutorizacion" value="<?php echo @$nominaResponsableAutorizacion; ?>"/>
          <input type="hidden" id="telefonoResponsableAutorizacion" name="telefonoResponsableAutorizacion" value="<?php echo @$telefonoResponsableAutorizacion; ?>"/>
          <input type="hidden" id="correoResponsableAutorizacion" name="correoResponsableAutorizacion" value="<?php echo utf8_decode(@$correoResponsableAutorizacion); ?>"/>
         
          <button class="boton" style="width:100%;">CANCELAR SOLICITUD</button>
        </td>
      </tr>
    </table>
  </form>
  </div>
  <!-- div para mostrar error al mandar campos vacios -->
<div id="avisoManualAutorizadoVacio" name="avisoManualAutorizadoVacio" class="oscurecerContenedor" style="display:none;">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAvisoAutorizados">
    <div id="tituloAviso" class="tituloAviso">INFORMACION INCOMPLETA</div>
    <div id="mensajeAviso" class="mensajeAviso">DEBE RELLENAR TODOS LOS CAMPOS CORRECTAMENTE</div>
      <a href="javascript:cerrarAvisoManualAutorizadoVacio();">ACEPTAR</a>
  </div><!-- FINAL mostrarAvisoError -->
</div><!-- FINAL mostrarAviso -->
<?php
}; // SE CIERRA FUNCION ENTRADA MANUAL DE SOLICITUDES
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// DECIMOTERCERA FUNCION: PROCESAR ENTRADA DE DATOS MANUAL
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function autorizadosProcesarManual(){require('02-albacon-php/03-variables-autorizados.php');
//  PRIMERO SE FORMAN LOS ARRAY's CON LOS NOMBRES DE LOS "inputs" DE CADA CAMPO
    for($x=1;$x<=$numRegistros;$x++){$nominaText[]='registroNomina'.$x;}
    for($x=1;$x<=$numRegistros;$x++){$nombreText[]='registroNombre'.$x;}
    for($x=1;$x<=$numRegistros;$x++){$apellidosText[]=utf8_decode('registroApellidos'.$x);}
    for($x=1;$x<=$numRegistros;$x++){$empresaText[]='registroEmpresa'.$x;}
    for($x=1;$x<=$numRegistros;$x++){$usuarioText[]='registroUsuario'.$x;}
    for($x=1;$x<=$numRegistros;$x++){$departamentoText[]='registroDepartamento'.$x;}
    for($x=1;$x<=$numRegistros;$x++){$direccionText[]='registroDireccion'.$x;}
    for($x=1;$x<=$numRegistros;$x++){$telefonoText[]='registroTelefono'.$x;}
    for($x=1;$x<=$numRegistros;$x++){$extensionText[]='registroExtension'.$x;}
    for($x=1;$x<=$numRegistros;$x++){$correoText[]='registroCorreo'.$x;}
  
//  SEGUNDO: SE FORMAN LOS ARRAY's CON LOS DATOS DE CADA REGISTRO
//    2.1) ARRAY DATO NOMBRE
        for($x=0;$x<=$numRegistros-1;$x++){@$registroDatoNombre[] = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
          array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
          array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST[$nombreText[$x]]))))));};
//    2.2) ARRAY DATO APELLIDOS
        for($x=0;$x<=$numRegistros-1;$x++){@$registroDatoApellidos[] = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
          array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
          array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST[$apellidosText[$x]]))))));};
//    2.3) ARRAY DATO EMPRESA
        for($x=0;$x<=$numRegistros-1;$x++){@$registroDatoEmpresa[] = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
          array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
          array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST[$empresaText[$x]]))))));};
//    2.4) ARRAY DATO NOMINA
        for($x=0;$x<=$numRegistros-1;$x++){@$registroDatoNomina[] = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
          array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
          array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST[$nominaText[$x]]))))));};
//    2.5) ARRAY DATO USUARIO
        for($x=0;$x<=$numRegistros-1;$x++){@$registroDatoUsuario[] = strtolower(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
          array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
          array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST[$usuarioText[$x]]))))));};
//    2.6) CLAVE INICIAL (se añade una clave aleatoria inicial que servirá también para recuperar la contraseña si el usuario la olvida)
            for($x=0;$x<=$numRegistros-1;$x++){
              $key = "";
              $elementos = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
              $max = strlen($elementos)-1;
              for($i = 0; $i < 8; $i++){$key .= substr($elementos, mt_rand(0,$max), 1);};
              $clave[]=$key;
            };
            //echo '<br>contraseña: '.$clave.'<br>';
            //print_r($clave); 
//    2.7) CLAVE DE USUARIO
//          Se añade la contraseña que indique el usuario
//    2.8) ARRAY DATO DEPARTAMENTO
        for($x=0;$x<=$numRegistros-1;$x++){@$registroDatoDepartamento[] = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
          array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
          array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST[$departamentoText[$x]]))))));};
//    2.9) ARRAY DATO DIRECCION CONTACTO
        for($x=0;$x<=$numRegistros-1;$x++){@$registroDatoDireccion[] = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
          array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
          array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST[$direccionText[$x]]))))));};
//    2.10) ARRAY DATO TELEFONO
        for($x=0;$x<=$numRegistros-1;$x++){@$registroDatoTelefono[] = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
          array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
          array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST[$telefonoText[$x]]))))));};
//    2.11) ARRAY DATO EXTENSION
        for($x=0;$x<=$numRegistros-1;$x++){@$registroDatoExtension[] = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
          array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
          array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST[$extensionText[$x]]))))));};
//    2.12) ARRAY DATO CORREO
        for($x=0;$x<=$numRegistros-1;$x++){@$registroDatoCorreo[] = strtolower(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
          array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
          array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST[$correoText[$x]]))))));};
//    2.13) ID DEL GESTOR QUE REALIZA EL ALTA (INCLUIDO POR)
//      Se incluye el ID del GESTOR que realiza el ALTA "$IDgestor"
//    2.14) NOMINA del RESPONSABLE (RESPONSABLE_ALTA)
//      Se incluye el numero de NOMINA del responsable que solicita el ALTA "$nominaResponsableAutorizacion"
//    2.14) FECHA DE ALTA
//      Se incluye la fecha en que se realiza el registro, no se modificara en las actualizaciones
        @$fechaAlta = time();
        @$fechaAlta = date("d/m/Y", $fechaAlta);
//    2.15) FECHA DE RENOVACION (SE INCLUIRA EN LA FUNCION DE ACTUALIZACION DE DATOS)
//      Se incluye la fecha del dia en que se actualizan los datos, inicialmente es igual a la fecha de alta.
//      Servira para determinar la fecha de validez
        @$fechaRenovacion = time();
        @$fechaRenovacion = date("d/m/Y", $fechaRenovacion);
//    2.16) FECHA DE VALIDEZ (SE ACTUALIZARA SIEMPRE QUE SE ACTUALICEN LOS DATOS SE INCLUIRA EN LA FUNCION DE ACTUALIZACION DE DATOS)
//      Inicialmente se da una validez de 3 años (que son 94608000 segundos) (deberá decidirlo el cliente)
        @$fechaValidez = time() + 94608000;
        @$fechaValidez = date("d/m/Y", $fechaValidez);  
        //echo 'Fecha de validez: '.$fechaValidez;  
//    2.17) IDgestorBaja (ELIMINADO POR)
//    2.18) SE DA VALOR AL DATO RESPONSABLE QUE SOLICITA EL BAJA
//    2.19) FECHA DE BAJA
//    2.20) USOS
//      INICIALMENTE tiene valor 0, Y LUEGO SE SUMA UNO Y SE ACTUALIZA "update" cada vez que el solicitante realiza un accesos (envia el correo o inicia sesion)
//    2.21) REGISTRADO
//      Se da valor $registrado = 'SI', de forma que una vez rsealizado el registro no se actualice al refrescar o dar atrás en la página.

//  TERCERO: COMPROBAMOS SI EXISTE ALGUN REGISTRO PARA ESE "CODIGO" Y EVITAR ENTRADA DUPLICADA SI SE REFRESCA LA PAGINA O SI SE USAN FLECHAS ATRAS/ADELANTE
//  * Para ello hacemos una primera consulta en la que obtenemos la variable $registrado, que es la cantidad de registros con REGISTRADO = SI
$conexion_db;
$baseDatos;
$sql="SELECT REGISTRADO FROM solicitantes WHERE REGISTRADO ='SI' AND CODIGO ='$codigoGestor' ";
$result=mysqli_query($conexion_db,$sql);
$registrado = mysqli_num_rows($result);
    
$sql00="SELECT REGISTRADO FROM solicitantes WHERE REGISTRO_CODIGO ='SI' AND CODIGO ='$codigoGestor' ";
$result00=mysqli_query($conexion_db,$sql00);
$registroCodigo = mysqli_num_rows($result00);
//echo 'CANTIDAD DE REGISTROS: '.$registrado.'<br>';
//echo 'registrado: '.$registrado.'<br>registro_codigo:'.$registroCodigo;
    
if($registrado <= 0 & $registroCodigo >= 0 ){ //CONDICION PARA NO PERMITIR QUE SE ACTUALICEN DATOS AL REFRESCAR LA PAGINA (EN ESPECIAL LA CONTRASEÑA ALEATORIA)

//  CUARTO: SE INSERTAN LOS DATOS EN LA BASE solicitantes CONDICIONADO A SI $registrado=0, ES DECIR NO HAY REGISTROS PARA ESA VARIABLE $codigoGestor
//  SI $registrado = 0 PROCESAMOS REALIZANDO UN BUCLE FOR
  if($registrado <= 0){
  $sql = "SELECT max(ID) FROM solicitantes" ;
  $result = mysqli_query($conexion_db,$sql);
  $IDmaxima = mysqli_fetch_array($result);
  //echo $IDmaxima[0];
  $u = $IDmaxima[0]+1;
  $z=$u-$numRegistros;
  for($i=$z;$i<$u;$i++){$id=($i-$u+$numRegistros);
  
  $sql="UPDATE solicitantes SET NOMBRE='$registroDatoNombre[$id]',APELLIDOS='$registroDatoApellidos[$id]',EMPRESA='$registroDatoEmpresa[$id]',
  NOMINA='$registroDatoNomina[$id]',USUARIO='$registroDatoUsuario[$id]',CLAVE='$clave[$id]',DEPARTAMENTO='$registroDatoDepartamento[$id]',DIRECCION_CONTACTO='$registroDatoDireccion[$id]',
  TELEFONO='$registroDatoTelefono[$id]',EXTENSION='$registroDatoExtension[$id]',MAIL='$registroDatoCorreo[$id]',INCLUIDO_POR='$IDgestor',
  RESPONSABLE_ALTA='$nominaResponsableAutorizacion',FECHA_ALTA='$fechaAlta',FECHA_RENOVACION='$fechaAlta',FECHA_VALIDEZ='$fechaValidez',REGISTRADO='SI' WHERE ID = '$i' ";
  $result=mysqli_query($conexion_db,$sql);
;}  // Final del for
}else{}; // FINAL DE LA CONDICION DE REGISTRADO
}else{}; // FINAL DE LA CONDICION PARA NO ACTUALIZAR DATOS AL REFRESCAR PAGINA
  mysqli_close($conexion_db);
  mostrarCorreoAutorizados();
;}; //  FINALIZA FUNCION PARA PROCESAR LOS DATOS DE ENTRADA MANUAL

// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// DECIMOCUARTA FUNCION: MOSTRAR ENTRADA DE DATOS DESDE EXCEL
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function autorizadosEntradaExcel(){require('02-albacon-php/03-variables-autorizados.php');?>
<div id="mostrarEntradaExcel" name="mostrarEntradaExcel" class="oscurecerContenedor" style="">
  <div id="autorizadosEntradaExcel" name="autorizadosEntradaExcel" class="autorizadosEntradaExcel" style="background-image:url('fotos-archivos/Iberia/Logo-Gris-01.png');">
    <div id="autorizadosEntradaExcelUno" name="autorizadosEntradaExcelUno" style="">
<?php
echo '<h1 style="text-align:center;margin-top:12px;">IMPORTAR DATOS</h1>';
if(@$pasos==5&$IDresponsableAutorizacion<>''){
  echo '<p style="font-size:15px;margin-top:-6px;margin-bottom:-8px;text-align:left;padding-left:10px;"><strong>GESTOR DEL REGISTRO:&nbsp&nbsp</strong>'.utf8_decode($nombreGestor).' '.utf8_decode($apellidosGestor).'</p>';
  echo '<p style="font-size:15px;margin-bottom:-8px;text-align:left;padding-left:10px;"><strong>RESPONSABLE DE LA AUTORIZACION:&nbsp&nbsp</strong>'.utf8_decode($nombreResponsableAutorizacion).' '.utf8_decode($apellidosResponsableAutorizacion).'</p>';
  echo '<p style="font-size:15px;margin-bottom:-8px;text-align:left;padding-left:10px;"><strong>Nº DE REGISTROS:&nbsp&nbsp</strong>'.$numRegistros.'</p>';
}else{
  echo '<p style="font-size:15px;margin-top:-6px;margin-bottom:-8px;text-align:left;padding-left:10px;"><strong>GESTOR DEL REGISTRO:&nbsp&nbsp</strong>'.utf8_decode($nombreGestor).' '.utf8_decode($apellidosGestor).'</p>';
  echo '<p style="font-size:15px;margin-bottom:-8px;text-align:left;padding-left:10px;"><strong>RESPONSABLE DE LA AUTORIZACION:';
  echo '<p style="font-size:15px;margin-bottom:-8px;text-align:left;padding-left:10px;"><strong>Nº DE REGISTROS:&nbsp&nbsp</strong>'.$numRegistros.'</p>';
};
?>
    </div><!-- FINAL DE div entradaExcelUno -->
    <div id="autorizadosMostrarBotonesUno" name="autorizadosMostrarBotonesUno" class="autorizadosMostrarBotonesUno" style="margin-top:30px;">
      <button id="pegar" class="boton" style="width:190px;" onclick="pegarExcel();">IMPORTAR DE EXCEL</button>
      <label id="pegadoOK" name="pegadoOK" class="autorizadosPegadoOK" style="top:-6px;">LOS DATOS SE HAN IMPORTADO CORRECTAMENTE</label>
    </div><!-- FINAL DE div mostrarBotonesUno -->
    <div id="autorizadosEntradaExcelDos" name="autorizadosEntradaExcelDos" class="autorizadosEntradaExcelDos" style="">
      <form id="text" name="text" onsubmit="return validarAreaExcel();" action="autorizados.php" method="get">
        <textarea id="texto" name="texto" cols="9" row="40" class="autorizados-clip-text" wrap="off" autocomplete="off" style="" placeholder='&#10; PULSE "IMPORTAR" PARA PEGAR&#10; LOS DATOS COPIADOS EN EXCEL'></textarea><br>
        <input type="hidden" id="pasos" name="pasos" value="6"/>
        <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
        <input type="hidden" id="numRegistros" name="numRegistros" value="<?php echo $numRegistros;?>"/>
        <input type="hidden" id="comprobarResponsable" name="comprobarResponsable" value="<?php echo $comprobarResponsable;?>"/>
        <input type="hidden" id="correoEnviado" name="correoEnviado" value="<?php $correoEnviado=$_SESSION['correoEnviado'] = 0; ?>"/>
        <input type="hidden" id="cancelarSolicitud"name="cancelarSolicitud" value="NO"> 
          
        <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>
        <input type="hidden" id="IDresponsableAutorizacion" name="IDresponsableAutorizacion" value="<?php echo utf8_decode(@$IDresponsableAutorizacion); ?>"/>
        <input type="hidden" id="nombreResponsableAutorizacion" name="nombreResponsableAutorizacion" value="<?php echo utf8_decode(@$nombreResponsableAutorizacion); ?>"/>
        <input type="hidden" id="apellidosResponsableAutorizacion" name="apellidosResponsableAutorizacion" value="<?php echo utf8_decode(@$apellidosResponsableAutorizacion); ?>"/>
        <input type="hidden" id="nominaResponsableAutorizacion" name="nominaResponsableAutorizacion" value="<?php echo @$nominaResponsableAutorizacion; ?>"/>
        <input type="hidden" id="telefonoResponsableAutorizacion" name="telefonoResponsableAutorizacion" value="<?php echo @$telefonoResponsableAutorizacion; ?>"/>
        <input type="hidden" id="correoResponsableAutorizacion" name="correoResponsableAutorizacion" value="<?php echo utf8_decode(@$correoResponsableAutorizacion); ?>"/>

    </div><!-- Final div entradaExcelDos -->
    <div id="autorizadosMostrarBotonesDos" name="autorizadosMostrarBotonesDos" class="autorizadosMostrarBotonesDos" style="">
      <table id="botonesMostrar" style="width:100%;">
        <tr>
          <td style="text-align:right;"><button id="enviar" class="boton" style="width:190px;" onclick="caracteresPermitidos(e);">CONTINUAR REGISTRO</button></td>
    </form>
    <form id="cambiarSolicitud" name="cambiarSolicitud" action="autorizados.php" method="get">
          <input type="hidden" id="pasos" name="pasos" value="2"/>
          <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
          <input type="hidden" id="comprobarResponsable" name="comprobarResponsable" value="<?php echo $comprobarResponsable;?>"/>

          <input type="hidden" id="numRegistros" name="numRegistros" value="<?php echo $numRegistros; ?>"/>
          <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>
  
          <input type="hidden" id="IDresponsableAutorizacion" name="IDresponsableAutorizacion" value="<?php echo utf8_decode(@$IDresponsableAutorizacion); ?>"/>
          <input type="hidden" id="nombreResponsableAutorizacion" name="nombreResponsableAutorizacion" value="<?php echo utf8_decode(@$nombreResponsableAutorizacion); ?>"/>
          <input type="hidden" id="apellidosResponsableAutorizacion" name="apellidosResponsableAutorizacion" value="<?php echo utf8_decode(@$apellidosResponsableAutorizacion); ?>"/>
          <input type="hidden" id="nominaResponsableAutorizacion" name="nominaResponsableAutorizacion" value="<?php echo @$nominaResponsableAutorizacion; ?>"/>
          <input type="hidden" id="telefonoResponsableAutorizacion" name="telefonoResponsableAutorizacion" value="<?php echo @$telefonoResponsableAutorizacion; ?>"/>
          <input type="hidden" id="correoResponsableAutorizacion" name="correoResponsableAutorizacion" value="<?php echo utf8_decode(@$correoResponsableAutorizacion); ?>"/>
    
          <td style="text-align:left;"><button id="cambiar" class="boton" style="width:190px;">CAMBIAR SOLICITUD</button></td>
        </tr>
    </form>
      </table>
      </div><!-- Final mostrarBotonesDos -->
  </div><!-- Final div autorizadosEntradaExcel -->
</div><!-- Final div mostrarEntradaExcel -->
<?php
}; // FINAL DE LA FUNCION ENTRADA EXCEL
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// DECIMOCTAVA FUNCION: VALIDACION DEL NUMERO DE REGISTROS SOLICITADOS POR EXCEL
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function validarNumRegistros(){require('02-albacon-php/03-variables-autorizados.php');
// 1) COMPROBAMOS QUE EXISTA ALGUN REGISTRO PARA ESE CODIGO Y EVITAR ENTRADA DUPLICADA SI SE REFRESCA LA PAGINA O SI SE USAN FLECHAS ATRA/ADELANTE
//  * Para ello hacemos una primera consulta en la que obtenemos la variable $procesado, que es la cantidad de registros con PROCESADO = SI
$conexion_db;
$baseDatos;
$sql="SELECT REGISTRO_CODIGO FROM solicitantes WHERE CODIGO='$codigoGestor' ";
$result=mysqli_query($conexion_db,$sql);
// 2) SEPARAMOS POR TABULACIONES Y FILAS
@$datosFila=explode("\t",$autorizadosDatos);
foreach($datosFila as $datosRotos){$datos[] = explode("\n", $datosRotos);};
// 3) OBTENEMOS EL CONTADOR DE FILAS:
$contadorFilas= (count($datos)-1)/9;
$limite=($contadorFilas)*9;
// 4) SE EVALUA LA CANTIDAD DE ACCESOS INTRODUCIDOS EN EL TEXTAREA DE ENTRADA EXCEL COMPARANDO CON EL NUMERO DE SOLICITUDES INDICADAS
if($numRegistros<>$contadorFilas){//mostrarEntradaExcel();
?>
<div id="avisoAutorizados" name="avisoAutorizados" class="oscurecerContenedor">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAvisoAutorizados">
    <p style="font-size:20px;text-align:center;font-weight:bold;color:rgb(224, 23, 50, 1);">AVISO IMPORTANTE</p>
    <p style="font-size:18px;color:rgb(0,0,0,0.7);">EL NUMERO DE ACCESOS INTRODUCIDO NO COINCIDE<br>CON LA CANTIDAD DE ACCESOS SOLICITADOS</p>
      <form action="autorizados.php" method="get">
        <input type="hidden" id="comprobarResponsable" name="comprobarResponsable" value="1"/>
        <input type="hidden" id="pasos" name="pasos" value="5"/>
        <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>

        <input type="hidden" id="numRegistros" name="numRegistros" value="<?php echo $numRegistros; ?>"/>
        <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>

        <input type="hidden" id="IDresponsableAutorizacion" name="IDresponsableAutorizacion" value="<?php echo utf8_decode(@$IDresponsableAutorizacion); ?>"/>
        <input type="hidden" id="nombreResponsableAutorizacion" name="nombreResponsableAutorizacion" value="<?php echo utf8_decode(@$nombreResponsableAutorizacion); ?>"/>
        <input type="hidden" id="apellidosResponsableAutorizacion" name="apellidosResponsableAutorizacion" value="<?php echo utf8_decode(@$apellidosResponsableAutorizacion); ?>"/>
        <input type="hidden" id="nominaResponsableAutorizacion" name="nominaResponsableAutorizacion" value="<?php echo @$nominaResponsableAutorizacion; ?>"/>
        <input type="hidden" id="telefonoResponsableAutorizacion" name="telefonoResponsableAutorizacion" value="<?php echo @$telefonoResponsableAutorizacion; ?>"/>
        <input type="hidden" id="correoResponsableAutorizacion" name="correoResponsableAutorizacion" value="<?php echo utf8_decode(@$correoResponsableAutorizacion); ?>"/>
        <input type="submit" class="boton" value="ACEPTAR" style="width:90px;height:26px;">
      </form>
    </div>
  </div>
<?php
;}else{autorizadosProcesarExcel();};  // FINAL DE LA CONDICION: SI COINCIDEN Nº DE SOLICITUDES Y ACCESOS ENVIADOS SE PROCESA  ENTRADA EXCEL
mysqli_close($conexion_db);
}; // FINAL DE VALIDACION NUMERO DE SOLICITUDES
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// DECIMONOVENA FUNCION: PROCESAR DATOS DE ENTRADA EXCEL
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function autorizadosProcesarExcel(){require('02-albacon-php/03-variables-autorizados.php');
// SE PROCESAN LOS DATOS
// -------------------------------------------------------------------------------------------------------------------------------------------------
// 1) SE QUITAN LAS TILDES Y LOS ESPACIOS POR DELANTE Y DETRAS, ASI COMO LOS DOBLES ESPACIOS
$autorizadosDatos = str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
  array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
  array('a','A','e','E','i','I','o','O'.'u','U'),$autorizadosDatos)));
//---------------------------------------------------------------------------------------------------------------------------------------------------
// 2) SEPARAMOS POR TABULACIONES Y FILAS:
@$datosFila=explode("\t",$autorizadosDatos);
foreach($datosFila as $datosRotos){$datos[] = explode("\n", $datosRotos);};
//---------------------------------------------------------------------------------------------------------------------------------------------------
// 3) OBTENEMOS EL CONTADOR DE FILAS:
$contadorFilas= (count($datos)-1)/9;
$limite=($contadorFilas)*9;
//---------------------------------------------------------------------------------------------------------------------------------------------------
// 4) QUITAN LOS DATOS DOBLES, PARA LUEGO PODER QUITAR EL DATO DEL PRIMER NOMBRE
for($i=0;$i<=$limite;$i){unset($datosFila[$i=$i+9]);};
//echo 'Dato 10 separado: <br>';
//echo 'Dato USOS: '.$datos[10][0].'<br>';
//echo 'Dato NOMBRE: '.$datos[10][1].'<br>';
//---------------------------------------------------------------------------------------------------------------------------------------------------
// 5) SE EXTRAE EL VALOR DEL PRIMER NOMBRE
$primerNombre = array_shift($datosFila);
//echo 'Dato PRIMER NOMBRE: '.$primerNombre.'<br>';
// VEMOS COMO QUEDA EL ARRAY SIN ESE PRIMER DATO (PRIMER NOMBRE)
//echo '<strong>VEMOS COMO QUEDA EL ARRAY SIN ESE PRIMER DATO (PRIMER NOMBRE) Y CON LOS DATOS DOBLES (ID Y USOS): </strong><br>';
//print_r($datosFila);
//---------------------------------------------------------------------------------------------------------------------------------------------------
// 6) SE CREA EL LIMITE NUEVO PARA CEAR LOS ARRAY'S DE LOS DISTINTOS DATOS
$limite2=count($datosFila)-1;
//echo 'Nuevo Limite: '.$limite2;
//echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------------------------
// 7) SE FORMAN LOS ARRAY's DE LOS DIFERENTES DATOS EN EL SIGUIENTE ORDEN:
//  7.1) SE FORMA ARRAY DE LOS DATOS NOMBRE
@$datoNombre=array();
@$datoNombre[0]=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($primerNombre)))));
for($i=0;$i<=($limite-11);$i){$x=1+$i/9; @$datoNombre[$x++]=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($datos[$i=$i+9][1])))));};
//---------------------------------------------------------------------------------------------------------------------------------------------------
//  7.2) SE FORMA ARRAY DE LOS DATOS APELLIDOS
@$datoApellidos=array();
for($i=0;$i<=($limite2);$i=$i+8){$datoApellidos[]=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($datosFila[$i])))));};
//---------------------------------------------------------------------------------------------------------------------------------------------------
//  7.3) SE FORMA ARRAY DE LOS DATOS EMPRESA
@$datoEmpresa=array();
//for($i=2;$i<=($limite2+2);$i=$i+19){$datoEmpresa[]=($datosFila[$i]);};
@$datoEmpresa=array();
for($i=1;$i<=($limite2+1);$i=$i+8){$datoEmpresa[]=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($datosFila[$i])))));};
//---------------------------------------------------------------------------------------------------------------------------------------------------
//  7.4) SE FORMA ARRAY DE LOS DATOS NOMINA
@$datoNomina=array();
for($i=2;$i<=($limite2+2);$i=$i+8){$datoNomina[]=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($datosFila[$i])))));};
//---------------------------------------------------------------------------------------------------------------------------------------------------
//  7.5) SE FORMA ARRAY DE LOS DATOS USUARIO
@$datoUsuario=array();
for($i=3;$i<=($limite2+3);$i=$i+8){$datoUsuario[]=str_replace('ü','Ü',str_replace('ñ','Ñ',strtolower(preg_replace('/\s+/', ' ',trim($datosFila[$i])))));};
//---------------------------------------------------------------------------------------------------------------------------------------------------
//  7.6) SE FORMA ARRAY DE LOS DATOS CLAVE (INICIAL Y ALEATORIA: se añade una clave aleatoria inicial que además sirve para recuperar la contraseña si el usuario la olvida)
@$datoClave=array();
for($x=0;$x<=$numRegistros-1;$x++){
  $key = "";
  $elementos = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $max = strlen($elementos)-1;
  for($i = 0; $i < 8; $i++){$key .= substr($elementos, mt_rand(0,$max), 1);};
  $datoClave[]=$key;
};
//---------------------------------------------------------------------------------------------------------------------------------------------------
//  7.7) CLAVE DE USUARIO (Se añade la contraseña que indique el usuario en el primer uso o cuando la olvide o cuando lo crea necesario)
//---------------------------------------------------------------------------------------------------------------------------------------------------
//  7.8) SE FORMA ARRAY DE LOS DATOS DEPARTAMENTO
@$datoDepartamento=array();
for($i=4;$i<=($limite2+4);$i=$i+8){$datoDepartamento[]=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($datosFila[$i])))));};
//---------------------------------------------------------------------------------------------------------------------------------------------------
//  7.9) SE FORMA ARRAY DE LOS DATOS DIRECCION DE CONTACTO
@$datoDireccion=array();
for($i=5;$i<=($limite2+5);$i=$i+8){$datoDireccion[]=str_replace('ü','Ü',str_replace('ñ','Ñ',strtoupper(preg_replace('/\s+/', ' ',trim($datosFila[$i])))));};
//---------------------------------------------------------------------------------------------------------------------------------------------------
//  7.10) SE FORMA ARRAY DE LOS DATOS TELEFONO
@$datoTelefono=array();
for($i=6;$i<=($limite2+6);$i=$i+8){$datoTelefono[]=preg_replace('/\s+/', ' ',trim($datosFila[$i]));};
//---------------------------------------------------------------------------------------------------------------------------------------------------
//  7.11) SE FORMA ARRAY DE LOS DATOS EXTENSION
@$datoExtension=array();
for($i=7;$i<=($limite2+7);$i=$i+8){$datoExtension[]=preg_replace('/\s+/', ' ',trim($datosFila[$i]));};
//---------------------------------------------------------------------------------------------------------------------------------------------------
//  7.12) SE FORMA ARRAY CON LOS DATOS DE MAIL
$datoMail=array();
for($i=0;$i<=$limite-1;$i){$datoMail[]=str_replace('ü','Ü',str_replace('ñ','Ñ',strtolower(preg_replace('/\s+/', ' ',trim($datos[$i=$i+9][0])))));};
//---------------------------------------------------------------------------------------------------------------------------------------------------
//  7.13) SE FORMA ARRAY DE LOS DATOS INCLUIDO POR (ID)
@$datoIncluidoPor=$IDgestor;
//---------------------------------------------------------------------------------------------------------------------------------------------------
//  7.14) SE FORMA ARRAY DE LOS DATOS RESPONSABLE ALTA (NOMINA)
@$datoResponsableAlta=$nominaResponsableAutorizacion;
//---------------------------------------------------------------------------------------------------------------------------------------------------
//  7.16) SE FORMA ARRAY DE LOS DATOS FECHA ALTA (Se incluye la fecha en que se realiza el registro, no se modificara en las actualizaciones)    
@$datoFechaAlta = date("d/m/Y", time());
//---------------------------------------------------------------------------------------------------------------------------------------------------
//  7.17) SE FORMA ARRAY DE LOS DATOS FECHA RENOVACION (Se incluye la fecha en que se renovacion del registro y cuando se actualice el registro)  
@$datoFechaRenovacion = date("d/m/Y", time());
//---------------------------------------------------------------------------------------------------------------------------------------------------
//  7.18) SE FORMA ARRAY DE LOS DATOS FECHA VALIDEZ (Se incluye la fecha de validez y cuando se actualice el registro tambien se actualiza) 
@$datoFechaValidez=date("d/m/Y", time() + 94608000);
//---------------------------------------------------------------------------------------------------------------------------------------------------
//  7.19) SE FORMA ARRAY DE LOS DATOS ELIMINADO POR: Se incluira el ID del gestor que realiza la baja
//---------------------------------------------------------------------------------------------------------------------------------------------------
//  7.20) SE FORMA ARRAY DE LOS DATOS RESPONSABLE BAJA: Se incluira el NUMERO DE NOMINA del responsable que solicita la baja
//---------------------------------------------------------------------------------------------------------------------------------------------------
//  7.21) // SE FORMA ARRAY DE LOS DATOS FECHA BAJA: Se incluira en el momento de realizar la baja
//---------------------------------------------------------------------------------------------------------------------------------------------------
//  7.22) SE FORMA CON LOS DATOS DE USOS: Se sumara un uso cada vez que el autorizado use el programa
//---------------------------------------------------------------------------------------------------------------------------------------------------
//  7.23) SE DA VALOR A LA VARIABLE REGISTRO
@$registrado='SI';
//  7.24) LA VARIABLE REGISTRO CODIGO: El valor de esta variable se da cuando se envía el formulario de DATOS PREVIOS
//---------------------------------------------------------------------------------------------------------------------------------------------------
// 8) SE IMPRIMEN PARA VER LOS ARRAY's DE LOS DIFERENTES DATOS
/*
echo '<strong>1) ARRAY CON EL DATO DE LOS "NOMBRES": </strong><br>';
print_r($datoNombre);
echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------------------------
echo '<strong>2) ARRAY CON EL DATO DE LOS "APELLIDOS": </strong><br>';
print_r($datoApellidos);
echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------------------------
echo '<strong>3) ARRAY CON EL DATO DE LA "EMPRESA": </strong><br>';
print_r($datoEmpresa);
echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------------------------
echo '<strong>4) ARRAY CON EL DATO DE LA "NOMINA/Nº EMPLEADO": </strong><br>';
print_r($datoNomina);
echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------------------------
echo '<strong>5) ARRAY CON EL DATO DE LA "USUARIO": </strong><br>';
print_r($datoUsuario);
echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------------------------
//echo '<strong>6) ARRAY CON EL DATO DE LA "CONTRASEÑA ALEATORIA": </strong><br>';
//print_r($datoClave);
//echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------------------------
//echo '<strong>7) ARRAY CON EL DATO DE LA "CONTRASEÑA" (vacia): </strong><br>';
//print_r($datoClave);
//echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------------------------
echo '<strong>8) ARRAY CON EL DATO DEL "DEPARTAMENTO": </strong><br>';
print_r($datoDepartamento);
echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------------------------
echo '<strong>9) ARRAY CON EL DATO DEL "DIRECCION DE CONTACTO": </strong><br>';
print_r($datoDireccion);
echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------------------------
echo '<strong>10) ARRAY CON EL DATO DEL "TELEFONO": </strong><br>';
print_r($datoTelefono);
echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------------------------
echo '<strong>11) ARRAY CON EL DATO DEL "EXTENSION": </strong><br>';
print_r($datoExtension);
echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------------------------
echo '<strong>12) ARRAY CON EL DATO DEL "MAIL": </strong><br>';
print_r($datoMail);
echo '<hr>';
*/
//---------------------------------------------------------------------------------------------------------------------------------------------------
// 9) INSERTAN LOS DATOS EN LA BASE DE "SOLICITANTES"
$conexion_db;
$baseDatos;

$sql="SELECT REGISTRADO FROM solicitantes WHERE REGISTRADO ='SI' AND CODIGO ='$codigoGestor' ";
$result=mysqli_query($conexion_db,$sql);
$registrado = mysqli_num_rows($result);
    
$sql00="SELECT REGISTRADO FROM solicitantes WHERE REGISTRO_CODIGO ='SI' AND CODIGO ='$codigoGestor' ";
$result00=mysqli_query($conexion_db,$sql00);
$registroCodigo = mysqli_num_rows($result00);
//echo 'CANTIDAD DE REGISTROS: '.$registrado.'<br>';
//echo 'registrado: '.$registrado.'<br>registro_codigo:'.$registroCodigo;
    
if($registrado <= 0 & $registroCodigo >= 0 ){ //CONDICION PARA NO PERMITIR QUE SE ACTUALICEN DATOS AL REFRESCAR LA PAGINA (EN ESPECIAL LA CONTRASEÑA ALEATORIA)

//  CUARTO: SE INSERTAN LOS DATOS EN LA BASE solicitantes CONDICIONADO A SI $registrado=0, ES DECIR NO HAY REGISTROS PARA ESA VARIABLE $codigoGestor
//  SI $registrado = 0 PROCESAMOS REALIZANDO UN BUCLE FOR
if($registrado <= 0){

for($i=1;$i<=$contadorFilas;$i++){$id=array($i);$id=$i-1;
$sql="UPDATE solicitantes SET NOMBRE='$datoNombre[$id]',APELLIDOS='$datoApellidos[$id]',EMPRESA='$datoEmpresa[$id]',
NOMINA='$datoNomina[$id]',USUARIO='$datoUsuario[$id]',CLAVE='$datoClave[$id]',DEPARTAMENTO='$datoDepartamento[$id]',DIRECCION_CONTACTO='$datoDireccion[$id]',
TELEFONO='$datoTelefono[$id]',EXTENSION='$datoExtension[$id]',MAIL='$datoMail[$id]',INCLUIDO_POR='$datoIncluidoPor',RESPONSABLE_ALTA='$datoResponsableAlta',
FECHA_ALTA='$datoFechaAlta',FECHA_RENOVACION='$datoFechaRenovacion',FECHA_VALIDEZ='$datoFechaValidez',
REGISTRADO='SI' WHERE CODIGO='$codigoGestor' AND NUM='$i' ";
$result=mysqli_query($conexion_db,$sql);
;}  // Final del for
}else{}; // FINAL DE LA CONDICION DE REGISTRADO
}else{}; // FINAL DE LA CONDICION PARA NO ACTUALIZAR DATOS AL REFRESCAR PAGINA
/*
// CUARTO SE ORDENAN LOS SOLICITANTES POR SU "ID"
$sql00= "SELECT * FROM solicitantes ORDER BY ID ASC ";
$result=mysqli_query($conexion_db,$sql00);
*/
mysqli_close($conexion_db);
//  10) SE MUESTRA PANTALLA DE ENVIO DE CORREO DE CONFIRMACION REGISTRO
mostrarCorreoAutorizados();
}; // FINAL DE LA FUNCION PARA PROCESAR DATOS DE ENTRADA EXCEL
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// VIGESIMA FUNCION: MOSTRAR PANTALLA DE ENVIO CORREO DE CONFIRMACION DE REGISTRO
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mostrarCorreoAutorizados(){require('02-albacon-php/03-variables-autorizados.php');
$conexion_db;
$baseDatos;
$sql="SELECT * FROM solicitantes WHERE CODIGO='$codigoGestor' ";
$result=mysqli_query($conexion_db,$sql);
$n = mysqli_num_rows($result);

?>
<div id="autorizadosCorreo" name="autorizadosCorreo" class="oscurecerContenedor">
  <div id="enviarCorreoAutorizados" name="enviarCorreoAutorizados" class="enviarCorreoAutorizados" style="background-image:url('fotos-archivos/Iberia/Logo-Gris-01.png');">
  <form id="formEnviarCorreoAutorizados" action="autorizados.php" method="get">
<?php
  if($accion==2){echo '<h2>EL REGISTRO SE HA ACTUALIZADO CORRECTAMENTE</h2><p>ENVIAR CORREO DE CONFIRMACION</p>';}
  elseif($accion==3){echo '<h2>EL REGISTRO SELECIONADO HA SIDO ANULADO CORRECTAMENTE</h2><p>ENVIAR CORREO DE CONFIRMACION</p>';}
  else{echo '<h2>EL REGISTRO SE HA REALIZADO CORRECTAMENTE</h2><p>ENVIAR CORREO CONFIRMANDO EL REGISTRO COMO NUEVOS AUTORIZADOS A:</p><br>';};
    for($i=1;$i<=$n;$i++){$i=$i;
    $registrosAutorizados[$i] = mysqli_fetch_array($result);
    echo '<div id="listaAutorizados"><p>'.$registrosAutorizados[$i][3].' '.$registrosAutorizados[$i][4].'&emsp;&emsp;&emsp;&emsp;&emsp;'.$registrosAutorizados[$i][14].'</p></div>';
    };
    echo '<br>';
?>
      <input type="hidden" id="accion" name="accion" value="<?php echo @$accion; ?>"/>
      <input type="hidden" id="IDresponsableAutorizacion" name="IDresponsableAutorizacion" value="<?php echo utf8_decode(@$IDresponsableAutorizacion); ?>"/>
      <input type="hidden" id="nombreResponsableAutorizacion" name="nombreResponsableAutorizacion" value="<?php echo utf8_decode(@$nombreResponsableAutorizacion); ?>"/>
      <input type="hidden" id="apellidosResponsableAutorizacion" name="apellidosResponsableAutorizacion" value="<?php echo utf8_decode(@$apellidosResponsableAutorizacion); ?>"/>
      <input type="hidden" id="nominaResponsableAutorizacion" name="nominaResponsableAutorizacion" value="<?php echo @$nominaResponsableAutorizacion; ?>"/>
      <input type="hidden" id="telefonoResponsableAutorizacion" name="telefonoResponsableAutorizacion" value="<?php echo @$telefonoResponsableAutorizacion; ?>"/>
      <input type="hidden" id="correoResponsableAutorizacion" name="correoResponsableAutorizacion" value="<?php echo utf8_decode(@$correoResponsableAutorizacion); ?>"/>
<?php
  // CONDICION PARA MOSTRAR EL ARCHIVO ADJUNTO
//if($accion<>3){}; // Fin condición
?>
<!--</table>-->

      <table  style="width:100%;margin-top:5px;text-align:center;">
        <tr>
          <td style="width:41%;text-align:right;">
    <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX  BOTON PARA ENVIAR Y CERRAR SESION  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX  -->
            <button id="enviarYsalir" name="pasos" class="boton" value="<?php if($pasos==6||$pasos==7){echo 15;}else{echo 17;};?>" style="width:44%;height:28px;">ENVIAR Y TERMINAR</button>
            <!--<button id="enviarYsalir" name="pasos" class="boton" value="<?php if($pasos==13||$pasos==15||$pasos==16){echo 16;}else{echo 17;};?>" style="width:44%;height:28px;">ENVIAR Y TERMINAR</button>-->
            <!--<button id="enviarYsalir" name="pasos" class="boton" value="15" style="width:44%;height:28px;">ENVIAR Y TERMINAR</button>-->
          </td>
    <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX  BOTON PARA ENVIAR Y VOLVER AL FORMULARIO INICIAL XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX  -->
          <td style="width:41%;text-align:left;">
            <button id="enviarYnueva" name="pasos" class="boton" value="<?php if($pasos==6||$pasos==7){echo 16;}else{echo 18;};?>" style="width:44%;height:28px;">ENVIAR Y CONTINUAR</button>
            <!--<button id="enviarYnueva" name="pasos" class="boton" value="<?php if($pasos==13||$pasos==15||$pasos==16){echo 15;}else{echo 18;};?>" style="width:44%;height:28px;">ENVIAR Y CONTINUAR</button>-->
            <!--<button id="enviarYnueva" name="pasos" class="boton" value="16" style="width:44%;height:28px;">ENVIAR Y CONTINUAR</button>-->
          </td>
        </tr>
      </form><!-- xxxxxxxxxxxx Final formulario enviar xxxxxxxxxxxxx -->
  <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX  BOTON CANCELAR  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX  -->
      </table>
      <table  style="width:100%;margin-top:-5px;text-align:center;">
        <tr>
          <td style="width:18%;text-align:center;">
     <form action="autorizados.php" method="get">

          <input type="hidden" id="pasos" name="pasos" value="<?php if($accion==1||$accion==2||$accion==3){echo 1;}else{echo 5;}; ?>"/>
          <input type="hidden" id="accion" name="accion" value="<?php echo @$accion; ?>"/>

          <input type="hidden" id="numRegistros" name="numRegistros" value="<?php echo $numRegistros; ?>"/>
          <input type="hidden" id="entradaDatos" name="entradaDatos" value="<?php echo $entradaDatos; ?>"/>
          <input type="hidden" id="IDgestor" name="IDgestor" value="<?php echo utf8_encode(@$IDgestor); ?>"/>
          
          <input type="hidden" id="IDresponsableAutorizacion" name="IDresponsableAutorizacion" value="<?php echo utf8_decode(@$IDresponsableAutorizacion); ?>"/>
          <input type="hidden" id="nombreResponsableAutorizacion" name="nombreResponsableAutorizacion" value="<?php echo utf8_encode(@$nombreResponsableAutorizacion); ?>"/>
          <input type="hidden" id="apellidosResponsableAutorizacion" name="apellidosResponsableAutorizacion" value="<?php echo utf8_encode(@$apellidosResponsableAutorizacion); ?>"/>
          <input type="hidden" id="nominaResponsableAutorizacion" name="nominaResponsableAutorizacion" value="<?php echo @$nominaResponsableAutorizacion; ?>"/>
          <input type="hidden" id="telefonoResponsableAutorizacion" name="telefonoResponsableAutorizacion" value="<?php echo @$telefonoResponsableAutorizacion; ?>"/>
          <input type="hidden" id="correoResponsableAutorizacion" name="correoResponsableAutorizacion" value="<?php echo utf8_encode(@$correoResponsableAutorizacion); ?>"/>

          <input type="submit" class="boton" value="CANCELAR" style="width:12%;margin-top:4px;height:28px;">
      </form><!-- xxxxxxxxxxxx Final formulario CANCELAR xxxxxxxxxxxxx -->
          </td>
        </tr>
      </table>
  <p></p>
    </div><!-- Final div enviar correo -->
  </div><!-- Final fondo -->
  <?php
  }; // FINAL DE FUNCION MOSTAR PANTALLA DE ENVIO DE CORREO DE CONFIRMACION
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// VIGESIMO PRIMERA FUNCION: PROCESADO Y ENVIO CORREO DE CONFIRMACION PARA CADA UNO DE LOS AUTORIZADOS CON PHPMAILER
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// LA INCLUSION DE LAS CLASES DE PHPMAILER SE HACE FUERA DE LA FUNCION (solo se pone una vez)
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// -------------------------------------------------------------------------------------------------------------------------------------------------
function mandarCorreoIndividual(){
  require('02-albacon-php/03-variables-autorizados.php');
  //require('PHPMailer/Exception.php');
  //require('PHPMailer/PHPMailer.php');
  //require('PHPMailer/SMTP.php');
$gestorAutorizacion = $nombreGestor.' '.$apellidosGestor;
$conexion_db;
$baseDatos;
$sql="SELECT * FROM solicitantes WHERE CODIGO='$codigoGestor' ";
$result=mysqli_query($conexion_db,$sql);
$n = mysqli_num_rows($result);

// 1) SE CREAN LAS VARIBLES NECESARIAS
// 1.1) SALUDO
@$hora = date('h');
if($hora>=5 & $hora<14){$saludo='Buenos días.';}
elseif($hora>=14 & $hora<20){$saludo='Buenas tardes.';}
elseif($hora>=20 || $hora>=0 & $hora<5){$saludo='Buenas noches.';}
else{};

// 2) SE MANDA UN CORREO DISTINTO PARA CADA NUEVO AUTORIZADO CON SU USUARIO Y CONTRASEÑA
for($i=0;$i<$n;$i++){
$i=$i;
@$registrosAutorizados[$i] = mysqli_fetch_array($result);

@$autorizado = array();
@$autorizado = $registrosAutorizados[$i][3];' '.$registrosAutorizados[$i][4];

@$correoDestinatarioDos = $registrosAutorizados[$i][14];

// 2.1) SE CREA EL MENSAJE PARA EL CUERPO DEL CORREO PARA CADA AUTORIZADO
@$mensajeAutorizado =     
  '<div style="padding:2%;padding-top:3%;font-family:Calibri;font-size:16px;text-align:justify;">
  <p style="text-align:justify;font-size:16px;">
  '.$saludo.'
  </p>
  <p style="text-align:justify;font-size:16px;">
  Le comunicamos que, de acuerdo a la petición realizada por su responsable, se ha procedido a registrarle como nuevo usuario del soporte
   para solicitudes de accesos a las <strong>Instalaciones de Iberia - La Muñoza</strong>.
  <br>Los datos para ingresar en el programa son los siguientes:
  <br><br>&emsp;&emsp;Usuario:&emsp;<strong>'.$registrosAutorizados[$i][7].'</strong>
  <br>&emsp;&emsp;Contraseña:&emsp;<strong>'.$registrosAutorizados[$i][8].'</strong>
  <br><br>Por seguridad, <strong>la primera vez</strong> que ingrese en el programa deberá<strong> cambiar la contraseña</strong>. También se le solicitará
   que de <strong>permisos a su navegador</strong> para que se puedan pegar los datos copiados al portapapeles desde excel.
  <br><br>Saludos.
  </p>
  <br><br>
  <p style="color:rgb(122, 168, 236);font-size:12px;text-decoration:underline;">
  <img src="cid:logo" alt="logo" width="200"/><br>
  seguridad@iberia.com
  </p>
  <br>
  <hr>
  <p style="text-align:justify;font-size:12px;">
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
  </div>
  ';
// 3) SE SOLICITA LA CLASE
$mail = new PHPMailer(true);
try {
// 4) CONFIGURACION DEL SERVIDOR CON GMAIL
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
$mail->setFrom('albacon.accesos@gmail.com', 'AUTORIZADOS SEGURIDAD IBERIA'); // QUIEN LO ENVIA - MISMO QUE USERNAME 'albacon.accesos@gmail.com',
//$mail->addAddress($correoResponsableAutorizacion, $gestorAutorizacion); // AQUI PODEMOS PONER EL NOMBRE Y APELLIDOS DEL USUARIO CON LA VARIABLE CORRESPONDIENTE
$mail->addAddress(utf8_decode($correoDestinatarioDos), utf8_decode(@$autorizado[$i])); // AQUI PODEMOS PONER EL NOMBRE Y APELLIDOS DEL USUARIO CON LA VARIABLE CORRESPONDIENTE
//$mail->addAddress($correoDestinatario , ' USUARIO AUTORIZADO'); // AQUI PODEMOS PONER EL NOMBRE Y APELLIDOS DEL USUARIO CON LA VARIABLE CORRESPONDIENTE
//$mail->addAddress('ellen@example.com'); // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//if($conCopia<>''){$mail->addCC($conCopia);}else{};// QUIEN VA EN COPIA - SE EVALUA SI SE PONE CORREO EN EL INPUT DE CC
//if($IDresponsable<>$IDusuario){$mail->addBCC($conCopiaOculta);}else{};// QUIEN VA EN COPIA OCULTA - SE ENVIARA AL CORREO DEL RESPONSABLE SI ES DISTINTO DEL USUARIO)
$mail->CharSet = 'UTF-8'; // PARA USO DE CARACTERES ESPECIALES DE CASTELLANO
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// 5) ADJUNTAR ARCHIVOS (Attachments)
//$mail->addAttachment('PDF-temp/'.$codigoSolicitante.'.pdf'); // SE ADJUNTARA EL ARCHIVO CORRESPONDIENTE PDF CON LOS QR'S
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
// INCLUIR IMAGENES EN EL MENSAJE
$mail->AddEmbeddedImage('fotos-archivos/Iberia/Logo-Correo.png','logo','logo IBERIA');
$mail->AddEmbeddedImage('fotos-archivos/albacon_hoja.png','hoja','hoja');
// 6) COMPOSICION DEL CORREO
$mail->isHTML(true); // PARA ENVIAR EL CORREO EN FORMATO HTML (SECREARA LA VARIABLE $mensaje)
$mail->Subject = @$asunto;// ASUNTO DEL CORREO
$mail->Body = $mensajeAutorizado;//MENSAJE DEL CORREO (Aqui se incluye el mensaje del correo con los diferentes registros que se han realizado)
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; // OTRO FORMATO DE CORREO ALTERNATIVO EN DESUSO
// 7) ENVIO DEL CORREO
// Condicion para evitar que se envie el correo una vez enviado y se refresque la pagina
if(@$correoEnviado<>1){$mail->send();}else{};
//$mail->send();
// 8) CODIGO DE CONTROL - SE COMENTARA CUANDO SE ENVIE CORRECTAMENTE Y SE REALIZARA LA ACCION DE NUEVA SOLICITUD O CERRAR SESION
// echo 'ENVIADO CORRECTAMENTE';
} // Finaliza TRY
catch (Exception $e){//echo "Error en el envío del correo: {$mail->ErrorInfo}";
} // Finaliza CATCH
/*
// 9) SE SUMA UNO A LOS USOS DE ESE USUARIO EN LA TABLA SOLICITANTES
$sql="SELECT USOS FROM solicitantes WHERE ID ='$IDusuario' ";
$result=mysqli_query($conexion_db,$sql);
$usosSolicitante = mysqli_fetch_array($result);
//echo $usosSolicitante[0];
@$usos=$usosSolicitante[0] + 1;
//echo $usos;echo $IDusuario;
$sql01="UPDATE solicitantes SET USOS='$usos' WHERE ID='$IDusuario' ";
$result01=mysqli_query($conexion_db,$sql01);
*/
}; //Fin for para mandar un correo a cada autorizado
//mandarCorreoResponsable();
mysqli_close($conexion_db);// SE CIERRA CONEXION CON BD
}; // FINAL DE FUNCION PROCESAR, ENVIAR CORREO CON CODIGOS QR, BORRADO DE DATOS  -------------------------------------------------------------------
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// VIGESIMO SEGUNDA FUNCION: PROCESADO Y ENVIO CORREO DE CONFIRMACION PARA EL RESPONSABLE DE LA AUTORIZACION Y AUTORIZADOS CON PHPMAILER
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mandarCorreos(){
    require('02-albacon-php/03-variables-autorizados.php');
    require('PHPMailer/Exception.php');
    require('PHPMailer/PHPMailer.php');
    require('PHPMailer/SMTP.php');
$gestorAutorizacion = $nombreGestor.' '.$apellidosGestor;
$conexion_db;
$baseDatos;
$sql="SELECT * FROM solicitantes WHERE CODIGO='$codigoGestor' ";
$result=mysqli_query($conexion_db,$sql);
$n = mysqli_num_rows($result);

// 1) SE CREAN LAS VARIBLES NECESARIAS
// 1.2) CORREO DEL DESTINATARIO (correo del responsable de la autorizacion)
@$correoDestinatario=$correoResponsableAutorizacion;

// 1.2) SALUDO
@$hora = date('h');
if($hora>=5 & $hora<14){$saludo='Buenos días.';}
elseif($hora>=14 & $hora<20){$saludo='Buenas tardes.';}
elseif($hora>=20 || $hora>=0 & $hora<5){$saludo='Buenas noches.';}
else{};
// 1.3) LISTADO DE NUEVOS REGISTROS
@$listaAutorizados = array();
for($i=0;$i<$n;$i++){
$i=$i;
@$registrosAutorizados[$i] = mysqli_fetch_array($result);
@$listaAutorizados[$i] = '&emsp;&emsp;'.$registrosAutorizados[$i][3].' '.$registrosAutorizados[$i][4].' de la empresa '.$registrosAutorizados[$i][5];
}; //Fin for
// Se transforma el array en un listado string mediante "implode()"
@$listaAutorizados = implode('<br>',$listaAutorizados);
// 2) SE CREA EL MENSAJE PARA EL CUERPO DEL CORREO
@$mensajeResponsable =     
    '<div style="padding:2%;padding-top:3%;font-family:Calibri;font-size:16px;text-align:justify;">
    <p style="text-align:justify;font-size:16px;">
    '.$saludo.'
    </p>
    <p style="text-align:justify;font-size:16px;">
    Le comunicamos que, de acuerdo a su petición, se ha procedido a registrar como nuevos usuarios del soporte para solicitudes de accesos a las
     <strong>Instalaciones de Iberia - La Muñoza</strong>, a las siguientes personas:<br><br>'.$listaAutorizados.'<br><br>Saludos.
    </p>
    <br><br>
    <p style="color:rgb(122, 168, 236);font-size:12px;text-decoration:underline;">
    <img src="cid:logo" alt="logo" width="200"/><br>
    seguridad@iberia.com
    </p>
    <br>
    <hr>
    <p style="text-align:justify;font-size:12px;">
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
    </div>
    ';
// 3) SE SOLICITA LA CLASE
$mail = new PHPMailer(true);
try {
// 4) CONFIGURACION DEL SERVIDOR CON GMAIL
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
$mail->setFrom('albacon.accesos@gmail.com', 'SEGURIDAD IBERIA'); // QUIEN LO ENVIA - MISMO QUE USERNAME 'albacon.accesos@gmail.com',
//$mail->addAddress($correoResponsableAutorizacion, $gestorAutorizacion); // AQUI PODEMOS PONER EL NOMBRE Y APELLIDOS DEL USUARIO CON LA VARIABLE CORRESPONDIENTE
$mail->addAddress(utf8_decode($correoDestinatario), utf8_decode($gestorAutorizacion)); // AQUI PODEMOS PONER EL NOMBRE Y APELLIDOS DEL USUARIO CON LA VARIABLE CORRESPONDIENTE
//$mail->addAddress($correoDestinatario , ' USUARIO AUTORIZADO'); // AQUI PODEMOS PONER EL NOMBRE Y APELLIDOS DEL USUARIO CON LA VARIABLE CORRESPONDIENTE
//$mail->addAddress('ellen@example.com'); // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//if($conCopia<>''){$mail->addCC($conCopia);}else{};// QUIEN VA EN COPIA - SE EVALUA SI SE PONE CORREO EN EL INPUT DE CC
//if($IDresponsable<>$IDusuario){$mail->addBCC($conCopiaOculta);}else{};// QUIEN VA EN COPIA OCULTA - SE ENVIARA AL CORREO DEL RESPONSABLE SI ES DISTINTO DEL USUARIO)
$mail->CharSet = 'UTF-8'; // PARA USO DE CARACTERES ESPECIALES DE CASTELLANO
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// 5) ADJUNTAR ARCHIVOS (Attachments)
//$mail->addAttachment('PDF-temp/'.$codigoSolicitante.'.pdf'); // SE ADJUNTARA EL ARCHIVO CORRESPONDIENTE PDF CON LOS QR'S
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
 // INCLUIR IMAGENES EN EL MENSAJE
$mail->AddEmbeddedImage('fotos-archivos/Iberia/Logo-Correo.png','logo','logo IBERIA');
$mail->AddEmbeddedImage('fotos-archivos/albacon_hoja.png','hoja','hoja');
// 6) COMPOSICION DEL CORREO
$mail->isHTML(true); // PARA ENVIAR EL CORREO EN FORMATO HTML (SECREARA LA VARIABLE $mensaje)
$mail->Subject = @$asunto;// ASUNTO DEL CORREO
$mail->Body = $mensajeResponsable;//MENSAJE DEL CORREO (Aqui se incluye el mensaje del correo con los diferentes registros que se han realizado)
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; // OTRO FORMATO DE CORREO ALTERNATIVO EN DESUSO
// 7) ENVIO DEL CORREO
// Condicion para evitar que se envie el correo una vez enviado y se refresque la pagina
if(@$correoEnviado<>1){$mail->send();}else{};
//$mail->send();
// 8) CODIGO DE CONTROL - SE COMENTARA CUANDO SE ENVIE CORRECTAMENTE Y SE REALIZARA LA ACCION DE NUEVA SOLICITUD O CERRAR SESION
// echo 'ENVIADO CORRECTAMENTE';
} // Finaliza TRY
catch (Exception $e){//echo "Error en el envío del correo: {$mail->ErrorInfo}";
} // Finaliza CATCH
/*
// 9) SE SUMA UNO A LOS USOS DE ESE USUARIO EN LA TABLA SOLICITANTES
$sql="SELECT USOS FROM solicitantes WHERE ID ='$IDusuario' ";
$result=mysqli_query($conexion_db,$sql);
$usosSolicitante = mysqli_fetch_array($result);
//echo $usosSolicitante[0];
@$usos=$usosSolicitante[0] + 1;
//echo $usos;echo $IDusuario;
$sql01="UPDATE solicitantes SET USOS='$usos' WHERE ID='$IDusuario' ";
$result01=mysqli_query($conexion_db,$sql01);
*/
mandarCorreoIndividual();
mysqli_close($conexion_db);// SE CIERRA CONEXION CON BD
}; // FINAL DE FUNCION PROCESAR CORREOS PARA EL RESPONSABLE Y LOS AUTORIZADOS ----------------------------------------------------------------------
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// VIGESIMO TERCERA FUNCION: MOSTRAR BUSCADOR DE REGISTROS DE AUTORIZADOS PARA ACTULIZAR O ANULAR
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mostrarBuscadorAutorizados(){require('02-albacon-php/03-variables-autorizados.php');?>
  <div id="mostrarBuscadorAutorizados" name="mostrarBuscadorAutorizados" class="oscurecerContenedor">
    <div id="mostrarBotonesBuscador" name="mostrarBotonesBuscador" class="mostrarAvisoAutorizados" style="width:46%;height:auto;top:28%.5;left:27%;background-image:url('fotos-archivos/Iberia/Logo-Gris-Autorizados.png');background-repeat:no-repeat;background-position:left center;background-size:230px;">
      <div id="tituloForm" class="tituloAviso" style="padding-top:4%;">BUSCAR AUTORIZADOS POR:</div>
      <form id="buscarAutorizadoPor" name="buscarAutorizadoPor" action="autorizados.php" method="get">
          <input type="hidden" id="pasos" name="pasos" value="301"/>
          <input type="hidden" id="accion" name="accion" value="<?php echo $accion; ?>"/>
        <table style="width:96%;margin-left:2%;margin-top:2%;color:rgba(0,0,0,0.5);border:0px solid black;">
          <tr>
            <td style="width:23%;text-align:left;font-weight:bold;border:0px solid black;">
              <label><input type="checkbox" id="buscarPorNomina" name="buscarDato" onclick="return encenderDatoUno()" value="dni">&nbspNº de nómina</label>
            </td>
            <td colspan=3 style="width:77%;text-align:left;border:0px solid black;">
              <input type="text" id="buscarNomina" name="buscarNomina" class="inputApagadoBuscador" style="width:42%;outline:none;" maxlength="9" onkeypress="return caracteresPermitidos(event)" disabled value="">
            </td>
          </tr>
        </table>
        <table style="width:96%;margin-left:2%;margin-top:1%;color:rgba(0,0,0,0.5);">
          <tr>
            <td style="width:15%;text-align:left;font-weight:bold;border:0px solid black;">
              <label><input type="checkbox" id="buscarPorNombreApellidosAutorizado" name="buscarDato" onclick="return encenderDatoDos()" value="nombre">&nbspNombre&nbsp</label>
            </td>
            <td style="width:23%;text-align:left;border:0px solid black;">
              <input type="text" id="buscarNombreAutorizado" name="buscarNombreAutorizado" class="inputApagadoBuscador" maxlength="20" style="width:100%;outline:none;" onkeypress="return caracteresPermitidos(event)" disabled value="">
            </td>
            <td style="width:15%;text-align:right;font-weight:bold;border:0px solid black;">
              <label id="buscarPorNombreApellidos2" name="buscarDato" onclick="return encenderDatoDos()" value="apellido">Apellidos&nbsp</label>
            </td>
            <td style="width:47%;text-align:left;border:0px solid black;">
              <input type="text" id="buscarApellidosAutorizado" name="buscarApellidosAutorizado" class="inputApagadoBuscador" maxlength="30" style="width:98%;outline:none;" onkeypress="return caracteresPermitidos(event)" disabled value="">
            </td>
          </tr>
        </table>
        <!--<table style="width:96%;margin-left:2%;margin-top:1%;color:rgba(0,0,0,0.5);">
          <tr>
            <td style="width:15%;text-align:left;font-weight:bold;border:0px solid black;">
              <input type="checkbox" id="buscarPorEmpresa" name="buscarDato" onclick="return encenderDatoTres()" value="empresa"><strong>&nbspEmpresa</strong>
            </td>
            <td colspan=3 style="width:85%;text-align:left;border:0px solid black;">
              <input type="text" id="buscarEmpresa" name="buscarEmpresa" class="inputApagadoBuscador" style="width:50%;outline:none;" maxlength="26" onkeypress="return caracteresPermitidos(event)" value="">
            </td>
          </tr>
        </table>-->
        <table style="width:100%;margin-top:1%;">
          <tr>
            <td style="text-align:right;width:50%;top:10px;">
              <input type="button" id="bt-buscarPor" class="boton" style="width:40%;height:24px;font-size:14px;margin-top:8px;" onclick="return validarBuscadorAutorizado()" value="BUSCAR">
            </td>
      </form>
      <form id="cancelarBuscadorAutorizados" name="cancelarBuscadorAutorizados" action="autorizados.php" method="get">
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
// VIGESIMO CUARTA FUNCION: BUSCADOR DE AUTORIZADOS POR NOMBRE O POR NUMERO DE NOMINA
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function buscarAutorizado(){require('02-albacon-php/03-variables-autorizados.php');
  //echo 'BUSCAR AUTORIZADO POR NOMBRE Y APELLIDOS';
  // PRIMERO: FORMATEMOS LOS CAMPOS INPUT DE NOMBRE Y APELLIDOS DEL RESPONSABLE DE LA AUTORIZACION
    @$buscarNombreAutorizado = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
      array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
      array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['buscarNombreAutorizado']))))));
    @$buscarApellidosAutorizado = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
      array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
      array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['buscarApellidosAutorizado']))))));
    @$buscarNomina = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
      array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
      array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['buscarNomina']))))));
  // SEGUNDO: SE ESTABLECE LA CONEXION Y SE REALIZA LA CONSULTA
      $conexion_db;
      $baseDatos;
      // Se define la consulta dependiendo del valos enviado
      if($buscarNombreAutorizado<>''){
        $sql = "SELECT * FROM solicitantes WHERE NOMBRE LIKE '%$buscarNombreAutorizado%' OR APELLIDOS LIKE '%$buscarApellidosAutorizado%' ";};
      if(@$buscarNomina<>''){
        $sql = "SELECT * FROM solicitantes WHERE NOMINA LIKE '%$buscarNomina%' ";};
      $result=mysqli_query($conexion_db,$sql);
      $num = mysqli_num_rows($result);
  // TERCERO SE VALIDA SI EXISTE ESE RESPONSABLE ($num=0)
  if($num==0){pantallaLoginGestor();mostrarBuscadorAutorizados();?>
    <div id="fondoMostrarAutorizado" name="fondoMostrarAutorizado" class="oscurecerContenedor">
      <div id="mostrarAutorizado" name="mostrarAutorizado" class="mostrarAvisoAutorizados" style="">
        <div id="tituloAviso" class="tituloAviso">AVISO IMPORTANTE</div>
        <div id="mensajeAviso" class="mensajeAviso">NO HAY NINGUN REGRISTRO CON LOS DATOS INDICADOS</div>
        <form action="autorizados.php" method="get">
            <input type="hidden" id="pasos" name="pasos" value="3"/>
            <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
            <input type="submit" class="boton" value="CANCELAR" style="margin-top:5px;width:112px;">
        </form>
      </div><!-- Final div lista de Autorizados de autorizacion -->
    </div><!-- Final de div para oscurecer contenido -->
  <?php
  // style="box-shadow: 5px 5px 16px rgba(167, 167, 168, 0.9);
  }else{pantallaLoginGestor();
  //CUARTO: SE MUESTRAN LOS RESULTADOS EN UNA TABLA REALIZADA CON UN BUCLE WHILE SIEMPRE QUE HAYA MAS DE UN RESULTADO ($num>1)
  ?>
  <div id="fondoMostrarAutorizado" name="fondoMostrarAutorizado" class="oscurecerContenedor">
    <div id="mostrarListaAutoriazdos" name="mostrarListaAutoriazdos" class="mostrarListaAutoriazdos">
      <p style="font-size:18px;font-weight:bold;">
        <?php if(@$accion==2){echo 'SELECCIONAR AUTORIZADO PARA ACTUALIZAR';}elseif(@$accion==3){echo 'SELECCIONAR AUTORIZADO PARA DAR DE BAJA';};?>
    </p>
      <table style="width:100%;border:0px solid rgb(68, 104, 204, 1);">
  <?php
  $i=1;
  while($i<=$num){$registroAutorizado=mysqli_fetch_array($result);
  // En esta celda se evalua la fecha de validez del responsable, poniendo si está caducado o en vigor
  // 1) Operamos con la fecha UTC
    @$utc=time();
    @$utc=date("d/m/Y", $utc);
    //@$utc='10/10/2023'; // AQUI SE PUEDE CAMBIAR UTC PARA COMPROBAR EL FUNCIONAMIENTO DE LA VALIZACION
    @$fechaUTC=explode('/', $utc);
    @$diaUTC=$fechaUTC[0];@$mesUTC=$fechaUTC[1];@$anioUTC=intval($fechaUTC[2]);
      if($diaUTC[0]=='0'){$diaUTC=$diaUTC[1];}else{$diaUTC=$diaUTC;intval($diaUTC);};
      if($mesUTC[0]=='0'){$mesUTC=$mesUTC[1];}else{$mesUTC=$mesUTC;intval($mesUTC);};
  // 2) Operamos la fecha de validez "$registroAutorizado[19]"
    @$fechaValidez=explode('/', $registroAutorizado[19]);
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
          <td style="width:68%;font-size:16px;font-weight:normal;text-align:left;color:rgba(0,0,0,0.7);"><?php echo $registroAutorizado[3].' '.$registroAutorizado[4];?></td>
          <td style="width:24%;">
        <form action="autorizados.php" method="get">
          <input type="hidden" id="pasos" name="pasos" value="302"/>
          <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
          <input type="hidden" id="nominaAutorizado" name="nominaAutorizado" value="<?php echo @$registroAutorizado[6]; ?>"/>
  <?php
      if($caducado=='si'){echo '<input type="submit" class="boton-2" value="CADUCADO">';}
        elseif($caducado=='no'){echo '<input type="submit" class="boton" style="width:100px;height:20px;font-size:11px;" value="SELECCIONAR">';};
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
        <td colspan=4 style="height:30px;auto; text-align: center;padding-top:5px;">
        <form action="autorizados.php" method="get">
          <input type="hidden" id="pasos" name="pasos" value="3"/>
          <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
          <input type="submit" class="boton" style="width:100px;height:26px;" value="CANCELAR">
        </form>
        </td>
      </tr>
    </table>
  </div><!-- Final div lista de Responsables de autorizacion -->
  </div><!-- Final de div para oscurecer contenido -->
  <?php
  }; //Final de ELSE para mostrar mensaje de no coincidencia
  }; // Final de la funcion MOSTRAR LISTA AUTORIZADOS BUSCADOS POR NOMBRE Y APELLIDOS
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// VIGESIMO QUINTA FUNCION: MOSTRAR DATOS DE AUTORIZADO SELECCINADO PARA ACTUALIZAR
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function actualizarAutorizado(){require('02-albacon-php/03-variables-autorizados.php');
$conexion_db;
$baseDatos;
$sql = "SELECT * FROM solicitantes WHERE NOMINA = '$nominaAutorizado' ";
$result=mysqli_query($conexion_db,$sql);
$registroAutorizado=mysqli_fetch_array($result);
$registroNomina = $registroAutorizado[6];
$fechaAlta = $registroAutorizado[17];
$fechaRenovacion = $registroAutorizado[18];
$fechaValidez = $registroAutorizado[19];
$fechaBaja = $registroAutorizado[22];
  if($accion==2&$fechaBaja<>0){@$textoBoton='APLICAR ALTA';$pasos=305;}elseif($accion==2&$fechaBaja==0){@$textoBoton='ACTUALIZAR';$pasos=303;};
  if($accion==3&$fechaBaja<>0){@$textoBoton='APLICAR ALTA';$pasos=305;}elseif($accion==3&$fechaBaja==0){@$textoBoton='APLICAR BAJA';$pasos=304;};
  if($fechaBaja == 0){$fechaBaja = '- - - -';}
    else{$fechaAlta = '- - - -';$fechaRenovacion = '- - - -';$fechaValidez = '- - - -';};

// Se crea la variable para mostrar el nombre del responsable del alta
$sql01 = "SELECT * FROM solicitantes WHERE NOMINA = '$registroAutorizado[16]' ";
$result01 = mysqli_query($conexion_db,$sql01);
$registroResponsable = mysqli_fetch_array($result01);
$registroResponsable = $registroResponsable[3].' '.$registroResponsable[4];

// Se crea la variable para mostrar el nombre del gestor que realizo la baja
$sql02 = "SELECT * FROM solicitantes WHERE ID = '$registroAutorizado[20]' ";
$result02 = mysqli_query($conexion_db,$sql02);
$registroGestorBaja = mysqli_fetch_array($result02);
@$registroGestorBaja = $registroGestorBaja[3].' '.$registroGestorBaja[4];
@$textoBaja = '* Este registro se dió de baja el día '.$fechaBaja.' por '.$registroGestorBaja;

?>
<div id="actualizarRegistro" name="actuelizaRegistro" class="oscurecerContenedor">
<div id="mostrarActulizarRegistro" name="mostrarActulizarRegistro" class="fichaBuscadorRegistro" style="">
  <div class="tituloFicha"><p>REGISTRO DEL AUTORIZADO SELECCIONADO</p></div>
  <div id="filaUnoEncabezadosRegistro" name="filaUnoEncabezadosRegistro" class="filaEncabezadoRegistro">
    <div class="encabezadoRegistro" style="width:12%;"><P>Nº NOMINA</P></div>
    <div class="encabezadoRegistro" style="width:22%;"><p>NOMBRE</P></div>
    <div class="encabezadoRegistro" style="width:30%;"><p>APELLIDOS</p></div>
    <div class="encabezadoRegistro" style="width:14%;"><p>EMPRESA</p></div>
    <div class="encabezadoRegistro" style="width:18%;"><p>USUARIO</p></div>
  </div><!-- Final fila UNO ENCABEZADOS PERSONALES -->
<form id="actualizarRegistro" action="autorizados.php" method="get">
  <div id="filaUnoDatosRegistro" name="filaUnoDatosRegistro" class="filaRegistro">
    <div class="registroDatoAutorizado" id="div-registroNomina" name="div-registroNomina" style="width:12%;">
      <input id="registroNomina" name="registroNomina" type="hidden" value="<?php echo $registroNomina;?>"/>
      <label class="registroLabelDatoAutorizado" style=""><p><?php echo $registroNomina;?></p></label>
    </div>
    <div class="registroDatoAutorizado" id="div-registroNombre" name="div-registroNombre" style="width:22%;">
      <input id="registroNombre" name="registroNombre" type="text" class="registroInputDatoAutorizado" maxlength="20" value="<?php echo $registroAutorizado[3];?>" autocomplete="off">
    </div>
    <div class="registroDatoAutorizado" id="div-registroApellidos" name="div-registroApellidos" style="width:30%;">
      <input id="registroApellidos" name="registroApellidos" type="text" class="registroInputDatoAutorizado" maxlength="40" value="<?php echo $registroAutorizado[4];?>" autocomplete="off">
    </div>
    <div class="registroDatoAutorizado" id="div-registroEmpresa" name="div-registroEmpresa" style="width:14%;">
      <input id="registroEmpresa" name="registroEmpresa" type="text" class="registroInputDatoAutorizado" maxlength="20" value="<?php echo $registroAutorizado[5];?>" autocomplete="off">
    </div>
    <div class="registroDatoAutorizado" id="div-registroUsuario" name="div-registroUsuario" style="width:18%;">
      <input id="registroUsuario" name="registroUsuario" type="text" class="registroInputDatoAutorizado" maxlength="26" value="<?php echo $registroAutorizado[7];?>" autocomplete="off">
    </div>
  </div> <!-- Final fila UNO de datos PERSONALES -->
  <div id="filaDosEncabezaRegistro" name="filaDosEncabezaRegistro" class="filaEncabezadoRegistro">
    <div class="encabezadoRegistro" style="width:18%;"><p>DEPARTAMENTO</p></div>
    <div class="encabezadoRegistro" style="width:30%;"><p>DIRECCION DE CONTACTO</div>
    <div class="encabezadoRegistro" style="width:14%;"><p>TELEFONO</p></div>
    <div class="encabezadoRegistro" style="width:8%;"><p>EXTENSION</p></div>
    <div class="encabezadoRegistro" style="width:26%;"><p>CORREO</p></div>
  </div><!-- Final fila DOS ENCABEZADOS de datos CONTACTO -->
  <div id="filaDosDatosRegistro" name="filaDosDatosRegistro"  class="filaDatosRegistro">
    <div class="registroDatoAutorizado" id="div-registroDepartamento" name="div-registroDepartamento" style="width:18%;">
      <input id="registroDepartamento" name="registroDepartamento" type="text" class="registroInputDatoAutorizado" maxlength="40" value="<?php echo $registroAutorizado[10];?>" autocomplete="off">
    </div>
    <div class="registroDatoAutorizado" id="div-registroDireccion" name="div-registroDireccion" style="width:30%;">
      <input id="registroDireccion" name="registroDireccion" type="text" class="registroInputDatoAutorizado" maxlength="50" value="<?php echo $registroAutorizado[11];?>" autocomplete="off">
    </div>
    <div class="registroDatoAutorizado" id="div-registroTelefono" name="div-registroTelefono" style="width:14%;">
      <input id="registroTelefono" name="registroTelefono" type="text" class="registroInputDatoAutorizado" style="width:98%;" maxlength="9" value="<?php echo $registroAutorizado[12];?>"autocomplete="off">
    </div>
    <div class="registroDatoAutorizado" id="div-registroExtension" name="div-registroExtension" style="width:8%;">
      <input id="registroExtension" name="registroExtension" type="text" class="registroInputDatoAutorizado" maxlength="6" style="width:96%;" value="<?php echo $registroAutorizado[13];?>" autocomplete="off">
    </div>
    <div class="registroDatoAutorizado" id="div-registroCorreo" name="div-registroCorreo" style="width:26%;">
      <input id="registroCorreo" name="registroCorreo" type="text" class="registroInputDatoAutorizado" maxlength="40" value="<?php echo $registroAutorizado[14];?>" autocomplete="off">
    </div>
  </div><!-- final fila DOS de datos CONTACTO -->
  <br>
  <div id="filaTresEncabezaRegistro" name="filaTresEncabezaRegistro" class="filaEncabezadoRegistro">
    <div class="encabezadoRegistro" style="width:28%;"><p>RESPONSABLE DEL AUTORIZADO</p></div>
    <div class="encabezadoRegistro" style="width:15%;"><p>FECHA DE ALTA</div>
    <div class="encabezadoRegistro" style="width:15%;"><p>FECHA DE RENOVACION</p></div>
    <div class="encabezadoRegistro" style="width:15%;"><p>FECHA DE VALIDEZ</p></div>
    <div class="encabezadoRegistro" style="width:15%;"><p>FECHA DE BAJA</p></div>
  </div><!-- Final fila TRES ENCABEZADOS de datos FECHAS -->
  <div id="filaTresDatosRegistro" name="filaTresDatosRegistro"  class="filaDatosRegistro">
    <div class="registroDatoAutorizado" id="div-registroResponsableAlta" name="div-registroResponsableAlta" style="width:28%;">
      <input id="registroResponsable" name="registroResponsable" type="hidden" value="<?php echo $registroResponsable;?>"/>
      <label class="registroLabelDatoAutorizado" style=""><p><?php echo $registroResponsable;?></p></label>
    </div>
    <div class="registroDatoAutorizado" id="div-registroFechaAlta" name="div-registroFechaAlta" style="width:15%;">
      <input id="registroFechaAlta" name="registroFechaAlta" type="hidden" value="<?php echo $fechaAlta;?>"/>
      <label class="registroLabelDatoAutorizado" style=""><p><?php echo $fechaAlta;?></p></label>
    </div>
    <div class="registroDatoAutorizado" id="div-registroFechaRenovacion" name="div-registroFechaRenovacion" style="width:15%;">
      <input id="registroFechaRenovacion" name="registroFechaRenovacion" type="hidden" value="<?php echo $fechaRenovacion;?>"/>
      <label class="registroLabelDatoAutorizado" style=""><p><?php echo $fechaRenovacion;?></p></label>
    </div>
    <div class="registroDatoAutorizado" id="div-registroFechaValidez" name="div-registroFechaValidez" style="width:15%;">
      <input id="registroFechaValidez" name="registroFechaValidez" type="hidden" value="<?php echo $fechaValidez;?>"/>
      <label class="registroLabelDatoAutorizado" style=""><p><?php echo $fechaValidez;?></p></label>
    </div>
    <div class="registroDatoAutorizado" id="div-registroFechaBaja" name="div-registroFechaBaja" style="width:15%;">
      <input id="registroFechaBaja" name="registroFechaBaja" type="hidden" value="<?php echo $fechaBaja;?>"/>
      <label class="registroLabelDatoAutorizado" style="<?php if($fechaBaja<>'- - - -'){echo 'font-weight:bold;color:rgb(240, 41, 67);';};?>"><p><?php echo $fechaBaja;?></p></label>
    </div>
  </div><!-- final fila TRES de datos de FECHAS -->
  <p style="text-align:left;padding-left:5%;color:rgb(240, 41, 67);margin-top:-2px;"><?php if($fechaBaja=='- - - -'){echo '';}else{echo @$textoBaja;};?></p>
  


  <table id="botonesMostrar" style="width:99%;">
    <tr>
      <td style="text-align:right;">
        <input type="hidden" id="pasos" name="pasos" value="<?php echo $pasos;?>"/>
        <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
        <button class="boton" style="width:130px;" onclick="return noEnviarRegistroAutorizadoVacio();"><?php echo @$textoBoton;?></button>
  </form>
      </td> 
      <td style="text-align:left;">  
  <form id="" action="autorizados.php" method="get">
        <input type="hidden" id="pasos" name="pasos" value="1"/>
        <input type="hidden" id="accion" name="accion" value="<?php echo $accion;?>"/>
        <button class="boton" style="width:130px;">CANCELAR</button>
      </td>
    </tr>
  </table>
  </form>
  <br>
</div><!-- Final de DIV mostrar registro de autorizado -->
</div><!-- Final de DIV registro de autorizado -->
<!-- div para mostrar error al mandar campos vacios *********************************************************************************************-->
<div id="avisoRegistroAutorizadoVacio" name="avisoRegistroAutorizadoVacio" class="oscurecerContenedor" style="display:none;">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAvisoAutorizados">
    <div id="tituloAviso" class="tituloAviso">INFORMACION INCOMPLETA</div>
    <div id="mensajeAviso" class="mensajeAviso">DEBE RELLENAR TODOS LOS CAMPOS CORRECTAMENTE</div>
      <a href="javascript:cerrarAvisoRegistroAutorizadoVacio();">ACEPTAR</a>
  </div><!-- FINAL mostrarAvisoError -->
</div><!-- FINAL mostrarAviso -->
<?php
mysqli_close($conexion_db); //Se cierra conexion
};
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// VIGESIMO SEXTA FUNCION: PROCESAR ACTUALIZAR REGISTRO DE AUTORIZADO
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function procesarActualizarAutorizado(){require('02-albacon-php/03-variables-autorizados.php');
$conexion_db;
$baseDatos;
// Variables para fechas
$sql = "SELECT * FROM solicitantes WHERE NOMINA = '$registroNomina' ";
$result=mysqli_query($conexion_db,$sql);
$registroAutorizado=mysqli_fetch_array($result);

@$registroNomina = $registroAutorizado[6];
@$fechaAlta = $registroAutorizado[17];
@$fechaRenovacion = $registroAutorizado[18];
@$fechaValidez = $registroAutorizado[19];
@$fechaBaja = $registroAutorizado[22];
//echo '<br>FECHA BAJA: '.$fechaBaja;
if($fechaBaja ==0){
  @$fechaRenovacion = date("d/m/Y", time());
  @$fechaValidez = date("d/m/Y", time() + 94608000);
}else{@$fechaRenovacion = $registroAutorizado[18];@$fechaValidez = $registroAutorizado[19];};
//echo '<br>FECHA VALIDEZ A ACTUALIZAR: '.$fechaValidez;
// Consulta para actualizar
$sql="UPDATE solicitantes SET NOMBRE='$registroNombre',APELLIDOS='$registroApellidos',EMPRESA='$registroEmpresa',USUARIO='$registroUsuario',
DEPARTAMENTO='$registroDepartamento',DIRECCION_CONTACTO='$registroDireccion',TELEFONO='$registroTelefono',EXTENSION='$registroExtension',
MAIL='$registroCorreo',FECHA_RENOVACION='$fechaRenovacion',FECHA_VALIDEZ='$fechaValidez' WHERE NOMINA='$registroNomina' ";
$result=mysqli_query($conexion_db,$sql);
/*
echo '<br>'.$registroNomina;
echo '<br>'.$registroNombre;
echo '<br>'.$registroApellidos;
echo '<br>'.$registroEmpresa;
echo '<br>'.$registroUsuario;
echo '<br>'.$registroDepartamento;
echo '<br>'.$registroDireccion;
echo '<br>'.$registroTelefono;
echo '<br>'.$registroExtension;
echo '<br>'.$registroCorreo;
echo '<br>'.$registroResponsable;
echo '<br>'.$registroFechaAlta;
echo '<br>'.$registroFechaRenovacion;
echo '<br>'.$registroFechaValidez;
echo '<br>'.$registroFechaBaja;
*/
?>
<div id="autorizadosOK" name="autorizadosOK" class="oscurecerContenedor">
  <div id="registroAutorizadosOK" name="registroAutorizadosOK" class="registroAutorizadosOK" style="background-image:url('fotos-archivos/Iberia/Logo-Gris-01.png');background-size:110px;">
    <h2>INFORMACION IMPORTANTE</h2>
    <p>EL REGISTRO SE HA ACTUALIZADO CORRECTAMENTE</p>
    <br></br>
  <form id="registroOK" action="autorizados.php" method="get">
    <input type="hidden" id="accion" name="accion" value="<?php echo @$accion; ?>"/>
    <input type="hidden" id="IDgestor" name="IDgestor" value="<?php echo @$IDgestor;?>"/>
  <table  style="width:100%;margin-top:-5px;text-align:center;">
    <tr>
      <td style="width:50%;text-align:right;"><button type="submit" class="boton" name="pasos" style="width:80%;margin-top:4px;height:26px;" value="1">ACEPTAR Y CONTINUAR</button></td>
      <td style="width:50%;text-align:left;"><button type="submit" class="boton" name="pasos" style="width:80%;margin-top:4px;height:26px;" value="100">ACEPTAR Y SALIR</button></td>
    </tr>
  </table>
  </form><!-- xxxxxxxxxxxx AVISO ACTUALIZACION REGISTRO OK xxxxxxxxxxxxx -->
<br>
  </div><!-- Final REGISTRO AUTORIZADO OK -->
</div><!-- Final OSCURECER CONTENEDOR -->
<?php
mysqli_close($conexion_db); //Se cierra conexion
};

// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// VIGESIMO SEPTIMA FUNCION: PROCESAR ANULAR REGISTRO DE AUTORIZADO
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function procesarAnularAutorizado(){require('02-albacon-php/03-variables-autorizados.php');
  $conexion_db;
  $baseDatos;
  // Variables para fechas
    @$fechaBaja = date("d/m/Y", time());
    @$fechaValidez = date("d/m/Y", time() - 86400);
  // Consulta para actualizar
  $sql="UPDATE solicitantes SET NOMBRE='$registroNombre',APELLIDOS='$registroApellidos',EMPRESA='$registroEmpresa',USUARIO='$registroUsuario',
  DEPARTAMENTO='$registroDepartamento',DIRECCION_CONTACTO='$registroDireccion',TELEFONO='$registroTelefono',EXTENSION='$registroExtension',
  MAIL='$registroCorreo',FECHA_VALIDEZ='$fechaValidez',FECHA_BAJA='$fechaBaja', ELIMINADO_POR='$IDgestor' WHERE NOMINA='$registroNomina' ";
  $result=mysqli_query($conexion_db,$sql);
  /*
  echo '<br>'.$registroNomina;
  echo '<br>'.$registroNombre;
  echo '<br>'.$registroApellidos;
  echo '<br>'.$registroEmpresa;
  echo '<br>'.$registroUsuario;
  echo '<br>'.$registroDepartamento;
  echo '<br>'.$registroDireccion;
  echo '<br>'.$registroTelefono;
  echo '<br>'.$registroExtension;
  echo '<br>'.$registroCorreo;
  echo '<br>'.$registroResponsable;
  echo '<br>'.$registroFechaAlta;
  echo '<br>'.$registroFechaRenovacion;
  echo '<br>'.$registroFechaValidez;
  echo '<br>'.$registroFechaBaja;
  */
  ?>
  <div id="autorizadosOK" name="autorizadosOK" class="oscurecerContenedor">
    <div id="registroAutorizadosOK" name="registroAutorizadosOK" class="registroAutorizadosOK" style="background-image:url('fotos-archivos/Iberia/Logo-Gris-01.png');background-size:110px;">
      <h2>INFORMACION IMPORTANTE</h2>
      <p>EL REGISTRO SE HA DADO DE BAJA CORRECTAMENTE</p>
      <br></br>
    <form id="anuladoOK" action="autorizados.php" method="get">
      <input type="hidden" id="accion" name="accion" value="<?php echo @$accion;?>"/>
      <input type="hidden" id="IDgestor" name="IDgestor" value="<?php echo @$IDgestor;?>"/>
    <table  style="width:100%;margin-top:-5px;text-align:center;">
      <tr>
        <td style="width:50%;text-align:right;"><button type="submit" class="boton" name="pasos" style="width:80%;margin-top:4px;height:26px;" value="1">ACEPTAR Y CONTINUAR</button></td>
        <td style="width:50%;text-align:left;"><button type="submit" class="boton" name="pasos" style="width:80%;margin-top:4px;height:26px;" value="100">ACEPTAR Y SALIR</button></td>
      </tr>
    </table>
    </form><!-- xxxxxxxxxxxx AVISO ACTUALIZACION REGISTRO OK xxxxxxxxxxxxx -->
  <br>
    </div><!-- Final REGISTRO AUTORIZADO OK -->
  </div><!-- Final OSCURECER CONTENEDOR -->
  <?php
  mysqli_close($conexion_db); //Se cierra conexion
  };
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// VIGESIMO OCTAVA FUNCION: PROCESAR DAR DE NUEVO EL ALTA REGISTRO DE AUTORIZADO
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function procesarAltaAutorizado(){require('02-albacon-php/03-variables-autorizados.php');
$conexion_db;
$baseDatos;
// Variables para fechas
  @$registroRenovacion = date("d/m/Y", time());
  @$registroValidez = date("d/m/Y", time() + 94608000);
// Consulta para actualizar
$sql="UPDATE solicitantes SET NOMBRE='$registroNombre',APELLIDOS='$registroApellidos',EMPRESA='$registroEmpresa',USUARIO='$registroUsuario',
DEPARTAMENTO='$registroDepartamento',DIRECCION_CONTACTO='$registroDireccion',TELEFONO='$registroTelefono',EXTENSION='$registroExtension',
MAIL='$registroCorreo',FECHA_RENOVACION='$registroRenovacion',FECHA_VALIDEZ='$registroValidez',FECHA_BAJA=NULL, ELIMINADO_POR=NULL
 WHERE NOMINA='$registroNomina' ";
$result=mysqli_query($conexion_db,$sql);
/*
  echo '<br>'.$registroNomina;
  echo '<br>'.$registroNombre;
  echo '<br>'.$registroApellidos;
  echo '<br>'.$registroEmpresa;
  echo '<br>'.$registroUsuario;
  echo '<br>'.$registroDepartamento;
  echo '<br>'.$registroDireccion;
  echo '<br>'.$registroTelefono;
  echo '<br>'.$registroExtension;
  echo '<br>'.$registroCorreo;
  echo '<br>'.$registroResponsable;
  echo '<br>'.$registroFechaAlta;
  echo '<br>'.$registroFechaRenovacion;
  echo '<br>'.$registroFechaValidez;
  echo '<br>'.$registroFechaBaja;
*/
?>
<div id="autorizadosOK" name="autorizadosOK" class="oscurecerContenedor">
  <div id="registroAutorizadosOK" name="registroAutorizadosOK" class="registroAutorizadosOK" style="background-image:url('fotos-archivos/Iberia/Logo-Gris-01.png');background-size:110px;">
    <h2>INFORMACION IMPORTANTE</h2>
    <p>EL REGISTRO SE HA DADO DE ALTA CORRECTAMENTE</p>
    <br></br>
  <form id="anuladoOK" action="autorizados.php" method="get">
    <input type="hidden" id="accion" name="accion" value="<?php echo @$accion;?>"/>
    <input type="hidden" id="IDgestor" name="IDgestor" value="<?php echo @$IDgestor;?>"/>
  <table  style="width:100%;margin-top:-5px;text-align:center;">
    <tr>
      <td style="width:50%;text-align:right;"><button type="submit" class="boton" name="pasos" style="width:80%;margin-top:4px;height:26px;" value="1">ACEPTAR Y CONTINUAR</button></td>
      <td style="width:50%;text-align:left;"><button type="submit" class="boton" name="pasos" style="width:80%;margin-top:4px;height:26px;" value="100">ACEPTAR Y SALIR</button></td>
    </tr>
  </table>
  </form>
<br>
  </div><!-- Final REGISTRO AUTORIZADO OK -->
</div><!-- Final OSCURECER CONTENEDOR -->
<?php


//<!-- xxxxxxxxxxxx AVISO ACTUALIZACION REGISTRO OK xxxxxxxxxxxxx -->


mysqli_close($conexion_db); //Se cierra conexion
};
  






/*
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// VIGESIMO QUINTA FUNCION: MOSTRAR PANTALLA INPUT ACTUALIZAR VACIO
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function inputActualizarVacio(){require('02-albacon-php/03-variables-autorizados.php');
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
// VIGESIMO QUINTA FUNCION: MOSTRAR DATOS DE AUTORIZADO SELECCINADO PARA ACTUALIZAR
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX




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
*/
?>
