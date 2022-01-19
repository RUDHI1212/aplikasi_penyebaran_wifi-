    <section class="section-content bg padding-y-sm">
    	<div class="container">
    		<div class="ha-pus" data-hapuss="<?php echo $this->session->flashdata('hapus_sukses'); ?>"> </div>
    		<div class="batalkan" data-batal="<?php echo $this->session->flashdata('batal'); ?>"> </div>
    		<div class="sampai" data-sampe="<?php echo $this->session->flashdata('sampe'); ?>"> </div>
    		<h2 class="text-muted text-center">Info Pesanan</h2>
    		<div>

    			<nav>
    				<div class="nav nav-tabs col-sm col-md" id="nav-tab" role="tablist">
    					<a class="nav-item nav-link active  col-sm col-md text-center" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
    						role="tab" aria-controls="nav-profile" aria-selected="false">Pesanan Pending</a>
    					<a class="nav-item nav-link col-sm col-md text-center" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
    						role="tab" aria-controls="nav-contact" aria-selected="false">Pesanan Dalam Proses</a>
    					<a class="nav-item nav-link col-sm col-md text-center" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
    						aria-controls="nav-home" aria-selected="true">Konfirmasi Pesanan</a>
							<a class="nav-item nav-link col-sm col-md text-center" id="nav-history-tab" data-toggle="tab" href="#nav-history" role="tab"
    						aria-controls="nav-history" aria-selected="true">History</a>
    					<a class="nav-item nav-link col-sm col-md text-center" id="nav-batal-tab" data-toggle="tab" href="#nav-batal" role="tab"
    						aria-controls="nav-batal" aria-selected="false">Pesanan Batal</a>
    				</div>
    			</nav>

    			<div class="tab-content" id="nav-tabContent">
    				<div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
    					aria-labelledby="nav-profile-tab">
    					<div class="card">
    						<div class="card-body table-responsive">
    							<table class="table table-bordered" id="dataTa">
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
    									<h3> Pesanan pending </h3>

    									<?php $no = 1;
										foreach ($data as $da) : ?>
    									<tr>
    										<td><?php echo $no++ ?></td>
    										<td><?php echo $da->produk; ?></td>
    										<td><?php echo $da->qty; ?></td>
    										<td>Rp. <?php echo number_format($da->harga, 0, ",", "."); ?></td>
    										<td><a href="<?php echo base_url('USER/home/hapusdetail/' . $da->id_DO); ?>"
    												class="pesananpending"><button type="button"
    													class="btn btn-outline-danger"> ×
    													Batalkan</button></a></td>
    									</tr>
    									<?php
									endforeach;
									?>
    								</tbody>
    							</table>
    						</div>
    					</div>
    				</div>
    				<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    					<div class="card">
    						<div class="card-body table-responsive">
    							<table class="table table-bordered" id="dataTabl">
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

    									<?php $no = 1;
										foreach ($basisdata as $dd) : ?>
    									<tr>
    										<td><?php echo $no++ ?></td>
    										<td><?php echo $dd->produk; ?></td>
    										<td><?php echo $dd->qty; ?></td>
    										<td>Rp. <?php echo number_format($dd->harga, 0, ",", "."); ?></td>
    									</tr>
    									<?php
									endforeach;
									?>
    								</tbody>
    							</table>
    						</div>
    					</div>
    				</div>
    				<div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    					<div class="card">
    						<div class="card-body table-responsive">
    							<table class="table table-bordered" id="dataTable">
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
    									<h3> Konfirmasi Pesanan </h3>

    									<?php $no = 1;
										foreach ($database as $db) : ?>
    									<tr class="">
    										<td><?php echo $no++ ?></td>
    										<td><?php echo $db->produk; ?></td>
    										<td><?php echo $db->qty; ?></td>
    										<td>Rp. <?php echo number_format($db->harga, 0, ",", "."); ?></td>
    										<td>
                                                <a href="<?php echo base_url('USER/home/hapusdetail/' . $db->id_DO); ?>"class="pesananselesai"><button type="button" class="btn btn-outline-danger col-sm-6"><i class="fas fa-truck-loading"></i> Sudah diterima?</button>
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
					<div class="tab-pane fade" id="nav-history" role="tabpanel" aria-labelledby="nav-history-tab">
    					<div class="card">
    						<div class="card-body table-responsive">
    							<table class="table table-bordered" id="dataTab">
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
										foreach ($history as $h) : ?>
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
    				<div class="tab-pane fade" id="nav-batal" role="tabpanel" aria-labelledby="nav-batal-tab">
    					<div class="card">
    						<div class="card-body table-responsive">
    							<table class="table table-bordered" id="dataTab">
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

    									<?php $no = 1;
										foreach ($basedata as $dq) : ?>
    									<tr>
    										<td><?php echo $no++ ?></td>
    										<td><?php echo $dq->produk; ?></td>
    										<td><?php echo $dq->qty; ?></td>
    										<td>Rp. <?php echo number_format($dq->harga, 0, ",", "."); ?></td>
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
    		</div>
    	</div>
    </section>