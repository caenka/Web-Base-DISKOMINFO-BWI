<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <?php $this->load->view('layouts/navbar.php') ?>
            <?php $this->load->view('bidang/_partials/sidebar.php') ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <div class="section-header-back">
                            <a href="<?= base_url('bidang/pengajuan/') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                        </div>
                        <h1>Edit Berkas Pengajuan</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="<?= base_url('bidang/pengajuan/') ?>">Berkas Pengajuan</a></div>
                            <div class="breadcrumb-item active">Edit Berkas Pengajuan</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <form action="<?= base_url('bidang/pengajuan/update') ?>" method="POST" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Informasi Berkas</h4>
                                    </div>
                                    <?php foreach ($pengajuan as $png) : ?>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="floatingTextarea2">Keterangan Revisi</label>
                                                <textarea name="comment" class="form-control" id="floatingTextarea2" readonly style="height: 100px"><?= $png->keterangan ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Judul</label>
                                                <input type="text" class="form-control" name="judul" value="<?= $png->judul ?>" readonly>
                                                <input type="hidden" class="form-control" name="id" value="<?= $png->id_pengajuan ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>File Revisi</label>
                                                <input type="file" class="form-control" name="filename">
                                                <br>
                                                <small>Upload file surat terbaru disini</small>
                                            </div>
                                            <div class="card-footer text-right">
                                                <button class="btn btn-primary mr-1" type="submit" name="submit">Submit</button>
                                                <button class="btn btn-secondary" type="reset">Reset</button>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
            </section>
        </div>
        <?php $this->load->view('layouts/footer.php') ?>
    </div>
    </div>

    <?php $this->load->view('layouts/js.php') ?>
</body>

</html>