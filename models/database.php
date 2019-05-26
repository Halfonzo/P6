<?php

	//Esta clase funcionara para realizar la conexion a la base de datos y ejecutar todas las sentencias
	class Database{
		//Datos para la conexion a la base de datos
		private $con;
		private $dbhost="localhost";
		private $dbuser="halfonso";
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

		//Funcion para realizar el registro de un nuevo cliente a la base de datos, esta funcion tiene como parametros los datos del cliente que se llena en el formulario
		public function create_cliente($nombre,$email,$telefono){
			$sql = "Insert into clientes (nombre,telefono,email,visitas) values('" . $nombre ."','" . $telefono . "','" . $email . "','1')";
			$stmt = $this->con->prepare($sql);
  			$stmt->execute();
		}

		//Funcion para realizar el registro de una nueva habitacion en la base de datos, esta funcion tiene como parametros los datos de la habitacion
		public function create_habitacion($numero,$tipo,$precio,$desc,$img){
			$sql = "Insert into habitaciones (tipo,precio,numero,descripcion,estado,img) values('" . $tipo ."','" . $precio . "','" . $numero . "','" . $desc . "','Disponible','" . $img . "')";
			$stmt = $this->con->prepare($sql);
  			$stmt->execute();
		}

		//Funcion para devolver todos los datos de una tabla en especifico, esto se mostraran en las tablas principales
		//La tabla seleccionada es enviada por parametro
		public function table($tabla){
			$sql = "Select * From " . $tabla;
			$stmt = $this->con->prepare($sql);
  			$stmt->execute();
  			//$return = $stmt->fetch();
  			return $stmt;
		}

		//Funcion para retornar solo un registro de la tabla, esto se utilizara para la actualizacion de datos, como parametro se pasa el id del registro que se desea modificar
		public function one($id,$table){
			$sql = "Select * From " . $table . " where id='" . $id . "'";
			$stmt = $this->con->prepare($sql);
  			$stmt->execute();
  			$return = $stmt->fetch();
  			return $return;
		}

		//Funcion para realizar la actualizacion de un cliente en especifico, se pasaran comom parametros todos los datos a actualizar
		public function update_cliente($id,$nombre,$telefono,$email){
			$sql = "Update clientes set nombre='" . $nombre . "',telefono='" . $telefono . "',email='" . $email . "' Where id='" . $id . "'";
			$stmt = $this->con->prepare($sql);
  			$stmt->execute();
		}

		//Funcion que actualizara los datos de la habitacion en el caso de que se actualice la imagen
		public function update_habitacion_img($id,$tipo,$precio,$numero,$desc,$img){
			$sql = "Update habitaciones set tipo='" . $tipo . "',precio='" . $precio . "',numero='" . $numero . "',descripcion='" . $desc . "',img='" . $img . "' Where id='" . $id . "'";
			$stmt = $this->con->prepare($sql);
  			$stmt->execute();
		}

		//Funcion que actualizara los datos de la habitacion en el caso de que NO se actualice la imagen
		public function update_habitacion($id,$tipo,$precio,$numero,$desc){
			$sql = "Update habitaciones set tipo='" . $tipo . "',precio='" . $precio . "',numero='" . $numero . "',descripcion='" . $desc . "' Where id='" . $id . "'";
			$stmt = $this->con->prepare($sql);
  			$stmt->execute();
		}

		//Funcion para eliminar un cliente en especifico, se pasa como parametro el id del cliente
		public function delete($id,$table){
			$sql = "Delete from " . $table . " Where id='" . $id . "'";
			$stmt = $this->con->prepare($sql);
  			$stmt->execute();
		}

	}
	
	

?>	

