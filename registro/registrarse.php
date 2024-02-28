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
    <header>
        <img src="../archivos/img/logoIUC.png" alt="logo" />
    </header>
    <section>
        <form action="" method="post" id="registrarse_form">
            <fieldset>
                <legend>Registrarse</legend>
                <div class="campo">
                    <label for="nom">Nombre</label>
                    <input id="nom" name="nom" type="text" required/>
                </div>
                <div class="campo">
                    <label for="mail">Correo electrónico</label>
                    <input id="mail" name="mail" type="email" required/>
                </div>
                <div class="campo">
                    <label for="pass">Contraseña</label>
                    <input id="pass" name="pass" type="password" required/>
                </div>
                <div class="campo">
                    <label for="pass2">Confirmar contraseña</label>
                    <input id="pass2" name="pass2" type="password" required/>
                </div>
               <div class="btn_container">
                    <a class="btn_form" href="iniciar.php">Iniciar sesión</a>
                    <input class="btn_form" type="submit" id="registrarse_btn" value="Registrarse"/>
               </div>
            </fieldset>
        </form>
    </section>
<?php
include_once ("../archivos/footer.php");
?>