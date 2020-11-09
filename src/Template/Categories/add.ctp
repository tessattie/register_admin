<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="row" style="margin-left:0px">
<div class="col-md-3"></div>
    <div class=" col-md-6 col-12">
    <?= $this->Flash->render() ?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Nouvelle Catégorie</h4><button type="button" class="btn btn-info show_search_modal" style="float:right"><i class="feather icon-search"></i></button>
            </div>
            <div class="card-content">
                <div class="card-body">
                  <?= $this->Form->create($category) ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-label-group">
                                    <?= $this->Form->control('name', array('class' => "form-control", "placeholder" => "Nom", "label" => "Nom")) ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label-group">
                                    <?= $this->Form->control('code', array('class' => "form-control", "placeholder" => "Code", "label" => "Code")) ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label-group">
                                    <?= $this->Form->control('wholesale', array('class' => "form-control", "placeholder" => "Markup Wholesale (%)", "label" => "Markup Wholesale (%)")) ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label-group">
                                    <?= $this->Form->control('retail', array('class' => "form-control", "label" => "Markup Retail (%)", 'placeholder' => "Markup Retail (%)")) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success mr-1 mb-1" style="float:right"><i class="feather icon-check-circle"></i></button>
                                <a href="<?= ROOT_DIREC ?>/categories" onclick="return confirm('Êtes-vous de vouloir quitter cette page ?')"><button type="button" class="btn btn-warning mr-1 mb-1"><i class="feather icon-arrow-left"></i></button></a>
                            </div>
                        </div>
                    </div>
                <?= $this->Form->end() ?>
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

<div class="modal text-left" id="animation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel6" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel6">Rechercher une catégorie</h4>
            </div>
            <?= $this->Form->create("", array("url" => "/categories/find")) ?>
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