
        <!-- Begin Page Content -->
        <div class="container-fluid">
<h1> Tambah Data</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold">Tambah Data <?= $tabel ;?></h6>
            </div>
            <div class="card-body">
              <?php echo form_open('ADMIN/home/insert_dataC/', ['method' => 'post']); ?>

              <input type="hidden" class="form-control" name="level" value="<?= $level ;?>">
              <input type="hidden" class="form-control" name="dompet" value="0">
              <input type="hidden" class="form-control" name="role" value="<?= $tabel ;?>">
              <input type="hidden" class="form-control" name="id_user" value="">

                <div class="form-group">
                  <label>Nama :</label>
                  <input type="text" class="form-control" name="nama" placeholder="Nama lengkap anda" value="<?php echo set_value('nama')?>">
                  <?php echo form_error('nama','<small class="text-danger pl-3">','</small>');?>
                </div>

                <div class="form-group">
                  <label>Email :</label>
                  <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email')?>">
                  <?php echo form_error('email','<small class="text-danger pl-3">','</small>');?>
                </div>

                <div class="form-group">
                  <label>Kelas :</label>
                  <input type="text" class="form-control" name="kelas" placeholder="Kelas" value="<?php echo set_value('kelas')?>">
                  <?php echo form_error('kelas','<small class="text-danger pl-3">','</small>');?>
                </div>  

                <div class="form-group">
                  <label>Contact :</label>
                  <input type="number" class="form-control" name="kontak" placeholder="Contact" value="<?php echo set_value('kontak')?>">
                  <?php echo form_error('kontak','<small class="text-danger pl-3">','</small>');?>
                </div>

                <div class="form-group">
                  <label>Username :</label>
                  <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('username')?>">
                  <?php echo form_error('username','<small class="text-danger pl-3">','</small>');?>
                </div>

                <div class="form-group">
                  <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password')?>">
                <?php echo form_error('password','<small class="text-danger pl-3">','</small>');?>
                </div>

                <div class="form-group">
                  <label>Konfirmasi Password</label>
                <input type="password" class="form-control" name="passwordconf" placeholder="Konfirmasi password" value="<?php echo set_value('passwordconf')?>">
                <?php echo form_error('passwordconf','<small class="text-danger pl-3">','</small>');?>
                </div>

                <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>  
              <?php echo form_close(); ?>


            </div>
          </div>
        <!-- /.container-fluid -->





