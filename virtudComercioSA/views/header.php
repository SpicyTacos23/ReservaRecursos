 <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC" rel="stylesheet">
<div class="cabec">
    <div class="header" >
<!--        <i class="fas fa-balance-scale fa-3x logo greenLogo"></i>-->
        <h1><img src="../web/Imagenes/logo/balanzaLogo.png" class="logo greenLogo">
            <p class="tituloHeader tith">Virtud</p><p class="tituloHeader2 tith">Comercio</p>
        </h1>
        <div class=" col-xs-4 col-xs-offset-4" id="bloqueUsers">
            <a href="../controller/logout.php"><button class="btn btn-danger col-xs-4 label-usuario" id="btn-cerrarSesion">Cerrar Sesión</button></a>
            <label class="form-control label-usuario" id="usuarioLogueado"><?php echo $usuario ?></label>
        </div>
        <div class="infoEmpresa col-xs-12" style="font-size: 25px;">
            <a href='../controller/centroAdministradorController.php'><p class="greenLogo col-xs-4 headerMenu"><u>Administradores</u></p></a>
            <a href="../views/centroRecursos.php"><p class="greenLogo col-xs-4 headerMenu"><u>Recursos</u></p> </a>
            <a href="../views/misReservas.php"><p class="greenLogo col-xs-4 headerMenu"><u>Mis Reservas</u></p> </a>
            <hr style="border: groove 2px lightgrey">
        </div>
        
    </div>
</div>
