<?php
include "modelo/conexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = $conexion->query("SELECT * FROM invent WHERE id = $id");
    if ($sql->num_rows > 0) {
        $producto = $sql->fetch_assoc();
    } else {
        echo "Producto no encontrado";
        exit;
    }
} else {
    echo "ID no especificado";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <form class="col-6 p-3 m-auto border rounded" method="POST" action="controlador/actualizar_producto.php">
        <h3 class="text-center text-secondary mb-3">Modificar Datos de Inventario</h3>

        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">

        <div class="mb-2"><label>Apartado</label>
            <input type="text" class="form-control" name="Apartado" value="<?php echo $producto['apartado']; ?>">
        </div>
        <div class="mb-2"><label>Activos</label>
            <input type="text" class="form-control" name="Activos" value="<?php echo $producto['activos']; ?>">
        </div>
        <div class="mb-2"><label>Unidades</label>
            <input type="text" class="form-control" name="Unidades" value="<?php echo $producto['unidades']; ?>">
        </div>
        <div class="mb-2"><label>Marca</label>
            <input type="text" class="form-control" name="Marca" value="<?php echo $producto['marca']; ?>">
        </div>
        <div class="mb-2"><label>Modelo</label>
            <input type="text" class="form-control" name="Modelo" value="<?php echo $producto['modelo']; ?>">
        </div>
        <div class="mb-2"><label>No_Serie</label>
            <input type="text" class="form-control" name="No_Serie" value="<?php echo $producto['No_Serie']; ?>">
        </div>
        <div class="mb-2"><label>No_Inventario</label>
            <input type="text" class="form-control" name="No_Inventario" value="<?php echo $producto['No_Inventario']; ?>">
        </div>
        <div class="mb-2"><label>Mantenimiento</label>
            <input type="text" class="form-control" name="Mantenimiento" value="<?php echo $producto['Mantenimiento']; ?>">
        </div>

        <button type="submit" class="btn btn-success mt-3">Guardar cambios</button>
    </form>
</body>
</html>
