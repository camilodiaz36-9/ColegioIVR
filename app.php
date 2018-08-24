#!/usr/bin/php
<?php
require_once 'vendor/autoload.php';
use PAGI\Client\Impl\ClientImpl as PagiClient;
include 'ConexionBD.php';
include 'ConexionManager.php';

/*
$conexionBD = new ConexionBD;
$conexionBD->setHost("ivrdesarrollo.ccltyawugee2.us-east-2.rds.amazonaws.com");
$conexionBD->setUser("awsrdsmysql");
$conexionBD->setPw("awsmysql123456");
$conexionBD->setBd("colegio");


$conexionManager = new ConexionManager;
$conexionBD = $conexionManager->conectar($conexionBD);*/

$pagiClientOptions = array();
$pagiClient = PagiClient::getInstance($pagiClientOptions);
//Se responde la llamada
$pagiClient->answer();
//Se saluda y se le avisa al usuario que se le va a mostrar el menú
$pagiClient->streamFile("Principal","#");

$bool1 = true;
$result1 = $pagiClient->getOption("1", "1", 1500);

if($result1->isTimeout()) {
	$bool1 = true;
} else {
	$bool1 = false;
}

if($bool1) {
	$bool2 = true;
	$result2 = $pagiClient->getOption("2", "2", 1500);
	
	if($result2->isTimeout()) {
		$bool2 = true;
	} else {
		$bool2 = false;
	}

	if($bool2) {
		$bool3 = true;
		$result3 = $pagiClient->getOption("3", "3", 1500);
		
		if($result3->isTimeout()) {
			$bool3 = true;
		} else {
			$bool3 = false;
		}

		if($bool3) {
			$bool4 = true;
			$result4 = $pagiClient->getOption("4", "4", 1500);
			
			if($result4->isTimeout()) {
				$bool4 = true;
			} else {
				$bool4 = false;
			}

			if($bool4) {
				$bool5 = true;
				$result5 = $pagiClient->getOption("5", "5", 1500);
				
				if($result5->isTimeout()) {
					$bool5 = true;
				} else {
					$bool5 = false;
				}

				if($bool5) {
					$bool6 = true;
					$result6 = $pagiClient->getOption("6", "6", 1500);
					
					if($result6->isTimeout()) {
						$bool6 = true;
					} else {
						$bool6 = false;
					}

					if(!$bool6) {
						$result61 = $pagiClient->getOption("61", "1", 1500);

						if($result61->isTimeout()){
							
							$result62 = $pagiClient->getOption("62", "2", 1500);

							if ($result62->isTimeout()) {
								//Colgar, salir
							} else {
								//Opción 6-2
								//Misma lógica, opción 2-3
							}
						} else {
							//opción 6-1
							//Pedir documento, consultar deudas.
							//Si tiene mostrarle el detalle de cada una: Concepto, costo, fecha de pago
							//Si no, decirle que no tiene deudas y salir
						}

					} 
				} else {

					$result51 = $pagiClient->getOption("51", "1", 1500);

					if($result51->isTimeout()){
						
						$result52 = $pagiClient->getOption("52", "2", 1500);

						if ($result52->isTimeout()) {
							
							//Colgar, no digitó nada

						} else {
							//Opción 5-2
							//Misma ĺógica, opción 2-3
						}
					} else {
						//Opción 5-1
						//Pedir documento, consultar prestamos.
						//Si tiene un pendiente decirle la fecha de entrega.
						//Si no, decirle que no tiene pendiente ninguno y salir.
					}

				}
			} else {

				$result41 = $pagiClient->getOption("41", "1", 1500);

				if($result41->isTimeout()){
					
					$result42 = $pagiClient->getOption("42", "2", 1500);

					if ($result42->isTimeout()) {
						
						$result43 = $pagiClient->getOption("43", "3", 1500);

						if($result43->isTimeout()) {
							//Colgar, no digitó ninguna opción válida
						} else {
							//Opción 4-3
							//Misma lógica 2-3
						}

					} else {
						//Opción 4-2
						//Misma lógica 3-2
					}
				} else {
					//Opción 4-1
					//Misma lógica 2-1
				}

			}
		} else {

			$result31 = $pagiClient->getOption("31", "1", 1500);

			if($result31->isTimeout()){
				
				$result32 = $pagiClient->getOption("32", "2", 1500);

				if ($result32->isTimeout()) {
					
					$result33 = $pagiClient->getOption("33", "3", 1500);

					if($result33->isTimeout()) {
						//Colgar, no digitó ninguna opción válida
					} else {
						//Opción 3-3
						//La misma ĺógica que en la 2-3
					}

				} else {
					//Opción 3-2
					//Se pide el documento y se consultan las citas que tenga.
					//Si tiene, se le muestra en qué fecha, y con cual profesor (En módulo web pedir el audio con el nombre del profesor para reproducirlo aquí), que se acerque al colegio, y salir.
					//Si no, decirle que no tiene citas pendientes y salir
				}
			} else {
				//Opción 3-1
				//La misma ĺógica que en la 2-1
			}

		}
	} else {

		$result21 = $pagiClient->getOption("21", "1", 1500);

		if($result21->isTimeout()){
			
			$result22 = $pagiClient->getOption("22", "2", 1500);

			if ($result22->isTimeout()) {
				
				$result23 = $pagiClient->getOption("23", "3", 1500);

				if($result23->isTimeout()) {
					//Colgar, no digitó ninguna opción válida
				} else {
					//Opción 2-3
					//Decirle al usuario que se va a redirigir su llamada a la secretaría
					//Poner la extensión que tenga asignada la secretaria y salir.
				}

			} else {
				//Opción 2-2
				//Mostrar audio explicando los diferentes precios de cada trámite.
				//Salir
			}
		} else {
			//Opción 2-1
			//Solicitar numero de identificación del estudiante
			//Si existe en BD entonces insertar Solicitud de Certificado y mostrar fecha de entrega (1 día después de hoy)
			//Si no existe, decirle que el estudiante no se encuentra, que verifique e intente otra vez.
			//Si a la 2da no funciona decirle que no se encuentra, que verifique e intente otra vez.
			//Si a la 3era no lo encuentra decirle que no se encuentra y salir.
		}

	}
} else {
	//Decirle al usuario que se va a redirigir su llamada al rector
	$pagiClient->streamFile("11", "#");
	//Poner la extensión que tenga asignada el rector y salir de la app.
	/*
	$sql = "select e.numero as NumeroExtension from usuario u inner join rol r on r.idRol = u.Rol_idRol inner join extension e on e.idExtension = u.Extension_idExtension where r.nombre = 'Rector';";
	$resultado = $conexionBD->getMySQLi()->query($sql);
	$extension = $resultado->fetch_assoc();
	$pagiClient->setExtension($extension['NumeroExtension']);*/
}

//Antes de colgar agradecerle por usar los servicios.

/*
$conexionBD = $conexionManager->desconectar($conexionBD);
$conexionBD = null;*/
$pagiClient->hangup();

?>