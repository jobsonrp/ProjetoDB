<?php

class Crud {

	public static function busca($tabela, $codigos){
		try{
			$conn = Conexao::conectar();
			$stmt = $conn->prepare("SELECT * FROM ".$tabela." WHERE codigo=:codigo");
			$stmt->bindParam(':codigo',$codigos);
			$stmt->execute();
			return $stmt;
		}catch(PDOException $e){
			echo $e->getMessage();
	    }
	}
	public static function buscaAll($tabela){
		try{
			$conn = Conexao::conectar();
			$stmt = $conn->prepare("SELECT * FROM ".$tabela);
			$stmt->bindParam(':codigo',$codigos);
			$stmt->execute();
			return $stmt;
		}catch(PDOException $e){
			echo $e->getMessage();
	    }
	}
}
?>

