<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
 */
?>
<div class="row" style="margin-left:0px">
<div class="col-md-3"></div>
    <div class=" col-md-6 col-12">
    <?= $this->Flash->render() ?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Nouveau Fournisseur</h4><button type="button" class="btn btn-info show_search_modal" style="float:right"><i class="feather icon-search"></i></button>
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
                                    <div class="col-md-3"><?= $this->Form->control('area_code', array('class' => "form-control", "label" => "Code Pays", 'value' => "+509")) ?></div> 
                                    <div class="col-md-9"><?= $this->Form->control('phone', array('class' => "form-control", "label" => "Téléphone", 'placeholder' => "Téléphone")) ?></div>
                                </div>
                                    
                                </div>
                            </div>
                            
                            
                            <div class="col-12">
                                <div class="form-label-group" style="border-top:2px solid white;margin-top:10px;padding-top:10px">
                                    <?= $this->Form->control('delay', array('class' => "form-control", "placeholder" => "Ex : 21 jours", "label" => "Délai de livraison")) ?>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('status', array('class' => "form-control", "label" => "Statut", "options" => $status)) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success mr-1 mb-1" style="float:right"><i class="feather icon-check-circle"></i></button>
                                <a href="<?= ROOT_DIREC ?>/suppliers" onclick="return confirm('Êtes-vous de vouloir quitter cette page ?')"><button type="button" class="btn btn-warning mr-1 mb-1"><i class="feather icon-arrow-left"></i></button></a>
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