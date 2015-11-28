<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Buscar - MI TIENDA</title>
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
			
			
			
			<?php
			if (isset ($_POST['cadenaDeBusqueda'])){
				
				$cadenaBuscar=$_POST['cadenaDeBusqueda'];
				echo $cadenaBuscar;
				
				#incluyo mi fichero de conexion
				include("mysql.inc.php");
				
				#lanzo la conexion de MYSQL server
				conecta($c);
				
				if($c==null){
					echo "Fallo en la conexion con la DB";
				}
				else{
					# selecciono mi base de datos
					$nombredb="mitienda";
					mysqli_select_db($c,$nombredb);
					// aqui vienen los comandos SQL 
					
						$sql="SELECT descripcion FROM producto WHERE UPPER(descripcion) LIKE UPPER('%$cadenaBuscar%')"; 
						// se usa UPPER para que le de igual Mayusculas o Minusculas
						echo $sql;
						#para que tenga en cuenta caracteres especiales UTF8 hay que poner antes 
						mysqli_query($c,"SET NAMES 'utf8'");
						# ejecuto la orden SQL
						$existeproducto=mysqli_query($c,$sql);
					
						if($existeproducto){
									
									$existeproducto = mysqli_affected_rows($c);
						
								if($existeproducto == 0 || $existeproducto == null){
									echo "No hay productos con esta $cadenaBuscar cadena de busqueda.";
									
									}
									else {
										
										$sql1="select * from producto where descripcion = '$cadenaBuscar'"; 
										$productos=mysqli_query($c,$sql1);
													
										
										
										
										
										############## resultado busqueda productos en Tabla #####################
				?>
									<h1>RESULTADO DE LA BUSQUEDA</h1>			
			
										<table class='table table-striped table-hover'>
										<thead>
										<tr>
										<th class='text-center'>Referencia</th>
										<th class='text-center'>Descripción</th>
										<th class='text-center'>Precio</th>
										<th class='text-center'>Imagen</th>
										</thead>
				<?php		
										
										while ($productosSeleccionados = mysqli_fetch_array($productos)){
										
											echo "<tr>";
											echo "<td class='text-center'>".$productosSeleccionados['referencia']."</td>";
											echo "<td class='text-center'>".$productosSeleccionados['descripcion']."</td>";
											echo "<td class='text-center'>".$productosSeleccionados['precio']."</td>";
											echo "<td class='text-center'><img src='./images/thumbnails/".$productosSeleccionados['imagen']."' class='image-responsive'/></td>";
											echo "</tr>";
										}
				?>						
										</table>
				<?php
										
									}
						}
						else {
						#orden SQL incorrecta
							#incluido el fallo de clave duplicada Duplicate Key
							$error=mysqli_error($c);
							echo $error;
								
					}
				
				
				
				}
		}
		else{
			echo ("NO has insertado nada en buscar lo mandare a la pagina en la que este con header");	
			echo "<a href='registro.html'>Vuelve a Registrarte</a>";
		}
	
		?>
		
		</div>
	<!---------------- Comienza Footer ------------------->		
		<?php include("footer.php"); ?>
		
			
	</body>
</html>