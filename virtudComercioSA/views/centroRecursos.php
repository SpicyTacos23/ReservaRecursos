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
$errores = [];
$link = mysqli_connect('localhost', 'root', '', 'virtudcomerciosa'); 
//mira si se ha filtrado y aplica cambios
if(isset($_POST['filtrarRecurso'])){
    $nombre = '%'.$_POST['filtrarRecurso'].'%';
}else{
    //sacar todos los recursos
    $nombre = '%%';
}
$inforecursos = queriesMysql::getInfoRecursos($link, $nombre);

//var_dump($inforecursos);die;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Central de Recursos</title>
</head>
<body>
    <?php require('header.php') ?>
    <div class="container">
        <div class="col-xs-1" style="width: 3%">
            <i class="fas fa-search fa-2x greenLogo"></i>
        </div>
        <div class="col-xs-11" >
            <form action="centroRecursos.php" method="POST" name="filtrarRecursos">
                <input type="text" name="filtrarRecurso" class="form-control fontAwesome"  placeholder="...filtrar recursos..." 
                   id="filtrarRecurso">
            </form>
            
        </div>
        <div class="col-xs-12">
            <div class="col-xs-12 titulo">
                <hr style="color: black;" />
                <h1 class="greenLogo">CENTRO DE RECURSOS</h1>
            </div>
            <?php 

           // $usuario = mysqli_fetch_all($infoUsuario);
            $cont =0;
                foreach($inforecursos as $a){
                    $id_recurso = $inforecursos[$cont][0];
                    $recurso = utf8_encode($inforecursos[$cont][1]);
                    $imagen = $inforecursos[$cont][3];
                    
                    echo "<div class='col-xs-4 prueba'>";
                    echo "<span><div class='infoUser bloquesUsuarios'>";
                    echo "<input type='hidden' value='$recurso' name='idAnuncio' >";
                    echo "<img src='../web/imagenes/recursos/$imagen.jpg'><br>";
                    echo "<i>".$recurso."</i></label><br>";
                    echo "<a href='../controller/reservarRecursoController.php?id_recurso=$id_recurso'>";
                    echo "<button class='btn btn-info' class='btnReservar'>Reservar</button>";
                    echo "</a></div></span></div>";
                    $cont++;
                }
            ?>
            <br><a href="./logout.php"><button class="col-xs-12 btn btn-danger btnVolverCentroUsu">Volver</button></a>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>   
    
    <?php require '../web/js/funcionesJs.php'; ?>
</html>
