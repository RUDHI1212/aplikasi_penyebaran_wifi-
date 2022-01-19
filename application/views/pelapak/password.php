<section class="container-fluid">
	<div class="panel-heading">
		<div class="ga-gal" data-gagal="<?php echo $this->session->flashdata('gagal');?>"> </div>
		<h3 class="panel-title text-center text-muted"><i class="fa fa-dashboard"></i> Data Profil</h3>
		<hr>
	</div>

	<!-- Tab panes -->


	<div class="col-sm col-md col-lg ">
		<div class="card shadow mb-4">
			<div class="tab-content">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('PELAPAK/home/profil/')?>">Ubah
							Profil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="#">Ubah Password</a>
					</li>
				</ul>
				<?php echo form_open('PELAPAK/home/updatepassword/')?>
				<?php foreach ($sess as $row ){ ?>
				<div class="form-group">
					<label for="current_password" class="control-label col-sm">Password Saat ini</label>
					<div class="col-sm">
						<input type="password" class="form-control" id="current_password" name="current_password">
						<?php echo form_error('current_password','<small class="text-danger pl-3">','</small>');?>
					</div>
				</div>
				<div class="form-group">
					<label for="newpassword1" class="control-label col-sm">Password baru</label>
					<div class="col-sm">
						<input type="password" class="form-control" id="newpassword1" name="newpassword1">
						<?php echo form_error('newpassword1','<small class="text-danger pl-3">','</small>');?>
					</div>
				</div>

				<div class="form-group">
					<label for="new_password2" class="control-label col-sm">Ulangi password</label>
					<div class="col-sm">
						<input type="password" class="form-control" id="newpassword2" name="newpassword2">
						<?php echo form_error('newpassword2','<small class="text-danger pl-3">','</small>');?>
					</div>
				</div>

				<?php } ?>
				<div class="form-group">
					<div class="btn-form col-sm-12">
						<button type="submit" class='btn btn-primary'
							onclick="return confirm('Anda yakin? Jika anda mengubah password maka anda harus login ulang');">Ubah
							Data</button>
					</div>
				</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</section>
