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
										  
					<li class="dropdown">
         			 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Registrate/Nuevo User <span class="caret"></span></a>
         				 <ul class="dropdown-menu" role="menu">
            				<form class="navbar-form navbar-left" role="search" action="alta.php" method="post" >
       							 <div class="form-group">
								<label>Login:</label>	 
          						<input type="text" class="form-control" placeholder="Usuario AQUÍ.." name="user"/>
        						</div>
								<br/><br/>
								<div class="form-group">
								<label>Password:</label>
          						<input type="password" class="form-control" name="pass"/>
								</div>
								<br/><br/>
								<div class="form-group">
								<label>Re-Password:</label>
          						<input type="password" class="form-control" name="repass"/>
								</div>
								<br/><br/>
       				 			<button type="submit" class="btn btn-default pull-right">Registrate</button>
     			 			</form>
						  </ul>
						</li>  

				  </ul>
					
					
					<!-------------- Buscador -------------------------------------->	
					<form class="navbar-form navbar-left" role="search" action="buscar.php" method="post" >
       				 <div class="form-group">
          				<input type="text" class="form-control" placeholder="Buscar" name="cadenaDeBusqueda"/>
        			</div>
       				 <button type="submit" class="btn btn-default">Buscar</button>
     			 </form>
				
				 <!-------------- Fin Buscador -------------------------------------->
				
				<!-------------- Login -------------------------------------->	
				<form class="navbar-form navbar-left" role="login" action="login.php" method="post">
					<label>Logeate:</label>
       				 <div class="form-group">
          				<input type="text" name="login" class="form-control" placeholder="Login..." size="10"/>
        			</div>
					<div class="form-group">
          				<input type="password" name="pass" class="form-control" size="10"/>
        			</div>
       				 <button type="submit" class="btn btn-default">Entrar</button>
     			 </form>
				<!-------------- Fin Login -------------------------------------->
					
				</div>
			 
			  </div>
			</nav>
		</header>
