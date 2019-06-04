<?php


/**
 * Description of newPHPClass
 *
 * @author luiz
 */
include_once("../../modal/pedido.php");
include_once("util.php");


class daoPedido {


	
	var $varUtil;
	var $listagem;	
	var $varPedido;
	var $cliente;
	function __construct(){
		
		$this->varUtil = new util();
		$this->listagem = "<script type=text/javascript>alert('Operação realizada com sucesso!');window.location='../pages/lista.php?tipo=pedido&local=Pedidos'</script>";
		$this->varPedido = new Pedido();
	}

    function daoDados_Um_Pedido($id){
    	$result = $this->varPedido->Dados_Um_Pedido($id);
		return $result;
    }

    function daoDadosPedid(){
    	$result = $this->varPedido->dadosPedido();
		return $result;
    }

	function daoDadosCli(){
		
		$result = $this->varPedido->dadosCliente();
		return $result;
	}

	
	function daoCadastrarPedido($idVend, $idCli, $newData){
		
			$data = strip_tags($newData);
			$this->varUtil->clear_text($data);
			$result = $this->varPedido->novoPedido($idVend, $idCli, $data);
			if($result == false){
				echo "Algo deu errado";
			}else{
				return $result;
			}
		
	}
	function daoDeletarPedid($id){
		
		$this->varPedido->deletarPedido($id);

	}

	function daoAlterarProdt(){
		
		$nome = strip_tags($_POST['inputNome']);
		$descricao = strip_tags($_POST['inputDescricao']);
		$preco = strip_tags($_POST['inputPreco']);
		$qtd = strip_tags($_POST['inputQtd']);
		$this->varUtil->clear_text($nome);
		$this->varUtil->clear_text($descricao);
		$this->varUtil->clear_text($preco);
		$this->varUtil->clear_text($qtd);
		$result = $this->varProduto->alterarProduto($_GET['id'], $nome, $preco, $qtd, $descricao);
		if($result == true){
			echo $this->listagem;
		}else{
			echo "Usuario não cadastrado!";
		}
	}

    
}
