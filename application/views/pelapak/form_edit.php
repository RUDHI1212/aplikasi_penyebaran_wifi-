<section class="container-fluid">

	<div class="panel-heading">
		<h3 class="panel-title"><i class="fa fa-dashboard"></i> List Produk</h3>
	</div>
	<!-- <form action="<?php //echo base_url('home/tambahmobil'); ?>" method="post" class="form-horizontal"> -->

	<?php echo form_open('PELAPAK/home/updateproduk/'.$db->id_produk, ['class' => 'form-horizontal', 'method' => 'post']); ?>

	<div class="col-xl-8 col-md-6 mb-8">
		<div class="card border-left-danger shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="form-group">
							<label for="name" class="control-label col-sm-6">ID Produk</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="id_produk"
									value="<?php echo set_value('id_produk', $db->id_produk); ?>" readonly>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<br>
	<div class="col-xl-8 col-md-6 mb-8">
		<div class="card border-left-danger shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="form-group">
							<label for="name" class="control-label col-sm-6">Nama Produk</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nama_produk"
									value="<?php echo set_value('nama_produk', $db->nama_produk); ?>" readonly>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>

	<div class="col-xl-8 col-md-6 mb-8">
		<div class="card border-left-danger shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="form-group">
							<label for="name" class="control-label col-sm-6">Deskripsi</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="deskripsi"
									value="<?php echo set_value('deskripsi', $db->deskripsi); ?>" readonly>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>


	<div class="col-xl-8 col-md-6 mb-8">
		<div class="card border-left-danger shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="form-group">
							<label for="name" class="control-label col-sm-6">Harga</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="harga"
									value="<?php echo set_value('harga', $db->harga); ?>" readonly>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>

	<div class="col-xl-8 col-md-6 mb-8">
		<div class="card border-left-danger shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="form-group">
							<label for="stock" class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<select class="form-control" name="status">
									<option value="1" selected>Ada</option>
									<option value="2">Tiada</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>


	<div class="form-group">
		<div class="btn-form col-sm-12">
			<a href="<?php echo base_url('PELAPAK/home/produk'); ?>"><button type="button"
					class='btn btn-default'>Batal</button></a>
			<button type="submit" class='btn btn-primary'>Simpan</button>
		</div>
	</div>
	<?php echo form_close(); ?>

	</div>
</section>
