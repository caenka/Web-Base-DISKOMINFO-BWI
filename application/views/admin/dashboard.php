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
						<h1>Dashboard</h1>
					</div>
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="card card-statistic-1">
								<div class="card-icon bg-primary">
									<i class="far fa-user"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Admin Bidang</h4>
									</div>
									<div class="card-body">
										<?= $tb_users->num_rows() ?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="card card-statistic-1">
								<div class="card-icon bg-success">
									<i class="far fa-newspaper"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Menunggu pengecekan</h4>
									</div>
									<div class="card-body">
										<?= $pengajuan->num_rows() ?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="card card-statistic-1">
								<div class="card-icon bg-danger">
									<i class="fas fa-exclamation"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Berkas Revisi</h4>
									</div>
									<div class="card-body">
										<?= $tb_revisi->num_rows() ?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="card card-statistic-1">
								<div class="card-icon bg-warning">
									<i class="far fa-file"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Berkas Acc</h4>
									</div>
									<div class="card-body">
										<?= $tb_acc->num_rows() ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img class="d-block w-100" src="<?= base_url('assets/img/carousel2.jpg') ?>" alt="First slide">
									</div>
									<div class="carousel-item">
										<img class="d-block w-100" src="<?= base_url('assets/img/carousel1.jpg') ?>" alt="Second slide">
									</div>
									<div class="carousel-item">
										<img class="d-block w-100" src="<?= base_url('assets/img/carousel3.jpeg') ?>" alt="Third slide">
									</div>
								</div>
								<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
					</div>

				</section>
			</div>
			<?php $this->load->view("layouts/footer.php") ?>
		</div>
	</div>

	<?php $this->load->view("layouts/js.php") ?>
</body>

</html>