<?php
	if(isset($_GET["id"]))
	{
		$id = $_GET["id"];
		$usuario = "root";
		$contrasenia = "";
		$bd = "retos";
		$servidor = "localhost";
		$mysqli = new mysqli($servidor, $usuario, $contrasenia, $bd);
		
		$sql = "DELETE FROM retos WHERE id=".$id.";";
		$resultado = $mysqli -> query($sql);
		
		$mysqli -> close();
		
		header('Location: consulta.php');
	}
?>