<?php
require_once("conexion/conexion.php");
$title = "Registrar Actividad";
include_once("archivos/header.php");
?>
<section>
    <form action="revisionNueva.php" method="get">
        <fieldset>
            <legend>Registro de actividad científica</legend>
           <div>
             <div>
                 <label for="serv">Servicio</label>
                 <select name="serv" id="serv">
                     <option value="cg">Cirugia general</option>
                     <option value="orl">ORL</option>
                     <option value="oyt">OyT</option>
                 </select>
             </div>
             <div>
                 <label for="nom">Título</label>
                 <textarea name="nom" id="nom"></textarea>
             </div>
           </div>
            <div>
                <label for="invs">Investigadores</label>
                <textarea name="invs" id="invs"></textarea>
            </div>
            <div>
                <label for="obj">Objetivos</label>
                <textarea name="obj" id="ojv"></textarea>
            </div>
            <div>
                <label for="alta">Fecha de aprobado</label>
                <input id="alta" name="alta" type="date"/>
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