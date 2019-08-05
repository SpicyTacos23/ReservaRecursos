<?php
session_start();
if(isset($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'];
}else{
    header("Location: centroRecursos.php");
}
require ('../controller/queriesMysql.php');
require('../lib/librerias.php');
require('../controller/connection.php');

$infoReservas = queriesMysql::getInfoReservaMiReserva($link, $usuario);
include('header.php');
?>    
<div class="col-xs-10 col-xs-offset-1 espacioTabla">
    <h2 class="greenLogo">MIS RESERVAS:</h2>
    <table id="tablaTable" class="table table-striped table-hover"> 
        <thead class="thead-dark"> 
        <tr> 
            <th scope="col">id_reserva</th> 
            <th scope="col">id_recurso</th>
            <th scope="col">Usuario</th> 
            <th scope="col">Fecha Reserva</th>
            <th scope="col">Fecha Retorno</th>
        </tr> 
        </thead> 
        <tbody> 
            <?php 
            if(count($infoReservas) >0){
                $cont = 0;
                    foreach($infoReservas as $reserva){
                        echo '<tr>';
                        echo "<td class='usuario'>".$infoReservas[$cont]['id_reserva']."</td> ";
                        echo "<td>".$infoReservas[$cont]['id_recurso']."</td> ";
                        echo "<td class='recurso'>".$infoReservas[$cont]['username']."</td> ";
                        echo "<td class='recurso'>".$infoReservas[$cont]['fecha_reserva']."</td> ";
                        echo "<td class='recurso'>".$infoReservas[$cont]['fecha_devolucion']."</td> ";

                        $cont++;
                    }
            }else{
                echo '<tr>';
                echo "<td></td> ";
                echo "<td></td> ";
                echo "<td></td> ";
                echo "<td></td> ";
                echo "<td></td> ";
                echo '</tr>';
            }
            ?>  
        </tbody> 
    </table> 
</div>
<?php include('footer.php'); ?>