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
    <link rel="stylesheet" href="">
    <?php
        echo "<link rel=stylesheet href=$origen/css/styles.css />";
    ?>
    <title><?php echo"$title";?></title>
</head>
<body>
    <header>
        <?php
            echo "
            <a href=$origen/index.php ><img src=$origen/archivos/img/logoIUC.png alt=logoIUC /></a>
            ";
        ?>
        <div>
            <?php
            if($_SESSION != NULL){
                $usuario = $_SESSION['nombre'];
                echo "<p>Usuario: $usuario</p>";
                echo "<a href= registro/cerrar.php>Cerrar sesión</a>";
            }else{
                header ("Location: $origen/registro/iniciar.php");
            }
            ?>
        </div>
    </header>