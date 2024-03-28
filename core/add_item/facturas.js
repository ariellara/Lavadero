// script.js
var filasParaGuardar = [];
async function guardarFactura() {
    var numeroFactura = document.getElementById('idFactura').value;
    var detalleFactura = document.getElementById('search').value;
    let cantidadProducto = document.getElementById('cantidad').value;
    if (numeroFactura.trim() !== '' && detalleFactura.trim() !== '' && cantidadProducto.trim() !== '') {
        let data =
        {
            numeroFactura: numeroFactura

        };
        let datosPrecios = await obtenerPrecios(detalleFactura);
        let total = datosPrecios.precioVenta * cantidadProducto;
        let factura = detalleFactura.split('-')[1];

       // let nuevaFila = '<tr><td>' + detalleFactura.split('-')[0] + '</td><td>' + cantidadProducto + '</td><td>' + datosPrecios.precioCompra + '</td><td>' + datosPrecios.precioVenta + '</td><td>' + total + '</td><td><a  class="eliminarBtn" onclick="eliminarFila(this)"><img src=icon/delete.png  height="15" width="15"></a></td></tr>';
       let nuevaFila = '<tr><td>'+ factura+'</td><td>' + detalleFactura.split('-')[0] + '</td><td>' + cantidadProducto + '</td><td>' + datosPrecios.precioCompra + '</td><td>' + datosPrecios.precioVenta + '</td><td>' + total + '</td><td><a  class="eliminarBtn" onclick="eliminarFila(this)"><img src=icon/delete.png  height="15" width="15"></a></td></tr>';

        $('#facturasTable').append(nuevaFila);
        let filaDatos = {
            detalle: detalleFactura,
            cantidad: cantidadProducto,
            precioUnitario: datosPrecios.precioCompra,
            precioVenta: datosPrecios.precioVenta,
            total: total,
            numeroFactura: numeroFactura
        };
        filasParaGuardar.push(filaDatos);
        document.getElementById('search').value = '';
        document.getElementById('cantidad').value = '';


    }
    else {
        alert('Por favor, complete todos los campos obligatorios.');
    }
}

function facturar() {
    var numeroFactura = document.getElementById('idFactura').value;
    //recorrer la tala 
    var tabla = document.getElementById('facturasTable');

// Crear un array para almacenar los datos de la tabla
var datosTabla = [];

// Iterar sobre las filas de la tabla
for (var i = 1; i < tabla.rows.length; i++) {
    // Obtener una referencia a la fila actual
    var fila = tabla.rows[i];
    // Crear un array para almacenar los datos de la fila
    var datosFila = [];
    // Iterar sobre las celdas de la fila
   // for (var j = 0; j < fila.cells.length; j++) {
        // Obtener el contenido de la celda y agregarlo al array de datos de la fila
       // datosFila.push(fila.cells[j].innerText);
        datosFila = {
            facturar: fila.cells[0].innerText,
            detalle: fila.cells[1].innerText,
            cantidad: fila.cells[2].innerText,
            precioUnitario: fila.cells[3].innerText,
            precioVenta: fila.cells[4].innerText,
            total: fila.cells[5].innerText,
            numeroFactura: numeroFactura,
           

        };
        datosTabla.push(datosFila);
        
  //  }
    
   
}
    var detallesJSON = JSON.stringify(datosTabla);
    var xhr = new XMLHttpRequest();
    var url = "save_data_factura.php";

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            filasParaGuardar = [];
            alert(xhr.responseText);
            window.location.href = 'venta.php';
        }
    };

    xhr.send(detallesJSON);

}

async function obtenerPrecios(detalleFactura) {
    return new Promise((resolve, reject) => {

        $.ajax({
            type: "GET",
            url: "retornarPrecios.php",
            data: { detalleFactura: detalleFactura },
            dataType: "json",
            success: function (response) {

                console.log(response);
                if (response && response.precioVenta && response.precioCompra) {
                    resolve({ precioVenta: response.precioVenta, precioCompra: response.precioCompra });
                } else {
                    reject(new Error('No se pudo obtener el precio'));
                }
            },
            error: function (xhr, status, error) {


            }
        });
    });
}




function obteneeeesrPrecios(detalleFactura) {
    return new Promise(function (resolve, reject) {
        let data = {
            detalleFactura: detalleFactura
        };

        $.ajax({
            type: "POST",
            url: "retornarPrecios.php",
            data: data,
            cache: false,
            dataType: "json", // Esperamos recibir JSON del servidor
            success: function (data) {
                // Verificar si se recibió la respuesta correctamente
                if (data && data.hasOwnProperty('precioVenta') && data.hasOwnProperty('precioCompra')) {
                    // Resuelve la Promesa con los datos obtenidos
                    resolve(data);
                } else {
                    // Rechaza la Promesa si la respuesta no es válida
                    reject('Respuesta inválida desde el servidor');
                }
            },
            error: function (xhr, status, error) {
                // Rechaza la Promesa en caso de error
                reject(error.message);
            }
        });
    });
}


function eliminarFila(btn) {
    // Obtener la fila actual y eliminarla
    let fila = btn.parentNode.parentNode;
    fila.parentNode.removeChild(fila);
}
$(function () {
    var availableTags = []; // Inicializamos un array vacío

    $("#search").autocomplete({
        source: function (request, response) {

            $.ajax({
                url: "retornaProducto.php",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function (data) {
                    availableTags = data;
                    response(data);
                },
                error: function (xhr, status, error) {
                    alert(error.message);
                }
            });
        },
        minLength: 1
    });
});
