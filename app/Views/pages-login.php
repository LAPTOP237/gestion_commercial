<?= $this->include('partials/main') ?>

<head>

    <?= $title_meta ?>

    <?= $this->include('partials/head-css') ?>

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-login text-center">
                            <div class="bg-login-overlay"></div>
                            <div class="position-relative">
                                <h5 class="text-white font-size-20">Bienvenue !</h5>
                                <p class="text-white-50 mb-0">Connectez-vous</p>
                                <a href="/" class="logo logo-admin mt-4">
                                    <img src="assets/images/logo-sm-dark.png" alt="logo-sm-dark" height="30">
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <?php if (session()->getFlashdata('msg')) : ?>
                                <div class="alert alert-warning">
                                    <?= session()->getFlashdata('msg') ?>
                                </div>
                            <?php endif; ?>
                            <div class="p-2">
                                <form class="form-horizontal" action=<?= base_url('/login') ?> method="post">

                                    <div class="mb-3">
                                        <label class="form-label" for="username">Nom d'utilisateur</label>
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Entrez le nom d'utilisateur" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Mot de Passe</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Entrez le mot de passe" required>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Connexion</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <a href="pages-recoverpw" class="text-muted"><i class="mdi mdi-lock me-1"></i> Mot de passe oublié?</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>&copy; <script>
                                document.write(new Date().getFullYear())
                            </script> MC Gestion Commerciale <i class="mdi mdi-heart text-danger"></i> developpé par <i class="fa fa-laptop" aria-hidden="true"></i>Laptop
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <?= $this->include('partials/vendor-scripts') ?>

    <script src="assets/js/app.js"></script>

</body>

</html>