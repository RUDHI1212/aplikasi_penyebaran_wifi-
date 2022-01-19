<?php
	defined('BASEPATH') OR exit('Akses langsung tidak diperbolehkan');
	//echo validation_errors();
?>
<div class="container" style="margin-top: 80px">
	<section class="container">
		<div class="row">
			<div class="form-input clearfix">
				<div class="col-md-12">

					<div class="panel panel-primary">
						<div class="panel-heading">Edit Data</div>
						<div class="panel-body">

							<?php echo form_open('BANK/home/updatetopup/'.$db->id_user, ['class' => 'form-horizontal', 'method' => 'post']); ?>
							<input type="hidden" class="form-control" name="id_user"
								value="<?php echo set_value('id_user', $db->id_user); ?>">
							<div class="form-group">
								<label for="price" class="col-sm-2 control-label">Top Up</label>
								<div class="col-sm-10">
									<select style="width:200px;height:30px" name="Dompet">
										<option selected>------ Pilih Jumlah Topup ------</option>
										<option value="<?php echo $db->Dompet + '5000' ?>">Rp.
											<?php echo number_format('5000',0,",",".");?></option>
										<option value="<?php echo $db->Dompet + '10000' ?>">Rp.
											<?php echo number_format('10000',0,",",".");?> </option>
										<option value="<?php echo $db->Dompet + '15000' ?>">Rp.
											<?php echo number_format('15000',0,",",".");?></option>
										<option value="<?php echo $db->Dompet + '25000' ?>">Rp.
											<?php echo number_format('25000',0,",",".");?></option>
										<option value="<?php echo $db->Dompet + '50000' ?>">Rp.
											<?php echo number_format('50000',0,",",".");?></option>
										<option value="<?php echo $db->Dompet + '75000' ?>">Rp.
											<?php echo number_format('75000',0,",",".");?></option>
										<option value="<?php echo $db->Dompet + '100000' ?>">Rp.
											<?php echo number_format('100000',0,",",".");?></option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<div class="btn-form col-sm-12">
									<a href="<?php echo base_url('bank/home'); ?>"><button type="button"
											class='btn btn-default'>Batal</button></a>
									<button type="submit" class='btn btn-primary'>Simpan</button>
								</div>
							</div>

							<?php echo form_close(); ?>

						</div>
					</div>
				</div>
			</div>
		</div>
</div>
</div>
</section>
