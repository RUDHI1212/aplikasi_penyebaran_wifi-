<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 ">
			<h6 class="m-0 font-weight-bold text-primary">DataTables Customer</h6>

		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th class="text-center">ID</th>
							<th class="text-center">Name</th>
							<th class="text-center">Email</th>
							<th class="text-center">Kelas</th>
							<th class="text-center">contact</th>
							<th class="text-center">Username</th>
							<th class="text-center">Password</th>
							<th class="text-center">Status</th>
							<th class="text-center">Level</th>
							<th class="text-center">Dompet</th>
						</tr>
					</thead>


					<tbody>
						<?php
                        if( ! empty($users)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                          foreach($users as $data){ // Lakukan looping pada variabel users dari controller
                            echo "<tr>";
                            echo "<td>".$data->id_user."</td>";
                            echo "<td>".$data->name."</td>";
                            echo "<td>".$data->email."</td>";
                            echo "<td>".$data->kelas."</td>";
                            echo "<td>".$data->contact."</td>";
                            echo "<td>".$data->username."</td>";
                            echo "<td>".$data->password."</td>";
                            echo "<td>".$data->role."</td>";
                            echo "<td>".$data->level."</td>";
                            echo "<td>".$data->Dompet."</td>";
                            echo "</tr>";
                          }
                        }else{ // Jika data tidak ada
                          echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
                        }
                        ?>
					</tbody>



				</table>
			</div><br>
			<div class="text-center">
				<a href="<?= base_url();?>ADMIN/home/form">
					<button type="button" class="btn btn-primary btn-sm text-center">
						Import Data Excel
					</button>
				</a>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
