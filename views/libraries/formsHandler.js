"use strict";

function delJugadorIdForm(idJugador){
    let trNode = document.getElementById(idJugador);
    trNode.remove();
}

function updateInputId(idMax){
    let idInput = document.getElementById("id");

    idInput.setAttribute("value", idMax);
}