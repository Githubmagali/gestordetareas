<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (file_exists("datos.txt"))
{$strJson=file_get_contents("datos.txt");
$aTareas= json_decode($strJson, true);}
else
{ $aTareas = array();}

if(isset($_GET["id"])) //GET variable de la query string, si viene la def
{$id=$_GET["id"];} //si no la dejo como vacio
else
{$id="";}


if($_POST) //definimos las variables donde van a estar almacenado todos los dato
{$titulo=$_POST["txtTitulo"]; //variable POST O REQUEST
$prioridad=$_POST["lstPrioridad"];
$usuario=$_POST["lstUsuario"];
$estado=$_POST["lstEstado"];
$descripcion=$_POST["txtDescripcion"];

if($id>=0) //id es para editar tareas EDITO SI ELID ES MAYOR O IGUAL QUE0

{$aTareas[$id]=array(
    "fecha"=> $aTareas[$id]["fecha"], //se mantiene la fecha
    "prioridad"=>$prioridad,
    "usuario"=>$usuario,
    "estado"=> $estado,
    "titulo"=>$titulo,
    "descripcion"=>$descripcion);}

else
{$aTareas[]=array(
    "fecha"=> date ("d/m/Y"),
    "prioridad"=>$prioridad,
    "usuario"=>$usuario,
    "estado"=>$estado,
    "titulo"=>$titulo,
    "descripcion"=>$descripcion);}


    $strJson = json_encode($aTareas); //convierte el array en un json
    file_put_contents("datos.txt", $strJson);}//Almacena en  datos.txt el json con file_put_contents

if (isset($_GET["do"])&& $_GET["do"]=="eliminar")
{unset($aTareas[$id]);
$strJson = json_encode($aTareas);
file_put_contents("datos.txt", $strJson);
header("Location: index.php");}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
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
                                <option value=""disabled selected>seleccionar</option> <!--selected es el que nos figura en pantalla-->
                                <option value="Soledad"<?php echo isset ($aTareas[$id])&& $aTareas[$id]["prioridad"]=="Soledad"?"selected":"";?>>Soledad</option>
                                <option value="Mario"<?php echo isset ($aTareas[$id])&& $aTareas[$id]["prioridad"]=="Mario"?"selected":"";?>>Mario</option>
                                <option value="Belen"<?php echo isset ($aTareas[$id])&& $aTareas [$id]["prioridad"]=="Belen"?"selected":"";?>>Belen</option>
                            </select>
                        </div>
                        <div>
                            <label for="lstEstado">Estado</label>
                            <select name="lstEstado" id="lstEstado" class="form-control" required>
                                <option value=""desabled selected>Seleccionar</option>
                                <option value="Sin asignar"<?php echo isset ($aTareas[$id]) && $aTareas[$id]["estado"]=="Sin asignar"?"selected":"";?>>Sin asignar</option>
                                <option value="En proceso"<?php echo isset ($aTareas[$id]) && $aTareas[$id]["estado"]=="En proceso"?"selected":"";?>>En proceso</option>
                                <option value="Asignado"<?php echo isset ($aTareas[$id]) && $aTareas[$id]["estado"]=="Asignado"?"selected":"";?>>Asignado</option>
                                <option value="Terminado"<?php echo isset ($aTareas[$id]) && $aTareas[$id]["estado"]=="Terminado"?"selected":"";?>>Terminado</option>
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
                        <th></th>
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
                                    <a href="?id=<?php echo $pos?>&do=eliminar"class="btn "><i class=" fa-solid fa-trash"></i></a>
                                    <a href="?id=<?php echo $pos?>"> <i class="btn fa-solid fa-pen"> </i></a> </td>
                                </tr>
                                <?php }?>
                        </tbody>
                    </table>
                </div>
        </div>
        <?php else: ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-dark" role="alert">
                       No hay tareas cargadas en el sistema.
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </main>
    


</body>
</html>