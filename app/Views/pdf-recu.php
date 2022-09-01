<?= $this->include('partials/main') ?>

<head>

    <?= $title_meta ?>

    <!-- Plugin css -->
    <link href="assets/css/main.css" rel="stylesheet" type="text/css" />


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
                        <span id="message"></span>
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <div class="card mb-0  h-100 ">
                                    <div class="card-body">
                                        <!-- Bon commande Print -->

                                        <div id="PDFcontent">
                                            <h3 style="text-align: center;">RECU No <?= $doc['num_recu'] ?></h3> 
                                            <p>Date : <span><?= $doc['date_recu'] ?></span></p>
                                            <p>Nom du client : <span><?= $client['nom_cli'] ?></span></p>
                                            <p>Montant en chiffres : <span><?= $doc['montant_chiffre'] ?></span></p>
                                            <p>Montant en lettres : <span><?= $doc['montant_lettre'] ?></span></p>
                                            <p>Motifs de reglement : <span><?= $doc['motif_reglement'] ?></span></p>
                                            <p>Numéros de facture : <span><?= $doc['facture_num'] ?></span></p>
                                            <p>Mode de reglèment : <span><?= $doc['mode_reglement'] ?></span></p>
                                            <p>Avance : <span><?= $doc['avance'] ?></span> Reste : <span><?= $doc['reste'] ?></span></p>
                                        <p></p>
                                        <p></p>
                                        <p>Visa et Signature</p>
                                        </div>
                                        <p></p>
                                        <p></p>
                                        
                                        <a href="javascript:window.print()"   class="btn font-16 btn-secondary w-24 impression"><i class="fa fa-print"></i>Imprimer</a>

                                        <!-- <button id="gpdf" class="btn font-16 btn-secondary w-24"><i class="fa fa-print"></i> PDF</button> -->

                                    </div>
                                </div> <!-- end modal-content-->
                            </div> <!-- end modal dialog-->
                        </div>
                        <!-- end modal-->

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



<!-- App js -->
<script src="assets/js/app.js"></script>

<script>
    var pdfdoc = new jsPDF();
    var specialElementHandlers = {

        '#ignoreContent': function(element, renderer) {

            return true;

        }

    };



    $(document).ready(function() {

        $('#gpdf').click(function() {

            pdfdoc.fromHTML($('#PDFcontent').html(), 10, 10, {

                'width': 110,

                'elementHandlers': specialElementHandlers

            });

            pdfdoc.save('Recu.pdf');

        });
    });
</script>

</body>

</html>