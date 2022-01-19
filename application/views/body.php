<section class="section-content bg padding-y-sm">
	<div class="container">
		<div class="log-out" data-logout="<?php echo $this->session->flashdata('logout'); ?>"> </div>
		<div class="row">
			<div class="col-lg-3">
			<div class="list-group">
					<a class="list-group-item text-center bg-warning text-dark">
						Wilayah
					</a>
					<a href="<?php echo base_url()?>auth/lapak/" class="list-group-item text-dark">Semua</a>
					<?php
					foreach ($kategori as $row)
					{
						?>
					<a href="<?php echo base_url()?>auth/lapak/<?php echo $row['id_user'];?>"
						class="list-group-item text-dark"><?php echo $row['name'];?></a>
					<?php
					}
					?>
				</div><br>

				<div class="list-group">
					<a href="#" class="list-group-item text-center bg-warning text-dark" onclick="
						Swal.fire({position: 'top',
						type: 'warning',
						title: 'Gagal',
						text: 'Silahkan login untuk melanjutkan transaksi'})">
					
					</a>
					<?php

					$cart = $this->cart->contents();

					if (empty($cart)) {
						?>
					
					<?php
				} else {
					$grand_total = 0;
					foreach ($cart as $item) {
						$grand_total += $item['subtotal'];
						?>
							<a class="list-group-item"><?php echo $item['name']; ?> (<?php echo $item['qty']; ?> x
								<?php echo number_format($item['price'], 0, ",", "."); ?>)=<?php echo number_format($item['subtotal'], 0, ",", "."); ?></a>
						<?php
					}
					?>

					<?php
				}
				?>
				</div>
			</div>

			<div class="col-lg-9">
				<div class="align-items-center justify-content-between mb-4">
					<h1 class="h2 mb-0 text-gray-800 text-center text-dark">Peta Sebaran Wilayah</h1>
					<hr class="dropdown-divider">
				</div>
				<div class="row">
					<?php
					foreach ($produk as $row) {
						if ($row['status'] == 1) {
							?>
						
							<a href="<?php echo base_url('auth/deskripsi/' . $row['id_produk']); ?>" class="title">
								<div class="col-md-3 col-sm-6">
									<figure class="card card-product">
										<div class="img-wrap"> <img height="100%" src="<?php echo base_url() . 'assets/user/images/' . $row['gambar']; ?>"></div>
										<figcaption class="info-wrap">
											<?php echo $row['nama_produk']; ?>
											<div class="action-wrap">
												<a href="#" class="btn btn-primary btn-sm float-right" onclick="
														Swal.fire({position: 'top',
														type: 'warning',
														title: 'Gagal',
														text: 'Silahkan login untuk melanjutkan transaksi'})">
													Beli </a>
												<div class="price-wrap">
													<span class="price-new">data
														<?php echo number_format($row['harga'], 0, ",", "."); ?></span>
												</div> <!-- price-wrap.// -->
											</div>
										</figcaption>
									</figure> <!-- card // -->
									</a>
								</div> <!-- col // -->
							
						<?php
					}
				}
				?>
				</div>

			</div>


		</div><!-- container // -->