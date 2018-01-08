<div id="mensajes" class="col-xs-12 col-sm-10 col-md-10 col-lg-10"></div>

<div class="container col-xs-12 col-sm-10 col-md-10 col-lg-10">
    <form id="formSubirActa" action="index.php?page=acta" enctype="multipart/form-data" class="form-horizontal" method="POST">
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <input type="file" class="btn btn-default btn-file" id="actaFile" name="actaFile" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <input type="submit" id="subirActaFile" name="subirActaFile"  value="Subir acta" class="btn btn-success">
            </div>
        </div>
    </form>
</div>