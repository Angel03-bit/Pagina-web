<?php
include "modelo/conexion.php";

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
            echo "<script>alert('Registro exitoso'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Error al registrar: " . $conexion->error . "'); window.location='index.php';</script>";
        }

    } else {
        echo "<script>alert('Por favor, complete todos los campos'); window.location='index.php';</script>";
    }
}
?>
