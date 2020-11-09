<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer[]|\Cake\Collection\CollectionInterface $customers
 */
?>

<!-- Scroll - horizontal and vertical table -->
<section id="horizontal-vertical">
    <div class="row" style="max-width:100%!important;margin-left:0px">
        <div class="col-12">
        <?= $this->Flash->render() ?>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Clients </h4><a href="<?= ROOT_DIREC ?>/customers/add" style="float:right"><button class="btn btn-warning" style="padding:10px 15px;font-size:18px"><i class="feather icon-plus"></i></button></a>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:100px">#</th>
                                        <th>Nom</th>
                                        <th>E-mail</th>
                                        <th>Téléphone</th>
                                        <th>Réduction (%)</th>
                                        <th>Limite (<?= ($rates[$store->customer_rate_id]) ?>)</th>
                                        <th>Statut</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($customers as $customer) : ?>
                                        <tr <?= ($id == $customer->id) ? "style='background:green'" : "" ?>>
                                        <td><?= $customer->customer_number ?></td>
                                        <td><?= $customer->name ?></td>
                                        <td><?= $customer->email ?></td>
                                        <td><?= $customer->phone ?></td>
                                        <td><?= $customer->discount ?></td>
                                        <td><?= $customer->credit_limit ?></td>
                                        <?php if($customer->status == 1) : ?>
                                            <td><span class="badge badge-success">Actif</span></td>
                                        <?php else : ?>
                                            <td><span class="badge badge-danger">Inactif</span></td>
                                        <?php endif; ?>
                                        <td class="text-right"><a href="<?= ROOT_DIREC ?>/customers/edit/<?= $customer->id ?>"><span class="badge badge-info" style='font-size:18px'><i class="feather icon-edit-1"></i></span></a></td>
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
</section>
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