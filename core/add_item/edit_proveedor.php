<?php


    $ID = $_GET['Id'];
 
 ?>
 


	
	<link rel="stylesheet" type="text/css" href="css/jquery/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="css/jquery/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="css/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="css/jquery/jquery.easyui.min.js"></script>
    <script src="negocio.js"></script>
    <script src="css/js/bootstrap-alert.js"></script>
   

<body >
    <table align =center>
        <tr><td>


	<div style="margin:20px 0;"></div>
	<div class="easyui-panel" title="Editar Proveedor" style="width:100%;max-width:400px;padding:10px 80px;">
		<form id="ff" method="post">
        <input type= hidden id =Id value = <?php print $_GET['Id']; ?>>
			<div style="margin-bottom:20px">
				<input class="easyui-textbox" required id="codigo_proveedor" style="width:100%" data-options="label:'Codigo:'" value =  <?php print $_GET['cod_cat'] ?>>
			</div>
			<div style="margin-bottom:20px">
				<input class="easyui-textbox" id="nombre_proveedor" style="width:100%" data-options="label:'Nombre:'" value= "<?php  print $_GET['nom_cat'] ?>">
			</div>	
            <div style="margin-bottom:20px">
				<input class="easyui-textbox" id="contacto_proveedor" style="width:100%" data-options="label:'Contacto:'" value= "<?php  print $_GET['contacto_proveedor'] ?>">
			</div>
		<div style="text-align:center;padding:5px 0">
			<input type=button class="btn btn-primary" value = Modificar onclick="recojerDatos(3,2)">
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