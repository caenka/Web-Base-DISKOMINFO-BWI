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
			<?php $this->load->view('admin/_partials/sidebar.php') ?>

			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<div class="section-header-back">
							<a href="<?= base_url('admin/kelolaAkun'); ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
						</div>
						<h1>Ubah Akun</h1>
						<div class="section-header-breadcrumb">
							<div class="breadcrumb-item"><a href="<?= base_url('admin/kelolaAkun'); ?>">Kelola Akun</a>
							</div>
							<div class="breadcrumb-item active">Ubah Akun</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4>Informasi Akun</h4>
								</div>
								<div class="card-body">
									<form action="" method="post">
										<input type="hidden" name="id" value="<?= $tb_users['id'] ?>">
										<div class="form-group">
											<label for="nama">Nama Lengkap</label>
											<input type="text" class="form-control" id="nama" name="nama" value="<?= $tb_users['name'] ?>">
											<small class="form-text text-danger"><?= form_error('nama'); ?>
											</small>
										</div>
										<div class="form-group">
											<label for="username">Username</label>
											<input type="text" class="form-control" id="username" name="username" value="<?= $tb_users['username'] ?>">
											<small class="form-text text-danger"><?= form_error('username'); ?>
										</div>
										<div class="form-group">
											<label for="password">Password</label>
											<input type="password" class="form-control" id="password" name="password">
											<small class="form-text text-danger"><?= form_error('password'); ?>
										</div>
										<div class="form-group">
											<label for="bidang">Bidang</label>
											<select class="form-control form-control-sm" id="bidang" name="bidang">
												<?php foreach ($bidang as $bdg) : ?>
													<?php if ($bdg == $tb_users['bidang']) : ?>
														<option value="<?= $bdg; ?>" selected><?= $bdg; ?></option>
													<?php else : ?>
														<option value="<?= $bdg; ?>"><?= $bdg; ?></option>
													<?php endif; ?>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="card-footer text-right">
											<button class="btn btn-primary mr-1" type="submit" name="tambah">Submit</button>
										</div>
									</form>
								</div>
							</div>
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