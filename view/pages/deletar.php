<?php 




if($_GET['tipo'] == 1){
	include_once('../../controler/daoCliente.php');
	$daoCli = new daoCliente();
	$daoCli->daoDeletarCli($_GET['id']);
	echo "<script type=text/javascript>alert('Operação realizada com sucesso!');window.location='../pages/lista.php?tipo=cliente&local=Pessoas'</script>";
}
if($_GET['tipo'] == 2){
	include_once('../../controler/daoVendedor.php');
	$daoVend = new daoVendedor();
	$daoVend->daoDeletarVended($_GET['id']);
	echo "<script type=text/javascript>alert('Operação realizada com sucesso!');window.location='../pages/lista.php?tipo=vendedor&local=Pessoas'</script>";
}
if($_GET['tipo'] == 3){
	include_once('../../controler/daoGerente.php');
	$daoGer = new daoGerente();
	$daoGer->daoDeletarGer($_GET['id']);
	echo "<script type=text/javascript>alert('Operação realizada com sucesso!');window.location='../pages/lista.php?tipo=gerente&local=Pessoas'</script>";
}
if($_GET['tipo'] == 4){
	include_once('../../controler/daoProduto.php');
	$daoProdt = new daoProduto();
	$daoProdt->daoDeletarProdut($_GET['id']);
	echo "<script type=text/javascript>alert('Operação realizada com sucesso!');window.location='../pages/lista.php?tipo=produto&local=Produtos'</script>";
}
if($_GET['tipo'] == 5){
	include_once('../../controler/daoItemPedido.php');
	$daoItem = new daoItemPedido();
	$daoItem->daoDeletarPedido($_GET['id']);

	include_once('../../controler/daoPedido.php');
	$daoPedid = new daoPedido();
	$daoPedid->daoDeletarPedid($_GET['id']);
	echo "<script type=text/javascript>alert('Operação realizada com sucesso!');window.location='../pages/lista.php?tipo=pedido&local=Pedidos'</script>";
}

?>