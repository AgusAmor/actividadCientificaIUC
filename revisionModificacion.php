<?php
require_once("conexion/conexion.php");
if ($con){  
    $id;
    if (isset($_GET['id']) && isset($_GET['serv']) && isset($_GET['nom'])
        && isset($_GET['invs']) && isset($_GET['obj']) && isset($_GET['alta']) && isset($_GET['finEst'])){

        $id = $_GET['id'];
        $serv = $_GET['serv'];
        $nom = $_GET['nom'];
        $invs = $_GET['invs'];
        $obj = $_GET['obj'];
        $alta = $_GET['alta'];
        $finEst = $_GET['finEst'];
    }

    $consulta = "UPDATE investigacion SET servicio = '$serv', nombre = '$nom', investigadores = '$invs', objetivo = '$obj', fechaInicio = '$alta', 
            fechaFin = '$finEst' WHERE id = '$id'";
    $resultado = mysqli_query($con, $consulta);
    if($resultado){
        header ("Location: index.php");
    }
}
?>