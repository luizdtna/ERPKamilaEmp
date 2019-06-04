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
class Gerente {
    //put your code here

    var $conexao;
    function __construct(){
        $this->conexao = new Conexao();
    }

    function Dados_Um_Gerente($id){
        try {
        
        
        $stmt = $this->conexao->pdo->prepare("SELECT id_gerente as 'Codigo', nome_gerente as 'Nome', telefone_gerente as 'Telefone', endereco_gerente as 'Endereco', usuario as 'Usuario' from gerente where id_gerente = ?");
        $stmt->execute([$id]);
        $arrValues = $stmt->fetch();
        return $arrValues;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
             return false;
        }
    }

    function dadosGerente(){
        try {
        $stmt = $this->conexao->pdo->prepare("call dadosGerente()");
        $stmt->execute();
        $arrValues = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $arrValues;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
             return false;
        }
    }

    function novoGerente($nome, $tel, $endereco, $usuario, $senha){
    	try {	
    	$sql = "INSERT INTO `gerente`(`nome_gerente`, `telefone_gerente`, `endereco_gerente`, usuario, senha) VALUES ('$nome','$tel','$endereco','$usuario','$senha')";
    	$stmt = $this->conexao->pdo->prepare($sql);
        $stmt->execute();
        
        return true;
    	} catch (Exception $e) {

    		 die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    		 return false;
    	}
	}
	function deletarGerente($id){
		try {
		$sql = "DELETE FROM  `gerente` WHERE id_gerente = '$id'";
		$smtp = $this->conexao->pdo->prepare($sql);
		$smtp->execute();
		return true;
    	} catch (Exception $e) {

    		 die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    		 return false;
    	}
	}
    function alterarGerente($id, $nome, $tel, $endereco, $usuario){
        try {
            
        
        $sql = "UPDATE `gerente` SET `nome_gerente` = '$nome', `telefone_gerente` = '$tel', `usuario` = '$usuario',  `endereco_gerente` = '$endereco' WHERE `gerente`.`id_gerente` = ?;";
        $stmt = $this->conexao->pdo->prepare($sql);
        $stmt->execute([$id]);
        return true;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
             return false;
        }


    }
    function alterarGerente_senha($id, $nome, $tel, $endereco, $usuario, $senha){
        try {
            
        
        $sql = "UPDATE `gerente` SET `nome_gerente` = '$nome', `telefone_gerente` = '$tel', `usuario` = '$usuario',
         senha = '$senha',  `endereco_gerente` = '$endereco' WHERE `gerente`.`id_gerente` = ?;";
        $stmt = $this->conexao->pdo->prepare($sql);
        $stmt->execute([$id]);
        return true;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
             return false;
        }


    }
    function verificaSeGerente($user,$senha){
        try {
            
        
        $sql = "SELECT * from gerente where usuario = ? and senha = ?;";
        $stmt = $this->conexao->pdo->prepare($sql);
        $stmt->execute([$user,$senha]);
        $arrValues = $stmt->fetch();
        return $arrValues;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
    }
}
