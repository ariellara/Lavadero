<?php
include ('conexion.php');
$tipo = $_GET['tipo'];

$datos = array();
if ($tipo == 1) {

    $datos = array();
    $nombre = $_GET['nombre'];
    $sql = "SELECT 
                  pr.nombre_producto,
                  ip.cantidad,
                  ip.precio_compra,
                  ip.precio_venta,
                  ip.id_factura,
                  ip.cantidad_inicial

                   from tb_producto pr, tb_inventario ip
                   where pr.nombre_producto like '%$nombre%'
                    
                  
                   and pr.id = ip.idProducto";
}
if ($tipo == 2) {

    $datos = array();
    $nombre = $_GET['factura'];
    $sql = "SELECT 
                  pr.nombre_producto,
                  ip.cantidad,
                  ip.precio_compra,
                  ip.precio_venta,
                  ip.id_factura
                  ip.cantidad_inicial

                   from tb_producto pr, tb_inventario ip
                   where ip.id_factura  =$nombre
               
                  
                   and pr.id = ip.idProducto";
}

if ($tipo == 3) {

    include ('conexion.php');
    $nombre = $_GET['id'];
    $factura = $_GET['factura'];
    $id = retornarid($nombre, $conn);
    $sql = "DELETE FROM tb_inventario WHERE idProducto = '$id' and id_factura = '$factura'";
    mysqli_query($conn, $sql);
    header('Location: ../add_item/search.html'); 
    exit();
     
}



if ($result = mysqli_query($conn, $sql)) {
    while ($row = mysqli_fetch_row($result)) {
        $opcion = array(

            "nombre" => $row[0],
            "cantidad" => $row[1],
            "precio_compra" => $row[2],
            "precio_venta" => $row[3],
            "factura" => $row[4],
            "cantidadInicial" => $row[5]
        );
        $datos[] = $opcion;
    }

}
header('Content-Type: application/json');
$jsonData = json_encode($datos);
echo $jsonData;



function retornarid($nombre, $conn)
{

    $sql = "SELECT id from tb_producto where nombre_producto = '$nombre'";

    $id = "";
    if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_row($result)) {
            $id = $row[0];
        }
    }

  return $id;

}

?>