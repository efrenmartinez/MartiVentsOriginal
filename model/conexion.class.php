<?php
	class DBManager{
		var $conect;
		var $Servidor;
		var $connectionInfo;

		public function __construct(){
			$this->exe_conexion();
		}

		function exe_conexion(){
			$this->Servidor  = "localhost";
			$this->dbuser  = "id18913104_martiventsadmin";
			$this->dbpass  = "Mr3fr3n96mr69?$*";
			$this->dbname  = "id18913104_martiventsproducts";
            
            
			$this->conect = mysqli_connect( $this->Servidor, $this->dbuser, $this->dbpass, $this->dbname );
		}

		public function exec_query($sql){
			return mysqli_query($this->conect,$sql);
		}

		public function getFetchAssoc($data){
			$registros = array();
			while( $reg = mysqli_fetch_array( $data ) ){
				$registros[] = $reg;
			}

			return $registros;
		}

//		function exe_conexion(){
//			$this->Servidor  = "74.208.214.155";
//			$this->connectionInfo = array( "Database"=>"AnadimBD", "UID"=>"anadimUser", "PWD"=>"AnaHC2021*");
//			$this->conect = sqlsrv_connect( $this->Servidor , $this->connectionInfo );
//		}
//
//		public function exec_query($sql){
//			return sqlsrv_query($this->conect,$sql);
//		}
//
//		public function getFetchAssoc($data){
//			$registros = array();
//			while( $reg = sqlsrv_fetch_array( $data, SQLSRV_FETCH_ASSOC ) ){
//				$registros[] = $reg;
//			}
//
//			return $registros;
//		}

		public function Actualizar($tabla,$array,$condicion){
			$valores = "";
			foreach ($array as $nombre => $valor){
				$valores.= $nombre . "='" . $valor . "',";
			}
			$valores = substr($valores,0,-1);
			$query = "UPDATE  ".$tabla." SET ".$valores ." WHERE ".$condicion;
			$bool = $this->exec_query($query);
			return $bool;
		}

		public function Insertar($tabla,$array){
			$campos = "";
			$datos = "";
			foreach ($array as $nombre => $valor){
				$campos.= $nombre . ",";
				$datos.= "'".$valor . "',";
			}
			$campos = substr($campos,0,-1);
			$datos = substr($datos,0,-1);
			$query = "INSERT INTO ".$tabla."(".$campos.") VALUES (".$datos.")";

			$bool = $this->exec_query($query);
			return $bool;
		}

		public function Eliminar($tabla,$condicion){
			$query = "DELETE FROM ".$tabla." WHERE ".$condicion;
			$bool = $this->exec_query($query);
			return $bool;
		}

		function get_consulta_general( $tabla , $condicion ){
			$sql = "SELECT * FROM ".$tabla." %s;";
			$sql = sprintf( $sql , $condicion );
			//echo $sql;
			$data = $this->getFetchAssoc( $this->exec_query($sql) );
			return $data;
		}
        function get_consulta_generalselecta( $asterisco , $tabla , $condicion ){
			$sql = "SELECT ".$asterisco." FROM ".$tabla." %s;";
			$sql = sprintf( $sql , $condicion );
			//echo $sql;
			$data = $this->getFetchAssoc( $this->exec_query($sql) );
			return $data;
		}


		public function disconnect(){
			sqlsrv_close($this->conect);
		}
	}
?>
