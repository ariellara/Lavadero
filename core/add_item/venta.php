<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/styleFactura.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">


  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="facturas.js"></script>
  <script src="css/js/bootstrap-alert.js"></script>
  <style>
    /* Estilos para la tabla */
    #facturasTable {
      width: 100%;
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
    height: 20px; /* Ajusta la altura según sea necesario */
}

/* Aplicar estilos a las celdas de la tabla */
#facturasTable td {
    padding: 5px; /* Ajusta el relleno interno según sea necesario */
    border: 1px solid #ddd; /* Añade un borde para separar las celdas */
}

/* Opcional: Estilos adicionales para las celdas de encabezado */
#facturasTable th {
    background-color: #f2f2f2; /* Fondo gris claro para las celdas de encabezado */
}


  </style>
</head>

<body>

  <div class="contenedor">
    <div>

    </div>
    <div class="columna1">
      <!-- Contenido de la columna izquierda -->
      <p>Ingreso de Detalles a su Factura</p>
      <div id="tablaFacturas">
        <table id="facturasTable">
          <tr>
          <th>Factura</th>
            <th>Detalle</th>
            <th>Cantidad</th>
            <th>P Unit</th>
            <th>P Venta</th>
            <th>P Total</th>
            
          </tr>

        </table>
        <hr>
        <input type="button" value="Facturar" onclick = "facturar()">

      </div>
    </div>
    <div class="columna2">
      <?php
      include('funciones.php');
      $numeroFactura = numeroFactura() + 1;
      ?>
      <div id="search-box">
        <label for="search">Factura:
          <?php print $numeroFactura ?>
        </label>
        <form id="ff" method="post">
          <input type="hidden" id="idFactura" value="<?php echo $numeroFactura ?>">

          <label for="search">Buscar:</label>
          <input type="text" id="search" class="form-control" placeholder="Describa el producto" required>
          <label for="search">Cantidad</label>
          <input type="Number" class="form-control" id="cantidad" style="width: 50px;" required><br>
          <input type=button class="btn btn-primary" value=Agregar onclick="guardarFactura()">
        </form>
      </div>

    </div>
  </div>

</body>

</html>