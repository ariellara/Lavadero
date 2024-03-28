<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lavadero_web_db";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$term = $_GET["term"];
//$sql = "SELECT   nombre_producto , cat_producto FROM tb_producto WHERE nombre_producto LIKE '%$term%'";

$sql = "SELECT
            p.nombre_producto as n,
            i.id_factura as i,
            i.cantidad as c

            from tb_producto p, tb_inventario i
            where 
            i.idProducto = p.id
            AND i.cantidad > 0
            AND p.nombre_producto  LIKE '%$term%' ";

$result = $conn->query($sql);

$suggestions = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $suggestions[] = $row["n"]."-".$row["i"]."-Cant:".$row["c"];
    }
}
$conn->close();
header('Content-Type: application/json');
echo json_encode($suggestions);

?>