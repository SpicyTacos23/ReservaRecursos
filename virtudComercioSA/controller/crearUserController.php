<?php

require('./queriesMysql.php');
require('./validations.php');
require('./connection.php');
$errores = [];

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

if(isset($_REQUEST['passwd2'])){
    
    $validatePasswd = validations::validatePasswd(md5($_REQUEST['passwd2']));
    if($validatePasswd){
      $password2 = md5($_REQUEST['passwd2']);  
    }else{
        $errores['passwd'] = "Error en la validacion de contraseña";
    }
}
//mira que las contraseñas coincidan
if($password !== $password2){
    $errores['passwd2'] = "Las contraseñas no coinciden";
}

//verifica que no haya otro user con ese nombre
    $verificarUsuarioDoble = queriesMysql::verificarUsuarioDoble($link, $nombre);
    //var_dump($verificarUsuarioDoble);die;
    //echo $verificarUsuarioDoble;die;
    if(!$verificarUsuarioDoble){
        $errores['usuarioExistente'] = "Ya hay un usuario registrado con este nombre";
    }
    
    //echo $verificarUsuarioDoble;die;

if(!count($errores) > 0){
    
    $verificarUser = queriesMysql::crearUser($link,$nombre,$password);
    //var_dump($verificarUser);die;
    if($verificarUser){
        header("Location: centroAdministradorController.php?crear=exito");
    }else{
        header("Location: centroAdministradorController.php?fallo=3");
    }
}else{
    header("Location: ../views/crearUsuario.php?fallo=usuarioExistente");
}