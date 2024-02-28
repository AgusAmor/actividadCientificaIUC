    <?php
    require_once("conexion/conexion.php");
    $title = "Bandeja de servicio";
    include_once("archivos/header.php");
    ?>
    
        <section>
            <table id="tabla_servicio">
                <caption>Bandeja de servicio</caption>
                <tr>
                    <th id="servicio">Servicio</th>
                    <th id="tt">Titulo</th>
                    <th id="inv">Investigador</th>
                    <th id="obj">Objetivo</th>
                    <th id="fch">Fin estimado</th>
                    <th id="est">Estado</th>
                    <th id="acc" colspan=5>Acciones</th>
                </tr>
                <tr>
                    <?php
                    $consulta ="SELECT * FROM investigacion";
                    $resultado = mysqli_query($con, $consulta);
                    while ($fila = mysqli_fetch_array($resultado)){
                        echo "
                        <td class=servicio_cent>$fila[servicio]</td>
                        <td>$fila[nombre]</td>
                        <td class=servicio_cent>$fila[investigador]</td>
                        <td>$fila[objetivo]</td>
                        <td class=servicio_cent>$fila[fechaFin]</td>
                        <td class=servicio_cent>$fila[estado]</td>";

                        // CAMBIO DE ESTADO
                        if ($fila['estado'] == "Ingresado"){
                            echo "<td><a href=cambioEstado.php?id=$fila[id]&accion=1&investigador=$_SESSION[id] style=color:cornflowerblue>Iniciar</a></td>";
                        }else if ($fila['estado'] == "Ejecucion"){
                            echo "<td><a href=cambioEstado.php?id=$fila[id]&accion=2&investigador=$_SESSION[id] style=color:lime>Enviar</a></td>";
                        }else if ($fila['estado'] == "Enviado"){
                            echo "<td><a href=cambioEstado.php?id=$fila[id]&accion=3&investigador=$_SESSION[id] style=color:blueviolet>Revision</a></td>";
                        }else if ($fila['estado'] == "Revision"){
                            echo "<td><a href=publicado.php?id=$fila[id]&accion=4&investigador=$_SESSION[id] style=color:orange>Publicar</a></td>";
                        }

                        // ACCIONES
                        if ($fila['estado'] != "Cancelado"){
                            // PUBLICADO
                            if ($fila['estado'] == "Publicado"){
                                if ($fila['enlace'] != NULL){
                                    echo "<td><a href=$fila[enlace] target=blank>Enlace</a></td>";
                                }else{
                                    echo "<td><a href=# >Enlace</a></td>";
                                }
                                echo "
                                <td><a href=trazabilidad.php?id=$fila[id]&fechaFin=$fila[fechaFin]&estado=$fila[estado]>Trazabilidad</a></td>
                                <td><a href=documentacion.php?id=$fila[id]>Documentación</a></td>
                                <td><a href=modificaciones.php?id=$fila[id] >Modificaciones</a></td>
                                ";
                            }else{
                                // EN EJECUCION (subida de archivos)
                                if ($fila['estado'] == "Ejecucion"){
                                    echo "
                                    <td><a href=cargarArchivo.php?id=$fila[id]&investigador=$_SESSION[id]>Subir Archivo</a></td>
                                    <td><a href=documentacion.php?id=$fila[id]>Documentación</a></td>
                                    ";
                                }
                                // TODAS LAS DEMAS
                                echo "
                                <td><a href=cambioEstado.php?id=$fila[id]&accion=5&investigador=$_SESSION[id]&estado=$fila[estado] style=color:red>Cancelar</a></td>
                                <td><a href=modInvestigacion.php?id=$fila[id]&investigador=$_SESSION[id]>Editar</a></td>
                                ";
                            }
                        // CANCELADO
                        }else if ($fila['estado'] == "Cancelado"){
                            echo "
                            <td><a href=trazabilidad.php?id=$fila[id]>Trazabilidad</a></td>
                            <td><a href=documentacion.php?id=$fila[id]>Documentación</a></td>
                            <td><a href=modificaciones.php?id=$fila[id] >Modificaciones</a></td>
                            <td><a href=cambioEstado.php?id=$fila[id]&accion=6&investigador=$_SESSION[id]>Activar</a></td>
                            "; 
                        }
                        echo "</tr>";
                    }
                    ?>
            </table>
            <div class="boton">
                <?php
                echo "<a href=nuevaActividad.php?investigador=$_SESSION[nombre]>Registrar actividad</a>";
                ?>
            </div>
        </section>
    <?php
    include_once ("archivos/footer.php");
    ?>