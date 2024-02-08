<?php
require_once("conexion/conexion.php");

if (isset($_GET['id'])){
    $id = $_GET['id'];
}

if (isset($_GET['investigador'])){
    $investigador = $_GET['investigador'];
}

if (isset($_GET['accion'])){
    $accion = $_GET['accion'];
}

switch($accion){
case 1:
    $consulta = "UPDATE investigacion SET estado = 'Ejecucion' WHERE id = '$id';
                UPDATE tiempoEstado SET fin = NOW() WHERE idInvestigacion = '$id' AND idEstado = '6';
                INSERT INTO tiempoEstado (idEstado, idInvestigacion, idInvestigador, inicio) VALUES ('1', '$id', $investigador, NOW());";
    $resultado = mysqli_multi_query($con, $consulta);

    if ($resultado){
        header ("Location: index.php?estado=update");
    }
    break;

case 2:
    $consulta = "UPDATE investigacion SET estado = 'Enviado' WHERE id = '$id';
                UPDATE tiempoEstado SET fin = NOW() WHERE idInvestigacion = '$id' AND idEstado = '1';
                INSERT INTO tiempoEstado (idEstado, idInvestigacion, idInvestigador, inicio) VALUES ('2', '$id', $investigador, NOW());";
    $resultado = mysqli_multi_query($con, $consulta);
    
    if ($resultado){
        header ("Location: index.php?estado=update");
    }
    break;

case 3:
    $consulta = "UPDATE investigacion SET estado = 'Revision' WHERE id = '$id';
                UPDATE tiempoEstado SET fin = NOW() WHERE idInvestigacion = '$id' AND idEstado = '2';
                INSERT INTO tiempoEstado (idEstado, idInvestigacion, idInvestigador, inicio) VALUES ('3', '$id', $investigador, NOW());";
    $resultado = mysqli_multi_query($con, $consulta);
    
    if ($resultado){
        header ("Location: index.php?estado=update");
    }
    break;

case 4:
    $consulta = "UPDATE investigacion SET estado = 'Publicado' WHERE id = '$id';
                UPDATE tiempoEstado SET fin = NOW() WHERE idInvestigacion = '$id' AND idEstado = '3';
                INSERT INTO tiempoEstado (idEstado, idInvestigacion, idInvestigador, inicio) VALUES ('4', '$id', $investigador, NOW());";
    $resultado = mysqli_multi_query($con, $consulta);
    
    if ($resultado){
        header ("Location: index.php?estado=update");
    }
    break;

case 5:
    $consulta = "UPDATE tiempoEstado SET fin = NOW() WHERE idInvestigacion = '$id' AND fin = '';
                UPDATE investigacion SET estado = 'Cancelado' WHERE id = '$id';
                INSERT INTO tiempoEstado (idEstado, idInvestigacion, idInvestigador, inicio) VALUES ('5', '$id', $investigador, NOW());";
    $resultado = mysqli_multi_query($con, $consulta);
    
    if ($resultado){
        header ("Location: index.php?estado=Cancelado");
    }
    break;

case 6:
    $consulta = "UPDATE investigacion SET estado = 'Ingresado' WHERE id = '$id';
                UPDATE tiempoEstado SET fin = NOW() WHERE idInvestigacion = '$id' AND idEstado = '5';
                INSERT INTO tiempoEstado (idEstado, idInvestigacion, idInvestigador, inicio) VALUES ('6', '$id', $investigador, NOW());";
    $resultado = mysqli_multi_query($con, $consulta);

    if ($resultado){
        header ("Location: index.php?estado=update");
    }
    break;
}
?>