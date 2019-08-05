<?php

/**
 * Description of queriesMysql
 *
 * @author msi
 */
class queriesMysql { 
    // comprueba el usuario introducido en la base de datos
    public function verificarUser(&$link, $user, $password){
        
        $queryVerficarUser ="
            SELECT
                username,
                password
            FROM
                usuarios
            WHERE
                username = '$user' AND password = '$password' AND habilitado = '1'";
        $validateLogin = mysqli_query($link, $queryVerficarUser);
        $userBD = mysqli_fetch_array($validateLogin);
        //echo$user[0],$user[1];die;  
        if($userBD[0] === $user && $userBD[1] === $password){
            return true;
        }else{
            return false;
        }
        
    }
    // crea nuevo usuario
    public function crearUser(&$link, $user, $password){
        //var_dump($user, $passwd);die;
        $queryCrearUser ="
            INSERT INTO usuarios (username,password, nivel, habilitado)
            VALUES ('$user','$password', 'Invitado', 1)";
        $validateLogin = mysqli_query($link, $queryCrearUser);
        if($validateLogin){
            return true;
        }else{
            return false;
        }
    }
   
    
    //saca el nivel de usuario del usuario logueado
    public function getNivelUsuario(&$link, $usuario){
        $queryGetNivelusuario="
            SELECT nivel FROM usuarios WHERE username = '$usuario'";
        $getNivelUsuario = mysqli_query($link, $queryGetNivelusuario);
        
       //echo $getNivelUsuario;
        if($getNivelUsuario){
            $nivelUsuario = mysqli_fetch_array($getNivelUsuario);
        }else{
            echo "algo falla";die;
        }
        return $nivelUsuario[0];
    }
    
    //mira que no haya otro usuario registrado con el mismo nombre
    public function verificarUsuarioDoble(&$link, $usuario){
        $queryVerificarUsuarioDoble="
            SELECT *
            FROM usuarios
            WHERE username = '$usuario'";
        //echo $queryVerificarUsuarioDoble;die;
        $usuarioDoble = mysqli_query($link, $queryVerificarUsuarioDoble);
        
        if(count(mysqli_fetch_array($usuarioDoble)) > 0){
            //echo "hay resultados";die;
            return false;
        }else{
            //echo "no hay resultados";die;
            return true;
        }
    }
    
    //query que deshabilita al usuario
    public function deshabilitarUsuario(&$link, $usuario, $habilitar){
        $queryDeshabilitarUsuario = "
            UPDATE
                usuarios
            SET
                habilitado = $habilitar
            WHERE
                username = '$usuario'";
        $deshabilitado = mysqli_query($link, $queryDeshabilitarUsuario);
        if($deshabilitado){
            return true;
        }else{
            echo "fallo al deshabilitar";die;
        }
    }
    
    //query que mira si el usuario ya esta deshabilitado y lo habilita y al reves
    public function usuarioDeshabilitado(&$link, $usuario){
        $queryUsuarioDeshabilitado="
            SELECT 
                habilitado
            FROM
                usuarios
            WHERE 
                username = '$usuario'";
        $queryHabilitado = mysqli_query($link, $queryUsuarioDeshabilitado);
        if($queryHabilitado){
            $habilitado = mysqli_fetch_all($queryHabilitado);
        }else{
            echo "la query falla";die;
        }
        if($habilitado[0][0] == 1){
            return true;
        }else{
            return false;
        }
    }
    
       // saca toda la info de los recursos
    public function getInfoRecursos(&$link, $nombre){
        $recurso=[];
        $getInfoRecursos ="
            SELECT * 
            FROM recursos
            WHERE recurso LIKE '$nombre'
            ORDER BY recurso";
        //echo $getInfoRecursos;
        
        $getInfoRecurso = mysqli_query($link,$getInfoRecursos);
        if($getInfoRecurso){
            //var_dump($getInfoRecurso);die;
            while ($row = mysqli_fetch_array($getInfoRecurso)) {
               // echo $recurso;
                array_push($recurso, $row);
            }
            //$infoUsuario = mysqli_fetch_array($getInfoUser);
                       
        }else{
            //echo $getInfoRecursos;
            echo "No se ha podido hacer la query";die;
        }
        //var_dump($recurso);
        return $recurso;
    }
    //saca la info del recurso seleccionado
    public function getInfoRecurso(&$link, $id_recurso){
        $recurso=[];
        $getInfoRecursos ="
            SELECT * 
            FROM recursos
            WHERE id_recurso = $id_recurso
            ORDER BY recurso";
        $getInfoRecurso = mysqli_query($link,$getInfoRecursos);
        if($getInfoRecurso){
            //var_dump($getInfoRecurso);die;
            while ($row = mysqli_fetch_array($getInfoRecurso)) {
               // echo $recurso;
                array_push($recurso, $row);
            }
            //$infoUsuario = mysqli_fetch_array($getInfoUser);
                       
        }else{
            //echo $getInfoRecursos;
            echo "No se ha podido hacer la query";die;
        }
        return $recurso;
    }
    
     // saca toda la info de la reserva del recurso
    public function getInfoReserva(&$link, $id_recurso){
        //Select Nombre, DATE_FORMAT(Fecha_Nacimiento, "%d/%m/%Y") from Persona;    
        $reserva=[];
        $queryGetInfoRecurso ="
        SELECT
            res.id_reserva, 
            res.username,
            res.id_recurso, 
            DATE_FORMAT(res.fecha_reserva, '%d/%m/%Y %H:%i') AS fecha_reserva,
            DATE_FORMAT(res.fecha_devolucion, '%d/%m/%Y %H:%i') AS fecha_devolucion
        FROM 
            reserva res 
        WhERE
            id_recurso = $id_recurso";
        //echo $queryGetInfoRecurso;die;
        $getInfoReserva = mysqli_query($link,$queryGetInfoRecurso);
        if($getInfoReserva){
            //var_dump($getInfoRecurso);die;
            while ($row = mysqli_fetch_array($getInfoReserva)) {
               // echo $recurso;
                array_push($reserva, $row);
            }
            //$infoUsuario = mysqli_fetch_array($getInfoUser);
                       
        }else{
            //echo $getInfoRecursos;
            echo "No se ha podido hacer la query getInfoReserva";die;
        }
       // var_dump($reserva);
        return $reserva;
    }
    
    // crea nueva reserva 
    public function insertReserva(&$link, $usuario, $fechaInicio, $fechaFin, $id_recurso){
        $queryInsertReserva="
            INSERT INTO
                reserva(username, id_recurso, fecha_reserva, fecha_devolucion)
            VALUES(
            '$usuario',
            $id_recurso,
            '$fechaInicio',
            '$fechaFin' )";
        $insertReserva = mysqli_query($link,$queryInsertReserva);
        //return $insertReserva;die;
        if($insertReserva){
            return true;
        }else{
            die("fallo en la query crear");
        }
    }
    
     // saca toda la info para comprobar la disponibilidad
    public function getInfoReservaAJAX(&$link, $id_recurso, $fecha_inicio){
        //echo $id_recurso;
        $queryGetInfoRecurso ="
        SELECT
            res.id_reserva, 
            res.username,
            res.id_recurso, 
            DATE_FORMAT(res.fecha_reserva, '%d/%m/%Y %H:%i') AS fecha_reserva,
            DATE_FORMAT(res.fecha_devolucion, '%d/%m/%Y %H:%i') AS fecha_devolucion
        FROM 
            reserva res 
        WHERE
            id_recurso = $id_recurso 
            AND '$fecha_inicio' >= fecha_reserva
            AND  '$fecha_inicio' < fecha_devolucion" ;
       //echo $queryGetInfoRecurso;die;
        $getInfoReserva = mysqli_query($link,$queryGetInfoRecurso);
       // echo $queryGetInfoRecurso;die;
        //var_dump($getInfoReserva);die;
        if($getInfoReserva){
            $numRows = $getInfoReserva->num_rows;
            //$resultado = mysqli_fetch_array($getInfoReserva);
            if($numRows > 0){
               
                //echo "fecha reservada       ....    ";
                return false;
            }else{
                //echo"fecha disponible        ....    ";
                return true;
            }
        }else{
            //echo $getInfoRecursos;
            echo "No se ha podido hacer la query getInfoReserva";die;
        }
    }
    
  
    //se mira que la fecha de retorno este libre de reservas
    public function verificarFechaFin(&$link, $id_recurso, $fecha_inicio, $fecha_final){
        $queryverificarFechafin ="
        SELECT
            res.id_reserva, 
            res.username,
            res.id_recurso, 
            DATE_FORMAT(res.fecha_reserva, '%d/%m/%Y') AS fecha_reserva,
            DATE_FORMAT(res.fecha_devolucion, '%d/%m/%Y') AS fecha_devolucion
        FROM 
            reserva res 
        WhERE
            id_recurso = $id_recurso 
            AND  fecha_reserva > '$fecha_inicio' 
            AND fecha_reserva < '$fecha_final'
            "; 
       // echo $queryverificarFechafin;die;
        $verificarFechafin = mysqli_query($link,$queryverificarFechafin);
        
        if($verificarFechafin){
            $numrows = $verificarFechafin->num_rows;
            //echo $numrows;
            if($numrows > 0){
                return false;
            }else{
                return true;
            }
        }else{
            //echo $getInfoRecursos;
            echo "No se ha podido hacer la query queryverificarFechafin";die;
        }
    }
    
    //saca el id del usuario con su usuario
    public function getIdUsusario(&$link, $usuario){
        $queryGetIdUsuario="
        SELECT id_usuario
        FROM usuarios
        WHERE username = '$usuario'";
        $getIdUsuario = mysqli_query($link, $queryGetIdUsuario);
        if($getIdUsuario){
            $id_usuario = mysqli_fetch_row($getIdUsuario);
            $id_usuario = $id_usuario[0];
        }              
        return $id_usuario;
    }
    
    //saca toda la informacion de todos los usuarios para el administrador
    public function getInfoUsuarios(&$link){
        $usuario = [];
        $queryGetInfoUsuarios="
        SELECT *
        FROM usuarios";
        $getInfoUsuarios = mysqli_query($link, $queryGetInfoUsuarios);
        if($getInfoUsuarios){
            while ($row = mysqli_fetch_array($getInfoUsuarios)) {
               // echo $recurso;
                array_push($usuario, $row);
            }
        }
        return $usuario;
    }
    
    //query que devuelve solo la info de 1 usuario, mas tarde juntar las dos queryes, ahora no me da tiempo
    public function getInfoUsuario(&$link, $id_usuario){
        $usuario = [];
        $queryGetInfoUsuario="
        SELECT *
        FROM usuarios
        WHERE id_usuario = '$id_usuario'";
        $getInfoUsuarios = mysqli_query($link, $queryGetInfoUsuario);
        if($getInfoUsuarios){
            while ($row = mysqli_fetch_array($getInfoUsuarios)) {
               // echo $recurso;
                array_push($usuario, $row);
            }
        }
        return $usuario;
    }
    
    //query que me da toda la informacion de las reservas de ese usuario
    public function getInfoReservaMiReserva(&$link, $usuario){
        $reserva = [];
        $queryGetInfoReservaMR="
        SELECT *
        FROM reserva
        WHERE username = '$usuario'";
        $getInfoReservaMR = mysqli_query($link, $queryGetInfoReservaMR);
        if($getInfoReservaMR){
            while ($row = mysqli_fetch_array($getInfoReservaMR)) {
               // echo $recurso;
                array_push($reserva, $row);
            }
        }
        return $reserva;
    }
    
    //query para habilitar y deshabilitar
    public function cambiarEstado(&$link, $estado, $id_usuario){
        $queryCambiarEstado="
        UPDATE usuarios
        SET habilitado = '$estado'
        WHERE id_usuario = '$id_usuario'";
        $cambiarEstado = mysqli_query($link, $queryCambiarEstado);
        if($cambiarEstado){
            //die("Usuario Cambiado");
        }else{
            //die("no se ha podido hacer la query");
        }
    }
    
    //modifica a un usuario
    public function modificarUsuario(&$link,$query){
        $modificarUsuario = mysqli_query($link, $query);
        if($modificarUsuario){
            return true;
        }else{
            echo "error al modificar usuario  ".$query;die;
        }
    }
    
    //comprueba si el usuario tiene la contraseña vacia
    public function UsuarioSinPassword(&$link, $usuario){
        $queryBlankPass = "
        SELECT password FROM usuarios WHERE username = '$usuario'";
        $var = mysqli_query($link, $queryBlankPass);
        //var_dump($var);die;
        $blankPass = mysqli_fetch_array($var);
        return $blankPass['password'];
        //echo $blankPass['password'];die;
        
    }
}
