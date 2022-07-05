<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
</head>
<body>
  <main class="container">
    <div class="row">
        <div class="col-12 text-center py-5">
            <h1>Gestor de tareas</h1>
            <div class="row">
              <div class="col-6">
                <form action="" method="post">

<div>
    <label for="">Asunto</label>
    <input type="text" name="txtAsunto" id="txtAsunto" class="form-control">
</div>
<div>
    <label for="">Prioridad</label>
    <select name="lstPrioridad" id="lstPrioridad" class="form-control"><!--lst porque son listas desplegables-->
    <option value="lstPrioridad" disabled selected>Seleccionar</option>
     
    <option value="Alta">Alta</option>
    <option value="Media">Media</option>
    <option value="Baja">Baja</option>
    </select>
</div>
<div>
    <label for="lstUsuario">Usuario</label>
    <select name="lstUsuario" id="lstUusario"class="form-control"> <!--el form-control es para que tenga los estilos de boostrap-->
    <option value="" disabled selected>Seleccionar</option>
        <option value="Sol">Sol</option>
        <option value="joaquin">Joaquin</option>
        <option value="Melisa">Melisa</option>
    </select> </div>
<div>
    <label for="txtDescripcion">Descripcion</label>
    <textarea name="txtDescripcion" id="txtDescripcion"class="form-control"></textarea>
</div>
<div></div>
<button type="submit" id="btnEnviar" name="btnEnviar">Enviar</button>
                </form>
              </div>

            </div>
        </div>
    </div>
        <div class="col-6">
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Asunto</th>
                    <th>Prioridad</th>
                    <th>Usuario</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    
  </main>
</body>
</html>