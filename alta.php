<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Alta Usuario - MI TIENDA</title>
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
			if (isset ($_POST['pass']) && 	$_POST['pass'] == $_POST['repass']){
				
				$nombre=$_POST['user'];
				echo $nombre;
				$password= md5($_POST['pass']);
				echo $password;
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
					
						$sql="SELECT login FROM usuario WHERE login = '$nombre'"; 
						// antes lo tenia puesto con LIKE
						echo $sql;
						#para que tenga en cuenta caracteres especiales UTF8 hay que poner antes 
						mysqli_query($c,"SET NAMES 'utf8'");
						# ejecuto la orden SQL
						$nombreEsta=mysqli_query($c,$sql);
					
						if($nombreEsta){
									
									$comparacion=mysqli_affected_rows($c);
						
								if($comparacion == 0 || $comparacion == null){
									#el usuario NO EXISTE en la db lo podemos meter
									$sql2="INSERT INTO usuario (login, pass) VALUES ('$nombre','$password')";
									#para que tenga en cuenta caracteres especiales UTF8 hay que poner antes 
										mysqli_query($c,"SET NAMES 'utf8'");
									# ejecuto la orden SQL
										$nombreIngresado=mysqli_query($c,$sql2);
									echo $sql2;
									
									}
									else {
										echo "ERROR EL USUARIO YA EXISTE EN LA DB";
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
			echo ("PASS incorrecto");	
			echo "<a href='registro.html'>Vuelve a Registrarte</a>";
		}
	
		?>
			
			
			
			
			
		</div>
	<!---------------- Comienza Footer ------------------->		
		<?php include("footer.php"); ?>
			
		
			
	</body>
</html>