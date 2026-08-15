<?php
include "modelo/conexion.php";

if(isset($_POST['query'])){
    $busqueda = $conexion->real_escape_string($_POST['query']);
    $sql = $conexion->query("SELECT * FROM invent 
        WHERE id LIKE '%$busqueda%' 
        OR activos LIKE '%$busqueda%' 
        OR modelo LIKE '%$busqueda%' 
        OR marca LIKE '%$busqueda%' 
        OR apartado LIKE '%$busqueda%'");

    if($sql->num_rows > 0){
        while($row = $sql->fetch_assoc()){
            echo "<a href='modificar_producto.php?id=".$row['id']."' class='list-group-item list-group-item-action'>
                    ".$row['id']." - ".$row['activos']." - ".$row['modelo']."
                  </a>";
        }
    } else {
        echo "<p class='list-group-item'>Sin resultados</p>";
    }
}
?>
