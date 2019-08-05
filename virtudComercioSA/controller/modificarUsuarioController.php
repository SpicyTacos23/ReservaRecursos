<?php

session_start();
if(isset($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'];
}else{
    header("Location: login.php?fallo=3");
}
require('queriesMysql.php');
require_once('connection.php');
require('validations.php');
//echo "hola";
if(isset($_POST['nombre'])){
       // $usuarios = queriesMysql::getInfoUsuario($link, $id_usuario);
        //var_dump($usuarios);die;
        $id_usuario = $_POST['id_usuario'];
        $oldUsername = $_POST['oldUsername'];
        
        if($_POST['nombre'] !== ''){
           if(validations::validateName($_POST['nombre'])){
               $nombre = $_POST['nombre'];
           }else{
               echo "error en la validacion de nombre";die;
           }
          
        }else{
            $nombre = $oldUsername;
        }
        if(validations::validatePasswd($_POST['changePass'])){
            $pass = $_POST['changePass'];
        }
        
        $nivel = $_POST['nivel'];
        
        if($pass == '1'){
            $query = "UPDATE usuarios SET username = '$nombre', password = '', nivel = '$nivel' WHERE id_usuario = '$id_usuario'";
        }else{
             $query = "UPDATE usuarios SET username = '$nombre', nivel = '$nivel' WHERE id_usuario = '$id_usuario'";
        }
        
        //echo $nombre,$pass,$nivel,$id_usuario;die;
       
        
        //echo $query;die;
      //echo $query;die;
        $modificarUsuario = queriesMysql::modificarUsuario($link, $query);
       // echo $nombre,$cambiarPass,$nivel;die;
}   
if(isset($_GET['id'])){
   // echo "holaasda";
    $id_usuario = $_GET['id'];
   // echo $id_usuario;die;
    $usuarios = queriesMysql::getInfoUsuario($link, $id_usuario);
   // var_dump($usuarios);die;
    include('../views/modificarUsuario.php');  
    //var_dump($usuarios);
    //header('Location: centroAdministradorController.php?Panel=Usuarios');
    
}else{
    header('Location: centroAdministradorController.php');
}
