<?php 
include_once('topo.php');

?>

            <div style="background-color: #DBDCD6">
             <div class="row">
               
                
                <div style="">
                    <div class="col-lg-2">
                        <p style="margin-top: 10px; margin-left: 14px; font-size: 17px; float: left; "><a href="index.php">Home</a> /</p>
                    </div>
                    <div class="col-lg-5">
                       <p style="margin-top: 10px; margin-right: 14px; margin-left: 25px; float: right; float: right; font-size: 20px; color: #240B">Gestão de Pessoas </p>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
           

            <div class="row">
                 <div class="container">        
                        <div class="col-lg-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>    
                                           
                                        </div>
                                       
                                    </div>
                                </div>
                                <a href="lista.php?tipo=cliente&local=Pessoas">
                                    <div class="panel-footer">
                                        <span class="pull-left">Gerenciar Clientes</span>
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
                                    </div>
                                </div>
                                <a href="lista.php?tipo=vendedor&local=Pessoas">
                                    <div class="panel-footer">
                                        <span class="pull-left">Gerenciar Colaboradores</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                
                
                   
                    <div class="col-lg-4">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    
                                </div>
                            </div>
                            <a href="lista.php?tipo=gerente&local=Pessoas">
                                <div class="panel-footer">
                                    <span class="pull-left">Gerenciar Administrador</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
               
                </div>
           

            <!-- /.row -->
        </div>
    </div>
</div>
  

<?php 

include_once('fim.php');
?>