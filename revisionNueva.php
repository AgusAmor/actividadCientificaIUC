<?php
require_once("conexion/conexion.php");

if (isset($_GET['serv'])){
    $serv = $_GET['serv'];
}
if (isset($_GET['nom'])){
    $nom = $_GET['nom'];
}
if (isset($_GET['invs'])){
    $invs = $_GET['invs'];
}
if (isset($_GET['obj'])){
    $obj = $_GET['obj'];
}
if (isset($_GET['alta'])){
    $alta = $_GET['alta'];
}
if (isset($_GET['finEst'])){
    $finEst = $_GET['finEst'];
}

$consulta = "INSERT INTO investigacion SET servicio = '$serv', nombre = '$nom', investigadores = '$invs', objetivo = '$obj', fechaInicio = '$alta', fechaFin = '$finEst', estado = 'Ingresado'";
$resultado = mysqli_query($con, $consulta);
if ($resultado){
    header ("Location: index.php");
}
?>