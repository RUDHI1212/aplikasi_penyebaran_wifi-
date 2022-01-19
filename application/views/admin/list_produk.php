<div class="suk-ses" data-sukses="<?php echo $this->session->flashdata('sukses');?>"> </div> 
<div class="ga-gal" data-gagal="<?php echo $this->session->flashdata('gagal');?>"> </div> 
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold">DataTables Produk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID Produk</th>
                    <th>Produk</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    
                    foreach($database as $db) : ?>
                      <tr>
                        <td><?php echo $db->id_produk; ?></td>
                        <td><?php echo $db->nama_produk; ?></td>
                        <td><?php echo $db->deskripsi; ?></td>
                        <td>Rp. <?php echo number_format($db->harga,0,",",".");?></td>  

                          <td class="text-center">
                          <a href="#" data-toggle="modal" data-target="#ubahPr<?= $db->id_produk;?>"><button type="button" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></button></a>
                          <a href="#" data-toggle="modal" data-target="#hapusPr<?= $db->id_produk;?>"><button type="button" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button></a>
                        </td>
                      </tr>
                  <?php
                    
                    endforeach;
                  ?>
                </tbody>
                </table>
              </div>
            </div>
          </div>
        <!-- /.container-fluid -->


<!-- Kumpulan Modals -->

  <!-- Hapus Modal-->
  <?php foreach ($database as $db) { ?>
  <div class="modal fade" id="hapusPr<?= $db->id_produk;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apa benar anda ingin menghapus PRODUK ini?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik hapus untuk menghapus PRODUK</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url('ADMIN/home/hapusproduk/'.$db->id_produk); ?>">Hapus</a>
        </div>
      </div>
    </div>
  </div>
<?php }?>


  <!-- Ubah Modal-->
<?php foreach ($database as $db) { ?>
   <div class="modal fade" id="ubahPr<?= $db->id_produk;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <?php echo form_open('ADMIN/home/updateproduk/'.$db->id_produk, ['method' => 'post']); ?>
        <div class="modal-body">

            <div class="form-group">
              <label  class="col-form-label">ID Produk :</label>
              <input type="text" class="form-control" name="id_produk" value="<?= $db->id_produk;?>" readonly>
            </div>

            <div class="form-group">
              <label  class="col-form-label">Nama Produk :</label>
              <input type="text" class="form-control" name="nama_produk" value="<?= $db->nama_produk;?>">
            </div>

            <div class="form-group">
              <label  class="col-form-label">Deskripsi :</label>
              <input type="text" class="form-control" name="deskripsi" value="<?= $db->deskripsi;?>">
            </div> 

            <div class="form-group">
              <label  class="col-form-label">Harga :</label>
              <input type="text" class="form-control" name="harga" value="<?= $db->harga;?>">
            </div>                       

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








