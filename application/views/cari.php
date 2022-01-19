<section class="section-content bg padding-y-sm">
	<div class="container">
		<?php echo "<h6> Menampilkan hasil pencarian <span class='text-warning font-weight-bold'>".$this->input->post('cari')."</span> di kategori <span class='text-warning font-weight-bold'>".$this->input->post('kategori')."</span></h6>";
if($jumlah < '1'){
?>
		<article class="card card-product">
			<div class="card-body">
				<article>
					<h1 class="text-warning text-center"><i class="far fa-tired"></i></h1>
					<h4 class="title text-center"> Maaf tapi <?php echo $this->input->post('cari')?> tidak ada di
						database kami</h4>
				</article> <!-- col.// -->
			</div> <!-- card-body .// -->
		</article> <!-- product-list.// -->
		<?php
}
else{
?>
		<?php foreach($produk as $row) { ?>
		<article class="card card-product">
			<div class="card-body">
				<div class="row">
					<aside class="col-sm-3">
						<div class="img-wrap"><img src="<?php echo base_url() . 'assets/user/images/'.$row->gambar; ?>">
						</div>
					</aside> <!-- col.// -->
					<article class="col-sm-6">

						<h4 class="title"> <?php echo $row->nama_produk;?></h4>
						<hr>
						<p> <?php echo $row->deskripsi?> </p>
						<dl class="dlist-align">
							<dt>Pelapak</dt>
							<dd><?php echo $row->name?></dd>
						</dl> <!-- item-property-hor .// -->

						<dl class="dlist-align">
							<dt>Status</dt>
							<dd><?php echo $row->status_p?></dd>
						</dl> <!-- item-property-hor .// -->
						<dl class="dlist-align">
							<dt>qty</dt>
							<dd class="col-sm-3"><input type="number" class="form-control" name="qty" required></dd>
						</dl> <!-- item-property-hor .// -->


					</article> <!-- col.// -->
					<aside class="col-sm-3 border-left">
						<div class="action-wrap">
							<div class="price-wrap h4">
								<span class="price">Rp. <?php echo number_format($row->harga,0,",",".");?></span>

							</div> <!-- info-price-detail // -->

							<br>
							<p>
								<a href="#" class="btn btn-primary" onclick="
											Swal.fire({position: 'top',
											type: 'warning',
											title: 'Gagal',
											text: 'Silahkan login untuk melanjutkan transaksi'})"> Tambah Ke Keranjang </a>
								<a href="<?php echo base_url('auth/deskripsi/'.$row->id_produk)?>"
									class="btn btn-secondary"> Deskripsi </a>
							</p>
						</div> <!-- action-wrap.// -->
					</aside> <!-- col.// -->
				</div> <!-- row.// -->
			</div> <!-- card-body .// -->
		</article> <!-- product-list.// -->
		<?php } } ?>
	</div>
</section>
