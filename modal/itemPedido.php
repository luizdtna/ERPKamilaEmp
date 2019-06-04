<?php

include_once('../../controler/conexao.php');
include_once('produto.php');


class ItemPedido{

    var $conexao;
    var $produto;
    function __construct(){
    $this->conexao = new Conexao();
    $this->produto = new Produto();

    }

    function daoQtd_Itens($id){
        try {
        
        
        $stmt = $this->conexao->pdo->prepare("SELECT count(id_pedido) as 'qtdpedidos' from itempedido where id_pedido = ?;");
        $stmt->execute([$id]);
        $arrValues = $stmt->fetch();
        return $arrValues;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
             return false;
        }
    }
    function itens_Por_Pedido($id){
        try {
        
        
        $stmt = $this->conexao->pdo->prepare("SELECT count(id_pedido) as 'qtdpedidos' from itempedido where id_pedido = ?;");
        $stmt->execute([$id]);
        $arrValues = $stmt->fetch();
        return $arrValues;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
             return false;
        }
    }

    function dadosProduto(){
        return $this->produto->dadosProduto();
    }

    function dadosItens_por_Pedido($id){
        try {
        $stmt = $this->conexao->pdo->prepare("SELECT id_item as 'Codigo', nome_produto as 'Produto', qnt_comprada as 'Quantidade', total as 'Total', a_pagar as 'Divida', data_compra as 'Data' from cliente c 
            right join pedido p on c.id_cliente = p.id_cliente 
            join itempedido it on p.id_pedido = it.id_pedido
            join produto pd on it.id_produto = pd.id_produto where p.id_pedido = ?;");
        $stmt->execute([$id]);
        $arrValues = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $arrValues;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute. " . $e->getMessage());
             return false;
        }
    }

     function dadosItens_por_Cliente($id){
        try {
        $stmt = $this->conexao->pdo->prepare("SELECT p.id_pedido as 'Pedido', id_item as 'Codigo do Item', nome_produto as 'Produto', qnt_comprada as 'Quantidade', total as 'Total', a_pagar as 'Divida', data_compra as 'Data' from cliente c 
            right join pedido p on c.id_cliente = p.id_cliente 
            join itempedido it on p.id_pedido = it.id_pedido
            join produto pd on it.id_produto = pd.id_produto where c.id_cliente = ? order by p.id_pedido,it.id_item;");
        $stmt->execute([$id]);
        $arrValues = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $arrValues;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute. " . $e->getMessage());
             return false;
        }
    }

    function updateDivida($id, $divida){
        try{
        $sql = "UPDATE `itempedido` SET `a_pagar`= $divida WHERE `id_pedido` = $id";
        
        $stmt = $this->conexao->pdo->prepare($sql);
        $stmt->execute();
        return true;
        }catch (Exception $e) {
            return false;
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
    }

    function atualizarEstoque($idProduto, $qtd){
        try {
            
         $sql = "UPDATE produto set quantidade = quantidade-$qtd where id_produto = $idProduto;";
        $stmt = $this->conexao->pdo->prepare($sql);
        $stmt->execute();
        }catch (Exception $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
    }

    function novoItemPedido($idPedido, $prod, $qtd, $total, $a_pagar){
        try {   
        $sql = "INSERT INTO `itempedido` (`qnt_comprada`, `id_produto`, `id_pedido`, `total`, `a_pagar`) VALUES ($qtd, $prod, $idPedido, $total, $a_pagar);";
        $stmt = $this->conexao->pdo->prepare($sql);
        $stmt->execute();
        $this->atualizarEstoque($prod,$qtd);
        return true;
        } catch (Exception $e) {

             die("ERROR: Could not able to execute $sql. " . $e->getMessage());
             return false;
        }
    }
    function deletarItemPedido($id){
        try {
        $sql = "DELETE FROM `itempedido` WHERE `id_pedido` = '$id'";
        $smtp = $this->conexao->pdo->prepare($sql);
        $smtp->execute();
        return true;
        } catch (Exception $e) {

             die("ERROR: Could not able to execute $sql. " . $e->getMessage());
             return false;
        }
    }

    function alterarPedido($id, $nome, $preco, $qtd, $descricao){
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

}


?>

