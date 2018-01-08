<?php

class Jugador {
    private $id;
    private $nombre;
    private $posicion;
    private $partidos;
    private $puntos;
    private $rebotes;
    private $asistencias;

    public function __construct($id, $nombre, $posicion, $partidos, $puntos, $rebotes, $asistencias) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->posicion = $posicion;
        $this->partidos = $partidos;
        $this->puntos = $puntos;
        $this->rebotes = $rebotes;
        $this->asistencias = $asistencias;
    }

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getNombre() { return $this->nombre; }
    public function setNombre($nombre) { $this->nombre = $nombre; }

    public function getPosicion() { return $this->posicion; }
    public function setPosicion($posicion) { $this->posicion = $posicion; }

    public function getPartidos() { return $this->partidos; }
    public function setPartidos($partidos) { $this->partidos = $partidos; }

    public function getPuntos() { return $this->puntos; }
    public function setPuntos($puntos) { $this->puntos = $puntos; }

    public function getRebotes() { return $this->rebotes; }
    public function setRebotes($rebotes) { $this->rebotes = $rebotes; }

    public function getAsistencias() { return $this->asistencias; }
    public function setAsistencias($asistencias) { $this->asistencias = $asistencias; }

    public function updateValores($arrayStats){
        $this->partidos++;
        $this->puntos = ($this->puntos + $arrayStats["puntos"]) / $this->partidos;
        $this->rebotes = ($this->rebotes + $arrayStats["rebotes"]) / $this->partidos;
        $this->asistencias = ($this->asistencias  + $arrayStats["asistencias"]) / $this->partidos;
    }
}