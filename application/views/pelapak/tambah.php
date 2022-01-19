<div class="container">
	<div class="panel-heading">
		<h3 class="panel-title"><i class="fa fa-dashboard"></i> Tambah Produk</h3>
	</div>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold">Tambah Produk</h6>
		</div>
		<div class="card-body">

			<?php echo form_open_multipart('PELAPAK/home/tambah', ['class'=>'form-horizontal']) ?>

			<input type="hidden" name="id_produk" class="form-control" value="<?php echo $kodeunik ;?>" readonly>
			<div class="form-group">
				<label for="name" class=" control-label">Nama Produk</label>
				<div class="">
					<input type="text" name="nama_produk" value="<?= set_value('nama_produk') ?>" class="form-control"
						placeholder="Nama Produk">
					<?php echo form_error('nama_produk','<small class="text-danger pl-3">','</small>');?>
				</div>
			</div>

			<div class="form-group">
				<label for="alamat" class=" control-label">Harga</label>
				<div class="">
					<input type="number" class="form-control" name="harga" value="<?= set_value('harga') ?>"
						placeholder="Harga">
					<?php echo form_error('harga','<small class="text-danger pl-3">','</small>');?>
				</div>
			</div>
			<input type="hidden" class="form-control" name="kategori"
				value="<?php echo $this->session->userdata('id_user')?>" required>
			<div class="form-group">
				<label for="alamat" class=" control-label">Gambar</label>
				<div class="">
					<input type="file" name="gambar" required />
				</div>
			</div>

			<div class="form-group">
				<label for="name" class=" control-label">Deskripsi</label>
				<div class="">
					<textarea name="deskripsi" value="<?= set_value('deskripsi') ?>" class="form-control"></textarea>
					<?php echo form_error('deskripsi','<small class="text-danger pl-3">','</small>');?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-offset-2">
					<?php echo form_submit(['value'=>'Submit','class'=>'btn btn-primary']); ?>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
