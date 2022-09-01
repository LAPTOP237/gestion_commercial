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
                                        <!-- Proforma Print -->

                                        <div id="PDFcontent">
                                       

                                            <table class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                    <tr>
                                                        <th colspan="4">Adresse de facturation</th>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <p>Raison Sociale :   <?= $client['nom_cli'] ?></p>
                                                            <p>Registre de commerce No : <?= $client['registre'] ?></p>
                                                            <p>Carte contribuable :  <?= $client['contribuable'] ?></p>
                                                            <p>Localisation :  <?= $client['localisation'] ?></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">FACTURE PROFORMA No <?= $doc['num_proforma'] ?></th>
                                                        <td colspan="2"><?= $doc['date_proforma'] ?></td>
                                                    </tr>
                                                    <tr> <td colspan="4">
                                                        <p>Mention TVA :</p>
                                                        <p>Nature de la transaction :  <?= $doc['nature_transac'] ?></p>
                                                        </td>
                                                    </tr>
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
                                                        <th>MONTANT TTC</th>
                                                        <td></td>
                                                        <td><?= $doc['totalTTC'] ?></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <p>Arreté la présente facture proforma à la somme de ____________________</p>
                                            <p><?= $doc['montant_lettre'] ?></p>

                                            <table style="width: 100%;">
                                                <tr>
                                                    <th>Conditions de vente :</th>
                                                    <td></td>
                                                    <td></td>
                                                    <td >La Direction</td>
                                                </tr>
                                                <tr><td><?= $doc['cond_vente'] ?></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                                <tr><th>Conditions de payement : <?= $doc['cond_paiement'] ?></th> <td></td></tr>
                                                <p></p>
                                                <tr><th>Delais de livraison :  <?= $doc['delai_livraison'] ?></th> <td></td></tr>
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

            pdfdoc.save('FP.pdf');

        });
    });
</script>

</body>

</html>