 <div class="container-fluid">
 	<div class="card shadow mb-4">
 		<div class="card-header py-3">
 			<h6 class="m-0 font-weight-bold">Pembelian Masuk</h6>
 		</div>
 		<div class="card-body">
 			<div class="table-responsive">
 				<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
 					<thead>
 						<tr>
 							<th>No</th>
 							<th>Nama</th>
 							<th>Kelas</th>
 							<th>Produk</th>
 							<th>Email</th>
 							<th>No.hp</th>
 							<th>Qty</th>
 							<th>Harga</th>
 							<th>Status</th>
 							<th>Action</th>
 						</tr>
 					</thead>
 					<tbody>
 						<?php $no=1; 
										foreach($database as $db) : ?>
 						<tr>
 							<td><?php echo $no++ ?></td>
 							<td><?php echo $db->nama; ?></td>
 							<td><?php echo $db->alamat; ?></td>
 							<td><?php echo $db->produk; ?></td>
 							<td><?php echo $db->email; ?></td>
 							<td><?php echo $db->telp; ?></td>
 							<td><?php echo $db->qty; ?></td>
 							<td>Rp. <?php echo number_format($db->harga,0,",",".");?></td>
 							<td><?php echo $db->status_DO; ?></td>
 							<td class="text-center">
 								<a href="#" data-toggle="modal" data-target="#ubahstatus<?= $db->id_DO;?>"><button
 										type="button" class="btn btn-primary btn-circle btn-sm"><i
 											class="fas fa-edit"></i></button></a>
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
 </div>

 <?php foreach ($database as $db) { ?>
 <div class="modal fade" id="ubahstatus<?= $db->id_DO;?>" tabindex="-1" role="dialog"
 	aria-labelledby="exampleModalLabel" aria-hidden="true">
 	<div class="modal-dialog" role="document">
 		<div class="modal-content">

 			<div class="modal-header">
 				<h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
 				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
 					<span aria-hidden="true">×</span>
 				</button>
 			</div>

 			<?php echo form_open('PELAPAK/home/update_order/'.$db->id_DO, ['class' => 'form-horizontal', 'method' => 'post']); ?>
 			<div class="modal-body">

 				<input type="hidden" class="form-control" name="id_DO" value="<?= $db->id_DO;?>" readonly>

 				<input type="hidden" class="form-control" name="id" value="<?= $db->id;?>" readonly>

 				<input type="hidden" class="form-control" name="produk" value="<?= $db->produk;?>">

 				<input type="hidden" class="form-control" name="qyt" value="<?= $db->qty;?>">

 				<input type="hidden" class="form-control" name="harga" value="<?= $db->harga;?>">


 				<div class="form-group">
 					<label class="col-form-label">Status :</label>

 					<select class="form-control" name="status">
 						<option value="1" selected>Pesanan Sedang di pending</option>
 						<option value="2">Pesanan Masih Dalam Proses</option>
 						<option value="3">Pesanan Sudah Selesai Silahkan Ambil</option>
 						<option value="4">Pesanan Anda Dibatalkan</option>
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
