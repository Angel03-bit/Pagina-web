<?php
include "modelo/conexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM invent WHERE id = $id";

    if ($conexion->query($sql)) {
        echo "<script>
                alert('Producto eliminado correctamente');
                window.location='index.php';
              </script>";
    } else {
        echo "Error al eliminar: " . $conexion->error;
    }
} else {
    echo "ID no especificado.";
}
?>
