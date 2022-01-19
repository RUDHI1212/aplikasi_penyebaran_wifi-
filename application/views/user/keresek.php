<section class="section-content bg padding-y-sm">
	<div class="container">
		<div class="hapus-data" data-hapus="<?php echo $this->session->flashdata('hapus'); ?>"> </div>
		<div class="hapus-semua" data-semua="<?php echo $this->session->flashdata('semua'); ?>"> </div>
		<h2 class="text-muted text-center">Kantong Kresek</h2>
		<hr>
		<?php
		if ($cart = $this->cart->contents()) {
			?>
			<div class="card table-responsive">
				<table class="table table-hover shopping-cart-wrap">
					<thead class="text-muted">
						<tr>
							<th scope="col">Nama Produk</th>
							<th scope="col" width="120">Banyaknya</th>
							<th scope="col" width="120">Harga</th>
							<th scope="col" width="200" class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						// Create form and send all values in "shopping/update_cart" function.
						$grand_total = 0;
						$i = 1;

						foreach ($cart as $item) :
							$grand_total = $grand_total + $item['subtotal'];

							?>
							<form action="<?php echo base_url() ?>USER/home/ubah_cart" method="post">
								<input type="hidden" name="cart[<?php echo $item['id']; ?>][id]" value="<?php echo $item['id']; ?>" />
								<input type="hidden" name="cart[<?php echo $item['id']; ?>][rowid]" value="<?php echo $item['rowid']; ?>" />
								<input type="hidden" name="cart[<?php echo $item['id']; ?>][name]" value="<?php echo $item['name']; ?>" />
								<input type="hidden" name="cart[<?php echo $item['id']; ?>][price]" value="<?php echo $item['price']; ?>" />
								<input type="hidden" name="cart[<?php echo $item['id']; ?>][gambar]" value="<?php echo $item['gambar']; ?>" />
								<input type="hidden" name="cart[<?php echo $item['id']; ?>][qty]" value="<?php echo $item['qty']; ?>" />
								<input type="hidden" name="cart[<?php echo $item['id']; ?>][id_user]" value="<?php echo $item['id_user']; ?>" />
								<input type="hidden" name="cart[<?php echo $item['id']; ?>][id_produk]" value="<?php echo $item['id_produk']; ?>" />
								<tr>
									<td>
										<figure class="media">
											<div class="img-wrap"><img src="<?php echo base_url() . 'assets/user/images/' . $item['gambar']; ?>" class="img-thumbnail img-sm"></div>
											<figcaption class="media-body">
												<h6><?php echo $item['name']; ?></h6>
											</figcaption>
										</figure>
									</td>
									<td>
										<input type="number" class="form-control input-sm" name="cart[<?php echo $item['id']; ?>][qty]" value="<?php echo $item['qty']; ?>"  min="0" />
										<?php echo form_error('cart[<?php echo $item['.'id'.']; ?>][qty]','<small class="text-danger pl-3">','</small>');?>
									</td>
									<td>
										<div class="price-wrap">
											<var class="price"><?php echo number_format($item['subtotal'], 0, ",", ".") ?></var>
											<small class="text-muted">(<?php echo number_format($item['price'], 0, ",", "."); ?>/pcs)</small>
										</div> <!-- price-wrap .// -->
									</td>
									<td class="text-center">
										<a href="<?php echo base_url() ?>USER/home/hapus/<?php echo $item['rowid']; ?>" class="btn btn-outline-danger tombol-hapus "> × Hapus</a>
									</td>
						<?php endforeach; ?>
						</tr>
						<tr>
							<th class="text-muted" ><b>Order Total: Rp <?php echo number_format($grand_total, 0, ",", "."); ?></b></td>
							<td colspan="3"><a href="<?php echo base_url('USER/home/hapus/all') ?>" class="btn btn-sm btn-danger text-light hapussemua mt-2 col-sm-4 col-md-4 col-lg-4">Kosongkan Cart</a>
								<button type="submit" class="btn btn-sm btn-primary mt-2 col-sm-4 col-md-4 col-lg-4">Update Cart</button>
								<a href="<?php echo base_url() ?>USER/home/check_out" class="btn btn-sm btn-warning text-light mt-2 col-sm-3 col-md-3 col-lg-3">Check
									Out</a></td>
						</tr>
					</tbody>
				</table>
						</form>
			<?php
		} else {
			?>

				<article class="card card-product">
					<div class="card-body">
						<article>
							<h1 class="text-warning text-center"><i class="far fa-grin-beam-sweat"></i></h1>
							<h4 class="title text-center"> Kantong kresek anda kosong, silahkan beli produk untuk memasukannya ke
								kantong kresek</h4>
						</article> <!-- col.// -->
					</div> <!-- card-body .// -->
				</article> <!-- product-list.// -->

			<?php
		}
		?>
		</div> <!-- card.// -->
	</div>
	</div>
</section>


<?php foreach ($cart as $item) : ?>
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-md">
			<!-- Modal content-->
			<div class="modal-content">
				<form method="post" action="">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title text">Konfirmasi</h4>
					</div>
					<div class="modal-body">
						Anda yakin mau mengosongkan Shopping Cart?

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Kembali</button>
						<button type="submit" class="btn btn-sm btn-danger">Hapus</button>
					</div>

				</form>
			</div>

		</div>
	</div>
<?php endforeach; ?>