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
						<h1>Berkas Acc</h1>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4>Tabel Berkas</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped" id="table-1">
											<thead>
												<tr>
													<th>No</th>
													<th>Judul</th>
													<th>Tgl Acc <?= "<br>" ?> Tgl Pengajuan</th>
													<th>Berkas Pengajuan</th>
													<th>Berkas ACC</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no = 1;
												foreach ($pengajuan as $png) : ?>
													<tr>
														<td><?= $no++ ?></td>
														<td><?= $png->judul ?></td>
														<td><?= date("d F Y", strtotime($png->created_at_acc)), "<br>", date("d F Y", strtotime($png->created_at_pengajuan))  ?></td>
														<td><a href="<?= base_url('uploads/' . $png->file); ?>"><?= $png->file ?></a></td>
														<td><a href="<?= base_url('uploads/' . $png->filebaru); ?>"><?= $png->filebaru ?></a></td>
													</tr>
												<?php endforeach; ?>
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
				"targets": [3, 4]
			}]
		});
	</script>
</body>

</html>