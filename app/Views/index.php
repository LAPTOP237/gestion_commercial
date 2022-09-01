<?= $this->include('partials/main') ?>

<head>
    <?= $title_meta ?>

    <!-- jquery.vectormap css -->
    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>

<div class="container-fluid">
    <!-- Begin page -->
    <div id="layout-wrapper">

    <?= $this->include('partials/menu') ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                <?= $page_title ?>
                <div class="row">
                    <div class="col-12">

                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="card-title">Clients</h2>
                                        <h1><?= $nb_client ?></h1>

                                    </div>
                                </div>
                            </div>
                            <!-- end col-->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="card-title">Documents</h2>
                                        <h1><?= $nb_proforma+$nb_facture+$nb_livraison+$nb_commande ?></h1>

                                    </div>
                                </div>
                            </div> <!-- end col-->
                            
                        </div>

                        <div class="row mb-4">
                        <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="card-title">Proformas</h2>
                                        <h3><?= $nb_proforma_attente ?></h3><span> En negociation</span>
                                        <h3><?= $nb_proforma_valide ?></h3><span> Confirmés</span>

                                    </div>
                                </div>
                            </div>
                            <!-- end col-->
                            
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="card-title">Commandes</h2>
                                        <h3><?= $nb_commande_attente ?></h3><span> En attente</span>
                                        <h3><?= $nb_commande_valide ?></h3><span> Terminés</span>

                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="card-title">Livraisons</h2>
                                        <h3><?= $nb_livraison_attente ?></h3><span> En attente</span>
                                        <h3><?= $nb_livraison_valide ?></h3><span> Livrés</span>

                                    </div>
                                </div>
                            </div>
                            <!-- end col-->

                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="card-title">Factures</h2>
                                        <h3><?= $nb_facture_attente ?></h3><span> Impayés</span>
                                        <h3><?= $nb_facture_valide ?></h3><span> payés</span>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                        </div>
                    </div>
                </div>


        <!-- end row -->
    </div>
    <!-- End Page-content -->

    <?= $this->include('partials/footer') ?>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

</div>
<!-- end container-fluid -->

<?= $this->include('partials/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- jquery.vectormap map -->
<script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

<script src="assets/js/pages/dashboard.init.js"></script>

<script src="assets/js/app.js"></script>

</body>

</html>