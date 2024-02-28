<?php
require_once("conexion/conexion.php");
$title = "Modificar Actividad";
include_once("archivos/header.php");

if ($con){
    $id;
    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $consulta = "SELECT * FROM investigacion WHERE id = '$id'";
    $resultado = mysqli_query($con, $consulta);
    $fila = mysqli_fetch_array($resultado);

    echo "
    <form id=form_mod action=revisionModificacion.php method=get>
        <fieldset>
            <legend>Modificacion de actividad científica</legend>
            <div>
                <input type=hidden id=id name=id value=$fila[id] />
            </div>
             <div class=campo>
                 <label for=serv >Servicio</label>
                 <select name=serv id=serv >";
                        if ($fila['servicio'] == "CG"){
                            echo "<option value=CG selected>Cirugia general</option>";
                        }else{
                            echo "<option value=CG >Cirugia general</option>";
                        }

                        if ($fila['servicio'] == "ORL"){
                            echo "<option value=ORL selected>ORL</option>";
                        }else{
                            echo "<option value=ORL >ORL</option>";
                        }

                        if ($fila['servicio'] == "OyT"){
                            echo "<option value=OyT selected>OyT</option>";
                        }else{
                            echo "<option value=OyT >OyT</option>";
                        }
                 echo"
                 </select>
             </div>
             <div class=campo>
                 <label for=nom >Título</label>
                 <textarea name=nom id=nom >$fila[nombre]</textarea>
             </div>
            <div class=campo>
                <label for=obj >Objetivos</label>
                <textarea name=obj id=obj >$fila[objetivo]</textarea>
            </div>
            <div class=campo>
                <label for=finEst >Fecha de fin</label>
                <input id=finEst name=finEst type=date value=$fila[fechaFin] />
            </div>
            <div class=btn_container>
                <input class=btn_form type=submit value=Guardar />
                <a class=btn_form href=index.php >Cancelar</a>
            </div>
        </fieldset>
    </form>
    ";
}
?>