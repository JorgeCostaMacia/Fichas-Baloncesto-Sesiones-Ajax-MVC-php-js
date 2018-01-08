<div class="container col-xs-12 col-sm-10 col-md-10 col-lg-10">
    <h2>Base</h2>
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
                foreach ($jugadores["base"] as $jugador){
                    echo '<tr>';
                    echo '<td>' . $jugador->getId() . '</td><td>' . $jugador->getNombre() . '</td>';
                    echo '<td>' . $jugador->getPosicion() . '</td><td>' . $jugador->getPartidos() . '</td>';
                    echo '<td>' . $jugador->getPuntos() . '</td><td>' . $jugador->getRebotes() . '</td>';
                    echo '<td>' . $jugador->getAsistencias() . '</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>

<div class="container col-xs-12 col-sm-10 col-md-10 col-lg-10">
    <h2>Escolta / Alero</h2>
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
                foreach ($jugadores["escolta"] as $jugador){
                    echo '<tr>';
                    echo '<td>' . $jugador->getId() . '</td><td>' . $jugador->getNombre() . '</td>';
                    echo '<td>' . $jugador->getPosicion() . '</td><td>' . $jugador->getPartidos() . '</td>';
                    echo '<td>' . $jugador->getPuntos() . '</td><td>' . $jugador->getRebotes() . '</td>';
                    echo '<td>' . $jugador->getAsistencias() . '</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>

<div class="container col-xs-12 col-sm-10 col-md-10 col-lg-10">
    <h2>Ala pivot / Pivot</h2>
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
                foreach ($jugadores["pivot"] as $jugador){
                    echo '<tr>';
                    echo '<td>' . $jugador->getId() . '</td><td>' . $jugador->getNombre() . '</td>';
                    echo '<td>' . $jugador->getPosicion() . '</td><td>' . $jugador->getPartidos() . '</td>';
                    echo '<td>' . $jugador->getPuntos() . '</td><td>' . $jugador->getRebotes() . '</td>';
                    echo '<td>' . $jugador->getAsistencias() . '</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>