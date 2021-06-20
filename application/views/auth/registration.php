<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="<?= base_url('assets/img/logo kominfo.jpg') ?>" alt="logo" width="80" class="shadow-light rounded-circle">
                            <h5 class="text-dark font-weight-normal mt-3"> KOMINFO Kabupaten Banyuwangi <span class="font-weight-bold"></span></h5>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Registrasi</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="<?= base_url('auth/registration') ?>">
                                    <div class="form-group">
                                        <label for="fullname">Nama Lengkap</label>
                                        <input id="fullname" type="text" class="form-control" name="name" value="<?= set_value('name') ?>">
                                        <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Username</label>
                                        <input id="username" type="text" class="form-control" name="username" value="<?= set_value('username') ?>">
                                        <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Kata Sandi</label>
                                            <input id="password" value="" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password2" value="" class="d-block">Konfirmasi Kata Sandi</label>
                                            <input id="password2" type="password" class="form-control" name="password_confirm">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Registrasi
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            Have an account? <a href="<?= base_url('auth') ?>">Login</a>
                        </div>
                        <div class="simple-footer">
                            Hak Cipta © 2021 Kementerian Komunikasi dan Informatika RI
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>