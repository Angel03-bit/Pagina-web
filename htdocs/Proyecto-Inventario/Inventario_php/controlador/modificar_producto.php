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