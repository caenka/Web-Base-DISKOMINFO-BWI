<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('layouts/head.php'); ?>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <?php $this->load->view('layouts/navbar.php') ?>
            <?php $this->load->view('admin/_partials/sidebar.php') ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <div class="section-header-back">
                            <a href="<?= base_url('admin/pengajuan/') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                        </div>
                        <h1>Revisi Berkas Pengajuan</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="<?= base_url('admin/pengajuan/') ?>">Berkas Pengajuan</a></div>
                            <div class="breadcrumb-item active">Tambah Berkas Pengajuan</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <form action="<?= base_url() . 'admin/Pengajuan/update'; ?>" method="POST" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Informasi Berkas</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php foreach ($pengajuan as $png) : ?>
                                            <div class="form-group">
                                                <label>Judul</label>
                                                <input type="hidden" name="id" class="form-control" value="<?= $png->id_pengajuan ?>">
                                                <input type="text" class="form-control" name="judul" value="<?= $png->judul ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <?php foreach ($status as $s) : ?>
                                                        <?php if ($s == $png->status) : ?>
                                                            <option value="<?= $s; ?>" selected><?= $s; ?></option>
                                                        <?php else : ?>
                                                            <option value="<?= $s; ?>"><?= $s; ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="floatingTextarea2">Comments</label>
                                                <textarea name="comment" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                            </div>
                                            <div class="card-footer text-right">
                                                <button class="btn btn-primary mr-1" type="submit" name="submit">Submit</button>
                                                <button class="btn btn-secondary" type="reset">Reset</button>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
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