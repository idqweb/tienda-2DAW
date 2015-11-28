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
					
						## Lista TODOS los productos
						$sql="SELECT * FROM producto"; 
						
						echo $sql;// Comprobacion se ha de quitar luego para ver la instruccion
					
						#para que tenga en cuenta caracteres especiales UTF8 hay que poner antes 
						mysqli_query($c,"SET NAMES 'utf8'");
						# ejecuto la orden SQL
						$listadoproductos=mysqli_query($c,$sql);
					if($c==null){
					echo "Fallo en la conexion con la DB";
					}
					else{
						if($listadoproductos){
									
									$numeroproductos = mysqli_affected_rows($c);
						
								if($numeroproductos == 0 || $numeroproductos == null){
									echo "No HAY PRODUCTOS EN LA BASE DE DATOS";
									
									}
									else {
																			
										
										############## Nuestra TODOS los PRODUCTOS en una Tabla #####################
									?>
								
										<h1>TODOS LOS PRODUCTOS EXISTENTES</h1>
			
										<table class='table table-striped table-hover'>
										<thead>
										<tr>
										<th class='text-center'>Referencia</th>
										<th class='text-center'>Descripción</th>
										<th class='text-center'>Precio</th>
										<th class='text-center'>Imagen</th>
										<th class='text-center'>Unidades</th>
										<th class='text-center'>Comprar</th>
										</thead>
									<?php		
										
										while ($productosSeleccionados = mysqli_fetch_array($listadoproductos)){
										
												echo "<tr>";
												echo "<td class='text-center'>".$productosSeleccionados['referencia']."</td>";
												echo "<td class='text-center'>".$productosSeleccionados['descripcion']."</td>";
												echo "<td class='text-center'>".$productosSeleccionados['precio']."</td>";
												echo "<td class='text-center'><img src='./images/thumbnails/".$productosSeleccionados['imagen']."' class='image-responsive'/></td>";
										?>	
											<form method="post" action="compra.php">
												<td class="text-center">
													<input type="number" name="uds" min="1" max="<?php echo $productosSeleccionados['stock']; ?>" />
												</td>
												<td class="text-center">
												<button type="submit" name="articulo" value="<?php echo $productosSeleccionados['referencia'];  ?>">Compra</button>
												</td>
											</form>	
				<?php									
												echo "</tr>";
											}
				?>						
										</table>
				<?php
										
										}
							
								// Si me llega una compra
							
						if (isset($_POST['articulo'])){
									
									$referencia = $_POST['articulo'];
									$uds = $_POST['uds'];
									
									if( isset($_SESSION['carro']) ){
											#si ya teniamos creado el carro
											$carro=$_SESSION['carro'];
											# compruebo si el articulo ya existe en el carro
											$posicion=-1;
											for($i=0;$i<count($carro) && $posicion==-1;$i++){
													$articulo=explode(":",$carro[$i]);
													if($articulo[0]==$_POST['articulo']){
													$posicion=$i;
													}
											}
											
											if($posicion==-1){
												# nuevo articulo
												# guardo la referencia del articulo
												array_push($carro,$_POST['articulo'].":".$_POST['uds']);
																	
											}
											else{
												# ya existe en el carro, aumento las unidades de ese articulo
													$articulo=explode(":",$carro[$posicion]);
													$uds=$articulo[1]+$_POST['uds'];
													$carro[$posicion]=$articulo[0].":".$uds;
											}
										}
										else{
										# es el primer articulo del carro
										# guardo la referencia del articulo:unidades
										$carro=array($_POST['articulo'].":".$_POST['uds']);
										}
							$_SESSION['carro']=$carro;
						}
							
							}
								else {
								#orden SQL incorrecta
									#incluido el fallo de clave duplicada Duplicate Key
									$error=mysqli_error($c);
									echo $error;

									}
				
					}
					
					//esto lo hacemos para aprender lo normal no es cerrar aqui
					mysqli_close($c);
					
				}
		
		?>
			
			
			
			<?php
			
				echo ("contenido del carro de ".$_SESSION['login']);
				
				for ($i=0; $i < count($_SESSION['carro']);$i++){
						
					echo $_SESSION['carro'][$i]."<br/>";
				}
			
			
			
			
			
			
			?>
			
			
			
			
			
			
			
			
			
		</div>
	<!---------------- Comienza Footer ------------------->		
		<?php include("footer.php"); ?>
			
		
			
	</body>
</html>