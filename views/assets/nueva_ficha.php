<div id="mensajes" class="col-xs-12 col-sm-10 col-md-10 col-lg-10"></div>

<form id="formAltaJugador" class="form-horizontal col-xs-12 col-sm-10 col-md-10 col-lg-10">
    <div class="form-group">
        <label class="control-label col-sm-2" for="id">Id:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="id" value="<?= getNextMaxId() ?>" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="nombre">Nombre:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nombre" placeholder="Nombre jugador">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="posicion">Posicion:</label>
        <div class="col-sm-10">
            <select id="posicion" class="form-control">
                <option value="ala pivot">Ala pivot</option>
                <option value="alero">Alero</option>
                <option value="base">Base</option>
                <option value="escolta">Escolta</option>
                <option value="pivot">Pivot</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" id="registrarFichar" class="btn btn-success">Registrar</button>
        </div>
    </div>
</form>