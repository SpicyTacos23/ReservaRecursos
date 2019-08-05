<?php 
    session_start();
    //session_destroy();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <?PHP 
            require '../lib/librerias.php';
            if(isset($_GET['fallo'])){
                $error = $_GET['fallo'];
                //echo "<p>$error</p>";
                $mensaje = 0;
                if($error === '1'){
                   $mensaje = "<p style='color: red'> El usuario o la contraseña no coinciden</p>";
                }elseif($error === '2'){
                    $mensaje = "<p style='color: red'>Se han intentado introducir valores ilegales!</p>";
                }elseif($error === '3'){
                    $mensaje = "<p style='color: red'> Debes loguearte primero!</p>";
                }elseif($error === '4'){
                    $mensaje = "<p style='color: red'> Usuario creado correctamente!</p>";
                }elseif($error === '5'){
                    $mensaje = "<p style='color: red'> Has cerrado sesión. Hasta pronto!</p>";
                }elseif($error === '6'){
                    $mensaje = "<p style='color: red'> Debes loguarte como Administrador para acceder aquí</p>";
                }elseif($error ==='7'){
                    $mensaje = "<p style='color: red'> Tu contraseña ha sido reseteada. Ponte en contacto con el Administrador</p>";
                }
                
            }
            
        ?>
        <title>Login</title>
    </head>
    <body>
        <div class="cabec">
            <div class="header" >
                <h1><img src="../web/Imagenes/logo/balanzaLogo.png" class="logo greenLogo">
                    <p class="tituloHeader tith">Virtud</p><p class="tituloHeader2 tith">Comercio</p>
                </h1>
            </div>  
            </div>
        </div>
        
        <div class="container">
            
            <div class="col-xs-12 centroForm">
                
                <div class="col-xs-6 col-xs-offset-4">
                    
                    <form action="../controller/loginController.php" method="POST" id="formularioLogin">
                        <div class="logoLogin">
                           <i class="fa fa-user-circle fa-5x"></i><br> 
                        </div>
                        
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle fa-fw"></i></span>
                            <input type="text" name="nombre" id="nombreFormLogin" onclick="this.style.border=''" required
                                   placeholder="nombre usuario" class="form-control inputLogin">
                        </div> 
                        <p id="hiddenErrorName" class="hiddenErrores" style="display: none">
                                Vuelve a introducir el nombre de usuario</p><br>
                        <div class="input-group">
                            <span class="input-group-addon logoLogin"><i class="fa fa-key fa-fw"></i></span>
                            <input type="password" name="passwd" id="passwdFormLogin" onclick="this.style.border=''" required
                                   placeholder="contraseña" class="form-control inputLogin">
                        </div>
                        <p id="hiddenErrorPswd" class="hiddenErrores" style="display: none">
                                Vuelve a introducir la contraseña</p><br> 
                        <?php
                        if(isset($mensaje)){
                            if($mensaje !== 0){
                                echo $mensaje;}
                        }
                        ?>
                        <button class="btn btn-success btnEnviarform">Entrar</button>  
                    </form>
                </div>
                
            </div>
        </div>
    </body>
    
    <?php require('../web/js/funcionesJS.php'); ?>
</html>
