<?= $this->include('partials/main') ?>
<head>

    <?= $title_meta  ?>

    <!-- Plugin css -->
    <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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

                            <!-- end modal-->
                            <span id="message"></span>
                            <div class="col-lg-12">
                                <div class="card mb-0  h-100 ">
                                     <!-- Add New LINE MODAL -->
                            <div class="modal fade" id="AddLigne">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <h5 class="modal-title" id="modal-title"></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <form name="ligne-form" id="form-ligne">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Désignation</label>
                                                            <input class="form-control" placeholder="Nommez le service ou produit" type="text" id="designation" name="designation" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Quantité</label>
                                                            <input class="form-control" placeholder="" type="number" id="quantite" name="quantite" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Prix unitaire</label>
                                                            <input class="form-control" placeholder="" type="number" name="PU" id="PU" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Taux TVA</label>
                                                            <input class="form-control" step="0.01" placeholder="Entrez taux de la TVA en poucentage" type="number" id="tauxTVA" name="tauxTVA" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Remise</label>
                                                            <input class="form-control" placeholder="" type="number" name="remise" id="remise" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Montant HT</label>
                                                            <input class="form-control" placeholder="" type="number" id="montantHT" name="montantHT" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Montant TTC</label>
                                                            <input class="form-control" placeholder="" type="number" name="montantTTC" id="montantTTC" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col text-end">
                                                    <input type="text" name="facture_num" id="facture_num" value="<?= $num_facture ?>" hidden/>
                                                        <input type="hidden" name="hidden_id" id="hidden_id" />
                                                        <input type="hidden" name="action" id="action" value="Add" />
                                                        <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Annuler</button>
                                                        <input type="submit" class="btn btn-success" id="submit_button" value="Ajouter" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div> <!-- end modal-content-->
                                </div> <!-- end modal dialog-->
                            </div>
                                    <form method="post" action="<?= base_url('/save-facture') ?>">
                                        <div class="card-body">
                                            <div class="mt-2 row">
                                            <center><h2>Facture </h2> 
                                            <div class="col-3 form-group">
                                                    <label for="num_facture" class="col-form-label">N° facture :</label>
                                                    <input class="form-control" type="text" name="num_facture" id="num_facture" value="<?= $num_facture ?>">
                                                </div></center>
                                                <div class="col-3 form-group">
                                                    <label for="cli_id" class="col-form-label"> Client :</label>
                                                    <select id="cli_id" name="cli_id" class="form-select">
                                                    <option >--Selectionner--</option>
                                                        <?php if ($clients) :
                                                            foreach ($clients as $client) :
                                                        ?>
                                                                <option value="<?= $client['id_cli'] ?>"><?= $client['nom_cli'] ?></option>
                                                        <?php
                                                            endforeach;
                                                        endif;
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-3 form-group">
                                                    <label for="commande_num" class="col-form-label"> Ref Commande :</label>
                                                    <select id="commande_num" name="commande_num" class="form-select">
                                                        <option >--Selectionner--</option>
                                                        <?php if ($commandes) :
                                                            foreach ($commandes as $commande) :
                                                        ?>
                                                                <option value="<?= $commande['num_commande'] ?>"><?= $commande['num_commande'] ?></option>
                                                        <?php
                                                            endforeach;
                                                        endif;
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-3 form-group">
                                                    <label for="livraison_num" class="col-form-label"> Ref Livraison :</label>
                                                    <select id="livraison_num" name="livraison_num" class="form-select">
                                                    <option >--Selectionner--</option>
                                                        <?php if ($livraisons) :
                                                            foreach ($livraisons as $livraison) :
                                                        ?>
                                                                <option value="<?= $livraison['num_livraison'] ?>"><?= $livraison['num_livraison'] ?></option>
                                                        <?php
                                                            endforeach;
                                                        endif;
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-3 form-group">
                                                    <label for="date_facture" class="col-form-label">Date de la facture :</label>
                                                    <input class="form-control" type="date" name="date_facture" id="date_facture">
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3 text-end">
                                                <button type="button" id="add_record" class="btn font-16 btn-success w-24"  data><i class="mdi mdi-plus-circle-outline"></i> Nouvelle ligne</button>
                                            </div>
                                        </div>



                                        <div class="table-responsive card-body">

                                            <table id="ligne-table" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Désignation</th>
                                                        <th>Quantité</th>
                                                        <th>Prix Unit.</th>
                                                        <th>TVA</th>
                                                        <th>Montant HT</th>
                                                        <th>Montant TTC</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="ligne-body">

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>TOTAL HT</th>
                                                        <th colspan="2">
                                                            <div class="col-6 form-group">
                                                                <input class="form-control" type="number" name="totalHT" id="totalHT">
                                                            </div>
                                                        </th>
                                                        <th>TOTAL TTC</th>
                                                        <th colspan="3">
                                                            <div class="col-6 form-group">
                                                                <input class="form-control" type="number" name="totalTTC" id="totalTTC">
                                                            </div>
                                                        </th>
                                                    </tr>

                                                </tfoot>

                                            </table>

                                        </div>


                                        <div class="card-body">
                                            <div class="mt-2 row">

                                                <div class="col-4 form-group">
                                                    <label for="cond_vente" class="col-form-label">Conditions de vente :</label>
                                                    <textarea class="form-control" rows="1" name="cond_vente" id="cond_vente"></textarea>
                                                </div>

                                                <div class="col-4 form-group">
                                                    <label for="cond_paiement" class="col-form-label">Conditions de payement :</label>
                                                    <input class="form-control" type="text" name="cond_paiement" id="cond_paiement">
                                                </div>

                                                <div class="col-4 form-group">
                                                    <label for="date_echeance" class="col-form-label">Date d'écheance :</label>
                                                    <input class="form-control" type="date" name="date_echeance" id="date_echeance">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="mt-2 row">

                                                <div class="col-12 form-group">
                                                    <label for="montant_lettre" class="col-form-label">Total en chiffres</label>
                                                    <input class="form-control" name="montant_lettre" id="montant_lettre">
                                                </div>


                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col text-end">
                                                <input type="submit" class="btn btn-success" id="submit_button_facture" value="Enregistrer" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> <!-- end col-->


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

    <!-- Required datatable js -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/libs/jszip/jszip.min.js"></script>
    <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="assets/js/pages/datatables.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    </body>

    </html>

    <script type="text/javascript">
        $(document).ready(function() {

            show_ligne(); //call function show all ligne


            //function show all ligne
            function show_ligne() {
                $.ajax({
                    type: 'post',
                    url: '<?php echo site_url('/fetch_all_ligne_facture') ?>',
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        var html = '';
                        let totalHT = 0;
                        let totalTTC = 0;
                        var i;
                        for (i = 0; i < data.length; i++) {
                            totalHT += parseFloat(data[i].montantHT);
                            totalTTC += parseFloat(data[i].montantTTC);
                            html += '<tr>' +
                                '<td>' + i + '</td>' +
                                '<td>' + data[i].designation + '</td>' +
                                '<td>' + data[i].quantite + '</td>' +
                                '<td>' + data[i].PU + '</td>' +
                                '<td>' + data[i].tauxTVA + '</td>' +
                                '<td>' + data[i].montantHT + '</td>' +
                                '<td>' + data[i].montantTTC + '</td>' +
                                '<td style="text-align:left;">' +
                                '<a href="javascript:void(0);" class="edit" data-id="' + data[i].id_ligne_facture + '" ><i class="fa fa-edit" aria-hidden="true"></i></a>' + ' ' +
                                '<a href="javascript:void(0);" class="delete" data-id="' + data[i].id_ligne_facture + '"><i class="mdi mdi-delete"></i></a>' +
                                '</td>' +
                                '</tr>';
                        }
                        $('#ligne-body').html(html);

                        $("#totalHT").val(totalHT);

                        $("#totalTTC").val(totalTTC);
                    }

                });
            }

            $('#add_record').click(function() {

                $('#form-ligne')[0].reset();

                $('.modal-title').text('Nouvelle Ligne');

                $('#action').val('Add');

                $('#submit_button').val('Ajouter');

                $('#AddLigne').modal('show');

            });

            $('#form-ligne').on('submit', function(event) {

                event.preventDefault();

                $.ajax({

                    url: "<?php echo base_url('/action_ligne_facture'); ?>",

                    method: "POST",

                    data: $(this).serialize(),

                    dataType: "JSON",

                    beforeSend: function() {

                        $('#submit_button').val('Attendez...');

                        $('#submit_button').attr('disabled', 'disabled');

                    },

                    success: function(data) {

                        $('#submit_button').val('Ajouter');

                        $('#submit_button').attr('disabled', false);

                        $('#AddLigne').modal('hide');

                        $('#message').html(data.message);

                        show_ligne();

                        $('#datatable').reload();

                        setTimeout(function() {

                            $('#message').html('');

                        }, 5000);



                    }

                })

            });

            $(document).on('click', '.edit', function() {

                var id = $(this).data('id');

                $.ajax({

                    url: "<?php echo base_url('/fetch_single_ligne_facture'); ?>",

                    method: "POST",

                    data: {
                        id: id
                    },

                    dataType: 'JSON',

                    success: function(data) {

                        $('.modal-header').text('Mise à jour du Ligne facture');

                        $('#action').val('Edit');

                        $('#submit_button').val('Editer');

                        $('#AddLigne').modal('show');

                        $('#hidden_id').val(id);

                    }

                })

            });

            $(document).on('click', '.delete', function() {

                var id = $(this).data('id');

                if (confirm("Voulez-vous vraiment supprimer ?")) {

                    $.ajax({

                        url: "<?php echo base_url('/delete_ligne_facture'); ?>",

                        method: "POST",

                        data: {
                            id: id
                        },

                        success: function(data) {

                            $('#message').html(data);

                            $('#ligne-table').reload();
                            show_client();

                            setTimeout(function() {

                                $('#message').html('');

                            }, 5000);

                        }

                    })

                }

            });

        });
    </script>