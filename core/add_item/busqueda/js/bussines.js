
function cargarData(tipo)
{

         if(tipo == 9)
         {
      
          var url = "controller/setData.php?tipo=" + encodeURIComponent(tipo);
         }
         if (tipo == 10)
         {
          var url = "controller/setData.php?tipo=" + encodeURIComponent(tipo);
         }
        if(tipo ===1)
        {
           var url = "controller/setData.php?tipo=" + encodeURIComponent(tipo);
        }
        if(tipo ===2)
        {
              let id_dep = document.getElementById('id_dependencia').value;
              if(id_dep === "")
              {
                var select = document.getElementById("id_area");
                select.innerHTML = '';
                var select = document.getElementById("id_subarea");
                select.innerHTML = '';
                var select = document.getElementById("documento");
                select.innerHTML = '';
                var select = document.getElementById("id_responsable");
              
              }

              url ="controller/setData.php?tipo=" + encodeURIComponent(tipo) + "&tipo_dep=" + encodeURIComponent(id_dep) ;
        }

        if(tipo ===3)
        {
            let id_area = document.getElementById('id_area').value;
                
            url ="controller/setData.php?tipo=" + encodeURIComponent(tipo) + "&tipo_area=" + encodeURIComponent(id_area) ;
        }
        if(tipo === 4)
        {
        
            let id_subarea = document.getElementById('id_subarea').value;
            
            url ="controller/setData.php?tipo=" + encodeURIComponent(tipo) + "&tipo_subarea=" + encodeURIComponent(id_subarea) ;
        }
        if(tipo == 5)
        {
          url = "controller/setData.php?tipo=" + encodeURIComponent(tipo);
        }


    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);

          xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) 
            {
              // Parsea la respuesta JSON
              var respuesta = JSON.parse(xhr.responseText);
              if(tipo == 1)
              {
              var select = document.getElementById("id_dependencia");
              var option = document.createElement("option");
              select.appendChild(option);
              respuesta.forEach(function (opcion) {
                var option = document.createElement("option");
                option.value = opcion.valor;
                option.text = opcion.texto;
                select.appendChild(option);
              });
            }
            if (tipo ==2)
            {
              var select = document.getElementById("id_area");
              select.innerHTML = '';
              
              respuesta.forEach(function (opcion) {
                var option = document.createElement("option");
                option.value = opcion.valor;
                option.text = opcion.texto;
                select.appendChild(option);
              });

            }

            if (tipo == 3)
            {
              var select = document.getElementById("id_subarea");
              select.innerHTML = '';
              
              respuesta.forEach(function (opcion) {
                var option = document.createElement("option");
                option.value = opcion.valor;
                option.text = opcion.texto;
                select.appendChild(option);
              });

            }
            if (tipo == 4)
            {
              var select = document.getElementById("documento");
              select.innerHTML = '';
              
              respuesta.forEach(function (opcion) {
                var option = document.createElement("option");
                option.value = opcion.valor;
                option.text = opcion.texto;
                select.appendChild(option);
              });

            }

            if (tipo == 5)
            {
              var select = document.getElementById("id_responsable");
              select.innerHTML = '';
              
              respuesta.forEach(function (opcion) {
                var option = document.createElement("option");
                option.value = opcion.valor;
                option.text = opcion.texto;
                select.appendChild(option);
              });

            }
            if (tipo == 9)
            {
              var select = document.getElementById("id_area");
              select.innerHTML = '';
              
              respuesta.forEach(function (opcion) {
                var option = document.createElement("option");
                option.value = opcion.valor;
                option.text = opcion.texto;
                select.appendChild(option);
              });

            }

            if (tipo == 10) 
            {
              var select = document.getElementById("id_res");
              select.innerHTML = '';
              
              respuesta.forEach(function (opcion) {
                var option = document.createElement("option");
                option.value = opcion.valor;
                option.text = opcion.texto;
                select.appendChild(option);
              });
            }



            
            }
          };

          xhr.send();

          }
