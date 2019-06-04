<?php   
include_once('topo.php');
include_once('../../controler/conexao.php');
$arrValues = diferencia($_GET['tipo']);




?>

        <div style="background-color: #DBDCD6;">
            <div class="row">
               
                
                <div style="">
                    <div class="col-lg-9">
                        <p style="margin-top: 10px; margin-left: 14px; font-size: 17px; float: left; "><a href="index.php">Home</a> / 
                         <?php 
                          if(!($_GET['local'] == 'Pessoas')){ //Dados que não são de pessoas
                          ?>
                              <a href="lista.php?tipo=<?php echo $_GET['tipo'] ?>&local=<?php echo $_GET['local']; ?>">
                                <?php echo $_GET['local']; ?>
                              </a>

                          <?php 
                          }else{ 
                          ?>
                            <a href="pessoas.php">Pessoas</a> /
                            <a href="lista.php?tipo=<?php echo $_GET['tipo'] ?>&local=<?php echo $_GET['local']; ?>">
                              <?php echo ucfirst($_GET['tipo']) ; ?>
                            </a>
                          <?php } ?> </p>
                    </div>
                    
                </div>
            </div>
                 <div class="row" style="margin-left: ">
                <div class="container">
                  <?php if($_GET['local'] == 'Pessoas'){ ?>
                    <div class="col-lg-12">
               <form action="alterar.php?id=<?php echo $_GET['id'] ?>&tipo=<?php echo $_GET['tipo'] ?>&local=<?php echo $_GET['local']?> " method="post">
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="inputname">Nome Completo</label>
                          <input type="text" class="form-control" name="inputNome" value="<?php echo $arrValues['Nome'] ?>" required="">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="inputTelefone">Telefone</label>
                          <input required="" type="number" class="form-control" name="inputTelefone" value="<?php echo $arrValues['Telefone'] ?>" >
                        </div>
                        <div class="form-group col-md-5">
                            <label for="inputEndereco">Endereço</label>
                            <input type="text" class="form-control" name="inputEndereco" value="<?php echo $arrValues['Endereco'] ?>">
                        </div>
                      </div>
                        <?php if(($_GET['tipo'] == 'vendedor')||($_GET['tipo'] == 'gerente')){ 
                          $Usuario = $arrValues['Usuario'];
                            echo "
                      <div class='form-row'>
                           <div class='form-group col-md-3'>
                          <label for='inputUsuario'>Usuário</label>
                          <input type='text' class='form-control' name='inputUsuario' value='".$arrValues['Usuario']."' required=''>
                        </div>
                        <div class='form-group col-md-3'>
                          <label for='inputPassword'>Senha</label>
                          <input type='password' class='form-control' name='inputPassword'>
                        </div>
                      </div>
                         ";} ?>
                      <div class="form-group col-md-7">
                          <button type="submit" class="btn btn-primary" name="atualizar">Atualizar</button>
                      </div>
                     
                </form>
                <?php }elseif ($_GET['local'] == 'Produtos') { ?>
                  <div class="col-lg-12">
                 <form action="alterar.php?id=<?php echo $_GET['id'] ?>&tipo=<?php echo $_GET['tipo'] ?>&local=<?php echo $_GET['local']?> " method="post">
                        <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="inputname">Nome</label>
                            <input type="text" class="form-control" name="inputNome" value="<?php echo $arrValues['Nome'] ?>" required="">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputDescricao">Descrição</label>
                            <input type="text" class="form-control" name="inputDescricao" value="<?php echo $arrValues['Sobre'] ?>" required="">
                          </div>
                          <div class="form-group col-md-2">
                              <label for="inputPreco">Preço</label>
                              <input type="number" step="0.01" class="form-control" name="inputPreco" value="<?php echo $arrValues['Valor'] ?>" required="">
                          </div>
                          <div class="form-group col-md-2">
                              <label for="inputQtd">Quantidade</label>
                              <input type="number" class="form-control" name="inputQtd" value="<?php echo $arrValues['Quantidade'] ?>" required="">
                          </div>
                        </div>
                          
                        <div class="form-group col-md-7">
                            <button type="submit" class="btn btn-primary" name="atualizar">Atualizar</button>
                        </div>
                       
                  </form>
              <?php 
            }elseif ($_GET['local'] == 'Pedidos') { ?>
              <form action="alterar.php?id=<?php echo $_GET['id'] ?>&tipo=<?php echo $_GET['tipo'] ?>&local=<?php echo $_GET['local'] ?>" method="post">
                      <div class="form-row">
                        <div class="form-group col-md-3">
                          <label for="inputcliente">Cliente</label>
                          <input readonly="false" id="inputcliente" type="text" class="form-control" name="inputcliente" value="<?php echo $arrValues['Cliente']; ?>">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="inputcolaborador">Colaborador</label>
                          <input readonly="false" id="inputcolaborador" type="text" class="form-control" name="inputcolaborador" value="<?php echo $arrValues['Vendedor']; ?>">
                        </div>
                        <div class="form-group col-md-2">
                          <label for="inputTotal">Valor Total</label>
                          <input step="0.01" readonly="false" id="inputValorTotal" type="number" class="form-control" name="inputValorTotal" value="<?php echo $arrValues['Total']; ?>">
                        </div>
                        <div class="form-group col-md-2">
                          <label for="inputdivida">Divida</label>
                          <input  step="0.01" id="inputdivida" type="number" class="form-control" name="inputdivida" onchange="seDividaMaiorTotal()" value="<?php $val = number_format($arrValues['Divida'], 1);  echo $val ?>" required="">
                        </div>
                        <div class="form-group col-md-2">
                          <label for="inputcliente">Data</label>
                          <input  readonly="false" type="date" class="form-control" name="inputData" value="<?php echo $arrValues['Data']; ?>">
                        </div>
                    <div class="form-group col-md-12 ">
                          <button type="submit" class="btn btn-primary" name="atualizar">Atualizar</button>
                      </div>
                    </form>
                  </div>
                <?php }  ?>

                    
                        
           
</div>
</div>
</div>
</div>


<script type="text/javascript">
  function seDividaMaiorTotal(){
    obj1 = document.getElementById("inputValorTotal");
    obj2 = document.getElementById("inputdivida");
    obj3 = document.getElementById("inputcliente");
    if(obj3.value == ''){
      obj2.value = 0;
      alert('Não pode alterar a divida, pois não existe cliente definido');
    }
    if(obj1.value<obj2.value){  
      obj2.value = parseFloat(obj1.value);
    }
  }

</script>

<?php

    if(isset($_POST['atualizar'])){

      if($_GET['tipo'] == 'cliente'){
          include_once('../../controler/daoCliente.php');
          $daoCli = new daoCliente();  
          $daoCli->daoAlterarCli();
      }elseif($_GET['tipo'] == 'vendedor'){ 
          include_once('../../controler/daoVendedor.php');
          $vend = new daoVendedor();
          $vend->daoAlterarVended();
      }elseif($_GET['tipo'] == 'gerente'){ 
          include_once('../../controler/daoGerente.php');
          $vend = new daoGerente();
          $vend->daoAlterarGer();
      }elseif($_GET['tipo'] == 'produto'){ 
          include_once('../../controler/daoProduto.php');
          $vend = new daoProduto();
          $vend->daoAlterarProdt();
      }elseif($_GET['tipo'] == 'pedido'){
          include_once('../../controler/daoItemPedido.php');
          $item = new daoItemPedido();
          $qtdpedidos = $item->dao_Itens_Por_Pedido($_GET['id']);
          $divida = $_POST['inputdivida'] / $qtdpedidos['qtdpedidos'];
          $item->daoUpdateDivida($_GET['id'], $divida);

      }
    }
     function diferencia($tipo){
      if ($tipo == 'vendedor') {
          include_once('../../controler/daoVendedor.php');
          $daovended = new daoVendedor();  
          $arrValues = $daovended->daoDados_UmVended($_GET['id']);
          $GLOBALS['valorTipo'] = 2; //ValorTipo == 2 : vendedor
          return $arrValues;

          
      }elseif($tipo == 'cliente'){
          /* include_once('../../controler/conexao.php');
          $stmt = $pdo->prepare("SELECT * from cliente where id_cliente = ?");
        $stmt->execute([$_GET['id']]);
        $arrValues = $stmt->fetch();*/  
          include_once('../../controler/daoCliente.php');
          $daoCli = new daoCliente();  
          $arrValues = $daoCli->daoDados_UmCli($_GET['id']);
          $GLOBALS['valorTipo'] = 1; //ValorTipo == 1 : Cliente
          return $arrValues;



      }elseif ($tipo == 'gerente') {
          include_once('../../controler/daoGerente.php');
          $daoGer = new daoGerente();  
          $arrValues = $daoGer->daoDados_UmGer($_GET['id']);
          $GLOBALS['valorTipo'] = 3; //ValorTipo == 3 : Gerente
          return $arrValues;
          
      }elseif ($tipo == 'produto') {
          include_once('../../controler/daoProduto.php');
          $daoGer = new daoProduto();  
          $arrValues = $daoGer->daoDados_UmProdt($_GET['id']);
          $GLOBALS['valorTipo'] = 4; //ValorTipo == 4 : Produto
          return $arrValues;
          
      }elseif ($tipo == 'pedido') {
          include_once('../../controler/daoPedido.php');
          $daoGer = new daoPedido();  
          $arrValues = $daoGer->daoDados_Um_Pedido($_GET['id']);
          $GLOBALS['valorTipo'] = 5; //ValorTipo == 5 : Pedido
          return $arrValues;
        }
    }




    include_once('fim.php');
 ?>
<script>
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
</script>
                <!-- /.col-lg-12 -->
            