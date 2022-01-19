<?php
class home extends CI_Controller{

  private $filename = "import_data";

function __construct(){
  parent::__construct();
  
    if($this->session->userdata('Level')!="1"){
      $this->session->set_flashdata('logout', 'Anda dialihkan ke halaman logout');
    redirect('login/login');
  }

  $this->load->model('admin/m_admin');
  $this->load->model('validasi');


}

public function index()
{
  $data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
  $data['database'] = $this->m_admin->get_all_data();
  $data['data']=$this->m_admin->report_line();
  $data['da'] = $this->m_admin->report_bar();
  $data['title'] = "Admin";
  $data['jumlahbmt'] = $this->m_admin->jumlahbmt();
  $data['jumlahcustomer'] = $this->m_admin->jumlahcs();
  $data['jumlahpelapak'] = $this->m_admin->jumlahpl();
  $data['jumlahproduk'] = $this->m_admin->jumlahpr();
  $this->load->view('admin/header', $data);
  $this->load->view('admin/dashboard', $data);
  $this->load->view('admin/footer');

}       


public function produk()
{
  $data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
  $data['database'] = $this->m_admin->get_all_data();
  $data['title'] = "Admin";

  $this->load->view('admin/header', $data);
  $this->load->view('admin/list_produk', $data);
  $this->load->view('admin/footer');

}

public function order(){
          $data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
          $data['database'] = $this->m_admin->orderin();
          $data['title'] = "Admin";    
            $this->load->view('admin/header', $data);
            $this->load->view('admin/list_orderan', $data);
            $this->load->view('admin/footer');
    }


public function pelapak(){
          $data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
          $data['db'] = $this->m_admin->pelapak();
          $data['judultable'] = 'Pelapak';
          $data['title'] = "Admin";
            $this->load->view('admin/header', $data);
            $this->load->view('admin/list_pelapak', $data);
            $this->load->view('admin/footer');
  }


  public function customer(){
          $data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
          $data['db'] = $this->m_admin->customer();
          $data['judultable'] = 'Customer';
          $data['title'] = "Admin";
            $this->load->view('admin/header', $data);
            $this->load->view('admin/list_customer', $data);
            $this->load->view('admin/footer');

  }      

  public function bmt(){
          $data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
          $data['db'] = $this->m_admin->bank();
          $data['judultable'] = 'BMT';
          $data['title'] = "Admin";
            $this->load->view('admin/header', $data);
            $this->load->view('admin/list_bmt', $data);
            $this->load->view('admin/footer');

  }   


        public function profil(){
          $data['database'] = $this->m_admin->get_all_data();
          $data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
            $data['title'] = "Pelapak";
            $this->form_validation->set_rules('name', 'name','trim|required');
            $this->form_validation->set_rules('email', 'email','trim|required|valid_email');
            $this->form_validation->set_rules('kelas', 'kelas','trim|required');
            $this->form_validation->set_rules('contact', 'contact','trim|required');
        
            if ($this->form_validation->run() == false){
              $this->load->view('ADMIN/header', $data);
              $this->load->view('ADMIN/profil', $data);
              $this->load->view('ADMIN/footer');
            }
            else{
              $this->load->model('ADMIN/m_akun_admin');
              $this->m_akun_admin->update_profile();
              $this->session->set_flashdata('profil', 'Profil berhasil diubah');
        
            redirect('ADMIN/home');
            }
        }

public function updatepassword()
	{
    $data['database'] = $this->m_admin->get_all_data();
    $data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
    $data['title'] = "Pelapak";
		$this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('newpassword1','password baru','required|trim|min_length[3]|matches[newpassword2]');
		$this->form_validation->set_rules('newpassword2','ulangi password','required|trim|min_length[3]|matches[newpassword1]');

		if ($this->form_validation->run() == false){
			$this->load->view('ADMIN/header', $data);
			$this->load->view('ADMIN/password', $data);
			$this->load->view('ADMIN/footer');
		}
		else{
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('newpassword1');
			$password = $this->session->userdata('password');

			if($password != $current_password){
				$this->session->set_flashdata('gagal', 'Password tidak sama dengan password sebelumnya');
				redirect('ADMIN/home/updatepassword');
			}
			else{
				if($new_password == $current_password){
					$this->session->set_flashdata('gagal', 'Password baru tidak boleh sama dengan yang sebelumnya');
					redirect('ADMIN/home/updatepassword');
				}
				else{
					$this->load->model('ADMIN/m_akun_admin');
		$this->m_akun_admin->update_password();
		$this->session->set_flashdata('profil', 'password berhasil diubah,silahkan login kembali untuk melanjutkan');
		redirect('login/logout');
				}
			}
		}
	}


  public function updateproduk($id){        
    $this->m_admin->update_produk();
    $this->session->set_flashdata('profil', 'Data produk berhasil diubah');
    redirect('ADMIN/home/produk');
}


public function hapusproduk($id)
{
  $this->m_admin->hapus_produk($id);
  $this->session->set_flashdata('profil', 'Data produk berhasi di hapus');
  redirect('ADMIN/home/produk');
}


public function formpelapak($id){
$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
$data['db'] = $this->m_admin->get_pelapak($id);
$data['title'] = 'Edit Data';
$this->load->view('admin/header', $data);
$this->load->view('admin/form_pelapak', $data);
$this->load->view('admin/footer');
}

public function updatepelapak($id){
  $this->m_admin->update_pelapak();
  $this->session->set_flashdata('profil', 'Data pelapak berhasil diubah');
  redirect('ADMIN/home/pelapak');
}

public function updatecustomer($id){
  $this->m_admin->update_customer();
  $this->session->set_flashdata('profil', 'Data customer berhasil diubah');
  redirect('ADMIN/home/customer');
}

public function updateBMT($id){
  $this->m_admin->update_customer();
  $this->session->set_flashdata('profil', 'Data BMT berhasil diubah');
  redirect('ADMIN/home/bmt');
}    


public function hapuspelapak($id){
$this->m_admin->hapus_pelapak($id);
$this->session->set_flashdata('profil', 'Data pelapak berhasil dihapus');
redirect('ADMIN/home/pelapak');
}


public function insert_pelapak(){
$data = array(
      'role'     =>$this->input->post('role'),
      'name'   =>$this->input->post('name'),
      'username'     =>$this->input->post('username'),
              'password'         =>$this->input->post('password'),
              'email'      =>$this->input->post('email'),
              'kelas'      =>$this->input->post('kelas'),
              'contact'      =>$this->input->post('contact'),
              'level'      =>$this->input->post('level')
      
    );
        $this->m_admin->tambahpelapak('users',$data);
        $this->session->set_flashdata('profil', 'Data pelapak berhasil ditambahkan');
    redirect('ADMIN/home/pelapak');     
}

public function hapuscustomer($id)
{
$this->m_admin->hapus_customer($id);
$this->session->set_flashdata('profil', 'Data costumer berhasil dihapus');
redirect('ADMIN/home/customer');
}

public function hapusbmt($id)
{
$this->m_admin->hapus_customer($id);
$this->session->set_flashdata('profil', 'Data BMT berhasil dihapus');
redirect('ADMIN/home/bmt');
}

public function formcustomer($id){
$data['title'] = 'Edit Data';
$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
$data['db'] = $this->m_admin->edit_customer($id);
$this->load->view('admin/header1', $data);
$this->load->view('admin/form_customer', $data);
$this->load->view('admin/footer1');
}

public function form(){
  
    $data = array(); // Buat variabel $data sebagai array
    
    if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di m_admin.php
      $upload = $this->m_admin->upload_file($this->filename);
      
      if($upload['result'] == "success"){ // Jika proses upload sukses
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
        
        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
        $data['sheet'] = $sheet; 
      }else{ // Jika proses upload gagal
        $data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
        $data['header'] = $this->load->view('admin/header',$data);
        $data['upload_error'] = redirect('admin/home/form'); // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
        $data['footer'] = $this->load->view('admin/footer');
      }
    }
    

      $data['title'] = 'Import Data';    
      $data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
      $this->load->view('admin/header',$data);
      $this->load->view('admin/form_xls', $data);
      $this->load->view('admin/footer');
  }


public function import(){
// Load plugin PHPExcel nya
include APPPATH.'third_party/PHPExcel/PHPExcel.php';

$excelreader = new PHPExcel_Reader_Excel2007();
$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
$data = array();

$numrow = 1;
foreach($sheet as $row){
// Cek $numrow apakah lebih dari 1
// Artinya karena baris pertama adalah nama-nama kolom
// Jadi dilewat saja, tidak usah diimport
if($numrow > 1){
  // Kita push (add) array data ke variabel data
  array_push($data, array(
    'role'=>$row['A'], // Insert data role dari kolom A di excel
    'name'=>$row['B'], // Insert data nama dari kolom B di excel
    'username'=>$row['C'], // Insert data username dari kolom C di excel
    'password'=>$row['D'], // Insert data password dari kolom D di excel
    'Dompet'=> $row['E'],// Insert data password dari kolom E di excel
    'email'=>$row['F'], // Insert data password dari kolom F di excel
    'kelas'=>$row['G'], // Insert data password dari kolom G di excel
    'contact'=>$row['H'], // Insert data password dari kolom H di excel
    'level'=>$row['I'], // Insert data password dari kolom I di excel
  ));
}

$numrow++; // Tambah 1 setiap kali looping
}
// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
$this->m_admin->insert_multiple($data);
redirect("ADMIN/home"); // Redirect ke halaman awal (ke controller ADMIN fungsi excel)
}

public function insert_dataC(){
$data['title'] = 'Tambah Data';    
$data['tabel'] = 'Customer';    
$data['level'] = '2';    
$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
            $this->form_validation->set_rules('nama', 'Name','trim|required');
            $this->form_validation->set_rules('email', 'Email','trim|required|valid_email');
            $this->form_validation->set_rules('kelas', 'Kelas','trim|required');
            $this->form_validation->set_rules('kontak', 'Contact','trim|required');
            $this->form_validation->set_rules('username', 'Username','trim|required|is_unique[users.username]');
            $this->form_validation->set_rules('password', 'Password','trim|required|min_length[3]|matches[passwordconf]');
            $this->form_validation->set_rules('passwordconf', 'Konfirmasi Password','trim|required|min_length[3]|matches[password]');
              if ($this->form_validation->run() == false){
                $this->load->view('admin/header',$data);
                $this->load->view('admin/manual');
                $this->load->view('admin/footer');
              }
                else{
                $this->tambah();
                }
}

public function insert_dataP(){

$data['title'] = 'Tambah Data';    
$data['tabel'] = 'Pelapak';    
$data['level'] = '3';    
$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));

            $this->form_validation->set_rules('nama', 'Name','trim|required');
            $this->form_validation->set_rules('email', 'Email','trim|required|valid_email');
            $this->form_validation->set_rules('kelas', 'Kelas','trim|required');
            $this->form_validation->set_rules('kontak', 'Contact','trim|required');
            $this->form_validation->set_rules('username', 'Username','trim|required|is_unique[users.username]');
            $this->form_validation->set_rules('password', 'Password','trim|required|min_length[3]|matches[passwordconf]');
            $this->form_validation->set_rules('passwordconf', 'Konfirmasi Password','trim|required|min_length[3]|matches[password]');
              if ($this->form_validation->run() == false){
                $this->load->view('admin/header',$data);
                $this->load->view('admin/manual2');
                $this->load->view('admin/footer');
              }
              else{
                $this->tambah();
              }
}

public function insert_dataB(){

$data['title'] = 'Tambah Data';    
$data['tabel'] = 'Bank';    
$data['level'] = '4';    
$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
$this->form_validation->set_rules('nama', 'Name','trim|required');
$this->form_validation->set_rules('email', 'Email','trim|required|valid_email');
$this->form_validation->set_rules('kelas', 'Kelas','trim|required');
$this->form_validation->set_rules('kontak', 'Contact','trim|required');
$this->form_validation->set_rules('username', 'Username','trim|required|is_unique[users.username]');
$this->form_validation->set_rules('password', 'Password','trim|required|min_length[3]|matches[passwordconf]');
$this->form_validation->set_rules('passwordconf', 'Konfirmasi Password','trim|required|min_length[3]|matches[password]');
  if ($this->form_validation->run() == false){
    $this->load->view('admin/header',$data);
    $this->load->view('admin/manual3');
    $this->load->view('admin/footer');
  }
  else{
    $this->tambah();
  }
}


public function tambah(){

$data = array(    
      'id_user'       =>$this->input->post('id_user'),
      'role'          =>$this->input->post('role'),
      'name'          =>$this->input->post('nama'),
      'username'      =>$this->input->post('username'),
      'password'      =>$this->input->post('password'),
      'Dompet'        =>$this->input->post('dompet'),
      'email'         =>$this->input->post('email'),
      'kelas'         =>$this->input->post('kelas'),
      'level'         =>$this->input->post('level'),
      'contact'       =>$this->input->post('kontak')
      
    );

      $this->m_admin->tambah_tambah('users',$data);
      $this->session->set_flashdata('profil', 'Data Berhasil ditambahkan');
        redirect('ADMIN/home/');
}







public function download(){

  force_download('excel/Format/Format_IMPORT.xlsx') ;

}








} ?>
