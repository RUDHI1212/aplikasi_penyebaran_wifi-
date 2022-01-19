 <div class="container-fluid">
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Orderan</h6>
            </div>
            <div class="card-body">
          
						<?php echo form_open('ADMIN/home/updateproduk/'.$db->id_produk, ['method' => 'post']); ?>
							<div class="form-group">
								<label for="id_items" class="control-label col-sm-2">ID Produk</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="id_produk" value="<?php echo set_value('id_produk', $db->id_produk); ?>" readonly>
								</div>
							</div>

							<div class="form-group">
								<label for="name" class="control-label col-sm-2">Nama Produk</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="nama_produk" value="<?php echo set_value('nama_produk', $db->nama_produk); ?>" required>
								</div>
							</div>
                            
                            <div class="form-group">
								<label for="name" class="control-label col-sm-2">Deskripsi</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="deskripsi" value="<?php echo set_value('deskripsi', $db->deskripsi); ?>">
								</div>
							</div>
                            
							<div class="form-group">
								<label for="price" class="control-label col-sm-2">Harga </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="harga" value="<?php echo set_value('harga', $db->harga); ?>" required>
								</div>
							</div>

							<div class="form-group">
								<div class="btn-form col-sm-12">
									<a href="<?php echo base_url('ADMIN/home'); ?>"><button type="button" class='btn btn-default'>Batal</button></a>
									<button type="submit" class='btn btn-primary'>Simpan</button>
								</div>
							</div>
						<?php echo form_close(); ?>

					</div>
				</div>
</div>