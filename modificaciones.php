<?php
    require_once("conexion/conexion.php");
    $title = "Modificaciones";
    include_once("archivos/header.php");

    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $consulta = "SELECT * FROM modificacion WHERE idInvestigacion = '$id'";
    $resultado = mysqli_query ($con, $consulta);
?>
<section>
    <table border=1>
        <legend>Modificaciones investigación N° <?php echo "$id";?></legend>
        <tr>
            <th>N° modificacion</th>
            <th>Investigador</th>
            <th>Fecha</th>
            <th colspan = 4>Cambios realizados</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
                <th>Servicio</th>
                <th>Nombre</th>
                <th>Objetivo</th>
                <th>Fecha de fin</th>
            
        </tr>
        <?php
        while ($fila = mysqli_fetch_array ($resultado)){
            echo "
            <tr>
                <td>$fila[id]</td>
                <td>$fila[investigador]</td>
                <td>$fila[fecha]</td>
                    <td>$fila[servicio]</td>
                    <td>$fila[nombre]</td>
                    <td>$fila[objetivo]</td>
                    <td>$fila[fechaFin]</td>
            </tr>
            ";
        }
        ?>
    </table>
    <a href="index.php">Volver</a>
</section>