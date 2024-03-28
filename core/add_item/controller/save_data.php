<?php
include('conexion.php');
 $tipo = $_POST['tipo'];
 $tabla = $_POST['tabla'];
 
 //adiciona Categoria
    if($tipo == 1 and $tabla == 1)
    {
    
        $nombre = $_POST['nombre'];
        $codigo = $_POST['codigo'];
        if(!empty($nombre))
            {

                $sql = "INSERT INTO tb_categoria
                                                    (codigo_categoria,nombre_categoria)
                                                    VALUES 
                                                    ('$codigo','$nombre')";
                if (mysqli_query($conn, $sql)) 
                {
                print "Registro Exitoso";
                } 
                    else 
                    {
                    print "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }     
            }
            else
            {
                print "Ingrese los datos";
            }

    }

    //update categoria
    if($tipo == 2 and $tabla == 1)
    {
      
        $nombre = $_POST['nombre'];
        $id = $_POST['id'];
        $codigo = $_POST['codigo'];
        $sql = "UPDATE tb_categoria  
                                            set codigo_categoria ='$codigo', 
                                            nombre_categoria = '$nombre'
                                            where id_categoria = $id";
                                                    
               if(mysqli_query($conn, $sql)) print "Registro Modificado";


    }

     //adicionar poducto
     if($tipo ==1 and  $tabla ==2)
     { 
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $id_cat = $_POST['id_cat'];

        if(!empty($codigo) || !empty($nombre))
            {
                $sql = "INSERT INTO tb_producto 
                                                (codigo_producto,
                                                nombre_producto,
                                                cat_producto)
                                                VALUES 
                                                (
                                                    '$codigo',
                                                    '$nombre',
                                                    '$id_cat'
                                                )
                                                ";
                    if (mysqli_query($conn, $sql)) 
                    {
                        print "Registro Exitoso";
                    } 
                        else 
                        {
                        print "Error: " . $sql . "<br>" . mysqli_error($conn);
                        } 
                    mysqli_close($conn);                                
                }

            
            else
                    {
                        print "Ingrese los datos";
                    }
     }
     // editar producto
     if($tipo == 2 and  $tabla ==2)
     {
        
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $id_cat = $_POST['id_cat'];
        $id = $_POST['id'];
        
        $sql = "UPDATE tb_producto 
                set codigo_producto ='$codigo', 
                nombre_producto = '$nombre',
                cat_producto = '$id_cat'
                where id = $id";
                        
                if(mysqli_query($conn, $sql)) print "Registro Modificado";
     }

     //adicionar Proveedor
     if($tipo == 1 and  $tabla ==3)
     {
        
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $contacto = $_POST['contacto'];
        if(!empty($codigo) || !empty($nombre))
            {
                $sql = "INSERT INTO tb_proveedores
                                                (cod_proveedor,
                                                nombre_proveedor,
                                                Contacto )
                                                VALUES 
                                                (
                                                    '$codigo',
                                                    '$nombre',
                                                    '$contacto'
                                                )
                                                ";
                    if (mysqli_query($conn, $sql)) 
                    {
                        print "Registro Exitoso";
                    } 
                        else 
                        {
                        print "Error: " . $sql . "<br>" . mysqli_error($conn);
                        } 
                    mysqli_close($conn);                                
                }

            
            else
                    {
                        print "Ingrese los datos";
                    }

     }

     //editar proveedor
     if($tipo == 2 and  $tabla ==3)
     {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $contacto = $_POST['contacto'];
        $id = $_POST['id'];

        $sql = "UPDATE tb_proveedores set cod_proveedor = '$codigo',
                                          nombre_proveedor = '$nombre',
                                          Contacto = '$contacto'
                WHERE id = $id   ";
          if(mysqli_query($conn, $sql)) print "Registro Modificado";        

     }

     //agregar ingreso
     if($tipo == 1 and  $tabla ==4)
     {
        $fecha = $_POST['fecha'];
        $numero = $_POST['numero'];
        $proveedor = $_POST['proveedor'];

        if(!empty($fecha) || !empty($numero))
            {
                $sql = "INSERT INTO tb_ingreso
                                                (fecha_ingreso,
                                                numero_ingreso,
                                                id_proveedor)
                                                VALUES 
                                                (
                                                    '$fecha',
                                                    '$numero',
                                                    '$proveedor'
                                                )
                                                ";
                    if (mysqli_query($conn, $sql)) 
                    {
                        print "Registro Exitoso";
                    } 
                        else 
                        {
                        print "Error: " . $sql . "<br>" . mysqli_error($conn);
                        } 
                    mysqli_close($conn);                                
                }

            
            else
                    {
                        print "Ingrese los datos";
                    }


     }
     //editar ingreso
     if($tipo == 2 and  $tabla ==4)
     {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
    
        $id_subarea = $_POST['id_subarea'];
        $id = $_POST['id'];

        $sql = "UPDATE t_documento set codigo_documento = '$codigo',
                                      nombre_documento = '$nombre',
                                     
                                      id_subarea = '$id_subarea'
                WHERE id = $id   ";
          if(mysqli_query($conn, $sql)) print "Registro Modificado";        
     }
        //agregar inventario
     if($tipo == 1 and  $tabla ==5)
     {
        $idProducto = $_POST['idProducto'];
        $cantidad = $_POST['cantidadProducto'] ;
        $precioCompra = $_POST['precioCompra'];
        $precioVenta = $_POST['precioVenta'];
        $factura = $_POST['idFactura'];

      
        if(!empty($idProducto) || !empty($cantidad))
            {
                $sql = "INSERT INTO tb_inventario
                                                (idProducto,
                                                cantidad,
                                                precio_compra,
                                                precio_venta,
                                                id_factura,
                                                cantidad_inicial)
                                    VALUES ('$idProducto', 
                                            '$cantidad',
                                            '$precioCompra',
                                            '$precioVenta',
                                            '$factura',
                                            '$cantidad')";
                
                if (mysqli_query($conn, $sql)) 
                    {
                        print "Registro Exitoso";
                    } 
                    else 
                    {
                        print "Error: " . $sql . "<br>" . mysqli_error($conn);
                    } 
                    mysqli_close($conn);             
            }
            else
            {
                print "Ingrese Datos";
            }     
     }

     if($tipo == 2 and  $tabla ==5)
     {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $contacto = $_POST['contacto'];
        $id = $_POST['id'];
        $estado = $_POST['estado'];

        $sql = "UPDATE tb_usuarios set
                                    n_identificacion = '$codigo',
                                    nombre = '$nombre',
                                    contacto = '$contacto',
                                    estado = '$estado' 
              WHERE  cod_usuario = $id ";


        if(mysqli_query($conn, $sql)) print "Registro Modificado";               
     }
    
    // mysqli_close($conn);
    
?>
