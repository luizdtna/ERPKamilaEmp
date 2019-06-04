<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('../../controler/conexao.php');


/**
 * Description of cliente
 *
 * @author luiz
 */
class Cliente {
    //put your code here
    var $conexao;
    function __construct(){
        $this->conexao = new Conexao();
    }

    function daoDados_Um_Cliente($id){
        try {
        
        
        $stmt = $this->conexao->pdo->prepare("SELECT id_cliente as 'Codigo', nome_cliente as 'Nome', tel_cliente as 'Telefone', endereco_cliente as 'Endereco' from cliente where id_cliente = ?");
        $stmt->execute([$id]);
        $arrValues = $stmt->fetch();
        return $arrValues;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
             return false;
        }
    }

    function dadosCliente(){
        try {
            
        
        $stmt = $this->conexao->pdo->prepare("call dadosCliente()");
        $stmt->execute();
        $arrValues = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $arrValues;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
             return false;
        }
    }

    function novoCliente($nome, $tel, $endereco){
    	try {	
    	$sql = "INSERT INTO `cliente`(`nome_cliente`, `tel_cliente`, `endereco_cliente`) VALUES ('$nome','$tel','$endereco')";
    	$stmt = $this->conexao->pdo->prepare($sql);
        $stmt->execute();
        
        return true;
    	} catch (Exception $e) {

    		 die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    		 return false;
    	}
	}
	function deletarCliente($id){
		try {
		$sql = "DELETE FROM  `cliente` WHERE id_cliente = '$id'";
		$smtp = $this->conexao->pdo->prepare($sql);
		$smtp->execute();
		return true;
    	} catch (Exception $e) {

    		 die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    		 return false;
    	}
	}

    function alterarCliente($id, $nome, $tel, $endereco){
        try {
            
        
        $sql = "UPDATE `cliente` SET `nome_cliente` = '$nome', `tel_cliente` = '$tel', `endereco_cliente` = '$endereco' WHERE `cliente`.`id_cliente` = ?;";
        $stmt = $this->conexao->pdo->prepare($sql);
        $stmt->execute([$id]);
        return true;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
             return false;
        }


    }
    function contadorDeClientes(){
        try {
            $sql = "SELECT count(id_cliente) as 'qtd' from cliente;";
            $stmt = $this->conexao->pdo->prepare($sql);
            $stmt->execute();
            $arrValues = $stmt->fetch();
            return $arrValues;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
    }
}
