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
						<h1>Kelola Akun</h1>
					</div>
					<?php if ($this->session->flashdata('flash')) : ?>
						<div class="card-body col-md-6">
							<div class="alert alert-success alert-dismissible show fade">
								<div class="alert-body">
									<button class="close" data-dismiss="alert">
										<span>&times;</span>
									</button>
									<?= $this->session->flashdata('flash'); ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<a href="<?= base_url(); ?>admin/kelolaAkun/tambah" class="btn btn-primary mb-3">Tambah Akun </a>
					<?php if (empty($tb_users)) : ?>
						<div class="alert alert-danger col-md-6">
							Data tidak ditemukan
						</div>
					<?php endif; ?>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped" id="table-1">
											<thead>
												<tr>
													<th class="text-center">No</th>
													<th>Nama</th>
													<th>Username</th>
													<th>Bidang</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no = 1;
												foreach ($tb_users as $user) :
												?>
													<tr>
														<td><?= $no++ ?></td>
														<td><?= $user['name']; ?></td>
														<td><?= $user['username']; ?></td>
														<td><?= $user['bidang']; ?></td>
														<td>
															<a href="<?= base_url(); ?>admin/kelolaAkun/ubah/<?= $user['id'] ?>" class="btn btn-primary btn-action mr-1">Edit</a>
															<a href="<?= base_url(); ?>admin/kelolaAkun/hapus/<?= $user['id'] ?>" class="btn btn-danger btn-action" onclick="return confirm('Yakin untuk menghapus?');">Hapus</a>
														</td>
													</tr>
												<?php endforeach ?>
											</tbody>
										</table>
									</div>
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
		$("#table-1").dataTable({
			"columnDefs": [{
				"sortable": false,
				"targets": [2, 4]
			}]
		});
	</script>
</body>

</html>