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
						<h1>Verifikasi Pengajuan</h1>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4>Tabel Pengajuan</h4>
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
													<th class="text-center">Bidang</th>
													<th class="text-center">File</th>
													<th class="text-center">Status</th>
													<th class="text-center" colspan="2">Aksi</th>

												</tr>
											</thead>
											<tbody>
												<?php
												$no = 1;
												foreach ($pengajuan as $png) : ?>
													<tr>
														<td class="text-center"><?= $no++ ?></td>
														<td class="text-center"><?= $png->judul ?></td>
														<td class="text-center"><?= date("d F Y", strtotime($png->created_at_pengajuan)) ?></td>
														<td class="text-center"><?= $png->bidang ?></td>
														<td class="text-center"><a href="<?= base_url('uploads/' . $png->file); ?>"><?= $png->file ?></a></td>
														<td class="text-center">
															<div class="badge badge-success"><?= $png->status ?></div>
														</td>
														<td>
															<a href="<?= base_url('admin/pengajuan/edit/' . $png->id_pengajuan) ?>" class="btn btn-primary btn-action mr-3">ACC</a>
														</td>
														<td>
															<a href="<?= base_url('admin/pengajuan/revisi/' . $png->id_pengajuan) ?>" class="btn btn-primary btn-action mr-3">REVISI</a>
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