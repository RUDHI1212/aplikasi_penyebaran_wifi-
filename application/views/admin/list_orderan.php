        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold">DataTables Orderan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">


                 <thead>
                 <tr>
                        <th>No <span class="glyphicon glyphicon-sort-by-attributes"></span></th>
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Harga</th>
                      <th>Action</th>
                      </tr>
                </thead>

                <tbody>
                  <?php $no=1; 
                    foreach($database as $h) : ?>
                      <tr>
                       <td><?php echo $no++ ?></td>
                        <td><?php echo $h->produk; ?></td>
                        <td><?php echo $h->qty; ?></td>
                        <td>Rp. <?php echo number_format($h->harga, 0, ",", "."); ?></td>
                      <td><a class="" href="<?= base_url('c_report/struk/'.$h->id_DO)?>">
                                                    <button class="btn btn-outline-warning col-sm-6"><i class="fas fa-file-pdf warning"></i> Cetak</button>
                                                </a>
                      </td>
                      </tr>
                  <?php
                    
                    endforeach ;
                  ?>
                </tbody>




                </table>
              </div>
            </div>
          </div>
        <!-- /.container-fluid -->


<!-- Kumpulan Modals -->

  <!-- Hapus Modal-->
  <div class="modal fade" id="hapusmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apa benar anda ingin logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik logout untuk keluar dari sesi anda </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url('ADMIN/home/hapusproduk/'.$db->id_produk); ?>">Hapus</a>
        </div>
      </div>
    </div>
  </div>











