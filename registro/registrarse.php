<?php
require_once("../conexion/conexion.php");
$title = "Inicio de sesión";
include_once("../archivos/header.php");
?>
<section>
    <form action="" method="post" id="registrarse_form">
        <fieldset>
            <legend>Registrarse</legend>
            <div>
                <label for="mail">Correo electrónico</label>
                <input id="mail" name="mail" type="email"/>
            </div>
            <div>
                <label for="pass">Contraseña</label>
                <input id="pass" name="pass" type="password"/>
            </div>
            <div>
                <label for="pass2">Confirmar contraseña</label>
                <input id="pass2" name="pass2" type="password"/>
            </div>
            <input type="submit" id="registrarse_btn" value="Registrarse"/>
        </fieldset>
    </form>
</section>
<?php
include_once ("../archivos/footer.php");
?>