<?php
require_once("conexion/conexion.php");
if (isset($_POST['investigacion'])){
    $inv = $_POST['investigacion'];
}
if (isset($_POST['investigador'])){
    $indr = $_POST['investigador'];
}

if (!empty($_POST['nom'])){
    $nom = $_POST['nom'];
    $extension = pathinfo($_FILES['arch']['name'], PATHINFO_EXTENSION);
    $archivo = "archivos/subidos/" . $inv . "-" . $indr . "-" . $nom . "." . $extension;

}elseif (!empty($_FILES['arch']['name'])) {
    $nom = pathinfo($_FILES['arch']['name'], PATHINFO_FILENAME);
    $archivo = "archivos/subidos/" . $inv . "-" . $indr . "-" . $_FILES['arch']['name'];

}

move_uploaded_file($_FILES ['arch']['tmp_name'], $archivo);

    $consulta = "INSERT INTO documentacion SET nombre = '$nom', ruta = '$archivo', idInvestigacion = '$inv', idInvestigador = '$indr'";
    $resultado = mysqli_query($con, $consulta);

if ($resultado){
    header("Location: index.php?archivo=cargado");
}
?>