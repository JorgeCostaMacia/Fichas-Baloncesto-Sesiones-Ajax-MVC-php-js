<?php

include_once "model/classApp/Jugador.php";
include_once "model/classDB/DBusser.php";

function getMejores(){
    $jugadores = [];
    $jugadores["puntos"] = [];
    $jugadores["rebotes"] = [];
    $jugadores["asistencias"] = [];

    $_connection = new DBusser("baloncesto");

    $jugadoresAux = $_connection->format_select($_connection->_select('*', 'jugadores', 'WHERE puntos > 12 OR rebotes > 6 OR asistencias > 5'));

    if(count($jugadoresAux) != 0){
        foreach($jugadoresAux as $jugador){
            if($jugador["puntos"] > 12) {
                $jugadores["puntos"][] = new Jugador($jugador["id"], $jugador["nombre"], $jugador["posicion"], $jugador["partidos"], $jugador["puntos"], $jugador["rebotes"], $jugador["asistencias"]);
            }
            if($jugador["rebotes"] > 6) {
                $jugadores["rebotes"][] = new Jugador($jugador["id"], $jugador["nombre"], $jugador["posicion"], $jugador["partidos"], $jugador["puntos"], $jugador["rebotes"], $jugador["asistencias"]);
            }
            if($jugador["asistencias"] > 5) {
                $jugadores["asistencias"][] = new Jugador($jugador["id"], $jugador["nombre"], $jugador["posicion"], $jugador["partidos"], $jugador["puntos"], $jugador["rebotes"], $jugador["asistencias"]);
            }
        }
    }

    return $jugadores;
}

function getMejoresPosicion(){
    $jugadores = [];
    $jugadores["base"] = [];
    $jugadores["escolta"] = [];
    $jugadores["pivot"] = [];

    $_connection = new DBusser("baloncesto");

    $jugadoresAux = $_connection->format_select($_connection->_select('*', 'jugadores', 'WHERE (posicion = "base" AND asistencias > 8) OR ((posicion = "escolta" OR posicion = "alero") AND puntos > 15) OR ((posicion = "ala pivot" OR posicion = "pivot") AND rebotes > 7)'));

    if(count($jugadoresAux) != 0){
        foreach($jugadoresAux as $jugador){
            if($jugador["posicion"] == "base" && $jugador["asistencias"] > 8) {
                $jugadores["base"][] = new Jugador($jugador["id"], $jugador["nombre"], $jugador["posicion"], $jugador["partidos"], $jugador["puntos"], $jugador["rebotes"], $jugador["asistencias"]);
            }
            if(($jugador["posicion"] == "escolta" ||  $jugador["posicion"] == "alero") && $jugador["puntos"] > 15) {
                $jugadores["escolta"][] = new Jugador($jugador["id"], $jugador["nombre"], $jugador["posicion"], $jugador["partidos"], $jugador["puntos"], $jugador["rebotes"], $jugador["asistencias"]);
            }
            if(($jugador["posicion"] == "ala pivot" ||  $jugador["posicion"] == "pivot") && $jugador["rebotes"] > 8) {
                $jugadores["pivot"][] = new Jugador($jugador["id"], $jugador["nombre"], $jugador["posicion"], $jugador["partidos"], $jugador["puntos"], $jugador["rebotes"], $jugador["asistencias"]);
            }
        }
    }

    return $jugadores;
}

function getJugadores($order) {
    $jugadores = [];

    $_connection = new DBusser("baloncesto");

    $jugadoresAux = $_connection->format_select($_connection->_select('id, nombre, posicion, partidos, puntos * partidos AS puntos, rebotes * partidos AS rebotes, asistencias * partidos AS asistencias', 'jugadores', 'ORDER BY ' . $order . ' DESC'));

    if(count($jugadoresAux) != 0) {
        foreach ($jugadoresAux as $jugador) {
            $jugadores[] = new Jugador($jugador["id"], $jugador["nombre"], $jugador["posicion"], $jugador["partidos"], $jugador["puntos"], $jugador["rebotes"], $jugador["asistencias"]);
        }
    }

    return $jugadores;
}

function getJugadoresId($file) {
    $jugadores = [];

    $_where = "WHERE id IS NULL";

    foreach($file as $key=>$value){
        $_where .= ' OR id = ' . $key;
    }

    $_connection = new DBusser("baloncesto");

    $jugadoresAux = $_connection->format_select($_connection->_select('id, nombre, posicion, partidos, puntos * partidos AS puntos, rebotes * partidos AS rebotes, asistencias * partidos AS asistencias', 'jugadores', $_where));

    if(count($jugadoresAux) != 0) {
        foreach ($jugadoresAux as $jugador) {
            $jugadores[] = new Jugador($jugador["id"], $jugador["nombre"], $jugador["posicion"], $jugador["partidos"], $jugador["puntos"], $jugador["rebotes"], $jugador["asistencias"]);
        }
    }

    return $jugadores;
}

function getJugador($idJugador) {
    $_connection = new DBusser("baloncesto");

    $jugadoresAux = $_connection->format_select($_connection->_select('id, nombre, posicion, partidos, puntos * partidos AS puntos, rebotes * partidos AS rebotes, asistencias * partidos AS asistencias', 'jugadores', 'WHERE id = ' .  $idJugador));

    if(count($jugadoresAux) != 0) {
        return new Jugador($jugadoresAux[0]["id"], $jugadoresAux[0]["nombre"], $jugadoresAux[0]["posicion"], $jugadoresAux[0]["partidos"], $jugadoresAux[0]["puntos"], $jugadoresAux[0]["rebotes"], $jugadoresAux[0]["asistencias"]);
    }
}

function getEstadisticas($order) {
    $jugadores = [];

    $_connection = new DBusser("baloncesto");

    $jugadoresAux = $_connection->format_select($_connection->_select('*', 'jugadores', 'ORDER BY ' . $order . ' DESC'));

    if(count($jugadoresAux) != 0) {
        foreach ($jugadoresAux as $jugador) {
            $jugadores[] = new Jugador($jugador["id"], $jugador["nombre"], $jugador["posicion"], $jugador["partidos"], $jugador["puntos"], $jugador["rebotes"], $jugador["asistencias"]);
        }
    }

    return $jugadores;
}

function getNextMaxId(){
    $_connection = new DBusser("baloncesto");
    $idAux = $_connection->format_select($_connection->_select('max(id) as id', 'jugadores'));
    return 1 + $idAux[0]["id"];
}

function moveFile($destino){
    if (move_uploaded_file($_FILES["actaFile"]["tmp_name"], $destino)) { return true; }
    else { return false; }
}

function existFichero($ruta) {
    if (!file_exists($ruta) || !is_file($ruta)) { $fichero = fopen($ruta, "a"); fclose($fichero); }
}

function existDirectorio($ruta) {
    if (!file_exists($ruta) || !is_dir($ruta)) { mkdir($ruta, 0777); }
}

function _readFile($ruta) {
    existDirectorio("controller/src/actas");
    existFichero($ruta);
    $fich = [];
    $fichero = fopen($ruta, "r");
    while (!feof($fichero)) { $fich[] = fgets($fichero); }
    fclose($fichero);
    return $fich;
}

function setUpdateStats($jugadores, $file, $path){
    $_connection = new DBusser("baloncesto");

    foreach($jugadores as $jugador){
        foreach($file as $id=>$stats){
            if($jugador->getId() == $id){
                $jugador->updateValores($file[$id]);
            }
        }
    }
    $_connection->_prepareUpdateStats($jugadores);
    unlink($path);
}