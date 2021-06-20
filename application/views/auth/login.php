<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="<?= base_url('assets/img/logo kominfo.jpg') ?>" alt="logo" width="80" class="shadow-light rounded-circle">
                            <h5 class="text-dark font-weight-normal mt-3"> KOMINFO Kabupaten Banyuwangi <span class="font-weight-bold"></span></h5>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <?= $this->session->flashdata('message'); ?>
                            <div class="card-body">
                                <form method="POST" action="<?= base_url('auth'); ?> " class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" value="<?= set_value('username') ?>" type="text" class="form-control" name="username" tabindex="1">
                                        <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                                <a href="auth-forgot-password.html" class="text-small">
                                                    Forgot Password?
                                                </a>
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2">
                                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>


                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            Don't have an account? <a href="<?= base_url('auth/registration') ?>">Create One</a>
                        </div>
                        <div class="simple-footer">
                            Hak Cipta © 2021 Kementerian Komunikasi dan Informatika RI
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>