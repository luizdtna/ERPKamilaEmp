<?php

include_once('../../controler/conexao.php');


class Produto{

    var $conexao;
    function __construct(){
        $this->conexao = new Conexao();
    }

    function dados_Um_Produto($id){
        try {
        
        
        $stmt = $this->conexao->pdo->prepare("SELECT id_produto as 'Codigo', nome_produto as 'Nome', descricao as 'Sobre', preco as 'Valor', quantidade as 'Quantidade' from produto where id_produto = ?");
        $stmt->execute([$id]);
        $arrValues = $stmt->fetch();
        return $arrValues;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
             return false;
        }
    }

    function dadosProduto(){
        try {
            
         
        $stmt = $this->conexao->pdo->prepare("call dadosProduto()");
        $stmt->execute();
        $arrValues = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $arrValues;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute. " . $e->getMessage());
             return false;
        }
    }

    function novoProduto($nome, $preco, $qtd, $descricao){
        try {   
        $sql = "INSERT INTO `produto` (`nome_produto`, `preco`, `quantidade`, `descricao`) VALUES ('$nome',$preco,$qtd, '$descricao')";
        $stmt = $this->conexao->pdo->prepare($sql);
        $stmt->execute();
        
        return true;
        } catch (Exception $e) {

             die("ERROR: Could not able to execute $sql. " . $e->getMessage());
             return false;
        }
    }
    function deletarProduto($id){
        try {
        $sql = "DELETE FROM `produto` WHERE `produto`.`id_produto` = '$id'";
        $smtp = $this->conexao->pdo->prepare($sql);
        $smtp->execute();
        return true;
        } catch (Exception $e) {

             die("ERROR: Could not able to execute $sql. " . $e->getMessage());
             return false;
        }
    }

    function alterarProduto($id, $nome, $preco, $qtd, $descricao){
        try {
            
        
        $sql = "UPDATE `produto` SET `nome_produto` = '$nome', `preco` = $preco, `quantidade` = $qtd, `descricao` = '$descricao' WHERE id_produto = ?;";
        $stmt = $this->conexao->pdo->prepare($sql);
        $stmt->execute([$id]);
        return true;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
             return false;
        }


    }

    function contadorDeProdutos(){
        try {
            $sql = "SELECT count(id_produto) as 'qtd' from produto;";
            $stmt = $this->conexao->pdo->prepare($sql);
            $stmt->execute();
            $arrValues = $stmt->fetch();
            return $arrValues;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
    }

}


?>

