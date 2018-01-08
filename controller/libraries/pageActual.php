<?php

// ** EVALUA PAGE **
//      RECOGE VALORES GET PAGE
//      RETURN TITLE
function getTitlePage(){
    if(!isset($_SESSION['loginEmail']) && !isset($_POST["loginEmail"]) && !isset($_POST["loginPassword"]) ) { echo 'Login'; }
    else {
        if(isset($_GET["page"])) {
            if($_GET["page"] == "login") { echo "Login"; }
            else if($_GET["page"] == "ficha") { echo "Ficha nueva"; }
            else if($_GET["page"] == "acta") { echo "Subir acta"; }
            else if($_GET["page"] == "mejores") { echo "Mejores"; }
            else if($_GET["page"] == "posicion") { echo "Mejores posicion"; }
            else if($_GET["page"] == "jugadores") { echo "Jugadores"; }
            else if($_GET["page"] == "estadisticas") { echo "Estadisticas"; }
        }
        else  { echo "Home"; }
    }
}

// ** EVALUA PAGE **
//      RECOGE VALORES GET PAGE
//      ASIGNA VALOR PAGE - RETURN PAGE
function getPageText(){
    $page = "home";

    if (isset($_GET["page"])) {
        if ($_GET["page"] == "login") { $page = "login"; }
        else if ($_GET["page"] == "ficha") { $page = "ficha"; }
        else if ($_GET["page"] == "acta") { $page = "acta"; }
        else if ($_GET["page"] == "mejores") { $page = "mejores"; }
        else if ($_GET["page"] == "posicion") { $page = "posicion"; }
        else if ($_GET["page"] == "jugadores") { $page = "jugadores"; }
        else if ($_GET["page"] == "estadisticas") { $page = "estadisticas"; }
    }

    return $page;
}
