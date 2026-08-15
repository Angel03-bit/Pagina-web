<?php
include "../modelo/conexion.php";

if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $apartado = $_POST['Apartado'];
    $activos = $_POST['Activos'];
    $unidades = $_POST['Unidades'];
    $marca = $_POST['Marca'];
    $modelo = $_POST['Modelo'];
    $noSerie = $_POST['No_Serie'];
    $noInventario = $_POST['No_Inventario'];
    $mantenimiento = $_POST['Mantenimiento'];

    $sql = "UPDATE invent SET 
        apartado='$apartado',
        activos='$activos',
        unidades='$unidades',
        marca='$marca',
        modelo='$modelo',
        No_Serie='$noSerie',
        No_Inventario='$noInventario',
        Mantenimiento='$mantenimiento'
        WHERE id=$id";

    if ($conexion->query($sql)) {
        echo "<script>
                alert('Producto actualizado correctamente');
                window.location='../index.php';
              </script>";   

    } else {
        echo "Error al actualizar: " . $conexion->error;
    }
} else {
    echo "ID no especificado";
}