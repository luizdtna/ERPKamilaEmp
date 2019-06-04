<?php

include_once('../../controler/conexao.php');
include_once('cliente.php');



class Pedido{

    var $conexao;
    var $cliente;
    
    function __construct(){
    $this->conexao = new Conexao();
    $this->cliente = new Cliente();
    }

    function Dados_Um_Pedido($id){
        try {
        $sql = "SELECT pd.id_pedido as 'Codigo', cl.nome_cliente as 'Cliente', vd.nome_vendedor as 'Vendedor', sum(total) as 'Total', sum(a_pagar) as 'Divida', data_compra as 'Data' from pedido pd left join cliente cl on pd.id_cliente = cl.id_cliente join itempedido it on pd.id_pedido = it.id_pedido join vendedor vd on pd.id_vendedor = vd.id_vendedor where pd.id_pedido = ?;";
        $stmt = $this->conexao->pdo->prepare($sql);
        $stmt->execute([$id]);
        $arrValues = $stmt->fetch();
        return $arrValues;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
             return false;
        }
    }

    function dadosCliente(){
        return $this->cliente->dadosCliente();
    }

    function dadosPedido(){
        try{
        $sql = "call dadosPedido();";
        $stmt = $this->conexao->pdo->prepare($sql);
        $stmt->execute();
        $arrValues = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $arrValues;
        } catch (Exception $e) {
            die("ERROR: Could not able to execute. " . $e->getMessage());
             return false;
        }
    }

    function novoPedido($idVend, $idCli, $data){
        try {   
            if(($idCli == '') || ($data == '')){
                if($idCli == ''){
                    if($data == ''){
                        $sql = "INSERT INTO `pedido`(`id_vendedor`, `data_compra`) VALUES ($idVend,curtime())";
                    } else{
                     $sql = "INSERT INTO `pedido`(`id_vendedor`, `data_compra`) VALUES ($idVend,'$data')";
                    }
                    
                }else{
                    if($data == ''){
                        $sql = "INSERT INTO `pedido`(`id_vendedor`, `id_cliente`, `data_compra`) VALUES ($idVend,$idCli,curtime())";
                    } else{
                        $sql = "INSERT INTO `pedido`(`id_vendedor`, `id_cliente`, `data_compra`) VALUES ($idVend,$idCli,'$data')";
                    }
                }
            }else{

                $sql = "INSERT INTO `pedido` (`id_vendedor`, `id_cliente`, `data_compra`) VALUES ('$idVend', '$idCli', '$data')";
                
            }
            $stmt = $this->conexao->pdo->prepare($sql);
            $stmt->execute();

            //pegar o ultimo registro realizado
            $sql = "SELECT MAX(id_pedido) as 'id_pedido' FROM pedido";
            $stmt = $this->conexao->pdo->prepare($sql);
            $stmt->execute();
            $id_pedido = $stmt->fetch();
            
            return $id_pedido;
        } catch (Exception $e) {

             die("ERROR: Could not able to execute $sql. " . $e->getMessage());
             return false;
        }
    }

    function deletarPedido($id){
        try {
        $sql = "DELETE FROM `pedido` WHERE `pedido`.`id_pedido` = '$id'";
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

    function contadorDePedidos(){
        try {
            $sql = "SELECT count(id_pedido) as 'qtd' from pedido;";
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

