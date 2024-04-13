<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lavadero_web_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$parametro = $_GET['parametro'];
$sql = "SELECT detalle , cantidad, precio_compra, precio_venta FROM fac_detalles WHERE numero_factura = '$parametro'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo "0 resultados";
}
$conn->close();
?>