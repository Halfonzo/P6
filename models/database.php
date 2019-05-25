<?php

	//Esta clase funcionara para realizar la conexion a la base de datos y ejecutar todas las sentencias
	class Database{
		//Datos para la conexion a la base de datos
		private $con;
		private $dbhost="localhost";
		//private $dbuser="root";
		private $dbuser="halfonso";
		//private $dbpass="";
		private $dbpass="bluetooth1";
		private $dbname="hotel";
		function __construct(){
			$this->connect_db();
		}

		//Se crea la conexion con la base de datos y se establecen los parametros de conexion PDO
		public function connect_db(){
			try {
				$this->con = new PDO('mysql:host='.$this->dbhost.';dbname='.$this->dbname, $this->dbuser, $this->dbpass);
				//print "Conexión exitosa!";
			}
			catch (PDOException $e) {
				print "¡Error!: " . $e->getMessage() . "
				";
				die();
			}
			$con =null;
		}
		//Se ejecuta una sentencia para verificar si el usuario existe en los registros, solo devolvera True o False
		public function login($nick,$pass){
			$sql = "Select id From usuarios Where nick = '" . $nick . "' and password = '" . $pass . "'";
			$stmt = $this->con->prepare($sql);
  			$stmt->execute();
  			$return = $stmt->fetch();
			//$return = $return[0];
			//Si la sentencia encuentra algun usuario registrado se devuelve True, en caso constrario False
			//La sentencia busca por el ID del usuario con el nickname y contraseña coincidentes
			if ($return) {
				return true;
			}
			else {
				return false;
			}
		}

		//Funcion para devolver todos los datos de una tabla en especifico, esto se mostraran en las tablas principales
		//La tabla seleccionada es enviada por parametro
		public function data_table($tabla){
			$sql = "Select * From " . $tabla;
			$stmt = $this->con->prepare($sql);
  			$stmt->execute();
  			//$return = $stmt->fetch();
  			return $stmt;
		}

		//Funcion para realizar el registro de un nuevo usuario a la base de datos, esta funcion tiene como parametros los datos del usuario que se llena en el formulario
		public function create_user($nombre,$contrasenna,$telefono,$correo){
			$sql = "Insert into usuarios (name,password,correo,telefono) values('" . $nombre ."','" . $contrasenna . "','" . $correo . "','" . $telefono . "')";
			$stmt = $this->con->prepare($sql);
  			$stmt->execute();
		}

		//Funcion para realizar el registro de un nuevo productos a la base de datos, esta funcion tiene como parametros los datos del producto
		public function create_producto($nombre,$cantidad,$precio){
			$sql = "Insert into productos (nombre,cantidad,precio) values('" . $nombre ."','" . $cantidad . "','" . $precio ."')";
			$stmt = $this->con->prepare($sql);
  			$stmt->execute();
		}
	}
	
	

?>	

