<?php
include "modelo/conexion.php";

// Registro de inventario
if (isset($_POST["btnregistrar"])) {
    if (!empty($_POST["id"]) && !empty($_POST["apartado"]) && !empty($_POST["activos"]) 
    && !empty($_POST["unidades"]) && !empty($_POST["marca"]) && !empty($_POST["modelo"]) 
    && !empty($_POST["No_Serie"]) && !empty($_POST["No_Inventario"]) && !empty($_POST["Mantenimiento"])) {

        $id = $_POST["id"];
        $apartado = $_POST["apartado"];
        $activos = $_POST["activos"];
        $unidades = $_POST["unidades"];
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $noSerie = $_POST["No_Serie"];
        $noInventario = $_POST["No_Inventario"];
        $mantenimiento = $_POST["Mantenimiento"];

        $sql = $conexion->query("INSERT INTO invent (id, apartado, activos, unidades, marca, modelo, No_Serie, No_Inventario, Mantenimiento) 
        VALUES ('$id','$apartado','$activos','$unidades','$marca','$modelo','$noSerie','$noInventario','$mantenimiento')");

        if ($sql) {
            echo "<div class='alert alert-success text-center mt-3'>Registro exitoso</div>";
        } else {
            echo "<div class='alert alert-danger text-center mt-3'>Error al registrar: " . $conexion->error . "</div>";
        }

    } else {
        echo "<div class='alert alert-warning text-center mt-3'>Por favor, complete todos los campos</div>";
    }
}

$productos = $conexion->query("SELECT * FROM invent");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="container mt-4">

    <!-- Logo empresa -->
    <img src="img/logo_empresa.png" alt="Logo Empresa" class="logo">

    <h2 class="mb-3">Registro de Inventario</h2>
    <form method="POST" action="">
        <div class="row mb-2">
            <div class="col"><input type="text" class="form-control" name="id" placeholder="ID"></div>
            <div class="col"><input type="text" class="form-control" name="apartado" placeholder="Apartado"></div>
            <div class="col"><input type="text" class="form-control" name="activos" placeholder="Activos"></div>
        </div>
        <div class="row mb-2">
            <div class="col"><input type="text" class="form-control" name="unidades" placeholder="Unidades"></div>
            <div class="col"><input type="text" class="form-control" name="marca" placeholder="Marca"></div>
            <div class="col"><input type="text" class="form-control" name="modelo" placeholder="Modelo"></div>
        </div>
        <div class="row mb-2">
            <div class="col"><input type="text" class="form-control" name="No_Serie" placeholder="No_Serie"></div>
            <div class="col"><input type="text" class="form-control" name="No_Inventario" placeholder="No_Inventario"></div>
            <div class="col"><input type="text" class="form-control" name="Mantenimiento" placeholder="Mantenimiento"></div>
        </div>
        <button type="submit" name="btnregistrar" class="btn btn-primary">Registrar</button>
    </form>

    <!-- Botón para generar reporte -->
    <a href="reporte.php" class="btn btn-info mt-3">Generar Reporte PDF</a>

    <!-- Buscador dinámico -->
    <h2 class="mt-4">Buscar en Inventario</h2>
    <input type="text" id="buscador" class="form-control" placeholder="Buscar por ID, activos, modelo...">
    <div id="resultados" class="list-group mt-2"></div>

    <!-- Lista de inventario -->
    <h2 class="mt-4">Lista de Inventario</h2>
    <div class="table-container">
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>ID</th><th>Apartado</th><th>Activos</th><th>Unidades</th>
                    <th>Marca</th><th>Modelo</th><th>No_Serie</th><th>No_Inventario</th><th>Mantenimiento</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $productos->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['apartado']; ?></td>
                    <td><?php echo $row['activos']; ?></td>
                    <td><?php echo $row['unidades']; ?></td>
                    <td><?php echo $row['marca']; ?></td>
                    <td><?php echo $row['modelo']; ?></td>
                    <td><?php echo $row['No_Serie']; ?></td>
                    <td><?php echo $row['No_Inventario']; ?></td>
                    <td><?php echo $row['Mantenimiento']; ?></td>
                    <td>
                        <a href="modificar_producto.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Modificar</a>
                        <a href="eliminar_producto.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"
                           onclick="return confirm('¿Seguro que deseas eliminar este producto?');">Eliminar</a>
                        
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Script AJAX buscador -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#buscador").keyup(function(){
            var consulta = $(this).val();
            if(consulta != ""){
                $.ajax({
                    url: "buscar.php",
                    method: "POST",
                    data: {query: consulta},
                    success: function(data){
                        $("#resultados").html(data);
                    }
                });
            } else {
                $("#resultados").html("");
            }
        });
    });
    </script>
</body>
</html>
