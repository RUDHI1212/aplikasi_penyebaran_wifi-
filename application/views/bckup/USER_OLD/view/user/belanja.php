    <h2>Info Pesanan</h2>        
<div>
    <div class="panel panel-primary" style="border: 0px">
                    <div class="panel-body">

            <div class="tab">
                <font color="white">
                <button class="tablinks" onclick="openCity(event, 'London')">Pesanan Selesai</button>
                <button class="tablinks" onclick="openCity(event, 'Paris')">Pesanan Pending</button>
                <button class="tablinks" onclick="openCity(event, 'Tokyo')">Pesanan Dalam Proses</button>
                <button class="tablinks" onclick="openCity(event, 'Cimindi')">Pesanan yang batal</button>
                </font>
            </div>

            <div id="London" class="tabcontent">
 <table class="table table-bordered table-hover" id="seblak">
        <thead>
            <tr>
                <th>No <span class="glyphicon glyphicon-sort-by-attributes"></span></th>
                <th>Produk</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Apakah Barang sudah sampai?</th>
            </tr>
        </thead>
        <tbody>
            <h3> Pesanan selesai </h3>
                                    
            <?php $no=1;
                foreach($database as $db) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $db->produk; ?></td>
                <td><?php echo $db->qty; ?></td>
                <td>Rp. <?php echo number_format($db->harga,0,",",".");?></td>
                <td><a href="<?php echo base_url('index.php/home/hapusdetail/'.$db->id_DO); ?>" onclick="return confirm('Anda yakin hapus ?')"><button type="button" class="btn btn-success btn-s"><span class="glyphicon glyphicon-check"> ya</span></button></a></td>
            </tr>
            <?php   
                endforeach;
            ?>
        </tbody>
    </table>
           </div>

            <div id="Paris" class="tabcontent">
 <table class="table table-bordered table-hover" id="sebl">
     <thead>
     <tr>
         <th>No <span class="glyphicon glyphicon-sort-by-attributes"></span></th>
         <th>Produk</th>
         <th>Qty</th>
         <th>Harga</th>
         <th>Apakah Ingin Dibatalkan?</th>
     </tr>
     </thead>
     <tbody>
     <h3> Pesanan pending </h3>

     <?php $no=1;
     foreach($data as $da) : ?>
         <tr>
             <td><?php echo $no++ ?></td>
             <td><?php echo $da->produk; ?></td>
             <td><?php echo $da->qty; ?></td>
             <td>Rp. <?php echo number_format($da->harga,0,",",".");?></td>
             <td><a href="<?php echo base_url('index.php/home/hapusdetail/'.$da->id_DO); ?>" onclick="return confirm('Anda yakin hapus ?')"><button type="button" class="btn btn-danger btn-s"><span class="glyphicon glyphicon-log-out"> ya</span></button></a></td>
         </tr>
     <?php
     endforeach;
     ?>
     </tbody>
 </table>
            </div>

            <div id="Tokyo" class="tabcontent">
<table class="table table-bordered table-hover" id="sebla">
                                <thead>
                                    <tr>
                                        <th>No <span class="glyphicon glyphicon-sort-by-attributes"></span></th>
                                        <th>Produk</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <h3> Pesanan yang masih di proses </h3>
                                    
                                    <?php $no=1;
                                        foreach($basisdata as $dd) : ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $dd->produk; ?></td>
                                                <td><?php echo $dd->qty; ?></td>
                                                <td>Rp. <?php echo number_format($dd->harga,0,",",".");?></td>
                                            </tr>
                                    <?php   
                                        endforeach;
                                    ?>
                                </tbody>
        </table>
            </div> 

         <div id="Cimindi" class="tabcontent">
<table class="table table-bordered table-hover" id="seb">
     <thead>
     <tr>
         <th>No <span class="glyphicon glyphicon-sort-by-attributes"></span></th>
         <th>Produk</th>
         <th>Qty</th>
         <th>Harga</th>
     </tr>
     </thead>
     <tbody>
     <h3> Pesanan dibatalkan </h3>

     <?php $no=1;
     foreach($basedata as $dq) : ?>
         <tr>
             <td><?php echo $no++ ?></td>
             <td><?php echo $dq->produk; ?></td>
             <td><?php echo $dq->qty; ?></td>
             <td>Rp. <?php echo number_format($dq->harga,0,",",".");?></td>
         </tr>
     <?php
     endforeach;
     ?>
     </tbody>
 </table>
        </div>
</div>
</div>
</div>