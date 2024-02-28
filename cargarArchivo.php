<?php
require_once("conexion/conexion.php");
$title = "Bandeja de servicio";
include_once("archivos/header.php");

if (isset($_GET['id'])){
    $inv = $_GET['id'];
}
if (isset($_GET['investigador'])){
    $indr = $_GET['investigador'];
}
?>
<section>
    <form id="form_carch" action="subirArchivo.php" method="post" enctype=multipart/form-data>
        <fieldset>
            <?php
                echo "
                <legend>Subir archivo. Investigación N° $inv</legend>
                <div>
                <input type=hidden name=investigador id=investigador value=$indr />
                </div>
                <div>
                <input type=hidden name=investigacion id=investigacion value=$inv />
                </div>
                ";
            ?>
        
        <div class="campo">
            <label for="nom">Nombre</label>
            <input id="nom" name="nom" type="text"/>
        </div>
        <div class="campo">
            <label for="arch">Archivo</label>
            <input id="arch" name="arch" type="file" required/>
        </div>
        <input class="btn_form" type="submit" value="Enviar" />
        </fieldset>
    </form>
    <div class="boton">
        <a href=index.php >Volver</a>
    </div>
</section>