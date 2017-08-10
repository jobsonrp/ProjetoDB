<?php

include 'variaveis.php';

class Conexao {

	private static $servername = DB_HOSTNAME;
	private static $username = DB_USERNAME;
	private static $password = DB_PASSWORD; //'usbw'
	private static $DBNome = null;
	private static $driver = DB_DRIVER ; //"mysql"
	private static $conn = null;

	public static function conectar(){
		try{
			if (self::$DBNome) {
				$SDN = ":dbname=".self::$DBNome.";host=";
			}else{
				$SDN = ":host=";
			}
			self::$conn = new PDO(self::$driver.$SDN.self::$servername, self::$username, self::$password);
			self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return self::$conn;
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public static function desconnectar(){
		if(self::$conn){
			self::$conn = null;
		}
	}
	public static function setDB($DBNome){
		self::$DBNome = $DBNome;
	}

}
?>