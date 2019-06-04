<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('../../controler/conexao.php');


/**
 * 
 *
 * @author luiz
 */
class Vendedor {
    //put your code here
    var $conexao;
    function __construct(){
        $this->conexao = new Conexao();
    }

     function Dados_Um_Vendedor($id){
        try {
        
        
        $stmt = $this->conexao->pdo->prepare("SELECT id_vendedor as 'Codigo', nome_vendedor as 'Nome', telefone_vendedor as 'Telefone', endereco_vendedor as 'Endereco', usuario as 'Usuario' from vendedor where id_vendedor = ?");
        $stmt->execute([$id]);
        $arrValues = $stmt->fetch();
        return $arrValues;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
             return false;
        }
    }

    function dadosVendedor(){
        try {
        $stmt = $this->conexao->pdo->prepare("call dadosVendedor()");
        $stmt->execute();
        $arrValues = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $arrValues;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
             return false;
        }
    }
    function novoVendedor($nome, $tel, $endereco, $usuario, $senha){
    	try {	
    	$sql = "INSERT INTO `vendedor`(`nome_vendedor`, `telefone_vendedor`, `endereco_vendedor`, usuario, senha) VALUES ('$nome','$tel','$endereco','$usuario','$senha')";
    	$stmt = $this->conexao->pdo->prepare($sql);
        $stmt->execute();
        
        return true;
    	} catch (Exception $e) {

    		 die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    		 return false;
    	}
	}
	function deletarVendedor($id){
		try {
		$sql = "DELETE FROM  `vendedor` WHERE id_vendedor = '$id'";
		$smtp = $this->conexao->pdo->prepare($sql);
		$smtp->execute();
		return true;
    	} catch (Exception $e) {

    		 die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    		 return false;
    	}
	}

    function alterarVendedor($id, $nome, $tel, $endereco, $usuario){
        try {
            
        
        $sql = "UPDATE `vendedor` SET `nome_vendedor` = '$nome', `telefone_vendedor` = '$tel', `usuario` = '$usuario',  `endereco_vendedor` = '$endereco' WHERE `vendedor`.`id_vendedor` = ?;";
        $stmt = $this->conexao->pdo->prepare($sql);
        $stmt->execute([$id]);
        return true;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
             return false;
        }


    }
    function alterarVendedor_senha($id, $nome, $tel, $endereco, $usuario, $senha){
        try {
            
        
        $sql = "UPDATE `vendedor` SET `nome_vendedor` = '$nome', `telefone_vendedor` = '$tel', `usuario` = '$usuario',
         senha = '$senha',  `endereco_vendedor` = '$endereco' WHERE `vendedor`.`id_vendedor` = ?;";
        $stmt = $this->conexao->pdo->prepare($sql);
        $stmt->execute([$id]);
        return true;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
             return false;
        }


    }
    function verificaSeVendedor($user,$senha){
        try {
            
        
        $sql = "SELECT * from vendedor where usuario = ? and senha = ?;";
        $stmt = $this->conexao->pdo->prepare($sql);
        $stmt->execute([$user,$senha]);
        $arrValues = $stmt->fetch();
        return $arrValues;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
    }
     
}
