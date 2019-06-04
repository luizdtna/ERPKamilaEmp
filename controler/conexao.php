<?php

/**
 * 
 */
class Conexao
{

	var $pdo;
	function __construct(){
		$this->pdo = $this->conexaoBD();
	}

	function conexaoBD(){
		try {
		    $pdo = new PDO("mysql:host=localhost:3308;dbname=buyproduct", "root", "");
		    // Set the PDO error mode to exception
		    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    return $pdo;
		} catch (PDOException $e) {
		    die("ERROR: Could not connect. " . $e->getMessage());
		}
	}
}
?>