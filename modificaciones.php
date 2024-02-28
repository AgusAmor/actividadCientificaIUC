<?php
    require_once("conexion/conexion.php");
    $title = "Modificaciones";
    include_once("archivos/header.php");

    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $consulta = "SELECT * FROM modificacion WHERE idInvestigacion = '$id'";
    $resultado = mysqli_query ($con, $consulta);

    $consulta2 = "SELECT nombre FROM investigacion WHERE id = '$id'";
    $resultado2 = mysqli_query($con, $consulta2);
    $fila2 = mysqli_fetch_array($resultado2);
?>
<section>
    <table id="tabla_mod">
        <caption>Modificaciones investigación: <?php echo "$fila2[nombre]";?></caption>
        <tr>
            <th id="mod">N° modificacion</th>
            <th id="inv">Investigador</th>
            <th id="fch">Fecha</th>
            <th colspan = 4>Cambios realizados</th>
        </tr>
        <tr id=cambios>
            <td></td>
            <td></td>
            <td></td>
                <th id="serv">Servicio</th>
                <th id="nom">Nombre</th>
                <th id="obj">Objetivo</th>
                <th id="fchf">Fecha de fin</th>
            
        </tr>
        <?php
        while ($fila = mysqli_fetch_array ($resultado)){
            echo "
            <tr id=modificados>
                <td>$fila[id]</td>
                <td>$fila[investigador]</td>
                <td>$fila[fecha]</td>
                    <td id=cambios >$fila[servicio]</td>
                    <td id=cambios >$fila[nombre]</td>
                    <td id=cambios >$fila[objetivo]</td>
                    <td id=cambios >$fila[fechaFin]</td>
            </tr>
            ";
        }
        ?>
    </table>
    <a href="index.php">Volver</a>
</section>