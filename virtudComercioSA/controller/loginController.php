<?php

require('./queriesMysql.php');
require('./validations.php');
$errores = [];
$link = mysqli_connect('localhost', 'root', '', 'virtudcomerciosa'); 

if(isset($_REQUEST['nombre'])){
    
    $validateName = validations::validateName($_REQUEST['nombre']);
    if($validateName){
       $nombre = $_REQUEST['nombre']; 
    }else{
        $errores['nombre'] = "Error en la validacion de nombre";
    } 
}

if(isset($_REQUEST['passwd'])){
    
    $validatePasswd = validations::validatePasswd(md5($_REQUEST['passwd']));
    if($validatePasswd){
      $password = md5($_REQUEST['passwd']);  
    }else{
        $errores['passwd'] = "Error en la validacion de contraseña";
    }
}


if(!count($errores) > 0){
    
   // echo "hola.";
    $sinPassword = queriesMysql::UsuarioSinPassword($link, $nombre); 
    if(strlen($sinPassword) < 1){
        echo "sin Pass";
        header('Location: ../views/login.php?fallo=7');
    }
    
    $verificarUser = queriesMysql::verificarUser($link,$nombre,$password);
    $nivelUsuario = queriesMysql::getNivelUsuario($link, $nombre);
    
    
    if($verificarUser){
        session_start();
        $_SESSION['usuario'] = $nombre;
        $_SESSION['nivel'] = $nivelUsuario;
        header('Location: ../views/centroRecursos.php');
    }else{
        header("Location: ../views/login.php?fallo=1");
    }
}else{
        header("Location: ../views/login.php?fallo=2");
    }