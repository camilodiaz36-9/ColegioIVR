#!/usr/bin/php
<?php
require_once 'vendor/autoload.php';
use PAGI\Client\Impl\ClientImpl as PagiClient;

//Inicializar variables
$idEstudiante = 0;
$idTramite = 0;
$idPago = 0;

//Obtner instancia de cliente PAGI
$pagiClientOptions = array();
$pagiClient = PagiClient::getInstance($pagiClientOptions);

//Conectar a BD
$mysqli = new mysqli('ivrproduccion.ccltyawugee2.us-east-2.rds.amazonaws.com', 'awsrdsmysql', 'awsmysql123456', 'Colegio', '3306');

//Se responde la llamada
$pagiClient->answer();

//Se saluda y se le avisa al usuario que se le va a mostrar el menú
$pagiClient->streamFile("Principal","#");

//Empieza el menú
$bool1 = true;
$result1 = $pagiClient->getOption("1", "1", 1500); //Rectoría

if($result1->isTimeout()) {
	$bool1 = true;
} else {
	$bool1 = false;
}

if($bool1) {
	$bool2 = true;
	$result2 = $pagiClient->getOption("2", "2", 1500); //Secretaría
	
	if($result2->isTimeout()) {
		$bool2 = true;
	} else {
		$bool2 = false;
	}

	if($bool2) {
		$bool3 = true;
		$result3 = $pagiClient->getOption("3", "3", 1500); //Coordinación Académica
		
		if($result3->isTimeout()) {
			$bool3 = true;
		} else {
			$bool3 = false;
		}

		if($bool3) {
			$bool4 = true;
			$result4 = $pagiClient->getOption("4", "4", 1500); //Coordinación de Disciplina
			
			if($result4->isTimeout()) {
				$bool4 = true;
			} else {
				$bool4 = false;
			}

			if($bool4) {
				$bool5 = true;
				$result5 = $pagiClient->getOption("5", "5", 1500); //Biblioteca
				
				if($result5->isTimeout()) {
					$bool5 = true;
				} else {
					$bool5 = false;
				}

				if($bool5) {
					$bool6 = true;
					$result6 = $pagiClient->getOption("6", "6", 1500); //Tesorería
					
					if($result6->isTimeout()) {
						$bool6 = true;
					} else {
						$bool6 = false;
					}

					if(!$bool6) {
						$result61 = $pagiClient->getOption("61", "1", 1500); 

						if($result61->isTimeout()) {
							
							$result62 = $pagiClient->getOption("62", "2", 1500);

							if ($result62->isTimeout()) {
								//Colgar, salir
							} else {
								//Opción 6-2
								//Misma lógica, opción 2-3
							}
						} else {
							//Opción 6-1
							//Pedir documento, consultar deudas.
							//Si tiene mostrarle el detalle de cada una: Concepto, costo, fecha de pago
							//Si no, decirle que no tiene deudas y salir
						}

					} 
				} else {

					$result51 = $pagiClient->getOption("51", "1", 1500);

					if($result51->isTimeout()) {
						
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

				if($result41->isTimeout()) {
					
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

			if($result31->isTimeout()) {
				
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

		if($result21->isTimeout()) {
			
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
			//Si existe en BD entonces pedir id de Pago, si es válido (existe en BD), insertar Solicitud de Certificado de Estudios y mostrar fecha de entrega (1 día después de hoy).
			//Si no existe, decirle que el estudiante no se encuentra, que verifique e intente otra vez.
			//Si a la 2da no funciona decirle que no se encuentra, que verifique e intente otra vez.
			//Si a la 3era no lo encuentra decirle que no se encuentra y salir
			
			$result = $pagiClient->getData("DocIdEst", 5000, 6); //Crear archivo de constantes
			$docIdEst = $result->getDigits();
			$sql = "select * from Estudiante where numeroIdentificacion = " . $docIdEst;
			$idEstudiante = $docIdEst;
			$resultado = $mysqli->query($sql);
			if($resultado->num_rows === 0) {
				//No se encontró el estudiante, intentar otra vez
				$idEstudiante = 0;
				$pagiClient->streamFile("ValidationFail","#");
				$result1 = $pagiClient->getData("DocIdEst", 5000, 6); //Crear archivo de constantes
				$docIdEst1 = $result1->getDigits();
				$sql1 = "select * from Estudiante where numeroIdentificacion = " . $docIdEst1;
				$idEstudiante = $docIdEst1;
				$resultado1 = $mysqli->query($sql1);
				if($resultado1->num_rows === 0) {
					//No se encontró el estudiante, intentar otra vez más.
					$idEstudiante = 0;
					$pagiClient->streamFile("ValidationFail","#");
					$result2 = $pagiClient->getData("DocIdEst", 5000, 6); //Crear archivo de constantes
					$docIdEst2 = $result2->getDigits();
					$sql2 = "select * from Estudiante where numeroIdentificacion = " . $docIdEst2;
					$idEstudiante = $docIdEst2;
					$resultado2 = $mysqli->query($sql2);
					if($resultado2->num_rows === 0) {
						$idEstudiante = 0;
						$pagiClient->streamFile("Bye","#"); //Falló validación, salir.
					} else {
						//Se encontró al estudiante en el tercer intento, pedir id de pago
						$result = $pagiClient->getData("PaymentId", 2500, 6); //Crear archivo de constantes
						$paymentId = $result->getDigits();
						$sql = "select * from Pago where numeroReferencia = " . $paymentId;
						$idPago = $paymentId;
						$resultado = $mysqli->query($sql);

						if($resultado->num_rows === 0) {
							//2do intento id de pago
							$idPago = 0;
							$pagiClient->streamFile("ValidationFail","#");
							$result = $pagiClient->getData("PaymentId", 2500, 6); //Crear archivo de constantes
							$paymentId = $result->getDigits();
							$sql = "select * from Pago where numeroReferencia = " . $paymentId;
							$idPago = $paymentId;
							$resultado = $mysqli->query($sql);

							if($resultado->num_rows === 0) {
								//3er intento id de pago
								$idPago = 0;
								$pagiClient->streamFile("ValidationFail","#");
								$result = $pagiClient->getData("PaymentId", 2500, 6); //Crear archivo de constantes
								$paymentId = $result->getDigits();
								$sql = "select * from Pago where numeroReferencia = " . $paymentId;
								$idPago = $paymentId;
								$resultado = $mysqli->query($sql);

								if($resultado->num_rows === 0) {
									$idPago = 0;
									$pagiClient->streamFile("Bye","#"); //Falló validación, salir.
								} else {
									//Se encontró el ID de Pago en el 3er intento, generar solicitud de certificado.
									
									$pagiClient->sayPhonetic("R1");
									$sql = "select idEstudiante from Estudiante where numeroIdentificacion = " . $idEstudiante;
									$resultado = $mysqli->query($sql);
									$estudiante = $resultado->fetch_assoc();
									$idEstudiante = $estudiante['idEstudiante'];
									$pagiClient->sayPhonetic($idEstudiante);
									$pagiClient->consoleLog("Consultó el estudiante");

									$sql = "select idTramite from Tramite where sigla = 'CE'";
									$resultado = $mysqli->query($sql);
									$tramite = $resultado->fetch_assoc();
									$idTramite = $tramite['idTramite'];
									$pagiClient->sayPhonetic($idTramite);
									$pagiClient->consoleLog("Consultó el trámite");

									$sql = "select idPago from Pago where numeroReferencia = " . $idPago;
									$resultado = $mysqli->query($sql);
									$pago = $resultado->fetch_assoc();
									$idPago = $pago['idPago'];
									$pagiClient->sayPhonetic($idPago);
									$pagiClient->consoleLog("Consultó el pago");

									$sql = "insert into Solicitud(fecha_recibido, fecha_entrega, Estudiante_idEstudiante, Tramite_idTramite, Pago_idPago) values(CURRENT_TIMESTAMP, NOW() + INTERVAL 1 DAY, " . $idEstudiante . ", " . $idTramite . ", " . $idPago . ")";

									$resultado = $mysqli->query($sql);
									if(!$resultado) {
										$pagiClient->sayPhonetic("F");
									} else {
										$pagiClient->sayPhonetic("RC");
									}
								}
							} else {
								//Se encontró el ID de Pago en el 2do intento, generar solicitud de certificado.
								$pagiClient->sayPhonetic("RB");
							}
						} else {
							//Se encontró el ID de Pago en el 1er intento, generar solicitud de certificado.
							$pagiClient->sayPhonetic("RA");
						}
					}
				} else {
					//Se encontró al estudiante en el segundo intento
					$pagiClient->sayPhonetic("RBB");

				}
			} else {
				//Se encontró el estudiante en el primer intento
				$pagiClient->sayPhonetic("RAA");
			}

		}

	}
} else {
	//Decirle al usuario que se va a redirigir su llamada al rector
	$pagiClient->streamFile("11", "#");
	$sql = "select e.numero as NumeroExtension from Usuario u inner join Rol r on r.idRol = u.Rol_idRol inner join Extension e on e.idExtension = u.Extension_idExtension where r.nombre = 'Rector'";
	if($mysqli->connect_errno){

		$pagiClient->consoleLog($mysqli->connect_errno);
		$pagiClient->consoleLog($mysqli->connect_error);
		$pagiClient->streamFile("ErrorBD","#");
		$pagiClient->streamFile("Bye","#");
	} else {
		$resultado = $mysqli->query($sql);
		if(!$resultado){
			$pagiClient->streamFile("ErrorBD","#");
			$pagiClient->streamFile("Bye","#");
		} else {
			$extension = $resultado->fetch_assoc();
			$pagiClient->sayPhonetic($extension['NumeroExtension']);	
		}
		
		$resultado->free();
		$mysqli->close();
	}
	$mysqli->close();
}


$pagiClient->hangup();

?>