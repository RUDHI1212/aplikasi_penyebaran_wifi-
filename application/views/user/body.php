<section class="section-content bg padding-y-sm">
	<div class="container">
	<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('beli');?>"> </div> 
	<div class="suk-ses" data-sukses="<?php echo $this->session->flashdata('sukses');?>"> </div> 
	<div class="pro-fil" data-profil="<?php echo $this->session->flashdata('profil');?>"> </div> 
	<div class="belan-ja" data-belanja="<?php echo $this->session->flashdata('Belanja');?>"> </div> 
		<div class="row">
			<div class="col-lg-3">
				<div class="list-group">
					<a class="list-group-item text-center bg-warning text-dark">
						List Wilayah
					</a>
					<a href="<?php echo base_url()?>USER/home/lapak/" class="list-group-item text-dark">Semua</a>
					<?php
					foreach ($kategori as $row)
					{
						?>
					<a href="<?php echo base_url()?>USER/home/lapak/<?php echo $row['id_user'];?>"
						class="list-group-item text-dark"><?php echo $row['name'];?></a>
					<?php
					}
					?>
				</div><br>

				<div class="list-group">
					<a href="<?php echo base_url()?>USER/home/keresek"
						class="list-group-item text-center bg-warning text-dark">
						
					</a>
					<?php

					$cart= $this->cart->contents();

					if(empty($cart)) {
						?>
					
					<?php
					}
					else
					{
						$grand_total = 0;
						foreach ($cart as $item)
						{
							$grand_total+=$item['subtotal'];
							?>
					<a class="list-group-item"><?php echo $item['name']; ?> (<?php echo $item['qty']; ?> x
						<?php echo number_format($item['price'],0,",","."); ?>)=<?php echo number_format($item['subtotal'],0,",","."); ?></a>
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
						if ($row['status'] == 1){ ;
							?>
					<div class="col-md-3 col-sm-6">
						<form method="post" action="<?php echo base_url();?>USER/home/tambah" method="post"
							accept-charset="utf-8">
							<a href="<?php echo base_url('USER/home/deskripsi/'.$row['id_produk']);?>">
								<figure class="card card-product">
									<div class="img-wrap"> <img style="width: 100%; height: 100%;"
											src="<?php echo base_url() . 'assets/user/images/'.$row['gambar']; ?>">
									</div>
									<figcaption class="info-wrap">
										<a
											class="title text-dark font-weight-bold"><?php echo $row['nama_produk'];?></a>
										<div class="action-wrap">
											<input type="hidden" name="id" value="<?php echo $row['id_produk']; ?>" />
											<input type="hidden" name="nama"
												value="<?php echo $row['nama_produk']; ?>" />
											<input type="hidden" name="harga" value="<?php echo $row['harga']; ?>" />
											<input type="hidden" name="gambar" value="<?php echo $row['gambar']; ?>" />
											<input type="hidden" name="id_user"
												value="<?php echo $row['id_user']; ?>" />
											<input type="hidden" name="qty" value="1" />
											<button type="submit" class="btn btn-sm btn-primary float-right" id=><i
													class="fas fa-shopping-cart"></i> Beli</button>
											
											<br>
											<a href="<?php echo site_url('user/home/form_input') ?>">Detail</a>
										
	
											<br>
											<br>
													<div class="price-wrap">
												<span class="price-new">Rp.
													<?php echo number_format($row['harga'],0,",",".");?></span>
											</div> <!-- price-wrap.// -->
										</div>
									</figcaption>
								</figure> <!-- card // -->
							</a>
						</form>
					</div> <!-- col // -->
					<?php
					}
					}
					?>
				</div>

			</div>


		</div><!-- container // -->
