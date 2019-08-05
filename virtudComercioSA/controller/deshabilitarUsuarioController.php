<?php
session_start();
if(isset($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'];
}else{
    header("Location: login.php?fallo=3");
}
require('queriesMysql.php');
require_once('connection.php');

if(isset($_GET['val'])){
    $estado = $_GET['val'];
    $id_usuario = $_GET['id'];
    $cambiarEstado = queriesMysql::cambiarEstado($link, $estado, $id_usuario);
    header('Location: centroAdministradorController.php?Panel=Usuarios');
    
}else{
    header('Locaion: centroAdministradorController.php');
}