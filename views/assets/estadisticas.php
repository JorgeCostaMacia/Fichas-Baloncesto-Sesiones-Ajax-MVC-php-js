<div class="container col-xs-12 col-sm-10 col-md-10 col-lg-10">
    <h2>Estadisticas ordenadas por <?= $_POST["orderEst"] ?></h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Posicion</th>
            <th>Partidos</th>
            <th>Puntos</th>
            <th>Rebotes</th>
            <th>Asistencias</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($jugadores as $jugador){
            echo '<tr id="' . $jugador->getId(). '">';
            echo '<td>' . $jugador->getId() . '</td>';
            echo '<td>' . $jugador->getNombre() . '</td>';
            echo '<td>' . $jugador->getPosicion() . '</td>';
            echo '<td>' . round($jugador->getPartidos()) . '</td>';
            echo '<td>' . round($jugador->getPuntos()) . '</td>';
            echo '<td>' . round($jugador->getRebotes()) . '</td>';
            echo '<td>' . round($jugador->getAsistencias()) . '</td>';
        }
        ?>
        </tbody>
    </table>
</div>