<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tareas</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <main class="container">
     <div class="row">
      <div class="col-12 py-5 text-center">
      <form action="" method="post">
        <div>
            <label for="">Asunto</label>
             <input type="text" name="txtAsunto" id="txtAsunto" class="form-control">       
             </div>
             <div>
                <label for="">Prioridad</label>
                <select name="lstPrioridad" id="lstPrioridad">
                    <option value="Alta"></option>
                    <option value="Media"></option>
                    <option value="Baja"></option>
                </select>
             </div>
             <div class="py-1">
                <label for="">Prioridad</label>
                <select name="lstUsuario" id="lstUsuario" class="form-control">
                    <option value="" disabled selected>Seleccionar</option>
                    <option value="Ivone">Ivone</option>
                    <option value="Ciro">Ciro</option>
                    <option value="Esteban">Esteban</option>
                </select>
             </div>
             <div class="py-1">
                <label for="txtDescripcion">Descripcion</label>
                <textarea name="txtDescripcion" id="txtDescripcion" cols="30" rows="10"></textarea>
             </div>
             <div class="py-1">
                <button type="submit" id="btnEnviar"name="btnEnviar" class="btn btn-primary">Enviar</button>
             </div>
      </form>
      </div>

     </div>
     <div class="row">
        <div class="col-12">
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
                    </tr>
                </tbody>
            </table>
        </div>
     </div>
    </main>
</body>
</html>