
<div id="hiddenDiv" class="form-row"> 

                        <div class="form-group col-md-3">
                          <label for="inputDescricao">Produto <?php echo $i+1 ?></label>
                          <select id="inputProduto<?php echo $i ?>" class="form-control" name="inputProduto<?php echo $i ?>" required="" onchange="totalItem(<?php echo $i ?>)">
                            <?php foreach ($arrValues as $row) { ?>
                                            
                                                <?php foreach ($row as $key => $val) { 
                                                    
                                                    if($key == 'Nome'){
                                                    ?>
                                                    
                                                    <option id="<?php echo $row['Valor'] ?>" value="<?php echo $row['Valor'].' '.$row['Codigo'] ?>"><?php echo $row['Codigo'].'. '.$row['Nome'] ?></option>
                                                <?php }} }?>
                                                
                                            
                                            
                                               
                                            
                               
                                   
                                
                                
                        
                           
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputQtd">Quantidade</label>
                            <input required="" type="number" class="form-control" id="inputQtd<?php echo $i ?>" name="inputQtd<?php echo $i ?>" onchange="totalItem(<?php echo $i ?>)" value="0">
                        </div>
                        
                        <div class="form-group col-md-2" style="margin-right: 23%">
                            <label for="inputPreco">Total</label>
                            <input readonly="false"  type="number" step="0.01" class="form-control" id="inputTotal<?php echo $i ?>" name="inputTotal<?php echo $i ?>" value="0">
                        </div>
                        

                      </div>