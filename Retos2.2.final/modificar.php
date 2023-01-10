<?php
	if(isset($_GET["id"])){
		$usuario = "root";
		$contrasenia = "";
		$bd = "retos";
		$servidor = "localhost";
		$mysqli = new mysqli($servidor, $usuario, $contrasenia, $bd);
		
		$id=$_GET["id"];
		
		$consulta = 'SELECT *
						FROM retos
						WHERE id='.$id.';
		';
		$resultado = $mysqli->query($consulta);
		while($fila=$resultado -> fetch_assoc()){
			$nombre = $fila['nombre'];
			$dirigido = $fila["dirigido"];
			$descripcion = $fila["descripcion"];
			$fechaInicioInscripcion = $fila["fechaInicioInscripcion"];
			$fechaFinInscripcion = $fila["fechaFinInscripcion"];
			$fechaInicioReto = $fila["fechaInicioReto"];
			$fechaFinReto = $fila["fechaFinReto"];
			$fechaPublicacion = $fila["fechaPublicacion"];
			$publicado = $fila["publicado"];
			$idProfesor = $fila["idProfesor"];
			$idCategoria = $fila["idCategoria"];
		}
		echo '<!DOCTYPE html>
				<html>
					<head>
						<title>modificacion</title>
						<link rel="stylesheet" type="text/css" href="estilo.css"/>
					</head>
					<body>
						<div id="contenedor2">
							<h3>modificacion1</h3>
							<form method="post" action="modificar.php?id='.$id.'">
								<label for="nombre">Nombre de la categoria: </label><br>
								<input type="text" name="nombre" value="'.$nombre.'"><br><br>
								
								<label for="dirigido">Dirigido: </label><br>
								<input type="text" name="dirigido" maxlength="100" value="'.$dirigido.'"/><br><br>
								
								<label for="descripcion">Descripción: </label><br>
								<input type="text" name="descripcion" maxlength="150" value="'.$descripcion.'"/><br><br>
								
								<label for="fechainicioinscripcion">Fecha inicio inscripción: </label><br>
								<input type="datetime-local" name="fechaInicioInscripcion" value="'.$fechaInicioInscripcion.'"/><br><br>
								
								<label for="fechafininscripcion">Fecha fin inscripción: </label><br>
								<input type="datetime-local" name="fechaFinInscripcion"/ value="'.$fechaFinInscripcion.'"><br><br>
								
								<label for="fechainicioreto">Fecha inicio reto: </label><br>
								<input type="datetime-local" name="fechaInicioReto" value="'.$fechaInicioReto.'"/><br><br>
								
								<label for="fechafinreto">Fecha fin reto: </label><br>
								<input type="datetime-local" name="fechaFinReto" value="'.$fechaFinReto.'"/><br><br>
								
								<label for="fechapublicacion">Fecha publicacion: </label><br>
								<input type="datetime-local" name="fechaPublicacion" value="'.$fechaPublicacion.'"/><br><br>
								
								<label for="publicado">Publicado: </label><br>
								<input type="text" name="publicado" value="'.$publicado.'"/><br><br>
								
								<label for="idprofesor">id Profesor: </label><br>
								<input type="text" name="idProfesor" value="'.$idProfesor.'"/><br><br>
								
								<label for="idcategoria">id Categoria: </label><br>
								<input type="text" name="idCategoria" value="'.$idCategoria.'"/><br><br>
								
								<input type="submit" value="modificar"><br><br>
							</form>
						</div>
					</body>
				</html>';
	}else{
		include 'consulta.php';
	}
	if(isset($_POST["nombre"])){
		$id = $_GET["id"];
		$nombreMod=$_POST["nombre"];
		$dirigidoMod = $_POST["dirigido"];
		$descripcionMod = $_POST["descripcion"];
		$fechaInicioInscripcionMod = $_POST["fechaInicioInscripcion"];
		$fechaFinInscripcionMod = $_POST["fechaFinInscripcion"];
		$fechaInicioRetoMod = $_POST["fechaInicioReto"];
		$fechaFinRetoMod = $_POST["fechaFinReto"];
		$fechaPublicacionMod = $_POST["fechaPublicacion"];
		$publicadoMod = $_POST["publicado"];
		$idProfesorMod = $_POST["idProfesor"];
		$idCategoriaMod = $_POST["idCategoria"];
		$usuarioMod = "root";
		$contrasenia = "";
		$bd = "retos";
		$servidor = "localhost";
		$mysqli = new mysqli($servidor, $usuario, $contrasenia, $bd);
		
		$sql='UPDATE retos 
					SET nombre = "'.$nombreMod.'" 
					SET dirigido = "'.$dirigidoMod.'" 
					SET descripcion = "'.$descripcionMod.'" 
					SET fechaInicioInscripcion = "'.$fechaInicioInscripcionMod.'" 
					SET fechaFinInscripcion = "'.$fechaFinInscripcionMod.'" 
					SET fechaInicioReto = "'.$fechaInicioRetoMod.'" 
					SET fechaFinReto = "'.$fechaFinRetoMod.'" 
					SET fechaPublicacion = "'.$fechaPublicacionMod.'" 
					SET publicado = "'.$publicadoMod.'" 
					SET idProfesor = "'.$idProfesorMod.'" 
					SET idCategoria = "'.$idCategoriaMod.'" 
					WHERE id='.$id.';';
		$resultado = $mysqli->query($sql);
		$mysqli->close();
		header('Location: consulta.php');
	}
?>