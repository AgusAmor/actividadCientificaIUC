<?php
require_once("../conexion/conexion.php");

if(isset($_POST['mail']) && isset($_POST['pass'])){
    $email = $_POST['mail'];
    $contra = $_POST['pass'];

    $consulta = "SELECT * FROM usuario WHERE contra = MD5('$contra')";
    $resultado = mysqli_query($con, $consulta);
    $fila = mysqli_fetch_array($resultado);

    if($fila == NULL){
        echo "usuario o contraseña incorrecto";
    }elseif($fila['contra'] == MD5($contra)){
        $_SESSION = $fila;
        header ("Location: ../index.php");
      }
}
?>