<div class="container col-xs-12 col-sm-10 col-md-10 col-lg-10">
    <h2>Puntos</h2>
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
                foreach ($jugadores["puntos"] as $jugador){
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
    <h2>Rebotes</h2>
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
            <?php
                foreach ($jugadores["rebotes"] as $jugador){
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
    <h2>Asistencias</h2>
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
        <?php
        foreach ($jugadores["asistencias"] as $jugador){
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