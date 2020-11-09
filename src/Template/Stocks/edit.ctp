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
            <div class="card-header" style="margin-bottom:20px">
              <h4 class="card-title">Réception Commande : <?= $order->order_number ?> - <?= $order->supplier->name ?> - TOTAL : <?= number_format($order->total, 2, ".", ",") ?> <?= $order->rate->name ?> </h4>
                
            </div>
            <div class="card-content">
                <div class="card-body" style="padding: 0px 1.5rem 1.5rem;">
                <div class="row" style="padding-right:15px;padding-left:15px;">
                  <input type="hidden" name="supplier_id", value="<?= $supplier->id ?>" id="supplier_id">
                      <div class="col-md-3">
                      <label>Taux d'achat</label>
                          <?= $this->Form->control('purchase_rate', array('class' => "form-control fill_before", "label" => false, "value" => $htg->amount, "required" => true)) ?>
                      </div>
                      <div class="col-md-3">
                      <label>Frais d'achat</label>
                          <?= $this->Form->control('fees', array('class' => "form-control", "label" => false, "value" => $order->fees, "required" => true)) ?>
                      </div>
                      </div>
                      <div class="row" style="margin-top:20px">
                      <div class="col-md-12">
                          <table class="table table-stripped">
                              <thead>
                                  <tr>
                                      <th style="width:60px"> </th>
                                      <th>Produit</th>
                                      <th style="width:200px">Commandé</th>
                                      <th style="width:200px">Reçu</th>
                                      <th style="width:200px">Coût</th>
                                      <th class="text-right">Total</th>
                                  </tr>
                              </thead>
                              <tbody id="product_append">
                                 <?php foreach($order->stocks as $stock) : ?> 
                                  <tr class="product_element" id="<?= $stock->product_id ?>">
                                  <td class="remove_product text-center"><input name="product_id[]" type="hidden" value="<?= $stock->product_id ?>">
                                  <input name="id[]" type="hidden" value="<?= $stock->id ?>"><i class="feather icon-trash"></i></td><td class="product_name"> <?= $stock->product->barcode ?> - <?= $stock->product->name ?></td>
                                  <td class="product_quantity"><?= $stock->quantity ?></td> 
                                  <td class="product_real_quantity"><input name="real_quantity[]" value="<?= $stock->real_quantity ?>" class="form-control edit_product"></td>
                                  <td class="product_cost"><input name="cost[]" value="<?= $stock->cost ?>" class="form-control edit_product"></td>
                                  <td class="text-right product_total"><span class="total"><?= '0.00' ?></span></td></tr>
                                 <?php endforeach; ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                      <td colspan="6">
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
<?= $this->Html->script("receivings.js") ?>