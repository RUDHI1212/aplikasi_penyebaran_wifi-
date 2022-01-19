<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $title ?></title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets/bootstrap3/');?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
		type="text/css">
	<link
		href="<?= base_url('assets/bootstrap3/');?>/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/bootstrap3/');?>css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/bootstrap3/');?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">


			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url()?>ADMIN/home">
				<div class="sidebar-brand-icon">
					<img src="<?php echo base_url()?>assets/bootstrap3/img/cagon_admin.png" width="45px" ;>
				</div>
				<div class="sidebar-brand-text mx-3">ADMIN</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
				<a class="nav-link" href="<?= base_url()?>ADMIN/home">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Operator
			</div>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Operator" aria-expanded="true"
					aria-controls="Operator">
					<i class="fas fa-th-list fa-cog"></i>
					<span>Daftar List</span>
				</a>
				<div id="Operator" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?= base_url();?>ADMIN/home/produk">List Produk</a>
						<a class="collapse-item" href="<?= base_url();?>ADMIN/home/order">List Order</a>
					</div>
				</div>
			</li>




			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Customer
			</div>


			<li class="nav-item">
				<a class="nav-link" href="<?= base_url();?>ADMIN/home/customer">
					<i class="fas fa-clipboard-list"></i>
					<span>Daftar Customer</span></a>
			</li>



			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Register" aria-expanded="true"
					aria-controls="Register">
					<i class="fas fa-users fa-cog"></i>
					<span>Tambah Customer</span>
				</a>
				<div id="Register" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?= base_url();?>ADMIN/home/form">Import Data Excel</a>
						<a class="collapse-item" href="<?= base_url();?>ADMIN/home/insert_dataC">Manual</a>
					</div>
				</div>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">


			<div class="sidebar-heading">
				Pelapak
			</div>

			<li class="nav-item">
				<a class="nav-link" href="<?= base_url();?>ADMIN/home/pelapak">
					<i class="fas fa-clipboard-list"></i>
					<span>Daftar Pelapak</span></a>
			</li>


			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Register1" aria-expanded="true"
					aria-controls="Register1">
					<i class="fas fa-user-tie fa-cog"></i>
					<span>Tambah Pelapak</span>
				</a>
				<div id="Register1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?= base_url();?>ADMIN/home/form">Import Data Excel</a>
						<a class="collapse-item" href="<?= base_url();?>ADMIN/home/insert_dataP">Manual</a>
					</div>
				</div>
			</li>


			<!-- Divider -->
			<hr class="sidebar-divider">

			<div class="sidebar-heading">
				Bank Mini Terpadu
			</div>

			<li class="nav-item">
				<a class="nav-link" href="<?= base_url();?>ADMIN/home/bmt">
					<i class="fas fa-clipboard-list"></i>
					<span>Daftar BMT</span></a>
			</li>


			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Register2" aria-expanded="true"
					aria-controls="Register1">
					<i class="fas fa-university fa-cog"></i>
					<span>Tambah BMT</span>
				</a>
				<div id="Register2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?= base_url();?>ADMIN/home/form">Import Data Excel</a>
						<a class="collapse-item" href="<?= base_url();?>ADMIN/home/insert_dataB">Manual</a>
					</div>
				</div>
			</li>






			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>


					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">



						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<?php foreach ($sess as $row); ?>
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $row->name ; ?></span>
								<img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="<?= base_url('ADMIN/home/profil');?>">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Profile
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->
				<div class="pro-fil" data-profil="<?php echo $this->session->flashdata('profil');?>"> </div>
