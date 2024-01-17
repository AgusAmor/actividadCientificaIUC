<?php
require_once("conexion/conexion.php");

if (isset($_GET['id'])){
    $id = $_GET['id'];
}

if (isset($_GET['accion'])){
    $accion = $_GET['accion'];
}

if ($accion == 1){
    $consulta = "UPDATE investigacion SET estado = 'Ejecucion' WHERE id = '$id';
                UPDATE tiempoEstado SET fin = NOW() WHERE idInvestigacion = '$id' AND idEstado = '6';
                INSERT INTO tiempoEstado SET idEstado = '1', idInvestigacion = '$id', inicio = NOW()";
    $resultado = mysqli_multi_query($con, $consulta);

    if ($resultado){
        header ("Location: index.php?estado=update");
    }
}

if ($accion == 2){
    $consulta = "UPDATE investigacion SET estado = 'Enviado' WHERE id = '$id';
                UPDATE tiempoEstado SET fin = NOW() WHERE idInvestigacion = '$id' AND idEstado = '1';
                INSERT INTO tiempoEstado SET idEstado = '2', idInvestigacion = '$id', inicio = NOW()";
    $resultado = mysqli_multi_query($con, $consulta);

    if ($resultado){
        header ("Location: index.php?estado=update");
    }
}

if ($accion == 3){
    $consulta = "UPDATE investigacion SET estado = 'Revision' WHERE id = '$id';
                UPDATE tiempoEstado SET fin = NOW() WHERE idInvestigacion = '$id' AND idEstado = '2';
                INSERT INTO tiempoEstado SET idEstado = '3', idInvestigacion = '$id', inicio = NOW()";
    $resultado = mysqli_multi_query($con, $consulta);

    if ($resultado){
        header ("Location: index.php?estado=update");
    }
}

if ($accion == 4){
    $consulta = "UPDATE investigacion SET estado = 'Publicado' WHERE id = '$id';
                UPDATE tiempoEstado SET fin = NOW() WHERE idInvestigacion = '$id' AND idEstado = '3';
                INSERT INTO tiempoEstado SET idEstado = '4', idInvestigacion = '$id', inicio = NOW()";
    $resultado = mysqli_multi_query($con, $consulta);

    if ($resultado){
        header ("Location: index.php?estado=update");
    }
}

if ($accion == 5){
    $consulta = "UPDATE investigacion SET estado = 'Cancelado' WHERE id = '$id';
                INSERT tiempoEstado SET fin = NOW() WHERE idInvestigacion = '$id' AND fin = NULL;
                INSERT INTO tiempoEstado SET idEstado = '5', idInvestigacion = '$id', inicio = NOW()";
    $resultado = mysqli_multi_query($con, $consulta);

    if ($resultado){
        header ("Location: index.php?estado=Cancelado");
    }
}

if ($accion == 6){
    $consulta = "UPDATE investigacion SET estado = 'Ingresado' WHERE id = '$id';
                UPDATE tiempoEstado SET fin = NOW() WHERE idInvestigacion = '$id' AND idEstado = '5';
                UPDATE tiempoEstado SET inicio = NOW(), fin = NULL WHERE idInvestigacion = '$id' AND idEstado = '6'";
    $resultado = mysqli_multi_query($con, $consulta);

    if ($resultado){
        header ("Location: index.php?estado=update");
    }
}
?>