<?php
 session_start();
 $_SESSION;
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
if (isset($_GET['finEst'])){
    $finEst = $_GET['finEst'];
}

$consulta = "INSERT INTO investigacion SET 
    servicio = '$serv', 
    nombre = '$nom', 
    investigador = '$invs', 
    objetivo = '$obj', 
    fechaInicio = NOW(), 
    fechaFin = '$finEst', 
    estado = 'Ingresado'";

$resultado = mysqli_query($con, $consulta);

$idInvestigacion = mysqli_insert_id($con);
$consulta2 = "INSERT INTO tiempoEstado SET idEstado = '6', idInvestigacion = '$idInvestigacion', idInvestigador = '$_SESSION[id]', inicio = NOW()";
$resultado2 = mysqli_query($con, $consulta2);

if ($resultado && $resultado2){
    header ("Location: index.php");
}
?>