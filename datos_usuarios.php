<!doctype html>
<html lang="es">
  <head>
    <title>Datos de Usuarios</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    
    	<style>
		#contenedor{
			text-align: center;
		}
		H1{
			text-align: center;
		}
		table{
			width: 100%;
		}
		#contenedor{

			margin: 0 auto;
		}
		td,th{
			font-size: 2em;
		}
		a{
			text-decoration: none;
		}
	</style>
  </head>
  <body>
    <div class="container">
  <div class="jumbotron">
    <h1>DATOS DE USUARIOS</h1>
  </div>
	  <?php
			if (file_exists("usuarios.xml")) {
				$datos=simplexml_load_file("usuarios.xml");
				echo "<div id='contenedor'>";
				echo "<table class='table'>";
					echo "<tr><th>Nombre</th><th>Apellidos</th><th>ID</th><th>Contraseña</th></tr>";
				foreach ($datos->usuario as $usuario) {
					$nombre=$usuario->nombre;
					$apellidos=$usuario->apellidos;
					$id=$usuario->id;
					$contraseña=$usuario->contraseña;
					echo "<tr><td>$nombre</td>";
					echo "<td>$apellidos</td>";
					echo "<td>$id</td>";
					echo "<td>$contraseña</td></tr>";
					echo "</div>";
				}
				echo "<a href=verificacion.php>Regresar</a>";
			}
			else{
				echo "<h1>La lista de usuarios no se encuentra disponible";
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