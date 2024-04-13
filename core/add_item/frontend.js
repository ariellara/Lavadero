function openModal(parametro) {
    $.get(`resultados.php?parametro=${parametro}`, function(response) {
        let data = JSON.parse(response);
        let modalBody = $('#modalBody');
        modalBody.empty(); // Limpiar el contenido actual del modal

        // Verificar si hay algún dato en el array
        let tableHtml = '<table border =1 style="width:450px;"><tr><td style="width:15%;">Cantidad</td><td style="width:35%;">Detalle</td><td style="width:25%;">P Venta</td><td style="width:25%;">Total</td></tr>';
         let totalF = 0;
        if (data.length > 0) {
            // Iterar sobre cada objeto en el array
            data.forEach(function(objeto) {
                // Acceder a la propiedad 'detalle' de cada objeto
                let detalle = objeto.detalle;
                let cantidad = objeto.cantidad;
                let total = objeto.precio_venta * cantidad;
                let pventa = objeto.precio_venta;
                tableHtml += `<tr><td>${cantidad}</td><td>${detalle}</td><td>${pventa.toLocaleString()}</td><td>${total.toLocaleString()}</td></tr>`;
                totalF = totalF + total;
              });
        } else {
            modalBody.append(`<p>No se encontraron datos para mostrar.</p>`);
        }
        tableHtml += `<tr><td></td><td></td><td>Total</td><td>${totalF.toLocaleString()}</td></tr>`;
          
        tableHtml += '</table>';
        modalBody.append(tableHtml);
    });
 }             
 