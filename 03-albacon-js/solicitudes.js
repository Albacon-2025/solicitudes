
function pegarExcel(){
  navigator.clipboard
  .readText()
  .then(
  (clipText) => (document.querySelector(".clip-text").innerHTML = clipText), enviar.focus());
  document.querySelector("#texto").style.borderColor = ' #CCCCCC';
  document.querySelector("#pegar").style.display = 'none';
  document.querySelector("#pegadoOK").style.display = 'inline-block';
  /*
  document.querySelector("#pegadoOK").style.visibility = 'visible';
  document.querySelector("#enviar").style.visibility = 'visible';
  document.querySelector("#cambiar").style.visibility = 'visible';
  */
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// --------------------------- FUNCIONES PARA MOSTRAR Y CERRAR VENTANAS DE ERRORES O AVISOS EN SOLICITUD DE ACCESOS  -------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
/*  FUNCION PARA MOSTRAR LOS DISTINTOS AVISOS DEL ARCHIVO SOLICITUDES.PHP --------------------------------------------------------------- */
function mostrarAvisoSolicitudes() {
  div = document.getElementById('avisoSolicitudes');
  div.style.display = 'flex';
  if(usuario.value.length == 0 || contrasena.value.length === 0){tituloAviso = 'INFORMACION INCOMPLETA';};
  if(usuario.value.length == 0){mensajeAviso = 'DEBE INDICAR UN USUARIO VALIDO';}else{mensajeAviso = 'DEBE INDICAR UNA CONTRASEÑA VALIDA';};
  document.getElementById('tituloAviso').innerHTML = tituloAviso;
  document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
}
function cerrarAvisoSolicitudes() {
div = document.getElementById('avisoSolicitudes');
div.style.display = 'none';
  if(usuario.value.length === 0 & contrasena.value.length === 0){usuario.focus();}
  if(usuario.value.length === 0){usuario.focus();}
  else{contrasena.focus();}
  return false;
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// -----------------------------------  FUNCION MOSTRAR ERROR POR CAMPOS DE USUARIO O CONTRASEÑA VACIOS  -------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function validarUsuario(){
  var usuario = document.getElementById('usuario');
  var contrasena = document.getElementById('contrasena');
  if(usuario.value.length == 0){mostrarAvisoSolicitudes();usuario.focus();return false;};
  if(contrasena.value.length == 0){mostrarAvisoSolicitudes();contrasena.focus();return false;};
  document.loginUsuario.submit();
  return true;
}
function cerrarAvisoValidacion() {
div = document.getElementById('avisoErrorValidacion');
div.style.display = 'none';
  if(usuario.value.length === 0 & contrasena.value.length === 0){usuario.focus();}
  if(usuario.value.length === 0){usuario.focus();}
  else{contrasena.focus();}
  return false;
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// -----------------------------  FUNCION MOSTRAR ERROR POR CAMPOS DE USUARIO O NOMINA VACIOS OLVIDO CONTRASEÑA  -----------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function validarDatos(){
  var nickUsuario = document.getElementById('nickUsuario');
  var numeroNomina = document.getElementById('numeroNomina');
  if(nickUsuario.value.length == 0 || numeroNomina.value.length == 0){
    mostrarAvisoSolicitudes();nickUsuario.focus();
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
function validarClaves(){
  var claveUno = document.getElementById('claveNueva');
  var claveDos = document.getElementById('claveNuevaRepetida');
  if(claveUno.value.length == 0 || claveDos.value.length == 0){
    mostrarAvisoSolicitudes();
    claveNueva.focus();
    tituloAviso = 'INFORMACION INCOMPLETA';
    mensajeAviso = 'DEBE INDICAR TODOS LOS DATOS';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  if(claveUno.value != claveDos.value){
    mostrarAvisoSolicitudes();
    claveNueva.focus();
    tituloAviso = 'AVISO IMPORTANTE';
    mensajeAviso = 'LAS CONTRASEÑAS NO COINCIDEN';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  if(claveUno.value.length < 8){
    mostrarAvisoSolicitudes();
    claveNueva.focus();
    tituloAviso = 'AVISO IMPORTANTE';
    mensajeAviso = 'LA CONTRASEÑA DEBE TENER AL MENOS 8 CARACTERES ALFANUMERICOS';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  if(claveUno.value.length > 14){
    mostrarAvisoSolicitudes();
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
// -----------------------------------  FUNCION PARA PERMITIR SOLO NUMEROS Y LETRAS EN LAS CONTRASEÑAS  --------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function caracteresPermitidos(e){
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toLowerCase();
  caracteres = "abcdefghijklmnñopqrstuüvwxyzABCDEFGHIJKLMNÑOPQRSTUÜWXYZ0123456789-./ºª ";
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
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// -----------------  FUNCIONES PARA MOSTRAR Y CERRAR VENTANAS DE ERRORES O AVISOS EN SOLICITUD DE ACCESOS - PRIMEROS PASOS  -----------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function mostrarAvisoPrimerosDatos(){
div = document.getElementById('avisoPrimerosDatos');
div.style.display = 'flex';
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

// FUNCION PARA APAGAR INPUT'S EN FORMULARIO PRIMEROS DATOS
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
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// --------  FUNCIONES PARA VALIDAR ELEMENTOS VACIOS DE PANTALLAS: ENTRADA MANUAL, MOSTRAR ACCESOS, EDITAR ACCESOS Y BORRAR ACCESOS  ---------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// 1) VALIDACION DE ENTRADA MANUAL DE ACCESOS
function avisoManualVacio() {
  div = document.getElementById('avisoManualVacio');
  div.style.display = 'flex';
}
function cerrarAvisoManualVacio() {
  div = document.getElementById('avisoManualVacio');
  div.style.display = 'none';
  return true;
}
function noEnviarManualVacio(){
  var bool = $('.manualInputDato').toArray().some(function(el) {return $(el).val().length == 0});
  if (bool) {avisoManualVacio();return false;};
  document.manualText.submit();
  return true;
}
// 2) VALIDACION DE EDICION DE ACCESOS
function avisoEditarVacio() {
  div = document.getElementById('avisoEditarVacio');
  div.style.display = 'flex';
}
function cerrarAvisoEditarVacio() {
  div = document.getElementById('avisoEditarVacio');
  div.style.display = 'none';
  return true;
}
function noEnviarEditarVacios(){
  var bool = $('.editarInputDato').toArray().some(function(el) {return $(el).val().length == 0});
  if (bool) {avisoEditarVacio();return false;};
  document.textEditado.submit();
  return true;
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// ---------------------------------------  FUNCIONES PARA CERRAR AVISO CORREO SIN DESTINATARIO  ---------------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function cerrarAvisoSinDestinatario() {
  div = document.getElementById('avisoSinDestinatario');
  div.style.display = 'none';
  correoDestinatario.focus();
  return false;
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// -------------------------------------  FUNCIONES PARA BORRAR (LIMPIAR) VALORES PEGADOS EN LOS INPUT'S  ------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
//  1) PARA FOMULARIO DE IDENTIFICACION  -----------------------------------------------------------------------------------------------------
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
//  2) PARA FORMULARIO DE CAMBIO DE CONTRASEÑA POR PRIMER USO DEL PROGRAMA  ------------------------------------------------------------------
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
//  3) PARA FORMULARIO ACTUALIZAR CONTRASEÑA POR OLVIDO  -------------------------------------------------------------------------------------
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
//  4) PARA FORMULARIO DE CAMBIO DE CONTRASEÑA POR OLVIDO Y PRIMER USO DEL PROGRAMA  ---------------------------------------------------------
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
//  4) PARA FORMULARIO USUARIO Y Nº DE NOMINA POR OLVIDO  ------------------------------------------------------------------------------------
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
// ----------------------------------------------------  FUNCIONES PARA EL BUSCADOR  ---------------------------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

// xxxxxxxxxxxxxxx  FUNCION PARA CERRAR PANTALLA DE BUSCAR ACCESOS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function cerrarBuscarPor(){
  div = document.getElementById('mostrarBuscadorAccesos');
  div.style.display = 'none';
    return false;
}
// FUNCIONES PARA ENCENDER INPUT'S EN EL BUSCADOR  -------------------------------------------------------------------------------------------
function encenderDatoUno(){

  var buscarPorDNI = document.getElementById('buscarPorDNI');
  var buscarPorNombreApellidos = document.getElementById('buscarPorNombreApellidos');
  var buscarPorEmpresa = document.getElementById('buscarPorEmpresa');
  var buscarPorFechaInicio = document.getElementById('buscarPorFechaInicio');

  var buscarDNI = document.getElementById('buscarDNI');
  var buscarNombre = document.getElementById('buscarNombre');
  var buscarApellidos = document.getElementById('buscarApellidos');
  var buscarEmpresa = document.getElementById('buscarEmpresa');
  var buscarFechaInicio = document.getElementById('buscarFechaInicio');

if(buscarPorDNI.checked){
  buscarDNI.className = "inputEncendidoBuscador";buscarDNI.disabled = false;
  buscarNombre.className = "inputApagadoBuscador";buscarNombre.disabled = true;
  buscarApellidos.className = "inputApagadoBuscador";buscarApellidos.disabled = true;
  buscarEmpresa.className = "inputApagadoBuscador";buscarEmpresa.disabled = true;
  buscarFechaInicio.className = "inputApagadoBuscador";buscarFechaInicio.disabled = true;
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
  buscarDNI.className = "inputApagadoBuscador";buscarDNI.disabled = true;
  buscarNombre.className = "inputApagadoBuscador";buscarNombre.disabled = true;
  buscarApellidos.className = "inputApagadoBuscador";buscarApellidos.disabled = true;
  buscarEmpresa.className = "inputApagadoBuscador";buscarEmpresa.disabled = true;
  buscarFechaInicio.className = "inputApagadoBuscador";buscarFechaInicio.disabled = true;
  }
} // Fin funcion encenderUno
function encenderDatoDos(){

  var buscarPorDNI = document.getElementById('buscarPorDNI');
  var buscarPorNombreApellidos = document.getElementById('buscarPorNombreApellidos');
  var buscarPorEmpresa = document.getElementById('buscarPorEmpresa');
  var buscarPorFechaInicio = document.getElementById('buscarPorFechaInicio');

  var buscarDNI = document.getElementById('buscarDNI');
  var buscarNombre = document.getElementById('buscarNombre');
  var buscarApellidos = document.getElementById('buscarApellidos');
  var buscarEmpresa = document.getElementById('buscarEmpresa');
  var buscarFechaInicio = document.getElementById('buscarFechaInicio');

if(buscarPorNombreApellidos.checked){
  buscarDNI.className = "inputApagadoBuscador";buscarDNI.disabled = true;
  buscarNombre.className = "inputEncendidoBuscador";buscarNombre.disabled = false;
  buscarApellidos.className = "inputEncendidoBuscador";buscarApellidos.disabled = false;
  buscarEmpresa.className = "inputApagadoBuscador";buscarEmpresa.disabled = true;
  buscarFechaInicio.className = "inputApagadoBuscador";buscarFechaInicio.disabled = true;
  buscarPorDNI.checked = false;
  buscarPorNombreApellidos.checked = true;
  buscarPorEmpresa.checked = false;
  buscarPorFechaInicio.checked = false;
  buscarNombre.focus();
  buscarDNI.value = "";
  buscarEmpresa.value = "";
  buscarFechaInicio.value = "";
}else{
  buscarDNI.className = "inputApagadoBuscador";buscarDNI.disabled = true;
  buscarNombre.className = "inputApagadoBuscador";buscarNombre.disabled = true;
  buscarApellidos.className = "inputApagadoBuscador";buscarApellidos.disabled = true;
  buscarEmpresa.className = "inputApagadoBuscador";buscarEmpresa.disabled = true;
  buscarFechaInicio.className = "inputApagadoBuscador";buscarFechaInicio.disabled = true;
  }
} // Fin funcion encenderDos
function encenderDatoTres(){

  var buscarPorDNI = document.getElementById('buscarPorDNI');
  var buscarPorNombreApellidos = document.getElementById('buscarPorNombreApellidos');
  var buscarPorEmpresa = document.getElementById('buscarPorEmpresa');
  var buscarPorFechaInicio = document.getElementById('buscarPorFechaInicio');

  var buscarDNI = document.getElementById('buscarDNI');
  var buscarNombre = document.getElementById('buscarNombre');
  var buscarApellidos = document.getElementById('buscarApellidos');
  var buscarEmpresa = document.getElementById('buscarEmpresa');
  var buscarFechaInicio = document.getElementById('buscarFechaInicio');

if(buscarPorEmpresa.checked){
  buscarDNI.className = "inputApagadoBuscador";buscarDNI.disabled = true;
  buscarNombre.className = "inputApagadoBuscador";buscarNombre.disabled = true;
  buscarApellidos.className = "inputApagadoBuscador";buscarApellidos.disabled = true;
  buscarEmpresa.className = "inputEncendidoBuscador";buscarEmpresa.disabled = false;
  buscarFechaInicio.className = "inputApagadoBuscador";buscarFechaInicio.disabled = true;
  buscarPorDNI.checked = false;
  buscarPorNombreApellidos.checked = false;
  buscarPorEmpresa.checked = true;
  buscarPorFechaInicio.checked = false;
  buscarEmpresa.focus();
  buscarDNI.value = "";
  buscarNombre.value = "";
  buscarApellidos.value = "";
  buscarFechaInicio.value = "";
}else{
  buscarDNI.className = "inputApagadoBuscador";buscarDNI.disabled = true;
  buscarNombre.className = "inputApagadoBuscador";buscarNombre.disabled = true;
  buscarApellidos.className = "inputApagadoBuscador";buscarApellidos.disabled = true;
  buscarEmpresa.className = "inputApagadoBuscador";buscarEmpresa.disabled = true;
  buscarFechaInicio.className = "inputApagadoBuscador";buscarFechaInicio.disabled = true;
  }
} // Fin funcion encenderTres
function encenderDatoCuatro(){
  var buscarPorDNI = document.getElementById('buscarPorDNI');
  var buscarPorNombreApellidos = document.getElementById('buscarPorNombreApellidos');
  var buscarPorEmpresa = document.getElementById('buscarPorEmpresa');
  var buscarPorFechaInicio = document.getElementById('buscarPorFechaInicio');

  var buscarDNI = document.getElementById('buscarDNI');
  var buscarNombre = document.getElementById('buscarNombre');
  var buscarApellidos = document.getElementById('buscarApellidos');
  var buscarEmpresa = document.getElementById('buscarEmpresa');
  var buscarFechaInicio = document.getElementById('buscarFechaInicio');

if(buscarPorFechaInicio.checked){
  buscarDNI.className = "inputApagadoBuscador";buscarDNI.disabled = true;
  buscarNombre.className = "inputApagadoBuscador";buscarNombre.disabled = true;
  buscarApellidos.className = "inputApagadoBuscador";buscarApellidos.disabled = true;
  buscarEmpresa.className = "inputApagadoBuscador";buscarEmpresa.disabled = true;
  buscarFechaInicio.className = "inputEncendidoBuscador";buscarFechaInicio.disabled = false;
  buscarPorDNI.checked = false;
  buscarPorNombreApellidos.checked = false;
  buscarPorEmpresa.checked = false;
  buscarPorFechaInicio.checked = true;
  buscarPorFechaInicio.focus();
  buscarDNI.value = "";
  buscarNombre.value = "";
  buscarApellidos.value = "";
  buscarEmpresa.value = "";
}else{
  buscarDNI.className = "inputApagadoBuscador";buscarDNI.disabled = true;
  buscarNombre.className = "inputApagadoBuscador";buscarNombre.disabled = true;
  buscarApellidos.className = "inputApagadoBusacdor";buscarApellidos.disabled = true;
  buscarEmpresa.className = "inputApagadoBuscador";buscarEmpresa.disabled = true;
  buscarFechaInicio.className = "inputApagadoBuscador";buscarFechaInicio.disabled = true;
  }
} // Fin funcion encenderCuatro
// FUNCIONE PARA VALIDAR INPUT DEL BUSCADOR  -------------------------------------------------------------------------------------------------
function validarBuscador(){
  var buscarPorDNI = document.getElementById('buscarPorDNI');
  var buscarPorNombreApellidos = document.getElementById('buscarPorNombreApellidos');
  var buscarPorEmpresa = document.getElementById('buscarPorEmpresa');
  var buscarPorFechaInicio = document.getElementById('buscarPorFechaInicio');

  var buscarDNI = document.getElementById('buscarDNI');
  var buscarNombre = document.getElementById('buscarNombre');
  var buscarApellidos = document.getElementById('buscarApellidos');
  var buscarEmpresa = document.getElementById('buscarEmpresa');
  var buscarFechaInicio = document.getElementById('buscarFechaInicio');

  if(!buscarPorDNI.checked && !buscarPorNombreApellidos.checked && !buscarPorEmpresa.checked && !buscarPorFechaInicio.checked){
    mostrarAvisoSolicitudes();
    tituloAviso = 'AVISO IMPORTANTE';
    mensajeAviso = 'DEBE DEBE SELECCIONAR UN MODO DE BUSQUEDA';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    
  buscarDNI.className = "inputApagadoBuscador";buscarDNI.disabled = true;
  buscarNombre.className = "inputApagadoBuscador";buscarNombre.disabled = true;
  buscarApellidos.className = "inputApagadoBuscador";buscarApellidos.disabled = true;
  buscarEmpresa.className = "inputApagadoBuscador";buscarEmpresa.disabled = true;
  buscarFechaInicio.className = "inputApagadoBuscador";buscarFechaInicio.disabled = true;
    return false;};

  if(buscarPorDNI.checked && buscarDNI.value.length == 0){
    mostrarAvisoSolicitudes();
    buscarDNI.focus();
    tituloAviso = 'INFORMACION INCOMPLETA';
    mensajeAviso = 'DEBE INDICAR UN DNI/PASAPORTE CORRECTO';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  if(buscarPorNombreApellidos.checked && buscarNombre.value.length == 0){
    mostrarAvisoSolicitudes();
    buscarNombre.focus();
    tituloAviso = 'INFORMACION INCOMPLETA';
    mensajeAviso = 'DEBE INDICAR EL NOMBRE';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  if(buscarPorNombreApellidos.checked && buscarApellidos.value.length == 0){
    mostrarAvisoSolicitudes();
    buscarApellidos.focus();
    tituloAviso = 'INFORMACION INCOMPLETA';
    mensajeAviso = 'DEBE INDICAR LOS APELLIDOS';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  if(buscarPorEmpresa.checked && buscarEmpresa.value.length == 0){
    mostrarAvisoSolicitudes();
    buscarEmpresa.focus();
    tituloAviso = 'INFORMACION INCOMPLETA';
    mensajeAviso = 'DEBE INDICAR LA EMPRESA';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  if(buscarPorFechaInicio.checked && buscarFechaInicio.value.length == 0){
    mostrarAvisoSolicitudes();
    buscarFechaInicio.focus();
    tituloAviso = 'INFORMACION INCOMPLETA';
    mensajeAviso = 'DEBE INDICAR LA FECHA DE INICIO DE LA VISITA';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};

  document.buscarPor.submit();
  return true;
}
function mostrarAvisoSolicitudes2() {
  div = document.getElementById('avisoSolicitudes2');
  div.style.display = 'flex';
  //if(usuario.value.length == 0 || contrasena.value.length === 0){tituloAviso = 'INFORMACION INCOMPLETA';};
  //if(usuario.value.length == 0){mensajeAviso = 'DEBE INDICAR UN USUARIO VALIDO';}else{mensajeAviso = 'DEBE INDICAR UNA CONTRASEÑA VALIDA';};
  document.getElementById('tituloAviso2').innerHTML = tituloAviso2;
  document.getElementById('mensajeAviso2').innerHTML = mensajeAviso2;
}
function cerrarAvisoSolicitudes2() {
div = document.getElementById('avisoSolicitudes2');
div.style.display = 'none';
  //if(usuario.value.length === 0 & contrasena.value.length === 0){usuario.focus();}
  //if(usuario.value.length === 0){usuario.focus();}
  //else{contrasena.focus();}
  return false;
}
//  FUNCION PARA HABILITAR Y DESTACAR LOS INPUTS A ACTUALIZAR EN EDICION DE ACCESOS  ---------------------------------------------------------
function habilitarInputs(id_boton){
// ESTE PRIMER CODIGO ES PARA APAGAR Y EVITAR EDICION DE LOS INPUTS NO SELECCIONADOS
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


  if(datoUno.className == 'datoApagado'){datoUno.className = 'datoEncendido';inputUno.disabled = false;}
    else{datoUno.className = 'datoApagado';inputUno.disabled = true;}
  if(datoDos.className == 'datoApagado'){datoDos.className = 'datoEncendido';inputDos.disabled = false;}
    else{datoDos.className = 'datoApagado';inputDos.disabled = true}
  if(datoTres.className == 'datoApagado'){datoTres.className = 'datoEncendido';inputTres.disabled = false;}
    else{datoTres.className = 'datoApagado';inputTres.disabled = true}
  if(datoCuatro.className == 'datoApagado'){datoCuatro.className = 'datoEncendido';inputCuatro.disabled = false;}
    else{datoCuatro.className = 'datoApagado';inputCuatro.disabled = true}
  if(datoCinco.className == 'datoApagado'){datoCinco.className = 'datoEncendido';inputCinco.disabled = false;}
    else{datoCinco.className = 'datoApagado';inputCinco.disabled = true}
  if(datoSeis.className == 'datoApagado'){datoSeis.className = 'datoEncendido';inputSeis.disabled = false;}
    else{datoSeis.className = 'datoApagado';inputSeis.disabled = true}
  if(datoSiete.className == 'datoApagado'){datoSiete.className = 'datoEncendido';inputSiete.disabled = false;}
    else{datoSiete.className = 'datoApagado';inputSiete.disabled = true}
  if(datoOcho.className == 'datoApagado'){datoOcho.className = 'datoEncendido';inputOcho.disabled = false;}
    else{datoOcho.className = 'datoApagado';inputOcho.disabled = true}
  if(datoNueve.className == 'datoApagado'){datoNueve.className = 'datoEncendido';inputNueve.disabled = false;}
    else{datoNueve.className = 'datoApagado';inputNueve.disabled = true}
  if(datoDiez.className == 'datoApagado'){datoDiez.className = 'datoEncendido';inputDiez.disabled = false; habilitado = 1;}
    else{datoDiez.className = 'datoApagado';inputDiez.disabled = true; habilitado = 0;}

// CODIGO PARA VALIDACION DE SELECCION DE ACCESO
    document.getElementById('indicacion').innerHTML = ' ';

//  PARA LOS INPUT's "HIDDEN"
  if(inputOnce.className == 'actualizarInput'){inputOnce.disabled = false;}else{inputOnce.disabled = true}
  if(inputDoce.className == 'actualizarInput'){inputDoce.disabled = false;}else{inputDoce.disabled = true}
  if(inputTrece.className == 'actualizarInput'){inputTrece.disabled = false;}else{inputTrece.disabled = true}
  if(inputCatorce.className == 'actualizarInput'){inputCatorce.disabled = false;}else{inputCatorce.disabled = true}
  if(inputQuince.className == 'actualizarInput'){inputQuince.disabled = false;}else{inputQuince.disabled = true}
  
}
//  FUNCION PARA IMPEDIR QUE SE ENVIE EL FORMULARIO SIN HABER SELECCIONADO UN ACCESO  --------------------------------------------------------
function inputNoHabilitados(){
  var texto = document.getElementById('indicacion').textContent;
  if(texto ==='(*) SELECCIONE UN ACCESO'){
  mostrarAvisoSolicitudes2();
  tituloAviso2 = 'AVISO IMPORTANTE';
  mensajeAviso2 = 'DEBE SELECCIONAR UN ACCESO';
  document.getElementById('tituloAviso2').innerHTML = tituloAviso2;
  document.getElementById('mensajeAviso2').innerHTML = mensajeAviso2;
  return false;};
  document.actualizar.submit();
  return true;
}
