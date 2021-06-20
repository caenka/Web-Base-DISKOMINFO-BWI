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
						<h1>Berkas Pengajuan</h1>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<a href="tambahPengajuan" class="btn btn-primary">Tambah Berkas Pengajuan</a>
								</div>
								<?= $this->session->flashdata('message'); ?>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped" id="table-1">
											<thead>
												<tr>
													<th class="text-center">No</th>
													<th class="text-center">Judul</th>
													<th class="text-center">Tanggal</th>
													<th class="text-center">File</th>
													<th class="text-center">Status</th>
													<th class="text-center" colspan="2">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php
												// date_default_timezone_set('Asia/Jakarta');
												$no = 1;
												foreach ($pengajuan as $png) :
												?>
													<tr>
														<td class="text-center"><?= $no++ ?></td>
														<td class="text-center"><?= $png->judul ?></td>
														<td class="text-center">
															<?= date("d F Y", strtotime($png->created_at_pengajuan)) ?></td>
														<td class="text-center">
															<a href="<?= base_url('uploads/' . $png->file); ?>"><?= $png->file ?></a>
															<!-- <img alt="image" src="<?php echo base_url('uploads/' . $png->file) ?>" class="rounded-circle" width="35" data-toggle="tooltip"> -->
														</td>
														<td class="text-center">
															<div class="badge badge-success"><?= $png->status ?></div>
														</td>
														<td class="text-center"><a href="<?= base_url('bidang/pengajuan/hapus/' . $png->id_pengajuan) ?>" class="btn btn-danger" onclick="return confirm('Yakin untuk menghapus?');">
																<i class="fas fa-trash"></i></a></td>
														<td class="text-center"><a href="<?= base_url('bidang/pengajuan/edit/' . $png->id_pengajuan) ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
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
				"targets": [2, 3]
			}]
		});
	</script>
</body>

</html>