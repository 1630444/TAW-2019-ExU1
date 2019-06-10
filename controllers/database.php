<?php
	class Database{

		// Atricutos de la base de datos
		private $con;
		private $dbhost="localhost";
		private $dbuser="alan";
		private $dbpass="ESTANQUE98ful";
		private $dbname="examen";

		//Constrctor de la clase
		function __construct(){
			$this->connect_db();
		}
		
		// Función para realizar la conección 
		public function connect_db(){
			try{
				$this->con = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
			}catch( PDOException $e ){
				echo 'Error al conectarnos: ' . $e->getMessage();
			}
		}

    /*
		// Función que regresa el resultado segun un id de la talba de ususario para validar el acceso a la sesion
		public function valida_usuario($usuario,$contrasena){
			// Se delcara la consulta
			$stmt = $this->con->prepare("SELECT * FROM usuarios where usuario='$usuario' AND contrasena=MD5('$contrasena')");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_OBJ)){
				return true;
			}
			return false;
		}
    
		// Función que regresa los datos del usuario en sesion
		public function datos_usuario($usuario){
			// Se delcara la consulta
			$stmt = $this->con->prepare("SELECT * FROM usuarios where usuario='$usuario'");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			return $stmt;
		}
    */
    
    // Función que regresa el resultset de la condulta personalizada
		public function readSpecial($consulta){
			// Se delcara la consulta
			$stmt = $this->con->prepare($consulta);
			// Se carga el resultado de la consulta 
			$stmt->execute();
			return $stmt;
		}

		// Función que regresa el resultset de la condulta de la tabla solicitada, osea todas las filas
		public function readTable($tabla){
			// Se delcara la consulta
			$stmt = $this->con->prepare("SELECT * FROM $tabla");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			return $stmt;
		}

		// Función que regresa el resultado segun un id indicado
		public function single($id,$tabla){
			// Se delcara la consulta
			$stmt = $this->con->prepare("SELECT * FROM $tabla where id='$id'");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_OBJ)){
				$return = $row;
			}
			return $return;
		}
    
    // Función que regresa el resultado segun un id indicado pero solo un dato
		public function singleData($id,$tabla,$dato){
			// Se delcara la consulta
			$stmt = $this->con->prepare("SELECT $dato FROM $tabla where id=$id");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_OBJ)){
				$return = $row->$dato;
			}
			return $return;
		}

		// Funcion que agrega un registro a la tabla
		public function createProveedor($nombre, $apellido, $rfc, $direccion, $email){
			// Se delcara la consulta
			$stmt = $this->con->prepare("INSERT INTO `proveedor` (nombre, apellido, rfc, direccion, email) VALUES ('$nombre', '$apellido', '$rfc', '$direccion', '$email')");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}

		// Funcion que actualiza los datos de un registro
		public function updateProveedor($id, $nombre, $apellido, $rfc, $direccion, $email){
			// Se delcara la consulta
			$stmt = $this->con->prepare("UPDATE `proveedor` SET nombre='$nombre', apellido='$apellido', rfc='$rfc', direccion='$direccion', email='$email' WHERE id=$id");
			// Se ejecuta la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}
    
    // Funcion que agrega un registro a la tabla
		public function createContacto($nombre, $apellido, $email, $tel, $id_proveedor){
			// Se delcara la consulta
			$stmt = $this->con->prepare("INSERT INTO `contacto` (nombre, apellido, email, tel, id_proveedor) VALUES ('$nombre', '$apellido', '$email', '$tel', $id_proveedor)");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}

		// Funcion que actualiza los datos de un registro
		public function updateContacto($id, $nombre, $apellido, $email, $tel, $id_proveedor){
			// Se delcara la consulta
			$stmt = $this->con->prepare("UPDATE `contacto` SET nombre='$nombre', apellido='$apellido', email='$email', tel='$tel', id_proveedor=$id_proveedor WHERE id=$id");
			// Se ejecuta la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}
    
		public function delete($id,$table){
			// Se delcara la consulta
			$stmt = $this->con->prepare("DELETE FROM `$table` WHERE id=$id");
			// Se ejecuta la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}

	}
