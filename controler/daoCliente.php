<?php 
include_once("../../modal/cliente.php");
include_once("util.php");

class DaoCliente {
	

	var $varCliente;
	var $varUtil;
	var $listagem;
	function __construct(){
		$this->varCliente = new Cliente();
		$this->varUtil = new util();
		$this->listagem = "<script type=text/javascript>alert('Operação realizada com sucesso!');window.location='../pages/lista.php?tipo=cliente&local=Pessoas'</script>";
	}

    function daoDados_UmCli($id){
    	$result = $this->varCliente->daoDados_Um_Cliente($id);
		return $result;
    }

	function daoDadosCli(){
		
		$result = $this->varCliente->dadosCliente();
		return $result;
	}

	
	function daoCadastrarCli(){
		if (isset($_POST['cadastro'])) {
			$nome = strip_tags($_POST['inputNome']);
			$tel = strip_tags($_POST['inputTelefone']);
			$endereco = strip_tags($_POST['inputEndereco']);
			$this->varUtil->clear_text($nome);
			$this->varUtil->clear_text($tel);
			$this->varUtil->clear_text($endereco);
			$result = $this->varCliente->novoCliente($nome, $tel, $endereco);
			if($result == true){
				echo $this->listagem;
			}else{
				echo "Usuario não cadastrado!";
			}
		}
	}
	function daoDeletarCli($id){
		
		$this->varCliente->deletarCliente($id);

	}

	function daoAlterarCli(){
		
		$nome = strip_tags($_POST['inputNome']);
		$tel = strip_tags($_POST['inputTelefone']);
		$endereco = strip_tags($_POST['inputEndereco']);
		$this->varUtil->clear_text($nome);
		$this->varUtil->clear_text($tel);
		$this->varUtil->clear_text($endereco);
		$result = $this->varCliente->alterarCliente($_GET['id'], $nome, $tel, $endereco);
		if($result == true){
			echo $this->listagem;
		}else{
			echo "Usuario não cadastrado!";
		}
	}


}
?>