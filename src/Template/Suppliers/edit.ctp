<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
 */
?>

<div class="row" style="margin-left:0px">
<div class=" col-md-1 col-12"></div>
    <div class=" col-md-3 col-12">
    <?= $this->Flash->render() ?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Profil : <?= $supplier->code . " - " . $supplier->name ?></h4><button type="button" class="btn btn-info show_search_modal" style="float:right"><i class="feather icon-search"></i></button>
            </div>
            <div class="card-content">
                <div class="card-body">
                  <?= $this->Form->create($supplier) ?>
                    <div class="form-body">
                        <div class="row">
                        <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('code', array('class' => "form-control", "placeholder" => "Code Fournisseur", "label" => "Code Fournisseur", "value" => $supplier_code)) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('name', array('class' => "form-control", "placeholder" => "Nom", "label" => "Nom")) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('type', array('class' => "form-control", "label" => "Type", "options" => $types)) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('contact', array('class' => "form-control", "label" => "Contact", "placeholder" => "Contact")) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group" style="border-top:2px solid white;margin-top:10px;padding-top:10px">
                                    <?= $this->Form->control('address', array('class' => "form-control", "label" => "Adresse", "Placeholder" => "Adresse")) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('email', array('class' => "form-control", "label" => "E-mail", "Placeholder" => "Ex : john@mail.com")) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                <div class="row">
                                    <div class="col-md-3"><?= $this->Form->control('area_code', array('class' => "form-control", "label" => "Code Pays")) ?></div> 
                                    <div class="col-md-9"><?= $this->Form->control('phone', array('class' => "form-control", "label" => "Téléphone", 'placeholder' => "Téléphone")) ?></div>
                                </div>
                                    
                                </div>
                            </div>
                            
                            
                            <div class="col-12">
                                <div class="form-label-group" style="border-top:2px solid white;margin-top:10px;padding-top:10px">
                                    <?= $this->Form->control('delay', array('class' => "form-control", "placeholder" => "Ex : 21 jours", "label" => "Délai de livraison", "type" => "number", "min" => "1")) ?>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('status', array('class' => "form-control", "label" => "Statut", "options" => $status)) ?>
                                </div>
                            </div>

                        </div>
                    </div>
                <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-content" style="height:420px;overflow-y:scroll">
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                    <table class="table table-striped">
                                        <thead> 
                                            <tr>
                                                <th>Produits <button type="button" class="btn btn-info" data-toggle="modal" data-target="#show_add_product_modal" style="padding:3px"><i class="feather icon-plus"></i></button></th>
                                                <th class="text-right">Coût</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($supplier->products_suppliers as $product) : ?>
                                            <tr>
                                                <td><a style="color:white;text-decoration:underline" href="<?= ROOT_DIREC ?>/products/edit/<?= $product->id ?>"><?= $product->product->barcode . " - " . $product->product->name ?></a></td>
                                                <td class="text-right"><?= $product->product->cost ." " . $product->product->rate->name ?> <a onclick = "return confirm('Etes vous sur de vouloir supprimer ce produit')"  href="<?= ROOT_DIREC ?>/suppliers/remove/<?= $product->id ?>"><button type="button" class="btn btn-danger"style="padding:3px"><i class="feather icon-minus"></i></button></a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-content" style="height:420px;overflow-y:scroll">
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                    <table class="table table-striped">
                                        <thead> 
                                            <tr>
                                                <th>Factures</th>
                                                <th>Total</th>
                                                <th class="text-right">Statut</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($supplier->orders as $order) : ?>
                                            <tr>
                                                <td><a style="color:white;text-decoration:underline" href="<?= ROOT_DIREC ?>/orders/view/<?= $order->id ?>"><?= $order->order_number ?></a></td>
                                                <td><?= number_format($order->total, 2) ." " . $order->rate->name ?></td>
                                                <?php if($order->status == 1) : ?>
                                                <td class="text-right"><span class="badge badge-info">Commandé</span></td>
                                            <?php elseif($order->status == 2) : ?>
                                                <td class="text-right"><span class="badge badge-warning">Reçu</span></td>
                                            <?php elseif($order->status == 3) : ?>
                                                <td class="text-right"><span class="badge badge-success">Posté</span></td>
                                            <?php else :  ?>
                                                <td class="text-right"><span class="badge badge-danger">Annulé</span></td>
                                            <?php endif; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-content" style="height:420px;overflow-y:scroll">
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                    <table class="table table-striped">
                                        <thead> 
                                            <tr>
                                                <th style="vertical-align:middle">Paiements <button type="button" class="btn btn-info" data-toggle="modal" data-target="#show_add_payment_modal" style="padding:3px"><i class="feather icon-plus"></i></button></th>
                                                <th class="text-right">Montant</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($supplier->spayments as $payment) : ?>
                                            <tr>
                                                <td><?= $payment->id + 4000 ?></td>
                                                <td class="text-right"><?= number_format($payment->amount, 2)." ".$payment->rate->name ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            
            <div class="card-content">
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                    <table class="table table-striped">
                                        <thead> 
                                            <tr>
                                                <th style="vertical-align:middle">Balances Compte</th>
                                                <th class="text-right"><a href="<?= ROOT_DIREC ?>/suppliers/recalculate/<?= $supplier->id ?>"><button class="btn btn-success" style="padding:7px">Recalculer</button></a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>USD</td>
                                                <td class="text-right"><?= number_format($supplier->balance_usd, 2) ?></td>
                                            </tr>
                                            <tr>
                                                <td>HTG</td>
                                                <td class="text-right"><?= number_format($supplier->balance_htg, 2) ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    <div class=" col-md-1 col-12"></div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">

                <button type="submit" class="btn btn-success mr-1 mb-1" style="float:right"><i class="feather icon-check-circle"></i></button>
                
                <a href="<?= ROOT_DIREC ?>/suppliers/index/<?= $supplier->id ?>" onclick="return confirm('Êtes-vous de vouloir quitter cette page ?')"><button type="button" class="btn btn-warning"><i class="feather icon-arrow-left"></i></button></a>

                <a href="<?= ROOT_DIREC ?>/suppliers/delete/<?= $supplier->id ?>" onclick="return confirm('Êtes-vous sur de vouloir supprimer ce produit ?')"><button type="button" class="btn btn-danger"><i class="feather icon-trash"></i></button></a>

                <a href="<?= ROOT_DIREC ?>/suppliers/add" onclick="return confirm('Êtes-vous de vouloir quitter cette page ?')"><button type="button" class="btn btn-info"><i class="feather icon-plus-circle"></i> </button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .btn{
        font-size:19px!important;
    }
</style>

<?php if(!empty($neighbors['previous']->id)) : ?>
    <a style="position:absolute;left:50px;top:40%"  href="<?= ROOT_DIREC ?>/suppliers/edit/<?= $neighbors['previous']->id ?>" style="margin-left:20px"><button type="button" class="btn btn-default" style="border:2px solid white;color:white;margin-top: -13px;padding:0.8rem 2rem"><i class="feather icon-chevron-left"></i></button></a>
    <?php endif; ?>
    <?php if(!empty($neighbors['next']->id)) : ?>
    <a style="position:absolute;right:50px;top:40%" href="<?= ROOT_DIREC ?>/suppliers/edit/<?= $neighbors['next']->id ?>"><button type="button" class="btn btn-default" style="border:2px solid white;color:white;margin-top: -13px;padding:0.8rem 2rem"> <i class="feather icon-chevron-right"></i></button></a>
<?php endif; ?>

<div class="modal text-left" id="animation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel6" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel6">Rechercher un Fournisseur</h4>
            </div>
            <?= $this->Form->create("", array("url" => "/suppliers/find")) ?>
            <div class="modal-body">
            <div class="alert alert-success" role="alert">
                Appuyez sur la touche <span class="text-bold-600">ESC</span> pour fermer cette fenêtre.
            </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-label-group">
                            <?= $this->Form->control('code', array('class' => "form-control barcode_search", "id" => "focus_input",  "label" => "Par Code", 'value' => '')) ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-label-group">
                            <?= $this->Form->control('name', array('class' => "form-control name_search", "label" => "Par nom", "value" => "")) ?>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type='submit' class="btn btn-primary">Rechercher</button>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<div class="modal text-left" id="show_add_product_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel6" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel6">Ajouter un produit</h4>
            </div>
            <?= $this->Form->create("", array("url" => "/suppliers/product")) ?>
            <div class="modal-body">
            <div class="alert alert-success" role="alert">
                Appuyez sur la touche <span class="text-bold-600">ESC</span> pour fermer cette fenêtre.
            </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-label-group">
                            <?= $this->Form->control('barcode', array('class' => "form-control barcode_search", "id" => "focus_input",  "label" => "Par Code", 'value' => '')) ?>
                            <?= $this->Form->control('supplier_id', array('type' => "hidden",  'value' => $supplier->id)) ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-label-group">
                            <?= $this->Form->control('name', array('class' => "form-control name_search", "label" => "Par nom", "value" => "")) ?>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type='submit' class="btn btn-primary">Ajouter</button>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<div class="modal text-left" id="show_add_payment_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel6" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel6">Ajouter un paiement</h4>
            </div>
            <?= $this->Form->create("", array("url" => "/spayments/add")) ?>
            <div class="modal-body">
            <div class="alert alert-success" role="alert">
                Appuyez sur la touche <span class="text-bold-600">ESC</span> pour fermer cette fenêtre.
            </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-label-group">
                            <?= $this->Form->control('amount', array('class' => "form-control", "id" => "focus_input",  "label" => "Montant", 'value' => '')) ?>
                            <?= $this->Form->control('supplier_id', array('type' => "hidden",  'value' => $supplier->id)) ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-label-group">
                            <?= $this->Form->control('rate_id', array('class' => "form-control", "label" => "Devise", "options" => array(1 => "HTG", 2 => "USD"))) ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-label-group">
                            <?= $this->Form->control('type', array('class' => "form-control", "label" => "Devise", "options" => array(1 => "CASH", 2 => "CHEQUE", 3 => "CARTE", 4 => "VIREMENT"))) ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-label-group">
                            <?= $this->Form->control('daily_rate', array('class' => "form-control", "label" => "Taux du Jour", "value" => $htg->amount)) ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-label-group">
                            <?= $this->Form->control('account', array('class' => "form-control", "label" => "Appliquer sur", "options" => array(1 => "Balance HTG (".number_format($supplier->balance_htg, 2).")", 2 => "Balance USD (".number_format($supplier->balance_usd, 2).")"))) ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-label-group">
                            <?= $this->Form->control('memo', array('class' => "form-control", "label" => "Mémo", "value" => '')) ?>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type='submit' class="btn btn-primary">Ajouter</button>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>