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
	<div class="easyui-panel" title="Nuevo Ingreso" style="width:100%;max-width:400px;padding:10px 80px;">
		<form id="ff" method="post">
			
			<div style="margin-bottom:20px">
            <input class="easyui-datebox" label="Fecha:" id= "fechaIngreso" labelPosition="top" style="width:100%;">
			</div>
            <div style="margin-bottom:20px">
				<input class="easyui-textbox" id="numeroIngreso" labelPosition="top" style="width:100%" data-options="label:'Num Factura',required:true">
			</div>
            <label align = left>Proveedor</label>
             <select id=idProveedor  label="Proveedor" style="width:100%">
                <?php retornarProveedores($_GET['id_pro']);?>
             </select>		
		
		<div style="text-align:center;padding:5px 0">
			<input type=button class="btn btn-primary" value = Guardar onclick="recojerDatos(4,1)">
			<a href="javascript:void(0)" class="btn btn-secondary" onclick="clearForm()" style="width:80px">Limpiar</a>
		</div>
		<div>
		<a href="add_ingreso.php" class="btn btn-link" target =admin>Regresar</a>
	
        </div>
        </form>
	</div>
	
</td><tr></table>
	
</body>
</html>