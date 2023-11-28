<?php
require_once("../conexion/conexion.php");

if(isset($_POST['mail']) && isset($_POST['pass'])){
    $email = $_POST['mail'];
    $contra = $_POST['pass'];

    $consulta = "INSERT INTO usuario SET email = '$email', contra = MD5('$contra')";
    $resultado = mysqli_query($con, $consulta);

    if($resultado){
        header ("Location: iniciar.php?registro=true");
    }
}
?>