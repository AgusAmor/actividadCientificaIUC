<?php
require_once("conexion/conexion.php");
$title = "Publicar";
include_once("archivos/header.php");

if(isset($_GET['id'])){
$id = $_GET['id'];
}
if(isset($_GET['accion'])){
$accion = $_GET['accion'];
}

echo "
    <form id=form_publi action=cambioEstado.php method=get >
        <fieldset>
            <legend>Publicar investigacion</legend>
        <div>
            <input type=hidden id=id name=id value=$id />
            <input type=hidden id=accion name=accion value=$accion />
            <input type=hidden id=investigador name=investigador value=$_SESSION[id] />
        </div>
        <div>
            <label for=link >Enlace</label>
            <input type=text id=link name=link />
        </div>
        <div>
            <input type=submit class=btn_form />
        </div>
        </fieldset>
    </form>
    <div class=boton>
        <a href=index.php>Volver</a>
    </div>
";
?>
