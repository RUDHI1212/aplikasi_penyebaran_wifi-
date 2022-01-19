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
                          <a href="#topup<?= $db->id_user?>"  data-toggle="modal"><button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Top up</span></button></a>
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



       
 <!-- Hapus Modal-->
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

            <?php echo form_open('BANK/home/updatetopuppel/'.$db->id_user, ['class' => 'form-horizontal', 'method' => 'post']); ?>
        <div class="modal-body">




  

                                <input type="hidden" class="form-control" name="id_user" value="<?php echo set_value('id_user', $db->id_user); ?>">


                                <select name="Dompet" style="width: 100%;">
                                    <option value="<?php echo $db->Dompet + '0' ?>" selected>------ Pilih Jumlah Topup  ------</option>
                                    <option value="<?php echo $db->Dompet + '5000' ?>">
                                      Rp. <?php echo number_format('5000',0,",",".");?>      
                                    </option>
                                    <option value="<?php echo $db->Dompet + '10000' ?>">
                                      Rp. <?php echo number_format('10000',0,",",".");?>    
                                    </option>
                                    <option value="<?php echo $db->Dompet + '15000' ?>">
                                      Rp. <?php echo number_format('15000',0,",",".");?>
                                    </option>
                                    <option value="<?php echo $db->Dompet + '25000' ?>">
                                      Rp. <?php echo number_format('25000',0,",",".");?>
                                    </option>
                                    <option value="<?php echo $db->Dompet + '50000' ?>">
                                      Rp. <?php echo number_format('50000',0,",",".");?>
                                    </option>
                                    <option value="<?php echo $db->Dompet + '75000' ?>">
                                      Rp. <?php echo number_format('75000',0,",",".");?>
                                    </option>
                                    <option value="<?php echo $db->Dompet + '100000' ?>">
                                      Rp. <?php echo number_format('100000',0,",",".");?>
                                    </option>
                                    <option value="<?php echo $db->Dompet + '500000' ?>">
                                      Rp. <?php echo number_format('500000',0,",",".");?>
                                    </option>
                                    <option value="<?php echo $db->Dompet + '1000000' ?>">
                                      Rp. <?php echo number_format('1000000',0,",",".");?>
                                    </option>
                                </select>
       




        </div>
        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">
            Batal
          </button>
            <button type="submit" class='btn btn-primary'>Simpan</button>
        </div>

      <?php echo form_close(); ?>

      </div>
    </div>
  </div>
<?php }?>