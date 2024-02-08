<?php
session_start();
require_once("../conexion/conexion.php");

if(isset($_POST['mail']) && isset($_POST['pass'])){
    $email = $_POST['mail'];
    $contra = $_POST['pass'];

    $consulta = "SELECT * FROM investigador WHERE email = '$email' AND contra = MD5('$contra')";
    $resultado = mysqli_query($con, $consulta);
    $fila = mysqli_fetch_array($resultado);

    if($fila == NULL){
        header ("Location: iniciar.php?error=error");
    }else{
        $_SESSION['id'] = $fila['id'];
        $_SESSION['nombre'] = $fila['nombre'];
        $_SESSION['email'] = $fila['email'];
        header ("Location: ../index.php");
    }
}
?>