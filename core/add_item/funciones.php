<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="negocio.js"></script>
<?php

function numeroFactura()
{
  try 
  {
    include('../config/conexion.php');
    $sql = "SELECT numero_factura from facturas ORDER BY numero_factura DESC LIMIT 1";
    if ($result = mysqli_query($conn, $sql)) {

      while ($row = mysqli_fetch_row($result)) {
        return $row[0];
      }

    }
  } catch (Exception $e) {
    print "Error: " . $e->getMessage();
  }

}

function retornaDatos($conn, $id, $tipo)
{
  if ($tipo == 1) {
    $sql = "SELECT cod_dependencia, nombre_dependencia  from tb_dependencia where id =$id ";
    if ($result = mysqli_query($conn, $sql)) {

      while ($row = mysqli_fetch_row($result)) {
        return $row[0] . "-" . $row[1];
      }
    }

  }
  mysqli_close($conn);

}

function retornarNombreCat($id, $conn, $tabla)
{

  switch ($tabla) {
    case 1:
      $sql = "SELECT nombre_categoria from tb_categoria where id_categoria = '$id'";
      break;
    case 2:
      $sql = "SELECT nombre_proveedor from tb_proveedores where id = '$id'";
      break;
  }

  if ($result = mysqli_query($conn, $sql)) {

    while ($row = mysqli_fetch_row($result)) {
      return $row[0];
    }
  }

}

function filasProductos()
{
  include('../config/conexion.php');
  $sql = "SELECT id, codigo_producto,cat_producto,nombre_producto  FROM tb_producto
    ORDER BY nombre_producto asc";

  if ($result = mysqli_query($conn, $sql)) {

    while ($row = mysqli_fetch_row($result)) {

      $nombreCat = retornarNombreCat($row[2], $conn, 1);
      print "<tr>
                 
                  <td field =itemid >$row[1]</td> 
                  <td field =itemid >$row[3]</td>   
                  <td field =itemid >$nombreCat</td>  
                  <td field =itemid align = center>"; ?>

      <a href=<?php print "'edit_producto.php?Id=" . $row[0] . "&cod_cat=" . $row[2] . "&nom_producto=" . $row[3] . "&cod_producto=" . $row[1] . "'"; ?>><img src=icon/editar.png class=icono></a>

      <?php print "</td>

                 <td field =itemid ><a href= # onclick = eliminarDato($row[0],2)> <img src=icon/delete.jfif class=icono ></a></td>      
              </tr></form>
             ";
    }
  } else {
    print "Error";
  }
  mysqli_close($conn);
}

function filasProvedor()
{
  try {
    include('../config/conexion.php');
    $sql = "SELECT id, cod_proveedor, nombre_proveedor, Contacto FROM tb_proveedores
      ORDER BY nombre_proveedor asc";

    if ($result = mysqli_query($conn, $sql)) {

      while ($row = mysqli_fetch_row($result)) {

        print "<tr>
                   
                    <td field =itemid >$row[1]</td> 
                    <td field =itemid >$row[2]</td>    
                    <td field =itemid >$row[3]</td>  
                    <td field =itemid align = center>"; ?>

        <a href=<?php print "'edit_proveedor.php?Id=" . $row[0] . "&cod_cat=" . $row[1] . "&nom_cat=" . $row[2] . "&contacto_proveedor=" . $row[3] . "'"; ?>><img src=icon/editar.png class=icono></a>

        <?php print "</td>

                   <td field =itemid ><a href= # onclick = eliminarDato($row[0],3)> <img src=icon/delete.jfif class=icono ></a></td>      
                </tr></form>
               ";
      }
    } else {
      print "Error";
    }
    mysqli_close($conn);

  } catch (Exception $e) {
    print "Error:" . $e->getMessage();
  }

}

function filasIngreso()
{
  try {
    include('../config/conexion.php');
    $sql = "SELECT id,fecha_ingreso, numero_ingreso, id_proveedor FROM tb_ingreso
      ORDER BY fecha_ingreso DESC";

    if ($result = mysqli_query($conn, $sql)) {

      while ($row = mysqli_fetch_row($result)) {

        $nombreProveedor = retornarNombreCat($row[0], $conn, 2);

        print "<tr>
                   
                    <td field =itemid >$row[0]</td> 
                    <td field =itemid >$row[1]</td>    
                    <td field =itemid >$row[2]</td>  
                    <td field =itemid >$nombreProveedor</td> 
                    <td field =itemid align = center>"; ?>

        <a href=<?php print "'edit_proveedor.php?Id=" . $row[0] . "&cod_cat=" . $row[1] . "&nom_cat=" . $row[2] . "&contacto_proveedor=" . $row[3] . "'"; ?>><img src=icon/editar.png class=icono></a>

        <?php print "</td>

                   <td field =itemid ><a href= # onclick = eliminarDato($row[0],4)> <img src=icon/delete.jfif class=icono ></a></td>      
                </tr></form>
               ";
      }
    } else {
      print "Error";
    }
    mysqli_close($conn);

  } catch (Exception $e) {
    print "Error:" . $e->getMessage();
  }

}
function filasCategoria()
{
  include('../config/conexion.php');
  $sql = "SELECT id_categoria, codigo_categoria, nombre_categoria FROM tb_categoria
      ORDER BY nombre_categoria asc";

  if ($result = mysqli_query($conn, $sql)) {

    while ($row = mysqli_fetch_row($result)) {


      print "<tr>
                   
                    <td field =itemid >$row[1]</td> 
                    <td field =itemid >$row[2]</td>    
                    <td field =itemid align = center>"; ?>

      <a href=<?php print "'edit_categoria.php?Id=" . $row[0] . "&cod_cat=" . $row[1] . "&nom_cat=" . $row[2] . "'"; ?>><img
          src=icon/editar.png class=icono></a>

      <?php print "</td>

                   <td field =itemid ><a href= # onclick = eliminarDato($row[0],1)> <img src=icon/delete.jfif class=icono ></a></td>      
                </tr></form>
               ";
    }
  } else {
    print "Error";
  }
  mysqli_close($conn);

}

function retornaFactura()
{
  try {
    include('../config/conexion.php');

    $sql = "SELECT id, fecha_ingreso, numero_ingreso FROM tb_ingreso ";
    if ($result = mysqli_query($conn, $sql)) {


      while ($row = mysqli_fetch_row($result)) {
        $opcionFactura = $row[2] . "--" . $row[1];
        print "<option value =$row[2] >$opcionFactura</option>";

      }
    }


    mysqli_close($conn);

  } catch (Exception $e) {
    print "Error: " . $e->getMessage();
  }


}

function retornaProductos()
{
  try {
    include('../config/conexion.php');

    $sql = "SELECT id, nombre_producto FROM tb_producto ";
    if ($result = mysqli_query($conn, $sql)) {

      while ($row = mysqli_fetch_row($result)) {

        print "<option value =$row[0] >$row[1]</option>";

      }
    }


    mysqli_close($conn);

  } catch (Exception $e) {
    print "Error: " . $e->getMessage();
  }


}

function retornarProveedores($id_pro)
{
  try {

    include('../config/conexion.php');
    $sql = "SELECT id, nombre_proveedor FROM tb_proveedores ";
    if ($result = mysqli_query($conn, $sql)) {

      while ($row = mysqli_fetch_row($result)) {
        if ($row[0] == $id_dep) {
          print "<option value =$row[0] selected>$row[1]</option>";
        } else {
          print "<option value =$row[0] >$row[1]</option>";
        }
      }
    }
    mysqli_close($conn);
  } catch (Exception $e) {
    print "Error: " . $e->getMessage();
  }

}
function retornarCategorias($id_dep)
{
  include('../config/conexion.php');
  $sql = "SELECT id_categoria, nombre_categoria FROM tb_categoria ";
  if ($result = mysqli_query($conn, $sql)) {

    while ($row = mysqli_fetch_row($result)) {
      if ($row[0] == $id_dep) {
        print "<option value =$row[0] selected>$row[1]</option>";
      } else {
        print "<option value =$row[0] >$row[1]</option>";
      }
    }
  }
  mysqli_close($conn);
}

function retornarAreas($id_area)
{
  include('conexion.php');
  $sql = "SELECT id, nombre_area FROM tb_area  ";
  if ($result = mysqli_query($conn, $sql)) {

    while ($row = mysqli_fetch_row($result)) {
      if ($row[0] == $id_area) {
        print "<option value =$row[0] selected>$row[1]</option>";
      } else {
        print "<option value =$row[0] >$row[1]</option>";
      }
    }
  }
  mysqli_close($conn);

}

function retornarsubAreas($id_subarea)
{
  include('conexion.php');
  $sql = "SELECT id, nombre_subarea FROM tb_subarea  ";
  if ($result = mysqli_query($conn, $sql)) {

    while ($row = mysqli_fetch_row($result)) {
      if ($row[0] == $id_subarea) {
        print "<option value =$row[0] selected>$row[1]</option>";
      } else {
        print "<option value =$row[0] >$row[1]</option>";
      }
    }
  }
  mysqli_close($conn);

}


function filasArea()
{
  include('conexion.php');


  $sql = "SELECT a.id, 
                      a.codigo_area, 
                      a.nombre_area,
                      d.nombre_dependencia,
                      d.id  
        FROM tb_area a, tb_dependencia d
        where a.Id_dependencia = d.id
        ORDER BY a.nombre_area asc";

  if ($result = mysqli_query($conn, $sql)) {

    while ($row = mysqli_fetch_row($result)) {


      print "<tr>
                   
                    <td field =itemid >$row[1]</td> 
                    <td field =Nom >$row[2]</td>  
                    <td field =Dep >$row[3]</td>     
                    <td field =itemid align = center>"; ?>

      <a href=<?php print "'edit_area.php?Id=" . $row[0] . "&cod_a=" . $row[1] . "&nom_a=" . $row[2] . "&id_dep=" . $row[4] . "'"; ?>><img src=icon/editar.png class=icono></a>

      <?php print "</td>

                   <td field =itemid ><a href= # onclick = eliminarDato($row[0],2)> <img src=icon/delete.jfif class=icono ></a></td>      
                </tr></form>
               ";
    }
  } else {
    print "Error";
  }

  mysqli_close($conn);
}

function filasSubArea()
{
  include('conexion.php');


  $sql = "SELECT sar.id,
                    sar.codigo_subarea,
                    sar.nombre_subarea,
                   
                    a.nombre_area,
                    a.id
          
          from  tb_area a, tb_subarea sar
          
          where 
       
          sar.id_area = a.id
        ORDER BY sar.nombre_subarea asc";

  if ($result = mysqli_query($conn, $sql)) {

    while ($row = mysqli_fetch_row($result)) {


      print "<tr>
                   
                    <td field =itemid >$row[1]</td> 
                    <td field =Nom >$row[2]</td>  
                    <td field =Dep >$row[3]</td>     
                    
                    <td field =itemid align = center>"; ?>

      <a href=<?php print "'edit_subarea.php?Id=" . $row[0] . "&cod_a=" . $row[1] . "&nom_a=" . $row[2] . "&id_area=" . $row[4] . "'"; ?>><img src=icon/editar.png class=icono></a>

      <?php print "</td>

                   <td field =itemid ><a href= # onclick = eliminarDato($row[0],3)> <img src=icon/delete.jfif class=icono ></a></td>      
                </tr></form>
               ";
    }
  } else {
    print "Error";
  }

  mysqli_close($conn);
}
function filasDocumentos()
{
  include('conexion.php');


  $sql = "SELECT    
                      t.id,
                      t.codigo_documento,
                      t.nombre_documento,
                      sar.id,
                      sar.nombre_subarea
                     
                from tb_subarea sar, t_documento t
                
                where 
                t.id_subarea = sar.id
                 
              ORDER BY t.codigo_documento asc;";

  if ($result = mysqli_query($conn, $sql)) {

    while ($row = mysqli_fetch_row($result)) {
      print "<tr>
                   
                    <td field =itemid >$row[1]</td> 
                    <td field =Nom >$row[2]</td>   
                    <td field =subArea >$row[4]</td> 
                    <td field =itemid align = center>"; ?>

      <a href=<?php print "'edit_documento.php?Id=" . $row[0] . "&cod_a=" . $row[1] . "&nom_a=" . $row[2] . "&id_subarea=" . $row[3] . "'"; ?>><img src=icon/editar.png class=icono></a>

      <?php print "</td>

                   <td field =itemid ><a href= # onclick = eliminarDato($row[0],4)> <img src=icon/delete.jfif class=icono ></a></td>      
                </tr></form>
               ";
    }
  } else {
    print "Error";
  }

  mysqli_close($conn);
}

function filasUsuario()
{
  include('conexion.php');

  $sql = "SELECT  * from tb_usuarios";
  if ($result = mysqli_query($conn, $sql)) {
    while ($row = mysqli_fetch_row($result)) {
      print "<tr>
                   
                    <td field =itemid >$row[1]</td> 
                    <td field =Nom >$row[2]</td>  
                    <td field =Dep >$row[3]</td>     
                    <td field =Area >";
      devolverEstado($row[4]);
      print "</td>  
                    <td field =itemid align = center>"; ?>

      <a href=<?php print "'edit_usuario.php?Id=" . $row[0] . "&cod_usu=" . $row[1] . "&nom_usu=" . $row[2] . "&contacto=" . $row[3] . "&estado=" . $row[4] . "'"; ?>><img src=icon/editar.png class=icono></a>

      <?php print "</td>

                   <td field =itemid ><a href= # onclick = eliminarDato($row[0],5)> <img src=icon/delete.jfif class=icono ></a></td>      
                </tr></form>
               ";
    }
  }

  mysqli_close($conn);
}

function devolverEstado($estado)
{
  ($estado == 1) ? print "Activo" : print "Inactivo";
}
function estado($estado)
{
  if ($estado == 1) {
    print "<option value= 1 selected>Activo</option>
                  <option value= 0 >Inactivo</option>";
  } else {
    print "<option value= 1 >Activo</option>
          <option value= 0 selected >Inactivo</option>";

  }
}


?>