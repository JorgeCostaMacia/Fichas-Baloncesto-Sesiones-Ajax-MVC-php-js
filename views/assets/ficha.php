<div id="mensajes" class="col-xs-12 col-sm-10 col-md-10 col-lg-10"></div>

<form id="formModificarJugador" class="form-horizontal col-xs-12 col-sm-10 col-md-10 col-lg-10">
  <div class="form-group">
    <label class="control-label col-sm-2" for="id">Id:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="id" value="<?=$jugador->getId()?>" disabled>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="nombre">Nombre:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nombre" placeholder="Nombre jugador" value="<?=$jugador->getNombre()?>">
    </div>
  </div>
  <div class="form-group">
      <label class="control-label col-sm-2" for="posicion">Posicion:</label>
      <div class="col-sm-10">
        <select id="posicion" class="form-control">
            <?php
                if($jugador->getPosicion() == "ala pivot"){ echo '<option value="ala pivot" selected>Ala pivot</option>'; }
                else { echo '<option value="ala pivot">Ala pivot</option>'; }
                if($jugador->getPosicion() == "alero"){ echo '<option value="alero" selected>Alero</option>'; }
                else { echo '<option value="alero">Alero</option>'; }
                if($jugador->getPosicion() == "base"){ echo '<option value="base" selected>Base</option>'; }
                else { echo '<option value="base">Base</option>'; }
                if($jugador->getPosicion() == "escolta"){ echo '<option value="escolta" selected>Escolta</option>'; }
                else { echo '<option value="escolta">Escolta</option>'; }
                if($jugador->getPosicion() == "pivot"){ echo '<option value="pivot" selected>Pivot</option>'; }
                else { echo '<option value="pivot">Pivot</option>'; }
            ?>
        </select>
      </div>
  </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="partidos">Partidos:</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="partidos"  value="<?=$jugador->getPartidos()?>" min="0">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="puntos">Puntos:</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="puntos"  value="<?=round($jugador->getPuntos())?>" min="0">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="rebotes">Rebotes:</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="rebotes"  value="<?=round($jugador->getRebotes())?>" min="0">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="asistencias">Asistencias:</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="asistencias"  value="<?=round($jugador->getAsistencias())?>" min="0">
        </div>
    </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" id="modificarFichar" class="btn btn-warning">Modificar</button>
    </div>
  </div>
</form>