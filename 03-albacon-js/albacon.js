// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// ------------------------------ FUNCIONES PARA MOSTRAR Y CERRAR VENTANAS DE ERRORES O ARCHIVO "ALBACON.PHP"  -------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// PARA MOSTRAR  ****************************
function mostrarAvisoAlbacon(){
  div = document.getElementById('avisoAlbacon');
  div.style.display = 'flex';
  document.getElementById('tituloAviso').innerHTML = tituloAviso;
  document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
}
// PARA CERRAR  ******************************
function cerrarAvisoAlbacon(){
  const inputs = formularioRegistro.querySelectorAll('input');
  div = document.getElementById('avisoAlbacon');
  div.style.display = 'none';
  for (const input of inputs){if (input.value === ''){input.focus();return;}} //Código para poner foco en primer input vacío
  return false;
  }
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// ---------------------------------------------------  FUNCION VALIDAR INPUT'S VACIOS  ------------------------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function validarFormRegistro(){
  const inputs = formularioRegistro.querySelectorAll('input');

  // Recorrer los inputs y comprobar si alguno está vacío
  for (const input of inputs) {
    if (input.value === '') {//alert('campos vacios');
      
      mostrarAvisoAlbacon();
      document.getElementById('tituloAviso').innerHTML = 'INFORMACION INCOMPLETA';
      document.getElementById('mensajeAviso').innerHTML = 'DEBE INDICAR TODOS LOS DATOS OBLIGATORIOS CORRECTAMENTE';
      
      return false;}
    }

    document.formularioRegistro.submit();
    return true;
  
}
/*
  // Ejemplo de uso:
  const formulario = document.getElementById('formularioRegistro'); // Obtener el formulario por su ID

  formulario.addEventListener('submit', function(event) {
    if (!validarFormulario(formulario)) {
      event.preventDefault(); // Evitar que se envíe el formulario si hay errores
    }
  });
  */
/*

  var nombreRegistro = document.getElementById('nombreRegistro');
  var apellidosRegistro = document.getElementById('apellidosRegistro');
  var empresaRegistro = document.getElementById('empresaRegistro');
  var direccionRegistro = document.getElementById('direccionRegistro');
  var correoRegistro = document.getElementById('correoRegistro');

  if(nombreRegistro.value.length==0&apellidosRegistro.value.length==0&empresaRegistro.value.length==0&direccionRegistro.value.length==0&correoRegistro.value.length==0)
    {mostrarAvisoAlbacon();
    document.getElementById('tituloAviso').innerHTML = 'INFORMACION INCOMPLETA';
    document.getElementById('mensajeAviso').innerHTML = 'DEBE INDICAR TODOS LOS DATOS CORRECTAMENTE';
    nombreRegistro.focus();
    */
    //return false;};
  /*
  if(nombreRegistro.value.length==0&apellidosRegistro.value.length!==0&empresaRegistro.value.length!==0&direccionRegistro.value.length!=0&correoRegistro.value.length!=0)
    {mostrarAvisoAlbacon();tituloAviso = 'INFORMACION INCOMPLETA';mensajeAviso = 'DEBE INDICAR UN NOMBRE';return false;};
*/
/*
  if(vigilante.value.length === 0){mensajeAviso = 'DEBE INDICAR UN USUARIO VALIDO';}else{mensajeAviso = 'DEBE INDICAR UNA CONTRASEÑA VALIDA';}
  if(vigilante.value.length === 0){mostrarAvisoAlbacon();return false;}
  if(vigilante.value.length != 0 & contrasenia.value.length == 0){mostrarAvisoAlbacon();return false;}
*/


/*
function validarInputQR(){
  var qr = document.getElementById('qr');
  if(qr.value.length === 0){tituloAvisoDos = 'INFORMACION INCOMPLETA';};
  if(qr.value.length === 0){mensajeAvisoDos = 'NO SE HA INTRODUCIDO NINGUN CODIGO-QR';};
  if(qr.value.length === 0){mostrarAvisoVacioQR();return false;}
  document.enviar-qr.submit();
  return true;
}
*/
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// -----------------------  FUNCION MOSTRAR ERROR POR CAMPOS DE VIGILANTE O Nº EMPLEADO VACIOS OLVIDO CONTRASEÑA  ----------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function validarDatosVigilante(){
  var nickVigilante = document.getElementById('nickVigilante');
  var numeroNominaVigilante = document.getElementById('numeroNominaVigilante');
  if(nickVigilante.value.length == 0 || numeroNominaVigilante.value.length == 0){
    mostrarAvisoControl();nickVigilante.focus();
    
    tituloAviso = 'INFORMACION INCOMPLETA';
    mensajeAviso = 'DEBE INDICAR TODOS LOS DATOS CORRECTAMENTE';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    
    return false;};
  document.restablecerContrasena.submit();
  return true;
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// ---------------------------------------------  FUNCION PARA MOSTRAR ERRORES EN CAMBIO DE CLAVE  -------------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function validarClavesVigilante(){
  var claveUno = document.getElementById('claveNueva');
  var claveDos = document.getElementById('claveNuevaRepetida');
  if(claveUno.value.length == 0 || claveDos.value.length == 0){
    mostrarAvisoControl();
    claveNueva.focus();
    tituloAviso = 'INFORMACION INCOMPLETA';
    mensajeAviso = 'DEBE INDICAR TODOS LOS DATOS';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  if(claveUno.value != claveDos.value){
    mostrarAvisoControl();
    claveNueva.focus();
    tituloAviso = 'AVISO IMPORTANTE';
    mensajeAviso = 'LAS CONTRASEÑAS NO COINCIDEN';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  if(claveUno.value.length < 8){
    mostrarAvisoControl();
    claveNueva.focus();
    tituloAviso = 'AVISO IMPORTANTE';
    mensajeAviso = 'LA CONTRASEÑA DEBE TENER AL MENOS 8 CARACTERES ALFANUMERICOS';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  if(claveUno.value.length > 14){
    mostrarAvisoControl();
    claveNueva.focus();
    tituloAviso = 'AVISO IMPORTANTE';
    mensajeAviso = 'LA CONTRASEÑA NO PUEDE TENER MAS DE 14 CARACTERES ALFANUMERICOS';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  document.cambioContrasena.submit();
  return true;
}




// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// ------------------------------------------------  FUNCIONES PARA ESCANEAR Y MOSTRAR CODIGO-QR  --------------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function onScanSuccess(decodedText, decodedResult){
  var resultContainer = document.getElementById('qr-leido');
  var lastResult, countResults = 0;
    if (decodedText !== lastResult) {
      //++countResults;
      lastResult = decodedText;
      console.log('Scan result = ${decodedText}', decodedResult);
      // resultContainer.innerHTML += '<div>[${countResults}] - ${decodedText}</div>';
      // quito el += para que solo lea un valor
      resultContainer.innerHTML = `<div>${decodedText}</div>`;
      // codigo añadido para que se copie directamente el valor de la div en el input text
      document.getElementById("qr").value = document.getElementById("qr-leido").textContent;
    }  
  }
// funcion para mover valor de div a input text (la he incluido en leer el QR para que salga directamente)
function mover(){
    document.getElementById("qr").value = document.getElementById("qr-leido").textContent;
}
function mostrarListaCamaras(){
  document.getElementById('qr-reader__dashboard_section_csr').style.visibility = "visible";
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// ------------------------------------------------  FUNCIONES PARA VALIDAR INPUT CODIGO-QR  -------------------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx







// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// --------------------------------------------  FUNCIONES PARA EL BUSCADOR DE "CONTROL.PHP" ---------------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

// xxxxxxxxxxxxxxx  FUNCION PARA CERRAR PANTALLA DE BUSCAR ACCESOS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function cerrarBuscarPor(){
  div = document.getElementById('mostrarBuscadorAutorizados');
  div.style.display = 'none';
    return false;
}

// FUNCIONES PARA ENCENDER INPUT'S EN EL BUSCADOR  -------------------------------------------------------------------------------------------
function encenderDatoUno(){
  var buscarPorDNI = document.getElementById('buscarPorDNI');
  var buscarPorNombreApellidosAcceso = document.getElementById('buscarPorNombreApellidosAcceso');

  var buscarDNI = document.getElementById('buscarDNI');
  var buscarNombreAcceso = document.getElementById('buscarNombreAcceso');
  var buscarApellidosAcceso = document.getElementById('buscarApellidosAcceso');

if(buscarPorDNI.checked){
  buscarDNI.className = "inputEncendidoBuscador";buscarDNI.disabled = false;
  buscarNombreAcceso.className = "inputApagadoBuscador";buscarNombreAcceso.disabled = true;
  buscarApellidosAcceso.className = "inputApagadoBuscador";buscarApellidosAcceso.disabled = true;

  buscarPorDNI.checked = true;
  buscarPorNombreApellidosAcceso.checked = false;

  buscarDNI.focus();
  buscarNombreAcceso.value = "";
  buscarApellidosAcceso.value = "";
}
else{
  buscarDNI.className = "inputApagadoBuscador";buscarDNI.disabled = true;
  buscarNombreAcceso.className = "inputApagadoBuscador";buscarNombreAcceso.disabled = true;
  buscarApellidosAcceso.className = "inputApagadoBuscador";buscarApellidosAcceso.disabled = true;
  }
} // Fin funcion encenderUno

function encenderDatoDos(){
  var buscarPorDNI = document.getElementById('buscarPorDNI');
  var buscarPorNombreApellidosAcceso = document.getElementById('buscarPorNombreApellidosAcceso');

  var buscarDNI = document.getElementById('buscarDNI');
  var buscarNombreAcceso = document.getElementById('buscarNombreAcceso');
  var buscarApellidosAcceso = document.getElementById('buscarApellidosAcceso');

if(buscarPorNombreApellidosAcceso.checked){
  buscarDNI.className = "inputApagadoBuscador";buscarDNI.disabled = true;
  buscarNombreAcceso.className = "inputEncendidoBuscador";buscarNombreAcceso.disabled = false;
  buscarApellidosAcceso.className = "inputEncendidoBuscador";buscarApellidosAcceso.disabled = false;

  buscarPorDNI.checked = false;
  buscarPorNombreApellidosAcceso.checked = true;
  buscarNombreAcceso.focus();
  buscarDNI.value = "";
}else{
  buscarDNI.className = "inputApagadoBuscador";buscarDNI.disabled = true;
  buscarNombreAcceso.className = "inputApagadoBuscador";buscarNombreAcceso.disabled = true;
  buscarApellidosAcceso.className = "inputApagadoBuscador";buscarApellidosAcceso.disabled = true;
  }
} // Fin funcion encenderDos

// FUNCIONES PARA VALIDAR INPUT DEL BUSCADOR  -------------------------------------------------------------------------------------------------
function validarBuscadorControl(){
  var buscarPorDNI = document.getElementById('buscarPorDNI');
  var buscarPorNombreApellidosAcceso = document.getElementById('buscarPorNombreApellidosAcceso');

  var buscarDNI = document.getElementById('buscarDNI');
  var buscarNombreAcceso = document.getElementById('buscarNombreAcceso');
  var buscarApellidosAcceso = document.getElementById('buscarApellidosAcceso');
  
  if(!buscarPorDNI.checked && !buscarPorNombreApellidosAcceso.checked){
    mostrarAvisoControl();
    tituloAviso = 'AVISO IMPORTANTE';
    mensajeAviso = 'DEBE DEBE SELECCIONAR UN MODO DE BUSQUEDA';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    
    buscarDNI.className = "inputApagadoBuscador";buscarDNI.disabled = true;
    buscarNombreAcceso.className = "inputApagadoBuscador";buscarNombreAcceso.disabled = true;
    buscarApellidosAcceso.className = "inputApagadoBuscador";buscarApellidosAcceso.disabled = true;
    return false;};

  if(buscarPorDNI.checked && buscarDNI.value.length == 0){
    mostrarAvisoControl();
    buscarDNI.focus();
    tituloAviso = 'INFORMACION INCOMPLETA';
    mensajeAviso = 'DEBE INDICAR UN Nº DE NOMINA/EMPLEADO CORRECTO';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  if(buscarPorNombreApellidosAcceso.checked && buscarNombreAcceso.value.length == 0){
    mostrarAvisoControl();
    buscarNombreAcceso.focus();
    tituloAviso = 'INFORMACION INCOMPLETA';
    mensajeAviso = 'DEBE INDICAR EL NOMBRE';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  if(buscarPorNombreApellidosAcceso.checked && buscarApellidosAcceso.value.length == 0){
    mostrarAvisoControl();
    buscarApellidosAcceso.focus();
    tituloAviso = 'INFORMACION INCOMPLETA';
    mensajeAviso = 'DEBE INDICAR LOS APELLIDOS';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
    document.buscarAccesoPor.submit();
  return true;
}





//ññlllñklnjhiusdchoiavoiufvhiuoAHVUOFHUOVHuovhou


/*
function validarVigilante(){
  var vigilante = document.getElementById('vigilante');
  var contrasenia = document.getElementById('contrasenia');
  if(vigilante.value.length === 0 || contrasenia.value.length === 0){tituloAviso = 'INFORMACION INCOMPLETA';};
  if(vigilante.value.length === 0){mensajeAviso = 'DEBE INDICAR UN USUARIO VALIDO';}else{mensajeAviso = 'DEBE INDICAR UNA CONTRASEÑA VALIDA';}
  if(vigilante.value.length === 0){mostrarAvisoControl();vigilante.focus(); return false;};
  if(contrasenia.value.length == 0){mostrarAvisoControl();contrasenia.focus(); return false;};
  document.loginVigilante.submit();
  return true;
}
*/




/*


function mostrarAvisoAutorizados2() {
  div = document.getElementById('avisoAutorizados2');
  div.style.display = 'block';
  //if(usuario.value.length == 0 || contrasena.value.length === 0){tituloAviso = 'INFORMACION INCOMPLETA';};
  //if(usuario.value.length == 0){mensajeAviso = 'DEBE INDICAR UN USUARIO VALIDO';}else{mensajeAviso = 'DEBE INDICAR UNA CONTRASEÑA VALIDA';};
  document.getElementById('tituloAviso2').innerHTML = tituloAviso2;
  document.getElementById('mensajeAviso2').innerHTML = mensajeAviso2;
}
function cerrarAvisoAutorizados2() {
div = document.getElementById('avisoAutorizados2');
div.style.display = 'none';
  //if(usuario.value.length === 0 & contrasena.value.length === 0){usuario.focus();}
  //if(usuario.value.length === 0){usuario.focus();}
  //else{contrasena.focus();}
  return false;
}
function avisoRegistroAutorizadoVacio() {
  div = document.getElementById('avisoRegistroAutorizadoVacio');
  div.style.display = 'block';
}
function cerrarAvisoRegistroAutorizadoVacio() {
  div = document.getElementById('avisoRegistroAutorizadoVacio');
  div.style.display = 'none';
  return true;
}
function noEnviarRegistroAutorizadoVacio(){
  var bool = $('.registroInputDatoAutorizado').toArray().some(function(el) {return $(el).val().length == 0});
  if (bool) {avisoRegistroAutorizadoVacio();return false;};
  document.actualizarRegistro.submit();
  return true;
}



*/











// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// --------------------------- FUNCIONES PARA MOSTRAR Y CERRAR VENTANAS DE ERRORES O AVISOS EN SOLICITUD DE ACCESOS  -------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx



// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// ---------------------------------------------  FUNCION PARA MOSTRAR ERRORES EN CAMBIO DE CLAVE  -------------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function validarClaves(){
  var claveUno = document.getElementById('claveNueva');
  var claveDos = document.getElementById('claveNuevaRepetida');
  if(claveUno.value.length == 0 || claveDos.value.length == 0){
    mostrarUnoSolicitudes();
    claveNueva.focus();
    tituloAviso = 'INFORMACION INCOMPLETA';
    mensajeAviso = 'DEBE INDICAR TODOS LOS DATOS';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  if(claveUno.value != claveDos.value){
    mostrarUnoSolicitudes();
    claveNueva.focus();
    tituloAviso = 'AVISO IMPORTANTE';
    mensajeAviso = 'LAS CONTRASEÑAS NO COINCIDEN';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  if(claveUno.value.length < 8){
    mostrarUnoSolicitudes();
    claveNueva.focus();
    tituloAviso = 'AVISO IMPORTANTE';
    mensajeAviso = 'LA CONTRASEÑA DEBE TENER AL MENOS 8 CARACTERES ALFANUMERICOS';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  if(claveUno.value.length > 14){
    mostrarUnoSolicitudes();
    claveNueva.focus();
    tituloAviso = 'AVISO IMPORTANTE';
    mensajeAviso = 'LA CONTRASEÑA NO PUEDE TENER MAS DE 14 CARACTERES ALFANUMERICOS';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  document.cambioContrasena.submit();
  return true;
}
// xxxxxxxxxxxxxxx  FUNCION PARA CERRAR PANTALLA DE BUSCAR ACCESOS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function cerrarBuscarPor(){
  div = document.getElementById('mostrarBuscadorAccesos');
  div.style.display = 'none';
    return false;
}
// xxxxxxxxxxxxxxx  FUNCION PARA MOSTRAR ERRORES EN OLVIDO DE CLAVE xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function validarDatos(){
  var nickUsuario = document.getElementById('nickUsuario');
  var numeroNomina = document.getElementById('numeroNomina');
  if(nickUsuario.value.length == 0 || numeroNomina.value.length == 0){
    mostrarUnoSolicitudes();nickUsuario.focus();
    tituloAviso = 'INFORMACION INCOMPLETA';
    mensajeAviso = 'DEBE INDICAR TODOS LOS DATOS CORRECTAMENTE';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  document.restablecerContrasena.submit();
  return true;
}
// xxxxxxxxxxxxxxx  FUNCION PARA PERMITIR SOLO NUMEROS Y LETRAS EN LAS CONTRASEÑAS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function caracteresPermitidos(e){
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toLowerCase();
  caracteres = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUWXYZ0123456789-./ ";
  especiales = [8, 37, 39, 46];

  tecla_especial = false
  for(var i in especiales) {
    if(key == especiales[i]) {
      tecla_especial = true;
        break;
    }
  }
    if(caracteres.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}
// xxxxxxxxxxxxxxx  FUNCIONES PARA MOSTRAR Y CERRAR VENTANAS DE ERRORES O AVISOS EN SOLICITUD DE ACCESOS - PRIMEROS PASOS  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function mostrarAvisoPrimerosDatos(){
div = document.getElementById('avisoPrimerosDatos');
div.style.display = 'block';
//var tituloAviso = 'INFORMACION INCOMPLETA';
if(numSolicitudes.value.length == 0){tituloAviso='INFORMACION INCOMPLETA',mensajeAviso='DEBE INDICAR NUMERO DE ACCESOS SOLICITADOS'}
else{if(edificioVisita.value == 'SELECCIONAR'){tituloAviso='INFORMACION INCOMPLETA',mensajeAviso='DEBE INDICAR EL EDIFICIO AL QUE ACCEDE LA VISITA'}
else{if(!document.querySelector('input[name="entradaDatos"]:checked')){tituloAviso='INFORMACION INCOMPLETA',mensajeAviso='DEBE ELEGIR UNA FORMA DE INTRODUCIR DATOS'}
else{if((!document.querySelector('input[name="igualSolicitante"]:checked'))&(nombreResponsable.value.length == 0 && apellidosResponsable.value.length == 0)){tituloAviso='INFORMACION INCOMPLETA',mensajeAviso='DEBE INDICAR UN RESPONSABLE DE LA VISITA'}
else{if((!document.querySelector('input[name="igualSolicitante"]:checked'))&(nombreResponsable.value.length == 0)){tituloAviso='INFORMACION INCOMPLETA',mensajeAviso='DEBE INDICAR EL NOMBRE DEL RESPONSABLE DE LA VISITA'}
else{if((!document.querySelector('input[name="igualSolicitante"]:checked'))&(apellidosResponsable.value.length == 0)){tituloAviso='INFORMACION INCOMPLETA',mensajeAviso='DEBE INDICAR LOS APELLIDOS DEL RESPONSABLE DE LA VISITA'}
;}// final de reponsable (2)
;}// final de reponsable (1)
;}// final entradaDatos
;}// final edificioVisita
;};// final numSolicitides
document.getElementById('tituloAviso').innerHTML = tituloAviso;
document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
return false;
}
function cerrarAviso() {
div = document.getElementById('avisoPrimerosDatos');
div.style.display = 'none';
if(numSolicitudes.value.length === 0){numSolicitudes.focus();}
  if(numSolicitudes.value.length === 0 && edificioVisita.value == 'SELECCIONAR' && !document.querySelector('input[name="entradaDatos"]:checked')){numSolicitudes.focus();}
    else{
      if(edificioVisita.value == 'SELECCIONAR' && !document.querySelector('input[name="entradaDatos"]:checked')){edificioVisita.focus();}
        else{
          if(!document.querySelector('input[name="entradaDatos"]:checked')){entradaDatos.focus();};};
};
return false;}
// FUNCIONES PARA VALIDAR PRIMEROS DATOS
function validarPrimerosDatos(){
var numSolicitudes = document.getElementById('numSolicitudes');
var edificioVisita = document.getElementById('edificioVisita');
var nombreResponsable = document.getElementById('nombreResponsable');
var apellidosResponsable = document.getElementById('apellidosResponsable');
if(numSolicitudes.value.length == 0){mostrarAvisoPrimerosDatos();numSolicitudes.focus();return false;};
if(edificioVisita.value=='SELECCIONAR'){mostrarAvisoPrimerosDatos();edificioVisita.focus();return false;};
if(!document.querySelector('input[name="entradaDatos"]:checked')){mostrarAvisoPrimerosDatos();return false;};
if((!document.querySelector('input[name="igualSolicitante"]:checked'))&(nombreResponsable.value.length == 0||apellidosResponsable.value.length == 0)){mostrarAvisoPrimerosDatos();return false;};
document.primerosDatos.submit();
return true;}
// FUNCION para apagar datos en FORMULARIO PRIMEROS DATOS
function apagarDato(){
  if(document.querySelector('input[name="igualSolicitante"]:checked')){
    document.getElementById('nombreResp').className = "labelApagado";
    document.getElementById('apellidosResp').className = "labelApagado";
    document.getElementById('nombreResponsable').className = "inputApagado";document.getElementById('nombreResponsable').disabled = true;
    document.getElementById('apellidosResponsable').className = "inputApagado";document.getElementById('apellidosResponsable').disabled = true;}
  else{
    document.getElementById('nombreResp').className = "labelEncendido";
    document.getElementById('apellidosResp').className = "labelEncendido";
    document.getElementById('nombreResponsable').className = "inputEncendido";document.getElementById('nombreResponsable').disabled = false;
    document.getElementById('apellidosResponsable').className = "inputEncendido";document.getElementById('apellidosResponsable').disabled = false;}
}
// xxxxxxxxxxxxxxx  FUNCIONES PARA MOSTRAR Y CERRAR VENTANAS DE ERRORES O AVISOS EN CONTROL DE ACCESOS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function mostrarErrorQR() {
  div = document.getElementById('mostrarErrorQR');
  div.style.display = 'block';
  document.getElementById('tituloAvisoQR').innerHTML = 'INFORMACION IMPORTANTE: CODIGO QR NO ENCONTRADO';
  document.getElementById('mensajeAvisoQR').innerHTML = 'REVISE LAS FECHAS DEL ACCESO SOLICITADO<br>EN EL CORREO RECIBIDO CON EL CODIGO QR CORRESPONDIENTE';
}
function cerrarErrorQR() {
  div = document.getElementById('mostrarErrorQR');
  div.style.display = 'none';
    qr.focus();
    return false;
}
// VALIDAR ELEMENTOS VACIOS DE PANTALLAS: ENTRADA MANUAL, MOSTRAR ACCESOS, EDITAR ACCESOS Y BORRAR ACCESOS
// 1) Validación de entrada manual de accesos
function mostrarAvisoManualVacio() {
  div = document.getElementById('mostrarAvisoManualVacio');
  div.style.display = 'block';
}
function cerrarAvisoManualVacio() {
  div = document.getElementById('mostrarAvisoManualVacio');
  div.style.display = 'none';
  return false;
}
function noEnviarDatosVacios(){
  var bool = $('.manualInputDato').toArray().some(function(el) {return $(el).val().length == 0});
  if (bool) {mostrarAvisoManualVacio();return false;};
  document.manualText.submit();
  return true;
}
// 2) Validación de edición de accesos
function mostrarAvisoEditarVacio() {
  div = document.getElementById('mostrarAvisoEditarVacio');
  div.style.display = 'block';
}
function cerrarAvisoEditarVacio() {
  div = document.getElementById('mostrarAvisoEditarVacio');
  div.style.display = 'none';
  return false;
}
function noEnviarDatosEditarVacios(){
  var bool = $('.editarInputDato').toArray().some(function(el) {return $(el).val().length == 0});
  if (bool) {mostrarAvisoEditarVacio();return false;};
  document.textEditado.submit();
  return true;
}
// 3) Validación de pantalla mostrar tabla de accesos
function mostrarAvisoTablaAccesos() {
  div = document.getElementById('mostrarAvisoDatosVacios');
  div.style.display = 'block';
}
function cerrarAvisoDatosVacios() {
  div = document.getElementById('mostrarAvisoDatosVacios');
  div.style.display = 'none';
  return false;
}
function noEnviarDatosVacios(){
div = document.getElementById('errorFecha');
  if(div.innerHTML.style.visibily = 'hidden'){
  document.enviarTablaAccesos.submit();
  return true;}
  //mostrarAvisoTablaAccesos();
  return false;
}
// FUNCIONES PARA VALIDAR ENVIO DE CORREO CON CODIGOS_QR  ----------------------------------------------------------------------------------------
function cerrarAvisoSinDestinatario() {
  div = document.getElementById('mostrarAvisoSinDestinatario');
  div.style.display = 'none';
    correoDestinatario.focus();
    return false;
}
//------------------------------------------------------------------------------------------------------------------------------------------------
// FUNCIONES PARA MOSTRAR Y CERRAR VENTANAS DE ERRORES O AVISOS EN AUTORIZADOS
//------------------------------------------------------------------------------------------------------------------------------------------------
function mostrarUnoAutorizados() {
  div = document.getElementById('mostrarAvisoAutorizadosUno');
  div.style.display = 'block';
  if(gestor.value.length == 0 || contrasena.value.length === 0){tituloAviso = 'INFORMACION INCOMPLETA';};
  if(gestor.value.length == 0){mensajeAviso = 'DEBE INDICAR UN GESTOR VALIDO';}else{mensajeAviso = 'DEBE INDICAR UNA CONTRASEÑA VALIDA';};
  document.getElementById('tituloAviso').innerHTML = tituloAviso;
  document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
}
function cerrarUnoAutorizados() {
div = document.getElementById('mostrarAvisoAutorizadosUno');
div.style.display = 'none';
  if(gestor.value.length === 0 & contrasena.value.length === 0){gestor.focus();}
  if(gestor.value.length === 0){gestor.focus();}
  else{contrasena.focus();}
  return false;
}
function cerrarDosAutorizados() {
div = document.getElementById('mostrarAvisoAutorizadosDos');
div.style.display = 'none';
  if(gestor.value.length === 0 & contrasena.value.length === 0){gestor.focus();}
  if(gestor.value.length === 0){gestor.focus();}
  else{contrasena.focus();}
  return false;
}
function cerrarTresAutorizados() {
div = document.getElementById('mostrarAvisoAutorizadosTres');
div.style.display = 'none';
  if(gestor.value.length === 0 & contrasena.value.length === 0){gestor.focus();}
  if(gestor.value.length === 0){gestor.focus();}
  else{contrasena.focus();}
  return false;
}
function cerrarCuatroAutorizados() {
div = document.getElementById('mostrarAvisoAutorizadosCuatro');
div.style.display = 'none';
  gestor.focus();
  return false;
}
function cerrarCincoAutorizados() {
  div = document.getElementById('mostrarAvisoautorizadosCinco');
  div.style.display = 'none';
    gestor.focus();
    return false;
}
function validarGestor(){
  var gestor = document.getElementById('gestor');
  var contrasena = document.getElementById('contrasena');
  if(gestor.value.length == 0){mostrarUnoAutorizados();gestor.focus();return false;};
  if(contrasena.value.length == 0){mostrarUnoAutorizados();contrasena.focus();return false;};
  document.loginGestor.submit();
  return true;
}
// ---------------------------------- FUNCIONES PARA VALIDAR DATOS PREVIOS EN AUTORIZADOS -------------------------------
function mostrarAvisoDatosPrevios(){
  div = document.getElementById('avisoDatosPrevios');
  div.style.display = 'block';
  if(numRegistros.value.length == 0){tituloAviso='INFORMACION INCOMPLETA',mensajeAviso='DEBE INDICAR NUMERO DE REGISTROS'}
  else{if(!document.querySelector('input[name="entradaDatos"]:checked')){tituloAviso='INFORMACION INCOMPLETA',mensajeAviso='DEBE ELEGIR UNA FORMA DE INTRODUCIR DATOS'}
  else{if((!document.querySelector('input[name="igualGestor"]:checked'))&(nombreResponsableAutorizacion.value.length == 0 && apellidosResponsableAutorizacion.value.length == 0)){tituloAviso='INFORMACION INCOMPLETA',mensajeAviso='DEBE INDICAR UN RESPONSABLE DE LA AUTORIZACION'}
  else{if((!document.querySelector('input[name="igualGestor"]:checked'))&(nombreResponsableAutorizacion.value.length == 0)){tituloAviso='INFORMACION INCOMPLETA',mensajeAviso='DEBE INDICAR EL NOMBRE DEL RESPONSABLE DE LA AUTORIZACION'}
  else{if((!document.querySelector('input[name="igualGestor"]:checked'))&(apellidosResponsableAutorizacion.value.length == 0)){tituloAviso='INFORMACION INCOMPLETA',mensajeAviso='DEBE INDICAR LOS APELLIDOS DEL RESPONSABLE DE LA AUTORIZACION'}
  ;}// final de reponsable (2)
  ;}// final de reponsable (1)
  ;};
  ;};
  document.getElementById('tituloAviso').innerHTML = tituloAviso;
  document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
  return false;
} // Final Funcion Mostrar Aviso
function cerrarAvisoDatosPrevios() {
  div = document.getElementById('avisoDatosPrevios');
  div.style.display = 'none';
  if(numRegistros.value.length === 0){numRegistros.focus();}
    if(numRegistros.value.length === 0 && !document.querySelector('input[name="entradaDatos"]:checked')){numRegistros.focus();}
      else{if(!document.querySelector('input[name="entradaDatos"]:checked')){entradaDatos.focus();};};
  return false;
} // Final Funcion Cerrar Aviso
function apagarDatoGestor(){
  if(document.querySelector('input[name="igualGestor"]:checked')){
    document.getElementById('nombreRespons').className = "labelApagado";
    document.getElementById('apellidosRespons').className = "labelApagado";
    document.getElementById('nombreResponsableAutorizacion').className = "inputApagado";document.getElementById('nombreResponsableAutorizacion').disabled = true;
    document.getElementById('apellidosResponsableAutorizacion').className = "inputApagado";document.getElementById('apellidosResponsableAutorizacion').disabled = true;}
  else{
    document.getElementById('nombreRespons').className = "labelEncendido";
    document.getElementById('apellidosRespons').className = "labelEncendido";
    document.getElementById('nombreResponsableAutorizacion').className = "inputEncendido";document.getElementById('nombreResponsableAutorizacion').disabled = false;
    document.getElementById('apellidosResponsableAutorizacion').className = "inputEncendido";document.getElementById('apellidosResponsableAutorizacion').disabled = false;}
}// Final apagar input y label
function validarDatosPrevios(){
  var numRegistros = document.getElementById('numRegistros');
  var nombreResponsableAutorizacion = document.getElementById('nombreResponsableAutorizacion');
  var apellidosResponsableAutorizacion = document.getElementById('apellidosResponsableAutorizacion');
  if(numRegistros.value.length == 0){mostrarAvisoDatosPrevios();numRegistros.focus();return false;};
  if(!document.querySelector('input[name="entradaDatos"]:checked')){mostrarAvisoDatosPrevios();return false;};
  if((!document.querySelector('input[name="igualGestor"]:checked'))&(nombreResponsableAutorizacion.value.length == 0||apellidosResponsableAutorizacion.value.length == 0)){mostrarAvisoDatosPrevios();return false;};
  document.datosPrevios.submit();
  return true;}
// xxxxxxxxxxxxxxx  FUNCIONES PARA BORRAR VALORES PEGADOS EN LOS INPUT'S xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// PARA FOMULARIO DE IDENTIFICACION
function limpiaUno(){
  var valUno = document.getElementById("usuario").value;
  var tamUno = valUno.length;
  for(i = 0; i < tamUno; i++) {
      if(!isNaN(valUno[i]))
        document.getElementById("usuario").value = '';
  }
}
function limpiaDos() {
  var valDos = document.getElementById("contrasena").value;
  var tamDos = valDos.length;
  for(i = 0; i < tamDos; i++) {
      if(!isNaN(valDos[i]))
        document.getElementById("contrasena").value = '';
  }
}
//  ----------------------------------------------------------------------
//  PARA FORMULARIO DE CAMBIO DE CONTRASEÑA POR PRIMER USO DEL PROGRAMA
function limpiaTres() {
  var valTres = document.getElementById("claveNuevaUno").value;
  var tamTres = valTres.length;
  for(i = 0; i < tamTres; i++) {
      if(!isNaN(valTres[i]))
        document.getElementById("claveNuevaUno").value = '';
  }
}
function limpiaCuatro() {
  var valCuatro = document.getElementById("claveNuevaUnoRepetida").value;
  var tamCuatro = valCuatro.length;
  for(i = 0; i < tamCuatro; i++) {
      if(!isNaN(valCuatro[i]))
        document.getElementById("claveNuevaUnoRepetida").value = '';
  }
}
//  ----------------------------------------------------------------------
//  PARA FORMULARIO ACTUALIZAR CONTRASEÑA POR OLVIDO
function limpiaCinco() {
  var valCinco = document.getElementById("claveNuevaDos").value;
  var tamCinco = valCinco.length;
  for(i = 0; i < tamCinco; i++) {
      if(!isNaN(valCinco[i]))
        document.getElementById("claveNuevaDos").value = '';
  }
}
function limpiaSeis() {
  var valSeis = document.getElementById("claveNuevaDosRepetida").value;
  var tamSeis = valSeis.length;
  for(i = 0; i < tamSeis; i++) {
      if(!isNaN(valSeis[i]))
        document.getElementById("claveNuevaDosRepetida").value = '';
  }
}
//  ----------------------------------------------------------------------
//  PARA FORMULARIO DE CAMBIO DE CONTRASEÑA POR OLVIDO Y PRIMER USO DEL PROGRAMA
function limpiaSiete() {
  var valSiete = document.getElementById("claveNuevaTres").value;
  var tamSiete = valSiete.length;
  for(i = 0; i < tamSiete; i++) {
      if(!isNaN(valSiete[i]))
        document.getElementById("claveNuevaTres").value = '';
  }
}
function limpiaOcho() {
  var valOcho = document.getElementById("claveNuevaTresRepetida").value;
  var tamOcho = valOcho.length;
  for(i = 0; i < tamOcho; i++) {
      if(!isNaN(valOcho[i]))
        document.getElementById("claveNuevaTresRepetida").value = '';
  }
}
//  ----------------------------------------------------------------------
//  PARA FORMULARIO USUARIO Y Nº DE NUMINA POR OLVIDO
function limpiaNueve() {
  var valNueve = document.getElementById("nickUsuario").value;
  var tamNueve = valNueve.length;
  for(i = 0; i < tamNueve; i++) {
      if(!isNaN(valNueve[i]))
        document.getElementById("nickUsuario").value = '';
  }
}
function limpiaDiez() {
  var valDiez = document.getElementById("numeroNomina").value;
  var tamDiez = valDiez.length;
  for(i = 0; i < tamDiez; i++) {
      if(!isNaN(valDiez[i]))
        document.getElementById("numeroNomina").value = '';
  }
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// ----------------------------  FUNCION PARA IMPEDIR QUE SE MANDEN TEXT VACIOS EDICION DE DATOS (accion=0) ----------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
/*
function noEnviarDatosEditarVacios(){
  var bool = $('.actualizarInputDatos').toArray().some(function(el) {return $(el).val().length == 0});
  if (bool) {mostrarAvisoEditarVacio();return false;};
  document.textEditado.submit();
  return true;
}
  */
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// -------------------------------  FUNCION PARA HABILITAR Y DESTACAR LOS INPUTS A ACTUALIZAR EN EDICION DE ACCESOS  -------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function habilitarInputs(id_boton){
// ESTE PRIMER CODIGO ES PARA APAGAR Y EVITAR EDICION DE LOS INPUTS NO SELECCIONADOS ---------------------------------------------------------
  $('.datoEncendido').removeClass("datoEncendido").addClass("datoApagado");
  $('.actualizarInput').prop('disabled', true);
// -------------------------------------------------------------------------------------------------------------------------------------------
  var x = document.getElementById(id_boton).value;

  var datoUno = document.getElementById('datoDNI-'+x);
  var datoDos = document.getElementById('datoNombre-'+x);
  var datoTres = document.getElementById('datoApellidos-'+x);
  var datoCuatro = document.getElementById('datoEmpresa-'+x);
  var datoCinco = document.getElementById('datoVehiculo-'+x);
  var datoSeis = document.getElementById('datoFechaInicial-'+x);
  var datoSiete = document.getElementById('datoFechaFinal-'+x);
  var datoOcho = document.getElementById('datoEdificio-'+x);
  var datoNueve = document.getElementById('datoMotivo-'+x);
  var datoDiez = document.getElementById('datoObservaciones-'+x);

  var inputUno = document.getElementById('inputDNI-'+x);
  var inputDos = document.getElementById('inputNombre-'+x);
  var inputTres = document.getElementById('inputApellidos-'+x);
  var inputCuatro= document.getElementById('inputEmpresa-'+x);
  var inputCinco = document.getElementById('inputVehiculo-'+x);
  var inputSeis = document.getElementById('inputFechaInicial-'+x);
  var inputSiete = document.getElementById('inputFechaFinal-'+x);
  var inputOcho = document.getElementById('inputEdificio-'+x);
  var inputNueve = document.getElementById('inputMotivo-'+x);
  var inputDiez = document.getElementById('inputObservaciones-'+x);
  var inputOnce = document.getElementById('inputID-'+x);
  var inputDoce = document.getElementById('inputQR-'+x);
  var inputTrece = document.getElementById('inputIDResp-'+x);
  var inputCatorce = document.getElementById('inputNombreResp-'+x);
  var inputQuince = document.getElementById('inputTelefonoResp-'+x);

  if(datoUno.className == 'datoApagado'){datoUno.className = 'datoEncendido';inputUno.disabled = false;}else{datoUno.className = 'datoApagado';inputUno.disabled = true;}
  if(datoDos.className == 'datoApagado'){datoDos.className = 'datoEncendido';inputDos.disabled = false;}else{datoDos.className = 'datoApagado';inputDos.disabled = true}
  if(datoTres.className == 'datoApagado'){datoTres.className = 'datoEncendido';inputTres.disabled = false;}else{datoTres.className = 'datoApagado';inputTres.disabled = true}
  if(datoCuatro.className == 'datoApagado'){datoCuatro.className = 'datoEncendido';inputCuatro.disabled = false;}else{datoCuatro.className = 'datoApagado';inputCuatro.disabled = true}
  if(datoCinco.className == 'datoApagado'){datoCinco.className = 'datoEncendido';inputCinco.disabled = false;}else{datoCinco.className = 'datoApagado';inputCinco.disabled = true}
  if(datoSeis.className == 'datoApagado'){datoSeis.className = 'datoEncendido';inputSeis.disabled = false;}else{datoSeis.className = 'datoApagado';inputSeis.disabled = true}
  if(datoSiete.className == 'datoApagado'){datoSiete.className = 'datoEncendido';inputSiete.disabled = false;}else{datoSiete.className = 'datoApagado';inputSiete.disabled = true}
  if(datoOcho.className == 'datoApagado'){datoOcho.className = 'datoEncendido';inputOcho.disabled = false;}else{datoOcho.className = 'datoApagado';inputOcho.disabled = true}
  if(datoNueve.className == 'datoApagado'){datoNueve.className = 'datoEncendido';inputNueve.disabled = false;}else{datoNueve.className = 'datoApagado';inputNueve.disabled = true}
  if(datoDiez.className == 'datoApagado'){datoDiez.className = 'datoEncendido';inputDiez.disabled = false;}else{datoDiez.className = 'datoApagado';inputDiez.disabled = true}
//  PARA LOS INPUT's "HIDDEN"
  if(inputOnce.className == 'actualizarInput'){inputOnce.disabled = false;}else{inputOnce.disabled = true}
  if(inputDoce.className == 'actualizarInput'){inputDoce.disabled = false;}else{inputDoce.disabled = true}
  if(inputTrece.className == 'actualizarInput'){inputTrece.disabled = false;}else{inputTrece.disabled = true}
  if(inputCatorce.className == 'actualizarInput'){inputCatorce.disabled = false;}else{inputCatorce.disabled = true}
  if(inputQuince.className == 'actualizarInput'){inputQuince.disabled = false;}else{inputQuince.disabled = true}
}
//    ESTOY AQUI ----------------------------------------------------------------------------------------------------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// -------------------------------  FUNCION PARA IMPEDIR QUE SE MANDEN INPUT´S VACIOS  -------------------------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// 2) Validación de edición de accesos (accion=1)
function mostrarAvisoEditarVacio() {
  div = document.getElementById('mostrarAvisoEditarVacio');
  div.style.display = 'block';
}
function cerrarAvisoEditarVacio() {
  div = document.getElementById('mostrarAvisoEditarVacio');
  div.style.display = 'none';
  return false;
}
function noEnviarInputVacios(){
  var bool = $('.actualizarInput').toArray().some(function(el) {return $(el).val().length == 0});
  if (bool) {mostrarAvisoEditarVacio();return false;};
  document.actualizar.submit();
  return true;
}

//    ESTOY AQUI
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// -------------------------------  FUNCION PARA NO HABILITAR LOS INPUTS PARA ACTUALIZAR O ANULAR --------------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function avisoChequeoInputs(){

if(!buscarPorDNI.checked||!buscarNombre.checked||!buscarEmpresa.checked||!buscarFechaInicio.checked ){alert("no hay seleccion")}

} //  Fin FUNCION validar CHEQUEOS
/*
  buscarDNI.className = "inputEncendido";buscarDNI.disabled = false;
  buscarNombre.className = "inputApagado";buscarNombre.disabled = true;
  buscarApellidos.className = "inputApagado";buscarApellidos.disabled = true;
  buscarEmpresa.className = "inputApagado";buscarEmpresa.disabled = true;
  buscarFechaInicio.className = "inputApagado";buscarFechaInicio.disabled = true;
  buscarPorDNI.checked = true;
  buscarPorNombreApellidos.checked = false;
  buscarPorEmpresa.checked = false;
  buscarPorFechaInicio.checked = false;
  buscarDNI.focus();
  buscarNombre.value = "";
  buscarApellidos.value = "";
  buscarEmpresa.value = "";
  buscarFechaInicio.value = "";
}else{
  buscarDNI.className = "inputApagado";buscarDNI.disabled = true;
  buscarNombre.className = "inputApagado";buscarNombre.disabled = true;
  buscarApellidos.className = "inputApagado";buscarApellidos.disabled = true;
  buscarEmpresa.className = "inputApagado";buscarEmpresa.disabled = true;
  buscarFechaInicio.className = "inputApagado";buscarFechaInicio.disabled = true;
  }
} // Fin funcion encenderUno





*/


/*
function actualizarAccesos(){

  document.getElementById("comienzoForm").innerHTML = "<form id='actualizarAccesos' name='actualizarAccesos' action='solicitudes.php' method='get'>";
  document.getElementById("finalForm").innerHTML = "</form>";
}
*/
/*
$(document).ready(function() {
  $('id.actualizar').submit(function(e) {
      e.preventDefault();
      // o return false;
  });
});
*/
/*
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// ---------------------------- FUNCIONES PARA MOSTRAR Y CERRAR VENTANAS DE ERRORES O AVISOS EN CONTROL DE ACCESOS  --------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function mostrarUno() {
    div = document.getElementById('mostrarAviso-Uno');
    div.style.display = 'block';
    if(vigilante.value.length == 0 || contrasenia.value.length === 0){tituloAviso = 'INFORMACION INCOMPLETA';};
    if(vigilante.value.length == 0){mensajeAviso = 'DEBE INDICAR UN USUARIO VALIDO';}else{mensajeAviso = 'DEBE INDICAR UNA CONTRASEÑA VALIDA';};
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
}
function cerrarUno() {
  div = document.getElementById('mostrarAviso-Uno');
  div.style.display = 'none';
    if(vigilante.value.length === 0 & contrasenia.value.length === 0){vigilante.focus();}
    if(vigilante.value.length === 0){vigilante.focus();}
    else{contrasenia.focus();}
    return false;
}
function cerrarDos() {
  div = document.getElementById('mostrarAvisoDos');
  div.style.display = 'none';
    if(vigilante.value.length === 0 & contrasenia.value.length === 0){vigilante.focus();}
    if(vigilante.value.length === 0){vigilante.focus();}
    else{contrasenia.focus();}
    return false;
}
function cerrarTres() {
  div = document.getElementById('mostrarAvisoTres');
  div.style.display = 'none';
    if(vigilante.value.length === 0 & contrasenia.value.length === 0){vigilante.focus();}
    if(vigilante.value.length === 0){vigilante.focus();}
    else{contrasenia.focus();}
    return false;
}
function cerrarCuatro() {
  div = document.getElementById('mostrarAvisoCuatro');
  div.style.display = 'none';
    vigilante.focus();
    return false;
}
*/