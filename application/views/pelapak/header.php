<div class="pro-fil" data-profil="<?php echo $this->session->flashdata('profil');?>"> </div>
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

	<!-- Sidebar Toggle (Topbar) -->
	<button id="sidebarToggleTop" class="btn btn-danger d-md-none rounded-circle mr-3">
		<i class="fa fa-bars"></i>
	</button>

	<!-- Topbar Navbar -->
	<ul class="navbar-nav ml-auto">
		<!-- Nav Item - Alerts -->
		<li class="nav-item dropdown no-arrow mx-1">
			<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-bell fa-fw"></i>
				<!-- Counter - Alerts -->
				<span class="badge badge-danger badge-counter">4</span>
			</a>
			<!-- Dropdown - Alerts -->
			<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
				aria-labelledby="alertsDropdown">
				<h6 class="dropdown-header">
					Alerts Center
				</h6>
				<a class="dropdown-item d-flex align-items-center" href="<?php echo base_url()?>PELAPAK/home">
					<div class="mr-3">
						<div class="icon-circle bg-warning">
							<i class="fas fa-donate text-white"></i>
						</div>
					</div>
					<div>
						<div class="small text-gray-500"><?php echo date('d-m-Y');?></div>
						Penghasilan Harianmu adalah Rp. <?php echo number_format($hari,0,",",".");?>
					</div>
				</a>
				<a class="dropdown-item d-flex align-items-center" href="<?php echo base_url()?>PELAPAK/home">
					<div class="mr-3">
						<div class="icon-circle bg-danger">
							<i class="fas fa-donate text-white"></i>
						</div>
					</div>
					<div>
						<div class="small text-gray-500"><?php echo date('d-m-Y');?></div>
						Penghasilan Mingguanmu adalah Rp. <?php echo number_format($minggu,0,",",".");?>
					</div>
				</a>
				<a class="dropdown-item d-flex align-items-center" href="<?php echo base_url()?>PELAPAK/home">
					<div class="mr-3">
						<div class="icon-circle bg-success">
							<i class="fas fa-donate text-white"></i>
						</div>
					</div>
					<div>
						<div class="small text-gray-500"><?php echo date('d-m-Y');?></div>
						Penghasilan Bulananmu adalah Rp. <?php echo number_format($bulan,0,",",".");?>
					</div>
				</a>
				<a class="dropdown-item d-flex align-items-center" href="<?php echo base_url()?>PELAPAK/home">
					<div class="mr-3">
						<div class="icon-circle bg-primary">
							<i class="fas fa-donate text-white"></i>
						</div>
					</div>
					<div>
						<div class="small text-gray-500"><?php echo date('d-m-Y');?></div>
						Penghasilan Tahunanmu adalah Rp. <?php echo number_format($tahun,0,",",".");?>
					</div>
				</a>
				<a class="dropdown-item text-center small text-gray-500"
					href="<?php echo base_url()?>PELAPAK/home">Lihat Lebih Lengkap</a>
			</div>
		</li>

		<li class="nav-item dropdown no-arrow mx-1">
			<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-envelope fa-fw"></i>
				<!-- Counter - Messages -->
				<span class="badge badge-danger badge-counter"><?php echo $hitung ?></span>
			</a>
			<!-- Dropdown - Messages -->
			<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
				aria-labelledby="messagesDropdown">
				<h6 class="dropdown-header">
					Pesanan
				</h6>
				<?php foreach ($notif as $no) : ?>
				<a class="dropdown-item d-flex align-items-center" href="<?php echo base_url()?>PELAPAK/home/listorder">
					<div class="dropdown-list-image mr-3">
						<img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
						<div class="status-indicator"></div>
					</div>
					<div>
						<div class="text-truncate"><?php echo $no->produk?> dibeli sebanyak <?php echo $no->qty?></div>
						<div class="small text-gray-500">oleh <?php echo $no->nama?></div>
					</div>
				</a>
				<?php endforeach; ?>
				<a class="dropdown-item text-center small text-gray-500"
					href="<?php echo base_url()?>PELAPAK/home/listorder">Lihat Lebih Banyak Pesanan</a>
			</div>
		</li>

		<div class="topbar-divider d-none d-sm-block"></div>

		<?php foreach ($sess as $row); ?>
		<!-- Nav Item - User Information -->
		<li class="nav-item dropdown no-arrow">
			<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false">
				<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $row->name ; ?></span>
				<img class="img-profile rounded-circle" src="https://image.flaticon.com/icons/png/128/145/145855.png">
			</a>
			<!-- Dropdown - User Information -->
			<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
				<a class="dropdown-item">
					<i class="fas fa-dollar-sign fa-sm fa-fw mr-2 text-gray-400"></i>
					<?php echo number_format($row->Dompet, 0, ",", "."); ?>
				</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="<?php echo base_url()?>PELAPAK/home/profil">
					<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
					Profile
				</a>

				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="<?php echo base_url()?> login/logout" data-toggle="modal"
					data-target="#logoutModal">
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
					Logout
				</a>
			</div>
		</li>

	</ul>

</nav>
