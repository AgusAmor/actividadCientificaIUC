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
                    <th>Investigador</th>
                    <th>Objetivo</th>
                    <th>Fecha estimada de finalización</th>
                    <th>Estado</th>
                    <th colspan=4>Acciones</th>
                </tr>
                <tr>
                    <?php
                    $consulta ="SELECT * FROM investigacion";
                    $resultado = mysqli_query($con, $consulta);
                    while ($fila = mysqli_fetch_array($resultado)){
                        echo "
                        <td>$fila[servicio]</td>
                        <td>$fila[nombre]</td>
                        <td>$fila[investigador]</td>
                        <td>$fila[objetivo]</td>
                        <td>$fila[fechaFin]</td>
                        <td>$fila[estado]</td>";
                        if ($fila['estado'] == "Ingresado"){
                            echo "<td><a href=cambioEstado.php?id=$fila[id]&accion=1&investigador=$_SESSION[id]>Iniciar</a></td>";
                        }else if ($fila['estado'] == "Ejecucion"){
                            echo "<td><a href=cambioEstado.php?id=$fila[id]&accion=2&investigador=$_SESSION[id]>Enviar</a></td>";
                        }else if ($fila['estado'] == "Enviado"){
                            echo "<td><a href=cambioEstado.php?id=$fila[id]&accion=3&investigador=$_SESSION[id]>Revision</a></td>";
                        }else if ($fila['estado'] == "Revision"){
                            echo "<td><a href=cambioEstado.php?id=$fila[id]&accion=4&investigador=$_SESSION[id]>Publicar</a></td>";
                        }
                        if ($fila['estado'] != "Cancelado"){
                            if ($fila['estado'] == "Publicado"){
                                echo "<td><a href=trazabilidad.php?id=$fila[id]>Ver trazabilidad</a></td>";

                            }else{
                                echo "
                                <td><a href=cambioEstado.php?id=$fila[id]&accion=5&investigador=$_SESSION[id]>Cancelar</a></td>
                                <td><a href=modInvestigacion.php?id=$fila[id]&investigador=$_SESSION[id]>Editar</a></td>
                                ";
                            }
                        }else if ($fila['estado'] == "Cancelado"){
                            echo "<td><a href=trazabilidad.php?id=$fila[id]>Ver trazabilidad</a></td>";
                            echo "<td><a href=cambioEstado.php?id=$fila[id]&accion=6&investigador=$_SESSION[id]>Activar</a></td>"; 
                        }
                        if ($fila['estado'] == "Ejecucion"){
                            echo "<td><a href=cargarArchivo.php?id=$fila[id]&investigador=$_SESSION[id]>Subir Archivo</a></td>";
                        }
                        echo "</tr>";
                    }
                    ?>
            </table>
            <div>
                <?php
                echo "<a href=nuevaActividad.php?investigador=$_SESSION[nombre]>Registrar actividad</a>";
                ?>
            </div>
        </section>
    <?php
    include_once ("archivos/footer.php");
    ?>