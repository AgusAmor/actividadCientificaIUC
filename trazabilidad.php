<?php
require_once("conexion/conexion.php");

if (isset($_GET['id'])){
    $id = $_GET['id'];
}

$title = "Trazabilidad inv. N° $id";
include_once("archivos/header.php");

if (isset($_GET['fechaFin'])){
    $finEstimado = $_GET['fechaFin'];
}
if (isset($_GET['estado'])){
    $estado = $_GET['estado'];
}else{
    $estado = NULL;
}

$consulta = "SELECT nombre FROM investigacion WHERE id = '$id'";
$resultado = mysqli_query($con, $consulta);
$fila = mysqli_fetch_array($resultado);
?>

<section>
    <table id="tabla_traz">
        <caption>Investigación <?php echo"$fila[nombre]";?></caption>
            <tr>
                <th>Usuario</th>
                <th>Estado</th>
                <th>Fecha Inicio</th>
                <th>Fecha de Fin</th>    
                <th>Cantidad de dias</th>
            </tr>
            <?php
            $consulta = "SELECT * FROM tiempoEstado WHERE idInvestigacion = '$id'";
            $resultado = mysqli_query($con, $consulta);
            
            while ($fila = mysqli_fetch_array($resultado)){
                $fechaInicio = new DateTime($fila['inicio']);
                $fechaFin = new DateTime($fila['fin']);
                $intervalo = $fechaInicio->diff($fechaFin);
                $tiempo = $intervalo->days;
                
                $consulta2 = "SELECT nombre FROM investigador WHERE id = '$fila[idInvestigador]'";
                $resultado2 = mysqli_query($con, $consulta2);
                $fila2 = mysqli_fetch_array($resultado2);
    
                $consulta3 = "SELECT nombre FROM estado";
                $resultado3 = mysqli_query($con, $consulta3);
                $fila3 = mysqli_fetch_array($resultado3);
    
                echo "
                <tr>
                <td>$fila2[nombre]</td>
                ";
                switch($fila['idEstado']){
                    case 6:
                        echo "<td>Ingresado</td>";
                        break;
                    case 1:
                        echo "<td>Ejecucion</td>";
                        break;
                    case 2:
                        echo "<td>Enviado</td>";
                        break;
                    case 3:
                        echo "<td>Revision</td>";
                        break;
                    case 4:
                        echo "<td>Publicado</td>";
                        break;
                    case 5:
                        echo "<td>Cancelado</td>";
                        break;
                }
                echo "
                <td>$fila[inicio]</td>
                <td>$fila[fin]</td>
                <td>$tiempo</td>
                </tr>
                ";
    
                
            }
            ?>
    </table>
</section>

    <?php
    if ($estado == "Publicado"){
        echo "
        <section>
            <table id=tabla_ffin>
                <tr>
                    <th>Fin Estimado</th>
                    <th>Fin Real</th>
                    <th>Diferencia en dias</th>
                </tr>
                <tr>";
                $consulta = "SELECT * FROM tiempoEstado WHERE idEstado = 4 AND idInvestigacion = '$id'";
                $resultado = mysqli_query ($con, $consulta);
                $fila = mysqli_fetch_array ($resultado);
            
                echo "<td>$finEstimado</td>";
                echo "<td>$fila[inicio]</td>";
            
                $fechaInicio = new DateTime($fila['inicio']);
                $fechaFin = new DateTime($finEstimado);
                $intervalo = $fechaInicio->diff($fechaFin);
                $tiempoFinal = $intervalo->days;
                echo "
                <td>$tiempoFinal</td>
                </tr>
            </table>
        </section>
        ";
    }
    ?>
<div class="boton">
    <a href="index.php">Volver</a>
</div>