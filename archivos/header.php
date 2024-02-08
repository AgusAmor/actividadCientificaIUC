<?php
 session_start();
 $_SESSION;
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
        if($_SESSION != NULL){
            $usuario = $_SESSION['nombre'];
            echo "<p>Usuario: $usuario</p>";
            echo "<a href= registro/cerrar.php>Cerrar sesión</a>";
        }else{
            header ("Location: $origen/registro/iniciar.php");
        }
        ?>
    </header>