<?php
require('02-albacon-php/02-variables-empresa.php');
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// PRIMERA FUNCION: PANTALLA EMPRESA
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function pantallaEmpresa() {require('02-albacon-php/02-variables-empresa.php');

// 1) SE CREAN LAS VARIABLES PARA LAS URL DE LOS BOTONES
  $url_01 = "autorizados.php?pasos=0";
  $url_02 = "solicitudes.php?pasos=0";
  $url_03 = "control.php?pasos=0";
?>
<div id="pantallaEmpresa" class="pantallaEmpresa" style="background-image:url('05-albacon-fotos/fondo-blanco3.png');background-size:cover;">
  <div id="contenidoEmpresa" class="contenidoEmpresa">
    <h1>ACCEDA A LAS SECCION DEL PROGRAMA DE GESTIÓN DE ACCESOS</h1>
    <h2><?php echo @$nombreEmpresa.' - '.@$estiloDeWEB;?></h2>
  </div>
  <div id="botonesEmpresa" class="botonesEmpresa" style="z-index:999;">
    <button type="submit" id="enlace01" class="botonURL" style="width:110px;height:110px;background-image:url('05-albacon-fotos/03-albacon-autorizados.png');border:4px ridge rgba(250, 185, 90, 1);" onclick='window.location.href="<?php echo $url_01;?>"'>
      </button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <button type="submit" id="enlace02" class="botonURL" style="width:110px;height:110px;background-image:url('05-albacon-fotos/04-albacon-solicitudes.png');border:4px ridge rgba(230, 62, 20, 1);" onclick='window.location.href="<?php echo $url_02;?>"'>
      </button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <button type="submit" id="enlace03" class="botonURL" style="width:110px;height:110px;background-image:url('05-albacon-fotos/05-albacon-control.png');border:4px ridge rgba(68, 104, 204, 1);" onclick='window.location.href="<?php echo $url_03;?>"'>
      </button>
  </div>
</div><!-- final pantalla  -->
<?php

;};

//********* PROBAR A QUITARLAS PUESTOS QUE SON VARIABLES DE SESION  PROBADO EN PRINCIPIO FUNCIONA OK*/
/*
$url_01 = "autorizados.php?pasos=0&empresa=$nombreEmpresa&estiloWEB=$estiloDeWEB";
$url_02 = "solicitudes.php?pasos=0&empresa=$nombreEmpresa&estiloWEB=$estiloDeWEB";
$url_03 = "control.php?pasos=0&empresa=$nombreEmpresa&estiloWEB=$estiloDeWEB";
*/

// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// TERCERA FUNCION: PANTALLA CERRAR SESION
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function cerrarSesion(){require('02-albacon-php/01-variables-empresa.php');
?>
<!--<div id="fondoRegistro" class="oscurecerContenedor" style="width:96%;left:4%;">-->
<div id="fondoCerrarSesion" class="oscurecerContenedor" style="">
  <div id="cerrarSesion" class="cerrarSesion" style="z-index:40;">
    <h3 style="text-align:center;margin-bottom:20px;margin-top:0px;">CERRAR SESIÓN</h3>

    <p>
      ¿Está seguro de querer cerrar sesión?
    </p>
  <form >
  <input type="hidden" id="pasos" name="pasos" value="101"/>
    <table>
      <tr>
        <td style="text-align:center;" colspan="2"><br><input type="submit" id="botonRegistrarse" class="boton" style="width:120px;height:26px;text-align:center;" value="ACEPTAR" onclick="return validarVigilante()"/></td><!-- cambiar funcion js para validar -->
        <td style="text-align:center;" colspan="2"><br><input type="submit" id="botonRegistrarse" class="boton" style="width:120px;height:26px;text-align:center;" value="CANCELAR" onclick="return validarVigilante()"/></td><!-- cambiar funcion js para validar -->
      </tr>
    </table>
  </form>
  </div>
<script>
  history.replaceState(null, null, 'albacon.php?pasos=<?php echo $pasos;?>')
</script>
</div>
<?php
}; // Fin de la funcion



//  ****************************************   ESTOY AQUI  *******************************************



// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// TERCERA FUNCION: PROCESAR REGISTRO
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function procesarRegistro(){require('02-albacon-php/01-variables-empresa.php');
// 1) SE CREAN LAS VARIABLE ID DEL REGISTRO
@$numero_aleatorio = rand(10000, 99999);
@$letras_empresa = substr($empresaRegistro, 0, 3);
@$id = $letras_empresa.'.'.$numero_aleatorio;

// 2) SE CREA EL ARCHIVO "nombre_empresa.php" copia de "empresa.php" Y LA URL PARA NAVEGAR HASTA EL ARCHIVO
copy('empresa.php',strtolower($empresaRegistro).'.php');
@$url_00 = strtolower($empresaRegistro).'.php?pasos=0&empresa='.$empresa.'&estiloWEB='.$estiloWEB;

// 3) SE CREAN LAS URL PARA AÑADIR A LA PANTALLA O AL CORREO
$url_01 = "https://www.albacon.es/autorizados.php?empresa=$empresaRegistro&estiloWEB=$estiloWEB";
$url_02 = "https://www.albacon.es/solicitudes.php?empresa=$empresaRegistro&estiloWEB=$estiloWEB";
$url_03 = "https://www.albacon.es/control.php?empresa=$empresaRegistro&estiloWEB=$estiloWEB";

// 4) SE GUARDAN LOS DATOS EN LA BASE DE REGISTRO DE EMPRESAS
$conexion_db;
$baseDatos;
/*
$sql="INSERT INTO registro_empresas (ID,NOMBRE_REGISTRO,APELLIDOS_REGISTRO,EMPRESA_REGISTRO,DIRECCION_REGISTRO,CORREO_REGISTRO,TELEFONO_REGISTRO,ESTILO_WEB)
VALUES ('$id','$nombreRegistro','$apellidosRegistro','$empresaRegistro','$direccionRegistro','$correoRegistro','$telefonoRegistro','$estiloWEB')";
$result=mysqli_query($conexion_db,$sql);
*/
?>
<div id="fondoRegistro" class="oscurecerContenedor" style="width:100%;">
  <div id="procesarRegistro" class="procesarRegistro" style="margin-top:6%;">
    <h2 style="text-align:center;margin-bottom:20px;">AVISO IMPORTANTE</h2>
    <p style="font-size:14px;">SE HA REGISTRADO SU INFORMACION CORRECTAMENTE</p>
    <p style="font-size:16px;">Recibirá un correo con la información necesaria para comenzar a usar el programa.</p>
    <p style="font-size:16px;">Haga click en el botón para acceder a su página principal.</p>
    
    <button type="submit" id="botonEnlace" class="botonEnlace" style="background-image:url('05-albacon-fotos/02-logo-enlace.png');" onclick="window.location.href='<?php echo $url_00;?>' " >
      <?php $empresa = str_replace('_',' ',$empresaRegistro);echo $empresa;?>
    </button>
    <br>
    <p style="font-size:16px;">Gracias por confiar en Albacón.</p>
    <form id="registroInicial" action="albacon.php" method="post">
      <input type="hidden" name="pasos" value="0"/>
      <br>
        <input type="submit" id="botonRegistrarse" class="boton" style="width:90px;height:24px;text-align:center;" value="ACEPTAR"/>
      <br>
    </form>
  </div>
</div>

<script>
  history.replaceState(null, null, 'albacon.php?pasos=<?php echo $pasos;?>')
</script>

<?php
mysqli_close($conexion_db); // Se cierra conexion
}; // Fin de la funcion PROCESAR REGISTRO

?>