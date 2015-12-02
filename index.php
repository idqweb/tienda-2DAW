<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Portada MI TIENDA</title>
	<!-- Los estilos css de Bootstrap -->
		<link rel="stylesheet" href="./css/bootstrap.css"/>
	<!-- Mis estilos css PERSONALIZADOS -->
		<link rel="stylesheet" href="./css/estilos.css"/>
	
	<!------------------- carga de javascripts ------------------------------------------------->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	<script src="./js/jquery-2.1.4.min.js"></script>
		<!-- el que viene compilado -->
		<script src="./js/bootstrap.min.js" ></script>	
			
	</head>
	<body>
		
		<!---------------- Includes ------------------->
		<?php
			session_start();
			
			
		?>
		
		
		<div class="container">
		<!---------------- Menu superior ------------------->
			<?php
			if (isset ($_SESSION['role'])){
						if ($_SESSION['role'] == "usuario"){
							include("menuUser.inc.php");
						}
						elseif ($_SESSION['role'] == "administrador"){
							include("menuAdmin.inc.php");
						}
			}
			else{
				include("menu.inc.php"); 
			}
			?>
		<!---------------- Fin menu superior ------------------->
			
			
			
			<h1>Mi tienda</h1>
			
			
			
			
			
		</div>
	<!---------------- Comienza Footer ------------------->		
		<?php include("footer.php"); ?>
			
		
			
	</body>
</html>