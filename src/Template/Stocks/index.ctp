<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock[]|\Cake\Collection\CollectionInterface $stocks
 */
?>

<section id="horizontal-vertical">
    <div class="row" style="max-width:100%!important;margin-left:0px">
        <div class="col-12">
        <?= $this->Flash->render() ?>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Inventaire </h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                    <div class="row" style="margin-bottom:30px">
                            <div class="col-md-2"><a href="<?= ROOT_DIREC ?>/stocks/add/0"><button class="btn btn-success" style="width:100%;font-size:18px;"><i style="font-size:22px;" class="feather icon-plus"></i> Nouvel Arrivage</button></a></div>
                            <div class="col-md-2"><a href="<?= ROOT_DIREC ?>/stocks/add/1"><button class="btn btn-info" style="width:100%;font-size:18px;"><i style="font-size:22px;" class="feather icon-plus"></i> Nouvelle Commande</button></a></div>
                        </div>
                        <div class="table-responsive">
                        
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:150px">#</th>
                                        <th>Fournisseur</th>
                                        <th>Date</th>
                                        <th>Produits</th>
                                        <th>Frais</th>
                                        <th>Total</th>
                                        <th>Statut</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($orders as $order) : ?>
                                        <tr <?= ($id == $order->id) ? "style='background:green'" : "" ?>>
                                            <td><a style="color:white;text-decoration:underline" href="<?= ROOT_DIREC ?>/orders/view/<?= $order->id ?>"><?= $order->order_number ?></a></td>
                                            
                                            <td><?= $order->supplier->code . " - " . $order->supplier->name ?></td>
                                            <td><?= date("d M Y", strtotime($order->created)) ?></td>
                                            <td><?= count($order->stocks) ?></td>
                                            <td><?= number_format($order->fees, 2, ".", ",") . " " . $order->rate->name ?></td>
                                            <td><?= number_format($order->total, 2, ".", ","). " " . $order->rate->name ?></td>
                                            <?php if($order->status == 1) : ?>
                                                <td><span class="badge badge-info">Commandé</span></td>
                                            <?php elseif($order->status == 2) : ?>
                                                <td><span class="badge badge-warning">Reçu</span></td>
                                            <?php elseif($order->status == 3) : ?>
                                                <td><span class="badge badge-success">Posté</span></td>
                                            <?php else :  ?>
                                                <td><span class="badge badge-danger">Annulé</span></td>
                                            <?php endif; ?>
                                            <td class="text-right"><a href="<?= ROOT_DIREC ?>/stocks/edit/<?= $order->id ?>"><span class="badge badge-info" style='font-size:18px'><i class="feather icon-edit-1"></i></span></a></td>
                                        </tr>
                                        <?php $i++ ?>
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

