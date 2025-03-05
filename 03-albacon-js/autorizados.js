
function pegarExcel(){
  navigator.clipboard
  .readText()
  .then(
  (clipText) => (document.querySelector(".autorizados-clip-text").innerHTML = clipText), enviar.focus());
  document.querySelector("#texto").style.borderColor = 'rgba(240, 240, 240, 1)';// #CCCCCC';
  document.querySelector("#pegar").style.display = 'none';
  document.querySelector("#pegadoOK").style.display = 'inline-block';
  /*
  document.querySelector("#pegadoOK").style.visibility = 'visible';
  document.querySelector("#enviar").style.visibility = 'visible';
  document.querySelector("#cambiar").style.visibility = 'visible';
  */
}// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// --------------------------- FUNCIONES PARA MOSTRAR Y CERRAR VENTANAS DE ERRORES O AVISOS EN AUTORIZADOS  ----------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
/*  FUNCION PARA MOSTRAR LOS DISTINTOS AVISOS DEL ARCHIVO AUTORIZADOS.PHP --------------------------------------------------------------- */
function mostrarAvisoAutorizados() {
  div = document.getElementById('avisoAutorizados');
  div.style.display = 'block';
  document.getElementById('tituloAviso').innerHTML = tituloAviso;
  document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
}
function cerrarAvisoAutorizados() {
div = document.getElementById('avisoAutorizados');
div.style.display = 'none';
  if(gestor.value.length === 0 & contrasena.value.length === 0){gestor.focus();}
  if(gestor.value.length === 0){gestor.focus();}
  else{contrasena.focus();}
  return false;
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// -----------------------------------  FUNCION MOSTRAR ERROR POR CAMPOS DE GESTOR O CONTRASEÑA VACIOS  -------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function validarGestor(){
  var gestor = document.getElementById('gestor');
  var contrasena = document.getElementById('contrasena');
  if(gestor.value.length === 0 || contrasena.value.length === 0){tituloAviso = 'INFORMACION INCOMPLETA';};
  if(gestor.value.length === 0){mensajeAviso = 'DEBE INDICAR UN GESTOR VALIDO';}else{mensajeAviso = 'DEBE INDICAR UNA CONTRASEÑA VALIDA';}
  if(gestor.value.length === 0){mostrarAvisoAutorizados();gestor.focus();return false;};
  if(contrasena.value.length === 0){mostrarAvisoAutorizados();contrasena.focus();return false;};
  document.loginGestor.submit();
  return true;
}
function cerrarAvisoValidacion() {
div = document.getElementById('avisoErrorValidacion');
div.style.display = 'none';
  if(gestor.value.length === 0 & contrasena.value.length === 0){gestor.focus();}
  if(gestor.value.length === 0){gestor.focus();}
  else{contrasena.focus();}
  return false;
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// -----------------------------  FUNCION MOSTRAR ERROR POR CAMPOS DE USUARIO O NOMINA VACIOS OLVIDO CONTRASEÑA  -----------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function validarDatosGestor(){
  var nickGestor = document.getElementById('nickGestor');
  var numeroNominaGestor = document.getElementById('numeroNominaGestor');
  if(nickGestor.value.length == 0 || numeroNominaGestor.value.length == 0){
    mostrarAvisoAutorizados();nickGestor.focus();
    
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
function validarClavesGestor(){
  var claveUno = document.getElementById('claveNueva');
  var claveDos = document.getElementById('claveNuevaRepetida');
  if(claveUno.value.length == 0 || claveDos.value.length == 0){
    mostrarAvisoAutorizados();
    claveNueva.focus();
    tituloAviso = 'INFORMACION INCOMPLETA';
    mensajeAviso = 'DEBE INDICAR TODOS LOS DATOS';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  if(claveUno.value != claveDos.value){
    mostrarAvisoAutorizados();
    claveNueva.focus();
    tituloAviso = 'AVISO IMPORTANTE';
    mensajeAviso = 'LAS CONTRASEÑAS NO COINCIDEN';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  if(claveUno.value.length < 8){
    mostrarAvisoAutorizados();
    claveNueva.focus();
    tituloAviso = 'AVISO IMPORTANTE';
    mensajeAviso = 'LA CONTRASEÑA DEBE TENER AL MENOS 8 CARACTERES ALFANUMERICOS';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  if(claveUno.value.length > 14){
    mostrarAvisoAutorizados();
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
// -----------------  FUNCIONES PARA MOSTRAR Y CERRAR VENTANAS DE ERRORES O AVISOS EN AUTORIZADOS ---------- DATOS PREVIOS -------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
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
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// --------  FUNCIONES PARA VALIDAR ELEMENTOS VACIOS DE PANTALLAS: ENTRADA MANUAL, MOSTRAR ACCESOS, EDITAR ACCESOS Y BORRAR ACCESOS  ---------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// 1) VALIDACION DE ENTRADA MANUAL DE AUTORIZADOS
function avisoManualAutorizadoVacio() {
  div = document.getElementById('avisoManualAutorizadoVacio');
  div.style.display = 'block';
}
function cerrarAvisoManualAutorizadoVacio() {
  div = document.getElementById('avisoManualAutorizadoVacio');
  div.style.display = 'none';
  return true;
}
function noEnviarManualAutorizadoVacio(){
  var bool = $('.manualInputDatoAutorizado').toArray().some(function(el) {return $(el).val().length == 0});
  if (bool) {avisoManualAutorizadoVacio();return false;};
  document.manualText.submit();
  return true;
}
/* PARA EDITAR AUTORIZADOS EN PRINCIPIO HARA SOLO FALTA EN EL CASO DE ENTRADA EXCEL =========================================================== */
// 2) VALIDACION DE EDICION DE ACCESOS
function avisoEditarVacio() {
  div = document.getElementById('avisoEditarVacio');
  div.style.display = 'block';
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
// --------------------------------------------  FUNCIONES PARA EL BUSCADOR DE "AUTORIZADOS.PHP" ---------------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// FUNCIONES PARA ENCENDER INPUT'S EN EL BUSCADOR  -------------------------------------------------------------------------------------------
function encenderDatoUno(){
  var buscarPorNomina = document.getElementById('buscarPorNomina');
  var buscarPorNombreApellidosAutorizado = document.getElementById('buscarPorNombreApellidosAutorizado');
  //var buscarPorEmpresa = document.getElementById('buscarPorEmpresaAutorizados');

  var buscarNomina = document.getElementById('buscarNomina');
  var buscarNombreAutorizado = document.getElementById('buscarNombreAutorizado');
  var buscarApellidosAutorizado = document.getElementById('buscarApellidosAutorizado');
  //var buscarEmpresa = document.getElementById('buscarEmpresa');

if(buscarPorNomina.checked){
  buscarNomina.className = "inputEncendidoBuscador";buscarNomina.disabled = false;
  buscarNombreAutorizado.className = "inputApagadoBuscador";buscarNombreAutorizado.disabled = true;
  buscarApellidosAutorizado.className = "inputApagadoBuscador";buscarApellidosAutorizado.disabled = true;
  //buscarEmpresaAutorizado.className = "inputApagadoBuscador";buscarEmpresaAutorizado.disabled = true;

  buscarPorNomina.checked = true;
  buscarPorNombreApellidosAutorizado.checked = false;
  //buscarPorEmpresaAutorizado.checked = false;

  buscarNomina.focus();
  buscarNombreAutorizado.value = "";
  buscarApellidosAutorizado.value = "";
  //buscarEmpresaAutorizado.value = "";
}
else{
  buscarNomina.className = "inputApagadoBuscador";buscarNomina.disabled = true;
  buscarNombreAutorizado.className = "inputApagadoBuscador";buscarNombreAutorizado.disabled = true;
  buscarApellidosAutorizado.className = "inputApagadoBuscador";buscarApellidosAutorizado.disabled = true;
  //buscarEmpresaAutorizado.className = "inputApagadoBuscador";buscarEmpresaAutorizado.disabled = true;
  }
} // Fin funcion encenderUno

function encenderDatoDos(){
  var buscarPorNomina = document.getElementById('buscarPorNomina');
  var buscarPorNombreApellidosAutorizado = document.getElementById('buscarPorNombreApellidosAutorizado');
  //var buscarPorEmpresaAutorizado = document.getElementById('buscarPorEmpresaAutorizado');

  var buscarNomina = document.getElementById('buscarNomina');
  var buscarNombreAutorizado = document.getElementById('buscarNombreAutorizado');
  var buscarApellidosAutorizado = document.getElementById('buscarApellidosAutorizado');
  //var buscarEmpresa = document.getElementById('buscarEmpresaAutorizado');

if(buscarPorNombreApellidosAutorizado.checked){
  buscarNomina.className = "inputApagadoBuscador";buscarNomina.disabled = true;
  buscarNombreAutorizado.className = "inputEncendidoBuscador";buscarNombreAutorizado.disabled = false;
  buscarApellidosAutorizado.className = "inputEncendidoBuscador";buscarApellidosAutorizado.disabled = false;
  //buscarEmpresaAutorizado.className = "inputApagadoBuscador";buscarEmpresaAutorizado.disabled = true;

  buscarPorNomina.checked = false;
  buscarPorNombreApellidosAutorizado.checked = true;
  //buscarPorEmpresaAutorizado.checked = false;
  buscarNombreAutorizado.focus();
  buscarNomina.value = "";
  //buscarEmpresaAutorizado.value = "";
}else{
  buscarNomina.className = "inputApagadoBuscador";buscarNomina.disabled = true;
  buscarNombreAutorizado.className = "inputApagadoBuscador";buscarNombreAutorizado.disabled = true;
  buscarApellidosAutorizado.className = "inputApagadoBuscador";buscarApellidosAutorizado.disabled = true;
  //buscarEmpresaAutorizado.className = "inputApagadoBuscador";buscarEmpresaAutorizado.disabled = true;
  }
} // Fin funcion encenderDos
/*
function encenderDatoTres(){

  var buscarPorNomina = document.getElementById('buscarPorNomina');
  var buscarPorNombreApellidosAutorizado = document.getElementById('buscarPorNombreApellidosAutorizado');
  //var buscarPorEmpresaAutorizado = document.getElementById('buscarPorEmpresaAutorizado');

  var buscarNomina = document.getElementById('buscarNomina');
  var buscarNombreAutorizado = document.getElementById('buscarNombreAutorizado');
  var buscarApellidosAutorizado = document.getElementById('buscarApellidosAutorizado');
  //var buscarEmpresaAutorizado = document.getElementById('buscarEmpresaAutorizado');

if(buscarPorEmpresaAutorizado.checked){
  buscarNomina.className = "inputApagadoBuscador";buscarNomina.disabled = true;
  buscarNombreAutorizado.className = "inputApagadoBuscador";buscarNombreAutorizado.disabled = true;
  buscarApellidosAutorizado.className = "inputApagadoBuscador";buscarApellidosAutorizado.disabled = true;
  buscarPorEmpresaAutorizado.className = "inputEncendidoBuscador";buscarPorEmpresaAutorizado.disabled = false;
  buscarPorNomina.checked = false;
  buscarPorNombreApellidosAutorizado.checked = false;
  buscarPorEmpresaAutorizado.checked = true;
  buscarPorEmpresaAutorizado.focus();
  buscarNomina.value = "";
  buscarNombreAutorizado.value = "";
  buscarApellidosAutorizado.value = "";
}else{
  buscarNomina.className = "inputApagadoBuscador";buscarDNI.disabled = true;
  buscarNombreAutorizado.className = "inputApagadoBuscador";buscarNombre.disabled = true;
  buscarApellidosAutorizado.className = "inputApagadoBuscador";buscarApellidos.disabled = true;
  buscarPorEmpresaAutorizado.className = "inputApagadoBuscador";buscarEmpresa.disabled = true;
  }
} // Fin funcion encenderTres
*/
// FUNCIONES PARA VALIDAR INPUT DEL BUSCADOR  -------------------------------------------------------------------------------------------------
function validarBuscadorAutorizado(){
  var buscarPorNomina = document.getElementById('buscarPorNomina');
  var buscarPorNombreApellidosAutorizado = document.getElementById('buscarPorNombreApellidosAutorizado');
  //var buscarPorEmpresaAutorizado = document.getElementById('buscarPorEmpresaAutorizado');

  var buscarNomina = document.getElementById('buscarNomina');
  var buscarNombreAutorizado = document.getElementById('buscarNombreAutorizado');
  var buscarApellidosAutorizado = document.getElementById('buscarApellidosAutorizado');
  //var buscarEmpresaAutorizado = document.getElementById('buscarEmpresaAutorizado');
  if(!buscarPorNomina.checked && !buscarPorNombreApellidosAutorizado.checked){
  //if(!buscarPorNomina.checked && !buscarPorNombreApellidosAutorizado.checked && !buscarPorEmpresaAutorizado.checked){
    mostrarAvisoAutorizados();
    tituloAviso = 'AVISO IMPORTANTE';
    mensajeAviso = 'DEBE DEBE SELECCIONAR UN MODO DE BUSQUEDA';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    
    buscarNomina.className = "inputApagadoBuscador";buscarNomina.disabled = true;
    buscarNombreAutorizado.className = "inputApagadoBuscador";buscarNombreAutorizado.disabled = true;
    buscarApellidosAutorizado.className = "inputApagadoBuscador";buscarApellidosAutorizado.disabled = true;
    //buscarEmpresaAutorizado.className = "inputApagadoBuscador";buscarEmpresaAutorizado.disabled = true;
    return false;};

  if(buscarPorNomina.checked && buscarNomina.value.length == 0){
    mostrarAvisoAutorizados();
    buscarNomina.focus();
    tituloAviso = 'INFORMACION INCOMPLETA';
    mensajeAviso = 'DEBE INDICAR UN Nº DE NOMINA/EMPLEADO CORRECTO';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  if(buscarPorNombreApellidosAutorizado.checked && buscarNombreAutorizado.value.length == 0){
    mostrarAvisoAutorizados();
    buscarNombreAutorizado.focus();
    tituloAviso = 'INFORMACION INCOMPLETA';
    mensajeAviso = 'DEBE INDICAR EL NOMBRE';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
  if(buscarPorNombreApellidosAutorizado.checked && buscarApellidosAutorizado.value.length == 0){
    mostrarAvisoAutorizados();
    buscarApellidosAutorizado.focus();
    tituloAviso = 'INFORMACION INCOMPLETA';
    mensajeAviso = 'DEBE INDICAR LOS APELLIDOS';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
    /*
  if(buscarPorEmpresaAutorizado.checked && buscarEmpresaAutorizado.value.length == 0){
    mostrarAvisoAutorizados();
    buscarEmpresaAutorizado.focus();
    tituloAviso = 'INFORMACION INCOMPLETA';
    mensajeAviso = 'DEBE INDICAR LA EMPRESA';
    document.getElementById('tituloAviso').innerHTML = tituloAviso;
    document.getElementById('mensajeAviso').innerHTML = mensajeAviso;
    return false;};
*/
    document.buscarAutorizadoPor.submit();
  return true;
}
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

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// -----------------------------------  FUNCION PARA PERMITIR SOLO NUMEROS Y LETRAS EN LAS CONTRASEÑAS  --------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function caracteresPermitidosManual(e){
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
// -----------------------  FUNCION PARA PERMITIR DETERMINADOS CARACTERES EN LOS INPUT'S TYPE TEXT (NUEVA POR LA IA) -------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

// Función para permitir solo caracteres específicos
function permitirCaracteresEspecificos(event) {
  // Verificar si el evento proviene de un input de tipo texto
  if (event.target.tagName === 'INPUT' && event.target.type === 'text') {
      // Obtener el valor de la tecla presionada
      const tecla = event.key;

      // Definir los caracteres permitidos (letras, números, guiones y guiones bajos)
      const caracteresPermitidos = /[a-zA-Z0-9-_]/;

      // Verificar si la tecla presionada está permitida
      if (!caracteresPermitidos.test(tecla)) {
          // Si no está permitida, prevenir la acción por defecto (es decir, no escribir el carácter)
          event.preventDefault();

          // Mostrar un mensaje de error
          mostrarError("Carácter no permitido. Solo se permiten letras, números, guiones (-) y guiones bajos (_).");
      }
  }
}

// Función para mostrar un mensaje de error
function mostrarError(mensaje) {
  // Buscar el elemento de error (si no existe, lo creamos)
  let errorElement = document.getElementById('error-mensaje');
  if (!errorElement) {
      errorElement = document.createElement('div');
      errorElement.id = 'error-mensaje';
      errorElement.style.color = 'red'; // Estilo para el mensaje de error
      errorElement.style.marginTop = '5px';
      document.body.appendChild(errorElement); // Añadir el mensaje de error al DOM
  }

  // Mostrar el mensaje de error
  errorElement.textContent = mensaje;

  // Ocultar el mensaje de error después de 3 segundos
  setTimeout(() => {
      errorElement.textContent = '';
  }, 3000);
}

// Asignar el evento al contenedor principal (por ejemplo, el body)
document.body.addEventListener('keypress', permitirCaracteresEspecificos);

