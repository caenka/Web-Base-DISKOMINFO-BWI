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
						<h1>Profil</h1>
					</div>
					<div class="row">
						<div class="col-12 col-sm-12 col-lg-7">
							<div class="card author-box card-primary">
								<div class="card-body">
									<div class="author-box-left">
										<img alt="image" src="<?php echo base_url('assets/img/avatar/avatar-1.png') ?>" class="rounded-circle author-box-picture">
										<div class="clearfix"></div>
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
</body>

</html>