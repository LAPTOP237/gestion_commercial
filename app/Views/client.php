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
                        <!-- Add New Client MODAL -->
                        <div class="modal fade" id="AddClient">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="modal-title">Ajout de Client</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <form name="client-form" id="form-client">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nom du client</label>
                                                        <input class="form-control" placeholder="Entrez le nom du client" type="text" name="nom_cli" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Registre commerciale</label>
                                                        <input class="form-control" placeholder="Entrez le numero de Registre commerciale" type="text" name="registre" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Contribuable</label>
                                                        <input class="form-control" placeholder="Entrez le numero de contribuable" type="text" name="contribuable" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Localisation</label>
                                                        <input class="form-control" placeholder="ou se situe le client" type="text" name="localisation" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">E-mail</label>
                                                        <input class="form-control" placeholder="Entrez la boite electronique du client" type="email" name="email" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Boite Postale</label>
                                                        <input class="form-control" placeholder="Entrez la boite postale du client" type="text" name="BP" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Contact</label>
                                                        <input class="form-control" placeholder="Numero de Telephone du client" type="text" name="contact" />
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
                                            <button id="add_record" class="btn font-16 btn-success w-24"><i class="mdi mdi-plus-circle-outline"></i> Nouveau Client</button>
                                        </div>
                                    </div>

                                    <div class="table-responsive card-body">
                                        <h4 class="card-title" style="text-align: center;">Liste des clients</h4>

                                        <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nom</th>
                                                    <th>Contact</th>
                                                    <th>Localisation</th>
                                                    <th>Email</th>
                                                    <th>Boite Postale</th>
                                                    <th>Registre Commerciale</th>
                                                    <th>Contribuable</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="client-table-body">

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

            show_client(); //call function show all client

            $('#datatable').dataTable();

            //function show all client
            function show_client() {
                $.ajax({
                    type: 'post',
                    url: '<?php echo site_url('/fetch_all_client') ?>',
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td>' + i + '</td>' +
                                '<td>' + data[i].nom_cli + '</td>' +
                                '<td>' + data[i].contact + '</td>' +
                                '<td>' + data[i].localisation + '</td>' +
                                '<td>' + data[i].email + '</td>' +
                                '<td>' + data[i].BP + '</td>' +
                                '<td>' + data[i].registre + '</td>' +
                                '<td>' + data[i].contribuable + '</td>' +
                                '<td style="text-align:left;">' +
                                '<a href="javascript:void(0);" class="edit" data-id="' + data[i].id_cli + '" data-nom_cli="' + data[i].nom_cli + '" data-contact="' + data[i].contact + '" data-localisation="' + data[i].localisation + '"><i class="fa fa-edit" aria-hidden="true"></i></a>' + ' ' +
                                '<a href="javascript:void(0);" class="delete" data-id="' + data[i].id_cli + '"><i class="mdi mdi-delete"></i></a>' +
                                '</td>' +
                                '</tr>';
                        }
                        $('#client-table-body').html(html);
                    }

                });
            }

            $('#add_record').click(function() {

                $('#form-client')[0].reset();

                $('.modal-title').text('Nouveau Client');

                $('#action').val('Add');

                $('#submit_button').val('Ajouter');

                $('#AddClient').modal('show');

            });

            $('#form-client').on('submit', function(event) {

                event.preventDefault();

                $.ajax({

                    url: "<?php echo base_url('/action_client'); ?>",

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

                        $('#AddClient').modal('hide');

                        $('#message').html(data.message);

                        show_client();

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

                    url: "<?php echo base_url('/fetch_single_client'); ?>",

                    method: "POST",

                    data: {
                        id: id
                    },

                    dataType: 'JSON',

                    success: function(data) {

                        $('#nom_cli').val(data.nom_cli);

                        $('#contact').val(data.contact);

                        $('#localisation').val(data.localisation);

                        $('.modal-header').text('Mise à jour du Client');

                        $('#action').val('Edit');

                        $('#submit_button').val('Editer');

                        $('#AddClient').modal('show');

                        $('#hidden_id').val(id);

                    }

                })

            });

            $(document).on('click', '.delete', function() {

                var id = $(this).data('id');

                if (confirm("Voulez-vous vraiment supprimer ?")) {

                    $.ajax({

                        url: "<?php echo base_url('/delete_client'); ?>",

                        method: "POST",

                        data: {
                            id: id
                        },

                        success: function(data) {

                            $('#message').html(data);

                            show_client();

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