<?php 
include_once('../../controler/conexao.php');
include_once('topo.php');

if($_GET['tipo'] == 'cliente'){
    include_once('../../controler/daoCliente.php');
    $daoCli = new daoCliente();
}
$valorTipo = 0;

$arrValues = diferencia($_GET['tipo']);
?>

        <div style="background-color: #DBDCD6;">
            <div class="row">
               
                
                <div style="">
                    <div class="col-lg-9">
                        <p style="margin-top: 10px; margin-left: 14px; font-size: 17px; float: left; ">
                            <a href="index.php">Home</a> / 
                            <?php 
                            if($_GET['local'] == 'Pessoas'){ ?> 
                                <a href="pessoas.php"> <?php  echo $_GET['local']; ?></a></p>
                            <?php 
                            }if ($_GET['tipo'] == 'item') {
                                if($_GET['local'] == 'Pedidos'){ ?>
                                    <a href="lista.php?tipo=pedido&local=Pedidos"> <?php  echo $_GET['local']; ?></a></p>
                                <?php    
                                }else{ ?>
                                    <p style="margin-top: 10px; margin-left: 7px; font-size: 17px; float: left;">/<a href="lista.php?tipo=cliente&local=Pessoas"> <?php  echo 'Clientes'; ?></a></p>
                                    <?php
                                }
                            } ?>
                    </div>
                    <?php if ($_GET['tipo'] != 'item') { ?>
                    <div class="col-lg-3">
                       <a href="cadastro.php?tipo=<?php echo $_GET['tipo'] ?>&local=<?php echo $_GET['local'] ?>">
                            <button class="btn-success" style="margin-top: 10px; margin-right: 14px; width: 150px; float: right; float: right;">Novo <?php echo $_GET['tipo']; ?></button>
                        </a>
                    </div>
                <?php } ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <!-- /.row -->
            <div class="row">
                <div class="container">

                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabela de <?php if($_GET['tipo'] == 'vendedor'){echo $_GET['tipo'].'es';}elseif ($_GET['tipo'] == 'item') {
                            echo "Itens";
                            } else{echo $_GET['tipo'].'s';} ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <?php if (!empty($arrValues)) {

                                    ?>
                                    <thead>
                                         <tr>
                                        <?php foreach ($arrValues[0] as $key => $useless) { 
                                            print "<th class='bg-primary'>$key</th>";
                                            }

                                        ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($arrValues as $row) { ?>
                                            <tr class="">
                                                <?php foreach ($row as $key => $val) {
                                                    if($key == 'Total'){
                                                        //total do pedido
                                                        $val = 'R$ '.$val;
                                                    }
                                                    if($key == 'Divida'){
                                                        //Quando for cliente ou pedido
                                                        if(empty($val)){
                                                            $val = 0;    
                                                        }
                                                        $val = number_format($val, 2, ',', '.');
                                                        $val = 'R$ '.$val;

                                                       
                                                    }
                                                    if($key == 'Data'){
                                                        $val = date('d/m/Y', strtotime($val));
                                                    }
                                                    if($key == 'Codigo'){
                                                        //coluna: Codigo
                                                        $codigo = $val;
                                                       
                                                    }
                                                    if($key == 'Cliente'){
                                                        if(empty($val)){
                                                            $val = '#######';
                                                        }
                                                        $local = $_GET['local'];
                                                        $val = "<a href='lista.php?id=$codigo&tipo=item&local=$local'>$val</a>"; 
                                                    }

                                                    print "<td>$val</td>";
                                        
                                                } 
                                                if ($_GET['tipo'] != 'item') {   ?>
                                                    <td style="width: 160px; background-color: #FFFFFF">
                                                        <a 
                                                            href="alterar.php?id=<?php echo $codigo ?>&tipo=<?php echo $_GET['tipo'] ?>&local=<?php echo $_GET['local'] ?>"><button class="btn-warning">Alterar</button>
                                                        </a>
                                                        <a 
                                                            href="#"><button class="btn-danger" onclick="confirmExclusao(<?php echo $codigo; ?>,<?php echo $valorTipo; ?>)">Excluir</button>
                                                        </a>
                                                    </td>
                                            </tr>
                                                <?php 
                                                }
                                        } 
                                    } else{
                                            echo "<p align='center' style='color: #931616; font-size: 18px'>Nunhum registro</p>";
                                        } 
                                    ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>



                
               
            </div>
            <!-- /.row -->
           
                          
        </div>
                      
    </div>
                  
               
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>

<?php 

function diferencia($tipo){
    if ($tipo == 'vendedor') {
        include_once('../../controler/daoVendedor.php');
        $daovended = new daoVendedor();  
        $arrValues = $daovended->daoDadosVended();
        $GLOBALS['valorTipo'] = 2; //ValorTipo == 2 : vendedor
        return $arrValues;
        
    }elseif($tipo == 'cliente'){
        include_once('../../controler/daoCliente.php');
        $daoCli = new daoCliente();  
        $arrValues = $daoCli->daoDadosCli();
        $GLOBALS['valorTipo'] = 1; //ValorTipo == 1 : Cliente
        return $arrValues;

    }elseif ($tipo == 'gerente') {
        include_once('../../controler/daoGerente.php');
        $daoGer = new daoGerente();  
        $arrValues = $daoGer->daoDadosGer();
        $GLOBALS['valorTipo'] = 3; //ValorTipo == 3 : Gerente
        return $arrValues;
        
    }elseif ($tipo == 'produto') {
        include_once('../../controler/daoProduto.php');
        $daoProduto = new daoProduto();  
        $arrValues = $daoProduto->daoDadosProdt();
        $GLOBALS['valorTipo'] = 4; //ValorTipo == 4 : Produto
        return $arrValues;
        
    }elseif ($tipo == 'pedido') {
        include_once('../../controler/daoPedido.php');
        $daopedido = new daoPedido();  
        $arrValues = $daopedido->daoDadosPedid();
        $GLOBALS['valorTipo'] = 5; //ValorTipo == 5 : Pedido
        return $arrValues;
        
    }elseif($tipo == 'item'){
        include_once('../../controler/daoItemPedido.php');
        $daoitem = new daoItemPedido();
        if($_GET['local'] == 'Pedidos'){
            $arrValues = $daoitem->daoDados_Itens_por_Pedido($_GET['id']);
        }else{
            $arrValues = $daoitem->daoDados_Itens_por_Cliente($_GET['id']);
        }
        return $arrValues;  
    }
} 


?>
<script>
function confirmExclusao(iduser, tipo) {
    var func = '<?php echo "daoCli->deletarCliente("?>'+iduser+'<?php echo ");" ?>';

    var id = iduser;
   if (confirm("Tem certeza que deseja excluir o registro "+iduser+" dessa categoria?")) {

    location.href="deletar.php?id="+id+"&tipo="+tipo;
   }else{
        return false
   }
}
</script>
