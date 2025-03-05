<?php
// VARIABLES ENVIADAS POR FORM
@$pasos = isset($_GET['pasos']) ? $_GET['pasos'] : $_POST['pasos']; // Obtener el valor de pasos de la URL (SE TIENE QUE PONER AQUI)

// VARIABLES ENVIADAS POR URL
        @$estiloWEB = $_GET['estiloWEB'];
        @$empresa = $_GET['empresa'];
        
// VARIABLES DE SESION

        @$nombreEmpresa = $_SESSION['nombreEmpresa'];
            if(@$_SESSION['nombreEmpresa']==''){@$_SESSION['nombreEmpresa'] = @$empresa;}else{};
        @$estiloDeWEB = $_SESSION['estiloDeWEB'];
            if(@$_SESSION['estiloDeWEB']==''){@$_SESSION['estiloDeWEB'] = @$estiloWEB;}else{};
    
            if($estiloDeWEB == 'azul'){$estiloCSS = '00-estilos-azul.css';}
            elseif($estiloDeWEB == 'blanco'){$estiloCSS = '00-estilos-blanco.css';}
            elseif($estiloDeWEB == 'negro'){$estiloCSS = '00-estilos-negro.css';}
            elseif($estiloDeWEB == 'verde'){$estiloCSS = '00-estilos-verde.css';}
            elseif($estiloDeWEB == 'rojo'){$estiloCSS = '00-estilos-rojo.css';}

        @$UTCsesion = $_SESSION['UTCsesion'];
        @$IDusuario = $_SESSION['IDusuario'];
        @$codigoSolicitante = $_SESSION['codigoSolicitante'];
        @$nombreUsuario = $_SESSION['nombreUsuario'];
        @$apellidosUsuario = $_SESSION['apellidosUsuario'];
        @$telefonoUsuario = $_SESSION['telefonoUsuario'];
        @$correoUsuario = $_SESSION['correoUsuario'];
        @$correoEnviado = $_SESSION['correoEnviado'];

// VARIABLES CONEXION EN LOCAL
        $conexion_db = mysqli_connect("localhost","solicitante_accesos","Solicitante01");
        $baseDatos = mysqli_select_db($conexion_db,"albacon_accesos");
        mysqli_query($conexion_db, "SET NAMES 'utf8'"); // FUNDAMENTAL PARA LOS CARACTERES EN ESPAÑOL (NO QUITAR NUNCA)
        /*
        //$conexion_db_01 = mysqli_connect("localhost","seguridad","seguridad01");
        //$baseDatos_01 = mysqli_select_db($conexion_db_01,"albacon_accesos");
        //mysqli_query($conexion_db_01, "SET NAMES 'utf8'"); // FUNDAMENTAL PARA LOS CARACTERES EN ESPAÑOL (NO QUITAR NUNCA)
        */
// VARIABLES CONEXION EN HOSTINGER
        //$conexion_db = mysqli_connect("localhost","u134300253_albacon","Al553383bacon006.");
        //$baseDatos = mysqli_select_db($conexion_db,"u134300253_albacon_acceso");
        //mysqli_query($conexion_db, "SET NAMES 'utf8'"); // FUNDAMENTAL PARA LOS CARACTERES EN ESPAÑOL (NO QUITAR NUNCA)

// VARIABLES CONEXION EN BYETHOST
        //$conexion_db = mysqli_connect("sql211.byethost12.com","b12_32772157","Al553383bacon003.");
        //$baseDatos = mysqli_select_db($conexion_db,"b12_32772157_albacon_accesos");
        //mysqli_query($conexion_db, "SET NAMES 'utf8'"); // FUNDAMENTAL PARA LOS CARACTERES EN ESPAÑOL (NO QUITAR NUNCA)

// VARIABLES CONEXION EN 000WEHOST
        //$conexion_db = mysqli_connect("localhost","id21697939_albacon","Al553383bacon003.");
        //$baseDatos = mysqli_select_db($conexion_db,"id21697939_albacon_accesos");
        //mysqli_query($conexion_db, "SET NAMES 'utf8'"); // FUNDAMENTAL PARA LOS CARACTERES EN ESPAÑOL (NO QUITAR NUNCA)

// VARIABLES ENVIADAS POR URL
        @$estiloWEB = $_GET['estiloWEB'];

// VARIABLES ENVIADAS POR FORM
       // @$pasos = $_REQUEST['pasos'];


// VARIABLE PARA NO ENSEÑAR MENSAJE DE REENVIO FORMULARIO
@$noReenviar='
<script>
history.replaceState(null, null, "solicitudes.php?pasos="'.$pasos.'");
</script>';





        @$accion = $_REQUEST['accion'];
        @$datosExcel = $_REQUEST['texto'];
        @$usuario = utf8_encode($_REQUEST['usuario']);
        @$contrasena = $_REQUEST['contrasena'];
        @$comprobarUsuario = $_REQUEST['comprobarUsuario'];
        @$contrasenaInicial = $_REQUEST['contrasenaInicial'];
        @$claveNuevaUno = $_REQUEST['claveNuevaUno'];
        @$claveNuevaUnoRepetida = $_REQUEST['claveNuevaUnoRepetida'];
        @$claveNuevaDos = $_REQUEST['claveNuevaDos'];
        @$claveNuevaDosRepetida = $_REQUEST['claveNuevaDosRepetida'];
        @$claveNuevaTres = $_REQUEST['claveNuevaTres'];
        @$claveNuevaTresRepetida = $_REQUEST['claveNuevaTresRepetida'];
        @$nickUsuario = $_REQUEST['nickUsuario'];
        @$numeroNomina = $_REQUEST['numeroNomina'];
        @$claveNueva = $_REQUEST['claveNueva'];
        @$claveNuevaRepetida = $_REQUEST['claveNuevaRepetida'];
        @$editar= $_REQUEST['editar']; 
        @$borrar= $_REQUEST['borrar'];  // comprobar si se usa 
        @$cancelarSolicitud= $_REQUEST['cancelarSolicitud'];  // comprobar si se usa 
        @$solicitante = $IDusuario;       // comprobar si se usa 
        @$codigoQR = array();
        @$manualNombre = $_REQUEST['manualNombre'];  // comprobar si se usa 
        @$datosManuales01 = $_REQUEST['manualText'];  // comprobar si se usa 
        @$caducado = $_REQUEST['caducado'];
        @$contadorFilas = $_REQUEST['contadorFilas'];  // comprobar si se usa 
	    @$cerrarSesion = $_REQUEST['cerrarSesion'];  // comprobar si se usa 

// Variables de los valores iniciales de la solicitud de acceso
        @$numSolicitudes = $_REQUEST['numSolicitudes'];
        @$edificioVisita = $_REQUEST['edificioVisita'];
        @$entradaDatos = $_REQUEST['entradaDatos'];
        @$igualSolicitante = $_REQUEST['igualSolicitante'];
          if($igualSolicitante=="si"){$IDresponsable = utf8_decode($IDusuario);}else{@$IDresponsable = utf8_decode($_REQUEST['IDresponsable']);};
          if($igualSolicitante=="si"){$nombreResponsable = utf8_decode($nombreUsuario);}else{@$nombreResponsable = utf8_decode($_REQUEST['nombreResponsable']);};
          if($igualSolicitante=="si"){$apellidosResponsable = utf8_decode($apellidosUsuario);}else{@$apellidosResponsable = utf8_decode($_REQUEST['apellidosResponsable']);};
          if($igualSolicitante=="si"){$telefonoResponsable = $telefonoUsuario;}else{@$telefonoResponsable = $_REQUEST['telefonoResponsable'];};
          if($igualSolicitante=="si"){$correoResponsable = utf8_decode($correoUsuario);}else{@$correoResponsable = utf8_decode($_REQUEST['correoResponsable']);};
        @$ultimoAcceso = $_REQUEST['ultimoAcceso'];

// Variables para edición de acceso
        //@$textEditado = utf8_encode($_REQUEST['textEditado']);
        @$editarID = $_REQUEST['editarID'];
        @$editarDNI = $_REQUEST['editarDNI'];
        @$editarNombre = $_REQUEST['editarNombre'];
        @$editarApellidos = $_REQUEST['editarApellidos'];
        @$editarEmpresa = $_REQUEST['editarEmpresa'];
        @$editarVehiculo = $_REQUEST['editarVehiculo'];
        @$editarFechaInicial = $_REQUEST['editarFechaInicial'];
        @$editarFechaFinal = $_REQUEST['editarFechaFinal'];
        @$editarMotivo = $_REQUEST['editarMotivo'];
        @$editarObservaciones = $_REQUEST['editarObservaciones'];
        @$marcarError = $_REQUEST['marcarError'];

// Variables para entrada manual de datos
        @$NUMtext = array();
        @$DNItext = array();
        @$Nombretext = array();
        @$Apellidostext = array();
        @$Empresatext = array();
        @$Vehiculotext = array();
        @$FechaInicialtext = array();
        @$FechaFinaltext = array();
        @$Motivotext = array();
        @$Observacionestext = array();
        @$datoManualNUM = array();
        @$datoManualDNI = array();
        @$datoManualNombre = array();
        @$datoManualApellidos = array();
        @$datoManualEmpresa = array();
        @$datoManualVehiculo = array();
        @$datoManualFechaInicial = array();
        @$datoManualFechaFinal = array();
        @$datoManualMotivo = array();
        @$datoManualObservaciones = array();

// Variables para crear correo
        @$correoDestinatario = $_REQUEST['correoDestinatario'];
        @$conCopia = $_REQUEST['conCopia'];
        @$conCopiaOculta = $_REQUEST['conCopiaOculta'];
        @$asunto = 'CODIGOS QR DE ACCESOS A LAS INSTALACIONES IBERIA - LA MUÑOZA';
        @$nombreAnulado = $REQUEST['nombreAnulado'];
        @$mensaje = '
        <div style="padding:2%;padding-top:3%;font-family:Calibri;font-size:16px;text-align:justify;">
        <p style="text-align:justify;font-size:16px;">
        Estimado usuario:
        </p>
        <p style="text-align:justify;font-size:16px;">
        Adjunto al presente correo se remiten los <strong>Códigos QR</strong> correspondientes a los accesos solicitados, de acuerdo con los datos aportados en el proceso de solicitud.
        </p>
        <p style="text-align:justify;font-size:16px;">
        Recuerde enviar el archivo adjunto con los códigos a las personas para las cuales se ha realizado la solicitud. Dichas personas deberán mostrar a los miembros del equipo de seguridad el <strong>Código QR</strong> 
        y el <strong>documento identificativo</strong> con el cual se ha gestionado el acceso. En caso de no portarlo o negarse a mostrarlo, les será denegado el acceso a las instalaciones.
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
        Los datos proporcionados se mantendrán almacenados durante los 30 días siguientes a la fecha de finalización de la visita, únicamente con el fin de comprobar la identidad de las personas que acceden a nuestras instalaciones, en caso necesario. 
        No serán empleados para fines comerciales o de índole similar, ni cedidos a terceros, salvo obligación legal. 
        La legitimación para este tratamiento es el consentimiento otorgado al aportar voluntariamente los datos necesarios para la cumplimentación de los formularios. Tiene derecho a acceder, rectificar y suprimir tus datos comunicándolo por correo electrónico a seguridad@iberia.com.
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
        </div>
        ';
        @$mensaje01 = '
        <div style="padding:2%;padding-top:3%;font-family:Calibri;font-size:16px;text-align:justify;">
        <p style="text-align:justify;font-size:16px;">
        Estimado usuario:
        </p>
        <p style="text-align:justify;font-size:16px;">
        Adjunto al presente correo se remite el <strong>Código QR</strong> correspondiente al acceso actualizado, de acuerdo con los datos aportados en el proceso de edición.
        </p>
        <p style="text-align:justify;font-size:16px;">
        Recuerde enviar el archivo adjunto con el nuevo código a la persona para la cual se han modificado los datos de acceso. Dicha persona deberá mostrar a los miembros del equipo de seguridad el <strong>Código QR</strong> 
        y el <strong>documento identificativo</strong> con el cual se ha gestionado el acceso. En caso de no portarlo o negarse a mostrarlo, le será denegado el acceso a las instalaciones.
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
        Los datos proporcionados se mantendrán almacenados durante los 30 días siguientes a la fecha de finalización de la visita, únicamente con el fin de comprobar la identidad de las personas que acceden a nuestras instalaciones, en caso necesario. 
        No serán empleados para fines comerciales o de índole similar, ni cedidos a terceros, salvo obligación legal. 
        La legitimación para este tratamiento es el consentimiento otorgado al aportar voluntariamente los datos necesarios para la cumplimentación de los formularios. Tiene derecho a acceder, rectificar y suprimir tus datos comunicándolo por correo electrónico a seguridad@iberia.com.
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
        </div>
        ';
        /*
        @$mensaje02 = '
        <div style="padding:2%;padding-top:3%;font-family:Calibri;font-size:16px;text-align:justify;">
        <p style="text-align:justify;font-size:16px;">
        Estimado usuario:
        </p>
        <p style="text-align:justify;font-size:16px;">
        Le confirmamos <storng>la anulación</strong> del acceso seleccionado,'.@$nombreAnulado.$inputApellidos.' de acuerdo a su petición.
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
        </div>
        ';
        */
// VARIABLES PARA EL BUSCADOR DE SOLICITUDES
        @$buscarDato = $_REQUEST['buscarDato'];
        @$buscarDNI = strtoupper($_REQUEST['buscarDNI']);
                @$buscarDNI = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace(
                array('á','Á','é','É','í','Í','ó','Ó','ú','Ú','-'),
                array('a','A','e','E','i','I','o','O'.'u','U',''),$buscarDNI))));        
        @$buscarNombre = strtoupper($_REQUEST['buscarNombre']);
                @$buscarNombre = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace(
                array('á','Á','é','É','í','Í','ó','Ó','ú','Ú','-'),
                array('a','A','e','E','i','I','o','O'.'u','U',''),$buscarNombre))));
        @$buscarApellidos = strtoupper($_REQUEST['buscarApellidos']);
                @$buscarApellidos = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace(
                array('á','Á','é','É','í','Í','ó','Ó','ú','Ú','-'),
                array('a','A','e','E','i','I','o','O'.'u','U',''),$buscarApellidos))));
        @$buscarEmpresa = strtoupper($_REQUEST['buscarEmpresa']);
                @$buscarEmpresa = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace(
                array('á','Á','é','É','í','Í','ó','Ó','ú','Ú','-'),
                array('a','A','e','E','i','I','o','O'.'u','U',''),$buscarEmpresa))));
        @$buscarFechaInicio = strtoupper($_REQUEST['buscarFechaInicio']);

// VARIABLES PARA ACTUALIZAR LAS SOLICITUDES ENCONTRADAS (se formatean)
        @$inputID = $_REQUEST['inputID'];
        @$inputQR = $_REQUEST['inputQR'];
        @$inputDNI = $_REQUEST['inputDNI'];
                @$inputDNI = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace(
                array('á','Á','é','É','í','Í','ó','Ó','ú','Ú','ü','ñ','-'),
                array('a','A','e','E','i','I','o','O'.'u','U','Ü','Ñ',''),$inputDNI))));
        @$inputNombre = $_REQUEST['inputNombre'];
                @$inputNombre = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace(
                array('á','Á','é','É','í','Í','ó','Ó','ú','Ú','ü','ñ','-'),
                array('a','A','e','E','i','I','o','O'.'u','U','Ü','Ñ',''),$inputNombre))));
        @$inputApellidos = $_REQUEST['inputApellidos'];
                @$inputApellidos = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace(
                array('á','Á','é','É','í','Í','ó','Ó','ú','Ú','ü','ñ','-'),
                array('a','A','e','E','i','I','o','O'.'u','U','Ü','Ñ',''),$inputApellidos))));
        @$inputEmpresa = $_REQUEST['inputEmpresa'];
                @$inputEmpresa = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace(
                array('á','Á','é','É','í','Í','ó','Ó','ú','Ú','ü','ñ','-'),
                array('a','A','e','E','i','I','o','O'.'u','U','Ü','Ñ',''),$inputEmpresa))));
        @$inputVehiculo = $_REQUEST['inputVehiculo'];
                @$inputVehiculo = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace(
                array('á','Á','é','É','í','Í','ó','Ó','ú','Ú','ü','ñ','-'),
                array('a','A','e','E','i','I','o','O'.'u','U','Ü','Ñ',''),$inputVehiculo))));
        @$inputFechaInicial = $_REQUEST['inputFechaInicial'];
        @$inputFechaFinal = $_REQUEST['inputFechaFinal'];
        @$inputEdificio = $_REQUEST['inputEdificio'];
                @$inputEdificio = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace(
                array('á','Á','é','É','í','Í','ó','Ó','ú','Ú','ü','ñ','-'),
                array('a','A','e','E','i','I','o','O'.'u','U','Ü','Ñ',''),$inputEdificio))));
        @$inputMotivo = $_REQUEST['inputMotivo'];
                @$inputMotivo = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace(
                array('á','Á','é','É','í','Í','ó','Ó','ú','Ú','ü','ñ','-'),
                array('a','A','e','E','i','I','o','O'.'u','U','Ü','Ñ',''),$inputMotivo))));
        @$inputIDResp = $_REQUEST['inputIDResp'];
        @$inputNombreResp = $_REQUEST['inputNombreResp'];
                @$inputNombreResp = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace(
                array('á','Á','é','É','í','Í','ó','Ó','ú','Ú','ü','ñ','-'),
                array('a','A','e','E','i','I','o','O'.'u','U','Ü','Ñ',''),$inputNombreResp))));
        @$inputTelefonoResp = $_REQUEST['inputTelefonoResp'];
        @$inputObservaciones = $_REQUEST['inputObservaciones'];
                @$inputObservaciones = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace(
                array('á','Á','é','É','í','Í','ó','Ó','ú','Ú','ü','ñ','-'),
                array('a','A','e','E','i','I','o','O'.'u','U','Ü','Ñ',''),$inputObservaciones))));

// VARIABLES PARA LA FUNCION DE VALIDACION DE FECHAS
        @$inputFechaInicial = $_REQUEST['inputFechaInicial'];
        @$inputFechaFinal = $_REQUEST['inputFechaFinal'];
        @$validar = $_REQUEST['validar']; // debera sustituirse para ejecutar por $pasos



/*
@$inputFechaInicial = $_REQUEST['inputFechaInicial'];
@$inputFechaFinal = $_REQUEST['inputFechaFinal'];

@$charsI = strlen($inputFechaInicial);
@$FI=str_split($inputFechaInicial,$split_length = 1);
@$charsF = strlen($inputFechaFinal);
@$FF=str_split($inputFechaFinal,$split_length = 1);

//@$mensajeErrorFecha = 'DEBE INDICAR LA FECHA INICIAL';

if(empty($inputFechaInicial)&empty($inputFechaFinal)){$mensajeErrorFecha = 'DEBE INDICAR LAS FECHAS DE INICIO Y FINALIZACION';}
elseif(!empty($inputFechaInicial)&empty($inputFechaFinal)){$mensajeErrorFecha = 'DEBE INDICAR LA FECHA DE FINALIZACION';}
elseif(empty($inputFechaInicial)&!empty($inputFechaFinal)){$mensajeErrorFecha = 'DEBE INDICAR LA FECHA DE INICIO';}
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
};
};      
};
};
};
@$mostrarDivErrorFecha = 
    '<div id="avisoSolicitudes2" name="avisoSolicitudes" class="oscurecerContenedor" style="display:block;">
      <div id="mostrarAviso2" name="mostrarAviso" class="mostrarAviso" style="display:block;position:absolute;z-index:999;top:36%;left:31%;width:38%">
        <div id="tituloAviso2" class="tituloAviso">AVISO IMPORTANTE</div>
        <div id="mensajeAviso2" class="mensajeAviso">'.$mensajeErrorFecha.'</div>
      <a href="javascript:cerrarAvisoSolicitudes2();">ACEPTAR</a>
    </div>';


*/
// VARIABLES CABECERA
/*
&nbsp
 style="width:18%;margin-top:3px;padding-left:8px;" 
$cabeceraHTML=
'<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="refresh">
	<title>Solicitud Accesos Iberia</title>
		<link rel="stylesheet" type="text/css" href="css-archivos/00-solicitud.css">
        <link rel="shortcut icon" href="fotos-archivos/favicon-v.ico" type="image/x-icon"/>
<!-- COMIENZA EL ESTILO DE LAS ALERTAS DE JAVASCRIPT -->
        <link rel="stylesheet" type="text/css" href="js-archivos/alertify/css/alertify.css"/>
        <link rel="stylesheet" type="text/css" href="js-archivos/alertify/css/themes/default.css"/>
        <!--<link rel="stylesheet" type="text/css" href="js-archivos/alertify/css/themes/bootstrap.css"/>-->
        <!--<link rel="stylesheet" type="text/css" href="js-archivos/alertify/css/themes/semantic.css"/>-->
        <script src="js-archivos/alertify/alertify.js"></script>
        <script src="js-archivos/jquery-3.7.0.js"></script>
<!-- FINALIZA EL ESTILO DE LAS ALERTAS DE JAVASCRIPT -->
</head>';
*/
?>