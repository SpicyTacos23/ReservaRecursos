        
<div class="col-xs-12 espacioTabla">
    <h2 class="greenLogo">USUARIOS:</h2>
    <table id="tablaTable" class="table table-striped table-hover"> 
        <thead class="thead-dark"> 
        <tr> 
            <th scope="col">id_usuario</th> 
            <th scope="col">username</th>
            <th scope="col">Nivel</th>
            <th scope="col">Estado</th>
            <th scope="col">Admin Panel</th>
        </tr> 
        </thead> 
        <tbody> 
            <?php 
            //$infoUsuario
            if(count($infoUsuario) >0){
                $cont = 0;
                    foreach($infoUsuario as $usuario){
                        echo '<tr>';
                        echo "<td class='usuario' value='".$infoUsuario[$cont]['id_usuario']."'>".$infoUsuario[$cont]['id_usuario']."</td> ";
                        echo "<td>".$infoUsuario[$cont]['username']."</td> ";
                        echo "<td class='recurso'>".$infoUsuario[$cont]['nivel']."</td> ";
                        if($infoUsuario[$cont]['habilitado'] == '1'){
                           echo "<td class='recurso'>Habilitado</td> "; 
                           echo "<td class='recurso'><a href='../controller/deshabilitarUsuarioController.php?val=0&id=".$infoUsuario[$cont]['id_usuario']."'><i class='fas fa-eye btnAdminPanel green deshabilitar'></i></a>";
                        }else{
                             echo "<td class='recurso'>Deshabilitado</td> ";
                             echo "<td class='recurso'><a href='../controller/deshabilitarUsuarioController.php?val=1&id=".$infoUsuario[$cont]['id_usuario']."'><i class='fas fa-eye-slash btnAdminPanel grey'></i></a>";
                        }
                        echo "<a href='../controller/modificarUsuarioController.php?id=".$infoUsuario[$cont]['id_usuario']."'><i class='fas fa-user-edit btnAdminPanel blue'></i></a>";
                        echo "<i class='fas fa-user-times btnAdminPanel red'></i>";
                        echo "</td>";
                        

                        $cont++;
                    }
            }else{
                echo '<tr>';
                echo "<td></td> ";
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