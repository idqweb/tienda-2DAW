<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Alta Articulos - MI TIENDA</title>
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
			# Varianbles Identificadoras de la session, necessary for user delete cookies
				$nombreSession = session_name();
				$idsession = session_id();

				
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
			
		
	<!----------------------- FORMULARIO INSERTAR PRODUCTOS  ----------------------------------------->	
			<?php echo $nombreSession."=".$idsession; ?>
				<form class="form-horizontal" method="post" action="altaarticulos.php" enctype="multipart/form-data" >
				  <fieldset>
					<legend>Alta Producto</legend>
					<div class="form-group">
					  <label for="inputRef" class="col-lg-2 control-label">Referencia</label>
					  <div class="col-lg-10">
						<input class="form-control" id="inputRef" name="referencia" type="text"/>
					  </div>
					</div>
				   <div class="form-group">
					  <label for="textArea" class="col-lg-2 control-label">Descripción</label>
					  <div class="col-lg-10">
						<textarea class="form-control" rows="3" id="textArea" name="descripcion"></textarea>
						<span class="help-block">La descripciond e los productos.</span>
					 </div>
				   </div>  
					<div class="form-group">
					  <label for="inputPrecio" class="col-lg-2 control-label">Precio</label>
					  <div class="col-lg-10">
						<input class="form-control" id="inputPrecio" name="precio" type="text"/>
					  </div>
					</div>
					<div class="form-group">
					  <label for="inputStock" class="col-lg-2 control-label">Stock</label>
					  <div class="col-lg-10">
						<input class="form-control" id="inputStock" name="stock" type="number"/>
					  </div>
					</div>
					<div class="form-group">
					  <label for="inputStock-Minimo" class="col-lg-2 control-label">Stock-Minimo</label>
					  <div class="col-lg-10">
						<input class="form-control" id="inputStock-Minimo" name="stockminimo" type="number"/>
					  </div>
					</div>
					  <div class="form-group">
					  <label for="inputImage" class="col-lg-2 control-label">Imagen</label>
					  <div class="col-lg-10">
						<input id="inputImage" name="archivo" type="file" accept="image/*"/>
					  </div>
					</div>
					<div class="form-group">
					  <div class="col-lg-10 col-lg-offset-2">
						<button type="reset" class="btn btn-default">Borrar Datos</button>
						<button type="submit" name="submit" class="btn btn-primary">Añadir Producto</button>
					  </div>
					</div>

				  </fieldset>
				</form>
			
			
		<!----------------------- Fin FORMULARIO INSERTAR PRODUCTOS  ----------------------------------------->	

		
		<?php
			// recordar que el nombre no puede ser mayor de VARCHAR(15)			

			if (isset ($_POST['submit'])){

						$dir_subida="./images/thumbnails/";

						$fichero_subido = $dir_subida.basename($_FILES['archivo']['name']); 
										
						if(move_uploaded_file($_FILES['archivo']['tmp_name'],$fichero_subido)){
								echo ("El archivo se ha subido con EXITO");
						}
						else{
							echo ("El archivo ha FALLADO".$error);
						}
			}
		?>			
			
			
			
		<?php
				
			if (isset ($_POST['submit'])){
					if ( !isset ($_POST['referencia']) || !isset ($_POST['descripcion']) || !isset ($_POST['precio']) || !isset ($_POST['stock']) || !isset ($_POST['stockminimo'])){

						echo "Fallo en el envio de datos de alta del producto";	

					}
					else{
						$referencia = $_POST['referencia'];
						$descripcion = $_POST['descripcion'];
						$precio = $_POST['precio'];
						$stock = $_POST['stock'];
						$stockminimo = $_POST['stockminimo'];
						$imagen = "".basename($_FILES['archivo']['name']); 
						echo "imagen";

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


							$sql="INSERT INTO producto (referencia,descripcion,precio,stock,stockminimo,imagen) VALUES ('$referencia','$descripcion',".$precio.",".$stock.",".$stockminimo.",'$imagen')"; 
							echo $sql;
							$productonew=mysqli_query($c,$sql);
							
								if ($productonew)
									echo "TODO OK";
								else
									echo "fallo en el INSERT";

						}



					}
				//esto lo hacemos para aprender lo normal no es cerrar aqui
					mysqli_close($c);
			}


		?>
	
			
			
			
			<a href="menu.php">Volver al Panel Control</a>
		</div>
	<!---------------- Comienza Footer ------------------->		
		<?php include("footer.php"); ?>
		
			
	</body>
</html>