<div class="container-fluid">

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h2 class="h3 mb-0 text-gray-800">Edit Status Pembelian</h2>
	</div>

	<?php echo form_open('PELAPAK/home/update_order/'.$db->id_DO, ['class' => 'form-horizontal', 'method' => 'post']); ?>

	<input type="hidden" class="form-control" name="id_DO" value="<?php echo set_value('id_DO', $db->id_DO); ?>" readonly>

	<div class="col-xl-8 col-md-6 mb-6">
		<div class="card border-left-danger shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="form-group">
							<label for="id_items" class="control-label col-sm-6">ID Order</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-user" name="id"
									value="<?php echo set_value('id', $db->id); ?>" readonly>
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
								<input type="text" class="form-control" name="produk"
									value="<?php echo set_value('produk', $db->produk); ?>" readonly>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<br>

	<div class="col-xl-8 col-md-10 mb-8">
		<div class="card border-left-danger shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="form-group">
							<label for="price" class="control-label col-sm-2">Qty </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="qty" value="<?php echo set_value('qty', $db->qty); ?>"
									readonly>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<br>

	<div class="col-xl-8 col-md-10 mb-8">
		<div class="card border-left-danger shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="form-group">
							<label for="price" class="control-label col-sm-6">Harga </label>
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

	<div class="col-xl-8 col-md-10 mb-8">
		<div class="card border-left-danger shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="form-group">
							<label for="price" class="col-sm-2 control-label">Status</label>
							<div class="col-sm-10">
								<select class="form-control" name="status">
									<option value="1" selected>Pesanan Sedang di pending</option>
									<option value="2">Pesanan Masih Dalam Proses</option>
									<option value="3">Pesanan Sudah Selesai Silahkan Ambil</option>
									<option value="4">Pesanan Anda Dibatalkan</option>
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
			<a href="<?php echo base_url('PELAPAK/home/listorder'); ?>"><button type="button"
					class='btn btn-default'>Batal</button></a>
			<button type="submit" class='btn btn-primary'>Simpan</button>
		</div>
	</div>
	<?php echo form_close(); ?>

</div>
