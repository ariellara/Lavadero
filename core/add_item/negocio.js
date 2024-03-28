

function getSelected()
{
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $.messager.alert('Info', row.itemid+":"+row.productid+":"+row.attr1);
    }
}

  function recojerDatos(tabla, tipo)
  {
    

    //adicionar categoria
      if(tabla ===1 && tipo===1)
      {
        var url = "add_category.php";
      let nombre = document.getElementById('nombre_categoria').value;
      let codigo = document.getElementById('codigo_categoria').value;
      
        var data = 
        {
            
            nombre : nombre,
            codigo : codigo,
            tipo : tipo,
            tabla : tabla

        };

      }
      //editar categoria
      if(tabla ===1 && tipo===2)
      {
        var url = "add_category.php";
        let id = document.getElementById('Id').value;
        let codigo = document.getElementById('codigo_categoria').value;
        let nombre = document.getElementById('nombre_categoria').value;
        var data = 
        {
            codigo: codigo,
            nombre : nombre,
            tipo : tipo,
            id : id,
            tabla : tabla

        };


      }
      //Eliminar Categoria
      if(tabla ===1 && tipo===3)
      {
        let id = document.getElementById('Id').value;

        var data = 
        {
            
            id : id,
            tabla : tabla,
            tipo : tipo

        }

      }

      //adicionar producto
      if (tabla === 2 && tipo === 1)
      {
        var url = "add_producto.php";
        let codigo = document.getElementById('codigo_producto').value;
        let nombre = document.getElementById('nombre_producto').value;
        let id_cat = document.getElementById('id_categoria').value;
      
        var data = 
        {
            codigo: codigo,
            nombre : nombre,
            id_cat : id_cat,
            tipo : tipo,
            tabla : tabla
           
        };
             

      }
      ////editar producto
      if (tabla === 2 && tipo === 2)
      {
        var url = "add_producto.php";
        let id = document.getElementById('Id').value;
        let codigo = document.getElementById('codigo_producto').value;
        let nombre = document.getElementById('nombre_producto').value;
        let id_cat = document.getElementById('id_categoria').value;
        var data = 
        {
            codigo: codigo,
            nombre : nombre,
            id_cat : id_cat,
            tipo : tipo,
            id : id ,
            tabla: tabla           
        };

      }

      //agregar Proveedor
      if(tabla === 3 && tipo ===1)
      {
            var url = "add_proveedor.php";
            let codigo = document.getElementById('codigo_proveedor').value;
            let nombre = document.getElementById('nombre_proveedor').value;
            let contacto = document.getElementById('contacto_proveedor').value;
       
           
            var data = 
            {
                codigo: codigo,
                nombre : nombre,
                contacto : contacto,
               
                tipo : tipo,
                tabla : tabla
               
            };
      }
      //editar Proveedor
      if(tabla === 3 && tipo ===2)
      {
           var url = "add_proveedor.php";
            let codigo = document.getElementById('codigo_proveedor').value;
            let nombre = document.getElementById('nombre_proveedor').value;
            let contacto = document.getElementById('contacto_proveedor').value;
            let id = document.getElementById('Id').value; ;
            var data = 
            {
                codigo: codigo,
                nombre : nombre,
                contacto : contacto,
                tipo : tipo,
                tabla : tabla,
                id : id
               
            };

      }

      //agregar ingreso
      if(tabla === 4 && tipo === 1 )
      {
        var url = 'add_ingreso.php';
        let fecha = document.getElementById('fechaIngreso').value;
        let numero = document.getElementById('numeroIngreso').value;
        let proveedor = document.getElementById('idProveedor').value;
        var data = 
        {
            fecha : fecha,
            numero : numero,
            proveedor : proveedor,
            tipo : tipo,
            tabla : tabla
           
        };
      }
      //editar Docuemento
      if(tabla === 4 && tipo === 2 )
      {
        
            let codigo = document.getElementById('codigo_documento').value;
            let nombre = document.getElementById('nombre_documento').value;
          
            let id_subarea = document.getElementById('id_subarea').value;
            let id = document.getElementById('Id').value; ;

            var data = 
            {
                codigo: codigo,
                nombre : nombre,
          
                id_subarea : id_subarea,
                tipo : tipo,
                tabla : tabla,
                id : id
               
            };


      }

      //adicionar producto inventario
      if(tabla === 5 && tipo === 1 )
      {
        var url ='newProductoInventario.php';
        let idProducto = document.getElementById('idProducto').value;
        let cantidadProducto = document.getElementById('idCantidad').value;
        let precioCompra = document.getElementById('idPreciocompra').value;
        let precioVenta = document.getElementById('idPrecioVenta').value;
        let idFactura = document.getElementById('idFactura').value;
       
        var data = 
        {
            idProducto : idProducto,
            cantidadProducto : cantidadProducto,
            precioCompra : precioCompra,
            precioVenta : precioVenta,
            idFactura : idFactura,
            tipo : tipo,
            tabla : tabla
           
        };

      }
      //EDITAR USUARIO
      if(tabla === 5 && tipo === 2 )
      {
        let codigo = document.getElementById('cod_usuario').value;
        let nombre = document.getElementById('nombre_usuario').value;
        let contacto = document.getElementById('contac_usuario').value;
        let id = document.getElementById('Id').value;
        let estado = document.getElementById('estado_usuario').value;

       
        var data = 
        {
            codigo: codigo,
            nombre : nombre,
            contacto : contacto,
            id : id,
            estado: estado,
            tipo : tipo,
            tabla : tabla
           
        };

      }

      /////////ajax
      
    $.ajax({
        type: "POST",
        url: "controller/save_data.php",
        data: data,
        cache: false,
        success: function(data) {
           // $.messager.alert('Información',data);

           window.location.href = url;
        },
        error: function(xhr, status, error) {
        console.error(xhr);
        }
        });

  }


  
function clearForm()
{
    $('#ff').form('clear');
}

    function eliminarDato(Id, Tipo)
    {
        let destino = "";

        switch(Tipo)
        {
          case 1: 
                  destino ="add_category.php";
          break;
          
          case 2: 
                  destino = "add_producto.php";
          break;

          case 3: 
                  destino = "add_proveedor.php";
          break;

          case 4: 
                  destino = "add_ingreso.php";
          break;
        }
    

        var result = confirm("¿Desea quitar este Registro?");
        if(result) 
        {
                var data =
                {
                    id : Id,
                    tipo : Tipo
                };

            $.ajax({
                type: "POST",
                url: "controller/delete_data.php",
                data: data,
                cache: false,
                success: function(data) {
                    setTimeout(function() {
                        $.messager.alert('Información',data);
                      }, 3000);    
                    window.location.href= destino;
                
                },
                error: function(xhr, status, error) {
                console.error(xhr);
                }
                });
            }
    }