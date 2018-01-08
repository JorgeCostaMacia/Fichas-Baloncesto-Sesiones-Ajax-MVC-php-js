<?php

// ** PAGE = LOGIN **
//      BORRA GET POST
//      BORRA SESION
//      CARGA FORM LOGIN
//      DESCONECTA DE BD
if(isset($_GET["page"])){
    if($_GET["page"] == "login"){
        unset($_GET);
        unset($_POST);
        $_SESSION = [];
        session_destroy();
        include_once "views/assets/login.php";
    }
}

// ** !SESSION && !POST LOGIN **
//      CARGA FORM LOGIN
if(!isset($_SESSION['loginEmail']) && !isset($_POST["loginEmail"]) && !isset($_POST["loginPassword"]) ) {
    include_once "views/assets/login.php";
    include_once "views/assets/login.php";
}

// ** POST FORM LOGIN **
//      CREA SESION = NEW USUARIO = LOGIN USUARIO
if(isset($_POST["loginEmail"]) && isset($_POST["loginPassword"])) { $_SESSION['loginEmail'] = $_POST["loginEmail"]; }

// ** SESION USUARIO **
//      RECOGE GET PAGE
if(isset($_SESSION['loginEmail'])) {
    $page = getPageText();

    // ** NAV **
    include_once "views/layout/nav.php";

    // ** PAGE = MEJORES **
    //      OBTIENE DE BD LOS MEJORES JUGADORES
    //      GENERA TABLA CON SUS VALORES
    if($page == "mejores") {
        include_once "model/primaryModel.php";
        $jugadores = getMejores();

        include_once "views/assets/mejores.php";
    }
    // ** PAGE = POSICION **
    //      OBTIENE DE BD LOS MEJORES JUGADORES POR POSICION
    //      GENERA TABLA CON SUS VALORES
    else if($page == "posicion") {
        include_once "model/primaryModel.php";
        $jugadores = getMejoresPosicion();

        include_once "views/assets/mejores_posicion.php";
    }
    // ** PAGE = MEJORES **
    //      GENERA FORM ORDEN JUGADORES
    // ** POST = MODIFICAR JUGADOR **
    //      OBTIENE DE BD JUGADOR
    //      GENERA FORM CON SUS DATOS
    // ** POST = ORDEN JUGADOR **
    //      OBTIENE DE BD LOS JUGADORES EN EL ORDEN INGRESADO
    //      GENERA FORM TABLA CON SUS VALORES
    //      INCLUYE BOTONES MODIFICAR BORRAR
    else if($page == "jugadores") {
        include_once "model/primaryModel.php";
        include_once "views/assets/formJugadores.php";

        if(isset($_POST["modificarJugador"])){
            $jugador = getJugador($_POST["modificarJugador"]);
            include_once "views/assets/ficha.php";
        }
        else if(isset($_POST["orderJug"])){
            $jugadores = getJugadores($_POST["orderJug"]);
            include_once "views/assets/jugadores.php";
        }
    }
    // ** PAGE = ESTADISTICAS **
    //      GENERA FORM ORDEN ESTADISTICAS
    // ** POST = ORDEN ESTADISTICAS **
    //      OBTIENE DE BD LOS JUGADORES EN EL ORDEN INGRESADO
    //      GENERA TABLA CON SUS VALORES
    else if($page == "estadisticas"){
        include_once "model/primaryModel.php";
        include_once "views/assets/formEstadisticas.php";

        if(isset($_POST["orderEst"])) {
            $jugadores = getEstadisticas($_POST["orderEst"]);
            include_once "views/assets/estadisticas.php";
        }
    }
    // ** PAGE = FICHA **
    //      GENERA FORM PARA ALTA JUGADOR
    else if($page == "ficha"){
        include_once "model/primaryModel.php";
        include_once "views/assets/nueva_ficha.php";
    }
    // ** POST = ACTA **
    //      GENERA FORM PARA SUBIR FICHEROS
    //      VALIDA FICHERO
    //      ACTUALIZA DATOS EN BD
    //      BORRA FICHERO
    else if($page == "acta"){
        include_once "model/primaryModel.php";

        if(isset($_POST["subirActaFile"])){
            include_once "controller/libraries/fileHandler.php";

            if(validarFile()){
                $path = "controller/src/actas/acta_" . date("Y-m-d") . ".txt";
                if(moveFile($path)){
                    if(validarFileMime($path)){
                        $file = formatFile(_readFile($path));
                        $jugadores = getJugadoresId($file);
                        setUpdateStats($jugadores, $file, $path);
                        include_once "views/assets/jugadoresActualizados.php";
                    }
                }
            }


        }
        include_once "views/assets/subir_acta.php";
    }
}