       <!-- Begin Page Content -->
       <div class="container-fluid">
       	<div class="suk-ses" data-sukses="<?php echo $this->session->flashdata('sukses');?>"> </div>
       	<div class="pro-fil" data-profil="<?php echo $this->session->flashdata('profil');?>"> </div>
       	<!-- Page Heading -->
       	<div class="d-sm-flex align-items-center justify-content-between mb-4">
       		<h1 class="h3 mb-0 text-gray-800">Beranda</h1>
       	</div>

       	<!-- Content Row -->
       	<div class="row">
       		<div class="col-xl-3 col-md-6 mb-4">
       			<div class="card border-left-danger shadow h-100 py-2">
       				<div class="card-body">
       					<div class="row no-gutters align-items-center">
       						<div class="col mr-2">
       							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Penghasilan
       								Harian</div>
       							<div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
       								<?php echo number_format($hari,0,",",".");?></div>
       						</div>
       						<div class="col-auto">
       							<i class="fas fa-calendar fa-2x text-gray-300"></i>
       						</div>
       					</div>
       				</div>
       			</div>
       		</div>
       		<!-- Earnings (Monthly) Card Example -->
       		<div class="col-xl-3 col-md-6 mb-4">
       			<div class="card border-left-success shadow h-100 py-2">
       				<div class="card-body">
       					<div class="row no-gutters align-items-center">
       						<div class="col mr-2">
       							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Penghasilan
       								Mingguan</div>
       							<div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
       								<?php echo number_format($minggu,0,",",".");?></div>
       						</div>
       						<div class="col-auto">
       							<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
       						</div>
       					</div>
       				</div>
       			</div>
       		</div>

       		<!-- Earnings (Monthly) Card Example -->
       		<div class="col-xl-3 col-md-6 mb-4">
       			<div class="card border-left-info shadow h-100 py-2">
       				<div class="card-body">
       					<div class="row no-gutters align-items-center">
       						<div class="col mr-2">
       							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Penghasilan
       								Bulanan</div>
       							<div class="row no-gutters align-items-center">
       								<div class="col-auto">
       									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
       										Rp. <?php echo number_format($bulan,0,",",".");?></div>
       								</div>

       							</div>
       						</div>
       						<div class="col-auto">
       							<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
       						</div>
       					</div>
       				</div>
       			</div>
       		</div>

       		<!-- Pending Requests Card Example -->
       		<div class="col-xl-3 col-md-6 mb-4">
       			<div class="card border-left-warning shadow h-100 py-2">
       				<div class="card-body">
       					<div class="row no-gutters align-items-center">
       						<div class="col mr-2">
       							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Penghasilan
       								Tahunan</div>
       							<div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
       								<?php echo number_format($tahun,0,",",".");?></div>
       						</div>
       						<div class="col-auto">
       							<i class="fas fa-comments fa-2x text-gray-300"></i>
       						</div>
       					</div>
       				</div>
       			</div>
       		</div>
       	</div>

       	<!-- Content Row -->

       	<!-- Area Chart -->

       	<div class="row">
       		<div class="col-lg-7">
       			<div class="card shadow mb-4">
       				<!-- Card Header - Dropdown -->
       				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
       					<h6 class="m-0 font-weight-bold">Report</h6>
       				</div>
       				<!-- Card Body -->
       				<div class="card-body">
       					<div class="chart-area" style="position: relative; height:55vh; width:40vw">
       						<canvas id="myChart"></canvas>
       					</div>
       				</div>
       			</div>
       		</div>



       		<div class="col-lg-5">
       			<div class="card shadow mb-4">
       				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
       					<h6 class="m-0 font-weight-bold">Report</h6>
       				</div>
       				<!-- Card Body -->
       				<div class="card-body">
       					<div class="chart-bar" style="position: relative; left: 25px; height:55vh; width:25vw">
       						<canvas id="myBar"></canvas>
       					</div>
       				</div>
       			</div>
       		</div>
       	</div>
       </div>
       <!-- Bootstrap core JavaScript-->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
       <?php
			if(is_array($data)) {
				foreach ($data as $data) {
				 $produk[] = $data->produk;
				 $harga[] = (float)$data->harga;
				}
			} ?>
       <script>
       	var ctx = document.getElementById('myChart').getContext('2d');
       	var chart = new Chart(ctx, {
       		type: 'line',

       		// The data for our dataset
       		data: {
       			labels: <?php echo json_encode($produk);?>,
       			datasets: [{
       				label: "Data Produk yang jual",
       				lineTension: 0.3,
       				backgroundColor: 'rgba(244, 66, 66,0.5)',
       				borderColor: 'rgb(216, 87, 32)',
       				pointRadius: 3,
       				pointBackgroundColor: "rgb(214, 42, 42)",
       				pointBorderColor: "rgba(214, 14, 78, 1)",
       				pointHoverRadius: 3,
       				pointHoverBackgroundColor: "rgba(214, 42, 42, 0.5)",
       				pointHoverBorderColor: "rgba(214, 14, 78, 0.5)",
       				pointHitRadius: 10,
       				pointBorderWidth: 2,
       				data: <?php echo json_encode($harga);?>
       			}]
       		},

       		// Configuration options go here
       		options: {}
       	});

       </script>

       <?php
	   if(is_array($da)) {
		   foreach ($da as $da) {
			   $nam[] = $da->name;
			   $price[] = (float)$da->harga;
		   }
	   } ?>
       <script>
       	var ctx = document.getElementById('myBar').getContext('2d');
       	var chart = new Chart(ctx, {
       		type: 'pie',

       		// The data for our dataset
       		data: {
       			labels: <?php echo json_encode($nam);?>,
       			datasets: [{
       				lineTension: 0.3,
       				backgroundColor: 'rgba(244, 66, 66,0.5)',
       				borderColor: 'rgb(216, 87, 32)',
       				pointRadius: 3,
       				pointBackgroundColor: "rgb(214, 42, 42)",
       				pointBorderColor: "rgba(214, 14, 78, 1)",
       				pointHoverRadius: 3,
       				pointHoverBackgroundColor: "rgba(214, 42, 42, 0.5)",
       				pointHoverBorderColor: "rgba(214, 14, 78, 0.5)",
       				pointHitRadius: 10,
       				pointBorderWidth: 2,
       				data: <?php echo json_encode($price);?>
       			}]
       		},

       		// Configuration options go here
       		options: {}
       	});

       </script>
