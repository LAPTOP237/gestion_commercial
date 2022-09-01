<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src=" " alt="" class="avatar-md mx-auto rounded-circle">
            </div>

            <div class="mt-3">

                <a href="javascript: void(0);" class="text-dark fw-medium font-size-16"><?=  session()->get('username')?></a>
                <p class="text-body mt-1 mb-0 font-size-13"><?=  session()->get('userrole')?></p>

            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="/" class="waves-effect">
                        <i class="mdi mdi-airplay"></i>
                        <span>Tableau de Bord</span>
                    </a>
                </li>

                <li>
                    <a href="client" class=" waves-effect">
                        <i class="mdi mdi-folder-account-outline"></i>
                        <span>Clients</span>
                    </a>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-ballot-outline"></i>
                        <span>Gestion  Proformas</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="add-proforma">Nouvelle Proforma</a></li>
                        <li><a href="list-proforma">Liste des Proformas</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-clipboard-text-outline"></i>
                        <span>Gestion Commandes</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="add-commande">Nouvelle Commande</a></li>
                        <li><a href="list-commande">Liste des Commandes</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-cart"></i>
                        <span>Gestion Livraisons</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="add-livraison">Nouvelle Livraison</a></li>
                        <li><a href="list-livraison">Liste des Livraisons</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-square-inc-cash"></i>
                        <span>Gestion Factures</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="add-facture">Nouvelle Facture</a></li>
                        <li><a href="list-facture">Liste des Factures</a></li>
                        <li><a href="add-recu">Reçu</a></li>
                    </ul>
                </li>
                <li>
                    <a href="travaux" class=" waves-effect">
                        <i class="mdi mdi-message"></i>
                        <span>Travaux</span>
                    </a>
                </li>
                <li>
                    <a href="#" class=" waves-effect">
                        <i class="mdi mdi-message-processing-outline"></i><span class="badge rounded-pill bg-info float-end">2</span>
                        <span>Notifications</span>
                    </a>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->