<?php
 require_once("conexion/conexion.php");
if (isset($_GET['id'])){
    $id = $_GET['id'];
}
?>
<section>
    <ul>
        <?php
        $consulta = "SELECT * FROM documentacion WHERE idInvestigacion = '$id'";
        $resultado = mysqli_query ($con, $consulta);
        while ($fila = mysqli_fetch_array ($resultado)){
            echo "<li><a href='$fila[ruta]' download>$fila[nombre]</a></li>";
        }
        ?>
    </ul>
    <a href="index.php">Volver</a>
</section>