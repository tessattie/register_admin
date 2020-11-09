<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<?= $this->Html->script("products.js") ?>
<?= $this->Form->create($product) ?>
<div class="row" style="margin-left:0px">
    <div class=" col-md-4">
    <?= $this->Flash->render() ?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Nouveau Produit </h4><button type="button"  class="btn btn-info show_search_modal" style="float:right"><i class="feather icon-search"></i></button>
            </div>
            <div class="card-content">
                <div class="card-body">
                  
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('barcode', array('class' => "form-control", "placeholder" => "Code Barre", "label" => "Code Barre", "tabindex" => 11)) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('name', array('class' => "form-control", "placeholder" => "Nom", "label" => "Nom", "tabindex" => 12)) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('type', array('class' => "form-control", "label" => "Type", "options" => $types, "tabindex" => 13)) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('rate_id', array('class' => "form-control", "label" => "Devise", "options" => $devises, "value" => $store->enter_rate_id)) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('status', array('class' => "form-control", "label" => "Statut", "options" => $status, "tabindex" => 14)) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Catégorie</h4>
            </div>
            <div class="card-content" style="height:330px;overflow-y:scroll">
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                <table class="table table-striped">
                                <thead> 
                                    <tr>
                                        <th>Nom</th>
                                        <th>R (%)</th>
                                        <th>WS (%)</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($categories as $category) : ?>
                                    <tr>
                                        <td><?= $category->name ?></td>
                                        <td class="td_retail"><?= $category->retail ?></td>
                                        <td class="td_wholesale"><?= $category->wholesale ?></td>
                                        <td class="text-right"><input class='category_id' type="radio" name="category_id" value="<?= $category->id ?>" <?= ($product->category_id == $category->id) ? "checked" : "" ?>></td>
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
            
            <div class="card-content" style="height:330px;overflow-y:scroll">
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                <table class="table table-striped">
                                <thead> 
                                    <tr>
                                        <th>Fournisseurs</th>
                                        <th></th>
                                        <th></th>
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
                                        <td ><?= $supplier->code ?></td>
                                        <td ><?= $supplier->name ?></td>
                                        <td class="text-right"><input class="supplier_id" type="checkbox" name="supplier_id[]" value="<?= $supplier->id ?>" <?= $select ?>></td>
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
    <div class="col-md-4">
    <div class="card">
            <div class="card-header">
                <h4 class="card-title">Coût</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('cost', array('class' => "form-control", "Placeholder" => "Coût", 'label' => "Coût (<span class='product_rate'>".$rates[$store->enter_rate_id]."</span>)", "escape" => false)) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <label style="width:100%">Taux d'achat :
                                <?php if($store->enter_rate_id == 1) : ?>
                                    <span class = "taux_achat" style="float:right"><?= number_format($vente->amount, 2, ".", ',') ?></span>
                                <?php else : ?>
                                    <span class = "taux_achat" style="float:right"><?= number_format($achat->amount, 2, ".", ',') ?></span>
                                <?php endif; ?>
                                </label>
                                <label style="width:100%">Coût (<span class='converted_rate'>HTG</span>) :
                                <?php if($store->enter_rate_id == 1) : ?>
                                    <span class = "prix_cost" style="float:right"><?= number_format($product->cost* $vente->amount, 2, ".", ',') ?></span>
                                <?php else : ?>
                                    <span class = "prix_cost" style="float:right"><?= number_format($product->cost* $achat->amount, 2, ".", ',') ?></span>
                                <?php endif; ?>
                                </label>
                                        <label style="width:100%">Markup Retail (%) :
                                    <span class = "markup_retail" style="float:right"><?= number_format(0, 2, ".", ',') ?></span></label>
                                    <label style="width:100%">Markup wholesale (%) :
                                    <span class = "markup_wholesale" style="float:right"><?= number_format(0, 2, ".", ',') ?></span></label>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Prix</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                        <div class="col-12">
                                <div class="form-label-group">
                                    <input class='appliquer_categorie' type="checkbox" name="appliquer" value="10"> Appliquer les Markups de la catégorie choisie
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('price', array('class' => "form-control", 'label' => "Retail (<span class='product_rate'>".$rates[$store->enter_rate_id]."</span>)", "escape" => false)) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('wholesale', array('class' => "form-control", 'label' => "Wholesale (<span class='product_rate'>".$rates[$store->enter_rate_id]."</span>)", "escape" => false)) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <label style="width:100%">Taux du Jour :
                                <?php if($store->enter_rate_id == 1) : ?>
                                    <span class = "taux_du_jour" style="float:right"><?= number_format($vente->amount, 2, ".", ',') ?></span>
                                <?php else : ?>
                                    <span class = "taux_du_jour" style="float:right"><?= number_format($achat->amount, 2, ".", ',') ?></span>
                                <?php endif; ?>
                                </label>
                                <label style="width:100%">Retail (<span class='converted_rate'>HTG</span>) :
                                <?php if($store->enter_rate_id == 1) : ?>
                                    <span class = "prix_retail" style="float:right"><?= number_format($product->price* $vente->amount, 2, ".", ',') ?></span>
                                <?php else : ?>
                                    <span class = "prix_retail" style="float:right"><?= number_format($product->price* $achat->amount, 2, ".", ',') ?></span>
                                <?php endif; ?>
                                </label>
                                <label style="width:100%">Wholesale (<span class='converted_rate'>HTG</span>) :
                                <?php if($store->enter_rate_id == 1) : ?>
                                    <span class = "prix_wholesale" style="float:right"><?= number_format($product->wholesale* $vente->amount, 2, ".", ',') ?></span>
                                <?php else : ?>
                                    <span class = "prix_wholesale" style="float:right"><?= number_format($product->wholesale* $achat->amount, 2, ".", ',') ?></span>
                                <?php endif; ?>
                                </label>
                            </div>
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
                <button type="submit" class="btn btn-success mr-1 mb-1" style="float:right"><i class="feather icon-check-circle"></i></button>
                <a href="<?= ROOT_DIREC ?>/products/index/<?= $product->id ?>" onclick="return confirm('Êtes-vous de vouloir quitter cette page ?')"><button type="button" class="btn btn-warning"><i class="feather icon-arrow-left"></i></button></a>
                <a href="<?= ROOT_DIREC ?>/products/delete/<?= $product->id ?>" onclick="return confirm('Êtes-vous sur de vouloir supprimer ce produit ?')"><button type="button" class="btn btn-danger"><i class="feather icon-trash"></i></button></a>
                <a href="<?= ROOT_DIREC ?>/products/add" onclick="return confirm('Êtes-vous de vouloir quitter cette page ?')"><button type="button" class="btn btn-info"><i class="feather icon-plus-circle"></i></button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
<style type="text/css">
    .btn{
        font-size:19px!important;
    }
</style>


<div class="modal text-left" id="animation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel6" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel6">Rechercher un produit</h4>
            </div>
            <?= $this->Form->create("", array("url" => "/products/find")) ?>
            <div class="modal-body">
            <div class="alert alert-success" role="alert">
                Appuyez sur la touche <span class="text-bold-600">ESC</span> pour fermer cette fenêtre.
            </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-label-group">
                            <?= $this->Form->control('barcode', array('class' => "form-control barcode_search",  "label" => "Par Code", "id" => "focus_input")) ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-label-group">
                            <?= $this->Form->control('name', array('class' => "form-control name_search", "label" => "Par nom")) ?>
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