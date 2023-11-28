<?php
$origen = "/actividadCientificaIUC";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo"$title";?></title>
</head>
<body>
    <header>
        <?php
        if (isset($_SESSION)){
            echo "<a href=$origen/registro/cerrar.php>Cerrar sesion</a>";
        }
        ?>
        adios
    </header>