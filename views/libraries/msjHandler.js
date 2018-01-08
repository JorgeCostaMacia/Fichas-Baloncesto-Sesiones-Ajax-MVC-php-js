"use strict";

/********** CAMBIA COLORES ICONOS LOGIN ******************/
function badMailLogin(){ document.getElementById("resultEmailLogin").style.color="#f00"; }
function badPassLogin(){ document.getElementById("resultPassLogin").style.color="#f00"; }
function okMailLogin(){ document.getElementById("resultEmailLogin").style.color="#555"; }
function okPassLogin(){ document.getElementById("resultPassLogin").style.color="#555"; }

/********** MENSAJE LOGIN NO EXIST USUARIO ******************/
function msjNoExistUsser(){
    let mensajes = document.getElementById("mensajes");

    if(mensajes.innerHTML == ""){
        let mssjNode = document.createElement('div');
        mssjNode.setAttribute('class', 'alert alert-danger');
        mssjNode.setAttribute('id', 'alert alert-danger');
        let strongNode = document.createElement('strong');
        let strongText = document.createTextNode("No existe el usuario o la contraseña es erronea");
        strongNode.appendChild(strongText);

        mssjNode.appendChild(strongNode);
        mensajes.appendChild(mssjNode);
    }
}

/********** MENSAJE LOGIN EXIST USUARIO ******************/
function msjExistUsser(){
    let mensajes = document.getElementById("mensajes");
    if(mensajes.innerHTML == ""){
        let mssjNode = document.createElement('div');
        mssjNode.setAttribute('class', 'alert alert-danger');
        mssjNode.setAttribute('id', 'alert alert-danger');
        let strongNode = document.createElement('strong');
        let strongText = document.createTextNode("No puede registrarse, existe el usuario");
        strongNode.appendChild(strongText);

        mssjNode.appendChild(strongNode);
        mensajes.appendChild(mssjNode);
    }
}

function msjModificarAltaError(errores){
    let mensajesModificarJugador = document.getElementById("mensajes");
    mensajesModificarJugador.innerHTML = "";
    let mssjNode = document.createElement('div');
    mssjNode.setAttribute('class', 'alert alert-danger');
    mssjNode.setAttribute('id', 'alert alert-danger');

    for(let i = 0; i < errores.length; i++){
        let error = errores[i].split("</strong>");
        let strongNode = document.createElement('strong');
        let strongText = document.createTextNode(error[0]);
        strongNode.appendChild(strongText);
        mssjNode.appendChild(strongNode);
        let brNode = document.createElement('br');
        mssjNode.appendChild(brNode);
        let msjText = document.createTextNode(error[1]);
        mssjNode.appendChild(msjText);
        brNode = document.createElement('br');
        mssjNode.appendChild(brNode);
    }

    mensajesModificarJugador.appendChild(mssjNode);
}

function msjModificadoAltaJugador(id, mensaje){
    let mensajesModificarJugador = document.getElementById("mensajes");
    mensajesModificarJugador.innerHTML = "";

    let mssjNode = document.createElement('div');
    mssjNode.setAttribute('class', 'alert alert-success');
    mssjNode.setAttribute('id', 'alert alert-success');
    let strongNode = document.createElement('strong');
    let strongText = document.createTextNode(mensaje);
    strongNode.appendChild(strongText);
    mssjNode.appendChild(strongNode);
    let msjText = document.createTextNode(' Jugador id: ' + id);
    mssjNode.appendChild(msjText);
    mensajesModificarJugador.appendChild(mssjNode);
}