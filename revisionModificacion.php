<?php
 session_start();
 $_SESSION;
require_once("conexion/conexion.php");
if ($con){  
    $id;
    if (isset($_GET['id']) && isset($_GET['serv']) && isset($_GET['nom'])
        && isset($_GET['obj']) && isset($_GET['finEst'])){

        $id = $_GET['id'];
        $serv = $_GET['serv'];
        $nom = $_GET['nom'];
        $obj = $_GET['obj'];
        $finEst = $_GET['finEst'];
    }

    $consulta = "SELECT servicio, nombre, objetivo, fechaFin FROM investigacion WHERE id = '$id'";
    $resultado = mysqli_query ($con, $consulta);
    $fila = mysqli_fetch_array ($resultado);

    $modificados = array();
    if($fila['servicio'] != $serv){
        $modificados['servicio'] = $serv;
    }else{
        $modificados['servicio'] = NULL;
    }
    
    if($fila['nombre'] != $nom){
        $modificados['nombre'] = $nom;
    }else{
        $modificados['nombre'] = NULL;
    }

    if($fila['objetivo'] != $obj){
        $modificados['objetivo'] = $obj;
    }else{
        $modificados['objetivo'] = NULL;
    }

    if($fila['fechaFin'] != $finEst){
        $modificados['fechaFin'] = $finEst;
    }else{
        $modificados['fechafin'] = NULL;
    }


    $consulta2 = "INSERT INTO modificacion (idInvestigacion, investigador, fecha, " . implode(", ", array_keys($modificados)) . ") 
                    VALUES ('$id', '$_SESSION[nombre]', NOW() , '" . implode("', '", $modificados) . "')";
    $resultado2 = mysqli_query($con, $consulta2);
    
    
    $consulta3 = "UPDATE investigacion SET servicio = '$serv', nombre = '$nom', objetivo = '$obj', fechaFin = '$finEst' WHERE id = '$id'";
    $resultado3 = mysqli_query($con, $consulta3);
    if($resultado3){
        header ("Location: index.php");
    }
}
?>