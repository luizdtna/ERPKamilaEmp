<?php


/**
 * Description of newPHPClass
 *
 * @author luiz
 */
include_once("../../modal/produto.php");
include_once("../../modal/itemPedido.php");
include_once("util.php");


class daoItemPedido {


	var $varProduto;
	var $varUtil;
	var $listagem;	
	var $ItemPedido;
	function __construct(){
		$this->varProduto = new Produto();
		$this->varUtil = new util();
		$this->listagem = "<script type=text/javascript>alert('Operação realizada com sucesso!');window.location='../pages/lista.php?tipo=pedido&local=Pedidos'</script>";
		$this->ItemPedido = new ItemPedido();
	}

    function dao_Itens_Por_Pedido($id){
    	$result = $this->ItemPedido->itens_Por_Pedido($id);
		return $result;
    }

	function daoDadosProdt(){
		
		$result = $this->ItemPedido->dadosProduto();
		return $result;
	}

	function daoDados_Itens_por_Pedido($id){
		$result = $this->ItemPedido->dadosItens_por_Pedido($id);
		return $result;
	}

	function daoDados_Itens_por_Cliente($id){
		$result = $this->ItemPedido->dadosItens_por_Cliente($id);
		return $result;
	}

	function daoUpdateDivida($id, $divida){
		$result = $this->ItemPedido->updateDivida($id,$divida);
		if($result == true){
			echo $this->listagem;
		}else{
			echo "Houve erro ao atualizar a divida";
		}
	}

	
	function daoCadastrarItemPedid($qtdPedido, $idPedido, $prod, $qtd, $total, $troco){
			$faltaPagar = 0;
			
			if($troco < 0){
				
				$faltaPagar = abs(floatval($troco/$qtdPedido));
			}
			

			$result = $this->ItemPedido->novoItemPedido($idPedido, $prod, $qtd, $total, $faltaPagar);
			if($result == true){
				echo $this->listagem;
			}else{
				echo "Usuario não cadastrado!";
			}
		
	}
	function daoDeletarPedido($id){
		
		$this->ItemPedido->deletarItemPedido($id);

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
