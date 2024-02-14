<?php
require_once("conexion/conexion.php");

if ($con){
    $id;
    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $consulta = "SELECT * FROM investigacion WHERE id = '$id'";
    $resultado = mysqli_query($con, $consulta);
    $fila = mysqli_fetch_array($resultado);

    echo "
    <form action=revisionModificacion.php method=get>
        <fieldset>
            <legend>Modificacion de actividad científica</legend>
           <div>
           <input type=hidden id=id name=id value=$fila[id] />
             <div>
                 <label for=serv >Servicio</label>
                 <select name=serv id=serv >
                     <option value=CG >Cirugia general</option>
                     <option value=ORL >ORL</option>
                     <option value=OyT >OyT</option>
                 </select>
             </div>
             <div>
                 <label for=nom >Título</label>
                 <textarea name=nom id=nom >$fila[nombre]</textarea>
             </div>
           </div>
            <div>
                <label for=invs >Investigadores</label>
                <textarea name=invs id=invs >$fila[investigador]</textarea>
            </div>
            <div>
                <label for=obj >Objetivos</label>
                <textarea name=obj id=ojv >$fila[objetivo]</textarea>
            </div>
            <div>
                <label for=alta >Fecha de aprobado</label>
                <input id=alta name=alta type=date value=$fila[fechaInicio] />
            </div>
            <div>
                <label for=finEst >Fecha estimada de finalización</label>
                <input id=finEst name=finEst type=date value=$fila[fechaFin] />
            </div>
            <div>
                <input type=submit value=Guardar />
                <a href=index.php >Cancelar</a>
            </div>
        </fieldset>
    </form>
    ";
}
?>