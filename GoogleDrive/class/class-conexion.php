<?php
	class Conexion{
		private $host = "localhost/XE";
		private $usuario = "DRIVE";
		private $password = "oracle";
		private $link;

		public function __construct(){
			$this->link = oci_connect(
				$this->usuario,
				$this->password,
				$this->host
            );
		}

		public function prepararConsulta($sql){
			return oci_parse($this->link, $sql);
		}

		public function ejecutarConsulta($resp){
			return oci_execute($resp);
		}

		public function obtenerFila($resultado){
			return oci_fetch_array($resultado);
		}

		public function cerrarConexion(){
			oci_close($this->link);
		}

		public function getLink(){
			return $this->link;
		}

		public function cantidadRegistros($resultado){
			return oci_num_rows($resultado);
		}
	}

?>