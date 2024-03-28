<?php
include('conexion.php');

$datosJSON = file_get_contents('php://input');
$datos = json_decode($datosJSON, true);
$fechaActual = date("Y-m-d H:i:s");

foreach ($datos as $item) {
    $numeroFactura = $item['numeroFactura'];
    $detalle = $item['detalle'];
    $cantidad = $item['cantidad'];
    $precioCompra = $item['precioUnitario'];
    $precioVenta = $item['precioVenta'];
    $total = $item['total'];
    $detalep = explode('-', $detalle);
    $detalleProd =  $item['detalle'];
    $factura =  $item['facturar'];;
    $sql = "INSERT INTO fac_detalles
                                    (numero_factura,
                                    detalle,
                                    cantidad,
                                    precio_compra,
                                    precio_venta,
                                    factura
                                    )
                                    VALUES ('$numeroFactura',
                                    ' $detalleProd',
                                    '$cantidad',
                                    '$precioCompra',
                                    '$precioVenta',
                                    '$factura'
                                    )";
    mysqli_query($conn, $sql);

    actualizarInventario($detalleProd,$precioVenta,$cantidad,$factura,$conn);

}

$sql = "INSERT INTO facturas
                                  (numero_factura,fecha,total)
                                     VALUES 
                                    ('$numeroFactura','$fechaActual','$total')";
        if (mysqli_query($conn, $sql)) {
            print "Venta exitosa";
        } else {
            print "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

//


    function actualizarInventario($detalleProd,$precioVenta,$cantidadCompra,$factura,$conn) 
    {
       $sql = "SELECT i.cantidad as cantidad, p.id as idp from tb_producto p, tb_inventario i

       where 
       p.id =i.idProducto
       and p.nombre_producto = '$detalleProd'
       and i.precio_venta = $precioVenta ";

        if ($result = mysqli_query($conn, $sql)) 
        {
        while ($row = mysqli_fetch_row($result)) 
        {
            $idProducto = $row[1];
            $cantidadInveentario = $row[0];
        }
        }  
        
        $cantidadActual = $cantidadInveentario-$cantidadCompra;

        $updateInventario = "UPDATE tb_inventario set cantidad = $cantidadActual 
                            where idProducto = $idProducto and id_factura='$factura' and precio_venta = $precioVenta";
        mysqli_query($conn, $updateInventario);


    }
function validarFactura($conn, $numeroFactura)
{
    $sql = "SELECT numero_factura FROM facturas WHERE numero_factura='$numeroFactura'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

mysqli_close($conn);
