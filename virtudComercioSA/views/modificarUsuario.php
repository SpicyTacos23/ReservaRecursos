<?php include('header.php'); ?>
        <div class="container">
            <h1 style="color: white;">MODIFICAR USUARIO</h1>
            <div class="col-xs-12 centroForm">               
                <div class="col-xs-3 col-offset-xs-3 formNewUser">
                    <form action="../controller/modificarUsuarioController.php" method="POST" id="formModificarUser" name="formModificarUser">
                       <input type="hidden" value="<?php echo $id_usuario ?>" name="id_usuario">
                       <input type="hidden" value="<?php echo $usuarios[0]['username'] ?>" name="oldUsername">
                        <label>Nombre Antiguo:</label><input type="text" readonly="" placeholder="<?php echo $usuarios[0]['username'] ?>"
                                                             style="background-color: lightgrey;"><br>
                        <label type="text">Nuevo Nombre:</label>
                        <input type="text" name="nombre" id="nombreFormCreate" class="form-control" autocomplete="off"
                               onclick="this.style.border=''" value="" placeholder="<?php echo $usuarios[0]['username'] ?>"  maxlength="25"><br>
                        <label>Resetear Contraseña?:</label><br>
                        <input type="radio" name="changePass" value="0" checked>No
                        <input type="radio" name="changePass" value="1">Sí<br>
                        <label>Nivel:</label><br>
                        <select class="form-control" name="nivel">
                            <option value="Invitado">Invitado</option>
                            <option value="Basico">Basico</option>
                            <option value="Administrador">Administrador</option>
                        </select><br><br>
                        <button class="btn btn-primary" type="button" style="min-width: 80px;" id="btnEnviarformModificar">Entrar</button>
                        <a href="../controller/centroAdministradorController.php">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <?php require('../web/js/funcionesJS.php'); ?>
</html>