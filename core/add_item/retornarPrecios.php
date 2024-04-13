<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lavadero_web_db";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$term = $_GET["detalleFactura"];
$filtros = explode("-", $term);

//$sql = "SELECT   nombre_producto , cat_producto FROM tb_producto WHERE nombre_producto LIKE '%$term%'";

        $sql = "SELECT
                     i.precio_compra AS c,
                     i.precio_venta AS v
                        from tb_producto t, tb_inventario i 
                        where t.id  = i.idProducto
                        and t.nombre_producto = '$filtros[0]'
                        and i.id_factura = '$filtros[1]' ";

$result = $conn->query($sql);

$suggestions = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $precios = array(
            'precioVenta' => $row['v'],
            'precioCompra' => $row['c']
        );
    }
}

// Devolver los precios como JSON
header('Content-Type: application/json');
echo json_encode($precios);