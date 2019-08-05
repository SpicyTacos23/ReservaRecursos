
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
    $errores['passwd2'] = "Las contraseñas no coinciden2";
}
echo $nombre;
//verifica que no haya otro user con ese nombre
    $verificarUsuarioDoble = queriesMysql::verificarUsuarioDoble($link, $nombre);
    if(!$verificarUsuarioDoble){
        
        $errores['usuarioExistente'] = "Ya hay un usuario registrado con este nombre";
    }
    

if(!count($errores) > 0){
    
    $verificarUser = queriesMysql::crearUser($link,$nombre,$password);
    //var_dump($verificarUser);die;
    if($verificarUser){
        header("Location: ../views/login.php?fallo=4");
    }else{
        
        header("Location: ../views/login.php?fallo=3");
    }
}else{
    header("Location: ../views/newUser.php?fallo=$errores");
}