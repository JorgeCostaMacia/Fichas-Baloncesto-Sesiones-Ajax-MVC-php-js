<?php

include_once "../classDB/DBusser.php";

if(isset($_POST["action"])){
    $bd = new Dbusser("baloncesto");
    $action = $_POST["action"];
    $_ressultReturn = [];

    // PETICIONES PARA LOGIN O REGISTRO
    if($action == "checkUsser" || $action == "newUsser") {
        $loginEmail = $_POST["loginEmail"];
        $loginPassword = $_POST["loginPassword"];
        if (filter_var($loginEmail, FILTER_VALIDATE_EMAIL)) {
            if ($_POST["action"] == 'checkUsser') {
                $_ressultReturn["index"] = "checkUsser";
                $ressult = $bd->_prepareLogin($loginEmail, $loginPassword);
            }
            else if ($_POST["action"] == 'newUsser') {
                $_ressultReturn["index"] = "newUsser";
                $ressult = $bd->_prepareLogin($loginEmail);
            }

            if ($ressult != null) { $_ressultReturn["ressult"] = 'exist'; }
            else {
                $_ressultReturn["ressult"] = 'noExist';
                if ($_POST["action"] == 'newUsser') { $bd->_prepareGetAccount($loginEmail, $loginPassword); }
            }
        }
        else { $_ressultReturn["ressult"] = 'errorEmail'; }
    }

    // PETICIONES BORRAR JUGADOR
    if($action == "delJugador") {
        $id = $_POST["id"];
        $_ressultReturn["index"] = "delJugador";
        $_ressultReturn["id"] = $id;
        $_ressultReturn["ressult"] = $bd->_delete("jugadores", 'id = ' . $id);
    }

    // PETICIONES PARA MODIFICAR JUGADOR
    if($action == "updateJugador") {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $posicion = $_POST["posicion"];
        $partidos = $_POST["partidos"];
        $puntos = $_POST["puntos"];
        $rebotes = $_POST["rebotes"];
        $asistencias = $_POST["asistencias"];

        $_ressultReturn["index"] = "updateJugador";
        $_ressultReturn["id"] = $id;
        $_ressultReturn["ressult"] = $bd->_update("jugadores", 'nombre = "' . trim($nombre) . '",posicion = "' . trim($posicion) . '",partidos = ' . $partidos . ',puntos = ' . $puntos / $partidos . ',rebotes = ' . $rebotes / $partidos . ', asistencias = ' . $asistencias / $partidos, "WHERE id = " . $id);
    }

    // PETICIONES PARA ALTA JUGADOR
    if($action == "altaJugador") {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $posicion = $_POST["posicion"];

        $_ressultReturn["index"] = "altaJugador";
        $_ressultReturn["id"] = $id;
        $_ressultReturn["ressult"] = $bd->_insert("jugadores", '(' . $id . ',"' . trim($nombre) . '","' . trim($posicion) . '", 0, 0, 0, 0)');
    }

    // PETICIONES OBTENER ID MAX
    if($action == "getIdMax") {
        $_ressultReturn["index"] = "getIdMax";
        $_ressultReturn["ressultAux"] = $bd->format_select($bd->_select('max(id) as id', 'jugadores'));
        $_ressultReturn["ressult"] = 1 + $_ressultReturn["ressultAux"][0]["id"];
    }

    echo json_encode($_ressultReturn);
}