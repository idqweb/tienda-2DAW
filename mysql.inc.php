<?php

/* Descripci�n:

Este script contiene los datos de conexion a la BD y una funci�n que nos
conecta a la BD y nos devuelve un canal de conexi�n

*/

// estos son los parametros de conexion a la BD

	// servidor donde se encuentra la BD	
$mysql_server="localhost";		

  // usuario MySQL que utilizo en la conexion

$mysql_login="root";			  

	// passwd del usuario en MySQL																													
$mysql_pass="admin";			  

// creo una variable $c sin asignarle ning�n valor
// para que pueda recoger el identificador de conexi�n
// una vez que se haya establecido esta

$c;

/* como pretendo que el valor del identificador
 sea usado fuera de la funci�n, para recuperar su valor
 pasaremos ese valor por referencia anteponiendo & al
 nombre de la variable */

function conecta(&$c){

    // para usar las variables anteriores en la funcion
    // debo de definirlas como globales
    global $mysql_server, $mysql_login, $mysql_pass;

    if($c=mysqli_connect($mysql_server,$mysql_login,$mysql_pass)){
          // todo correcto
    }else{
	  echo "<br/>No ha podido realizarse la conexi�n a la BD<br/>";	
    }
}

// esta funci�n asignar� a $c el valor del identificador de la BBDD abierta

?>