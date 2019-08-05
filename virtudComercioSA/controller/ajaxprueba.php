<?php
// comprobar recurso disponible

$fecha_ini = $_GET['fini'];
$fecha_final = $_GET['ffin'];
$id_recurso = $_GET['idrec'];
$hora_inicio = $_GET['hini'];
$hora_final = $_GET['hfin'];
//echo $hora_inicio; die;
$errores = [];
//echo $fecha_ini, $fecha_final, $id_recurso, $hora_inicio, $hora_final;die;

require('queriesMysql.php');
require_once('connection.php');


//transformar fechas a formato SQL
$fechaIniformat = substr($fecha_ini, 0, 10);
$fecha_ini = $fechaIniformat[6].$fechaIniformat[7].$fechaIniformat[8].$fechaIniformat[9]."-".$fechaIniformat[3].$fechaIniformat[4].'-'.$fechaIniformat[0].$fechaIniformat[1]." ".$hora_inicio;
$fechaFinFormat = substr($fecha_final, 0, 10);
$fecha_final = $fechaFinFormat[6].$fechaFinFormat[7].$fechaFinFormat[8].$fechaFinFormat[9]."-".$fechaFinFormat[3].$fechaFinFormat[4].'-'.$fechaFinFormat[0].$fechaFinFormat[1]." ".$hora_final;
//echo $fecha_ini, $fecha_final;die;

// primera comprobacion: si la fecha de inicio esta en medio de otra reserva (false) o esta libre (true)
$verificarFecha = queriesMysql::getInfoReservaAJAX($link, $id_recurso, $fecha_ini, $fecha_final);
if($verificarFecha){
    //echo "la fecha esta disponible        ....    ";
    // la fecha se puede reservar
    
}else{
    //echo "fecha ocupada        ....    ";
    $errores['fechaInicio'] = "La fecha de inicio no esta disponible";
    //la fecha esta ocupada y no se puede reservar
  
}

// se mira si la fecha fin tambien lo esta
 $verificarFechaFin = queriesMysql::verificarFechaFin($link, $id_recurso,$fecha_ini, $fecha_final);
 if($verificarFechaFin){
     //echo "todo ok, se puede hacer la reserva";
 }else{
     $errores['fechafin'] = "La fecha de devolucion no esta disponible";
     //echo "la fecha de retorno, no esta disponible";
 }
 
 var_dump($errores);