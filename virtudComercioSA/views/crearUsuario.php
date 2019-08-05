<body>

<?php
session_start();

if(isset($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'];
    $nivelUsuario = $_SESSION['nivel'];
}else{
    header("Location: login.php?fallo=3");
}
//echo $usuario, $nivelUsuario;
if($nivelUsuario == 'Administrador'){
   // echo "usuario administrador";
}else{
   header('Location: ../views/login.php?fallo=6');
}
require('../controller/queriesMysql.php');
require('../controller/validations.php');
require('../lib/librerias.php');
require_once ('../controller/connection.php');
require('header.php');
$usuarioDoble = false;

if(isset($_GET['fallo'])){
    //var_dump($_GET['fallo']);
    echo '<script>alert("Ha habido erorres: No dejes campos vacíos y asegurate de que el usuario no existe previamente");</script>';
}
//var_dump($_GET['errores']);
//var_dump($errores);
//var_dump($_GET['fallo']);
if(isset($_GET['fallo'])){
    $usuarioDoble = true;
}
?>
        <div class="container">
            <h1 style="color: white;">CREAR USUARIO</h1>
            <div class="col-xs-12 centroForm">
                <?php 
                    if ($usuarioDoble){
                        //die("hola");
                        echo "<div><p style='color:red'> Este usuario ya existe</p></div>";
                    } ?>
                
                <div class="col-xs-3 col-offset-xs-3 formNewUser">
                    <form action="../controller/crearUserController.php" method="POST" id="formCrearUser">
                        <i class="fas fa-user-secret fa-5x"></i><br>
                        <label>Nombre:</label><br>
                        <input type="text" name="nombre" id="nombreFormCreate" class="form-control"
                               onclick="this.style.border=''"><br>
                        <label>Contraseña</label><br>
                        <input type="password" name="passwd" id="pass1FormCreate" class="form-control"
                               onclick="this.style.border=''"><br>
                        <label>Repite Contraseña</label><br>
                        <input type="password" name="passwd2" id="pass2formCreate" class="form-control"
                               onclick="this.style.border=''"><br><br>
                        <button class="btn btn-primary" type="button" style="min-width: 80px;" id="btnEnviarformCrear">Entrar</button>
                        <a href="../controller/centroAdministradorController.php">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <?php require('../web/js/funcionesJS.php'); ?>
</html>