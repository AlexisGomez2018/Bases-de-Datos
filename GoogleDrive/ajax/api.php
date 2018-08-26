<?php
	include("../class/class-conexion.php");
	$conexion = new Conexion();

	switch ($_GET['accion']) {
		case 'agregarPapelera':
			$codigoArchivo = $_POST['codigoArchivo'];

			$sql = sprintf("INSERT INTO TBL_PAPELERAS(CODIGO_ARCHIVO) ".
							"VALUES(%s)",
							$codigoArchivo
							);
			$res = $conexion->prepararConsulta($sql);
			$resultado = $conexion->ejecutarConsulta($res);
			if ($resultado) {
				echo json_encode(true);
			}else {
				echo json_encode(false);
			}
			break;
		case 'agregarDestacado':
			$codigoArchivo = $_POST['codigoArchivo'];

			$sql = sprintf("INSERT INTO TBL_ARCHIVOS_DESTACADOS(CODIGO_ARCHIVO) ".
							"VALUES(%s)",
							$codigoArchivo
							);
			$res = $conexion->prepararConsulta($sql);
			$resultado = $conexion->ejecutarConsulta($res);
			if ($resultado) {
				echo json_encode(true);
			}else {
				echo json_encode(false);
			}
				
			break;
		case 'cargarArchivosUsuario':
			$codigo = $_POST['codigoUsuario'];

			$sql = sprintf("SELECT A.CODIGO_ARCHIVO, A.NOMBRE FROM TBL_ARCHIVO A INNER JOIN TBL_USUARIO B ON(A.CODIGO_USUARIO = B.CODIGO_USUARIO) ".
				"LEFT JOIN TBL_PAPELERAS C ".
				"ON(A.CODIGO_ARCHIVO = C.CODIGO_ARCHIVO) ".
				"WHERE (B.CODIGO_USUARIO = %s) AND A.ARCHIVO IS NOT NULL AND C.CODIGO_ARCHIVO IS NULL",
				$codigo
				);


			$resp = $conexion->prepararConsulta($sql);
			$resultado = $conexion->ejecutarConsulta($resp);
			$arregloArchivos = array();
			$i = 0;
			while ($fila = $conexion->obtenerFila($resp)) {
				$arregloArchivos[$i] = $fila;
				$i++;
			}

			if ($resultado) {
				echo json_encode($arregloArchivos);
			}else{
				echo json_encode($sql);
			}

			
			break;
		case 'cargarPaises':

			$sql = 'SELECT CODIGO_LUGAR, NOMBRE_LUGAR FROM TBL_LUGARES WHERE CODIGO_TIPO_LUGAR = 1';

			$resp = $conexion->prepararConsulta($sql);			
		

			$resultadoPaises = $conexion->ejecutarConsulta($resp);
			$arregloPaises = array();
			$i = 0;
			while($filaPaises = $conexion->obtenerFila($resp)){
				$arregloPaises[$i] = $filaPaises;
				$i++;
			} 

			echo json_encode($arregloPaises);
			

			break;

			

		case 'registrarUsuario':
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$correo = $_POST['correo'];
			$psw = $_POST['psw'];
			$pswConfirm = $_POST['psw-confirm'];
			$pais = $_POST['pais'];
			$telefono = $_POST['telefono'];
			$dia = $_POST['dia'];
			$mes = $_POST['mes'];
			$anio = $_POST['anio'];
			$genero = $_POST['genero'];
			$tipoCorreo = $_POST['tipoCorreo'];
			$correoTxt = $_POST['correoTxt'];
			$email = $correo.$correoTxt;
			$fechaNacimiento = $anio.'/'.$mes.'/'.$dia;


			$sqlInsertarCorreo = sprintf("INSERT INTO TBL_CORREOS(CODIGO_TIPO_CORREO, CORREO) ".
										"VALUES(%s, '%s')",
										$tipoCorreo,
										$email
								);	
			$respuestaInsertarCorreo = $conexion->prepararConsulta($sqlInsertarCorreo);
			$resultadoInsertarCorreo = $conexion->ejecutarConsulta($respuestaInsertarCorreo);

			$sqlObtenerCorreo = sprintf("SELECT CODIGO_CORREO FROM TBL_CORREOS WHERE CORREO = '%s' ",
										$email
								);
			$respuestaObtenerCorreo = $conexion->prepararConsulta($sqlObtenerCorreo);
			$resultadoObtenerCorreo = $conexion->ejecutarConsulta($respuestaObtenerCorreo);
			$filaCorreo = $conexion->obtenerFila($respuestaObtenerCorreo);
	
			$sqlTelefono = sprintf("INSERT INTO TBL_TELEFONO (CODIGO_LUGAR, TELEFONO) ".
							"VALUES (%s, '%s')",
							$pais,
							$telefono

			);

			$respuestaInsertarTelefono = $conexion->prepararConsulta($sqlTelefono);
			$resultadoInsertarTelefono = $conexion->ejecutarConsulta($respuestaInsertarTelefono);
			

			$sqlConsultaTelefono = sprintf("SELECT CODIGO_TELEFONO FROM TBL_TELEFONO  WHERE TELEFONO = '%s'",
							$telefono

			);

			$respuestaObtenerTelefono = $conexion->prepararConsulta($sqlConsultaTelefono);
			$resultadoRespuestaTelefono = $conexion->ejecutarConsulta($respuestaObtenerTelefono);
			$filaTelefono = $conexion->obtenerFila($respuestaObtenerTelefono);

			$sqlInsertarPersona = sprintf("INSERT INTO TBL_PERSONAS (CODIGO_GENERO, CODIGO_TELEFONO, NOMBRE, APELLIDO, FECHA_NACIMIENTO) ".
							"VALUES (%s, %s, '%s', '%s', TO_DATE('%s', 'yyyy/mm/dd'))",
							$genero,
							$filaTelefono['CODIGO_TELEFONO'],
							$nombre,
							$apellido,
							$fechaNacimiento
						);

			$respuestaRegistroPersona = $conexion->prepararConsulta($sqlInsertarPersona);
			$resultadoInsertarPersona = $conexion->ejecutarConsulta($respuestaRegistroPersona);

			$sqlObtenerPersona = sprintf("SELECT CODIGO_PERSONA FROM TBL_PERSONAS  WHERE CODIGO_TELEFONO = '%s'",
							$filaTelefono['CODIGO_TELEFONO']
			);

			$respuestaObtenerPersona = $conexion->prepararConsulta($sqlObtenerPersona);
			$resultadoObtenerPersona = $conexion->ejecutarConsulta($respuestaObtenerPersona);
			$filaPersona = $conexion->obtenerFila($respuestaObtenerPersona);

			$sqlInsertarUsuario = sprintf("INSERT INTO TBL_USUARIO (CODIGO_USUARIO, CODIGO_CORREO, NOMBRE_USUARIO, CONTRASENA) ".
										"VALUES(%s, %s, '%s', '%s')",
										$filaPersona['CODIGO_PERSONA'],
										$filaCorreo['CODIGO_CORREO'],
										$correo,
										$psw

			);


			$respuestaInsertarUsuario = $conexion->prepararConsulta($sqlInsertarUsuario);
			$resultadoInsertarUsuario = $conexion->ejecutarConsulta($respuestaInsertarUsuario);

			


			if ($resultadoInsertarUsuario) {
				echo json_encode(true);
			} else {
				echo json_encode(false);
			}

			break;

		case 'cargarCorreos':
				$sql = 'SELECT CODIGO_CORREO, NOMBRE_TIPO_CORREO FROM TBL_TIPO_CORREOS';

				$resp = $conexion->prepararConsulta($sql);			
			

				$resultadoCorreos = $conexion->ejecutarConsulta($resp);
				$arregloCorreos = array();
				$i = 0;
				while($filaCorreos = $conexion->obtenerFila($resp)){
					$arregloCorreos[$i] = $filaCorreos;
					$i++;
				} 

				echo json_encode($arregloCorreos);
			
			
			break;
		case 'cargarGeneros':
				$sql = 'SELECT CODIGO_GENERO, GENERO FROM TBL_GENERO';

				$resp = $conexion->prepararConsulta($sql);			
			

				$resultadoGeneros = $conexion->ejecutarConsulta($resp);
				$arregloGeneros = array();
				$i = 0;
				while($filaGeneros = $conexion->obtenerFila($resp)){
					$arregloGeneros[$i] = $filaGeneros;
					$i++;
				} 

				echo json_encode($arregloGeneros);
			
				
			break;

		case 'cargarTarjetas':
				$sql = 'SELECT CODIGO_MARCA_TARJETA, NOMBRE_MARCA_TARJETA FROM TBL_MARCAS_TARJETAS';

				$resp = $conexion->prepararConsulta($sql);			
			

				$resultadoTarjetas = $conexion->ejecutarConsulta($resp);
				$arregloTarjetas = array();
				$i = 0;
				while($filaTarjetas = $conexion->obtenerFila($resp)){
					$arregloTarjetas[$i] = $filaTarjetas;
					$i++;
				} 

				echo json_encode($arregloTarjetas);
			break;
		case 'cargarPlanes':
				$sql = 'SELECT CODIGO_PLAN, NOMBRE_SUSCRIPCION, PRECIO FROM TBL_PLANES';

				$resp = $conexion->prepararConsulta($sql);			
			

				$resultadoPlanes = $conexion->ejecutarConsulta($resp);
				$arregloPlanes = array();
				$i = 0;
				while($filaPlanes = $conexion->obtenerFila($resp)){
					$arregloPlanes[$i] = $filaPlanes;
					$i++;
				} 

				echo json_encode($arregloPlanes);
			# code...
			break;
		case 'iniciarSesion':
				session_start();
   				$conexion = new Conexion();

   				$correo = $_POST['correo'];
   				$pass = $_POST['pass'];

   				
				$sql = sprintf( "SELECT B.CODIGO_USUARIO, B.NOMBRE_USUARIO, B.CONTRASENA, A.CORREO ".
								"FROM TBL_CORREOS A ".
								"INNER JOIN TBL_USUARIO B ". 
								"ON(B.CODIGO_CORREO = A.CODIGO_CORREO) ".
								"WHERE(A.CORREO = '%s' AND B.CONTRASENA = '%s')",
								$correo,
								$pass
							);
				
				
				$resp = $conexion->prepararConsulta($sql);
				$resultado = $conexion->ejecutarConsulta($resp);
				$respuesta = array();
				if ($conexion->cantidadRegistros($resp)==0){
				    $respuesta = $conexion->obtenerFila($resp);
				    $respuesta["codigoResultado"] = 0;
				    $respuesta["mensajeResultado"] = "El usuario si existe";
				    $_SESSION["usr"] = $respuesta["NOMBRE_USUARIO"];
				    $_SESSION["psw"] = $respuesta["CONTRASENA"];
				    $_SESSION["correo"] = $respuesta["CORREO"];
				    $_SESSION['codigo_usuario'] = $respuesta['CODIGO_USUARIO'];
				}else {
				    $respuesta["codigoResultado"] = 1;
				    $respuesta["mensajeResultado"] = $sql;
				    session_destroy();
				}
				echo json_encode($respuesta);
			break;

		case 'cargarPrivacidad':
			$sqlPrivacidad = 'SELECT* FROM TBL_TIPOS_DE_PRIVACIDAD';

			$resp = $conexion->prepararConsulta($sqlPrivacidad);			
		

			$resultadoPaises = $conexion->ejecutarConsulta($resp);
			$arregloPaises = array();
			$i = 0;
			while($filaPaises = $conexion->obtenerFila($resp)){
				$arregloPaises[$i] = $filaPaises;
				$i++;
			} 

			echo json_encode($arregloPaises);
			
		break;
		
		case 'cargarArchivos':
			$sqlArchivos = 'SELECT* FROM TBL_TIPO_ARCHIVO';

			$resp = $conexion->prepararConsulta($sqlArchivos);			
		

			$resultadoArchivos = $conexion->ejecutarConsulta($resp);
			$arregloArchivos = array();
			$i = 0;
			while($filaArchivos = $conexion->obtenerFila($resp)){
				$arregloArchivos[$i] = $filaArchivos;
				$i++;
			} 

			echo json_encode($arregloArchivos);
			break;

		case 'crearCarpeta':
				$nombre = $_POST['nombre'];
				$codigo = $_POST['codigoUsuario'];
				$sql = sprintf("INSERT INTO TBL_CARPETAS(NOMBRE, CODIGO_USUARIO)".
						"VALUES('%s', %s)",
						$nombre,
						$codigo
					);

				$resp = $conexion->prepararConsulta($sql);
				$resultado = $conexion->ejecutarConsulta($resp);

				if ($resultado) {
					echo json_encode("Insertado");
				}else{
					echo json_encode("error");
				}

		break;

		case 'suscribirse':
			$codigoUsuario = $_POST['codigoUsuario'];
			$codigoTarjeta = $_POST['codigoTarjeta'];
			$codigoTipoTarjeta = $_POST['codigoTipoTarjeta'];
			$numeroTarjeta = $_POST['numeroTarjeta'];
			$codigoMetodoPago = $_POST['codigoMeotodoPago'];
			$csv = $_POST['csv'];

			$sql = sprintf("INSERT INTO TBL_TARJETAS_DE_PAGO(CODIGO_PERSONA, CODIGO_MARCA_TARJETA, CODIGO_TIPO_TARJETA, NUMERO_TARJETA_DE_PAGO, CSV) ".
							"VALUES(%s, %s, %s, '%s', '%s')",
							$codigoUsuario,
							$codigoTarjeta,
							$codigoTipoTarjeta,
							$numeroTarjeta,
							$csv
							);
			$resp = $conexion->prepararConsulta($sql);
			$resultado = $conexion->ejecutarConsulta($resp);

			$sqlPago = sprintf("INSERT INTO TBL_PAGOS(PAGO_CODIGO_TARJETA, CODIGO_METODO_PAGO, DESCRIPCION) ". 
								"VALUES(%s, %s, 'Pago Suscripcion')",
								$codigoTarjeta,
								$codigoMetodoPago
								);
			$resp1 = $conexion->prepararConsulta($sqlPago);
			$resultado1 = $conexion->ejecutarConsulta($resp1);

			if ($resultado1) {
				echo json_encode(true);
			} else{
				echo json_encode(false);
			}		
			break;
		case 'cargarTiposTarjetas':
			$sqlTiposTarjetas = 'SELECT CODIGO_TIPO_TARJETA, TIPO_TAREJTA FROM TBL_TIPOS_TARJETAS';

			$resp = $conexion->prepararConsulta($sqlTiposTarjetas);			
		

			$resultadoTiposTarjetas = $conexion->ejecutarConsulta($resp);
			$arregloTiposTarjetas = array();
			$i = 0;
			while($filaTiposTarjetas = $conexion->obtenerFila($resp)){
				$arregloTiposTarjetas[$i] = $filaTiposTarjetas;
				$i++;
			} 

			echo json_encode($arregloTiposTarjetas);
			break;
		case 'cargarTiposDePago':
			$sqlTiposPago = 'SELECT CODIGO_METODO_PAGO, NOMBRE_METODO_PAGO FROM TBL_METODOS_DE_PAGO';

			$resp = $conexion->prepararConsulta($sqlTiposPago);			
		

			$resultadoTiposPago = $conexion->ejecutarConsulta($resp);
			$arregloTiposPago = array();
			$i = 0;
			while($filaTiposPago = $conexion->obtenerFila($resp)){
				$arregloTiposPago[$i] = $filaTiposPago;
				$i++;
			} 

			echo json_encode($arregloTiposPago);
			break;
		
		case 'verDestacado':
			$codigoUsuario = $_POST['codigoUsuario'];

			$sql = sprintf("SELECT A.CODIGO_ARCHIVO, A.NOMBRE, A.ARCHIVO, C.CODIGO_TIPO_ARCHIVO ".
							"FROM TBL_ARCHIVO A ".
							"INNER JOIN TBL_ARCHIVOS_DESTACADOS B ".
							"ON(A.CODIGO_ARCHIVO = B.CODIGO_ARCHIVO) ".
							"INNER JOIN TBL_TIPO_ARCHIVO C ".
							"ON(A.CODIGO_TIPO_ARCHIVO = C.CODIGO_TIPO_ARCHIVO) ".
							"WHERE(A.CODIGO_USUARIO = %s)",
							$codigoUsuario
						);
			$resp = $conexion->prepararConsulta($sql);
			$resultado = $conexion->ejecutarConsulta($resp);
			$arregloA = array();
			$i = 0;

			while ($filaArchivos = $conexion->obtenerFila($resp)) {
					$arregloA[$i] = $filaArchivos;
					$i++;
			}	
			echo json_encode($arregloA);

			break;
		case 'verArchivos':
			 $codigoUsuario = $_POST['codigoUsuario'];

			 $sql = sprintf("SELECT* FROM TBL_ARCHIVO WHERE (CODIGO_USUARIO = %s)",
			 				$codigoUsuario
							);
			$resp = $conexion->prepararConsulta($sql);
			$resultado = $conexion->ejecutarConsulta($resp);
			$i=0;
			$archivos = array();

			while ($fila = $conexion->obtenerFila($resp)) {
					$archivo[$i] = $fila;
					$i++;
				}	
			echo json_encode($archivo);
			break;
		default:
			# code...
			break;

	}

	$conexion ->cerrarConexion();


?>