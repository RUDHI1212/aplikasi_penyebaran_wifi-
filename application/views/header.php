<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Bootstrap-ecommerce by Vosidiy">

	<title>Aplikasi Sebaran WIFI</title>

	<!-- jQuery -->
	<script src="<?php echo base_url() ?>assets/alibaba/js/jquery-2.0.0.min.js" type="text/javascript"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

	<!-- Bootstrap4 files-->
	<script src="<?php echo base_url() ?>assets/alibaba/js/bootstrap.bundle.min.js" type="text/javascript"></script>
	<link href="<?php echo base_url() ?>assets/alibaba/css/bootstrap.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<!-- Font awesome 5 -->
	<link href="<?php echo base_url() ?>assets/alibaba/fonts/fontawesome/css/fontawesome-all.min.css" type="text/css" rel="stylesheet">

	<!-- plugin: fancybox  -->
	<script src="<?php echo base_url() ?>assets/alibaba/plugins/fancybox/fancybox.min.js" type="text/javascript">
	</script>
	<link href="<?php echo base_url() ?>assets/alibaba/plugins/fancybox/fancybox.min.css" type="text/css" rel="stylesheet">

	<!-- plugin: owl carousel  -->
	<link href="<?php echo base_url() ?>assets/alibaba/plugins/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/alibaba/plugins/owlcarousel/assets/owl.theme.default.css" rel="stylesheet">
	<script src="<?php echo base_url() ?>assets/alibaba/plugins/owlcarousel/owl.carousel.min.js"></script>

	<!-- custom style -->
	<link href="<?php echo base_url() ?>assets/alibaba/css/ui.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/alibaba/css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />

	<!-- custom javascript -->
	<script src="<?php echo base_url() ?>assets/alibaba/js/script.js" type="text/javascript"></script>

	<script type="text/javascript">
		/// some script

		// jquery ready start
		$(document).ready(function() {
			// jQuery code

		});
		// jquery end
	</script>

</head>

<body>
	<header class="section-header">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				<h2 class="logo-text text-center"><a class="text-warning" href="<?php echo base_url() ?>auth"> <img src="<?php echo base_url()?>assets/bootstrap3/img/cagon_user1.png" width="45px" ;></i> Aplikasi Sebaran WIFI Kabupaten Karawang</a></h2>

				<div class="container">
					<div class="row-sm align-items-center">
						<div class="col-lg-13-24 col-sm-8">
							<?php echo form_open('auth/cari') ?>
							<div class="input-group w-100">
								<select class="custom-select" name="kategori">
									<option value="nama_produk">Nama Produk</option>
									<option value="name">Pelapak</option>
									<option value="harga">Harga</option>
								</select>
								<input type="text" class="form-control" name="cari" style="width:50%;" placeholder="Search">
								<div class="input-group-append">
									<button class="btn btn-warning" type="submit">
										<i class="fa fa-search"></i> Search
									</button>
								</div>
							</div>
							<?php echo form_close() ?>
						</div> <!-- col.// -->
						
								<div class="col-auto">
									<div class="widget-header dropdown">
										<a href="<?php echo base_url()?>login/login" data-offset="20,10">
											<div class="icontext">
												<div class="icon-wrap"><i class="text-warning icon-sm fa fa-user"></i>
												</div>
												<div class="text-wrap text-dark">
													Log in <br>
													Akun saya</i>
												</div>
											</div>
										</a>
									</div> <!-- widget-header .// -->

								</div> <!-- col.// -->
							</div> <!-- widgets-wrap.// row.// -->
						</div> <!-- col.// -->
					</div> <!-- row.// -->
		</nav>
	</header> <!-- section-header.// -->