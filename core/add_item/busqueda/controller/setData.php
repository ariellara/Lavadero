
<?php
include('..\..\core\conexion.php');
  $tipo = $_GET['tipo'];
  
  $datos = array();
  if($tipo == 1)
     {
      $senal = 1;
      $sql = "SELECT id, nombre_dependencia FROM  tb_dependencia";
     }
  if($tipo == 2)
      { 
        $senal = 2;
        $tipo_e = $_GET['tipo_dep'] ;
        $sql = "SELECT id, nombre_area FROM  tb_area where Id_dependencia = $tipo_e";
      }

      if ($tipo == 3)
      {
        $senal = 2;
        $tipo_e = $_GET['tipo_area'] ;
        $sql = "SELECT id, nombre_subarea FROM  tb_subarea where id_area = $tipo_e";

      }

      if ($tipo == 4)
      {
        $senal = 3;
        $tipo_e = $_GET['tipo_subarea'] ;
        $sql = "SELECT Id, nombre_documento FROM  t_documento where id_subarea = $tipo_e";

      }
      if($tipo == 5)
      {
        $senal =4;
        $sql = "SELECT cod_usuario, nombre from tb_usuarios where estado = 1";

      }
      if($tipo == 9)
      {
        $senal = 5;
        $sql = "SELECT id, nombre_area FROM  tb_area";
      }
      if($tipo  == 10)  
      {
        $senal = 5;
        $sql = "SELECT cod_usuario, nombre FROM  tb_usuarios";
      }
   
    if ($result = mysqli_query($conn, $sql)) 
       {
          while ($row = mysqli_fetch_row($result)) 
          {
            $opcion = array(
                "valor" => $row[0],
                "texto" => $row[1],
                "tipo" => $senal
            );
            $datos[] = $opcion;
          }
         
        }  
        header('Content-Type: application/json');
        $jsonData = json_encode($datos);
        echo $jsonData;

?>