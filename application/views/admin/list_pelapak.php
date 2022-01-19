<div class="suk-ses" data-sukses="<?php echo $this->session->flashdata('sukses');?>"> </div> 
<div class="ga-gal" data-gagal="<?php echo $this->session->flashdata('gagal');?>"> </div> 
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 ">
              <h6 class="m-0 font-weight-bold">DataTables <?= $judultable;?></h6>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th class="text-center">ID</th>
                          <th class="text-center">Name</th>
                          <th class="text-center">Username</th>
                          <th class="text-center">Password</th>
                          <th class="text-center">Kelas</th>
<!--                           <th class="text-center">Dompet</th>
 -->                          <th class="text-center">Email</th>
                          <th class="text-center">contact</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Level</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                        if( ! empty($db)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                          foreach($db as $data){ // Lakukan looping pada variabel db dari controller
                            echo "<tr>";
                            echo "<td>".$data->id_user."</td>";
                            echo "<td>".$data->name."</td>";
                            echo "<td>".$data->username."</td>";
                            echo "<td>".$data->password."</td>";
                            echo "<td>".$data->kelas."</td>";
                            // echo "<td>".$data->Dompet."</td>";
                            echo "<td>".$data->email."</td>";
                            echo "<td>".$data->contact."</td>";
                            echo "<td>".$data->role."</td>";
                            echo "<td>".$data->level."</td>";



                            echo "<td class='text-center'>
                                  <a href='#' data-toggle='modal' data-target='#ubahCS".$data->id_user."'><button type='button' class='btn btn-primary btn-circle btn-sm'><i class='fas fa-edit'></i></button></a>

                                    <a href='#' data-toggle='modal' data-target='#hapusCS".$data->id_user."'><button type='button' class='btn btn-danger btn-circle btn-sm'><i class='fas fa-trash'></i></button></a>
                                  </td>
                            ";


                            echo "</tr>";
                          }
                        }else{ // Jika data tidak ada
                          echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
                        }
                        ?>
                      </tbody>



                </table>
              </div>
            </div>
          </div>
        <!-- /.container-fluid -->









  <!-- Hapus Modal-->
<?php foreach ($db as $data) { ?>
  <div class="modal fade" id="hapusCS<?= $data->id_user;?>" tabindex="-1" role="dialog" aria-labelledatay="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apa benar anda ingin menghapus CUSTOMER?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik hapus untuk menghapus CUSTOMER </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url('ADMIN/home/hapuspelapak/'.$data->id_user); ?>"> Hapus</a>
        </div>
      </div>
    </div>
  </div>
<?php }?>



 <!-- Ubah Modal-->
<?php foreach ($db as $data) { ?>
   <div class="modal fade" id="ubahCS<?= $data->id_user;?>" tabindex="-1" role="dialog" aria-labelledatay="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <?php echo form_open('ADMIN/home/updatepelapak/'.$data->id_user, ['method' => 'post']); ?>
        <div class="modal-body">


           <div class="form-group">
              <label  class="col-form-label">ID :</label>
              <input type="text" class="form-control" name="id_user" value="<?= $data->id_user;?>"  readonly>
            </div>   


            <div class="form-group">
              <label  class="col-form-label">Nama :</label>
              <input type="text" class="form-control" name="name" value="<?= $data->name;?>" >
            </div>

            <input type="hidden" class="form-control" name="username" value="<?= $data->username;?>" readonly>

              <input type="hidden" class="form-control" name="password" value="<?= $data->password;?>">

            <div class="form-group">
              <label  class="col-form-label">Kelas :</label>
              <input type="text" class="form-control" name="kelas" value="<?= $data->kelas;?>">
            </div>   

            
              <input type="hidden" class="form-control" name="dompet" value="<?= $data->Dompet;?>" readonly>

            <div class="form-group">
              <label  class="col-form-label">Email :</label>
              <input type="text" class="form-control" name="email" value="<?= $data->email;?>">
            </div> 

            <div class="form-group">
              <label  class="col-form-label">Kontak :</label>
              <input type="text" class="form-control" name="contact" value="<?= $data->contact;?>">
            </div>                       

              <input type="hidden" class="form-control" name="rule" value="<?= $data->role;?>" >

              <input type="hidden" class="form-control" name="level" value="<?= $data->level;?>" >


        </div>

          <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
      <?php echo form_close(); ?>

      </div>
    </div>
  </div>
<?php  }?>



