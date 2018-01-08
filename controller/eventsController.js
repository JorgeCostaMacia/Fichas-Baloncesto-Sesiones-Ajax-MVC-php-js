"use strict";

// ** EVENTOS PAGINA **
//      PAGINA CARGADA: CARGA EVENTOS
document.onload = addEvents();

// ** EVENTOS PAGINA **
function addEvents(){
    let formLoginGetAccount = document.getElementById("formLoginGetAccount");
    if(formLoginGetAccount != null ){ addEventsFormLoginGetAccount(); }

    let formJugadores = document.getElementById("formJugadores");
    if(formJugadores != null ){ addEventsFormJugadores(formJugadores); }

    let formEstadisticas = document.getElementById("formEstadisticas");
    if(formEstadisticas != null ){ addEventsFormEstadisticas(formEstadisticas); }

    let borrarJugador = document.getElementsByName("borrarJugador");
    if(borrarJugador != null){ addEventsBorrarJugador(borrarJugador); }

    let modificarJugador = document.getElementById("modificarFichar");
    if(modificarJugador != null){ addEventsModificarJugador(modificarJugador); }

    let registrarFichar = document.getElementById("registrarFichar");
    if(registrarFichar != null){ addEventsRegistrarFichar(registrarFichar); }
}

// ** EVENTOS LOGIN **
//      EVALUA FORM LOGIN GETACOUNT
function addEventsFormLoginGetAccount(){
    let submitLogin = document.getElementById("submitLogin");
    let submitGetAccount = document.getElementById("submitGetAccount");
    submitLogin.addEventListener("click", evalformLogin);
    submitGetAccount.addEventListener("click", evalformGetAccount);
}

// ** EVENTOS JUGADORES **
//      SI CAMBIA ORDEN
function addEventsFormJugadores(formJugadores){
    formJugadores.addEventListener("change", formJugadores.submit);
}

// ** EVENTOS ESTADISTICAS **
//      SI CAMBIA ORDEN
function addEventsFormEstadisticas(formEstadisticas){
    formEstadisticas.addEventListener("change", formEstadisticas.submit);
}

// ** EVENTOS JUGADORES **
//      SI HACES CLICK EN ALGUN BOTON BORRAR
function addEventsBorrarJugador(borrarJugador) {
    for(let i = 0; i < borrarJugador.length; i++) {
        borrarJugador[i].addEventListener("click", delJugador);
    }
}

// ** EVENTOS JUGADORES **
//      SI HACES CLICK EN ALGUN BOTON MODIFICAR
function addEventsModificarJugador(modificarJugador){
    modificarJugador.addEventListener("click", evalJugador);
}

// ** EVENTOS FICHA **
//      SI HACES CLICK EN REGISTRAR
function addEventsRegistrarFichar(registrarFichar){
    registrarFichar.addEventListener("click", evalAlta);
}