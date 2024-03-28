<?php 

include('funciones.php'); 
?>
<head>
	<meta charset="UTF-8">
	
	<link rel="stylesheet" type="text/css" href="css/jquery/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="css/jquery/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="css/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="css/jquery/jquery.easyui.min.js"></script>
</head>
          
	  
	
	<table align=center width =300><td>
	
	<h1 class="page-header">
				<span class="pull-right">
					
				<a href = "new_categoria.php" class="btn btn-success" target = admin>Nueva Categoria</a>
	
				
				</span>
             </h1> 
	   <table id="dg" align=center class="easyui-datagrid" title="Categorias"  style="width:449px;height:340px; ">
			   
		   <thead>
			   <tr>
				   
				   <th data-options="field:'itemid',width:50">Codigo</th>
				   <th data-options="field:'f_ini',width:260">Nombre</th>
                   <th data-options="field:'ini',width:60"> Editar</th>  
				   <th data-options="field:'inis',width:60"> Eliminar</th>   
				         
			   </tr>
			
		   </thead>
		   <?php filasCategoria(); ?>
</table>
</table>


		     


