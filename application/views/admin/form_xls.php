<!--   <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script> -->

<script>
  $(document).ready(function () {
    // Sembunyikan alert validasi kosong
    $("#kosong").hide();
  });

</script>


<!--  <a href="<?php echo base_url("excel/format.xlsx"); ?>">Download Format</a>
  <br>
  <br>
        <!-- Begin Page Content -->
<div class="container-fluid">
  <h3>Import Data Excel</h3>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">

    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold">Form Import</h6>
    </div>
    <div class="card-body">

      <!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
      <form method="post" action="<?php echo base_url("ADMIN/home/form"); ?>" enctype="multipart/form-data">
        <!-- 
    -- Buat sebuah input type file
    -- class pull-left berfungsi agar file input berada di sebelah kiri
    -->
        <input type="file" name="file" class="mt-2">

        <!--
    -- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
    -->
        <input type="submit" name="preview" value="Preview" class="btn btn-primary mt-2">
      <a class="btn btn-primary mt-2 ml-5" href="<?= base_url('excel/Format/Format_IMPORT.xlsx');?>">Download Format</a>
      </form>


      <br>


        <?php 

 if(isset($_POST['preview'])){

  // Jika user menekan tombol Preview pada form 

    if(isset($upload_error)){ // Jika proses upload gagal
      echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
      die; // stop skrip
    }
    
    // Buat sebuah tag form untuk proses import data ke database
    echo "<form method='post' action='".base_url("ADMIN/home/import")."'>";
    

    
    echo "<table cellpadding='8' class='table table-bordered' id='dataTable' width='100%'>

    <thead>
      <tr>
        <th>Role</th>
        <th>Name</th>
        <th>Username</th>
        <th>Password</th>
        <th>Dompet</th>
        <th>Email</th>
        <th>Kelas</th>
        <th>Contact</th>
        <th>Level</th>
      </tr>
    </thead>";
    
 
    $numrow = 1;
    $kosong = 0;
    
    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach($sheet as $row){ 
      // Ambil data pada excel sesuai Kolom
          $role = $row['A']; // Insert data role dari kolom A di excel
          $name = $row['B']; // Insert data nama dari kolom B di excel
          $username = $row['C']; // Insert data username dari kolom C di excel
          $password =$row['D']; // Insert data password dari kolom D di excel
          $Dompet = $row['E']; // Insert data password dari kolom E di excel
          $email = $row['F']; // Insert data password dari kolom F di excel
          $kelas = $row['G']; // Insert data password dari kolom G di excel
          $contact = $row['H']; // Insert data password dari kolom H di excel
          $level = $row['I']; // Insert data password dari kolom I di excel
      
      // Cek jika semua data tidak diisi
      if(empty($role) && empty($name) && empty($username) && empty($password) && empty($Dompet) && empty($email) && empty($kelas) && empty($contact) && empty($level)){
     echo "FIle Excel Null";
        continue;

      }
         // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport

      if($numrow > 1){
        // Validasi apakah semua data telah diisi
        $role_td = ( ! empty($role))? "" : " style='background: #E07171;'"; // Jika role kosong, beri warna merah
        $name_td = ( ! empty($name))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
        $username_td = ( ! empty($username))? "" : " style='background: #E07171;'"; // Jika username, beri warna merah
        $password_td = ( ! empty($password))? "" : " style='background: #E07171;'"; // Jika password kosong, beri warna merah
        $Dompet_td = ( ! empty($Dompet))? "" : " style='background:'"; // Jika Dompet kosong, beri warna merah
        $email_td = ( ! empty($email))? "" : " style='background: #E07171;'"; // Jika email kosong, beri warna merah
        $kelas_td = ( ! empty($kelas))? "" : " style='background: #E07171;'"; // Jika kelas kosong, beri warna merah
        $contact_td = ( ! empty($contact))? "" : " style='background: #E07171;'"; // Jika contact kosong, beri warna merah
        $level_td = ( ! empty($level))? "" : " style='background: #E07171;'"; // Jika level kosong, beri warna merah
        
        // Jika salah satu data ada yang kosong
        if(empty($role) or empty($name) or empty($username) or empty($password) or empty($email) or empty($kelas) or empty($contact) or empty($level)){
              // Buat sebuah div untuk alert validasi kosong
        echo "<div style='color: red;' id='kosong' >
        Semua data belum diisi,  silahkan mengisi data yang belum diisi.
        </div>";
          $kosong++; // Tambah 1 variabel $kosong
        }
        
        echo "<tr>";
        echo "<td".$role_td.">".$role."</td>";
        echo "<td".$name_td.">".$name."</td>";
        echo "<td".$username_td.">".$username."</td>";
        echo "<td".$password_td.">".$password."</td>";
        echo "<td".$Dompet_td.">".$Dompet."</td>";
        echo "<td".$email_td.">".$email."</td>";
        echo "<td".$kelas_td.">".$kelas."</td>";
        echo "<td".$contact_td.">".$contact."</td>";
        echo "<td".$level_td.">".$level."</td>";
        echo "</tr>";
      }
      
      $numrow++; // Tambah 1 setiap kali looping
    }
    
    echo "</table>";
    
    // Cek apakah variabel kosong lebih dari 0
    // Jika lebih dari 0, berarti ada data yang masih kosong
    if($kosong > 0){
    ?>
        <script>
          $(document).ready(function () {
            // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
            $("#jumlah_kosong").html('<?php echo $kosong; ?>');

            $("#kosong").show(); // Munculkan alert validasi kosong
          });

        </script>


        <?php
    }else{ // Jika semua data sudah diisi
      echo "<hr>";
      echo "<div class='text-right'>";
      // Buat sebuah tombol untuk mengimport data ke database
      echo "<a class='btn btn-secondary' href='".base_url("ADMIN/home/")."'>Cancel</a>";
      echo "<button class='btn btn-primary ml-3' type='submit' name='import'>Import</button>";
      echo "</div>";
      echo "<hr>";
    }
    
    echo "</form>";
  }

 ?>

    </div>
  </div>
  <!-- /.container-fluid -->
