<?php
require_once("conexion/conexion.php");

if (isset($_GET['id'])){
    $id = $_GET['id'];
}
?>

<table>
    <caption>Trazabilidad de la Investigación <?php echo"$id";?></caption>
        <tr>
            <th>Estado</th>
            <th>Usuario</th>
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
            <td>$fila2[nombre]</td>
            <td>$tiempo</td>
            </tr>
            ";
        }
        ?>
</table>
<a href="index.php">Volver</a>