
	
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
	<div class="easyui-panel" title="Nuevo Proveedor" style="width:100%;max-width:400px;padding:10px 80px;">
		<form id="ff" method="post">
			<div style="margin-bottom:20px">
				<input class="easyui-textbox" id="codigo_proveedor" style="width:100%" data-options="label:'Codigo:',required:true">
			</div>
			<div style="margin-bottom:20px">
				<input class="easyui-textbox" id="nombre_proveedor" style="width:100%" data-options="label:'Nombre:',required:true">
			</div>
            <div style="margin-bottom:20px">
				<input class="easyui-textbox" id="contacto_proveedor" style="width:100%" data-options="label:'Contacto:',required:true">
			</div>
				
		<div style="text-align:center;padding:5px 0">
			<input type=button class="btn btn-primary" value = Guardar onclick="recojerDatos(3,1)">
			<a href="javascript:void(0)" class="btn btn-secondary" onclick="clearForm()" style="width:80px">Limpiar</a>
		</div>
		<div>
		<a href="add_proveedor.php" class="btn btn-link" target =admin>Regresar</a>
	
        </div>
        </form>
	</div>
	
</td><tr></table>
	
</body>
</html>
<?php


?>