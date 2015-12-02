<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Panel Control USER - MI TIENDA</title>
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
		
		<!---------------- Control de Session ------------------->
		<?php
			session_start();

			


			// Comprobar que si estas aqui es es por Logearte OK sino te hecha al index
			if (!isset($_SESSION['login']) || $_SESSION['logeado'] !=true){ 
				header("Location: index.php");
			}
			
		?>
		
		
		
		<div class="container">
		<!---------------- Menu superior ------------------->
			<?php
				if ($_SESSION['role'] == "usuario"){
					include("menuUser.inc.php");
				}
				elseif ($_SESSION['role'] == "administrador"){
					include("menuAdmin.inc.php");
				}
			?>
		<!---------------- Fin menu superior ------------------->
			
			
			<h2>Bienvenido <?php echo $_SESSION['login']; ?></h2>
			
			
		
		
		
		<h3>Panel de Control de <?php echo $_SESSION['login']; ?> </h3>
		<hr/>
		<br/>
		<br/>
		<?php 
				if ($_SESSION['role'] == "usuario"){
		?>
			<a href="compra.php?"<?php echo session_name()."=".session_id() ?> >Compra</a><br/>
			
		
		
		
		<?php
				}
				elseif ($_SESSION['role'] == "administrador"){
					
		?>			
			<?php echo $nombreSession."=".$idsession; ?>
			<a href="altaarticulos.php?<?php echo $nombreSession."=".$idsession; ?>" >Alta Articulos</a><br/>
			<a href="listadocompleto.php">Listado Completo</a><br/>
			<a href="listadominimo.php">Listado Minimo</a><br/>
			
			
					
					
					
					
		<?php 	}	?>
			
		</div>
		
	<!---------------- Comienza Footer ------------------->		
		<?php include("footer.php"); ?>
			
		
			
	</body>
</html>