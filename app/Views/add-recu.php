<?= $this->include('partials/main') ?>

<head>

    <?= $title_meta ?>

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
                        <!-- Add New Recu MODAL -->
                        <div class="modal fade" id="AddRecu">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="modal-title"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <form name="recu-form" id="form-recu">
                                            <div class="row">
                                            <div class="col-12 form-group">
                                                    <label for="cli_id" class="col-form-label"> Client :</label>
                                                    <select id="cli_id" name="cli_id" class="form-select">
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
                                            </div>
                                            <div class="row">
                                            <div class="col-12 form-group">
                                                    <label for="facture_num" class="col-form-label"> Numero de la facture :</label>
                                                    <select id="facture_num" name="facture_num" class="form-select">
                                                        <?php if ($factures) :
                                                            foreach ($factures as $facture) :
                                                        ?>
                                                                <option value="<?= $facture['num_facture'] ?>"><?= $facture['num_facture'] ?></option>
                                                        <?php
                                                            endforeach;
                                                        endif;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">N°</label>
                                                        <input class="form-control" placeholder="" type="text" name="num_recu" value="<?= $num_recu ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Montant en chiffres</label>
                                                        <input class="form-control" placeholder="" type="number" name="montant_chiffre" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Montant en lettres</label>
                                                        <input class="form-control" placeholder="" type="text" name="montant_lettre" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Mode de reglement</label>
                                                        <input class="form-control"  type="text" name="mode_reglement" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Motifs de reglement</label>
                                                        <input class="form-control" placeholder="" type="text" name="motif_reglement" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Avance</label>
                                                        <input class="form-control"  type="number" name="avance" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Reste</label>
                                                        <input class="form-control"  type="number" name="reste" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col text-end">
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
                        <!-- end modal-->
                        <span id="message"></span>
                        <div class="row mb-4">

                            <div class="col-lg-12">
                                <div class="card mb-0  h-100 ">
                                    <div class="row mt-2">
                                        <div class="col-3">
                                            <button id="add_record" class="btn font-16 btn-success w-24"><i class="mdi mdi-plus-circle-outline"></i> Nouveau Recu</button>
                                        </div>
                                    </div>

                                    <div class="table-responsive card-body">
                                        <h4 class="card-title">Liste des Recu</h4>

                                        <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>N°</th>
                                                    <th>Client</th>
                                                    <th>Montant</th>
                                                    <th>Montant en lettres</th>
                                                    <th>Avance</th>
                                                    <th>Reste</th>
                                                    <th>N° facture</th>
                                                    <th>motifs de reglement</th>
                                                    <th>mode de reglement</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="recu-table-body">

                                            </tbody>
                                            <tfoot>

                                            </tfoot>

                                        </table>
                                    </div>
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

    <!-- Datatable init js 
    <script src="assets/js/pages/datatables.init.js"></script> -->

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    </body>

    </html>

    <script type="text/javascript">
        $(document).ready(function() {

            show_recu(); //call function show all recu

            $('#datatable').dataTable();

            //function show all recu
            function show_recu() {
                $.ajax({
                    type: 'post',
                    url: '<?php echo site_url('/fetch_all_recu') ?>',
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td>' + i + '</td>' +
                                '<td>' + data[i].num_recu + '</td>' +
                                '<td>' + data[i].nom_cli + '</td>' +
                                '<td>' + data[i].montant_chiffre + '</td>' +
                                '<td>' + data[i].montant_lettre + '</td>' +
                                '<td>' + data[i].avance + '</td>' +
                                '<td>' + data[i].reste + '</td>' +
                                '<td>' + data[i].facture_num + '</td>' +
                                '<td>' + data[i].motif_reglement + '</td>' +
                                '<td>' + data[i].mode_reglement + '</td>' +
                                '<td style="text-align:left;">' +
                                '<a href="<?= base_url('/pdf-livraison')?>' + data[i].id_recu + ' " class="print"><i class="fa fa-print" aria-hidden="true"></i></a>' + ' ' +
                                '<a href="javascript:void(0);" class="edit" data-id="' + data[i].id_recu + '" data-nom_cli="' + data[i].nom_cli + '" data-contact="' + data[i].contact + '" data-localisation="' + data[i].localisation + '"><i class="fa fa-edit" aria-hidden="true"></i></a>' + ' ' +
                                '<a href="javascript:void(0);" class="delete" data-id="' + data[i].id_recu + '"><i class="mdi mdi-delete"></i></a>' + 
                                '</td>' +
                                '</tr>';
                        }
                        $('#recu-table-body').html(html);
                    }

                });
            }

            $('#add_record').click(function() {

                $('#form-recu')[0].reset();

                $('.modal-title').text('Nouveau Recu');

                $('#action').val('Add');

                $('#submit_button').val('Ajouter');

                $('#AddRecu').modal('show');

            });

            $('#form-recu').on('submit', function(event) {

                event.preventDefault();

                $.ajax({

                    url: "<?php echo base_url('/action_recu'); ?>",

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

                        $('#AddRecu').modal('hide');

                        $('#message').html(data.message);

                        show_recu();

                        $('#datatable').DataTable().reload();

                        setTimeout(function() {

                            $('#message').html('');

                        }, 5000);



                    }

                })

            });

            $(document).on('click', '.edit', function() {

                var id = $(this).data('id');

                $.ajax({

                    url: "<?php echo base_url('/fetch_single_recu'); ?>",

                    method: "POST",

                    data: {
                        id: id
                    },

                    dataType: 'JSON',

                    success: function(data) {

                        $('.modal-header').text('Mise à jour du Recu');

                        $('#action').val('Edit');

                        $('#submit_button').val('Editer');

                        $('#AddRecu').modal('show');

                        $('#hidden_id').val(id);

                    }

                })

            });

            $(document).on('click', '.delete', function() {

                var id = $(this).data('id');

                if (confirm("Voulez-vous vraiment supprimer ?")) {

                    $.ajax({

                        url: "<?php echo base_url('/delete_recu'); ?>",

                        method: "POST",

                        data: {
                            id: id
                        },

                        success: function(data) {

                            $('#message').html(data);

                            show_recu();

                            $('#datatable').DataTable().ajax.reload();

                            setTimeout(function() {

                                $('#message').html('');

                            }, 5000);

                        }

                    })

                }

            });

        });
    </script>