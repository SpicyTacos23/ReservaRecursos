<?php
session_start();

if(isset($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'];
}else{
    header("Location: login.php?fallo=3");
}

require('../controller/queriesMysql.php');
require('../controller/validations.php');
require('../lib/librerias.php');
require_once ('connection.php');

// MIRAR SI HA LLEGADO EL FORMULARIO CREAR 
if(isset($_POST['horaInicio'])){
    $fecha_inicio =  $_POST['fechaInicio'];
    $hora_inicio = $_POST['horaInicio'];
    $fecha_final = $_POST['fechaFin'];
    $hora_final = $_POST['horaRetorno'];
    $id_recurso = $_POST['id_recursoHidden'];
    
    $fechaIniformat = substr($fecha_inicio, 0, 10);
    $fecha_ini = $fechaIniformat[6].$fechaIniformat[7].$fechaIniformat[8].$fechaIniformat[9]."-".$fechaIniformat[3].$fechaIniformat[4].'-'.$fechaIniformat[0].$fechaIniformat[1]." ".$hora_inicio;
    $fechaFinFormat = substr($fecha_final, 0, 10);
    $fecha_fin = $fechaFinFormat[6].$fechaFinFormat[7].$fechaFinFormat[8].$fechaFinFormat[9]."-".$fechaFinFormat[3].$fechaFinFormat[4].'-'.$fechaFinFormat[0].$fechaFinFormat[1]." ".$hora_final;
    //$fecha_inicio = $fecha1[3].$fecha1[4].'/'.$fecha1[0].$fecha1[1]."/".$fecha1[6].$fecha1[7].$fecha1[8].$fecha1[9];
   //echo $fecha_ini, $fecha_fin;die;
    
    $insertReserva = queriesMysql::insertReserva($link, $usuario, $fecha_ini,$fecha_fin, $id_recurso);

    if($insertReserva){
        echo"query ok".$id_recurso;
        header('Location: reservarRecursoController.php?id_recurso='.$id_recurso);
    }else{
        echo "query mal";
    }   
    
}else{
    if(!isset($_GET['id_recurso'])){
        header("Location: ../views/login.php");
    }
}

$errores = [];
$id_recurso = $_GET['id_recurso'];
$inforecursos = queriesMysql::getInfoRecurso($link, (int)$id_recurso );
$reservas = queriesMysql::getInfoReserva($link, (int)$id_recurso);
//var_dump($reservas);
if(count($reservas) > 0){
    $fecha_reserva = date("m/d/Y",strtotime($reservas[0]['fecha_reserva']));
    $fecha_devolucion = date("m/d/Y",strtotime($reservas[0]['fecha_devolucion']));  
}
$horas = [];
$num= "06";
for($i=0;$i<8;$i++){
    $num = (int)$num+2;
    $horas[$i] = $num.":00  ";
    //echo $horas[$i];
}
//var_dump($inforecursos);
$imagen=$inforecursos[0]["imagen"];
$descripcion = nl2br(utf8_encode($inforecursos[0]["descripcion"]));
//die("pasa");

require('../views/reservarRecurso.php');

?>
