<?php 
include_once("../../modal/gerente.php");
include_once("util.php");



class daoGerente
{
		
		var $varGerente;
		var $varUtil;
		var $listagem;
		function __construct(){
			$this->varGerente = new Gerente();
			$this->varUtil = new util();
			$this->listagem = "<script type=text/javascript>alert('Operação realizada com sucesso!');window.location='../pages/lista.php?tipo=gerente&local=Pessoas'</script>";
		}

		function daoDadosGer(){
		//$aux = new Gerente();
		$result = $this->varGerente->dadosGerente();
		return $result;
		}

		function daoCadastrarGer(){
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
			$result = $this->varGerente->novoGerente($nome, $tel, $endereco,$usuario,$senha);
			if($result == true){
				echo $this->listagem;
			}else{
				echo "Usuario não cadastrado!";
			}
		}
	}
	
	function daoDados_UmGer($id){
    	
    	$result = $this->varGerente->Dados_Um_Gerente($id);
		return $result;
    }

	function daoDeletarGer($id){
		echo "$id";
		$this->varGerente->deletarGerente($id);

	}

	function daoAlterarGer(){
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
			$result = $this->varGerente->alterarGerente_senha($_GET['id'], $nome, $tel, $endereco, $usuario, $senha);
		}else{
			$result = $this->varGerente->alterarGerente($_GET['id'], $nome, $tel, $endereco, $usuario);
		}
		if($result == true){
			echo $this->listagem;
		}else{
			echo "Usuario não cadastrado!";
		}
	}
}

 ?>