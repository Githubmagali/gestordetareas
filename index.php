<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (file_exists("datos.txt")) //Si el archivo existe cargo los clientes en la variable aTareas
{$strJson= file_get_contents("datos.txt");
$aTareas= json_decode($strJson, true);}//LEE ARCHIVOS, va a almacenar todo el contenido en $strJson$aTareas=json_decode($strJson, true);} //json_decode recibe los parametros y nos devuelve el array que va almacenar en atareas
else
{$aTareas=array();}//Si el archivo no existe es porque no hay clientes, entonces es un array vacio


if
(isset($_GET["id"])) //isset define la variable GET
{$id=$_GET["id"];}//GEt accede a toda la query string
else
{$id="";}//pregunto por una variable que no tiene contenido
if(isset($_GET["do"])&& $_GET["do"]== "eliminar")
    {unset($aTareas[$id]); //unsset elimina variables o posicion de un array
        $strJson= json_encode($aTareas); //almacena en atareas
        file_put_contents ("datos.txt", $strJson);
        header("Location:index.php");}
   

if ($_POST){$titulo= $_POST["txtTitulo"]; $prioridad= $_POST["lstPrioridad"]; $usuario= $_POST["lstUsuario"]; $estado= $_POST["lstEstado"]; $descripcion=$_POST["txtDescripcion"];}
//id para editar tareas
if($id>=0){$aTareas[$id]=array("fecha"=>$aTareas[$id]["fecha"],"prioridad"=>$prioridad, "usuario"=>$usuario, "estado"=>$estado, "titulo"=>$titulo, "descripcion"=>$descripcion);}
else //vacio para hacer tareas
{$aTareas[] =array("fecha"=> date("d/m/Y"), "prioridad"=>$prioridad, "usuario"=>$usuario, "estado"=>$estado,"titulo"=>$titulo,"descripcion"=>$descripcion);}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Gestor de tareas</h1>
            </div>
        </div>
        <div class="row">
            <div class=col-6>
                <form action=""method="post">
                    
                        <div>
                            <label for="lstPrioridad">Prioridad</label>
                            <select name="lstPrioridad" id="lstPrioridad" class="form-control" required>
                                <option value=""desabled selected>Seleccionar</option>
                                <option value="Alta"<?php echo isset($aTareas[$id])&& $aTareas[$id]["prioridad"]=="Alta"? "selected": "";?>>Alta</option>
                                <option value="Media"<?php echo isset ($aTareas[$id])&& $aTareas[$id]["prioridad"]=="Media"? "selected": "";?>>Media</option>
                                <option value="Baja"<?php echo isset ($aTareas[$id])&& $aTareas[$id]["prioridad"]=="Baja"?"selected":"";?>>Baja</option>
                            </select>
                        </div>
                        <div>
                            <label for="lstUsuario">Usuario</label>
                            <select name="lstUsuario" id="lstUsuario"class="form-control" required>
                                <option value=""disabled selected>seleccionar</option>
                                <option value="Soledad"<?php echo isset ($aTareas[$id])&& $aTareas[$id]["prioridad"]=="Soledad"?"selected":"";?>>Soledad</option>
                                <option value="Mario"<?php echo isset ($aTareas [$id])&& $aTareas[$id]["prioridad"]=="Mario"?"selected":"";?>>Mario</option>
                                <option value="Belen"<?php echo isset ($aTareas [$id])&& $aTareas [$id]["prioridad"]=="Belen"?"selected":"";?>>Belen</option>
                            </select>
                        </div>
                        <div>
                            <label for="lstEstado">Estado</label>
                            <select name="lstEstado" id="lstEstado" class="form-control" required>
                                <option value=""desabled selected>Seleccionar</option>
                                <option value="Sin asignar"<?php echo isset ($aTareas[$id])&& $aTareas[$id]["prioridad"]=="Sin asignar"?"selected":"";?>>Sin asignar</option>
                                <option value="En proceso"<?php echo isset ($aTareas[$id])&& $aTareas[$id]["prioridad"]=="En proceso"?"selected":"";?>>En proceso</option>
                                <option value="Asignado"<?php echo isset ($aTareas[$id])&& $aTareas[$id]["prioridad"]=="Asignado"?"selected":"";?>>Asignado</option>
                                <option value="Terminado"<?php echo isset ($aTareas[$id])&& $aTareas[$id]["prioridad"]=="Terminado"?"selected":"";?>>Terminado</option>
                            </select>
                        </div>
                        <div >
                            <label for="txtTitulo">Titulo</label>
                            <input type="text"name="txtTitulo" id="txtTitulo" class="form-control" required value="<?php echo isset($aTareas[$id])?$aTareas[$id]["titulo"]:"";?>">

                        </div>
                        <div>
                            <label for="txtDescripcion">Descripcion</label>
                            <input type="text" name="txtDescripcion" id="txtDescripcion" class="form-control"required value="<?php echo isset($aTareas[$id])?$aTareas[$id]["descripcion"]:"";?>">
                        </div>
                        <div>
                            <button type="submit" id="btnEnviar" name="btnEnviar" class="btn">Enviar</button>
                            <a href="index.php" class="btn">Cancelar</a>
                        </div>
                  
                </form>

            </div>
            <?php if(count($aTareas)): ?>
                <div class="col-6">
                    <table class="table table-hover border">
                        <thead>
                            <tr>
                            <th>ID</th>
                        <th>Fecha de inserción</th>
                        <th>Título</th>
                        <th>Prioridad</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($aTareas as $pos => $tarea){ ?>
                                <tr>
                                    <td><?php echo $pos?></td>
                                    <td><?php echo $tarea["fecha"];?></td>
                                    <td><?php echo $tarea["titulo"];?></td>
                                    <td><?php echo $tarea["prioridad"];?></td>
                                    <td><?php echo $tarea["usuario"];?></td>
                                    <td><?php echo $tarea["estado"];?></td>
                                    <td>
                                        <a href="?id=<?php echo $pos ?>"class="btn"><i class="bi bi-pencil-square"></i></a>
                                        <a href="?id=<?php echo $pos ?>&do=eliminar"class="btn"><i class="bi bi-trash2-fill"></i></a>
                                    </td>
                                </tr>
                                <?php }?>
                        </tbody>
                    </table>
                </div>
        </div>
        <?php else: ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        Aún no se han cargado tareas.
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </main>
    


</body>
</html>