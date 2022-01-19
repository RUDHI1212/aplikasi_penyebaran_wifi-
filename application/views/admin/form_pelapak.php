	<div class="row">
		<div class="form-input clearfix">
			<div class="col-md-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Edit Data</div>
					<div class="panel-body">
						
						<?php echo form_open('ADMIN/home/updatepelapak/'.$db->id_user, ['class' => 'form-horizontal', 'method' => 'post']); ?>
            <input type="hidden" class="form-control" name="id_user" value="<?php echo set_value('id_user', $db->id_user); ?>">
							<div class="form-group">
								<label for="id_items" class="control-label col-sm-2">Nama</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="name" value="<?php echo set_value('name', $db->name); ?>">
								</div>
							</div>

							<div class="form-group">
								<label for="name" class="control-label col-sm-2">Username</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="username" value="<?php echo set_value('username', $db->username); ?>" required>
									
								</div>
							</div>
                            
                            <div class="form-group">
								<label for="name" class="control-label col-sm-2">email</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="email" value="<?php echo set_value('email', $db->email); ?>">
								</div>
							</div>
                            
							<div class="form-group">
								<label for="price" class="control-label col-sm-2">Kontak</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="contact" value="<?php echo set_value('contact', $db->contact); ?>" required>
								</div>
							</div>
                             	<input type="hidden" name="kelas" value="kantin" required>
                                <div class="form-group">
								<div class="btn-form col-sm-12">
									<a href="<?php echo base_url('ADMIN/home/pelapak'); ?>"><button type="button" class='btn btn-default'>Batal</button></a>
									<button type="submit" class='btn btn-primary'>Simpan</button>
								</div>
							</div>
							
						<?php echo form_close(); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>