<?php 
include_once('topo.php');
include_once('../../controler/util.php');
$util = new Util();

?>

            <div style="background-color: #DBDCD6">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header" style="margin-left: 14px">Home</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="container">
                
            <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-list-alt fa-5x"></i>    
                                           
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $util->contadorHome('Produtos'); ?></div>
                                            <div>Novos Produtos!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="lista.php?tipo=produto&local=Produtos">
                                    <div class="panel-footer">
                                        <span class="pull-left">Gerenciar Produtos</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $util->contadorHome('Pessoas'); ?></div>
                                            <div>Novos Clientes!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="pessoas.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Gerenciar Pessoas</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                </div>
                <div class="row">  
                    <div class="col-lg-2"></div>  
                    <div class="col-lg-4">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $util->contadorHome('Pedidos'); ?></div>
                                        <div>Novas Vendas!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="lista.php?tipo=pedido&local=Pedidos">
                                <div class="panel-footer">
                                    <span class="pull-left">Gerenciar Vendas</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-money fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">13</div>
                                        <div>Situação!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Gerenciar Contabilidade</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                </div>
           

            <!-- /.row -->
        </div>
  
<?php 

include_once('fim.php');
?>