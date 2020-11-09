<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<div class="row">
    <div class=" col-md-12 col-12">
    <?= $this->Flash->render() ?>
        <div class="card">
            <div class="card-header" style="margin-bottom:20px">
              <h4 class="card-title">Résumé Commande Stock : <?= $order->order_number ?> - <a style="color:white;text-decoration:underline" href="<?= ROOT_DIREC ?>/suppliers/edit/<?= $order->supplier_id ?>"><?= $order->supplier->name ?></a></h4>
                <?php if($order->status == 1) : ?>
                    <span class="badge badge-info" style="float:right;padding:8px;font-size:18px">Statut : Commandé</span>
                <?php elseif($order->status == 2) : ?>
                    <span class="badge badge-warning" style="float:right;padding:8px;font-size:18px">Statut : Reçu</span>
                <?php elseif($order->status == 3) : ?>
                    <span class="badge badge-success" style="float:right;padding:8px;font-size:18px">Statut : Posté</span>
                <?php else :  ?>
                    <span class="badge badge-danger" style="float:right;padding:8px;font-size:18px">Statut : Annulé</span>
                <?php endif; ?>
            </div>
            <div class="card-content">
                <div class="card-body" style="padding: 0px 1.5rem 1.5rem;">
                      <div class="row" style="margin-top:20px">
                      <div class="col-md-12">
                          <table class="table table-stripped">
                              <thead>
                                  <tr>
                                      <th>Produit</th>
                                      <th style="width:200px">Commandé</th>
                                      <th style="width:200px">Reçu</th>
                                      <th style="width:250px">Coût</th>
                                      <th style="width:250px">Total Commandé</th>
                                      <th class="text-right">Vrai Total</th>
                                  </tr>
                              </thead>
                              <tbody id="product_append">
                                 <?php $total=0; $real_total=0; foreach($order->stocks as $stock) : ?> 
                                  <tr class="product_element" id="<?= $stock->product_id ?>">
                                  <td class="product_name"> <?= $stock->product->barcode ?> - <?= $stock->product->name ?></td>
                                  <td class="product_quantity"><?= $stock->quantity ?></td> 
                                  <td class="product_real_quantity"><?= $stock->real_quantity ?></td>
                                  <td class="product_cost"><?= number_format($stock->cost,2) ?> <?= $order->rate->name ?></td>
                                  <td class="product_total"><span class="total"><?= number_format($stock->cost*$stock->quantity,2) ?></span> <?= $order->rate->name ?></td>
                                  <td class="text-right product_total"><span class="total"><?= number_format($stock->cost*$stock->real_quantity,2) ?></span> <?= $order->rate->name ?></td></tr>
                                  <?php $total = $total + $stock->cost*$stock->quantity ;$real_total = $real_total + $stock->cost*$stock->real_quantity ;?>
                                 <?php endforeach; ?>
                              </tbody>
                              <tfoot>
                              <tr>
                                   <th colspan="4">Sous-Total</th>
                                   <th><?= number_format($total, 2) ?> <?= $order->rate->name ?></th> 
                                   <th class="text-right"><?= number_format($real_total, 2) ?> <?= $order->rate->name ?></th> 
                                </tr>
                              <tr>
                                   <th colspan="4">Frais</th>
                                   <th><?= number_format($order->fees, 2) ?> <?= $order->rate->name ?></th> 
                                   <th class="text-right"><?= number_format($order->fees, 2) ?> <?= $order->rate->name ?></th> 
                                </tr>
                                <tr>
                                   <th colspan="4">Total</th>
                                   <th><?= number_format($order->total, 2) ?> <?= $order->rate->name ?></th> 
                                   <th class="text-right"><?= number_format($order->real_total, 2) ?> <?= $order->rate->name ?></th> 
                                </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
                
                  </div>
                  
                </div>

            </div>
        </div>
    </div> 
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">                
                <a href="<?= ROOT_DIREC ?>/stocks/index/<?= $order->id ?>" onclick="return confirm('Êtes-vous de vouloir quitter cette page ?')"><button type="button" class="btn btn-warning"><i class="feather icon-arrow-left"></i> Retour</button></a>
                <?php if($order->status != 4) : ?>
                <a href="<?= ROOT_DIREC ?>/stocks/cancel/<?= $order->id ?>" onclick="return confirm('Êtes-vous sur de vouloir supprimer ce produit ?')"><button type="button" class="btn btn-danger"><i class="feather icon-x"></i> Annuler</button></a>
                <?php else : ?>
                <a href="<?= ROOT_DIREC ?>/stocks/activate/<?= $order->id ?>" onclick="return confirm('Êtes-vous sur de vouloir supprimer ce produit ?')"><button type="button" class="btn btn-success"><i class="feather icon-check"></i> Réactiver</button></a>
                <?php endif; ?>

                <a href="<?= ROOT_DIREC ?>/stocks/add/1/<?= $order->supplier_id ?>" style="float:right"><button type="button" class="btn btn-success"><i class="feather icon-plus-circle"></i> Nouvelle Commande</button></a>

                <?php if($order->status == 1) : ?>
                <a href="<?= ROOT_DIREC ?>/stocks/edit/<?= $order->id ?>"><button type="button" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Recevoir</button></a>
                <?php endif; ?>

                <?php if($order->status == 2) : ?>
                <a href="<?= ROOT_DIREC ?>/stocks/post/<?= $order->id ?>" onclick="return confirm('Êtes-vous de vouloir poster cette commande ?')"><button type="button" class="btn btn-info"><i class="feather icon-plus"></i> Poster</button></a>
                <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
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
