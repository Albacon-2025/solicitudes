<?php
@session_start();
// VARIABLES DE SESION
        @$UTCsesion = $_SESSION['UTCsesion'];
        @$IDgestor = $_SESSION['IDgestor'];
        @$codigoGestor = $_SESSION['codigoGestor'];
        @$nombreGestor = utf8_encode($_SESSION['nombreGestor']);
        @$apellidosGestor = utf8_encode($_SESSION['apellidosGestor']);
        @$nominaGestor = $_SESSION['nominaGestor'];
        @$telefonoGestor = $_SESSION['telefonoGestor'];
        @$correoGestor = utf8_encode($_SESSION['correoGestor']);
        @$correoEnviado = $_SESSION['correoEnviado'];
        
// VARIABLES CONEXION EN LOCAL
        $conexion_db = mysqli_connect("localhost","solicitante_accesos","Solicitante01");
        $baseDatos = mysqli_select_db($conexion_db,"albacon_accesos");
        mysqli_query($conexion_db, "SET NAMES 'utf8'"); // FUNDAMENTAL PARA LOS CARACTERES EN ESPAÑOL (NO QUITAR NUNCA)
// VARIABLES CONEXION EN HOSTINGER
        //$conexion_db = mysqli_connect("localhost","u134300253_albacon","Al553383bacon006.");
        //$baseDatos = mysqli_select_db($conexion_db,"u134300253_albacon_acceso");
// VARIABLES CONEXION EN 000WEHOST
        //$conexion_db = mysqli_connect("localhost","id21697939_albacon","Al553383bacon003.");
        //$baseDatos = mysqli_select_db($conexion_db,"id21697939_albacon_accesos");
// VARIABLES CONEXION EN BYETHOST
        //$conexion_db = mysqli_connect("sql211.byethost12.com","b12_32772157","Al553383bacon003.");
        //$baseDatos = mysqli_select_db($conexion_db,"b12_32772157_albacon_accesos");

// VARIABLES ENVIADAS POR FORM
        @$pasos = $_REQUEST['pasos'];
        @$accion = $_REQUEST['accion'];
        @$gestor = utf8_encode($_REQUEST['gestor']);
        @$contrasena = $_REQUEST['contrasena'];
        @$comprobarGestor = $_REQUEST['comprobarGestor'];
        @$comprobarResponsable = $_REQUEST['comprobarResponsable'];
        @$caducado = $_REQUEST['caducado'];

        @$nickGestor = $_REQUEST['nickGestor'];
        @$numeroNominaGestor = $_REQUEST['numeroNominaGestor'];
        @$claveNueva = $_REQUEST['claveNueva'];
        @$claveNuevaRepetida = $_REQUEST['claveNuevaRepetida'];

// VARIABLES DE LOS DATOS INICIALES DE LA AUTORIZACION
        @$numRegistros = $_REQUEST['numRegistros'];
        @$entradaDatos = $_REQUEST['entradaDatos'];
        @$igualGestor = $_REQUEST['igualGestor'];
        if($igualGestor=="si"){$IDresponsableAutorizacion = $IDgestor;}else{@$IDresponsableAutorizacion = $_REQUEST['IDresponsableAutorizacion'];};
        if($igualGestor=="si"){$nombreResponsableAutorizacion = $nombreGestor;}else{@$nombreResponsableAutorizacion = utf8_encode($_REQUEST['nombreResponsableAutorizacion']);};
        if($igualGestor=="si"){$apellidosResponsableAutorizacion = $apellidosGestor;}else{@$apellidosResponsableAutorizacion = utf8_encode($_REQUEST['apellidosResponsableAutorizacion']);};
        if($igualGestor=="si"){$nominaResponsableAutorizacion = $nominaGestor;}else{@$nominaResponsableAutorizacion = $_REQUEST['nominaResponsableAutorizacion'];};
        if($igualGestor=="si"){$telefonoResponsableAutorizacion = $telefonoGestor;}else{@$telefonoResponsableAutorizacion = $_REQUEST['telefonoResponsableAutorizacion'];};
        if($igualGestor=="si"){$correoResponsableAutorizacion = $correoGestor;}else{@$correoResponsableAutorizacion = utf8_encode($_REQUEST['correoResponsableAutorizacion']);};

// VARIABLES DE LOS DATOS ENVIADOS PARA PROCESAR EXCEL
        @$autorizadosDatos = $_REQUEST['texto'];

//VARIABLES PARA CREAR LOS CORREOS DE CONFIRMACION
        @$asunto = 'TRAMITACION DE REGISTRO AUTORIZADOS';
        @$correoDestinatario = $_REQUEST['correoResponsableAutorizacion'];

// VARIABLES NECESARIAS EN EL BUSCADOR
@$nominaAutorizado = $_REQUEST['nominaAutorizado'];

// VARIABLES PARA ACTUALIZAR EL REGISTRO DEL AUTORIZADO SELECCIONADO
@$registroNomina = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
        array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
        array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['registroNomina']))))));
@$registroNombre = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
        array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
        array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['registroNombre']))))));
@$registroApellidos = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
        array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
        array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['registroApellidos']))))));
@$registroEmpresa= strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
        array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
        array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['registroEmpresa']))))));
@$registroUsuario = strtolower(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
        array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
        array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['registroUsuario']))))));
@$registroDepartamento = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
        array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
        array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['registroDepartamento']))))));
@$registroDireccion = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
        array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
        array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['registroDireccion']))))));
@$registroTelefono = $_REQUEST['registroTelefono'];
@$registroExtension = $_REQUEST['registroExtension'];
@$registroCorreo = strtolower(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
        array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
        array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['registroCorreo']))))));
@$registroResponsable = strtoupper(preg_replace('/\s+/', ' ',trim(str_replace('ü','Ü',str_replace('ñ','Ñ',str_replace(
        array('á','Á','é','É','í','Í','ó','Ó','ú','Ú'),
        array('a','A','e','E','i','I','o','O'.'u','U'),$_REQUEST['registroResponsable']))))));
@$registroFechaAlta = $_REQUEST['registroFechaAlta'];
@$registroFechaRenovacion = $_REQUEST['registroFechaRenovacion'];
@$registroFechaValidez = $_REQUEST['registroFechaValidez'];
@$registroFechaBaja = $_REQUEST['registroFechaBaja'];

?>