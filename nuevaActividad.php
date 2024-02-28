<?php
require_once("conexion/conexion.php");
$title = "Registrar Actividad";
include_once("archivos/header.php");
$investigador = $_GET['investigador'];
?>
<section>
    <form id="form_nact" action="revisionNueva.php" method="get">
        <fieldset>
            <legend>Registro de actividad científica</legend>
            <div class="campo">
                 <label for="serv">Servicio</label>
                 <select name="serv" id="serv" required>
                     <option default>-</option>
                     <option value="CG">Cirugia general</option>
                     <option value="ORL">ORL</option>
                     <option value="OyT">OyT</option>
                 </select>
            </div>
            <div class="campo">
                 <label for="nom">Título</label>
                 <textarea name="nom" id="nom" required></textarea>
            </div>
            <div class="campo">
                <?php
                echo "<input id=invs name=invs type=hidden value=$investigador />";
                ?>
            </div>
            <div class="campo">
                <label for="obj">Objetivos</label>
                <textarea name="obj" id="obj" required></textarea>
            </div>
            <div class="campo">   
                <label for="finEst">Fecha de fin</label>
                <input id="finEst" name="finEst" type="date" required/>
            </div>
            <div class="btn_container">
                <input class="btn_form" type="submit" value="Guardar"/>
                <input class="btn_form" type="reset" value="Limpiar"/>
                <a class="btn_form" href="index.php">Cancelar</a>
            </div>
        </fieldset>
    </form>
</section>