<?php
    include('conexion.php');

    print "# ".$id = $_POST['id'];
    $tipo = $_POST['tipo'];

    switch ($tipo) 
    {
        case  1:
        $sql = "DELETE FROM tb_categoria where id_categoria =$id";
        break;
        case  2:
            $sql = "DELETE FROM tb_producto where id =$id";
            break;

        case 3:
            $sql = "DELETE FROM tb_proveedores WHERE id = $id";    
          break;

        case 4:
            $sql = "DELETE FROM tb_ingreso WHERE id = $id";    
            break;

    }

   /* if($tipo == 1)
    {
      
       
    }
    if($tipo == 2)
    {
        $sql = "DELETE FROM tb_area where id =$id";
    }
    if($tipo ==3)
    {
        $sql = "DELETE FROM tb_subarea where id =$id";
    }
    if($tipo ==4)
    {
        $sql = "DELETE FROM t_documento where id =$id";
    }
    if($tipo ==5)
    {
        $sql = "DELETE FROM tb_usuarios where cod_usuario =$id";
    }
    */
    
     if(mysqli_query($conn, $sql)){ print "Eliminado";}
     else{ print "hello error";}

     mysqli_close($conn);
?>