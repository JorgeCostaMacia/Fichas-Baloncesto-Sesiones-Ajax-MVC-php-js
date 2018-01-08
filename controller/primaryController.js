"use strict";

// ** BORRAR JUGADOR **
//      RECOGE ID DEL BOTON QUE ACCIONO EL EVENTO
//      LLAMA AJAX MODEL BORRAR JUGADOR
function delJugador(event){
    let id = event.target.value;
    let parametros = "action=delJugador" + "&id=" + id;

    ajaxQuery('model/ajaxModel/ajaxModel.php',parametros,'delJugadorId','POST',0);
}

// ** RETURN AJAX BORRAR JUGADOR **
//      RECOGE RESULTADO AJAX
//      QUITA FILA DE LA TABLA
function delJugadorId(resultado){
    let ressult = JSON.parse(resultado);

    delJugadorIdForm(ressult["id"]);
}

// ** MODIFICAR JUGADOR **
//      RECOGE VALORES INPUTS
//      LOS EVALUA
//      SI SON CORRECTOS LLAMA AJAX MODEL
//      SI SON INCORRECTOS LLAMA MENSAJES ERROR
function evalJugador(){
    let id = document.getElementById("id").value;
    let nombre = document.getElementById("nombre").value;
    let posicion = document.getElementById("posicion").value;
    let partidos = document.getElementById("partidos").value;
    let puntos = document.getElementById("puntos").value;
    let rebotes = document.getElementById("rebotes").value;
    let asistencias = document.getElementById("asistencias").value;

    let errores = validateInputsJugador(nombre, partidos, puntos, rebotes, asistencias);

    if(errores.length == 0){
        let parametros = "action=updateJugador" + "&id=" + id + "&nombre=" + nombre + "&posicion=" + posicion +
            "&partidos=" + partidos + "&puntos=" + puntos + "&rebotes=" + rebotes + "&asistencias=" + asistencias;

        ajaxQuery('model/ajaxModel/ajaxModel.php',parametros,'updateJugador','POST',0);
    }
    else { msjModificarAltaError(errores); }
}

// ** RETURN AJAX MODIFICAR JUGADOR **
//      RECOGE RESULTADO AJAX
//      SI HA SIDO CORRECTO MUESTRA MENSAJE ADVERTENCIA
function updateJugador(ressult){
    let ressultado = JSON.parse(ressult);

    if(ressultado["ressult"] > 0 ){ msjModificadoAltaJugador(ressultado["id"], "Modificado correctamente"); }
}

// ** ALTA JUGADOR **
//      RECOGE VALORES INPUTS
//      LOS EVALUA
//      SI SON CORRECTOS LLAMA AJAX MODEL
//      SI SON INCORRECTOS LLAMA MENSAJES ERROR
function evalAlta(){
    let id = document.getElementById("id").value;
    let nombre = document.getElementById("nombre").value;
    let posicion = document.getElementById("posicion").value;

    let errores = validateInputsAlta(nombre);

    if(errores.length == 0){
        let parametros = "action=altaJugador" + "&id=" + id + "&nombre=" + nombre + "&posicion=" + posicion;

        ajaxQuery('model/ajaxModel/ajaxModel.php',parametros,'altaJugador','POST',0);
    }
    else { msjModificarAltaError(errores); }
}

// ** RETURN AJAX MODIFICAR JUGADOR **
//      RECOGE RESULTADO AJAX
//      SI HA SIDO CORRECTO MUESTRA MENSAJE ADVERTENCIA Y LLAMA ACTUALIZAR CAMPO ID DE FORM
function altaJugador(ressult){
    let ressultado = JSON.parse(ressult);

    if(ressultado["ressult"] > 0 ){
        msjModificadoAltaJugador(ressultado["id"], "Alta correctamente");

        let parametros = "action=getIdMax";

        ajaxQuery('model/ajaxModel/ajaxModel.php',parametros,'altaUpdateId','POST',0);
    }
}

// ** RETURN AJAX MODIFICAR JUGADOR **
//      RECOGE RESULTADO AJAX
//      ACTUALIZA CAMPO ID DE FORM
function altaUpdateId(ressult){
    let ressultado = JSON.parse(ressult);

    updateInputId(ressultado["ressult"]);
}