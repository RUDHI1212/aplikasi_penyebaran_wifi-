<section class="section-content bg padding-y-sm">
	<div class="container">
		<h2 class="text-muted text-center">CheckOut</h2>
		<hr>
		<?php
		$grand_total = 0;
		if ($cart = $this->cart->contents()) {
				foreach ($cart as $item) {
						$grand_total = $grand_total + $item['subtotal'];
					}
				$total = $this->session->userdata('dompet') - $grand_total;

				echo "<h4>Total Belanja: Rp." . number_format($grand_total, 0, ",", ".") . "</h4>";

				foreach ($sess as $row);
				?>
			<form class="form-horizontal" action="<?php echo base_url() ?>USER/home/check_out" method="post" name="frmCO" id="frmCO">
				<div class="row">
					<div class="col-xl-2 col-lg-3"></div>
					<div class="col-xl-8 col-lg-6">
						<div class="card shadow mb-4">
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
								<h6 class="m-0 text-muted">Data Diri</h6>
							</div>

							<input type="text" name="id" class="form-control" value="<?php echo $kodeuni; ?>" hidden>
							<input type="text" name="id_pembeli" class="form-control" value="<?php echo $this->session->userdata('id_user'); ?>" hidden>
							<input type="text" name="id_user" value="<?php echo $this->session->userdata('id_user') ?>" hidden>

							<div class="form-group">
								<label for="id_items" class="control-label col-sm-2">Email :</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" name="email" value="<?php echo $this->session->userdata('email'); ?>" required>
									<?php echo form_error('email','<small class="text-danger pl-3">','</small>');?>
								</div>
							</div>

							<div class="form-group">
								<label for="id_items" class="control-label col-sm-2">Nama :</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="nama" id="nama" value="<?php echo $this->session->userdata('name'); ?>" readonly>
									<?php echo form_error('nama','<small class="text-danger pl-3">','</small>');?>
								</div>
							</div>

							<div class="form-group">
								<label for="id_items" class="control-label col-sm-2">Kelas : </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $this->session->userdata('kelas'); ?>" required>
									<?php echo form_error('alamat','<small class="text-danger pl-3">','</small>');?>
								</div>
							</div>

							<div class="form-group">
								<label for="id_items" class="control-label col-sm-2">No. Telp </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="telp" id="telp" value="<?php echo $this->session->userdata('contact'); ?>">
									<?php echo form_error('telp','<small class="text-danger pl-3">','</small>');?>
								</div>
							</div>



							<input type="hidden" class="form-control" name="id_user" value="<?php echo $this->session->userdata('id_user'); ?>">
							<input type="hidden" class="form-control" name="Dompet" value="<?php echo $total; ?>">
							<a class="form-group  has-success has-feedback"></a>
							<?php if ($row->Dompet < $grand_total) { ?>
								<div class="form-group">
									<div class="btn-form col-sm-12">
										<a href="<?php base_url() ?>/cangon/USER/home/error/" <button class="btn btn-primary"> Proses
											Order</button> </a>
									</div>
								</div>
							<?php } else { ?>
								<div class="form-group">
									<div class="btn-form col-sm-12">
										<button type="submit" class="btn btn-primary">Proses Order</button>
									</div>
								</div>
								<div class="form-group">
									<div class="btn-form col-sm-12">
									</div>
								</div>
							<?php } ?>
			</form>


		</div>
		<div class="col-xl-2 col-lg-3"></div>
		</div>
		</div>
	<?php
} else {
		echo "<h5>Shopping Cart masih kosong</h5>";
	}
?>
	</div>
</section>