<?php
require_once("conexion/conexion.php");

if (isset($_GET['id'])){
    $id = $_GET['id'];
}
?>

<table>
    <caption>Trazabilidad de la Investigación <?php echo"$id";?></caption>
        <tr>
            <th>Fecha Inicio</th>
            <th>Fecha de Fin</th>    
            <th>Usuario</th>
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
            echo "
            <tr>
                <td>$fila[inicio]</td>
                <td>$fila[fin]</td>
                <td>Juan</td>
                <td>$tiempo</td>
            </tr>
            ";
        }
        ?>
</table>
<a href="index.php">Volver</a>