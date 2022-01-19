<section class="section-content bg padding-y-sm">
	<div class="container">
		<h2 class="text-muted text-center">Deskripsi Produk</h2>
		<hr>
		<div class="card">
			<div class="row no-gutters">
				<aside class="col-sm-12 col-md-12 col-lg-5 border-right">
					<article class="gallery-wrap">
						<div class="img-big-wrap">
							<form action="<?php echo base_url('USER/home/tambah/')?>" method="post"
								accept-charset="utf-8">

								<input type="hidden" name="id" value="<?php echo $row->id_produk; ?>" />
								<input type="hidden" name="nama" value="<?php echo $row->nama_produk; ?>" />
								<input type="hidden" name="harga" value="<?php echo $row->harga; ?>" />
								<input type="hidden" name="gambar" value="<?php echo $row->gambar; ?>" />
								<input type="hidden" name="id_user" value="<?php echo $row->id_user; ?>" />

								<div> <a href="<?php echo base_url().'assets/user/images' . $row->gambar?>" data-fancybox="">
									<img style="height: 100%; width: 100%; max-height: 500px;" 
										 src="<?php echo base_url() . 'assets/user/images/'.$row->gambar?>"></a></div>
					</article>
				</aside>
				<aside class="col-sm-12 col-md-12 col-lg-7">
					<article class="p-5">
						<h3 class="title mb-3"><?php echo $row->nama_produk?></h3>

						<div class="mb-3">
							<var class="price h3 text-warning">
								<span class="currency">RP.</span><span
									class="num"><?php echo number_format($row->harga,0,",",".");?></span>
							</var>
							<span>/per pcs</span>
						</div> <!-- price-detail-wrap .// -->
						<dl>
							<dt>Deskripsi</dt>
							<dd>
								<p><?php echo $row->deskripsi?> </p>
							</dd>
						</dl>
						<dl class="row">
							<dt class="col-sm-12">Pelapak : </dt>
							<dd class="col-sm-12"><?php echo $row->name ?></dd>
							<dt class="col-sm-12">Status Makanan : </dt>
							<dd class="col-sm-12"><?php echo $row->status_p ?></dd>
						</dl>
						<hr>
						<div class="row">
							<div class="col-sm">
								<dl class="dlist-inline">
									<dt>Kuantitas : </dt>
									<dd>
										<input type="number" class="form-control" name="qty" min="0">
										<?php echo form_error('qty','<small class="text-danger pl-3">','</small>');?>
									</dd>
								</dl> <!-- item-property .// -->
							</div> <!-- col.// -->
						</div> <!-- row.// -->
						<hr>
						<button type="submit" class="btn btn-primary mt-3"><i class="fas fa-shopping-cart"></i> Tambah Ke Keranjang
						</button>
						<a href="<?php echo base_url()?>USER/home/lapak">
							<button type="button" class="btn btn-dafault mt-3"><i
									class="fas fa-exit"></i> Kembali Ke home </button></a>
					</article> <!-- card-body.// -->
				</aside> <!-- col.// -->
			</div> <!-- row.// -->
		</div> <!-- card.// -->
		</form>
	</div>
</section>
