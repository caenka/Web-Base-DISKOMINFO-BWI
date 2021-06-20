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
						<h1>Profil</h1>
					</div>
					<div class="row">
						<div class="col-12 col-sm-12 col-lg-7">
							<div class="card author-box card-primary">
								<div class="card-body">
									<div class="author-box-left">
										<img alt="image" src="<?php echo base_url('assets/img/avatar/avatar-1.png') ?>" class="rounded-circle author-box-picture">
										<div class="clearfix"></div>
										<a href="#" id="edit_profil" data-bs-toggle="modal" class="btn btn-primary mt-3">edit <i class="far fa-edit"></i></a>
									</div>
									<div class="author-box-details">
										<div class="author-box-name">
											<a>Nama Lengkap</a>
										</div>
										<div class="author-box-job"><?= $user[0]['name'] ?></div><br>
										<div class="author-box-name">
											<a>Username</a>
										</div>
										<div class="author-box-job"><?= $user[0]['username'] ?></div><br>
										<div class="author-box-name">
											<a>Bidang</a>
										</div>
										<div class="author-box-job"><?= $user[0]['bidang'] ?></div>
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
	<script>
		$('#edit_profil').fireModal({
			title: 'Edit Profil',
			center: true,
			body: `
			<form id="edit_profil" action="<?= base_url('admin/Profil/update/') . $user[0]['id'] ?>" method="POST">
				<div class="card-body">
					<div class="row">
						<div class="form-group ">
							<label>Nama Lengkap</label>
							<input type="text" name='fullname' class="form-control" value="<?= $user[0]['name'] ?>" required="">
							<div class="invalid-feedback">
								Silahkan isi nama lengkap
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group ">
							<label>Username</label>
							<input type="text" name='username' class="form-control" value="<?= $user[0]['username'] ?>" required="">
							<div class="invalid-feedback">
								Silahkan isi email
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group ">
							<label>Password</label>
							<input type="password" name='password' class="form-control" value="" required="">
							<div class="invalid-feedback">
								Silahkan isi password
							</div>
						</div>
						<div class="form-group col-md-6 col-12">
							<label>Konfirmasi Password</label>
							<input type="password" name='konfirm' class="form-control" value="" required="">
							<div class="invalid-feedback">
								Silahkan isi konfirmasi password
							</div>
						</div>
					</div>
				</div>
				<button class="btn btn-primary" type="submit">Simpan</button>
			</form>
		`
		})
	</script>
</body>

</html>