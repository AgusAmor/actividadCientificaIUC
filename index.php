<?php
session_start();
if (!isset($_SESSION)){
    header ("Location: registro/iniciar.php");
}
require_once("conexion/conexion.php");
$title = "Bandeja de servicio";
include_once("archivos/header.php");
?>
    <section>
        <table>
            <caption>Bandeja de servicio</caption>
            <tr>
                <th>Servicio</th>
                <th>Titulo</th>
                <th>Investigadores</th>
                <th>Objetivo</th>
                <th>Fecha estimada de finalización</th>
                <th>Estado</th>
                <th colspan=2>Acciones</th>
            </tr>
            <tr>
                <?php
                $consulta ="SELECT * FROM investigacion";
                $resultado = mysqli_query($con, $consulta);
                while ($fila = mysqli_fetch_array($resultado)){
                    echo "
                    <td>$fila[servicio]</td>
                    <td>$fila[nombre]</td>
                    <td>$fila[investigadores]</td>
                    <td>$fila[objetivo]</td>
                    <td>$fila[fechaFin]</td>
                    <td>$fila[estado]</td>
                    <td><a href=cambioEstado.php>Cambiar estado</a></td>
                    <td><a href=modInvestigacion.php?id=$fila[id]>Editar</a></td>
                    </tr>
                    ";
                }
                ?>
        </table>
        <div>
            <a href="nuevaActividad.php">Registrar actividad</a>
        </div>
    </section>
<?php
include_once ("archivos/footer.php");
?>