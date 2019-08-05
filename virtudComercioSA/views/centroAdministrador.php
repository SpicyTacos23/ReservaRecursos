<?php

require('header.php');
if(isset($_GET['crear'])){
    if($_GET['crear'] === 'exito'){
        echo '<script>alert("Usuario creado correctamente");</script>';
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Centr de Administración</title>  
    </head>
    <body>
        <div class="container">
            <div class="col-xs-12 blqRecurso" >
                <div class="col-xs-4 blqIzqFormReserva">
                    <div class="divform">
                        <form action="" name="formularioTablasAdmin" id="formularioTablasAdmin" 
                              class="formularioReservar" method="POST">
                            <h3 style="margin-left: 5%;">Panel para <i><strong><?php echo $usuario ?>:</strong></i></h3>   
                           
                            <a href="centroAdministradorController.php?Panel=Usuarios"> <button type="button" class="btn btn-warning btnPanelAdmin">Usuarios</button></a>    
                            <a href="centroAdministradorController.php?Panel=Reservas"> <button type="button" class="btn btn-warning btnPanelAdmin">Reservas</button></a>
                            <a href="../views/crearUsuario.php"><button type="button" class="btn btn-success btnPanelAdmin">Alta Usuario</button></a>
                        </form>
                    </div>
                </div>
                <div class="col-xs-8 tablasPanelAdmin" style="height: 100%">
                    <?php 
                    if(isset($_GET['Panel'])){
                        $panel = $_GET['Panel'];
                        if($panel === 'Usuarios'){
                           require('tablaUsuarios.php');  
                        }elseif($panel === 'Reservas'){
                            require ('tablaReservas.php');
                        }
                    }
                    include('../web/js/funcionesJs.php');
                    ?>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </body>
</html>