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
                                                <option value="1">Valider le payement</option>
                                                <option value="0">Refuser le payement</option>
                                                <option value="2">Annuler</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col text-end">
                                            <input type="hidden" name="hidden_id" id="hidden_id" />
                                            <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Annuler</button>
                                            <input type="submit" class="btn btn-success" id="submit_button" value="OK" />
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
                        <span id="message"></span>
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <div class="card mb-0  h-100 ">
                                    <div class="table-responsive card-body">
                                        <h4 class="card-title" style="text-align: center;">Liste des Factures</h4>

                                        <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Numero</th>
                                                    <th>Date</th>
                                                    <th>Client</th>
                                                    <th>Ref. Bon de commande</th>
                                                    <th>Ref. Bon de livraison</th>
                                                    <th>Total HT</th>
                                                    <th>Total TTC</th>
                                                    <th>Statut</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-body">
                                            <?php if ($factures) :
                                                            foreach ($factures as $row) :
                                                        ?>
                                                              <tr>
                                                    <td><?= $row['num_facture'] ?></td>
                                                    <td><?= $row['date_facture'] ?></td>
                                                    <td><?= $row['nom_cli'] ?></td>
                                                    <td><?= $row['commande_num'] ?></td>
                                                    <td><?= $row['livraison_num'] ?></td>
                                                    <td><?= $row['totalHT'] ?></td>
                                                    <td><?= $row['totalTTC'] ?></td>
                                                    <td><?php if ($row['etat'] == 1) { ?>
                                                                    <a href="#" class="alert alert-success changeStatut" role="alert" data-id=<?= $row['id_facture'] ?>>
                                                                        payé
                                                                    </a>
                                                                <?php } elseif ($row['etat'] == 0) { ?>



                                                                    <a href="#" class="alert alert-danger changeStatut" role="alert" data-id=<?= $row['id_facture'] ?>>
                                                                       Impayé
                                                                    </a>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <a href="#" class="alert alert-warning changeStatut" role="alert" data-id=<?= $row['id_facture'] ?>>
                                                                        Annulé
                                                                    </a>
                                                                <?php
                                                                }
                                                                ?>
                                                            </td>
                                                    <td><a href="<?= base_url('/pdf-facture').$row['id_facture'] ?>" class="print"><i class="fa fa-print" aria-hidden="true"></i></a>
                                                        <a href="javascript:void(0);" class="edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                        <a href="<?= base_url('/delete-facture').$row['id_facture'] ?>" class="delete"><i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                    
                                                </tr> 
                                                        <?php
                                                            endforeach;
                                                        endif;
                                                        ?>
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

    <!-- Datatable init js -->
    <script src="assets/js/pages/datatables.init.js"></script> 

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    <script>
        $(document).on('click', '.changeStatut', function() {

            var id = $(this).data('id');


            $('.modal-header').text('Changer le statut');

            $('#hidden_id').val(id);

            $('#submit_button').val('OK');

            $('#ChangeEtat').modal('show');



        });

        $('#form-etat').on('submit', function(event) {

            event.preventDefault();

            $.ajax({

                url: "<?php echo base_url('/etat-facture'); ?>",

                method: "POST",

                data: $(this).serialize(),

                dataType: "JSON",

                beforeSend: function() {

                    $('#submit_button').val('Attendez...');

                    $('#submit_button').attr('disabled', 'disabled');

                },

                success: function(data) {

                    $('#submit_button').val('OK');

                    $('#submit_button').attr('disabled', false);

                    $('#ChangeEtat').modal('hide');

                    $('#message').html(data.message);

                    setTimeout(function() {

                        $('#message').html('');

                    }, 5000);

                    location.reload();



                }

            })

        });
    </script>

    </body>

    </html>
