<?php 

/**
 * 
 */

class Util {
	function diferencia_GerEVendedor($user, $senha){
		include_once("../../modal/gerente.php");
		include_once("../../modal/Vendedor.php");
		$user = strip_tags($user);
		$senha = strip_tags($senha);
		$this->clear_text($user);
		$this->clear_text($senha);
		$ger = new Gerente();
		$vended = new Vendedor();
		$valor = $ger->verificaSeGerente($user,$senha);
		if(!(empty($valor))) {
			$_SESSION['id_user'] = $user;
			$_SESSION['nome_user'] = $nome_gerente; 
			header("Location: ../../view/pages/index.php");
		}
		$valor = $vended->verificaSeVendedor($user,$senha);
		if(!(empty($valor))) {
			$_SESSION['id_user'] = $user;
			$_SESSION['nome_user'] = $nome_vendedor;
			header("Location: ../../view/pages/index.php");
		}

	}

	function clear_text($s) {
	    $do = true;
	    while ($do) {
	        $start = stripos($s,'<script');
	        $stop = stripos($s,'</script>');
	        if ((is_numeric($start))&&(is_numeric($stop))) {
	            $s = substr($s,0,$start).substr($s,($stop+strlen('</script>')));
	        } else {
	           
	            $do = false;
	        }
	    }
	    return trim($s);
	}

	function contadorHome($local){
		if($local == 'Produtos'){
			include_once("../../modal/produto.php");
			$produto = new Produto();
			$cont = $produto->contadorDeProdutos();
			return $cont['qtd'];
		}elseif ($local == 'Pessoas') {
			include_once("../../modal/cliente.php");
			$cliente = new Cliente();
			$cont = $cliente->contadorDeClientes();
			return $cont['qtd'];
		}elseif ($local == 'Pedidos') {
			include_once("../../modal/pedido.php");
			$pedido = new Pedido();
			$cont = $pedido->contadorDePedidos();
			return $cont['qtd'];
		}
	}

}


 ?>