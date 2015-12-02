<header>
			<nav class="navbar navbar-default">
 			 <div class="container-fluid">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav">
					
					
					  
					
				
					  
				  </ul>
					
					
					<!-------------- Buscador -------------------------------------->	
					<form class="navbar-form navbar-left" role="search" action="buscar.php?<?php echo $nombreSession."=".$idsession; ?>" method="post" >
       				 <div class="form-group">
          				<input type="text" class="form-control" placeholder="Buscar" name="cadenaDeBusqueda"/>
        			</div>
       				 <button type="submit" class="btn btn-default">Buscar</button>
     			 </form>
				
				 <!-------------- Fin Buscador -------------------------------------->
					
					
					
					
					
					
					<div class="pull-right">
					<a class="navbar-brand" href="menu.php"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>	
					<span  class="navbar-brand"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $_SESSION['login']; ?></span>
					<a class="navbar-brand" href="logout.php"> Salir</a>
					</div>
					
					
				</div>
			 
			  </div>
		</nav>
</header>
