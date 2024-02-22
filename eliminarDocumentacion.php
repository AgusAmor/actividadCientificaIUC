<?php
require_once("conexion/conexion.php");
if (isset($_GET['id'])){
    $id = $_GET['id'];
}
if (isset($_GET['doc'])){
    $doc = $_GET['doc'];
}

$consulta = "DELETE FROM documentacion WHERE id = '$doc'";
$resultado = mysqli_query ($con, $consulta);

if ($resultado){
    header ("Location: documentacion.php?id=$id");
}
?>