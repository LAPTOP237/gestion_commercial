<header id="page-topbar">
    <div class="navbar-header">
        <div class="container-fluid">
            <div class="float-end">


                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="mdi mdi-fullscreen"></i>
                    </button>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- <img class="rounded-circle header-profile-user" src=""
                            alt="Header Avatar"> -->
                        <span class="d-none d-xl-inline-block ms-1"><?=  session()->get('username')?></span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="/pages-profile"><i class="bx bx-user font-size-16 align-middle me-1"></i>Profil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="/pages-login"><i
                                class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>Deconnexion</a>
                    </div>
                </div>


            </div>
            <div>
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="/" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="logo" height="20">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-light.png" alt="logo" height="19">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect"
                    id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

            </div>
        </div>
    </div>
</header>