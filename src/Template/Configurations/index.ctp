<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Configuration[]|\Cake\Collection\CollectionInterface $configurations
 */
?>

<!-- Striped rows start -->
<div class="row" id="table-striped" style="max-width:100%;margin-right:0px;margin-left:0px;padding-bottom:100px">
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Logo</h4>
            </div>
            <div class="card-content" style="padding-bottom:15px">
                <?= $this->Form->create('', array('enctype' => 'multipart/form-data', "url" => "/configurations/logo")) ?>
                <div class="row">
                  <div class="col-12 text-center">
                    <?php if(!empty($configuration->logo)) : ?>
                        <label class="btn btn-default btn-file modallabel" id="fileInputLabel" style="border: 3px dashed white;
                            border-radius: 0px;
                            padding: 42px;">
                            <img class="thumbnailImg" src="<?= $configuration->logo ?>" width="100%" height="auto">
                            <input type="file" style="display: none;" class="inputFile" name="featured_image">
                        </label>
                    <?php else : ?>
                        <label class="btn btn-default btn-file modallabel" id="fileInputLabel">
                            <img class="thumbnailImg" src="<?= ROOT_DIREC ?>/img/thumbnail.jpg" width="100%" height="auto">
                            <input type="file" style="display: none;" class="inputFile" name="featured_image">
                        </label>
                    <?php endif; ?>
                    <?= (!empty($fileerror)) ? "<div class='error-message'>".$fileerror."</div>" : "" ?>
                  </div>
                </div>
                <a href="<?= ROOT_DIREC ?>/configurations/remove"><button class="btn btn-danger" style="float:right;margin-right:28px;font-size:18px;padding:10px"><i class="feather icon-trash"></i></button></a>
                <?= $this->Form->button(__('<i class="feather icon-check"></i>'), array('class' => "btn btn-success", "style" => "float:right;margin-right:28px;font-size:18px;padding:10px", 'escape' => false)); ?>    
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"></h4>
            </div>
            <div class="card-content">
                <?= $this->Form->create($configuration, array('enctype' => 'multipart/form-data')) ?>
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <tbody>
                            <tr>
                                <th>Magasin</th>
                                <th class="text-right"><?= $this->Form->control('name', array("class" => "form-control field_edit", "value" => $configuration->name, "style" => "width:180px;float:right", "label" => false, "id" => "configurations_store_name")); ?></th>
                            </tr>
                            <tr>
                                <th>Adresse</th>
                                <th class="text-right"><?= $this->Form->control('address', array("class" => "form-control field_edit", "value" => $configuration->address, "style" => "width:180px;float:right", "label" => false)); ?></th>
                            </tr>
                            <tr>
                                <th>Téléphone</th>
                                <th class="text-right"><?= $this->Form->control('phone', array("class" => "form-control field_edit", "value" => $configuration->phone, "style" => "width:180px;float:right", "label" => false)); ?></th>
                            </tr>
                            <tr>
                                <th>E-mail</th>
                                <th class="text-right"><?= $this->Form->control('email', array("class" => "form-control field_edit", "value" => $configuration->email, "style" => "width:180px;float:right", "label" => false)); ?></th>
                            </tr>
                            <tr>
                                <th>Site Web</th>
                                <th class="text-right"><?= $this->Form->control('website', array("class" => "form-control field_edit", "value" => $configuration->website, "style" => "width:180px;float:right", "label" => false)); ?></th>
                            </tr>
                            <tr>
                                <th>Chèques à l'ordre de</th>
                                <th class="text-right"><?= $this->Form->control('checks', array("class" => "form-control field_edit", "value" => $configuration->checks, "style" => "width:180px;float:right", "label" => false)); ?></th>
                            </tr>
                            <tr>
                                <th>Devise initiale des produits</th>
                                <th class="text-right"><?= $this->Form->control('enter_rate_id', array("class" => "form-control field_edit", "options" => $rates, "value" => $configuration->enter_rate_id, "style" => "width:180px;float:right", "label" => false)); ?></th>
                            </tr>
                            <tr>
                                <th>Devise d'affichage des produits</th>
                                <th class="text-right"><?= $this->Form->control('rate_id', array("class" => "form-control field_edit", "options" => $rates, "value" => $configuration->rate_id, "style" => "width:180px;float:right", "label" => false)); ?></th>
                            </tr>
                            <tr>
                                <th>Devise Crédits Clients</th>
                                <th class="text-right"><?= $this->Form->control('customer_rate_id', array("class" => "form-control field_edit", "options" => $rates, "value" => $configuration->customer_rate_id, "style" => "width:180px;float:right", "label" => false)); ?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script("shortcuts.js") ?>
<script type="text/javascript">
    document.getElementById('configurations_store_name').focus();
</script>