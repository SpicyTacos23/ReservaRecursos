
<!DOCTYPE html>
<html>
<head>
    <title>Central de Recursos</title>

<!-- BOOTSTRAP DATEPICKER -->
<link rel="stylesheet" href="../web/css/jquery-ui.theme.min.css">
<link rel="stylesheet" href="../web/css/jquery-ui.min.css">
<script src="../web/js/jquery-ui.min.js"></script>
</head>
<body>
    <?php require('../views/header.php'); ?>
    <div class="container">
        <div class="col-xs-12 blqRecurso" >
            <div class="col-xs-4 blqIzqFormReserva">
                <div class="divform">
                    <form action="../controller/reservarRecursoController.php" name="formularioReservar" id="formularioReservar" 
                          class="formularioReservar" method="POST">
                        <h3>Reserva para <i><strong><?php echo $usuario ?></strong></i></h3>   
                        <input type="hidden" value="<?php echo  $id_recurso ?>" name="id_recursoHidden" id="id_recursoHidden">
                        <label>Fecha Inicio:</label> <br>
                        <!-- input del DATE PICKER -->
                        <i class="far fa-calendar-alt" style="font-size: 25px;"></i> 
                            <input type="text" class="datePicker" id='fechaInicio'  name="fechaInicio" autocomplete="off" required><br>
<!--                        <label>Hora de recogida </label> <br>-->
                        <select name="horaInicio" id="horaInicio" required>
                            <option value='0'>Hora Recogida</option>
                            <?php 
                            foreach($horas as $hora){
                                echo "<option value='$hora'>$hora</option>";
                            }
                            ?>
                        </select><br>
                        <label>Fecha Devolución:</label> <br>
                        <i class="far fa-calendar-alt" style="font-size: 25px;"></i> 
                          <input type="text" class="datePicker" id='fechaFin' autocomplete="off" name="fechaFin" required><br>
<!--                        <label>Hora de devolución </label> <br>-->
                        <select name='horaRetorno' id="horaRetorno" required>
                            <option value='0'>Hora Retorno</option>
                            <?php 
                            foreach($horas as $hora){
                                echo "<option value='$hora'>$hora</option>";
                            }
                            ?>
                        </select><br>
                        <button type="button" class="btn btn-success" id="btnEnviarFormRecurso" style="display: none;">Reservar</button>
                    </form>
                    <form action="ajaxprueba.php" method="GET" name="ajaxprueba" id="ajaxprueba">
                        <input type="hidden" name="fini" id="fini">
                        <input type="hidden" name="ffin" id="ffin">
                        <input type="hidden" name="hini" id="hini">
                        <input type="hidden" name="hfin" id="hfin">
                        <input type="hidden" name="idrec" id="idrec" value="<?php echo $id_recurso ?>">
                        <button type="button" class="btn btn-warning" id="botonajax">Comprobar Disponibilidad </button>
                    </form>
                </div>
            </div>
            <div class="blqderechaInfoRecurso" style="height: 100%">
                <div class="infoRecursoComp col-xs-8">
                   <p> <img src='../web/Imagenes/recursos/<?php echo $imagen?>.jpg' style="float: left"><?php echo $descripcion ?></p>
                </div>
            </div>
            <?php require('tabla.php'); ?>
        </div>
    </div>
    

<script>
$( document ).ready(function(){

        //código de lenguaje español configuracion datepicker
        var firstDate = $('#firstDate').val;
        $(".datePicker").datepicker({   
            closeText: 'Cerrar',
            prevText: '<Ant',
            nextText: 'Sig>',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
            weekHeader: 'Sm',
            dateFormat: 'mm/dd/yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: '',
            minDate: 0,
            maxDate: "+3m"
           // beforeShowDay: $.datepicker.noWeekends
        });
        //inicia el plugin
        $('.datePicker').datepicker('option', 'dateFormat', 'dd/mm/yy');


        // capturar el boton de enviar
        $('#btnEnviarFormRecurso').click(function(){

            var horaInicio = $('#horaInicio').val();
            var horaFin = $('#horaRetorno').val();
            var fechaInicio = $('#fechaInicio').val()+"  "+horaInicio;
            var fechaFin = $('#fechaFin').val()+"  "+horaFin;
            //console.log(fechaInicio,fechaFin);
            $('#formularioReservar').submit();


        });
        //boton que guarda los campos en inputs hidden y los envia por ajax para validarlos
        $('#botonajax').click(function(){
            var fecha_inicio = $('#fechaInicio').val();
            var fecha_fin = $('#fechaFin').val();
            var hora_inicio = $('#horaInicio').val();
            var hora_fin = $('#horaRetorno').val();
            var id_recurso = $('#idrec').val();
            //variables de control de formulario con fecha y hora
            var fechaInicio = $('#fechaInicio').val()+"  "+hora_inicio;
            var fechaFin = $('#fechaFin').val()+"  "+hora_fin;
            //alert(fecha_inicio+" fecha inicio");
            //throw new Error("pausa");
            var errores = [];
            if(fecha_inicio === ''){
                errores[0] = "fecha inicio vacia";
                //throw new Error("fecha inicio vacia");
            }
            if(fecha_fin === ''){
                errores[1] = "fecha fin vacia";
               // throw new Error("fecha fin vacia");
            }
            if(hora_inicio === '0'){
                errores[2] = "hora inicio vacia";
               // throw new Error("hora inicio vacia");
            }
            if(hora_fin === '0'){
                errores[3] = "hora fin vacia";
               // throw new Error("hora fin vacia");
            }

            if(hora_inicio === '0' || hora_fin === '0' || fecha_fin === '' || fecha_inicio === ''){
                    alert("introduce la hora entera");
            }else{
                var x = fechaInicio.split("/");
                var z = fechaFin.split("/");
                //parsear las fechas a formato americano y comparar
                fechaInicio = x[1] + "/" + x[0] + "/" + x[2];
                //alert(x[1] + "/" + x[0] + "/" + x[2]);
                fechaFin = z[1] + "/" + z[0] + "/" + z[2];
                //console.log(fechaInicio+'  '+fechaFin);
                if (Date.parse(fechaInicio) <= Date.parse(fechaFin)){
                 //alert("fecha ok");
                  // esto funciona bien!
                  //$('#formularioReservar').submit();
                }else{
                    errores[4] = "Error fatal que te cagas";
                    alert("El valor final no puede ser menor al iniciar");  
                }
                if(errores.length > 0){
                   // console.log(errores);
                    document.getElementById("fechaInicio").style.border='solid 2px red';
                    document.getElementById("fechaFin").style.border='solid 2px red';
                    $('#btnEnviarFormRecurso').hide();
                    alert("revisa los errores");

                }else{
                    $.ajax({
                        data: {fecha_inicio, fecha_fin, hora_inicio, hora_fin, id_recurso},
                        url: 'reservaControllerAJAX.php',
                        type: 'POST',
                        beforeSend: function(){
                            console.log(fecha_inicio, fecha_fin, hora_inicio, hora_fin, id_recurso);
                        },
                        success: function (response){
                            console.log(response);
                            //alert(response);
                            if(response === '0'){
                                 console.log("todo bien");
                                document.getElementById("fechaInicio").style.border='solid 2px green';
                                document.getElementById("fechaFin").style.border='solid 2px green';
                                 $('#btnEnviarFormRecurso').show();
                            } 
                            if(response === '1'){
                                //alert("Error en la fecha de inicio");
                                 console.log("Error en la fecha de inicio");
                                 document.getElementById("fechaInicio").style.border='solid 2px red';
                                 alert("Error en la fecha de inicio");
                            }
                            if(response === '2'){
                                console.log("Error en la fecha de Devolucion");
                                document.getElementById("fechaFin").style.border='solid 2px red';
                                alert("Error en la fecha de Devolucion");
                            }
                            if(response === '12'){
                                console.log("Ambas fechas estan mal");
                                document.getElementById("fechaInicio").style.border='solid 2px red';
                                document.getElementById("fechaFin").style.border='solid 2px red';
                                window.scrollTo(0,document.body.scrollHeight);
                                alert("Ambas fechas están mal: por favor comprueba la tabla para ver las fechas disponibles");
                            }

                        }
                    });
                }
            }
        });     
    });
 
</script>

