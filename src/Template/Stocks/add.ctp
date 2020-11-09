<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock $stock
 */
?>

<?= $this->Form->create("") ?>
<div class="row">
    <div class=" col-md-12 col-12">
    <?= $this->Flash->render() ?>
        <div class="card">
            <div class="card-header" style="margin-bottom:40px">
            <?php   if(!empty($supplier)) : ?>
              <h4 class="card-title">Nouvel Arrivage : <?= $supplier->code." - ".$supplier->name ?></h4><a href="<?= ROOT_DIREC ?>/stocks/add"><button type="button" class="btn btn-default" style="float:right;font-size:20px;color:white;border:2px solid white">Recommencer</button></a>
            <?php else : ?>
              <h4 class="card-title">Nouvel Arrivage</h4>
            <?php   endif; ?>
                
            </div>
            <div class="card-content">
                <div class="card-body" style="padding: 0px 1.5rem 1.5rem;">
                <div class="row" style="padding-right:15px;padding-left:15px;">
                <?php if(empty($supplier)) : ?>
                <table class="table table-striped search-configuration">
                    <thead> 
                        <tr>
                            <th>Choisissez un fournisseur</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($suppliers as $supplier) : ?>
                        <?php 
                        $select = ""; 
                        foreach($product->suppliers as $ps){
                            if($supplier->id == $ps->id){
                                $select = 'checked';
                            }
                        }
                        ?>
                        <tr>
                            <td class="supplier_code"><a href="<?= ROOT_DIREC ?>/stocks/add/<?= $order ?>/<?= $supplier->id ?>" style="color:white"><?= $supplier->code ?> - <?= $supplier->name ?></a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else : ?>
                  <input type="hidden" name="supplier_id", value="<?= $supplier->id ?>" id="supplier_id">
                    <div class="col-md-3">
                      <label>Code Réception</label>
                          <?= $this->Form->control('code', array('class' => "form-control fill_before", "label" => false, "placeholder" => "Ex : 2635", "required" => true)) ?>
                      </div>
                      <div class="col-md-2">
                      <label>Devise</label>
                        <?= $this->Form->control('rate_id', array('class' => "form-control fill_before", "label" => false, "options" => $rates)) ?>
                      </div>
                      <div class="col-md-2">
                      <label>Taux d'achat</label>
                          <?= $this->Form->control('purchase_rate', array('class' => "form-control fill_before", "label" => false, "value" => $htg->amount, "required" => true)) ?>
                      </div>

                      <div class="col-md-3">
                      <label>Type</label>
                          <?= $this->Form->control('type', array('class' => "form-control", "label" => false, 'value' => 2, "options" => array(1 => "Adjustment", 2 => "Réception"), "required" => true)) ?>
                      </div>
                      <div class="col-md-2">
                      <label>Frais sur achat</label>
                          <?= $this->Form->control('fees', array('class' => "form-control", "label" => false, 'value' => 0, "required" => true)) ?>
                      </div>


                        </div>
                      <div class="row" style="margin-top:20px">
                      <div class="col-md-12">
                          <table class="table table-stripped">
                              <thead>
                                  <tr>
                                      <th style="width:60px"> </th>
                                      <th>Produit</th>
                                      <th>Quantité</th>
                                      <th>Coût</th>
                                      <th class="text-right">Total</th>
                                  </tr>
                              </thead>
                              <tbody id="product_append">
                                  
                              </tbody>
                              <tfoot>
                                <tr>
                                      <td colspan="5">
                                        <div class="form-group">
                                          <select class="select2 form-control product_search" id="product_search">
                                          <option value="">-- Choisissez un produit --</option>
                                            <?php foreach($products as $product) : ?>

                                              <option value = "<?= $product->id ?>"><?= $product->barcode." - " . $product->name . " (" . $product->rate->name . ")" ?></option>
                                            <?php endforeach; ?>
                                          </select>
                                        </div>
                                      </td>
                                  </tr>
                              </tfoot>
                          </table>
                          <button class="btn btn-success" style="font-size:20px;width:200px;float:right">Valider</button>
                      </div>
                  </div>
                <?php endif; ?>
                
                  </div>
                  

                  
                </div>

                  <button type="button" class="btn btn-danger" style="position:fixed;bottom:70px;left:45px;font-size:20px">TOTAL DUE : <span class="grand_total" id="grand_total">0.00</span> <span class="rate">HTG</span></button>

            </div>
        </div>
    </div> 
</div>
<?= $this->Form->end() ?>
<style type="text/css">
    tr:hover{
        color:green!important;
        cursor:pointer;
    }
    .autocomplete{
      position:absolute;
      width:50%;
      border:2px solid white;
      background:#262C49;
    }
    .resultset{
      padding:10px;
    }
    .edit_input{
      width:120px!important;
    }
    .form-group{
      margin-bottom:0px!important;
    }
    .remove_product{
      background-color:#EA5455 !important;
      color:white;font-size:20px;
      font-weight:bold;
    }
</style>

<?= $this->Html->script("scanner/jquery.scannerdetection.js") ?>
<?= $this->Html->script("stock.js") ?>