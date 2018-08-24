<?php

class ConexionManager{

	public function conectar($datosConexion) {
		$conexionBD = $datosConexion;
		$mysqli = new mysqli('ivrdesarrollo.ccltyawugee2.us-east-2.rds.amazonaws.com', 'awsrdsmysql', 'awsmysql123456', 'colegio', '3306');
		$conexionBD->setMySQLi($mysqli);
		return $conexionBD;
	}

	public function desconectar($datosConexion) {
		$conexionBD = $datosConexion;
		$mysqli = $conexionBD->getMySQLi();
		$mysqli->close();
		$conexionBD->setMySQLi($mysqli);
		return $conexionBD;
	}

}

?>