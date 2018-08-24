<?php
public class ConexionDB {

	public function crearConexion($hostBD,$usuarioBD,$passwordBD,$esquemaDB) {
		$mysqli = new mysqli($hostBD, $usuarioBD, $passwordBD, $esquemaDB);

		if($mysqli->connect_errno) {
			echo "Error: Fallo al conectarse a MySQL debido a: \n";
	    	echo "Errno: " . $mysqli->connect_errno . "\n";
	    	echo "Error: " . $mysqli->connect_error . "\n";
	    	$mysqli->close();
	    	$mysqli = null;
		} else {
			echo "Conexión Exitosa a la BD: " . $esquemaDB . ", en la IP: " . $hostBD . ", con el usuario: " . $usuarioBD . ", y con la contraseña: " . $passwordBD . "\n";
		}

		return $mysqli;
	}

	public function cerrarConexion($mysqli) {
		$mysqli->close();
	}
}
?>