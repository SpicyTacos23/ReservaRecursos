
            
<div class="col-xs-12 espacioTabla">
    <h2 style="color: white">VER DISPONIBILIDAD</h2>
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
            if(count($reservas) >0){
                $cont = 0;
                    foreach($reservas as $reserva){
                        echo '<tr>';
                        echo "<td class='usuario'>".$reservas[$cont]['id_reserva']."</td> ";
                        echo "<td>".$reservas[$cont]['id_recurso']."</td> ";
                        echo "<td class='recurso'>".$reservas[$cont]['username']."</td> ";
                       // echo "<input class='id_recurso' type='hidden' value='".$reservas[$cont]['id_recurso_fk']."'></input>";
                        echo "<td class='recurso'>".$reservas[$cont]['fecha_reserva']."</td> ";
                        echo "<td class='recurso'>".$reservas[$cont]['fecha_devolucion']."</td> ";
//                        echo "<td class='recurso'>".date("d/m/Y H:i",strtotime($reservas[$cont]['fecha_reserva']))."</td> ";
//                        echo "<td class='recurso'>".date("d/m/Y H:i ",strtotime($reservas[$cont]['fecha_devolucion']))."</td> ";

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