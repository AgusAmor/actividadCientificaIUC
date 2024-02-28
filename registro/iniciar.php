<?php
require_once("../conexion/conexion.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css" />
    <title>Iniciar Sesión</title>
</head>
<body>
    <header>
        <img src="../archivos/img/logoIUC.png" alt="logo" />
    </header>
    <section>
        <form id="form_login"action="revisionIniciar.php" method="post">
            <fieldset>
                <legend>Iniciar sesión</legend>
                <div class="campo">
                    <label for="mail">Correo electrónico</label>
                    <input id="mail" name="mail" type="email"/>
                </div>
                <div class="campo">
                    <label for="pass">Contraseña</label>
                    <input id="pass" name="pass" type="password"/>
                </div>
                <?php
                if(isset($_GET['registro'])){
                    echo "<p>Usuario registrado, inicie sesión</p>";
                }
                if(isset($_GET['error'])){
                    echo "<p>Usuario o contraseña incorrectos.</p>";
                }
                ?>
                <div class="btn_container">
                    <a class="btn_form" href="registrarse.php">Registrarse</a>
                    <input class="btn_form" type="submit" value="Inicar sesión"/>
                </div>
            </fieldset>
        </form>
    </section>
<?php
include_once ("../archivos/footer.php");
?>