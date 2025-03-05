<?php
// VARIABLES ENVIADAS POR FORM
    @$pasos = isset($_GET['pasos']) ? $_GET['pasos'] : $_POST['pasos']; // Obtener el valor de pasos de la URL (SE TIENE QUE PONER AQUI)
    
// VARIABLES CONEXION EN LOCAL
    $conexion_db = mysqli_connect("localhost","solicitante_accesos","Solicitante01");
    $baseDatos = mysqli_select_db($conexion_db,"albacon_accesos");
    mysqli_query($conexion_db, "SET NAMES 'utf8'"); // FUNDAMENTAL PARA LOS CARACTERES EN ESPAÑOL (NO QUITAR NUNCA)

    // VARIABLES CONEXION EN HOSTINGER
    //$conexion_db = mysqli_connect("localhost","u134300253_albacon","Al553383bacon006.");
    //$baseDatos = mysqli_select_db($conexion_db,"u134300253_albacon_acceso");

    // VARIABLES CONEXION EN BYETHOST
    //$conexion_db = mysqli_connect("sql211.byethost12.com","b12_32772157","Al553383bacon003.");
    //$baseDatos = mysqli_select_db($conexion_db,"b12_32772157_albacon_accesos");

    // VARIABLES DE SESION
    @$UTCsesion = $_SESSION['UTCsesion'] = time();
    @$nombreR = $_SESSION['nombreR'];
    @$apellidosR = $_SESSION['apellidosR'];
    @$nameEmpresa = $_SESSION['nameEmpresa'];
    @$direccionR = $_SESSION['direccionR'];
    @$correoR = $_SESSION['correoR'];
    @$telefonoR = $_SESSION['telefonoR'];
    @$estiloWEB = $_SESSION['estiloWEB'];

    if (isset($_POST['empresaRegistro'])) {
        $_SESSION['nombreR'] = $_POST['nombreRegistro'];
        $_SESSION['apellidosR'] = $_POST['apellidosRegistro'];
        $_SESSION['nameEmpresa'] = $_POST['empresaRegistro'];
        $_SESSION['direccionR'] = $_POST['direccionRegistro'];
        $_SESSION['correoR'] = $_POST['correoRegistro'];
        //$_SESSION['telefonoR'] = $_POST['telefonoRegistro'];
        $_SESSION['estiloWEB'] = $_POST['estiloWEB'];

// REDIRIGE PARA EVITAR EN REENVIO DE FORMULARIO
    //$pasos = isset($_POST['pasos']) ? $_POST['pasos'] : 0; // Obtener el valor de pasos del POST.
    //$empresaregistro = isset($_POST['empresaRegistro']) ? $_POST['empresaRegistro'] : "valorPredeterminado";

    header("Location: albacon.php?pasos=" . $pasos); // REDIRIGE A LA MISMA PAGINA EN LOCAL
    //header("Location: https://albacon.es/albacon.php?pasos=" . $pasos); // REDIRIGE A LA MISMA PAGINA EN EL HOSTING

    exit; // Asegura que el script se detenga después de la redirección
    }

    @$nombreRegistro = strtoupper(preg_replace('/\s+/', '_',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
        array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
        array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['nombreRegistro']))))));
    @$apellidosRegistro = strtoupper(preg_replace('/\s+/', '_',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
        array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
        array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['apellidosRegistro']))))));
    @$empresaRegistro = strtoupper(preg_replace('/\s+/', '_',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
        array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
        array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['empresaRegistro']))))));
    @$direccionRegistro = strtoupper(preg_replace('/\s+/', '_',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
        array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
        array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['direccionRegistro']))))));
    @$correoRegistro = strtolower(preg_replace('/\s+/', '_',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
        array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
        array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['correoRegistro']))))));
    @$telefonoRegistro = $_REQUEST['telefonoRegistro'];

// VARIABLES ENVIADAS POR URL
    $url_01 = "https://www.albacon.loc/autorizados.php?pasos=0";
    $url_02 = "https://www.albacon.loc/solicitudes.php?pasos=0";
    $url_03 = "https://www.albacon.loc/control.php?pasos=0";

    //$url_01 = "https://www.albacon.es/autorizados.php?pasos=0";
    //$url_02 = "https://www.albacon.es/solicitudes.php?pasos=0";
    //$url_03 = "https://www.albacon.es/control.php?pasos=0";


// VARIABLES PARA CORREO
    @$asunto = 'ALBACON CONTROL DE ACCESOS - '.$nameEmpresa;
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
    albacon@albacon.es
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
    
?>