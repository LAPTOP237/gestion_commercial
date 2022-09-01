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
                                            <h1 style="text-align: center;">BORDEREAU DE LIVRAISON</h1>

                                            <table style="width: 100%;">

                                            <tr >
                                                    <th class="col-4">
                                                        Numéro
                                                    </th>
                                                    <th class="col-4">
                                                        Date
                                                    </th>
                                                    <th class="col-4">
                                                        Réference Bon de cde
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td class="col-4">
                                                        <?= $doc['num_livraison'] ?>
                                                    </td>
                                                    <td class="col-4">
                                                        <?= $doc['date_livraison'] ?>
                                                    </td>
                                                    <td class="col-4">
                                                        <?= $doc['commande_num'] ?>
                                                    </td>
                                                </tr>
                                                <P></P>
                                                <tr >
                                                    <th class="col-4">
                                                        Client :
                                                    </th>
                                                    <th class="col-4">
                                                        Contact
                                                        </th>
                                                        <th class="col-4">
                                                            Adresse de livraison
                                                        </th>
                                                </tr>
                                                <tr>
                                                    <td class="col-4">
                                                        <?= $client['nom_cli'] ?>
                                                    </td>
                                                    <td class="col-4">
                                                        <?= $client['contact'] ?>
                                                    </td>
                                                    <td class="col-4">
                                                        <?= $doc['adresse_livraison'] ?>
                                                    </td>
                                                </tr>
                                                <p></p>
                                            </table>

                                            <table class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Désignation</th>
                                                        <th>Conditionnement</th>
                                                        <th>Quantité</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ($ligne) :
                                                        $i = 1;
                                                        foreach ($ligne as $row) :
                                                    ?>
                                                            <tr>
                                                                <td><?= $i++ ?></td>
                                                                <td><?= $row['designation'] ?></td>
                                                                <td><?= $row['conditionnement'] ?></td>
                                                                <td><?= $row['quantite'] ?></td>

                                                            </tr>
                                                    <?php
                                                        endforeach;
                                                    endif;
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <th>Nombre de colis</th>
                                                        <td><?= $doc['nb_colis'] ?></td>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                            <table style="width: 100%;">

                                                <tr class="row">
                                                    <th class="col-6">
                                                        <p>RECU CONFORME : le__________________</p>
                                                        <p>Nom :_______________________________</p>
                                                        <p>CNI No :____________________________</p>
                                                    </th>
                                                    <td class="col-6 text-end">Signature et visa Vendeur</td>
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

            pdfdoc.save('BL.pdf');

        });
    });
</script>

</body>

</html>