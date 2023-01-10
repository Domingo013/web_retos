<html>
	<head>
		<meta charset=utf-8 />
        <meta content=autor value="Domingo Miño Redondo"/>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
        <title>Recoger datos de Categorías</title>
	</head>
	<body>
		<?php
			$usuario = "root";
			$contrasenia = "";
			$bd = "retos";
			$servidor = "localhost";
			$mysqli = new mysqli($servidor, $usuario, $contrasenia, $bd);
			
			echo '<div id="contenedor1">
					<h3>ALTA RETOS</h3>
					<form method="post" action="alta.php">
						<label for="nombre">Nombre reto: </label><br>
						<input type="text" name="nombre" maxlength="100"/><br><br>
						
						<label for="dirigido">Dirigido: </label><br>
						<input type="text" name="dirigido" maxlength="100"/><br><br>
						
						<label for="descripcion">Descripción: </label><br>
						<input type="text" name="descripcion" maxlength="150"/><br><br>
						
						<label for="fechainicioinscripcion">Fecha inicio inscripción: </label><br>
						<input type="date" name="fechaInicioInscripcion"/><br><br>
						
						<label for="fechafininscripcion">Fecha fin inscripción: </label><br>
						<input type="date" name="fechaFinInscripcion"/><br><br>
						
						<label for="fechainicioreto">Fecha inicio reto: </label><br>
						<input type="datetime-local" name="fechaInicioReto"/><br><br>
						
						<label for="fechafinreto">Fecha fin reto: </label><br>
						<input type="datetime-local" name="fechaFinReto"/><br><br>
						
						<label for="fechapublicacion">Fecha publicacion: </label><br>
						<input type="datetime-local" name="fechaPublicacion"/><br><br>
						
						<label for="publicado">Publicado: </label><br>
						<input type="text" name="publicado"/><br><br>
						
						<label for="idprofesor">id Profesor: </label><br>
						<input type="text" name="idProfesor"/><br><br>
						
						<label for="idcategoria">id Categoria: </label><br>
						<input type="text" name="idCategoria"/><br><br>
						
						<input type="submit" name="anadir" value="Añadir"/>
					</form>
				</div>';
				
			if(isset ($_POST["anadir"])){
				$nombre = $_POST["nombre"];
				$dirigido = $_POST["dirigido"];
				$descripcion = $_POST["descripcion"];
				$fechaInicioInscripcion = $_POST["fechaInicioInscripcion"];
				$fechaFinInscripcion = $_POST["fechaFinInscripcion"];
				$fechaInicioReto = $_POST["fechaInicioReto"];
				$fechaFinReto = $_POST["fechaFinReto"];
				$fechaPublicacion = $_POST["fechaPublicacion"];
				$publicado = $_POST["publicado"];
				$idProfesor = $_POST["idProfesor"];
				$idCategoria = $_POST["idCategoria"];
				
				$consulta2 = "INSERT INTO retos(nombre, dirigido, descripcion, fechaInicioInscripcion, fechaFinInscripcion,
									fechaInicioReto, fechaFinReto, fechaPublicacion, publicado, idProfesor, idCategoria)
				VALUE('$nombre', '$dirigido', '$descripcion', '$fechaInicioInscripcion',
						'$fechaFinInscripcion','$fechaInicioReto','$fechaFinReto','$fechaPublicacion','$publicado', '$idProfesor', '$idCategoria');";
				
				if($mysqli->query($consulta2))
				{
					echo "se añadio correctamente";
				}
				else{
					echo "no se ha introducido datos o esta repetido";
				}
			
				$mysqli->close();
			}
			
		?>
		<br><a href="consulta.php"><input type="submit" value="Mostrar"></a><br><br>
	</body>
</html>