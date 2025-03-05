<?php
header('Content-type: text/html; charset=utf-8');
require('02-albacon-php/05-variables-control.php');
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// PRIMERA FUNCION: IDENTIFICACION OK
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function identificacionOK(){require('02-albacon-php/05-variables-control.php');?>
<div id="oscurecerContenedor" name="oscurecerContenedor" class="oscurecerContenedor">
  <form id="usuarioControlOK" name="usuarioControlOK" action="control.php" method="post">
    <div id="mostrarIdentificacionOK" name="mostrarIdentificacionOK" class="usuarioControlOK" style="background-image:url('fotos-archivos/Iberia/logo-gris-autorizados-p.png');background-repeat:no-repeat;">
    <br><h3 style="color:rgb(224, 23, 50, 1);font-size:20px;margin-top:4px;">IDENTIFICACION CORRECTA</h3>
      <?php echo '<p style="color:rgb(0, 0, 0, 0.6);">'.$nombreVigilante.' '.$apellidosVigilante.'</p>';?>
    <div id="contieneTabla" style="margin-left:1.9%;">
      <table style="width:96%;padding-bottom:12px;">
        <tr>
          <td style="width:100%;">          
            <input type="hidden" id="pasos" name="pasos" value="2"/>
            <input type="submit" class="boton" style="width:106px;height:26px;" value="ACEPTAR"/>            
          </td>
        </tr>
      </table>
    </div>
   </form>
  </div><!-- FINAL Identificación correcta -->
</div>
<?php
};//<?php echo $nombreEmpresa.'&estiloWEB='.$estiloDeWEB.'&pasos='.$pasos;
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// SEGUNDA FUNCION: MOSTRAR PANTALLA DE LOGIN VIGILANTE
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function pantallaLoginVigilante(){require('02-albacon-php/05-variables-control.php');?>
<div id="fondoLogin" name="fondoLogin" class="fondoLoginControl" style="background-image:url('05-albacon-fotos/fondo-blanco3.png');background-size:cover;">
<div id="login" name="login" class="loginControl" style="">
    <h1 style="font-size:30px;"><br>DIRECCION DE SEGURIDAD</h1>
    <form id="loginVigilante" name="loginVigilante" action="control.php" method="post">
      <table style="width:100%;font-size:14px;">
        <tr>
          <td style="width:6%;"></td>
          <td style="background-color: rgb(255,255,255,0);text-align:right;height:40px;color:rgb(0, 0, 0, 0.7);width:40%;"><strong>USUARIO:</strong></td>
          <td style="background-color: rgb(255,255,255,0);text-align:left;width:54%;"><input type="text" id="vigilante" name="vigilante" class="clave" onkeypress="return caracteresPermitidos(event)" onblur="return limpiaUno()"/></td>
        </tr>
        <tr>
          <td></td>
          <td style="background-color:rgb(255,255,255,0);text-align:right;height:40px;color:rgb(0, 0, 0, 0.7);"><strong>CONTRASEÑA:</strong></td>
          <td style="background-color:rgb(255,255,255,0);text-align:left;"><input type="text" id="contrasenia" name="contrasenia" class="clave" onkeypress="return caracteresPermitidos(event)" onblur=""/></td>
        </tr>
        <tr style="background-color: rgb(255,255,255,0);padding-left:-200px;">
          <td colspan="3" style="background-color: rgb(255,255,255,0);text-align:center;height:55px;">
            <input type="hidden" id="comprobarVigilante" name="comprobarVigilante" value="1"/>
            <input type="hidden" id="pasos" name="pasos" value="1"/>
            <input type="button" id="BTN-Identificarse" value="IDENTIFICARSE" onclick="return validarVigilante()"/>
          </td>
        </tr>
      </table>
    </form>    
    <form id="olvidoContrasena" name="olvidoContrasena" action="control.php" method="get">
      <table style="width:100%;">
        <tr>
          <td style="width:100%;font-size:12px;background-color:rgb(255,255,255,0);text-alignenter;">
            <button type="submit" id="pasos" name="pasos" class="BTN-OlvidoContrasena" value="20" style="">¿Ha olvidado la contraseña?</button>
          </td>
        </tr>
      </table>
    </form>
    </div><!-- FINAL div login -->
<?php
// -----------------------------------------------------------------------------------------------------------------------------------------------
// SE COMPRUEBA QUE LOS CAMPOS DE VIGILANTE Y CONTRASEÑA EXISTEN Y ESTAN EN VIGOR (CON PHP)
// -----------------------------------------------------------------------------------------------------------------------------------------------
if($comprobarVigilante==1){
// 1) Se realiza la conexion con la BD y la consulta  --------------------------------------------------------------------------------------------
$conexion_db;
$baseDatos;
$sql="SELECT * FROM seguridad WHERE VIGILANTE='$vigilante'";
$result=mysqli_query($conexion_db,$sql);
$registroVigilante=mysqli_fetch_array($result);
// 2) Se valida que el vigilante exista en la tabla de "seguridad" (sea correcto) ----------------------------------------------------------------
if(@utf8_encode($registroVigilante[5])<>$vigilante){
?>
<div id="mostrarAvisoValidacion" name="mostrarAvisoValidacion" class="oscurecerContenedor">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAvisoControl">
    <div class="tituloAviso">INFORMACION IMPORTANTE</div>
    <div class="mensajeAviso">DEBE INDICAR UN USUARIO VALIDO</div>
      <a href="javascript:cerrarAvisoValidacion();">ACEPTAR</a>
  </div><!-- FINAL mostrarAvisoError -->
</div><!-- FINAL mostrarAviso -->
<?php
;}else{
// 3) Se valida que la contraseña sea correcta --------------------------------------------------------------------------------------------------
if(@$registroVigilante[6]<>$contrasenia){
?>
<div id="mostrarAvisoValidacion" name="mostrarAvisoValidacion" class="oscurecerContenedor">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAvisoControl">
    <div class="tituloAviso">INFORMACION IMPORTANTE</div>
    <div class="mensajeAviso">LA CONTRASEÑA NO ES VALIDA</div>
      <a href="javascript:cerrarAvisoValidacion();">ACEPTAR</a>
  </div><!-- FINAL mostrarAvisoError -->
</div><!-- FINAL mostrarAviso -->
<?php
;}else{
// Se evalua la fecha de validez del VIGILANTE, poniendo si está caducado o en vigor
// 1) Operamos con la fecha UTC
  @$utc=time();
  @$utc=date("d/m/Y", $utc);
  //@$utc='10/10/2023'; // AQUI SE PUEDE CAMBIAR UTC PARA COMPROBAR EL FUNCIONAMIENTO DE LA VALIZACION
  @$fechaUTC=explode('/', $utc);
  @$diaUTC=$fechaUTC[0];@$mesUTC=$fechaUTC[1];@$anioUTC=intval($fechaUTC[2]);
    if($diaUTC[0]=='0'){$diaUTC=$diaUTC[1];}else{$diaUTC=$diaUTC;intval($diaUTC);};
    if($mesUTC[0]=='0'){$mesUTC=$mesUTC[1];}else{$mesUTC=$mesUTC;intval($mesUTC);};
// 2) Operamos la fecha de validez "$registroVigilante[11]"
echo '<br>fecha validez: '.$registroVigilante[11];
  @$fechaValidez=explode('/', $registroVigilante[11]);
  @$diaValidez=$fechaValidez[0];@$mesValidez=$fechaValidez[1];@$anioValidez=intval($fechaValidez[2]);
    if($diaValidez[0]=='0'){$diaValidez=$diaValidez[1];}else{$diaValidez=$diaValidez;intval($diaValidez);};
    if($mesValidez[0]=='0'){$mesValidez=$mesValidez[1];}else{$mesValidez=$mesValidez;intval($mesValidez);};
// 3) Se comparan fechas y se pone: "Vigilante no válido - caducado"
    if($anioUTC>$anioValidez){$caducado='si';}
      else{if($anioUTC==$anioValidez & $mesUTC>$mesValidez){$caducado='si';}
        else{if($anioUTC>=$anioValidez & $mesUTC==$mesValidez & $diaUTC>$diaValidez){$caducado='si';}else{$caducado='no';};};};
if($caducado=='si'){
?>
<div id="mostrarAvisoValidacion" name="mostrarAvisoValidacion" class="oscurecerContenedor">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAvisoControl">
    <div class="tituloAviso">INFORMACION IMPORTANTE</div>
    <div class="mensajeAviso"><p>VIGILANTE NO ES VALIDO POR CADUCIDAD<br>PONGASE EN CONTACTO CON LA DIRECCION DE SEGURIDAD</p></div>
      <a href="javascript:cerrarAvisoValidacion();">ACEPTAR</a>
    </div><!-- FINAL mostrarAvisoError -->
</div><!-- FINAL mostrarAviso -->
<?php
}else{
// -----------------------------------------------------------------------------------------------------------------------------------------------
// TERCERO: SI VIGILANTE Y CONTRASEÑA SON CORRECTOS SE CREAN LAS VARIABLES DE SESION Y SE MUESTRA MENSAJE DE IDENTIFICACION CORRECTA
// -----------------------------------------------------------------------------------------------------------------------------------------------
  @$UTCsesion = $_SESSION['UTCsesion'] = time();      
  @$IDvigilante = $_SESSION['IDvigilante'] = $registroVigilante[1];
  @$nombreVigilante = $_SESSION['nombreVigilante'] = $registroVigilante[3];
  @$apellidosVigilante = $_SESSION['apellidosVigilante'] = $registroVigilante[4];
  identificacionOK();
};};};
}; // Final de condicion comprobarVigilante
mysqli_close($conexion_db); // Se cierra conexion
}; //  Final función de logeo vigilante
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// TERCERA FUNCION: CAMBIO DE CONTRASEÑA POR OLVIDO
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function cambiarContrasenaOlvido(){require('02-albacon-php/05-variables-control.php');
$conexion_db;
$baseDatos;
$sql="UPDATE seguridad SET CLAVE='$claveNueva' WHERE VIGILANTE='$nickVigilante' ";
$result=mysqli_query($conexion_db,$sql);
mysqli_close($conexion_db); // Se cierra conexion
}; // Final funcion cambiar contraseña por olvido
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// TERCERA FUNCION: MOSTRAR PANTALLA RESTABLECER CONTRASEÑA DEL VIGILANTE
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mostrarRestablecerContrasena(){require('02-albacon-php/05-variables-control.php');?>
  <div id="fondoRestablecerContrasena" name="fondoRestablecerContrasena" class="oscurecerContenedor">
    <div id="restablecimientoContrasena" name="restablecimientoContrasena" class="cambioClaveGestor" style="width:28%;left:36%">
        <h3 style="color:rgba(224, 23, 50, 1);font-size:18px;margin-top:18px;">RESTABLECER CONTRASEÑA</h3>
        <p style="font-size:16px;color:rgba(0,0,0,0.8);">INDIQUE LOS SIGUIENTES DATOS</p>
    <form id="restablecerContrasena" name="restablecerContrasena" action="control.php" method="get">
      <input type="hidden" id="pasos" name="pasos" value="21"/>
        <table style="width:100%;">
          <tr>
            <td style="width:28%;text-align:right;color:rgb(0, 0, 0, 0.45);font-weight:bold;;">VIGILANTE:</td>
            <td style="width:72%;text-align:left;">&nbsp&nbsp<input type="text" id="nickVigilante" name="nickVigilante" maxlength="25" class="clave" style="width:82%;border:1px solid rgba(0,0,0,0.3);" onkeypress="return caracteresPermitidos(event)" onblur="return limpiaNueve()"/></td>
          </tr>
          <tr>
            <td style="width:28%;text-align:right;color:rgb(0, 0, 0, 0.45);font-weight:bold;">Nº EMPLEADO:</td>
            <td style="width:72%;text-align:left;">&nbsp&nbsp<input type="text" id="numeroNominaVigilante" name="numeroNominaVigilante" maxlength="10" class="clave" style="width:82%;border:1px solid rgba(0,0,0,0.3);" onkeypress="return caracteresPermitidos(event)" onblur=""/></td>
          </tr>
        </table>
        <br>
        <table style="width:100%;">
          <tr>
            <td style="width:50%;text-align:right;">
              <button class="boton" style="width:100px;height:26px;" onclick="return validarDatosVigilante()">ENVIAR</button>
            </td>
    </form>
    <form action="control.php" method="get"> 
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
// CUARTA FUNCION: VALIDAR DATOS DEL VIGILANTE POR OLVIDO CONTRASEÑA
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function validarDatosVigilante(){require('02-albacon-php/05-variables-control.php');
  $conexion_db;
  $baseDatos;
  $sql="SELECT * FROM seguridad WHERE VIGILANTE='$nickVigilante' ";
  $result=mysqli_query($conexion_db,$sql);
  $registroNickVigilante=mysqli_fetch_array($result);
  // 1) SE COMPRUEBA QUE EL USUARIO EXISTA
  if(@utf8_encode($registroNickVigilante[5])<>$nickVigilante){?>
      <div id="avisoErrorValidacionVigilante" name="avisoErrorValidacionVigilante" class="oscurecerContenedor">
        <div id="mostrarAviso" name="mostrarAviso" class="mostrarAvisoControl">
          <div class="tituloAviso">INFORMACION IMPORTANTE</div>
          <div class="mensajeAviso">DEBE INDICAR UN USUARIO VALIDO</div>
            <a href="control.php?pasos=20" class="boton">ACEPTAR</a>
        </div><!-- FINAL mostrarAvisoError -->
      </div><!-- FINAL mostrarAviso -->
  <?php
  }else{
  // 2) SE COMPRUEBA QUE EL NUMERO DE NOMINA SEA CORRECTO
  if(@utf8_encode($registroNickVigilante[2])<>$numeroNominaVigilante){?>
      <div id="avisoErrorValidacion" name="avisoErrorValidacion" class="oscurecerContenedor">
        <div id="mostrarAviso" name="mostrarAviso" class="mostrarAvisoControl">
          <div class="tituloAviso">INFORMACION IMPORTANTE</div>
          <div class="mensajeAviso">EL NUMERO DE NOMINA NO COINCIDE</div>
            <a href="control.php?pasos=20" class="boton">ACEPTAR</a>
        </div><!-- FINAL mostrarAvisoError -->
      </div><!-- FINAL mostrarAviso -->
  <?php
  }else{
  // 3) SE COMPRUEBA SI EL VIGILANTE ESTA O NO CADUCADO
  // 1)Se operamos con la fecha UTC de hoy para ver si es un vigilante caducado
  @$utc=time();
  @$utc=date("d/m/Y", $utc);
  //@$utc='10/10/2024'; // AQUI SE PUEDE CAMBIAR UTC PARA COMPROBAR EL FUNCIONAMIENTO DE LA VALIZACION
  @$fechaUTC=explode('/', $utc);
  @$diaUTC=$fechaUTC[0];@$mesUTC=$fechaUTC[1];@$anioUTC=intval($fechaUTC[2]);
    if($diaUTC[0]=='0'){$diaUTC=$diaUTC[1];}else{$diaUTC=$diaUTC;intval($diaUTC);};
    if($mesUTC[0]=='0'){$mesUTC=$mesUTC[1];}else{$mesUTC=$mesUTC;intval($mesUTC);};
  // 2) Operamos la fecha de validez "$registroNickVigilante[11]"
  @$fechaValidez=explode('/', $registroNickVigilante[11]);
  @$diaValidez=$fechaValidez[0];@$mesValidez=$fechaValidez[1];@$anioValidez=intval($fechaValidez[2]);
    if($diaValidez[0]=='0'){$diaValidez=$diaValidez[1];}else{$diaValidez=$diaValidez;intval($diaValidez);};
    if($mesValidez[0]=='0'){$mesValidez=$mesValidez[1];}else{$mesValidez=$mesValidez;intval($mesValidez);};
  // 3) Se comparan fechas y se pone: "Vigilante no válido - caducado"
    if($anioUTC>$anioValidez){$caducado='si';}
      else{if($anioUTC==$anioValidez & $mesUTC>$mesValidez){$caducado='si';}
        else{if($anioUTC>=$anioValidez & $mesUTC==$mesValidez & $diaUTC>$diaValidez){$caducado='si';}else{$caducado='no';};};};
  if($caducado=='si'){?>
    <div id="avisoErrorValidacion" name="avisoErrorValidacion" class="oscurecerContenedor">
      <div id="mostrarAviso" name="mostrarAviso" class="mostrarAvisoControl">
        <?php //echo 'caducado: '.$caducado; ?>
        <div class="tituloAviso">INFORMACION IMPORTANTE</div>
        <div class="mensajeAviso">EL USUARIO-VIGILANTE NO ES VALIDO POR CADUCIDAD<br>PONGASE EN CONTACTO CON LA DIRECCION DE SEGURIDAD</div>        
          <a href="control.php?pasos=20" class="boton">ACEPTAR</a>
    </div><!-- FINAL mostrarAvisoError -->
  </div><!-- FINAL mostrarAviso -->
  <?php
  
  //  3.2) Se comprueba que ya haya usado el programa alguna vez
  }else{
  // SE EVALUA QUE HAYA USADO ALGUNA VEZ EL PROGRAMA
  if($registroNickVigilante[6]<>'null'){?>
    <div id="fondoCambioClave" name="fondoCambioClave" class="oscurecerContenedor">
      <div id="cambioClave" name="cambioClave" class="cambioClaveVigilante" style="height:auto;padding-bottom:10px;">
        <h3 style="color:rgb(224, 23, 50, 1);font-size:18px;margin-top:20px;">ACTUALIZAR CONTRASEÑA</h3>
    <form id="cambioContrasena" name="cambioContrasena" action="control.php" method="get">
      <input type="hidden" id="pasos" name="pasos" value="22"/>
      <input type="hidden" id="nickVigilante" name="nickVigilante" value="<?php echo $nickVigilante; ?>"/>
        <table style="width:100%;margin-top:20px;">
          <tr>
            <td style="width:40%;text-align:right;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin-left:160px;">NUEVA&nbsp&nbspCONTRASEÑA:&nbsp&nbsp&nbsp&nbsp</td>
            <td style="width:60%;text-align:left;">&nbsp&nbsp<input type="text" id="claveNueva" name="claveNueva" class="clave" maxlength="14"  style="width:82%;border:1px solid rgba(0,0,0,0.3);" onkeypress="return caracteresPermitidos(event)"/></td>
          </tr>
          <tr>
            <td style="width:40%;text-align:right;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin-left:70px;">REPETIR&nbsp&nbspCONTRASEÑA:&nbsp&nbsp</td>
            <td style="width:60%;text-align:left;">&nbsp&nbsp<input type="text" id="claveNuevaRepetida" name="claveNuevaRepetida" class="clave" maxlength="14"  style="width:82%;border:1px solid rgba(0,0,0,0.3);" onkeypress="return caracteresPermitidos(event)"/></td>
          </tr>
          <tr>
            <td style="width:40%;font-size:4px;"><br></td>
            <td style="width:60%;font-size:4px;"><p style="font-size:11px;text-align:left;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin:0px;padding:0px;margin-top:-2px;margin-left:10px;">
                Use mayúsculas, minúsculas y números.<br>Mínimo 8 y máximo 14 caracteres.</p>
            </td>
          </tr>
          <tr>
            <td colspan="2"><br>
              <input type="button" class="boton" style="width:120px;height:26px;" onclick="return validarClavesVigilante()" value="ACTUALIZAR"/> 
            </td>
          </tr>
        </table>
    </form>
    </div><!-- FIN div cambioClave -->
  </div><!-- FIN div fondoCambioClave -->
  <?php
    // EL USUARIO-VIGILANTE NO HA USADO NUNCA EL PROGRAMA
  }else{?>
    <div id="fondoCambioClave" name="fondoCambioClave" class="oscurecerContenedor">
      <div id="cambioClave" name="cambioClave" class="cambioClaveVigilante">
        <h3 style="color:rgb(224, 23, 50, 1);font-size:20px;margin-top:18px;">CAMBIO DE CONTRASEÑA</h3>
        <p style="font-size:18px;color:rgb(0,0,0,0.7);">ES LA PRIMERA VEZ QUE USA EL PROGRAMA<br>DEBE CAMBIAR SU CONTRASEÑA</p>
    <form id="cambioContrasena" name="cambioContrasena" action="control.php" method="get">
      <input type="hidden" id="pasos" name="pasos" value="22"/>
      <input type="hidden" id="nickVigilante" name="nickVigilante" value="<?php echo $nickVigilante; ?>"/>
        <table style="width:100%;">
          <tr>
            <td style="width:40%;text-align:right;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin-left:160px;">NUEVA&nbsp&nbspCONTRASEÑA:&nbsp&nbsp&nbsp&nbsp</td>
            <td style="width:60%;text-align:left;">&nbsp&nbsp<input type="text" id="claveNueva" name="claveNueva" class="clave" maxlength="14"  style="width:82%;border:1px solid rgba(0,0,0,0.3);" onkeypress="return caracteresPermitidos(event)"/></td>
          </tr>
          <tr>
            <td style="width:40%;text-align:right;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin-left:70px;">REPETIR&nbsp&nbspCONTRASEÑA:&nbsp&nbsp</td>
            <td style="width:60%;text-align:left;">&nbsp&nbsp<input type="text" id="claveNuevaRepetida" name="claveNuevaRepetida" class="clave" maxlength="14"  style="width:82%;border:1px solid rgba(0,0,0,0.3);" onkeypress="return caracteresPermitidos(event)"/></td>
          </tr>
          <tr>
            <td style="width:40%;font-size:4px;"><br></td>
            <td style="width:60%;font-size:4px;"><p style="font-size:11px;text-align:left;color:rgb(0, 0, 0, 0.45);font-weight:bold;margin:0px;padding:0px;margin-top:-2px;margin-left:10px;">
                Use mayúsculas, minúsculas y números.<br>Mínimo 8 y máximo 14 caracteres.</p>
            </td>
          </tr>
          <tr>
            <td colspan="2"><br>
              <input type="button" class="boton" style="width:48%;height:26px;" onclick="return validarClavesVigilante()" value="CAMBIAR CONTRASEÑA"/>
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
// QUINTA FUNCION: MOSTRAR PANTALLA DE TRABAJO DE CONTROL ACCESOS
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mostrarPantallaControl(){require('02-albacon-php/05-variables-control.php');?>
<div id="scanQR" name="scanQR" class="scanQR" style="width:30%;"><!-- Inicio div scanQR (div lateral izquierdo) -->
  <div style="position:relative;top:0px;left:-4%;width:100%;">
  <table style="width:100%;margin-top:1.6%;">
      <tr>
        <td style="text-align:right;">
          <form id="actualizarBDcontrol" action="control.php" methot="get">
            <input type="hidden" id="pasos" name="pasos" value="40"/>
            <input type="submit" class="boton" style="margin-top:4px;width:186px;height:22px;" value="ACTUALIZAR BD"/>
          </form>
        </td>
        <td style="text-align:left;">
          <form id="buscadorBDcontrol" action="control.php" methot="get">
            <input type="hidden" id="pasos" name="pasos" value="30"/>
            <input type="submit" class="boton" style="margin-top:4px;width:186px;height:22px;" onclick="" value="BUSCADOR ACCESOS"/>
          </form>
        </td>
      </tr>
    </table>
    <p style="font-size:6px;"></p>
      <hr class="bandaColor" style="position:relative;top:4px;"></hr>
      <h2 style="position:relative;top:6px;margin-bottom:8px;color:rgba(0,0,0,0.6);background-color:rgba(255, 255, 255, 0);height:14px;">COMPROBAR QR</h2><BR>
      <hr class="bandaColor" style="position:relative;top:4px;margin-bottom:2px;"></hr>
    <p style="font-size:6px;"><br></p>
  </div>   
  <div id="qr-reader" style="position:absolute;top:36px;left:-4%;width:340px;height:255px;border:6px solid red;display:inline-block;">
    <div id="qr-escaneo" style="height:0px;border:0px solid blue;display:none;">
      <img src="05-albacon-fotos/albaconQR.png" style="z-index:1001;position:absolute;margin-top:-10px;left:-4%;display:block;width:340px;height:255px;border:2px solid red" alt="QR Albacón"/>
    </div>
  </div>
  <div id="enviarQR" name="enviarQR" class="enviarQR" style="margin-top:-6px;border:0px solid black;">
    <hr class="bandaColor" style="position:relative;margin-top:12%;margin-bottom:1.6%;"></hr>
    <table style="width:100%;margin-top:0px;">
      <tr>
      <form id="enviar-qr" action="control.php" methot="get">
          <input type="hidden" id="pasos" name="pasos" value="3"/>
        <td style="width:60%;height:auto;text-align:right;">
          <input type="text" id="qr" name="qr" style="width:180px;text-align:center;outline:none;height:17px;" maxlength="22" autofocus autocomplete="off">
        </td>
        <td style="width:40%;height:auto;text-align:left;">
            <input type="submit" class="boton" style="margin-top:0px;width:122px;height:22px;" onclick="return validarInputQR();" value="COMPROBAR">
        </td>
      </form>
      </tr>
    </table>
  </div>
</div><!-- Fin div scanQR (div lateral izquierdo) -->
  
<!--<div id="datosQR" name="datosQR" class="datosQR" style="overflow-y:auto;overflow-x:none;background-image:url('05-albacon-fotos/fondo_02.png');"> Inicio div datosQR  (div lateral derecho) -->
<div id="datosQR" name="datosQR" class="datosQR" style="overflow-y:auto;overflow-x:none;background-color:rgba(0,0,0,0.1);"><!-- Inicio div datosQR  (div lateral derecho) -->

<h1 style="font-size:30px;margin-top:-10px;"><br>DIRECCION DE SEGURIDAD</h1>
  <h1>PROGRAMA DE CONTROL DE ACCESOS A "LA MUÑOZA"</h1>
  <div id="qr-leido" style="display:none;width:150px;height:25px;border:2px solid blue;"></div>
  <div id="mostrarResultadoQR" style="width:100%;height:auto;border:0px solid red;"><!-- INICIO div mostrarResultadoQR -->
<?php
  if(@$pasos==3&$qr<>''){mostrarResultadoQR();};
?>
  </div><!-- FINAL div mostrarResultadoQR -->


<!-- Mostrar error dentro del la pantalla de trabajo ******************************************************** -->

<div id="mostrarAvisoVacioQR" name="mostrarAvisoVacioQR" class="oscurecerContenedor" style="display:none;">
  <div id="mostrarAviso" name="mostrarAviso" class="mostrarAviso" style="">
    <div id="tituloAvisoDos" class="tituloAviso">INFORMACION INCOMPLETA</div>
    <div id="mensajeAvisoDos" class="mensajeAviso">NO SE HA INTRODUCIDO NINGUN CODIGO-QR</div>
      <a href="javascript:cerrarAvisoVacioQR();">ACEPTAR</a>
  </div><!-- FINAL mostrarAvisoError --> 
</div><!-- FINAL mostrarAvisoQR -->
</div><!-- FINAL div datosQR (div lateral derecho -->
<?php
}; // Final funcion de pantalla de trabajo control de accesos
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// SEXTA FUNCION: MOSTRAR RESULTADO DE CODIGO QR ESCANEADO
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mostrarResultadoQR(){require('02-albacon-php/05-variables-control.php');
// 1) SE EXTRAEN LOS DATOS DE LA BASE DE CONTROL DEL MES ACTUAL PARA GENERAR UNA PANTALLA EDITABLE CON LOS DATOS
$conexion_db;
$baseDatos;
// 1.1) Se crean las variables de dia y mes UTC de hoy para formar el nombre de la tabla en la que se realiza la busqueda del QR
@$utc=time();
@$utc=date("Y/m/d", $utc);
//$utc = '2025/02/28';
@$fechaHoy=explode('/', $utc);
@$diaHoy=intval($fechaHoy[2]);
@$mesHoy=intval($fechaHoy[1]);
@$anioHoy=intval($fechaHoy[0]);
// 1.2) Se crea el nombre de la tabla donde se busca
$nombreTabla = 'mes_'.$mesHoy;

$sql="SELECT * FROM $nombreTabla WHERE CODIGO_QR='$qr' ";
$result=mysqli_query($conexion_db,$sql);
$numResultados = mysqli_num_rows($result);
$mostrarQR=mysqli_fetch_array($result);

@$solicitante=$mostrarQR['ID_SOLICITANTE'];
$sql01="SELECT * FROM solicitantes WHERE ID='$solicitante' ";
$result01=mysqli_query($conexion_db,$sql01);
$verSolicitante=mysqli_fetch_array($result01);
@$solicitanteAcceso = @$verSolicitante['NOMBRE'].' '.@$verSolicitante['APELLIDOS'];

//echo '<br>NUMERO DE RESULTADOS: '.$numResultados.' - NOMBRE DE LA TABLA: '.$nombreTabla.' - '.$qr;
//echo '<br>FECHA DE HOY: '.$diaHoy.' - '.$mesHoy.' - '.$anioHoy;

// 3) SE FORMATO A LA FECHA DE SOLICITUD
@$fechaSolicitud = explode('-',$mostrarQR['FECHA_SOLICITUD']);
@$fechaSolicitud = $fechaSolicitud[2].'/'.$fechaSolicitud[1].'/'.$fechaSolicitud[0];

// Se crean las variables del dia del inicial y final para comparar con el dia hoy
@$fechaInicio = explode('/',$mostrarQR['FECHA_INICIO']);
@$diaInicio = intval($fechaInicio[0]);
@$mesInicio = intval($fechaInicio[1]);
@$anioInicio = intval($fechaInicio[2]);
@$fechaFinal = explode('/',$mostrarQR['FECHA_FINAL']);
@$diaFinal = intval($fechaFinal[0]);
@$mesFinal = intval($fechaFinal[1]);
@$anioFinal = intval($fechaFinal[2]);
/*
echo '<br>FECHA HOY: '.$utc;
echo '<br>Día HOY: '.$diaHoy;
echo '<br>Mes HOY: '.$mesHoy;
echo '<br>Año HOY: '.$anioHoy;
echo '<br>';
echo '<br>FECHA INICIO: '.$mostrarQR['FECHA_INICIO'];
echo '<br>Dia INICIAL: '.$diaInicio;
echo '<br>MES INICIAL: '.$mesInicio;
echo '<br>Año INICIAL: '.$anioInicio;
*/
// Se crean las variables para dar estilo al text observaciones
@$textoObservaciones = explode(' ',$mostrarQR['OBSERVACIONES']);
@$textoObservaciones = $textoObservaciones[0].' '.$textoObservaciones[1];
if($textoObservaciones=='ANULADO EL'){$color='color:rgba(230, 62, 20, 1);font-weight:bold;';};

// PRIMERA COMBROBACION: DEBE HABER ALGUN RESULTADO EN LA BUSQUEDA  --------------------------------------------------------------------------
if($numResultados==0){;
?>
<div id="mostrarAvisoNoCoincideQR" name="mostrarAvisoNoCoincideQR" class="oscurecerContenedor" style="">
  <div id="mostrarAvisoDos" name="mostrarAvisoDos" class="mostrarAviso" style="">
    <div id="tituloAvisoDos" class="tituloAviso"><h3 style="font-size:20px;height:30px;">AVISO IMPORTANTE</h3>CODIGO QR NO ENCONTRADO</div>
    <div id="mensajeAvisoDos" class="mensajeAviso" style="font-size:16px;">NO HAY COINCIDENCIAS CON EL CODIGO QR INTRODUCIDO</div>
      <form id="atras" name="atras" action="control.php" method="get">
        <input type="hidden" name="pasos" value="2"/>
        <input type="hidden" name="qr" value="0"/>
        <button id="pasos" value="2" class="boton" style="width:90px;height:24px;font-size:14px;" onclick="cerrarAvisoNoCoincideQR();">ACEPTAR</button>
      </form>
  </div>
</div>
<?php
}else{
// SEGUNDA COMPROBACION: LA FECHA DE HOY NO PUEDE SER MENOR QUE LA FECHA DE INICIO  -----------------------------------------------------------
if($mesFinal<$mesHoy){ // ESTE CASO EN PRINCIPIO NO LO VAMOS A ENCONTRAR PORQUE ES DE MESES ANTERIORES
?>
<div id="mostrarErrorQR" name="mostrarErrorQR" class="oscurecerContenedor" style="">
  <div id="mostrarAvisoDos" name="mostrarAvisoDos" class="mostrarAviso" style="">
    <div id="tituloAvisoDos" class="tituloAviso"><h3 style="font-size:20px;height:30px;">AVISO IMPORTANTE</h3>CODIGO QR NO ENCONTRADO</div>
    <div id="mensajeAvisoDos" class="mensajeAviso" style="font-size:16px;">COMPRUEBE LAS FECHAS DEL ACCESO SOLICITADO<br>EN EL CORREO RECIBIDO CON EL CODIGO QR CORRESPONDIENTE</div>
      <form id="atras" name="atras" action="control.php" method="get">
        <input type="hidden" name="pasos" value="2"/>
        <input type="hidden" name="qr" value="0"/>
        <button class="boton" style="width:90px;height:24px;font-size:14px;" onclick="cerrarErrorQR();">ACEPTAR</button>
      </form>
  </div>
</div>
<?php
;}else{ // CONDICION PARA TODOS LOS CASOS QUE SON CORRECTOS
if(($mesFinal==$mesHoy&($diaInicio<=$diaHoy&$diaHoy<=$diaFinal))||($mesInicio<$mesHoy&$diaHoy<=$diaFinal)||($mesFinal>$mesHoy&($diaFinal<=$diaHoy&$diaHoy>=$diaInicio))){
?>
<div id="fondoResultadoQR" name="fondoResultadoQR" class="oscurecerContenedor" style="width:100%;">
  <div id="mostrarResultadoQR" name="mostrarResultadoQR" class="mostrarResultadoQR" style="left:1%;width:98%;top:4%;background-image:url('fotos-archivos/Iberia/Logo-Blanco-03.png');">
    <h1 style="margin:0px;padding:0px;padding-top:22px;">DATOS DEL ACCESO CONSULTADO</h1>
  <form id="aceptarAccesoQR" name="aceptarAccesoQR" action="control.php" method="get"> 
  <table id="tablaUnoQR" class="tablaQR" style="left:15%;border:none;width:70%;">
    <tr>
      <td style="width:24%;border: 0px solid red;font-weight: bold;">FECHA DE LA SOLICITUD:&nbsp&nbsp</td>
      <td style="width:48%;border: 0px solid red;font-weight: bold;"><?php echo $fechaSolicitud;?></td>
    </tr>
    <tr>
      <td style="width:24%;border: 0px solid red;font-weight: bold;">SOLICITANTE DEL ACCESO:&nbsp&nbsp</td>
      <td style="width:48%;border: 0px solid red;font-weight: bold;"><?php echo $solicitanteAcceso.'&nbsp&nbsp/&nbsp&nbspTELF.:&nbsp&nbsp'.$verSolicitante['TELEFONO'];?></td>
    </tr>
  </table>
  <div id="bloqueDatosPersonales" name="bloqueDatosPersonales" class="bloqueDatosQR"><!-- Inicio div bloqueDatosPersonales -->
    <div id="primeraFilaPersonales" class="filaQR" style="margin-top:0%;"><!-- Inicio div primeraFilaPersonales -->
      <div class="encabezadoQR" style="width:16%;">DNI / PASAPORTE:</div>
      <div class="datoQR" style="width:80%;border:none;">
        <input type="text" id="datoDniQR" name="datoDniQR" class="inputDatoQR" style="width:34%;" placeholder="<?php echo $mostrarQR['DNI'];?>" value="<?php echo $mostrarQR['DNI'];?>" autocomplete="off">
      </div>
    </div><!-- Final div primeraFilaPersonales -->
    <div id="segundaFilaPersonales" class="filaQR"><!-- Inicio div segundaFilaPersonales -->
      <div class="encabezadoQR" style="width:16%;">NOMBRE:</div>
      <div class="datoQR" style="width:40%;border:none;">
        <input type="text" id="datoNombreQR" name="datoNombreQR" class="inputDatoQR" style="width:80%;" placeholder="<?php echo $mostrarQR['NOMBRE'];?>" value="<?php echo $mostrarQR['NOMBRE'];?>" autocomplete="off">
      </div>
      <div class="encabezadoQR" style="width:12%;">EMPRESA:</div>
      <div class="datoQR" style="width:28.2%;border:none;">
        <input type="text" id="datoEmpresaQR" name="datoEmpresaQR" class="inputDatoQR" style="width:100%;" placeholder="<?php echo $mostrarQR['EMPRESA'];?>" value="<?php echo $mostrarQR['EMPRESA'];?>" autocomplete="off">
      </div>
    </div><!-- Final div segundaFilaPersonales -->
    <div class="filaQR"><!-- Inicio div terceraFilaPersonales -->
      <div class="encabezadoQR" style="width:16%;">APELLIDOS:</div>
      <div class="datoQR" style="width:40%;border:none;">
        <input type="text" id="datoApellidosQR" name="datoApellidosQR" class="inputDatoQR" style="width:98%;" placeholder="<?php echo $mostrarQR['APELLIDOS'];?>" value="<?php echo $mostrarQR['APELLIDOS'];?>" autocomplete="off">
      </div>
      <div class="encabezadoQR" style="width:12%;">VEHICULO:</div>
      <div class="datoQR" style="width:28.2%;border:none;">
        <input type="text" id="datoVehiculoQR" name="datoVehiculoQR" class="inputDatoQR" style="width:100%;" placeholder="<?php echo $mostrarQR['VEHICULO'];?>" value="<?php echo $mostrarQR['VEHICULO'];?>" autocomplete="off">
      </div>
    </div><!-- Final div terceraaFilaPersonales -->
  </div><!-- Final div bloqueDatosPersonales -->
  <br>
  <div id="bloqueDatosAcceso" name="bloqueDatosAcceso" class="bloqueDatosQR"><!-- Inicio div bloqueDatosAcceso -->
    <div id="primeraFilaAcceso" class="filaQR" style="margin-top:0%;"><!-- Inicio div primeraFilaAcceso -->
      <div class="encabezadoQR" style="width:12.5%;text-align:center;font-weight: bold;">FECHA INICIO</div>
      <div class="encabezadoQR" style="width:12.5%;text-align:center;font-weight: bold;">FECHA FINAL</div>
      <div class="encabezadoQR" style="width:34.5%;text-align:center;font-weight: bold;">EDIFICIO A VISITAR</div>
      <div class="encabezadoQR" style="width:36%;text-align:center;font-weight: bold;">MOTIVO DE LA VISITA</div>
    </div><!-- Final div primeraFilaAcceso -->
    <div id="segundaFilaAcceso" class="filaQR" style=""><!-- Inicio div segundaFilaPersonales -->
      <div class="datoQR" style="width:13%;text-align:center;background-color: rgba(255, 255, 255, 1);"><?php echo $mostrarQR['FECHA_INICIO'];?></div>
      <div class="datoQR" style="width:13%;text-align:center;background-color: rgba(255, 255, 255, 1);"><?php echo $mostrarQR['FECHA_FINAL'];?></div>
      <div class="datoQR" style="width:35%;text-align:center;background-color: rgba(255, 255, 255, 1);"><?php echo $mostrarQR['EDIFICIO_VISITA'];?></div>
      <div class="datoQR" style="width:36.5%;text-align:center;background-color: rgba(255, 255, 255, 1);"><?php echo $mostrarQR['MOTIVO'];?></div>
    </div><!-- Final div segundaFilaAcceso -->
  </div><!-- Final div bloqueDatosAccesso -->
  <br>
  <div id="bloqueDatosObservaciones" name="bloqueDatosObservaciones" class="bloqueDatosQR"><!-- Inicio div bloqueDatosPersonales -->
    <div id="primeraFilaObservaciones" class="filaQR" style="margin-top:0%;"><!-- Inicio div primeraFilaPersonales -->
      <div class="encabezadoQR" style="width:16%;">OBSERVACIONES:</div>
      <div class="datoQR" style="width:81.7%;border:none;">
        <input type="text" id="datoObservacionesQR" name="datoObservacionesQR" class="inputDatoQR" style="width:100%;<?php echo $color;?>" placeholder="<?php echo $mostrarQR['OBSERVACIONES'];?>" value="<?php echo $mostrarQR['OBSERVACIONES'];?>" autocomplete="off">
      </div>
    </div><!-- Final div primeraFilaObservaciones -->
  </div><!-- Final div bloqueDatosObservaciones -->
  <br>
  <table id="tablaCincoQR" class="tablaQR" style="border:none;text-align:left;">
    <tr>
    <?php if(utf8_encode($solicitanteAcceso)<>utf8_encode($mostrarQR['RESPONSABLE_VISITA'])){?>
      <td style="width:24%;border: 0px solid red;font-weight: bold;">RESONSABLE DE LA VISITA:&nbsp&nbsp</td>
      <td style="width:76%;border: 0px solid red;font-weight: bold;">
        <?php echo $mostrarQR['RESPONSABLE_VISITA'].'&nbsp&nbsp/&nbsp&nbspTELF.:&nbsp&nbsp'.$mostrarQR['TELEFONO_RESPONSABLE']; ?>
      </td>
      <?php }else{};?>
    </tr>
  </table>
  <br>
  <table id="tablaSeisQR" class="tablaQR" style="margin-left:0px;margin-bottom:1%;border:none;">
    <tr>
      <td style="width:50%;text-align:right;">
        <input type="hidden" id="pasos" name="pasos" value="<?php if($textoObservaciones=='ANULADO EL'){echo '2';}else{echo '4';};?>"/>
        <input type="hidden" id="qrEscaneado" name="qrEscaneado" value="<?php echo $qr;?>"/>
        <input type="submit" id="aceptarAcceso" name="aceptarAcceso" class="boton" style="width:100px;height:24px;font-size:14px;" value="ACEPTAR"/>
      </td>
    </form>
      <td style="text-align:left;width:50%;">
        <form id="cancelarMostarAcceso" name="cancelarMostrarAcceso" action="control.php" method="get">
          <input type="hidden" id="pasos" name="pasos" value="2"/>
          <input type="submit" class="boton" style="width:100px;height:24px;font-size:14px;" name="cancelar" value="CANCELAR">
        </form>
      </td>
    </tr>
  </table>
  </br>
  </div><!-- Final div "mostrar resultado QR" -->
</div><!-- Final div "fondo de mostrar resultado QR" -->

<?php
;}else{ // FINAL del if de comparacion fechas
?>
<div id="mostrarErrorQR" name="mostrarErrorQR" class="oscurecerContenedor" style="">
  <div id="mostrarAvisoDos" name="mostrarAvisoDos" class="mostrarAviso" style="">
  <div id="tituloAvisoDos" class="tituloAviso"><h3 style="font-size:20px;height:30px;">AVISO IMPORTANTE</h3>CODIGO QR NO ENCONTRADO</div>
  <div id="mensajeAvisoDos" class="mensajeAviso" style="font-size:16px;">COMPRUEBE LAS FECHAS DEL ACCESO SOLICITADO<br>EN EL CORREO RECIBIDO CON EL CODIGO QR CORRESPONDIENTE</div>
    <form id="atras" name="atras" action="control.php" method="get">
      <input type="hidden" name="pasos" value="2"/>
      <input type="hidden" name="qr" value="0"/>
      <button class="boton" style="width:90px;height:24px;font-size:14px;" onclick="cerrarErrorQR();">ACEPTAR</button>
    </form>
  </div>
</div>
<?php
;}  // Final else mostrar ERROR
;}  // Final primrer else correspondiente a meses anteriores
;}; // Final de la condición para mostrar los resultados si UNO
mysqli_close($conexion_db); // Se cierra conexión
}; // Final FUNCION MOSTRAR RESULTADO QR ESCANEADO
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// SEPTIMA FUNCION: ACEPTAR Y ACTUALIZAR ACCESO QR ESCANEADO EN LA BASE DE DATOS DEL MES
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function actualizaAccesoQR(){require('02-albacon-php/05-variables-control.php');
// PRIMERO: SE FORMATEAN LOS DATOS
//@$actualizarDNI=str_replace('-','',str_replace(' ','-',strtoupper(preg_replace('/\s+/', ' ',trim($actualizarDNI)))));
@$actualizarDNI= strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('.','',(str_replace('-','',str_replace(' ','-',str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
  array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
  array('a','A','e','E','i','I','o','O'.'u','U'),
  $actualizarDNI))))))))));
@$actualizarNombre= strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
  array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
  array('a','A','e','E','i','I','o','O'.'u','U'),
  $actualizarNombre))))));
@$actualizarApellidos= strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
  array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
  array('a','A','e','E','i','I','o','O'.'u','U'),
  $actualizarApellidos))))));
@$actualizarEmpresa= strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
  array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
  array('a','A','e','E','i','I','o','O'.'u','U'),
  $actualizarEmpresa))))));
@$actualizarVehiculo= strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
  array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
  array('a','A','e','E','i','I','o','O'.'u','U'),
  $actualizarVehiculo))))));
@$actualizarObservaciones= strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
  array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
  array('a','A','e','E','i','I','o','O'.'u','U'),
  $actualizarObservaciones))))));
// 2) Se realiza la conexion con la BD_puente
$conexion_db;
$baseDatos;
// 3) Se crean las variables de dia y mes UTC de hoy para formar el nombre de la tabla en la que se actualizan los accesos correspondientes
@$utc=time();
@$utc=date("Y/m/d", $utc);
@$fechaHoy=explode('/', $utc);
// @$diaHoy=intval($fechaHoy[2]);
@$diaHoy=strval($fechaHoy[2]);
@$mesHoy=intval($fechaHoy[1]);
@$anioHoy=intval($fechaUTC[0]);
@$diaActualizado='DIA_'.$diaHoy;
// TENER EN CUENTA LA ZONA HORARIA DEL PAIS (HABRA QUE CREAR UNA VARIABLE CON EL PAIS/CIUDAD)
date_default_timezone_set("Europe/Madrid");
@$hora=date("H:i");
// 4) Se actualizan los datos y se añade la hora de entrada en la BD de control del mes en curso
$nombreTabla = 'mes_'.$mesHoy;
$sql="UPDATE $nombreTabla SET DNI='$actualizarDNI',NOMBRE='$actualizarNombre',APELLIDOS='$actualizarApellidos',EMPRESA='$actualizarEmpresa',
VEHICULO='$actualizarVehiculo',OBSERVACIONES='$actualizarObservaciones', $diaActualizado='$hora' WHERE CODIGO_QR='$qrEscaneado' ";
$result=mysqli_query($conexion_db,$sql);
mysqli_close($conexion_db); //Se cierra conexion
}; // Final FUNCION ACTUALIZAR DATOS ACCESO QR ESCANEADO Y AÑADIR HORA
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// OCTAVA FUNCION: PASAR DATOS DE BD_PUENTE A BD_CONTROL ACCESOS DEL MES CORRESPONDIENTE (SE EJECUTA PROGRAMADA O POR ACCION DE UN BOTON)
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function actualizarBDcontrol(){require('02-albacon-php/05-variables-control.php');
// 1) SE REALIZA LA CONEXION Y SE CREAN LAS VARIABLES PARA FORMAR LOS NOMBRES DE LAS TABLAS DE CONTROL DE ACCESO MENSUALES
$conexion_db;
$baseDatos;

@$utc=time();
@$utc=date("Y/m/d", $utc);

@$fechaHoy=explode('/', $utc);
@$diaHoy=intval($fechaHoy[0]);
@$mesHoy=intval($fechaHoy[1]);
@$anioHoy=intval($fechaUTC[2]);

@$nombreTabla = 'mes_'.$mesHoy;
@$mesHoy01 = $mesHoy+1;
@$nombreTabla01 = 'mes_'.$mesHoy01;
@$mesHoy02 = $mesHoy+2;
@$nombreTabla02 = 'mes_'.$mesHoy02;

// 2) SE PASAN LOS ACCESOS CON MES DE INICIO Y MES FINAL IGUAL AL MES ACTUAL Y SE BORRAN INMEDIATAMENTE DE BD_PUENTE
$sql00="INSERT INTO $nombreTabla (CODIGO_QR,FECHA_SOLICITUD,DNI,NOMBRE,APELLIDOS,EMPRESA,VEHICULO,FECHA_INICIO,FECHA_FINAL,MOTIVO,EDIFICIO_VISITA,ID_RESPONSABLE,RESPONSABLE_VISITA,TELEFONO_RESPONSABLE,OBSERVACIONES,ID_SOLICITANTE,PROCESADO) 
SELECT CODIGO_QR,FECHA_SOLICITUD,DNI,NOMBRE,APELLIDOS,EMPRESA,VEHICULO,FECHA_INICIO,FECHA_FINAL,MOTIVO,EDIFICIO_VISITA,ID_RESPONSABLE,RESPONSABLE_VISITA,TELEFONO_RESPONSABLE,OBSERVACIONES,ID_SOLICITANTE,PROCESADO
FROM accesos_puente WHERE MES_INICIO = '$mesHoy' AND MES_FINAL = '$mesHoy' ";
$result00=mysqli_query($conexion_db,$sql00);

//  ******************************************************************  OJO FECHA DE SOLICITUD  (cambiada para probar)
$sql00="DELETE FROM accesos_puente WHERE FECHA_SOLICITUD<='$utc' AND MES_INICIO = '$mesHoy' AND MES_FINAL = '$mesHoy' ";
$result=mysqli_query($conexion_db,$sql00);

// 3) SE PASAN LOS ACCESOS CON MES DE INICIO IGUAL AL ACTUAL Y MES FINAL EN EL SIGIENTE MES Y SE BORRAN INMEDIATAMENTE DE BD_PUENTE (NO PUEDEN HABER ACCESOS CON COMIENZO EN MES_HOY+2)
// 3.1) En primer lugar se incluye en la tabla del mes actual
$sql01="INSERT INTO $nombreTabla (CODIGO_QR,FECHA_SOLICITUD,DNI,NOMBRE,APELLIDOS,EMPRESA,VEHICULO,FECHA_INICIO,FECHA_FINAL,MOTIVO,EDIFICIO_VISITA,ID_RESPONSABLE,RESPONSABLE_VISITA,TELEFONO_RESPONSABLE,OBSERVACIONES,ID_SOLICITANTE,PROCESADO) 
SELECT CODIGO_QR,FECHA_SOLICITUD,DNI,NOMBRE,APELLIDOS,EMPRESA,VEHICULO,FECHA_INICIO,FECHA_FINAL,MOTIVO,EDIFICIO_VISITA,ID_RESPONSABLE,RESPONSABLE_VISITA,TELEFONO_RESPONSABLE,OBSERVACIONES,ID_SOLICITANTE,PROCESADO
FROM accesos_puente WHERE MES_INICIO = '$mesHoy' AND MES_FINAL = '$mesHoy01' ";
$result01=mysqli_query($conexion_db,$sql01);
// 3.2) En segundo lugar se incluye en la tabla del mes siguiente al actual
$sql01="INSERT INTO $nombreTabla01 (CODIGO_QR,FECHA_SOLICITUD,DNI,NOMBRE,APELLIDOS,EMPRESA,VEHICULO,FECHA_INICIO,FECHA_FINAL,MOTIVO,EDIFICIO_VISITA,ID_RESPONSABLE,RESPONSABLE_VISITA,TELEFONO_RESPONSABLE,OBSERVACIONES,ID_SOLICITANTE,PROCESADO) 
SELECT CODIGO_QR,FECHA_SOLICITUD,DNI,NOMBRE,APELLIDOS,EMPRESA,VEHICULO,FECHA_INICIO,FECHA_FINAL,MOTIVO,EDIFICIO_VISITA,ID_RESPONSABLE,RESPONSABLE_VISITA,TELEFONO_RESPONSABLE,OBSERVACIONES,ID_SOLICITANTE,PROCESADO
FROM accesos_puente WHERE MES_INICIO = '$mesHoy' AND MES_FINAL = '$mesHoy01' ";
$result01=mysqli_query($conexion_db,$sql01);

//  ******************************************************************  OJO FECHA DE SOLICITUD  (cambiada para probar)
$sql01="DELETE FROM accesos_puente WHERE FECHA_SOLICITUD<='$utc' AND MES_INICIO = '$mesHoy' AND MES_FINAL = '$mesHoy01' ";
$result=mysqli_query($conexion_db,$sql01);

// 4) SE PASAN LOS ACCESOS CON MES DE INICIO Y FINAL EN EL SIGIENTE MES Y SE BORRAN INMEDIATAMENTE DE BD_PUENTE (NO PUEDEN HABER ACCESOS CON COMIENZO EN MES_HOY+2)
$sql02="INSERT INTO $nombreTabla01 (CODIGO_QR,FECHA_SOLICITUD,DNI,NOMBRE,APELLIDOS,EMPRESA,VEHICULO,FECHA_INICIO,FECHA_FINAL,MOTIVO,EDIFICIO_VISITA,ID_RESPONSABLE,RESPONSABLE_VISITA,TELEFONO_RESPONSABLE,OBSERVACIONES,ID_SOLICITANTE,PROCESADO) 
SELECT CODIGO_QR,FECHA_SOLICITUD,DNI,NOMBRE,APELLIDOS,EMPRESA,VEHICULO,FECHA_INICIO,FECHA_FINAL,MOTIVO,EDIFICIO_VISITA,ID_RESPONSABLE,RESPONSABLE_VISITA,TELEFONO_RESPONSABLE,OBSERVACIONES,ID_SOLICITANTE,PROCESADO
FROM accesos_puente WHERE MES_INICIO = '$mesHoy01' AND MES_FINAL = '$mesHoy01' ";
$result02=mysqli_query($conexion_db,$sql02);

//  ******************************************************************  OJO FECHA DE SOLICITUD  (cambiada para probar)
$sql02="DELETE FROM accesos_puente WHERE FECHA_SOLICITUD<='$utc' AND MES_INICIO = '$mesHoy01' AND MES_FINAL = '$mesHoy01' ";
$result=mysqli_query($conexion_db,$sql02);

// 5) SE PASAN LOS ACCESOS CON MES DE INICIO IGUAL AL MES SIGUIENTE Y MES FINAL EN EL SIGIENTE +1 Y SE BORRAN INMEDIATAMENTE DE BD_PUENTE (NO PUEDEN HABER ACCESOS CON COMIENZO EN MES_HOY+2)
// 5.1) En primer lugar se incluye en la tabla del mes siguiente
$sql01="INSERT INTO $nombreTabla01 (CODIGO_QR,FECHA_SOLICITUD,DNI,NOMBRE,APELLIDOS,EMPRESA,VEHICULO,FECHA_INICIO,FECHA_FINAL,MOTIVO,EDIFICIO_VISITA,ID_RESPONSABLE,RESPONSABLE_VISITA,TELEFONO_RESPONSABLE,OBSERVACIONES,ID_SOLICITANTE,PROCESADO) 
SELECT CODIGO_QR,FECHA_SOLICITUD,DNI,NOMBRE,APELLIDOS,EMPRESA,VEHICULO,FECHA_INICIO,FECHA_FINAL,MOTIVO,EDIFICIO_VISITA,ID_RESPONSABLE,RESPONSABLE_VISITA,TELEFONO_RESPONSABLE,OBSERVACIONES,ID_SOLICITANTE,PROCESADO
FROM accesos_puente WHERE MES_INICIO = '$mesHoy01' AND MES_FINAL = '$mesHoy02' ";
$result01=mysqli_query($conexion_db,$sql01);

// 5.2) En segundo lugar se incluye en la tabla del mes siguiente al actual
$sql01="INSERT INTO $nombreTabla02 (CODIGO_QR,FECHA_SOLICITUD,DNI,NOMBRE,APELLIDOS,EMPRESA,VEHICULO,FECHA_INICIO,FECHA_FINAL,MOTIVO,EDIFICIO_VISITA,ID_RESPONSABLE,RESPONSABLE_VISITA,TELEFONO_RESPONSABLE,OBSERVACIONES,ID_SOLICITANTE,PROCESADO) 
SELECT CODIGO_QR,FECHA_SOLICITUD,DNI,NOMBRE,APELLIDOS,EMPRESA,VEHICULO,FECHA_INICIO,FECHA_FINAL,MOTIVO,EDIFICIO_VISITA,ID_RESPONSABLE,RESPONSABLE_VISITA,TELEFONO_RESPONSABLE,OBSERVACIONES,ID_SOLICITANTE,PROCESADO
FROM accesos_puente WHERE MES_INICIO = '$mesHoy01' AND MES_FINAL = '$mesHoy02' ";
$result01=mysqli_query($conexion_db,$sql01);

//  ******************************************************************  OJO FECHA DE SOLICITUD  (cambiada para probar)
$sql01="DELETE FROM accesos_puente WHERE FECHA_SOLICITUD<='$utc' AND MES_INICIO = '$mesHoy01' AND MES_FINAL = '$mesHoy02' ";
$result=mysqli_query($conexion_db,$sql01);

mysqli_close($conexion_db);
}; // Final FUNCION ACTUALIZAR BD CONTROL ACCESOS
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// NOVENA FUNCION: MOSTRAR BUSCADOR POR DNI Y NOMBRE APELLIDOS
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function buscadorControl(){require('02-albacon-php/05-variables-control.php');?>
  <div id="mostrarBuscadorControl" name="mostrarBuscadorControl" class="oscurecerContenedor" style="text-align:center;">
    <div id="mostrarBotonesBuscador" name="mostrarBotonesBuscador" class="mostrarAvisoControl" style="position:relative;float:right;margin-right:11.6%;width:46%;height:auto;top:4%;left:0%;background-image:url('fotos-archivos/Iberia/Logo-Gris-Autorizados.png');background-repeat:no-repeat;background-position:left center;background-size:230px;">
      <div id="tituloForm" class="tituloAviso" style="padding-top:4%;">BUSCAR AUTORIZADOS POR:</div>
      <form id="buscarAccesoPor" name="buscarAccesoPor" action="control.php" method="get">
          <input type="hidden" id="pasos" name="pasos" value="31"/>
        <table style="width:96%;margin-left:2%;margin-top:2%;color:rgba(0,0,0,0.5);border:0px solid black;">
          <tr>
            <td style="width:25%;text-align:left;font-weight:bold;border:0px solid black;">
              <label><input type="checkbox" id="buscarPorDNI" name="buscarDato" onclick="return encenderDatoUno()" value="dni">&nbspNº DNI / PASAPORTE</label>
            </td>
            <td colspan=3 style="width:75%;text-align:left;border:0px solid black;">
              <input type="text" id="buscarDNI" name="buscarDNI" class="inputApagadoBuscador" style="width:42%;outline:none;" maxlength="15" onkeypress="return caracteresPermitidos(event)" disabled value="">
            </td>
          </tr>
        </table>
        <table style="width:96%;margin-left:2%;margin-top:1%;color:rgba(0,0,0,0.5);">
          <tr>
            <td style="width:13%;text-align:left;font-weight:bold;border:0px solid black;">
              <label><input type="checkbox" id="buscarPorNombreApellidosAcceso" name="buscarDato" onclick="return encenderDatoDos()" value="nombre">&nbspNombre&nbsp</label>
            </td>
            <td style="width:25%;text-align:left;border:0px solid black;">
              <input type="text" id="buscarNombreAcceso" name="buscarNombreAcceso" class="inputApagadoBuscador" maxlength="20" style="width:100%;outline:none;" onkeypress="return caracteresPermitidos(event)" disabled value="">
            </td>
            <td style="width:15%;text-align:right;font-weight:bold;border:0px solid black;">
              <label id="buscarPorNombreAcceso" onclick="return encenderDatoDos()" value="apellido">Apellidos&nbsp</label>
            </td>
            <td style="width:47%;text-align:left;border:0px solid black;">
              <input type="text" id="buscarApellidosAcceso" name="buscarApellidosAcceso" class="inputApagadoBuscador" maxlength="30" style="width:98%;outline:none;" onkeypress="return caracteresPermitidos(event)" disabled value="">
            </td>
          </tr>
        </table>
        <table style="width:100%;margin-top:1%;">
          <tr>
            <td style="text-align:right;width:50%;top:10px;">
              <input type="button" id="bt-buscarPor" class="boton" style="width:40%;height:24px;font-size:14px;margin-top:8px;" onclick="return validarBuscadorControl()" value="BUSCAR">
            </td>
      </form>
      <form id="cancelarBuscadorAcceso" name="cancelarBuscadorAcceso" action="control.php" method="get">
            <td style="text-align:left;width:50%;">
              <input type="hidden" id="pasos" name="pasos" value="2"/>
              <input type="submit" class="boton" style="width:40%;height:24px;font-size:14px;margin-top:8px;" name="cancelar" value="CANCELAR">
            </td>
          </tr>
        </table>
      </form><!-- Final del form para cancelar el buscador -->
    </div><!-- FINAL mostrarAvisoError -->
  </div><!-- FINAL mostrarAviso -->
  <!-- DIVISIONES DE AVISOS *****************************************************************************************************************-->
<div id="avisoControl" name="avisoControl" class="oscurecerContenedor" style="display:none;">
  <div id="mostrarAvisoDos" name="mostrarAvisoDos" class="mostrarAvisoDosControl" style="">
    <div id="tituloAviso" class="tituloAvisoDos"></div>
    <div id="mensajeAviso" class="mensajeAvisoDos"></div>
      <a href="javascript:cerrarAvisoControl();">ACEPTAR</a>
  </div><!-- FINAL mostrarAviso -->
</div><!-- FINAL avisoAutorizados -->
<?php
}; // FINAL DE PANTALLA BUSCADOR
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// DECIMA FUNCION: MOSTRAR UN LISTADO DE LOS RESULTADOS OBTENIDOS
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mostarListadoAccesosControl(){require('02-albacon-php/05-variables-control.php');
// PRIMERO: FORMATEMOS LOS CAMPOS INPUT DE NOMBRE Y APELLIDOS DE LA VISITA
@$buscarNombreAcceso =strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
  array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
  array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['buscarNombreAcceso']))))));
@$buscarApellidosAcceso = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
  array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
  array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['buscarApellidosAcceso']))))));
// SEGUNDO: SE ESTABLECE LA CONEXION Y SE REALIZA LA CONSULTA
$conexion_db;
$baseDatos;
// PRIMERO: SE CREAN LAS VARIABLES DE LOS NOMBRES DE LAS TABLAS DE LOS MESES EN QUE SE VA A REALIZAR LAS BUSQUEDA  ------------------------------------------
@$utc=time();
@$utc=date("Y/m/d", $utc);
@$fechaHoy=explode('/', $utc);
@$diaHoy=intval($fechaHoy[0]);
@$mesHoy=intval($fechaHoy[1]);
@$anioHoy=intval($fechaUTC[2]);
$nombreTabla = 'mes_'.$mesHoy;
/*
if($mesHoy+1==13){$mesHoy01=1;}elseif($mesHoy+1==14){$mesHoy01=2;}else{$mesHoy01=$mesHoy+1;};
$nombreTabla01 = 'mes_'.$mesHoy01;
if($mesHoy+2==13){$mesHoy02=1;}elseif($mesHoy+2==14){$mesHoy02=2;}else{$mesHoy02=$mesHoy+2;};
$nombreTabla02 = 'mes_'.$mesHoy02;
*/
// SEGUNDO: SE REALIZA LA CONSULTA PARA EL MES EN CURSO
if($buscarDato == 'nombre'){$sql = "SELECT * FROM $nombreTabla WHERE NOMBRE LIKE '%$buscarNombreAcceso%' OR APELLIDOS LIKE '%$buscarApellidosAcceso%'";}
elseif($buscarDato == 'dni'){$sql = "SELECT * FROM $nombreTabla WHERE DNI = '$buscarDNI' ";}else{};

$result=mysqli_query($conexion_db,$sql);
$num = mysqli_num_rows($result);

// TERCERO: SE COMPRUEBA SI HAY ALGUNA COINCIDENCIA EN EL MES EN CURSO ($num=0)
if($num==0){?>
<div id="datosQR" name="datosQR" class="datosQR" style="height:auto;">
  <div id="mostrarSinCoincidencias" name="mostrarSinCoincidencias" class="oscurecerContenedor">
    <div id="mostrarListaAccesos" name="mostrarListaAccesos" class="mostrarAvisoDosControl" style="left:16.4%;height:auto;">
      <?php echo '<br>'.@$nombreTabla.' - '.@$nombreTabla01.' - '.@$nombreTabla02;?>
      <div id="tituloAvisoDos" class="tituloAvisoDos">AVISO IMPORTANTE</div>
      <div id="mensajeAvisoDos" class="mensajeAvisoDos">NO HAY COINCIDENCIA PARA EL RESPONSABLE INDICADO</div>
        <form action="control.php" method="get">
          <input type="hidden" id="pasos" name="pasos" value="30">
          <input type="submit" class="boton" value="CANCELAR" style="margin-top:5px;width:112px;">
        </form>
    </div><!-- Final div SIN COINCIDENCIAS -->
  </div><!-- Final de div para oscurecer contenido -->
</div><!-- Fin del marco de trabajo "datosQR" -->
<?php
}else{
//CUARTO: SE MUESTRAN LOS RESULTADOS EN UNA TABLA REALIZADA CON UN BUCLE WHILE SIEMPRE QUE HAYA MAS DE UN RESULTADO ($num>1)
?>
<div id="datosQR" name="datosQR" class="datosQR" style="height:auto;">
  <div id="mostrarAccesosEncontrados" name="mostrarAccesosEncontrados" class="oscurecerContenedor">
    <div id="mostrarAvisoDos" name="mostrarAvisoDos" class="mostrarAvisoDosControl" style="left:10%;width:50%;">
      <h1 style="margin-top:12px;font-size:18px;font-weight:bold;">LISTA ACCESOS ENCONTRADOS</h1>
      <table style="width:100%;border:0px solid rgb(68, 104, 204, 1);">
<?php
$i=1;
while($i<=$num){$accesoEncontrado=mysqli_fetch_array($result);
// En esta celda se evalua la fecha FINAL del acceso encontrado, poniendo si está caducado o en vigor
// 1) Operamos con la fecha UTC
@$utc=time();
@$utc=date("d/m/Y", $utc);
//@$utc='10/10/2023'; // AQUI SE PUEDE CAMBIAR UTC PARA COMPROBAR EL FUNCIONAMIENTO DE LA VALIZACION
@$fechaUTC=explode('/', $utc);
@$diaUTC=$fechaUTC[0];@$mesUTC=$fechaUTC[1];@$anioUTC=intval($fechaUTC[2]);
  if($diaUTC[0]=='0'){$diaUTC=$diaUTC[1];}else{$diaUTC=$diaUTC;intval($diaUTC);};
  if($mesUTC[0]=='0'){$mesUTC=$mesUTC[1];}else{$mesUTC=$mesUTC;intval($mesUTC);};
// 2) Operamos la fecha de FINAL "$accesoEncontrado[9]"
@$fechaFinal=explode('/', $accesoEncontrado[9]);
@$diaFinal=$fechaFinal[0];@$mesFinal=$fechaFinal[1];@$anioFinal=intval($fechaFinal[2]);
  if($diaFinal[0]=='0'){$diaFinal=$diaFinal[1];}else{$diaFinal=$diaFinal;intval($diaFinal);};
  if($mesFinal[0]=='0'){$mesFinal=$mesFinal[1];}else{$mesFinal=$mesFinal;intval($mesFinal);};
// 3) Se comparan fechas y se pone: "Responsable no válido - caducado"
  if($anioUTC>$anioFinal){$caducado='si';}
    else{if($anioUTC==$anioFinal & $mesUTC>$mesFinal){$caducado='si';}
    else{if($anioUTC>=$anioFinal & $mesUTC==$mesFinal & $diaUTC>$diaFinal){$caducado='si';}else{$caducado='no';};};};
?>
        <tr>
          <td style="width:6%;margin-left:6px;font-size:14px;font-weight:normal;color:rgba(0,0,0,0.7);"><?php echo '<strong>'.$i.' -</strong>';?></td>
          <td style="width:80%;font-size:14px;font-weight:normal;text-align:left;color:rgba(0,0,0,0.7);"><?php echo $accesoEncontrado[3].' / '. $accesoEncontrado[4].' '.$accesoEncontrado[5].' / <strong>del</strong> '.$accesoEncontrado[8].' <strong>al</strong> '.$accesoEncontrado[9];?></td>
          <td style="width:14%;">
<?php
  if($caducado=='si'){echo '
            <input type="submit" class="boton-2" style="width:100px;height:20px;font-size:11px;margin-right:6px;" value="CADUCADO">';}
  elseif($caducado=='no'){echo '
        <form action="control.php" method="get">
          <input type="hidden" id="pasos" name="pasos" value="32"/>    
          <input type="hidden" id="codigoQR" name="codigoQR" value="'.$accesoEncontrado[1].'"/>
          <input type="submit" class="boton" style="width:100px;height:20px;font-size:11px;margin-right:6px;" value="SELECCIONAR">';};
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
          <br>
        <form action="control.php" method="get">
          <input type="hidden" id="pasos" name="pasos" value="30"/>
          <input type="submit" class="boton" style="width:100px;height:26px;" value="CANCELAR">
        </form>
        </td>
      </tr>
    </table>
  </div><!-- Final div lista de Responsables de autorizacion -->
  </div><!-- Final de div para oscurecer contenido -->
</div>
<?php
}; //Final de ELSE para mostrar mensaje de no coincidencia
}; // Final de la funcion Validar Responsable de la autorizacion
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// UNDECIMA FUNCION: MOSTRAR DATOS DEL ACCESO SELECCIONADO
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function mostrarDatosAcceso(){require('02-albacon-php/05-variables-control.php');
$conexion_db;
$baseDatos;
// 1) SE CREAN LAS VARIABLES DE LOS NOMBRES DE LAS TABLAS DE LOS MESES EN QUE SE VA A REALIZAR LAS BUSQUEDA  ------------------------------------------
@$utc=time();
@$utc=date("Y/m/d", $utc);
@$fechaHoy=explode('/', $utc);
@$diaHoy=intval($fechaHoy[0]);
@$mesHoy=intval($fechaHoy[1]);
@$anioHoy=intval($fechaUTC[2]);
$nombreTabla = 'mes_'.$mesHoy;
/*
if($mesHoy+1==13){$mesHoy01=1;}elseif($mesHoy+1==14){$mesHoy01=2;}else{$mesHoy01=$mesHoy+1;};
$nombreTabla01 = 'mes_'.$mesHoy01;
if($mesHoy+2==13){$mesHoy02=1;}elseif($mesHoy+2==14){$mesHoy02=2;}else{$mesHoy02=$mesHoy+2;};
$nombreTabla02 = 'mes_'.$mesHoy02;
*/
// 2) SE REALIZA LA CONSULTA PARA EL MES EN CURSO POR DNI O POR NOMBRE
$sql = "SELECT * FROM $nombreTabla WHERE CODIGO_QR = '$codigoQR' ";
$result = mysqli_query($conexion_db,$sql);
$num = mysqli_num_rows($result);
$mostrarQR = mysqli_fetch_array($result);

// 3) SE FORMATO A LA FECHA DE SOLICITUD
$fechaSolicitud = explode('-',$mostrarQR['FECHA_SOLICITUD']);
$fechaSolicitud = $fechaSolicitud[2].'/'.$fechaSolicitud[1].'/'.$fechaSolicitud[0];

// 4) SE CREAN LAS VARIABLES PARA DAR ESTILO AL TEXTO DE OBSERVACIONES
@$textoObservaciones = explode(' ',$mostrarQR['OBSERVACIONES']);
@$textoObservaciones = $textoObservaciones[0].' '.$textoObservaciones[1];
if($textoObservaciones=='ANULADO EL'){$color='color:rgba(230, 62, 20, 1);font-weight:bold;';};

// 5) SE REALIZA LA CONSULTA PARA PONER EL NOMBRE DEL SOLICITANTE
@$solicitante = $mostrarQR['ID_SOLICITANTE'];
$sql00 = "SELECT * FROM solicitantes WHERE ID = '$solicitante' ";
$result00 = mysqli_query($conexion_db,$sql00);
$num = mysqli_num_rows($result00);
$datosSolicitante = mysqli_fetch_array($result00);

$solicitanteAcceso = $datosSolicitante[3].' '.$datosSolicitante[4];
$telefonoSolicitante = $datosSolicitante[12];

// 6) SE MUESTRAN LOS RESULTADOS
?>
<div id="fondoResultadoQR" name="fondoResultadoQR" class="oscurecerContenedor">
    <div id="mostrarResultadoQR" name="mostrarResultadoQR" class="mostrarResultadoQR" style="left:33%;background-image:url('fotos-archivos/Iberia/Logo-Blanco-03.png');">
      <h1 style="margin:0px;padding:0px;padding-top:22px;">DATOS DEL ACCESO CONSULTADO</h1>
  <form id="aceptarAccesoQR" name="aceptarAccesoQR" action="control.php" method="get"> 
  <table id="tablaUnoQR" class="tablaQR" style="left:15%;border:none;width:70%;">
    <tr>
      <td style="width:24%;border: 0px solid red;font-weight: bold;">FECHA DE LA SOLICITUD:&nbsp&nbsp</td>
      <td style="width:48%;border: 0px solid red;font-weight: bold;"><?php echo $fechaSolicitud;?></td>
    </tr>
    <tr>
      <td style="width:24%;border: 0px solid red;font-weight: bold;">SOLICITANTE DEL ACCESO:&nbsp&nbsp</td>
      <td style="width:48%;border: 0px solid red;font-weight: bold;"><?php echo $solicitanteAcceso.'&nbsp&nbsp/&nbsp&nbspTELF.:&nbsp&nbsp'.$telefonoSolicitante;?></td>
    </tr>
  </table>
  <div id="bloqueDatosPersonales" name="bloqueDatosPersonales" class="bloqueDatosQR"><!-- Inicio div bloqueDatosPersonales -->
    <div id="primeraFilaPersonales" class="filaQR" style="margin-top:0%;"><!-- Inicio div primeraFilaPersonales -->
      <div class="encabezadoQR" style="width:16%;">DNI / PASAPORTE:</div>
      <div class="datoQR" style="width:80%;border:none;">
        <input type="text" id="datoDniQR" name="datoDniQR" class="inputDatoQR" style="width:34%;" placeholder="<?php echo $mostrarQR['DNI'];?>" value="<?php echo $mostrarQR['DNI'];?>" autocomplete="off">
      </div>
    </div><!-- Final div primeraFilaPersonales -->
    <div id="segundaFilaPersonales" class="filaQR"><!-- Inicio div segundaFilaPersonales -->
      <div class="encabezadoQR" style="width:16%;">NOMBRE:</div>
      <div class="datoQR" style="width:40%;border:none;">
        <input type="text" id="datoNombreQR" name="datoNombreQR" class="inputDatoQR" style="width:80%;" placeholder="<?php echo $mostrarQR['NOMBRE'];?>" value="<?php echo $mostrarQR['NOMBRE'];?>" autocomplete="off">
      </div>
      <div class="encabezadoQR" style="width:12%;">EMPRESA:</div>
      <div class="datoQR" style="width:28.2%;border:none;">
        <input type="text" id="datoEmpresaQR" name="datoEmpresaQR" class="inputDatoQR" style="width:100%;" placeholder="<?php echo $mostrarQR['EMPRESA'];?>" value="<?php echo $mostrarQR['EMPRESA'];?>" autocomplete="off">
      </div>
    </div><!-- Final div segundaFilaPersonales -->
    <div class="filaQR"><!-- Inicio div terceraFilaPersonales -->
      <div class="encabezadoQR" style="width:16%;">APELLIDOS:</div>
      <div class="datoQR" style="width:40%;border:none;">
        <input type="text" id="datoApellidosQR" name="datoApellidosQR" class="inputDatoQR" style="width:98%;" placeholder="<?php echo $mostrarQR['APELLIDOS'];?>" value="<?php echo $mostrarQR['APELLIDOS'];?>" autocomplete="off">
      </div>
      <div class="encabezadoQR" style="width:12%;">VEHICULO:</div>
      <div class="datoQR" style="width:28.2%;border:none;">
        <input type="text" id="datoVehiculoQR" name="datoVehiculoQR" class="inputDatoQR" style="width:100%;" placeholder="<?php echo $mostrarQR['VEHICULO'];?>" value="<?php echo $mostrarQR['VEHICULO'];?>" autocomplete="off">
      </div>
    </div><!-- Final div terceraaFilaPersonales -->
  </div><!-- Final div bloqueDatosPersonales -->
  <br>
  <div id="bloqueDatosAcceso" name="bloqueDatosAcceso" class="bloqueDatosQR"><!-- Inicio div bloqueDatosAcceso -->
    <div id="primeraFilaAcceso" class="filaQR" style="margin-top:0%;"><!-- Inicio div primeraFilaAcceso -->
      <div class="encabezadoQR" style="width:12.5%;text-align:center;font-weight: bold;">FECHA INICIO</div>
      <div class="encabezadoQR" style="width:12.5%;text-align:center;font-weight: bold;">FECHA FINAL</div>
      <div class="encabezadoQR" style="width:34.5%;text-align:center;font-weight: bold;">EDIFICIO A VISITAR</div>
      <div class="encabezadoQR" style="width:36%;text-align:center;font-weight: bold;">MOTIVO DE LA VISITA</div>
    </div><!-- Final div primeraFilaAcceso -->
    <div id="segundaFilaAcceso" class="filaQR" style=""><!-- Inicio div segundaFilaPersonales -->
      <div class="datoQR" style="width:13%;text-align:center;background-color: rgba(255, 255, 255, 1);"><?php echo $mostrarQR['FECHA_INICIO'];?></div>
      <div class="datoQR" style="width:13%;text-align:center;background-color: rgba(255, 255, 255, 1);"><?php echo $mostrarQR['FECHA_FINAL'];?></div>
      <div class="datoQR" style="width:35%;text-align:center;background-color: rgba(255, 255, 255, 1);"><?php echo $mostrarQR['EDIFICIO_VISITA'];?></div>
      <div class="datoQR" style="width:36.5%;text-align:center;background-color: rgba(255, 255, 255, 1);"><?php echo $mostrarQR['MOTIVO'];?></div>
    </div><!-- Final div segundaFilaAcceso -->
  </div><!-- Final div bloqueDatosAccesso -->
  <br>
  <div id="bloqueDatosObservaciones" name="bloqueDatosObservaciones" class="bloqueDatosQR"><!-- Inicio div bloqueDatosPersonales -->
    <div id="primeraFilaObservaciones" class="filaQR" style="margin-top:0%;"><!-- Inicio div primeraFilaPersonales -->
      <div class="encabezadoQR" style="width:16%;">OBSERVACIONES:</div>
      <div class="datoQR" style="width:81.7%;border:none;">
        <input type="text" id="datoObservacionesQR" name="datoObservacionesQR" class="inputDatoQR" style="width:100%;<?php echo $color;?>" placeholder="<?php echo $mostrarQR['OBSERVACIONES'];?>" value="<?php echo $mostrarQR['OBSERVACIONES'];?>" autocomplete="off">
      </div>
    </div><!-- Final div primeraFilaObservaciones -->
  </div><!-- Final div bloqueDatosObservaciones -->
  <br>
  <table <table id="tablaCincoQR" class="tablaQR" style="border:none;text-align:left;">
    <tr>
<?php 
if(utf8_encode($solicitanteAcceso)<>utf8_encode($mostrarQR['RESPONSABLE_VISITA'])){
?>
      <td style="width:24%;border: 0px solid red;font-weight: bold;">RESONSABLE DE LA VISITA:&nbsp&nbsp</td>
      <td style="width:76%;border: 0px solid red;font-weight: bold;">
        <?php echo $mostrarQR['RESPONSABLE_VISITA'].'&nbsp&nbsp/&nbsp&nbspTELF.:&nbsp&nbsp'.$mostrarQR['TELEFONO_RESPONSABLE']; ?>
      </td>
<?php }else{};?>
    </tr>
  </table>
  <br>
  <table id="tablaSieteQR" class="tablaQR" style="margin-bottom:1%;border:none;">
    <tr>
      <td style="width:50%;text-align:right;">
        <input type="hidden" id="pasos" name="pasos" value="<?php if($textoObservaciones=='ANULADO EL'){echo '2';}else{echo '33';};?>"/>
        <input type="hidden" id="qrEscaneado" name="qrEscaneado" value="<?php echo $codigoQR;?>"/>
        <input type="submit" id="aceptarAcceso" name="aceptarAcceso" class="boton" style="width:100px;height:24px;font-size:14px;" value="ACEPTAR"/>
      </td>
    </form>
      <td style="text-align:left;width:50%;">
        <form id="cancelarMostarAcceso" name="cancelarMostrarAcceso" action="control.php" method="get">
          <input type="hidden" id="pasos" name="pasos" value="2"/>
          <input type="submit" class="boton" style="width:100px;height:24px;font-size:14px;" name="cancelar" value="CANCELAR">
        </form>
      </td>
    </tr>
  </table>
    </br>
  </form>
  </div><!-- Final div "mostrar resultado QR" -->
</div><!-- Final div "fondo de mostrar resultado QR" -->
<?php
mysqli_close($conexion_db); //Se cierra conexion
}

?>