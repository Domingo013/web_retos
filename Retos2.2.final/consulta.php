<html>
	<head>
		<meta charset=utf-8 />
        <meta content=autor value="Domingo Miño Redondo"/>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
        <title>Consultar datos de Categorías</title>
	</head>
	<body>
		<?php
			$usuario = "root";
			$contrasenia = "";
			$bd = "retos";
			$servidor = "localhost";
			$mysqli = new mysqli($servidor, $usuario, $contrasenia, $bd);
			echo '
				<div id="contenedor3">
					<table>
						<tr>
							<th>Nombre</th>
							<th>Dirigido</th>
							<th>Descripcion</th>
							<th>Fecha inicio inscripcion</th>
							<th>Fecha fin inscripcion</th>
							<th>Fecha inicio reto</th>
							<th>Fecha fin reto</th>
							<th>Fecha publicacion</th>
							<th>Publicado</th>
							<th>Eliminar</th>
							<th>Modificar</th>
						</tr>
				
			';
			$consulta = "SELECT * FROM retos;";
			$resultado = $mysqli->query($consulta);
			if($resultado->num_rows >0){	
				while($fila=$resultado-> fetch_assoc())
				{
					echo '<tr>
							<td>'.$fila["nombre"].'</td>
							<td>'.$fila["dirigido"].'</td>
							<td>'.$fila["descripcion"].'</td>
							<td>'.$fila["fechaInicioInscripcion"].'</td>
							<td>'.$fila["fechaFinInscripcion"].'</td>
							<td>'.$fila["fechaInicioReto"].'</td>
							<td>'.$fila["fechaFinReto"].'</td>
							<td>'.$fila["fechaPublicacion"].'</td>
							<td>'.$fila["publicado"].'</td>
							<td><a href="eliminar.php?id='.$fila["id"].'&procesoEliminar="eliminar"">🗑</td>
							<td><a href="modificar.php?id='.$fila["id"].'&procesoModificar="modificar"">✏</td>
						</tr>
					';
				}
			}
			echo '</table></div>';
			$mysqli->close();
		?>
		<a href="alta.php"><button>AÑADIR</button><br><br>
	</body>
</html>