<?php
public class FacadeConsultas{
	private $conexion;

	function __construct(){
		$ConexionDB = new ConexionDB();
		$propiedadesConexion = parse_ini_file("conexion.ini");
		$this->setConexion($ConexionDB->crearConexion($propiedadesConexion['host_bd'],$propiedadesConexion['usuario_bd'],$propiedadesConexion['password_bd'],$propiedadesConexion['esquema_bd']));
	}


	public function solicitarCertificadoEstudios($documentoEstudiante,$codigoPago){
		$sql = "INSERT INTO "
	}

	public function getConexion(){
		return $this->$conexion;
	}

	public function setConexion($conexion){
		$this->$conexion = $conexion;
	}
}
?>