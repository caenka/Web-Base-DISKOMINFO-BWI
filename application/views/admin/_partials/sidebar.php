<div class="main-sidebar">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<img src="<?= base_url('assets/img/logo kominfo.jpg') ?>" alt="logo" width="50" class="shadow-light rounded-circle">
			<a href="<?=base_url('admin/dashboard')?>" >DISKOMINFO</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<img src="<?= base_url('assets/img/logo kominfo.jpg') ?>" alt="logo" width="25" class="shadow-light rounded-circle">
			<a href="<?=base_url('admin/dashboard')?>">OFC</a>
		</div>
		<ul class="sidebar-menu">
			<li class="menu-header">Dashboard</li>
			<li class="<?php echo $this->uri->segment(2)=='dashboard' ? 'active' :''?>">
				<a href="<?= base_url('admin/dashboard');?>"><i class="fas fa-fire"></i><span>Dashboard</span></a>
			</li>
			<li class="menu-header">Berkas</li>
			<li class="<?php echo $this->uri->segment(2)=='pengajuan' ? 'active' :''?>">
				<a href="<?= base_url('admin/pengajuan');?>"><i class="fas fa-newspaper"></i><span>Verifikasi Pengajuan</span></a>
			</li>
			<li class="<?php echo $this->uri->segment(2)=='acc' ? 'active' :''?>">
				<a href="<?= base_url('admin/acc');?>"><i class="fas fa-file"></i><span>Berkas Acc</span></a>
			</li>
			<li class='menu-header'>Kelola Akun</li>
			<li class="<?php echo $this->uri->segment(2)=='kelola' ? 'active' :''?>">
				<a href="<?= base_url('admin/kelolaAkun');?>"><i class="far fa-user"></i> <span>Kelola Akun</span></a>
			</li>
		</ul>
	</aside>
</div>
