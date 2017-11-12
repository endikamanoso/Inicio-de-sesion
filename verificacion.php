<!doctype html>
<html lang="es">
<head>
    <title>Inicio Sesión</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>
  <div class="container text-center col-8">
  <div class="jumbotron">
    <h1>Mi sesión</h1>
	</div>
	<div class="container col-4">
		<?php
if (isset($_GET["nombre"]) && isset($_GET["pass"]) || $_SESSION["correcto"]==1) {	//tienen valor las variables capturadas??
	$nombre=$_GET["nombre"];
	$pass=sha1($_GET["pass"]);
if (file_exists("usuarios.xml")) {							//existe el archivo usuarios.xml??
		$usuarios=simplexml_load_file("usuarios.xml");		//paso el contenido del xml a la variable $usuarios
		foreach ($usuarios->usuario as $usuario) {			//va a pasar por todos los valores del array-nodo $usuario
				$nombre_u=$usuario->nombre;
				$apellidos_u=$usuario->apellidos;
				$contraseña_u=$usuario->contraseña;
				$id=$usuario->id;
				if ($nombre==$nombre_u && $pass==$contraseña_u) {	//comparo valores array con los introducidos por mi, además de ver si ya inicialicé la variable de sesion anteriormente
				
					if ($id=="admin") {     //Si es admin, muestra sus datos, cerrar su sesion y la posibilidad de ver los 	datos de los demas usuarios
						session_start();		//se inicia la sesion
						echo ("<ul><li><h1>Nombre: </h1><h2 font-size:3em>$nombre_u</h2></li><br>");
						echo ("<li><h1>Apellidos: </h1><h2 font-size:3em>$apellidos_u</h2></li><br>");
						/*echo ("<li><h1>Contraseña </h1><h2 font-size:3em>$contraseña_u</h2></li><br>");*/
						echo ("<li><h1>Rol: </h1><h2 font-size:3em>$id</h2></li></ul>");
						echo ("<a href='cierre sesion.php' id='titulo_cerrar_sesion'>Cerrar mi sesión</a>");
						echo ("<a href='datos_usuarios.php' id='acceso_datos_usuarios'>Acceder a los datos de los usuarios</a>");
						break;	//como los valores coinciden, sale fuera del foreach;
				}
					else{	//si no es admin, solo podra ver sus datos y cerrar su sesion
						echo ("<h1>Nombre: </h1><h2 font-size:3em>$nombre_u</h2><br>");
						echo ("<h1>Apellidos: </h1><h2 font-size:3em>$apellidos_u</h2><br>");
						echo ("<a href='cierre sesion.php' id='titulo_cerrar_sesion'>Cerrar mi sesión</a>");	//enlace a cierre sesion.php
						break;	//como los valores coinciden, sale fuera del foreach;
					}
				}
			
			}
			if ($nombre!=$nombre_u || $pass!=$contraseña_u) {
					echo "Hay datos erróneos<br><br>";
					echo "<a href='inicio sesion.php'>Intentarlo de nuevo</a>";			
				}
			
					
			
				}	
		
	}
else{
	header("location:inicio sesion.php");		
}
?>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
