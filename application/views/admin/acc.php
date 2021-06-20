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
													<th>Bidang</th>
													<th>File Pengajuan</th>
													<th>File Acc</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no = 1;
												foreach ($datapengajuan as $dp) :
												?>
													<tr>
														<td><?= $no++ ?></td>
														<td><?= $dp->judul ?></td>
														<td><?= date("d F Y", strtotime($dp->created_at_acc)), "<br>", date("d F Y", strtotime($dp->created_at_pengajuan)) ?></td>
														<td><?= $dp->bidang ?></td>
														<td><a href="<?= base_url('uploads/' . $dp->file); ?>"><?= $dp->file ?></a></td>
														<td><a href="<?= base_url('uploads/' . $dp->filebaru); ?>"><?= $dp->filebaru ?></a></td>
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
				"targets": [4, 5]
			}]
		});
	</script>
</body>

</html>