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
   echo '<script>alert("Debes loguarte como Administrador para acceder aquí");</script>';
   header('Location: ../views/centroRecursos.phps');
}
require('../controller/queriesMysql.php');
require('../controller/validations.php');
require('../lib/librerias.php');
require_once ('connection.php');


$errores = [];

$id_recurso = queriesMysql::getIdUsusario($link, $usuario);
$inforecursos = queriesMysql::getInfoRecurso($link, (int)$id_recurso );
$infoReservas = queriesMysql::getInfoReserva($link, (int)$id_recurso);
$infoUsuario = queriesMysql::getInfoUsuarios($link);

include('../views/centroAdministrador.php');