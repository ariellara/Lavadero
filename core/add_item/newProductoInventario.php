<?php
include('funciones.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<head>
	<meta charset="UTF-8">
	
	<link rel="stylesheet" type="text/css" href="css/jquery/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="css/jquery/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="css/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="css/jquery/jquery.easyui.min.js"></script>
    <script src="negocio.js"></script>

   
    <script src="css/js/bootstrap-alert.js"></script>
   
</head>
</head>
<body>
    <table align =center>
        <tr><td>


	<div style="margin:20px 0;"></div>
	<div class="easyui-panel" title="Ingresar Producto" style="width:400px;max-width:400px;padding:10px 80px;">
		<form id="ff" method="post">
			
			
            <label align = left>Producto</label>
             <select id=idProducto   label="Categoria" style="width:100%" labelPosition="left">
                <?php retornaProductos();?>
             </select>	
           
				<input class="easyui-numberbox"  labelPosition="top" id="idCantidad" style="width:100%" data-options="label:'Cantidad',required:true">
			
             	<input class="easyui-numberbox"  labelPosition="top" id="idPreciocompra" style="width:100%" data-options="label:'Precio Compra',required:true">
                <input class="easyui-numberbox"  labelPosition="top" id="idPrecioVenta" style="width:100%" data-options="label:'Precio Venta',required:true">
                <label align = left>Factura</label>
                <select id=idFactura   label="Categoria" style="width:100%" labelPosition="left">
                <?php retornaFactura();?>
             </select>	
            </div>
		
		<div style="text-align:center;padding:5px 0">
			<input type=button class="btn btn-primary" value = Guardar onclick="recojerDatos(5,1)">
			<a href="javascript:void(0)" class="btn btn-secondary" onclick="clearForm()" style="width:80px">Limpiar</a>
		</div>
		<div>
		<a href="add_producto.php" class="btn btn-link" target =admin>Regresar</a>
	
        </div>
        </form>
	</div>
	
</td><tr></table>
	
</body>
</html>