<?php 

include_once("../../modal/vendedor.php");
include_once("util.php");



class daoVendedor
{
		var $varVendedor;
		var $varUtil;
		var $listagem;

		function __construct(){
			$this->varVendedor = new Vendedor();
			$this->varUtil = new util();
			$this->listagem = "<script type=text/javascript>alert('Operação realizada com sucesso!');window.location='../pages/lista.php?tipo=vendedor&local=Pessoas'</script>";
		}
		function daoDados_UmVended($id){
    	//$aux = new Vendedor();
    	$result = $this->varVendedor->Dados_Um_Vendedor($id);
		return $result;
    	}

		function daoDadosVended(){
		//$aux = new Vendedor();
		$result = $this->varVendedor->dadosVendedor();
		return $result;
		}

		function daoCadastrarVended(){
		if (isset($_POST['cadastro'])) {
			$nome = strip_tags($_POST['inputNome']);
			$tel = strip_tags($_POST['inputTelefone']);
			$endereco = strip_tags($_POST['inputEndereco']);
			$usuario = strip_tags($_POST['inputUsuario']);
			$senha = strip_tags($_POST['inputPassword']);
			$this->varUtil->clear_text($nome);
			$this->varUtil->clear_text($tel);
			$this->varUtil->clear_text($endereco);
			$this->varUtil->clear_text($usuario);
			$this->varUtil->clear_text($senha);
			$result = $this->varVendedor->novoVendedor($nome, $tel, $endereco,$usuario,$senha);
			if($result == true){
				echo $this->listagem;
			}else{
				echo "Usuario não cadastrado!";
			}
		}
	}
	
	function daoDeletarVended($id){
		
		$this->varVendedor->deletarVendedor($id);

	}
	function daoAlterarVended(){
		/*$aux = new Util();
		$aux2 = new Cliente();*/
		$mudarSenha = false;
		$nome = strip_tags($_POST['inputNome']);
		$tel = strip_tags($_POST['inputTelefone']);
		$endereco = strip_tags($_POST['inputEndereco']);
		$usuario = strip_tags($_POST['inputUsuario']);
		if(!empty($_POST['inputPassword'])){
			$mudarSenha = true; 
			$senha = strip_tags($_POST['inputPassword']);
			$this->varUtil->clear_text($senha);
		}
		$this->varUtil->clear_text($nome);
		$this->varUtil->clear_text($tel);
		$this->varUtil->clear_text($endereco);
		$this->varUtil->clear_text($usuario);
		if($mudarSenha == true){
			$result = $this->varVendedor->alterarVendedor_senha($_GET['id'], $nome, $tel, $endereco, $usuario, $senha);
		}else{
			$result = $this->varVendedor->alterarVendedor($_GET['id'], $nome, $tel, $endereco, $usuario);
		}
		if($result == true){
			echo $this->listagem;
		}else{
			echo "Usuario não cadastrado!";
		}
	}
}
/**
 * 
 */
 ?>