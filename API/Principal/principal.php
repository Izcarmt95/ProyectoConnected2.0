<?php

	$tag = $_POST['tag'];
	if(isset($tag)){
		if($tag == 'register'){
			echo $_POST['name'];
		}

	}	
	/*	registerPerson($_POST['nombre'],$_POST['apellidoUno'],$_POST['apellidoDos'],$_POST['cedula'], 
						$_POST['correo'],$_POST['foto'],$_POST['direccion'],$_POST['id_distrito'], $_POST['id_usuario']);
	}
	}

*/

?>
