<?php
	
	if(isset($_GET['procesoBorrar'])){
		$id = $_GET['id'];
		header('Location:eliminar.php?id='.$id.'');
	}
	if(isset($_GET['procesoModificar'])){
		$id = $_GET['id'];
		header('Location:modificar.php?id='.$id.'');
	}
	
?>