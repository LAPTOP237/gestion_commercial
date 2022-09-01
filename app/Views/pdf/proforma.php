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
<!-- Modal Proforma Print -->
      <div class="modal fade" id="Proforma">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="modal-title">Generer le PDF </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <div id="PDFcontent">
                                           <center>
                                             <h3>Facture Proforma</h3>
                                             <p>Ceci est un test...</p>
                                           </center>
                                        </div>
                                        <button id="gpdf" class="btn font-16 btn-secondary w-24"><i class="fa fa-print"></i> PDF</button>
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
                                    <div class="card-body">
                                        <!-- Proforma Print -->
     
                                        <div id="PDFcontent">
                                           <center>
                                             <h3>Facture Proforma</h3>
                                             <p>Ceci est un test...</p>
                                           </center>
                                        </div>
                                        <button id="gpdf" class="btn font-16 btn-secondary w-24"><i class="fa fa-print"></i> PDF</button>
                                    </div>
                                </div> <!-- end modal-content-->
                            </div> <!-- end modal dialog-->
                        </div>
                        <!-- end modal-->
                
                <!-- End Page-content -->

                <?= $this->include('partials/footer') ?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

    </div>
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
    <script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
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

        var pdfdoc = new jsPDF();
var specialElementHandlers = {

'#ignoreContent': function (element, renderer) {

return true;

}

};

 

$(document).ready(function(){

$('#gpdf').click(function(){

pdfdoc.fromHTML($('#PDFcontent').html(), 10, 10, {

'width': 110,

'elementHandlers': specialElementHandlers

});

pdfdoc.save('First.pdf');

});});
    </script>

    </body>

    </html>
