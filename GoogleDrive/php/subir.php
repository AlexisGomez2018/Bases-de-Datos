<?php 
	include("../class/class-conexion.php");
	$conexion = new Conexion();
	session_start();


			$nombre = $_POST["txt-nombre-archivo"];
			$codigoPrivacidad = $_REQUEST['slc-privacidad'];
			$codigoArchivo = $_REQUEST['slc-archivos'];
			$codigoUsuario = $_SESSION['codigo_usuario'];

			$ruta = "../archivos/";
			opendir($ruta);

			$destino = $ruta.$_FILES['archivo-subir']['name'];
			copy($_FILES['archivo-subir']['tmp_name'], $destino);
			$archivo = $_FILES['archivo-subir']['name'][0];

			echo $archivo;


			$sqlSubirArchivo = sprintf("INSERT INTO TBL_ARCHIVO (CODIGO_TIPO_PRIVACIDAD, CODIGO_TIPO_ARCHIVO, NOMBRE, CODIGO_USUARIO, ARCHIVO) ".
								"VALUES(%s,%s,'%s', %s, '%s')",
									$codigoPrivacidad,
									$codigoArchivo,
									$nombre,
									$codigoUsuario,
									$archivo
									
							);
			echo $sqlSubirArchivo;
			$respuesta = $conexion->prepararConsulta($sqlSubirArchivo);
			$resultado = $conexion->ejecutarConsulta($respuesta);

			if($resultado){
				echo "el archivo se subio";
				header("location: ../index.php");
				
			} else {
				echo "hay un error";
			}


 ?>