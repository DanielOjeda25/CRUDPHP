<?php 

class conexion{
	private $servidor = "localhost";
	private $usuario = "root";
	private $contrasenia = "";
	private $conexion;


	public function __construct()
	{
	try {
			$this->conexion = new PDO("mysql:host=$this->servidor;dbname=album",
				$this->usuario,
				$this->contrasenia);
			$this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			return "conecction failed".$e;
		}	
	}
// con este metodo ejecutamos instrucciones
	public function ejecutar($sql){
		$this->conexion->exec($sql);
		return $this->conexion->lastInsertId();
	}
	//con este metodo hacemos una consulta, osea un SELECT
	public function consultar($sql){
		$sentencia = $this->conexion->prepare($sql);
		$sentencia->execute();
		return $sentencia->fetchAll();
	}

}
