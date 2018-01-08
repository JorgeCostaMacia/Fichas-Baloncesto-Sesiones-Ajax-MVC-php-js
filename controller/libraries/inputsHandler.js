"use strict";

// ** EVALUA FORM LOGIN NOMUSSER **
//      RECOGE VALORES: NOMUSSER
//      EVALUA SEA EMAIL - RETURN EVAL
function validateMailLogin(loginEmailObject) {
	let loginEmail = loginEmailObject.value;
	let resultLoginEmail = false;

	let aux = loginEmail.split("@");
	if(aux.length == 2){ 
		if(esTexto(aux[0])){ 
			let aux2 = aux[1].split(".");
			if(aux2.length == 2){ 
				if(esTexto(aux2[0]) && esTexto(aux2[1])){
					resultLoginEmail = true;
				}
			}
		}
	}
	return resultLoginEmail;
}

// ** EVALUA FORM LOGIN PASS **
//      RECOGE VALORES: PASS
//      EVALUA SEA PASS - RETURN EVAL
function validatePassLogin(loginPasswordObject) {
	let loginPassword = loginPasswordObject.value;
	if(esTexto(loginPassword) && loginPassword.length >= 8 ) { return true; }
	else { return false; }	
}

// ** EVALUA FORM MODIFICAR JUGADOR **
//      EVALUA QUE SEAN CAMPOS VALIDOS Y QUE NO ESTEN VACIOS
function validateInputsJugador(nombre, partidos, puntos, rebotes, asistencias){
	let errores = [];

	if(!esTexto(nombre)) { errores.push('No es un nombre valido</strong>Solo admite letras y no puede ser vacio')}
    if(!esNumeroNatural(partidos)) { errores.push('No es una cantidad de partidos valida</strong>Solo admite numeros enteros positivos y no puede ser vacio')}
    if(!esNumeroNatural(puntos)) { errores.push('No es una cantidad de puntos valida</strong>Solo admite numeros enteros positivos y no puede ser vacio')}
    if(!esNumeroNatural(rebotes)) { errores.push('No es una cantidad de rebotes valida</strong>Solo admite numeros enteros positivos y no puede ser vacio')}
    if(!esNumeroNatural(asistencias)) { errores.push('No es una cantidad de asistencias valida</strong>Solo admite numeros enteros positivos y no puede ser vacio')}

    return errores;
}

// ** EVALUA FICHA NUEVA **
//      EVALUA CAMPO NOMBRE
function validateInputsAlta(nombre){
    let errores = [];

    if(!esTexto(nombre)) { errores.push('No es un nombre valido</strong>Solo admite letras y no puede ser vacio')}

    return errores;
}

// ** EVALUA ES NUMERO **
function esNumero(dato){
    if(dato != "" && dato != null){
        if(parseInt(dato)){ return true; }
        else { return false; }
    } else { return false; }
}

// ** EVALUA ES NUMERO NATURAL **
function esNumeroNatural(dato){
    if(esNumero(dato)){
        if(parseInt(dato) % 1 == 0 && parseInt(dato) >= 0){
            return true;
        } else { return false; }
    } else { return false; }
}

// ** EVALUA FORM LOGIN NOMUSSER PASS **
//      RECOGE VALORES: PASS
//      EVALUA SEA TEXTO - RETURN EVAL
function esTexto(dato){
    let controlLetra = true;
    if(dato != "" && dato != null){
        for(let i = 0; i < dato.length; i++){
            if(!esLetra(dato[i])){ controlLetra = false; i = dato.length; }
        }
    } else { controlLetra = false; }
    return controlLetra;
}

// ** EVALUA FORM LOGIN NOMUSSER PASS **
//      RECOGE VALORES: PASS
//      EVALUA SEA TEXTO - RETURN EVAL
function esLetra(dato){
    if((dato.charCodeAt() > 64  && dato.charCodeAt() < 91) || dato.charCodeAt() == 165 || dato.charCodeAt() == 164 ||
        (dato.charCodeAt() > 96  && dato.charCodeAt() < 123)){ return true; }
    else { return false;}
}