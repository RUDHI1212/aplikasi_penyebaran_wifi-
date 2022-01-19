<section class="container-fluid">
	<div class="row">
		<div class="form-input clearfix">
			<div class="col-md-12">
				<h2>Data Profil</h2>
				<div class="panel panel-primary" style="border: 0px">
					<div class="panel-body">
						<!-- <form action="<?php //echo base_url('home/tambahmobil'); ?>" method="post" class="form-horizontal"> -->

					<?php echo form_open('USER/home/updateprofile/'.$this->session->userdata('id_user'), ['class' => 'form-horizontal', 'method' => 'post']); ?>
							<input type="hidden" class="form-control" name="id_user" value="<?php echo $this->session->userdata('id_user'); ?>" required>
							<input type="hidden" class="form-control" name="level" value="<?php echo $this
                                ->session->userdata('Level'); ?>" required>
<?php foreach ($sess as $row ){ ?> 
							<div class="form-group">
								<label for="id_items" class="control-label col-sm-2">Nama </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="name" value="<?php echo $this->session->userdata('name'); ?>" required>
								</div>
							</div>

							<div class="form-group">
								<label for="name" class="control-label col-sm-2">Email </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="email" value="<?php echo $this->session->userdata('email'); ?>" required>
									
								</div>
							</div>
                            
                            <div class="form-group">
								<label for="name" class="control-label col-sm-2">Kelas </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="kelas" value="<?php echo $this->session->userdata('kelas'); ?>">
									
								</div>
							</div>
                            
							<div class="form-group">
								<label for="price" class="control-label col-sm-2">Contact </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="contact" value="<?php echo $this->session->userdata('contact'); ?>">
								</div>
							</div>

							<div class="form-group">
								<label for="price" class="control-label col-sm-2">Username </label>
								<div class="col-sm-10">
									<input type="number" class="form-control" name="username" value="<?php echo $this->session->userdata('username'); ?>" readonly>
								</div>
							</div>

							<div class="form-group">
								<label for="price" class="control-label col-sm-2">Password </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="password" value="<?php echo $this->session->userdata('password'); ?>" required>
								</div>
							</div>

<?php } ?>
							<div class="form-group">
								<div class="btn-form col-sm-12 text-right">
									<button type="submit" class='btn btn-primary' style="background-color: #800000;border-color: #800000">Ubah Data</button>
								</div>
							</div>
						<?php echo form_close(); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>