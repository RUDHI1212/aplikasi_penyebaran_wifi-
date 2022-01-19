 <div class="container-fluid">
 	<div class="card shadow mb-4">
 		<div class="card-header py-3">
 			<h6 class="m-0 font-weight-bold">History</h6>
 		</div>
 		<div class="card-body">
 			<div class="table-responsive">
 				<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
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
    									<h3> History Shopping </h3>

    									<?php $no = 1;
										foreach ($database as $h) : ?>
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
									endforeach;
									?>
    								</tbody>
 				</table>
 			</div>
 		</div>
 	</div>
 </div>