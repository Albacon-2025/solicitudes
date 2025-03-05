<?php
require('02-albacon-php/01-variables-albacon.php');
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// PRIMERA FUNCION: PANTALLA INICIAL
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function pantallaAlbacon() {require('02-albacon-php/01-variables-albacon.php');
?>
<div id="pantallaAlbacon" class="" style="">
<div id="textoVentajas" class="ventajas" style="font-family:'calibri light';">
  El uso del programa de gestión de accesos <strong>Albacón</strong> ofrece importantes <strong>ventajas</strong> en términos de <strong>seguridad, organización y eficiencia</strong> en el control de accesos de personas autorizadas a las instalaciones. Algunas de esas ventajas son:
  <ul style="margin-left:-10px;">    
  <li><strong>Seguridad mejorada:</strong> Impide el acceso no autorizado y visitas imprevistas, reduciendo el riesgo de robos, vandalismo o incidentes, y protegiendo bienes, información y personas.</li>
  <li><strong>Control de acceso preciso:</strong> Permite definir y gestionar quién puede acceder a qué áreas y en qué momentos, garantizando que solo personas autorizadas ingresen.
  <li><strong>Auditoría eficiente:</strong> Genera registros detallados en tiempo real de las entradas, facilitando auditorías en caso de incidentes y asegurando el cumplimiento de normativas de seguridad.</li>
  <li><strong>Optimización de recursos:</strong> Mantiene un historial de acceso, que permite gestionar y rentabilizar los recursos destinados a la seguridad, empleándolos de manera eficiente, en los momentos necesarios.</li>
  <li><strong>Gestión remota y reducción de errores:</strong> La administración de accesos se realiza remotamente, minimizando la intervención de personas y evitando fallos en la autorización de visitantes. Los cambios en las autorizaciones se realizan de manera rápida y se reflejan de forma inmediata.</li>
  <li><strong>Reducción de costos:</strong> Aunque la implementación inicial puede implicar un costo, a mediano plazo se reducen los gastos asociados a los recursos de seguridad, gracias a la automatización y rapidez en la verificación de permisos.</li>
  <li><strong>Cumplimiento normativo:</strong> Asegura el cumplimiento de las normativas de seguridad y protección de datos, evitando sanciones.</li>
  </ul>
  Este sistema no solo optimiza el control de acceso, sino que también contribuye a una mayor eficiencia y reducción de riesgos y costos.
</div>
</div>
<?php
};
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// SEGUNDA FUNCION: FORMULARIO DE DATOS DE REGISTRO EN EL PROGRAMA
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function formularioRegistro(){require('02-albacon-php/01-variables-albacon.php');
?>
<div id="fondoRegistro" class="oscurecerContenedor" style="">
<div id="formularioRegistro" class="formularioRegistro" style="">
    <h3 style="text-align:center;margin-bottom:20px;margin-top:14px;">FORMULARIO DE REGISTRO</h3>
  <form id="registroInicial" action="albacon.php" method="post">
            <input type="hidden" name="pasos" value="2"/>
    <table style="border:0px solid black;width:100%;" cellspacing="0" cellpadding="4">
      <tr>
        <td style="border:0px solid black;width:36%;font-weight:bold;">NOMBRE:</td>
        <td style="border:0px solid black;width:64%;"><input type="text" style="outline:none;width:100%;font-weight:normal;" id="nombreRegistro" name="nombreRegistro"/></td>
      </tr>
      <tr>
        <td style="border:0px solid black;font-weight:bold;">APELLIDOS:</td>
        <td style="border:0px solid black;"><input type="text" style="outline:none;width:100%;font-weight:normal;" id="apellidosRegistro" name="apellidosRegistro"/></td>
      </tr>
      <tr>
        <td style="border:0px solid black;font-weight:bold;">NOMBRE EMPRESA:</td>
        <td style="border:0px solid black;"><input type="text" style="outline:none;width:100%;font-weight:normal;"  id="empresaRegistro" name="empresaRegistro"/></td>
      </tr>
      <tr>
        <td style="border:0px solid black;font-weight:bold;">DIRECCION POSTAL:</td>
        <td style="border:0px solid black;"><input type="text" style="outline:none;width:100%;font-weight:normal;"  id="direccionRegistro" name="direccionRegistro"/></td>
      </tr>
      <tr>
        <td style="border:0px solid black;;font-weight:bold;">CORREO:</td>
        <td style="border:0px solid black;"><input type="text" style="outline:none;width:100%;font-weight:normal;"  id="correoRegistro" name="correoRegistro"/></td>
      </tr>
<!--
      <tr>
        <td style="border:0px solid black;width:28%;font-weight: bold;">TELEFONO:</td>
        <td style="border:0px solid black;width:50%;"><input type="text" style="outline:none;width:100%;font-weight:normal;"  id="telefonoRegistro" name="telefonoRegistro"/></td>
      </tr>
-->
      <tr>
        <td style="border:0px solid black;font-weight:bold;">ESTILO WEB:</td>
        <td style="border:0px solid black;">
          <select id="estiloWEB" name="estiloWEB" class="inputEstiloWEB" style=""/>
            <option value="azul" selected>AZUL</option>
            <option value="blanco">BLANCO</option>
            <option value="negro">NEGRO</option>
            <option value="rojo">ROJO</option>
            <option value="verde">VERDE</option>
          </select>
        </td>
      </tr>
    </table>
    <table style="text-align:right;width:100%;">
      <tr>
        <td style="text-align:right;width:50%;"><br>
          <input type="submit" id="botonRegistrarse" class="boton" style="width:120px;height:26px;" value="REGISTRARSE" onclick="return validarFormRegistro()"/><!-- cambiar funcion js para validar añadir palabras reservadas -->
        </td>
    </form>
    <form id="cancelar" method="post" action="albacon.php">
        <td style="text-align:left;width:50%;"><br>
          <!--<input type="submit" id="botonCancelar" class="boton" style="width:120px;height:26px;" value="CANCELAR" onclick="windows.history.back()"/>-->
          <input type="hidden" name="pasos" value="0"/>
          <input type="submit" id="botonCancelar" class="boton" style="width:120px;height:26px;" value="CANCELAR"/>

        </td>
    </form>
      </tr>
    </table>
</div>
</div>
<?php
}; // Fin de la funcion
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// TERCERA FUNCION: PROCESAR REGISTRO
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function procesarRegistro(){require('02-albacon-php/01-variables-albacon.php');

// 1) SE CREAN LAS VARIABLES NECESARIAS Y SE FORMATEAN PARA REALIZAR EL REGISTRO
@$nameEmpresa=strtolower(str_replace(' ','_',$nameEmpresa));
@$numero_aleatorio = rand(10000, 99999);
@$letras_empresa = substr($nameEmpresa, 0, 4);
@$id = $letras_empresa.'.'.$numero_aleatorio;
if($telefonoR==0){$telefonoR='NO PROCEDE';}else{$telefonoR=$telefonoR;};
@$url_boton = "https://www.albacon.loc/$nameEmpresa.php?pasos=0";   //********************************************* DESCOMENTAR/COMENTAR
//@$url_boton = "https://www.albacon.es/$nameEmpresa.php?pasos=0";  //*********************************************

// 2) SE GUARDAN LOS DATOS EN LA BASE DE "REGISTRO DE EMPRESAS"
$conexion_db;
$baseDatos;

//  2.1) SE COMPRUEBA SI ESTA O NO REGISTRADO PARA EVITAR DUPLICIDADES AL REFRESCAR
$sql00="SELECT * FROM registro_empresas WHERE EMPRESA_REGISTRO ='$nameEmpresa'";
$result00=mysqli_query($conexion_db,$sql00);
$datosRegistro=mysqli_fetch_array($result00);
//echo $datosRegistro[10];

if(@$datosRegistro[10]<>'SI'){
$sql01="INSERT INTO registro_empresas (ID,NOMBRE_REGISTRO,APELLIDOS_REGISTRO,EMPRESA_REGISTRO,DIRECCION_REGISTRO,CORREO_REGISTRO,TELEFONO_REGISTRO,ESTILO_WEB,ENLACE,REGISTRADO)
VALUES ('$id','$nombreR','$apellidosR','$nameEmpresa','$direccionR','$correoR','$telefonoR','$estiloWEB','$url_boton','SI')";
$result01=mysqli_query($conexion_db,$sql01);}else{};

/*
$sql00="SELECT * FROM registro_empresas WHERE EMPRESA_REGISTRO ='$nameEmpresa'";
$result00=mysqli_query($conexion_db,$sql00);
$datosRegistro=mysqli_fetch_array($result00);
echo $datosRegistro[10];
*/

// 2) SE CREA EL ARCHIVO "nombre_empresa.php" copia de "empresa.php" Y LA URL PARA NAVEGAR HASTA EL ARCHIVO

copy('empresa.php',strtolower($nameEmpresa).'.php');
//$empresaRegistro=strtolower($empresaRegistro);
//$nameEmpresa=strtolower($nameEmpresa);



//@$url_boton = "https://www.albacon.loc/$empresaRegistro.php?pasos=0&empresa=$nombreEmpresa";
//@$url_boton = "https://www.albacon.loc/$empresaRegistro.php?pasos=0";

//@$url_00 = "https://www.albacon.es/$empresaRegistro.php?pasos=0";


//VARIBLES PARA URL PARA USAR EN CORREO
/*
$url_01 = "https://www.albacon.loc/autorizados.php?pasos=0";
$url_02 = "https://www.albacon.loc/solicitudes.php?pasos=0";
$url_03 = "https://www.albacon.loc/control.php?pasos=0";
*/
$url_01 = "https://www.albacon.loc/autorizados.php?pasos=0";
$url_02 = "https://www.albacon.loc/solicitudes.php?pasos=0";
$url_03 = "https://www.albacon.loc/control.php?pasos=0";


/*
$sql01="SELECT * FROM registro_empresas WHERE EMPRESA_REGISTRO ='$empresa'";
$result01=mysqli_query($conexion_db,$sql01);
$datosEmpresa=mysqli_fetch_array($result01);
$nameEmpresa=$datosEmpresa[4];
$url_boton=$datosEmpresa[9];
echo $url_boton;
*/
/*
@$url_00 = "https://www.albacon.loc/$empresaRegistro.php?pasos=0&nameEmpresa=$nameEmpresa";
//@$url_00 = "https://www.albacon.es/$empresaRegistro.php?pasos=0";
*/
?>
<div id="fondoRegistro" class="oscurecerContenedor" style="width:100%;">
  <div id="procesarRegistro" class="procesarRegistro" style="margin-top:4%;">
    <h2 style="text-align:center;margin-bottom:20px;">SU REGISTRO SE HA REALIZADO CORRECTAMENTE</h2>
    <!--<p style="font-size:14px;">SU REGISTRO SE HA REALIZADO CORRECTAMENTE</p>-->
    <p style="font-size:16px;">Recibirá un correo con la información necesaria para comenzar a usar el programa.</p>
    <p style="font-size:16px;">Haga click en el botón para acceder a su página principal.</p>
  
    <button type="submit" id="botonEnlace" class="botonEnlace" style="background-image:url('05-albacon-fotos/02-logo-enlace.png');" onclick="window.location.href='<?php echo $url_boton;?>'" >
      <?php echo strtoupper(str_replace('_',' ',$nameEmpresa));?>
    </button>
    <br>
    <p style="font-size:16px;">Gracias por confiar en Albacón.</p>
    <?php echo $url_boton;?>
    <form id="registroInicial" action="albacon.php" method="post">
      <input type="hidden" name="pasos" value="0"/>
      <br>
        <input type="submit" id="botonRegistrarse" class="boton" style="width:90px;height:24px;text-align:center;" value="ACEPTAR"/>
      <br>
    </form>
  </div>
</div>
<?php
mysqli_close($conexion_db); // Se cierra conexion
}; // Fin de la funcion PROCESAR REGISTRO

// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// VIGESIMOSEPTIMA FUNCION: PROCESADO Y ENVIO CORREO CON LOS CODIGOS QR'S GENERADOS CON PHPMAILER
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// LA INCLUSION DE LAS CLASES DE PHPMAILER SE HACE FUERA DE LA FUNCION
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// -------------------------------------------------------------------------------------------------------------------------------------------------
function mandarCorreo(){
  require('02-albacon-php/01-variables-albacon.php');
  require('04-albacon-lib/PHPMailer/Exception.php');
  require('04-albacon-lib/PHPMailer/PHPMailer.php');
  require('04-albacon-lib/PHPMailer/SMTP.php');
//$solicitante = $nombreUsuario.' '.$apellidosUsuario;
//$conexion_db;
//$baseDatos;
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
  $mail->setFrom('albacon.accesos@gmail.com', 'CONTROL DE ACCESOS ALBACON'); // QUIEN LO ENVIA - MISMO QUE USERNAME 'albacon.accesos@gmail.com',
  $mail->addAddress($correoR, $nameEmpresa); // AQUI PODEMOS PONER EL NOMBRE Y APELLIDOS DEL USUARIO CON LA VARIABLE CORRESPONDIENTE
  //$mail->addAddress($correoDestinatario , ' USUARIO AUTORIZADO'); // AQUI PODEMOS PONER EL NOMBRE Y APELLIDOS DEL USUARIO CON LA VARIABLE CORRESPONDIENTE
  //$mail->addAddress('ellen@example.com'); // Name is optional
  //$mail->addReplyTo('info@example.com', 'Information');
  //if($conCopia<>''){$mail->addCC($conCopia);}else{};// QUIEN VA EN COPIA - SE EVALUA SI SE PONE CORREO EN EL INPUT DE CC
  //if($IDresponsable<>$IDusuario){$mail->addBCC($conCopiaOculta);}else{};// QUIEN VA EN COPIA OCULTA - SE ENVIARA AL CORREO DEL RESPONSABLE SI ES DISTINTO DEL USUARIO)
  $mail->CharSet = 'UTF-8'; // PARA USO DE CARACTERES ESPECIALES DE CASTELLANO
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// 4) ADJUNTAR ARCHIVOS (Attachments)

// ************************ insertar los documentos a adjuntar en el correo: manual-esquema y condiciones del contrato
  //$mail->addAttachment('PDF-temp/'.$codigoSolicitante.'.pdf'); // SE ADJUNTARA EL ARCHIVO CORRESPONDIENTE PDF CON LOS QR'S

  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
// INCLUIR IMAGENES EN EL MENSAJE
$mail->AddEmbeddedImage('05-albacon-fotos/01-albacon-nombre.png','logo','logo ALBACON');
$mail->AddEmbeddedImage('05-albacon-fotos/albacon-hoja.png','hoja','hoja');
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
//$sql="SELECT * FROM accesos_temp WHERE CODIGO='$codigoSolicitante' ";
//$result=mysqli_query($conexion_db,$sql);
//$n = mysqli_num_rows($result);
 // $v = 1; 
 // while ($v <= $n) {
 //   @unlink('QR-imagenes/'.$v.'-'.$codigoSolicitante.'-'.$IDresponsable.'.png');
  //$v++;
  //};
// 8.2) SE REALIZA UN BUCLE FOR PARA BORRAR LOS DATOS DE LA BD_TEMP
//for($v=1;$v<=$n;$v++){$v;
//  $sql0="DELETE FROM accesos_temp WHERE CODIGO='$codigoSolicitante' ";
//  $result0=mysqli_query($conexion_db,$sql0);
//  ;}; // FINAL DE BUCLE FOR
// 8.3) SE ELIMINA EL ARCHIVO PDF UNA VEZ ENVIADO
//@unlink('PDF-temp/'.$codigoSolicitante.'.pdf');
// 9) SE SUMA UNO A LOS USOS DE ESE USUARIO EN LA TABLA SOLICITANTES
//$sql="SELECT USOS FROM solicitantes WHERE ID ='$IDusuario' ";
//$result=mysqli_query($conexion_db,$sql);
//$usosSolicitante = mysqli_fetch_array($result);
//echo $usosSolicitante[0];
//@$usos=$usosSolicitante[0] + 1;
//echo $usos;echo $IDusuario;
//$sql01="UPDATE solicitantes SET USOS='$usos' WHERE ID='$IDusuario' ";
//$result01=mysqli_query($conexion_db,$sql01);
//mysqli_close($conexion_db);// SE CIERRA CONEXION CON BD
};


?>