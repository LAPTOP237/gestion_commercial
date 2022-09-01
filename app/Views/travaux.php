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
<!-- Modal  Changer etat -->
                
<div class="modal fade" id="ChangeEtat">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">

                                <h5 class="modal-title" id="modal-title"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                <form name="form-etat" id="form-etat">
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <select id="etat" name="etat" class="form-select">
                                                <option selected>--Selectionnez Ici</option>
                                                <option value="1">Terminé</option>
                                                <option value="0">Non Terminé</option>
                                                <option value="2">Annuler</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col text-end">
                                            <input type="hidden" name="hidden_id_etat" id="hidden_id_etat" />
                                            <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Annuler</button>
                                            <input type="submit" class="btn btn-success" id="submit_button_etat" value="OK" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> <!-- end modal-content-->
                    </div> <!-- end modal dialog-->
                </div>
                <!-- end modal-->
                <div class="row">
                    <div class="col-12">
                        <!-- Add New  MODAL -->
                        <div class="modal fade" id="AddTravail">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="modal-title">Ajout Travail</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <form name="travail-form" id="form-travail">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Titre</label>
                                                        <input class="form-control" placeholder="Comment nommez vous le travail a faire?" type="text" name="libelle" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Delai</label>
                                                        <input class="form-control" placeholder="" type="date" name="delai" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Lien du fichier</label>
                                                        <input class="form-control" placeholder="" type="text" name="lien_fichier" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">N° Commande</label>
                                                        <input class="form-control" placeholder="" type="text" name="commande_num" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Responsable</label>
                                                        <input class="form-control" placeholder="" type="text" name="responsable_id" />
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
                                            <button id="add_record" class="btn font-16 btn-success w-24"><i class="mdi mdi-plus-circle-outline"></i> Nouveau Travail</button>
                                        </div>
                                    </div>

                                    <div class="table-responsive card-body">
                                        <h4 class="card-title" style="text-align: center;">Liste des Travaux</h4>

                                        <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Libelle</th>
                                                    <th>Delai</th>
                                                    <th>Lien du fichier</th>
                                                    <th>N° Commande</th>
                                                    <th>Responsable</th>
                                                    <th>Statut</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="travail-table-body">

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

     
    <script src="assets/js/pages/datatables.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    </body>

    </html>

    <script type="text/javascript">
        $(document).ready(function() {

            show_travail(); //call function show all client

            $('#datatable').dataTable();

            $(document).on('click', '.changeStatut', function() {

var id = $(this).data('id');


$('.modal-header').text('Changer le statut');

$('#hidden_id_etat').val(id);

$('#submit_button_etat').val('OK');

$('#ChangeEtat').modal('show');



});

$('#form-etat').on('submit', function(event) {

event.preventDefault();

$.ajax({

    url: "<?php echo base_url('/etat-travail'); ?>",

    method: "POST",

    data: $(this).serialize(),

    dataType: "JSON",

    beforeSend: function() {

        $('#submit_button_etat').val('Attendez...');

        $('#submit_button_etat').attr('disabled', 'disabled');

    },

    success: function(data) {

        $('#submit_button_etat').val('OK');

        $('#submit_button_etat').attr('disabled', false);

        $('#ChangeEtat').modal('hide');

        $('#message').html(data.message);

        setTimeout(function() {

            $('#message').html('');

        }, 5000);

        location.reload();



    }

})

});

            //function show all client
            function show_travail() {
                $.ajax({
                    type: 'post',
                    url: '<?php echo site_url('/fetch_all_travail') ?>',
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td>' + i + '</td>' +
                                '<td>' + data[i].libelle + '</td>' +
                                '<td>' + data[i].delai + '</td>' +
                                '<td>' + data[i].lien_fichier + '</td>' +
                                '<td>' + data[i].commande_num + '</td>' +
                                '<td>' + data[i].responsable_id + '</td>' ;
                            
                            if (data[i].etat == 1) {

                               html += '<td>'+'<a href="javascript:void(0);" class="alert alert-success changeStatut" role="alert" data-id="' + data[i].id_travail  + '">Terminé</a>'+'</td>'; 
                                
                            } else {

                                html += '<td>' + '<a href="javascript:void(0);" class="alert alert-success changeStatut" role="alert" data-id="' + data[i].id_travail  + '">Non Terminé</a>'+'</td>';
                                
                            }
                                html +=  '<td style="text-align:left;">' +
                                '<a href="javascript:void(0);" class="edit" data-id="' + data[i].id_travail  + '"><i class="fa fa-edit" aria-hidden="true"></i></a>' + ' ' +
                                '<a href="javascript:void(0);" class="delete" data-id="' + data[i].id_travail + '"><i class="mdi mdi-delete"></i></a>' +
                                '</td>' +
                                '</tr>';
                        }
                        $('#travail-table-body').html(html);
                    }

                });
            }

            $('#add_record').click(function() {

                $('#form-travail')[0].reset();

                $('.modal-title').text('Nouveau Travail');

                $('#action').val('Add');

                $('#submit_button').val('Ajouter');

                $('#AddTravail').modal('show');

            });

            $('#form-travail').on('submit', function(event) {

                event.preventDefault();

                $.ajax({

                    url: "<?php echo base_url('/action_travail'); ?>",

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

                        $('#AddTravail').modal('hide');

                        $('#message').html(data.message);

                        show_travail();

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

                    url: "<?php echo base_url('/fetch_single_travail'); ?>",

                    method: "POST",

                    data: {
                        id: id
                    },

                    dataType: 'JSON',

                    success: function(data) {

                        $('.modal-header').text('Mise à jour du Travail');

                        $('#action').val('Edit');

                        $('#submit_button').val('Editer');

                        $('#AddTravail').modal('show');

                        $('#hidden_id').val(id);

                    }

                })

            });

            $(document).on('click', '.delete', function() {

                var id = $(this).data('id');

                if (confirm("Voulez-vous vraiment supprimer ?")) {

                    $.ajax({

                        url: "<?php echo base_url('/delete_travail'); ?>",

                        method: "POST",

                        data: {
                            id: id
                        },

                        success: function(data) {

                            $('#message').html(data);

                            show_travail();

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