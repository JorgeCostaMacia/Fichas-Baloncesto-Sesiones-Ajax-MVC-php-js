<div class="container col-xs-12 col-sm-10 col-md-10 col-lg-10">
    <h2>Jugadores actualizados con actas</h2>
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
                    echo '<tr>';
                    echo '<td>' . $jugador->getId() . '</td>';
                    echo '<td>' . $jugador->getNombre() . '</td>';
                    echo '<td>' . $jugador->getPosicion() . '</td>';
                    echo '<td>' . $jugador->getPartidos() . '</td>';
                    echo '<td>' . number_format ( $jugador->getPuntos() , 2) . '</td>';
                    echo '<td>' . number_format ( $jugador->getRebotes() , 2) . '</td>';
                    echo '<td>' . number_format ( $jugador->getAsistencias() , 2) . '</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>