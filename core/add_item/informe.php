<div class="row">
    <div class="col-2"><label class="label">Ingrese el Periodo a Buscar</label></div><br>
    <div class="col-10">
        <form method="post">
            <label>Fecha Inicial</label>
            <input type="date" name="fechaInicial" required>
            <label>Fecha Final</label>
            <input type="date" name="fechafinal" required>
            <input type="submit" value="Buscar">
        </form>
    </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6">
          <table id="facturasTable" class="table table-striped table-bordered">
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

                  echo "<tr>";
                  echo "<td>" . $fila['numero_factura'] . "</td>";
                  echo "<td>" . $fila['fecha'] . "</td>";
                  echo "<td>" . $fila['total'] . "</td>";
                  echo "</tr>";
                }

              }

              ?>
            </tbody>
          </table>
        </div>
       
      </div>
    </div>
  </div>
</div>



<style>
    /* Estilos para la tabla */
    #facturasTable {
        width: 50%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    #facturasTable th,
    #facturasTable td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    #facturasTable th {
        background-color: #f2f2f2;
    }

    #facturasTable tr:hover {
        background-color: #f5f5f5;
    }

    #facturasTable tr {
        height: 20px;
        /* Ajusta la altura según sea necesario */
    }

    /* Aplicar estilos a las celdas de la tabla */
    #facturasTable td {
        padding: 5px;
        /* Ajusta el relleno interno según sea necesario */
        border: 1px solid #ddd;
        /* Añade un borde para separar las celdas */
    }

    /* Opcional: Estilos adicionales para las celdas de encabezado */
    #facturasTable th {
        background-color: #f2f2f2;
        /* Fondo gris claro para las celdas de encabezado */
    }
</style>