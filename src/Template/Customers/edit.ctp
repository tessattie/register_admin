<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="row" style="margin-left:0px">
<div class="col-md-3"></div>
    <div class=" col-md-6 col-12">
    <?= $this->Flash->render() ?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Editer Client : <?= $customer->name ?></h4><button type="button" class="btn btn-info show_search_modal" style="float:right"><i class="feather icon-search"></i></button>
            </div>
            <div class="card-content">
                <div class="card-body">
                  <?= $this->Form->create($customer) ?>
                    <div class="form-body">
                        <div class="row">
                        <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('customer_number', array('class' => "form-control", "placeholder" => "Numéro Client", "label" => "Numéro Client", "value" => $customer->customer_number)) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('name', array('class' => "form-control", "placeholder" => "Nom", "label" => "Nom")) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('email', array('class' => "form-control", "placeholder" => "E-mail", "label" => "E-mail")) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('phone', array('class' => "form-control", "label" => "Téléphone", 'placeholder' => "Téléphone")) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('discount', array('class' => "form-control", "label" => "Réduction (%)")) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('credit_limit', array('class' => "form-control", "label" => "Limite de crédit (".$rates[$store->customer_rate_id].")")) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <?= $this->Form->control('status', array('class' => "form-control", "label" => "Statut", "options" => $status)) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success mr-1 mb-1" style="float:right"><i class="feather icon-check-circle"></i></button>
                                <a href="<?= ROOT_DIREC ?>/customers/index/<?= $customer->id ?>" onclick="return confirm('Êtes-vous de vouloir quitter cette page ?')"><button type="button" class="btn btn-warning mr-1 mb-1"><i class="feather icon-arrow-left"></i></button></a>
                                <a href="<?= ROOT_DIREC ?>/customers/delete/<?= $customer->id ?>" onclick="return confirm('Êtes-vous sur de vouloir supprimer cet utilisateur ?')"><button type="button" class="btn btn-danger mr-1 mb-1"><i class="feather icon-trash"></i></button></a>
                                <a href="<?= ROOT_DIREC ?>/customers/add" onclick="return confirm('Êtes-vous de vouloir quitter cette page ?')"><button type="button" class="btn btn-info mr-1 mb-1"><i class="feather icon-plus-circle"></i></button></a>
                                
                            </div>
                        </div>
                    </div>
                <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(!empty($neighbors['previous']->id)) : ?>
    <a style="position:absolute;left:50px;top:50%"  href="<?= ROOT_DIREC ?>/customers/edit/<?= $neighbors['previous']->id ?>" style="margin-left:20px"><button type="button" class="btn btn-default" style="border:2px solid white;color:white;margin-top: -13px;padding:0.8rem 2rem"><i class="feather icon-chevron-left"></i></button></a>
    <?php endif; ?>
    <?php if(!empty($neighbors['next']->id)) : ?>
    <a style="position:absolute;right:50px;top:50%" href="<?= ROOT_DIREC ?>/customers/edit/<?= $neighbors['next']->id ?>"><button type="button" class="btn btn-default" style="border:2px solid white;color:white;margin-top: -13px;padding:0.8rem 2rem"> <i class="feather icon-chevron-right"></i></button></a>
<?php endif; ?>

<style type="text/css">
    .btn{
        font-size:19px!important;
    }
</style>
<div class="modal text-left" id="animation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel6" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel6">Rechercher un client</h4>
            </div>
            <?= $this->Form->create("", array("url" => "/customers/find")) ?>
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
