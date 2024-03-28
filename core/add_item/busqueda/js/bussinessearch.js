function mostrarSearch(id) 
{
    var divs = document.querySelectorAll(".mostrar-div");
    var tablaContainer = document.getElementById("tabla-container");
    tablaContainer.innerHTML = '';
    
    for (var i = 0; i < divs.length; i++) 
    {
        divs[i].style.display = "none";
        
    }
    document.getElementById(id).style.display = "block";
    
}

function eliminarDocumento(id, factura)
{
  if(confirm("¿Está seguro que desea eliminar este Producto?"))
  {
    var data = 
    {
      id: id,
      tipo : 3,
      factura: factura
    };

      $.ajax({
        type: "GET",
        url: "controller/getData.php",
        data: data,
        cache: false,
        success: function(data) {
           
           window.location.href= "../data_upload/search.html";
        
        },
        error: function(xhr, status, error) {
        console.error(xhr);
        }
        });

  }
}


function recojerDatos(tipo)
{
    if(tipo == 1)
    {
        let tablaContainer = document.getElementById("tabla-container");
        tablaContainer.innerHTML = '';
        let nombre = document.getElementById('id_nombre').value;
        var url = "controller/getData.php?tipo=" + encodeURIComponent(tipo) + "&nombre=" + encodeURIComponent(nombre) ;
    }
    if(tipo == 2)
    {
        let tablaContainer = document.getElementById("tabla-container");
        tablaContainer.innerHTML = '';
        let nombre = document.getElementById('id_factura').value;
        var url = "controller/getData.php?tipo=" + encodeURIComponent(tipo) + "&factura=" + encodeURIComponent(nombre) ;
    }
   
   

    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);

          xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) 
            {
              // Parsea la respuesta JSON
              var respuesta = JSON.parse(xhr.responseText);
              var tablaContainer = document.getElementById("tabla-container");

              // Crear la tabla
              var tabla = document.createElement("table");
              tabla.classList.add('table');         
              // Crear la fila de encabezado
              var encabezado = document.createElement("tr");
              
              // Crear las celdas de encabezado
              var encabezadoCol1 = document.createElement("th");
              encabezadoCol1.textContent = "Nombre Producto";
              var encabezadoCol2 = document.createElement("th");
              encabezadoCol2.textContent = "Cant Actual"
              var encabezadoCol4 = document.createElement("th");
              encabezadoCol4.textContent = "";
               var encabezadoCol5 = document.createElement("th");
               encabezadoCol5.textContent = "Precio Compra";
               var encabezadoCol6 = document.createElement("th");
               encabezadoCol6.textContent = "Precio Venta";
               var encabezadoCol7 = document.createElement("th");
               encabezadoCol7.textContent = "Factura";
               var encabezadoCol8 = document.createElement("th");
               encabezadoCol8.textContent = "Cant Ingresada";
               
              // Agregar las celdas de encabezado a la fila de encabezado
              encabezado.appendChild(encabezadoCol1);
              encabezado.appendChild(encabezadoCol8);
              encabezado.appendChild(encabezadoCol2);
            
              encabezado.appendChild(encabezadoCol5);
              encabezado.appendChild(encabezadoCol6);
              encabezado.appendChild(encabezadoCol7);
             
             
           
             
              encabezado.appendChild(encabezadoCol4);
      
              // Agregar la fila de encabezado a la tabla
              encabezado.classList.add("table1");
              tabla.appendChild(encabezado);

              respuesta.forEach(function (opcion) 
              {
                var fila = document.createElement("tr");

                var celdaCol1 = document.createElement("td");
                celdaCol1.textContent = opcion.nombre;
                var celdaCol2 = document.createElement("td");
                celdaCol2.textContent = opcion.cantidad;
                var celdaCol5 = document.createElement("td");
                celdaCol5.textContent = opcion.precio_venta;
                var celdaCol6 = document.createElement("td");
                celdaCol6.textContent = opcion.precio_compra;
                var celdaCol7 = document.createElement("td");
                celdaCol7.textContent = opcion.factura;

               var celdaCol8 = document.createElement("td");
                celdaCol8.textContent = opcion.cantidadInicial;
                 
                
                var celdaCol4 = document.createElement("td");
                var enlaceEliminar = document.createElement("a");
                enlaceEliminar.href = "#";
                enlaceEliminar.textContent = "Dar baja";
                enlaceEliminar.onclick   = function()
                {
                  eliminarDocumento(opcion.nombre, opcion.factura);
                }

                celdaCol4.appendChild(enlaceEliminar);

                fila.appendChild(celdaCol1);
                fila.appendChild(celdaCol8);
                fila.appendChild(celdaCol2);
              
                fila.appendChild(celdaCol5);
                fila.appendChild(celdaCol6);
                fila.appendChild(celdaCol7);
               
                fila.appendChild (celdaCol4); 
               tabla.appendChild(fila);
                
              });
              tablaContainer.appendChild(tabla);
                 
            }
          };

          xhr.send();

}    


