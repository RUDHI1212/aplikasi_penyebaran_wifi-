<section class="container-fluid">
	<div class="panel-heading">
		<h3 class="panel-title text-center text-muted"><i class="fa fa-dashboard"></i> Data Profil</h3>
		<hr>
	</div>
	<!-- Tab panes -->


	<div class="col-xl-8 col-lg-7 center">
		<div class="card shadow mb-4">
			<div class="tab-content">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link active" href="#">Ubah Profil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('USER/home/updatepassword/')?>">Ubah
							Password</a>
					</li>
				</ul>
				<?php echo form_open('USER/home/profil/'); ?>
				<?php foreach ($sess as $row ){ ?>

				<div class="form-group">
					<label for="name" class="control-label col-sm-2">Nama </label>
					<div class="col-sm">
						<input type="text" class="form-control" name="name" value="<?php echo $row->name ; ?>">
						<?php echo form_error('name','<small class="text-danger pl-3">','</small>');?>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="control-label col-sm-2">Email </label>
					<div class="col-sm">
						<input type="text" class="form-control" name="email" value="<?php echo $row->email; ?>">
						<?php echo form_error('email','<small class="text-danger pl-3">','</small>');?>
					</div>
				</div>



				<div class="form-group">
					<label for="kelas" class="control-label col-sm-2">Kelas </label>
					<div class="col-sm">
						<input type="text" class="form-control" name="kelas" value="<?php echo $row->kelas; ?>">
						<?php echo form_error('kelas','<small class="text-danger pl-3">','</small>');?>
					</div>
				</div>



				<div class="form-group">
					<label class="control-label col-sm-2">Contact </label>
					<div class="col-sm">
						<input type="text" class="form-control" name="contact" value="<?php echo $row->contact; ?>">
						<?php echo form_error('contact','<small class="text-danger pl-3">','</small>');?>
					</div>
				</div>
				<?php } ?>

				<div class="form-group">
					<div class="btn-form col-sm-12">
						<button type="submit" class='btn btn-primary'>Ubah Data</button>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>


	</div>

</section>
