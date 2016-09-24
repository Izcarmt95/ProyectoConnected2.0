<?php
include("../Connection/connectionMySQL.php");

function registerPerson($nombre, $apellidoUno, $apellidoDos, $cedula, 
								$correo, $foto, $direccion, $id_distrito, $id_usuario)
	{	
		if($id_usuario == null){
			$id_usuario = "null";
		}
		$connection = dbConnectMySQL();

		$insercion = 'call insertarPersonas("'.$nombre.'", "'.$apellidoUno.'", "'.$apellidoDos.'", "'.$cedula.'", "'.$correo.'","'.$foto.'","'.$direccion.'",'.$id_distrito.','.$id_usuario.')';

		mysql_query($insercion);
		echo $insercion;

	}

?>