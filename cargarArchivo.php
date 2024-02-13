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
    <form action="subirArchivo.php" method="post" enctype=multipart/form-data>
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
        
        <div>
            <label for="nom">Nombre</label>
            <input id="nom" name="nom" type="text"/>
        </div>
        <div>
            <label for="arch">Archivo</label>
            <input id="arch" name="arch" type="file"/>
        </div>
        <input type="submit"/>
        </fieldset>
    </form>
    <a href=index.php >Volver</a>
</section>