<?php

// ** EVALUA FILE **
//      EVALUA QUE SEA .TXT
function validarFileExt($extension){
    if (($_FILES["actaFile"]["type"] == "text/plain") && $extension == "txt") { return true; }
    else { return false; }
}

// ** EVALUA FILE **
//      EVALUA QUE SU EXTENSION SEA IGUAL QUE SU MIME
function validarFileMime($filePath){
    if($_FILES["actaFile"]["type"] == mime_content_type($filePath)){ return true; }
    else { return false; }
}

// ** EVALUA FILE **
//      VALIDA FILE
function validarFile(){
    if($_FILES['actaFile']['name'] != "") {
        list($aa, $extension) = (explode(".", $_FILES["actaFile"]["name"]));
        if (validarFileExt($extension)) { return true; }
        else { return false; }
    }
}

// ** EVALUA FILE **
//      FORMATEA EL FILE LEIDO
function formatFile($file){
    $fileFormat = [];

    foreach($file as $key=>$value){
        $value = trim($value);
        list($id,$puntos, $rebotes, $asistencias) = explode(',', $value);
        $id = trim($id);
        $fileFormat[$id] = [];
        $fileFormat[$id]["puntos"] = trim($puntos);
        $fileFormat[$id]["rebotes"] = trim($rebotes);
        list($asistencias, $aa) = explode(';', $asistencias);
        $fileFormat[$id]["asistencias"] = trim($asistencias);
    }

    return $fileFormat;
}