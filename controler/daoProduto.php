<?php


/**
 * Description of newPHPClass
 *
 * @author luiz
 */
include_once("../../modal/produto.php");
include_once("util.php");


class DaoProduto {


	var $varProduto;
	var $varUtil;
	var $listagem;	
	function __construct(){
		$this->varProduto = new Produto();
		$this->varUtil = new util();
		$this->listagem = "<script type=text/javascript>alert('Operação realizada com sucesso!');window.location='../pages/lista.php?tipo=produto&local=Produtos'</script>";
	}

    function daoDados_UmProdt($id){
    	$result = $this->varProduto->dados_Um_Produto($id);
		return $result;
    }

	function daoDadosProdt(){
		
		$result = $this->varProduto->dadosProduto();
		return $result;
	}

	
	function daoCadastrarProdt(){
		if (isset($_POST['cadastro'])) {
			$nome = strip_tags($_POST['inputNome']);
			$descricao = strip_tags($_POST['inputDescricao']);
			$preco = strip_tags($_POST['inputPreco']);
			$qtd = strip_tags($_POST['inputQtd']);
			$this->varUtil->clear_text($nome);
			$this->varUtil->clear_text($descricao);
			$this->varUtil->clear_text($preco);
			$this->varUtil->clear_text($qtd);
			$result = $this->varProduto->novoProduto($nome, $preco, $qtd, $descricao);
			if($result == true){
				echo $this->listagem;
			}else{
				echo "Usuario não cadastrado!";
			}
		}
	}
	function daoDeletarProdut($id){
		
		$this->varProduto->deletarProduto($id);

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
