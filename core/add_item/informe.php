
    
   <table  align="center">
    <tr><td><label class="label center">Ingrese el Periodo a Buscar</label></td><tr>
   <tr>
    <td>
        <form method="post">
            <label>Fecha Inicial</label>
            <input type="date" name="fechaInicial" required>
            <label>Fecha Final</label>
            <input type="date" name="fechafinal" required>
            <input type="submit" value="Buscar">
        </form>
</td>
</tr>
</table>


<div class="container">
         <table id="facturasTable" class="facturasTable">
            <thead>
              <tr>
                <th>Numero</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Detalles</th>
              </tr>
            </thead>
            <tbody>
              <?php

              if (isset($_POST['fechaInicial'])) {
                $fechaInicial = $_POST['fechaInicial'];
                $fechafinal = $_POST['fechafinal'];

                $mysqli = mysqli_connect("localhost", "root", "", "lavadero_web_db");

                $sql = "SELECT * FROM facturas WHERE fecha >= '$fechaInicial' and fecha <= '$fechafinal'";
                $resultado = mysqli_query($mysqli, $sql);

                while ($fila = mysqli_fetch_assoc($resultado)) {
                    $factura = $fila['numero_factura'] ;
                    $total = number_format($fila['total'], 0, '.', ',');
                  echo "<tr>";
                  echo "<td>" . $fila['numero_factura'] . "</td>";
                  echo "<td>" . $fila['fecha'] . "</td>";
                  echo "<td> $ " . $total . "</td>";
                  echo  "<td><a type=button   data-toggle=modal data-target=#myModal onclick='openModal($factura)'><img src=icon/ver.png width=80 height=25></a>
                  </td>";
                  echo "</tr>";
                }

              }

              ?>
            </tbody>
          </table>
        
        </div>


       
     
<link rel="stylesheet" href="js/bootstrap.min.css">
<link rel="stylesheet" href="js/letras.css">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Detalles </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body" id="modalBody">
               <!-- Contenido del modal -->
           </div>
       </div>
   </div>
</div>

<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/frontend.js"></script>

<style>
  
</style>