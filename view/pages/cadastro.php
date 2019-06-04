<?php 
//include_once('../../controler/conexao.php');
include_once('topo.php');





?>

        <div style="background-color: #DBDCD6;">
            <div class="row">
               
                
                <div style="">
                    <div class="col-lg-9">
                        <p style="margin-top: 10px; margin-left: 14px; font-size: 17px; float: left; ">
                          <a href="index.php">Home</a> / 
                          <?php 
                          if(!($_GET['local'] == 'Pessoas')){ //Dados que não são de pessoas
                            if($_GET['local'] == 'Produtos'){ ?>
                              <a href="lista.php?tipo=<?php echo $_GET['tipo'] ?>&local=<?php echo $_GET['local']; ?>">
                                <?php echo $_GET['local']; ?>
                              </a>
                            <?php 
                            }elseif ($_GET['local'] == 'Pedidos') { ?>
                              <a href="lista.php?tipo=<?php echo $_GET['tipo'] ?>&local=<?php echo $_GET['local']; ?>">
                                <?php echo $_GET['local']; ?>
                              </a>
                            <?php 
                            }
                          }else{ ?>
                            <a href="pessoas.php">Pessoas</a> /
                            <a href="lista.php?tipo=<?php echo $_GET['tipo'] ?>&local=<?php echo $_GET['local']; ?>"><?php echo ucfirst($_GET['tipo']) ; ?></a>
                          <?php } ?> 
                          
                        </p>
                    </div>
                    
                </div>
            </div>
                 <div class="row" style="margin-left: ">
                <div class="container">
                <?php if($_GET['local'] == 'Pessoas'){ ?>  
                <div class="col-lg-12">
                    <form action="cadastro.php?tipo=<?php echo $_GET['tipo'] ?>&local=<?php echo $_GET['local'] ?>" method="post">
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="inputname">Nome Completo</label>
                          <input type="text" class="form-control" name="inputNome" placeholder="Fulano Oliveira Silva" required="">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="inputTelefone">Telefone</label>
                          <input type="number" class="form-control" name="inputTelefone" required="">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="inputEndereco">Endereço</label>
                            <input type="text" class="form-control" name="inputEndereco" placeholder="Rua, Numero, Bairro, Cidade">
                        </div>
                      </div>
                        <?php if(($_GET['tipo'] == 'vendedor')||($_GET['tipo'] == 'gerente')){ 
                            echo "
                      <div class='form-row'>
                           <div class='form-group col-md-3'>
                          <label for='inputUsuario'>Usuário</label>
                          <input type='text' class='form-control' name='inputUsuario' placeholder='fulano.silva, ciclano123' required='' >
                        </div>
                        <div class='form-group col-md-3'>
                          <label for='inputPassword'>Senha</label>
                          <input type='password' class='form-control' name='inputPassword' required=''>
                        </div>
                      </div>
                         ";} ?>
                      <div class="form-group col-md-7">
                          <button type="submit" class="btn btn-primary" name="cadastro">Cadastrar</button>
                      </div>
                     
                </form>
              </div>
              <?php }elseif ($_GET['local'] == 'Produtos') { ?>
                <div class="col-lg-12">
               <form action="cadastro.php?tipo=<?php echo $_GET['tipo'] ?>&local=<?php echo $_GET['local'] ?>" method="post">
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="inputname">Nome</label>
                          <input type="text" class="form-control" name="inputNome" required="">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="inputDescricao">Descrição</label>
                          <input type="text" class="form-control" name="inputDescricao" required="">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputPreco">Preço</label>
                            <input type="number" step="0.01" class="form-control" name="inputPreco" required="">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputQtd">Quantidade</label>
                            <input type="number" class="form-control" name="inputQtd" required="">
                        </div>
                      </div>
                        
                      <div class="form-group col-md-7">
                          <button type="submit" class="btn btn-primary" name="cadastro">Cadastrar</button>
                      </div>

                     
                </form>
              </div>
              <?php
              } elseif ($_GET['local'] == 'Pedidos') { ?>
                <div class="col-lg-12">
                <form action="cadastro.php?tipo=<?php echo $_GET['tipo'] ?>&local=<?php echo $_GET['local'] ?>" method="post">
                      <div class="form-row">
                        <div class="form-group col-md-3">
                          <label for="inputcliente">Cliente</label>
                          <select class="form-control" name="inputCliente">
                            <option></option>
                             <?php 
                              include_once('../../controler/daoPedido.php');
                              $daoPedid = new DaoPedido();  
                              $arrValues = $daoPedid->daoDadosCli(); ?>
                              <?php foreach ($arrValues as $row) { ?>
                                            
                                                <?php foreach ($row as $key => $val) { 
                                                    if($key == 'Cliente'){
                                                
                                                      if(isset($_POST['avancar'])) {
                                                        if( $_POST['inputCliente'] == $row['Codigo'] ){
                                                          ?>
                                                            <option value="<?php echo $row['Codigo'] ?>" selected="selected"><?php echo $row['Cliente'] ?></option>
                                                    <?php  
                                                        }
                                                      }
                                                    ?>
                                                    
                                                    <option value="<?php echo $row['Codigo'] ?>" ><?php echo $row['Cliente'] ?></option>   
                                                    
                                                <?php 
                                                    
                                                  }
                                                } 
                              } 
                                                ?>
                                                
                            
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="inputcliente">Data</label>
                          <input type="date" class="form-control" name="inputData" value="<?php if(isset($_POST['avancar'])) { echo $_POST['inputData']; } ?>">
                        </div>
                        <div class="form-group col-md-2">
                           <label for="inputDescricao">Nº produtos</label>
                          <select id="options" name="num_produtos" class="form-control" >
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                          </select>
                        </div>
                        <div class="form-group col-md-5 " style="margin-top: 25px">
                          <button type="submit" class="btn btn-primary" name="avancar">Avançar</button>
                        </div>  
                      </div>

                    </form>
                    

                    <form action="cadastro.php?tipo=<?php echo $_GET['tipo'] ?>&local=<?php echo $_GET['local'] ?>" method="post">
                    <?php 
                    if(isset($_POST['avancar'])) {
                    ?>
                      

                    <?php
                      include_once('../../controler/daoItemPedido.php');
                      $novo = new DaoItemPedido();
                      $arrValues = $novo->daoDadosProdt();

                      for ($i=0; $i <$_POST['num_produtos'] ; $i++) { 
                        include('cadastroPedido.php');
                      }
                    
                    ?>
                    <div class="form-group col-md-3">
                          <label for="inputPago">Valor Pago</label>
                          <input onchange="totalItem();" step="0.01" id="inputValorPg" type="number" class="form-control" name="inputValorPg" value="0">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="inputTotal">Valor Total</label>
                          <input readonly="false" step="0.01" id="inputValorTotal" type="number" class="form-control" name="inputValorTotal" value="0">
                        </div>


                    <input type="hidden" id="inputCliente" name="inputCliente" value="<?php echo $_POST['inputCliente']; ?>">
                    <input type="hidden"  id="inputData" name="inputData" value="<?php echo $_POST['inputData']; ?>">
                    <input type="hidden" id="num_produtos" name="num_produtos" value="<?php echo $_POST['num_produtos']; ?>">

                    <div class="form-group col-md-12 ">
                          <button  id="cadastro" type="submit" class="btn btn-primary" name="cadastro">Cadastrar</button>
                      </div>
                    </form>
                  </div>

                    
                        <?php  }  } ?>
                      
                      
                     
                    
              
              
</div>
</div>
</div>
<script type="text/javascript">

total = 0;


// Exemplo de JavaScript inicial para desativar envios de formulário, se houver campos inválidos.
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Pega todos os formulários que nós queremos aplicar estilos de validação Bootstrap personalizados.
    var forms = document.getElementsByClassName('needs-validation');
    // Faz um loop neles e evita o envio
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

    function optionCheck(el){
        var option = document.getElementById("options").value;
        var display = document.getElementById(el).style.display;
        if(option > 1){
            document.getElementById(el).style.display = 'block';
            
        }
        if(option == 1){
            document.getElementById(el).style.display = 'none';
        }

    }




function totalItem(id = 0) {
//document.write('Luiz araugo'+id);
//var objHidden1 = document.getElementById("hidden1"+id);

var aux1 = -1000;
var objText1 = document.getElementById("inputTotal"+id);
var objText2 = document.getElementById("inputQtd"+id);
var objText3 = document.getElementById("inputProduto"+id);
var objText4 = document.getElementById("inputValorTotal");
var objText6 = document.getElementById("inputValorPg");
var objText7 = document.getElementById("inputCliente");
var objText8 = document.getElementById("cadastro");


//var objText3 = document.getElementById("text3");
        if(objText2.value == ''){
          objText2.value = 0;
        }
        if(objText2.value < 0){
          objText2.value = 0;
        }
        if(objText6.value < 0){
          objText6.value = 0;
        }

        resultado = objText3.value.split(" ");
        if(aux1 != objText2.value){
          // se a qtd de item mudar, entra nesta contições
        total -= parseFloat(objText1.value);
         console.log(resultado);
        objText1.value = parseFloat(objText2.value)* parseFloat(resultado[0]);
        total += parseFloat(objText1.value);
        aux1 = objText2.value;
        objText4.value = parseFloat(total);
        
        /*if(objText6.value < objText4.value){
          alert('Selecione o cliente, para cadastrar a divida')
          objText8.disabled=true;
        }else{
          objText8.disabled=false;
        }*/
        }

      
  }


  function finalizarVenda(pago, total, cliente){
    //  var objText1 = document.getElementById("inputValorPg");
    //  var objText2 = document.getElementById("inputValorTotal");
    //  var objText3 = document.getElementById("inputCliente");
    // console.log(objText1);
    // console.log(objText2.value);
    var troco = parseFloat(pago - total);
    if(troco < 0){
      alert("Divida de : "+troco+" para o cliente Nº: "+cliente );
      return troco;
    }else{
      alert("Troco de: "+troco+" para o cliente Nº: "+cliente );
      return troco;
    }
  }

  function naoTemCliente(){
     var objText1 = document.getElementById("inputValorPg");
     var objText2 = document.getElementById("inputValorTotal");
     var objText3 = document.getElementById("inputCliente");
     var objText4 = document.getElementById("cadastro");
     if(objText3.value == ''){
     if(objText2.value > objText1.value){
      alert('Selecione o cliente, para cadastrar a divida')
      objText4.disabled=true;
     }else{
      objText4.disabled=false;
     }}

  }
</script>

<?php

    include_once('fim.php');
    if(isset($_POST['cadastro'])){
      if($_GET['tipo'] == 'cliente'){
          include_once('../../controler/daoCliente.php');
          $daoCli = new daoCliente();  
          $daoCli->daoCadastrarCli();
      }elseif($_GET['tipo'] == 'vendedor'){ 
          include_once('../../controler/daoVendedor.php');
          $vend = new daoVendedor();
          $vend->daoCadastrarVended();
      }elseif($_GET['tipo'] == 'gerente'){ 
          include_once('../../controler/daoGerente.php');
          $ger = new daoGerente();
          $ger->daoCadastrarGer();
      }elseif($_GET['tipo'] == 'produto'){ 
          include_once('../../controler/daoProduto.php');
          $prod = new daoProduto();
          $prod->daoCadastrarProdt();
      }elseif($_GET['tipo'] == 'pedido'){ 
        
        if($_POST['inputValorPg'] < $_POST['inputValorTotal']){ 
          if($_POST['inputCliente'] == ''){ 
          ?>
            <script type='text/javascript'>alert('Selecione o cliente, para cadastrar a divida');</script>
          <?php  
          }else{
            realizaVenda();
          }
        }else{
          realizaVenda();
        } 
      }   
    }
function realizaVenda(){
    ?>
   <script type='text/javascript'>finalizarVenda(<?php echo $_POST['inputValorPg']; ?>, <?php echo $_POST['inputValorTotal']; ?>,  <?php echo $_POST['inputCliente']; ?>);</script>
           <?php
          include_once('../../controler/daoPedido.php');
          $pedid = new DaoPedido();
          $id_pedido = $pedid->daoCadastrarPedido(5,$_POST['inputCliente'],$_POST['inputData']);
          $variavelphp = $_POST['inputValorPg'] - $_POST['inputValorTotal'];
          echo $_POST['num_produtos'];
          include_once('../../controler/daoItemPedido.php');
          $item = new daoItemPedido();

          $i = 0;
          while (true) {
            if(isset($_POST['inputProduto'.$i])) {
              $var = $_POST['inputProduto'.$i];
              $produto = explode(" ", $var);
              $item->daoCadastrarItemPedid($_POST['num_produtos'], $id_pedido['id_pedido'], $produto[1], $_POST['inputQtd'.$i], $_POST['inputTotal'.$i], $variavelphp);
              $i++;
            }else{
              break;
            }
          }
         
}

 ?>




                <!-- /.col-lg-12 -->
            