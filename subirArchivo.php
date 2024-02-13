<?php
require_once("conexion/conexion.php");
if (isset($_POST['investigacion'])){
    $inv = $_POST['investigacion'];
}
if (isset($_POST['investigador'])){
    $indr = $_POST['investigador'];
}
var_dump($inv);
if (!empty($_FILES['arch']['name'])) {
    $archivo = "archivos/subidos/" . $inv . "-" . $indr . "-" . $_FILES['arch']['name'];
    move_uploaded_file($_FILES ['arch']['tmp_name'], $archivo);

    $consulta = "INSERT INTO documentacion SET ruta = '$archivo', idInvestigacion = '$inv', idInvestigador = '$indr'";
    $resultado = mysqli_query($con, $consulta);
}

if ($resultado){
    header("Location: index.php?archivo=cargado");
}


?>