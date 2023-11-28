<?php
require_once("../conexion/conexion.php");
$title = "Inicio de sesión";
include_once("../archivos/header.php");
?>
<section>
    <form action="revisionIniciar.php" method="post">
        <fieldset>
            <legend>Iniciar sesión</legend>
            <div>
                <label for="mail">Correo electrónico</label>
                <input id="mail" name="mail" type="email"/>
            </div>
            <div>
                <label for="pass">Contraseña</label>
                <input id="pass" name="pass" type="password"/>
            </div>
            <?php
            if(isset($_GET['registro'])){
                echo "<p>Usuario registrado, inicie sesión</p>";
            }
            ?>
            <a href="registrarse.php">Registrarse</a>
            <input type="submit" value="Inicar sesión"/>
        </fieldset>
    </form>
</section>
<?php
include_once ("../archivos/footer.php");
?>