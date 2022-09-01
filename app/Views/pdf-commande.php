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
                                            <h1 style="text-align: center;">BON DE COMMANDE</h1>
                                            <P></P>
                                            <p style="text-align: center;" class="row"> <span class="col-4"> Nom : <?= $client['nom_cli'] ?> </span> <span class="col-4">No <?= $doc['num_commande'] ?> </span> <span class="col-4"> Date : <?= $doc['date_commande'] ?></span></p>
                                            <table class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Quantité</th>
                                                        <th>Désignation</th>
                                                        <th>Prix Unit.</th>
                                                        <th>Montant</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ($ligne) :
                                                        foreach ($ligne as $row) :
                                                    ?>
                                                            <tr>
                                                                <td><?= $row['quantite'] ?></td>
                                                                <td><?= $row['designation'] ?></td>
                                                                <td><?= $row['PU'] ?></td>
                                                                <td><?= $row['montantTTC'] ?></td>

                                                            </tr>
                                                    <?php
                                                        endforeach;
                                                    endif;
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td></td>
                                                        <th>TOTAL</th>
                                                        <td></td>
                                                        <td><?= $doc['totalTTC'] ?></td>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                            <table style="width: 100%;">
                                                <tr>
                                                    <th>Conditions de vente :</th>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><?= $doc['cond_vente'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr class="row">
                                                    <th class="col-9">Conditions de payement : <?= $doc['cond_paiement'] ?></th>
                                                    <td class="col-3">Signature</td>
                                                </tr>
                                                <p></p>
                                            </table>

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

            pdfdoc.save('BC.pdf');

        });
    });
</script>

</body>

</html>