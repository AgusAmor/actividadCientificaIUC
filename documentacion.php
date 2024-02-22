<?php
 require_once("conexion/conexion.php");
 if (isset($_GET['id'])){
     $id = $_GET['id'];
 }
 $title = "Documentación investigacion $id";
 include_once("archivos/header.php");

 $consulta = "SELECT nombre FROM investigacion WHERE id = '$id'";
 $resultado = mysqli_query($con, $consulta);
 $fila = mysqli_fetch_array($resultado);
?>
<section>
    <table>
    <caption>Documentación investigación: <?php echo "$fila[nombre]";?></caption>
        <tr>
            <th>Documento</th>
            <th>Acciones</th>
        </tr>
        <?php
            $consulta = "SELECT * FROM documentacion WHERE idInvestigacion = '$id'";
            $resultado = mysqli_query ($con, $consulta);
            while ($fila = mysqli_fetch_array ($resultado)){
                echo "
                    <tr>
                        <td><a href='$fila[ruta]' download>$fila[nombre]</a></td>
                        <td><a href=eliminarDocumentacion.php?doc=$fila[id]&id=$id>Eliminar</a></td>
                    </tr>
                ";
            }
            ?>
    </table>
    <a href="index.php">Volver</a>
</section>