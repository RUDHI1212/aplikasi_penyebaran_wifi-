<div class="container-fluid">
	<div class="panel-heading">
		<h3 class="panel-title"><i class="fa fa-dashboard"></i> List Produk</h3>
	</div>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold">List Produk</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>ID Produk</th>
							<th>Produk</th>
							<th>Deskripsi</th>
							<th>Harga</th>
							<!--<th>Status</th>-->
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
										
										foreach($database as $db) : ?>
						<tr>
							<td><?php echo $db->id_produk; ?></td>
							<td><?php echo $db->nama_produk; ?></td>
							<td><?php echo $db->deskripsi; ?></td>
							<td>Rp. <?php echo number_format($db->harga,0,",",".");?></td>
							<!--<td><?php echo $db->status; ?></td>-->
							<td class="text-center">
								<a href="#" data-toggle="modal" data-target="#ubahPr<?= $db->id_produk;?>"><button
										type="button" class="btn btn-primary btn-circle btn-sm"><i
											class="fas fa-edit"></i></button></a>
								<button type="button" class="btn btn-danger btn-sm btn-circle" data-toggle="modal"
									data-target="#hapusModal"><i class="fas fa-trash"></i></button></a>
							</td>
						</tr>
						<?php
										
										endforeach;
									?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Beneran nih mau dihapus?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Ketika kamu hapus maka datanya akan hilang</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary"
						href="<?php echo base_url('PELAPAK/home/hapusdata/'.$db->id_produk); ?>">Hapus</a>
				</div>
			</div>
		</div>
	</div>


	<?php foreach ($database as $db) { ?>
	<div class="modal fade" id="ubahPr<?= $db->id_produk;?>" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>

				<?php echo form_open('PELAPAK/home/updateproduk/'.$db->id_produk, ['method' => 'post']); ?>
				<div class="modal-body">

					<input type="hidden" class="form-control" name="id_produk" value="<?= $db->id_produk;?>" readonly>
					<input type="hidden" class="form-control" name="nama_produk" value="<?= $db->nama_produk;?>">
					<input type="hidden" class="form-control" name="deskripsi" value="<?= $db->deskripsi;?>">
					<input type="hidden" class="form-control" name="harga" value="<?= $db->harga;?>">
					<div class="form-group">
						<label class="col-form-label">Stok :</label>
						<select class="form-control" name="status">
							<option value="1" selected>Ada</option>
							<option value="2">Habis</option>
						</select>
					</div>
				</div>

				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<button class="btn btn-primary" type="submit">Simpan</button>
				</div>
				<?php echo form_close(); ?>

			</div>
		</div>
	</div>
	<?php  }?>
