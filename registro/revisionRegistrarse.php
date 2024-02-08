<?php
require_once("../conexion/conexion.php");

if(isset($_POST['mail']) && isset($_POST['pass']) && isset($_POST['nom'])){
    $email = $_POST['mail'];
    $contra = $_POST['pass'];
    $nombre = $_POST['nom'];

    $consulta = "INSERT INTO investigador SET nombre = '$nombre', email = '$email', contra = MD5('$contra')";
    $resultado = mysqli_query($con, $consulta);

    if($resultado){
        header ("Location: iniciar.php?registro=true");
    }
}
?>