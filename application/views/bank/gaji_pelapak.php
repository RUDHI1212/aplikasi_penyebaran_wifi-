        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 ">
              <h6 class="m-0 font-weight-bold">DataTables </h6>

            </div>
            <div class="card-body">
              <div class="table-responsive">




          <table class="table table-bordered table-hover" id="dataTable">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Dompet</th>
                    <!--<th>Status</th>-->
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    
                    foreach($database as $db) : ?>
                      <tr>
                        <td><?php echo $db->name; ?></td>
                        <td><?php echo $db->username; ?></td>
                                                <td>Rp. <?php echo number_format($db->Dompet,0,",",".");?></td>
                                                <!--<td><?php echo $db->status; ?></td>-->
                                                <td>
                          <a href="#topup<?= $db->id_user?>"  data-toggle="modal"><button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Bayar Tagihan</span></button></a>

                        <a href="#ambil<?= $db->id_user?>"  data-toggle="modal"><button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Ambil Tunai</span></button></a>
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

       
 <!--  Modal-->
<?php foreach ($database as $db) { ?>
  <div class="modal fade" id="topup<?= $db->id_user;?>" tabindex="-1" role="dialog" aria-labelledatay="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Top-Up</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

          <?php echo form_open('BANK/home/updategaji/'.$db->id_user, ['class' => 'form-horizontal', 'method' => 'post']); ?>
        <div class="modal-body">

       <input type="hidden" class="form-control" name="id_user" value="<?php echo set_value('id_user', $db->id_user); ?>">

            <div class="form-group">
              <label  class="col-form-label">Dompet Anda :</label>
              <input type="text" class="form-control" name="dompet" value="<?=$db->Dompet;?>" readonly>
            </div>
                        
            <div class="form-group">
              <select name="bayar" style="width: 100%;" onchange="tampil();">
                <option <?php $a= 1*500000;?> value="<?= $a;?>"  class="text-center" selected><----------------- Pilih Pembayaran Lapak -----------------></option>
                <option <?php $a= 1*500000;?> value="<?= $a;?>"  class="text-center"><----------------- Bayar Lapak  01 Bulan -----------------></option>
                <option <?php $a= 2*500000;?> value="<?= $a;?>"  class="text-center"><----------------- Bayar Lapak  02 Bulan -----------------></option>
                <option <?php $a= 3*500000;?> value="<?= $a;?>"  class="text-center"><----------------- Bayar Lapak  03 Bulan -----------------></option>
                <option <?php $a= 4*500000;?> value="<?= $a;?>"  class="text-center"><----------------- Bayar Lapak  04 Bulan -----------------></option>
                <option <?php $a= 5*500000;?> value="<?= $a;?>"  class="text-center"><----------------- Bayar Lapak  05 Bulan -----------------></option>
                <option <?php $a= 6*500000;?> value="<?= $a;?>"  class="text-center"><----------------- Bayar Lapak  06 Bulan -----------------></option>
                <option <?php $a= 7*500000;?> value="<?= $a;?>"  class="text-center"><----------------- Bayar Lapak  07 Bulan -----------------></option>
                <option <?php $a= 8*500000;?> value="<?= $a;?>"  class="text-center"><----------------- Bayar Lapak  08 Bulan -----------------></option>
                <option <?php $a= 9*500000;?> value="<?= $a;?>"  class="text-center"><----------------- Bayar Lapak  09 Bulan -----------------></option>
                <option <?php $a= 10*500000;?> value="<?= $a;?>"  class="text-center"><----------------- Bayar Lapak  10 Bulan -----------------></option>
                <option <?php $a= 11*500000;?> value="<?= $a;?>"  class="text-center"><----------------- Bayar Lapak  11 Bulan -----------------></option>
                <option <?php $a= 12*500000;?> value="<?= $a;?>"  class="text-center"><----------------- Bayar Lapak  12 Bulan -----------------></option>            
              </select>
            </div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">
            Kembali
          </button>
            <button type="submit" class="btn btn-primary" >Bayar</button>
        </div>

       <?php echo form_close(); ?>
      </div>
    </div>
  </div>
<?php }?>









 <!--Cetak Transaksi-->
<?php foreach ($database as $db) { ?>
  <div class="modal fade" id="print<?= $db->id_user;?>" tabindex="-1" role="dialog" aria-labelledatay="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cetak Transaksi</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

    <!--         <?php echo form_open('BANK/home/updategaji/'.$db->id_user, ['class' => 'form-horizontal', 'method' => 'post']); ?> -->
        <div class="modal-body">

       <input type="hidden" class="form-control" name="id_user" value="<?php echo set_value('id_user', $db->id_user); ?>">

       
      <h5>Apakah anda ingin mencetak bukti pengambilan Dompet </h5>


  

                        




        </div>
        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">
            Kembali
          </button>
            <button type="submit" class='btn btn-primary'>Print</button>
        </div>

 <!--      <?php echo form_close(); ?>
 -->
      </div>
    </div>
  </div>
<?php }?>









 <!--  Modal-->
<?php foreach ($database as $db) { ?>
  <div class="modal fade" id="ambil<?= $db->id_user;?>" tabindex="-1" role="dialog" aria-labelledatay="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Top-Up</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

          <?php echo form_open('c_report/lbmt/'.$db->id_user, ['method' => 'post']); ?>
        <div class="modal-body">

       <input type="hidden" class="form-control" name="id_user" value="<?php echo set_value('id_user', $db->id_user); ?>">

            <div class="form-group">
              <label  class="col-form-label">Dompet Anda :</label>
              <input type="text" class="form-control" name="dompet" value="<?=$db->Dompet;?>" readonly>
            </div>

            <div class="form-group">
              <label  class="col-form-label">Nama :</label>
              <input type="text" class="form-control" name="name" value="<?=$db->name;?>" readonly>
            </div>

            <div class="form-group">
              <label  class="col-form-label">Waktu :</label>
              <input type="text" class="form-control" name="waktu" value="<?= date('y-m-d');?>" readonly>
            </div>

            <div class="form-group">
              <label  class="col-form-label">status :</label>
              <input type="text" class="form-control" name="status" value="<?=$db->role;?>" readonly>
            </div>


              <input type="hidden" class="form-control" name="koin" value="0" readonly>


              <input type="hidden" class="form-control" name="id_user" value="<?=$db->id_user;?>" readonly>






        </div>
        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">
            Kembali
          </button>
            <button type="submit" class="btn btn-primary" >Ambil Tunai</button>
        </div>

       <?php echo form_close(); ?>
      </div>
    </div>
  </div>
<?php }?>




