<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>CaGOn | SMKN 11 Bandung</title>
	<link href="<?php echo base_url()?>assets/bootstrap3/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
		type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">


	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url()?>assets/bootstrap3/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/bootstrap3/vendor/datatables/dataTables.bootstrap4.min.css"
		rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center"
				href="<?php echo base_url()?>PELAPAK/home">
				<div class="sidebar-brand-icon">
				<img src="<?php echo base_url()?>assets/bootstrap3/img/cagon_admin.png" width="45px" ;>
				</div>
				<br>
				<div class="sidebar-brand-text mx-3">Pelapak <sup><?php echo $this->session->userdata('username')?></sup></div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url()?>PELAPAK/home">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Beranda</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Data Produk
			</div>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url()?>PELAPAK/home/tambah">
					<i class="fa fa-cart-plus"></i>
					<span>Tambah Produk</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url()?>PELAPAK/home/produk">
					<i class="fa fa-shopping-cart"></i>
					<span>Produk</span></a>
			</li>
			<!-- Divider -->


			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Pesanan Masuk
			</div>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url()?>PELAPAK/home/listorder">
					<i class="fas fa-fw fa-table"></i>
					<span>List Order</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url()?>PELAPAK/home/history">
					<i class="fas fa-fw fa-table"></i>
					<span>History</span></a>
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
