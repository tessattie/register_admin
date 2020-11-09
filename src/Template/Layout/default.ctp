<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = $store->name;
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('vendors/css/vendors.min.css') ?>

    <?= $this->Html->css('vendors/css/tables/datatable/datatables.min.css') ?>
    <?= $this->Html->css('vendors/css/forms/select/select2.min.css') ?>


    <?= $this->Html->css('vendors/css/charts/apexcharts.css') ?>
    <?= $this->Html->css('vendors/css/extensions/tether-theme-arrows.css') ?>
    <?= $this->Html->css('vendors/css/extensions/tether.min.css') ?>
    <?= $this->Html->css('vendors/css/extensions/shepherd-theme-default.css') ?>

    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('bootstrap-extended.min.css') ?>
    <?= $this->Html->css('colors.css') ?>
    <?= $this->Html->css('components.css') ?>
    <?= $this->Html->css('themes/dark-layout.css') ?>
    <?= $this->Html->css('themes/semi-dark-layout.css') ?>

    <?= $this->Html->css('core/menu/menu-types/horizontal-menu.css') ?>
    <?= $this->Html->css('core/colors/palette-gradient.css') ?>
    <?= $this->Html->css('pages/dashboard-analytics.css') ?>
    <?= $this->Html->css('pages/card-analytics.css') ?>
    <?= $this->Html->css('plugins/tour/tour.css') ?>

    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('custom.css') ?>

    <?= $this->Html->script("core/libraries/jquery.min.js") ?>

    <?php echo "<script> var ROOT_DIREC = '".ROOT_DIREC."'</script>" ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body class="horizontal-layout horizontal-menu dark-layout 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns" data-layout="dark-layout">
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-brand-center" style="background:#10163A!important;">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar-brand" href="../../../html/ltr/horizontal-menu-template-dark/<?= ROOT_DIREC ?>/">
                        <div style="margin-top:62px"><img src="<?= $store->logo ?>" style="width:50px"></div>
                    </a></li>
            </ul>
        </div>
        <div class="navbar-wrapper" style="background:#10163A!important;">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                        <li style="color:white;font-size:22px"><?= $store->name ?></li>
                        <li style="color:white;font-size:22px"><button class="btn btn-warning" style="padding:5px;font-size:17px;margin-left:15px;margin-top:-3px" data-toggle="modal" data-target="#rates">ACHAT : <?= $htg->amount ?></button></li>
                        <li style="color:white;font-size:22px"><button data-toggle="modal" data-target="#rates" class="btn btn-success" style="padding:5px;font-size:17px;margin-left:5px;margin-top:-3px">VENTE : <?= $usd->amount ?></button></li>
                        </ul>
                    </div>
                    <div class="nav navbar-nav float-right" style="margin-right:35px">
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <?= $this->Form->create("a", array("url" => "/sales/set_dates")) ?>
                                <input value="<?= $filterfrom  ?>" type="date" name="from" style="height: 30px;width: 187px;background: #f2f2f2;border: 1px solid white;color: black;border-radius: 3px;margin-right: 5px;">
                                <input value="<?= $filterto  ?>" type="date" name="to" style="height: 30px;width: 187px;background: #f2f2f2;color: black;border: 1px solid white;border-radius: 3px;margin-right: 5px;">
                                <button class="btn btn-success" style="padding: 8px 12px!important;
                                margin-top: -3px!important;"><i class="feather icon-check"></i></button>
                                <?= $this->Form->end() ?>
                            </li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600" style="margin-top:14px">John Doe</span></div><span></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="page-user-profile.html"><i class="feather icon-user"></i> Edit Profile</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="auth-login.html"><i class="feather icon-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-dark navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/horizontal-menu-template-dark/<?= ROOT_DIREC ?>/">
                            <div class="brand-logo"></div>
                            <h2 class="brand-text mb-0">Vuexy</h2>
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
                </ul>
            </div>
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <!-- include ../../../includes/mixins-->
                <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class="nav-item <?= ($this->request->getParam('action') == 'dashboard') ? 'active' : '' ?>"><?= $this->Html->link('<i class="feather icon-activity"></i> Dashboard','/sales/dashboard', ['class' => 'nav-link', 'escape' => false]); ?>
                    </li>
                    <li class="nav-item <?= ($this->request->getParam('controller') == 'Categories') ? 'active' : '' ?>"><?= $this->Html->link('<i class="feather icon-menu"></i> Catégories','/categories/edit', ['class' => 'nav-link', 'escape' => false]); ?>
                    </li>
                    <li class="nav-item <?= ($this->request->getParam('controller') == 'Products') ? 'active' : '' ?>"><?= $this->Html->link('<i class="feather icon-lock"></i> Produits','/products/edit', ['class' => 'nav-link', 'escape' => false]); ?>
                    </li>
                    <li class="nav-item <?= ($this->request->getParam('controller') == 'Suppliers') ? 'active' : '' ?>"><?= $this->Html->link('<i class="feather icon-user"></i> Fournisseurs','/suppliers/edit', ['class' => 'nav-link', 'escape' => false]); ?>
                    </li>
                    <li class="nav-item <?= ($this->request->getParam('controller') == 'Stock') ? 'active' : '' ?>"><?= $this->Html->link('<i class="feather icon-shopping-bag"></i> Stock','/stocks', ['class' => 'nav-link', 'escape' => false]); ?>
                    </li>
                    <li class="nav-item <?= ($this->request->getParam('controller') == 'Customers') ? 'active' : '' ?>"><?= $this->Html->link('<i class="feather icon-credit-card"></i> Clients','/customers/edit', ['class' => 'nav-link', 'escape' => false]); ?>
                    </li>
                    <li class="nav-item <?= ($this->request->getParam('controller') == 'Users') ? 'active' : '' ?>"><?= $this->Html->link('<i class="feather icon-users"></i> Utilisateurs','/users/edit', ['class' => 'nav-link', 'escape' => false]); ?>
                    </li>
                    <li class="nav-item <?= ($this->request->getParam('controller') == 'Configurations') ? 'active' : '' ?>">
                    <?= $this->Html->link('<i class="feather icon-settings"></i> Paramètres','/configurations', ['class' => 'nav-link', 'escape' => false]); ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->
    
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>

    <div class="modal text-left" id="rates" tabindex="-1" role="dialog" aria-labelledby="myModalLabel6" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel6">Taux du jour</h4>
                </div>
                <?= $this->Form->create("", array("url" => "/rates/update")) ?>
                <div class="modal-body">
                <div class="alert alert-success" role="alert">
                        Appuyez sur la touche <span class="text-bold-600">ESC</span> pour fermer cette fenêtre.
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-label-group">
                                <?= $this->Form->control('htg', array('class' => "form-control",  "label" => "Achat (USD - HTG)", "value" => $htg->amount)) ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-label-group">
                                <?= $this->Form->control('usd', array('class' => "form-control", "label" => "Vente (HTG - USD)", "value" => $usd->amount)) ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type='submit' class="btn btn-primary">Mettre à jour</button>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>

    <footer>
    <div class="row default_layout" style="position:fixed;padding:10px;bottom:0px;right:0px;background:#10163A !important;color:white;width:100%!important;max-width:100%!important;margin-right:0px"> 
    <div style="text-align:center;margin:auto"> 
    <label style="font-size:17px;letter-spacing:3px"><span class="badge badge-danger" style="font-weight:bold">F2</span> : Paramètres | <span class="badge badge-danger" style="font-weight:bold">F4</span> : Utilisateurs | <span class="badge badge-danger" style="font-weight:bold">F7</span> : Clients | <span class="badge badge-danger" style="font-weight:bold">F8</span> : Catégories | <span class="badge badge-danger" style="font-weight:bold">F9</span> : Produits | <span class="badge badge-danger" style="font-weight:bold">F10</span> : Fournisseurs</label>
    </div>
</div> 
    </footer>

    <script type="text/javascript">
        $(document).ready(function(){
            document.onkeyup = function(e) {
                e.preventDefault();
                if (e.which == 113){
                    $("#animation").modal("show");
                    $("#focus_input").focus();
                }
                if (e.which == 115){
                    window.location.href = ROOT_DIREC + "/users/edit";
                }
                if (e.which == 118){
                    window.location.href = ROOT_DIREC + "/customers/edit";
                }
                if (e.which == 119){
                    window.location.href = ROOT_DIREC + "/categories/edit";
                }
                if (e.which == 120){
                    window.location.href = ROOT_DIREC + "/products/edit";
                }
                if (e.which == 121){
                    window.location.href = ROOT_DIREC + "/suppliers/edit";
                }
            };
        })
    </script>

    <!-- END: Page JS-->

    <?= $this->Html->script("vendors/js/vendors.min.js") ?>

    <?= $this->Html->script("vendors/js/ui/jquery.sticky.js") ?>
    <?= $this->Html->script("vendors/js/extensions/tether.min.js") ?>
    
    <?= $this->Html->script("vendors/js/forms/select/select2.full.min.js") ?>
    <?= $this->Html->script("scripts/forms/select/form-select2.js") ?>

    <?= $this->Html->script("core/app-menu.js") ?>
    <?= $this->Html->script("core/app.js") ?>
    <?= $this->Html->script("scripts/components.js") ?>

    <?= $this->Html->script("vendors/js/tables/datatable/datatables.min.js") ?>
    <?= $this->Html->script("vendors/js/tables/datatable/datatables.buttons.min.js") ?>
    <?= $this->Html->script("vendors/js/tables/datatable/datatables.bootstrap4.min.js") ?>
    <?= $this->Html->script("scripts/datatables/datatable.js") ?>


    <?= $this->Html->script("script.js") ?>
    <?= $this->Html->script("shortcuts.js") ?>
</body>
</html>
