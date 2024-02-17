<?php
require_once("../conexion/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css" />
    <title>Registrarse</title>
</head>
<body>
<section>
    <form action="" method="post" id="registrarse_form">
        <fieldset>
            <legend>Registrarse</legend>
            <div>
                <label for="nom">Nombre</label>
                <input id="nom" name="nom" type="text" required/>
            </div>
            <div>
                <label for="mail">Correo electrónico</label>
                <input id="mail" name="mail" type="email" required/>
            </div>
            <div>
                <label for="pass">Contraseña</label>
                <input id="pass" name="pass" type="password" required/>
            </div>
            <div>
                <label for="pass2">Confirmar contraseña</label>
                <input id="pass2" name="pass2" type="password" required/>
            </div>
            <a href="iniciar.php">Iniciar sesión</a>
            <input type="submit" id="registrarse_btn" value="Registrarse"/>
        </fieldset>
    </form>
</section>
<?php
include_once ("../archivos/footer.php");
?>