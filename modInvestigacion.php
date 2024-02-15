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
             <div>
                 <label for=nom >Título</label>
                 <textarea name=nom id=nom >$fila[nombre]</textarea>
             </div>
           </div>
            <div>
                <label for=obj >Objetivos</label>
                <textarea name=obj id=ojv >$fila[objetivo]</textarea>
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