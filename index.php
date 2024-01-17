<?php
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
                <th colspan=3>Acciones</th>
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
                    <td>$fila[estado]</td>";
                    if ($fila['estado'] == "Ingresado"){
                        echo "<td><a href=cambioEstado.php?id=$fila[id]&accion=1>Iniciar</a></td>";
                    }else if ($fila['estado'] == "Ejecucion"){
                        echo "<td><a href=cambioEstado.php?id=$fila[id]&accion=2>Enviar</a></td>";
                    }else if ($fila['estado'] == "Enviado"){
                        echo "<td><a href=cambioEstado.php?id=$fila[id]&accion=3>Revision</a></td>";
                    }else if ($fila['estado'] == "Revision"){
                        echo "<td><a href=cambioEstado.php?id=$fila[id]&accion=4>Publicar</a></td>";
                    }
                    if ($fila['estado'] != "Cancelado"){
                        if ($fila['estado'] == "Publicado"){
                            echo "<td><a href=trazabilidad.php?id=$fila[id] >Ver trazabilidad</a></td>";

                        }else{
                            echo "
                            <td><a href=cambioEstado.php?id=$fila[id]&accion=5>Cancelar</a></td>
                            <td><a href=modInvestigacion.php?id=$fila[id]>Editar</a></td>
                            ";
                        }
                    }else if ($fila['estado'] == "Cancelado"){
                        echo "<td><a href=cambioEstado.php?id=$fila[id]&accion=6>Activar</a></td>"; 
                    }
                    echo "</tr>";
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