<?php
require_once("conexion/conexion.php");
$title = "Registrar Actividad";
include_once("archivos/header.php");
$investigador = $_GET['investigador'];
?>
<section>
    <form action="revisionNueva.php" method="get">
        <fieldset>
            <legend>Registro de actividad científica</legend>
           <div>
             <div>
                 <label for="serv">Servicio</label>
                 <select name="serv" id="serv">
                     <option value="CG">Cirugia general</option>
                     <option value="ORL">ORL</option>
                     <option value="OyT">OyT</option>
                 </select>
             </div>
             <div>
                 <label for="nom">Título</label>
                 <textarea name="nom" id="nom"></textarea>
             </div>
           </div>
            <div>
                <?php
                echo "<input id=invs name=invs type=hidden value=$investigador />";
                ?>
            </div>
            <div>
                <label for="obj">Objetivos</label>
                <textarea name="obj" id="ojv"></textarea>
            </div>
            <div>
                <label for="finEst">Fecha estimada de finalización</label>
                <input id="finEst" name="finEst" type="date"/>
            </div>
            <div>
                <input type="submit" value="Guardar"/>
                <input type="reset" value="Limpiar"/>
                <a href="index.php">Cancelar</a>
            </div>
        </fieldset>
    </form>
</section>