<?php
class home extends CI_Controller{

function __construct(){
  parent::__construct();
  	if($this->session->userdata('Level')!="3"){
		$this->session->set_flashdata('logout', 'Anda dialihkan ke halaman logout');
		redirect('login/login');
	}

	  $this->load->model('validasi');
	  $this->load->model('pelapak/m_pelapak');
}


public function index()
{
	$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
	 $data['data']=$this->m_pelapak->report_line();
	$data['da']=$this->m_pelapak->report_bar();
	 $data['hari']=$this->m_pelapak->penghasilan_harian();
	 $data['minggu']=$this->m_pelapak->penghasilan_mingguan();
	 $data['bulan']=$this->m_pelapak->penghasilan_bulanan();
	 $data['tahun']=$this->m_pelapak->penghasilan_tahunan();
	$data['notif']=$this->m_pelapak->notifikasi();
	$data['hitung']=$this->m_pelapak->hitung();
    $data['title'] = "Pelapak";
    $this->load->view('pelapak/sidebar',$data);
	 $this->load->view('pelapak/header',$data);
	 $this->load->view('pelapak/body',$data);
	 $this->load->view('pelapak/kaki',$data);
}

public function tambah(){
	$data['hari']=$this->m_pelapak->penghasilan_harian();
 $data['minggu']=$this->m_pelapak->penghasilan_mingguan();
 $data['bulan']=$this->m_pelapak->penghasilan_bulanan();
 $data['tahun']=$this->m_pelapak->penghasilan_tahunan();
 $data['notif']=$this->m_pelapak->notifikasi();
 $data['kodeunik'] = $this->m_pelapak->code_otomatis();
 $data['hitung']=$this->m_pelapak->hitung();
	$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
 // $data['database'] = $this->m_pelapak->get_list_order();
 $data['title'] = "Pelapak";

 $this->form_validation->set_rules('nama_produk', 'Nama Produk','trim|required|max_length[15]');
 $this->form_validation->set_rules('harga', 'Harga','trim|required');
 $this->form_validation->set_rules('deskripsi', 'kelas','trim|required');

if ($this->form_validation->run() == false){
 $this->load->view('Pelapak/sidebar', $data);
$this->load->view('Pelapak/header', $data);
 $this->load->view('Pelapak/tambah');
 $this->load->view('pelapak/kaki');
}
else{
	$config = array(
		'upload_path' => './assets/user/images/',
		'allowed_types' => 'jpeg|jpg|png',
		'max_size' => '10240',
		'max_width' => '600000',
		'max_height' => '600000'
	 );
	$this->load->library('upload', $config);
	$this->upload->do_upload('gambar');
		
		$file = $this->upload->data();
		$data = array(
				
				'id_produk'     =>$this->input->post('id_produk'),
				'nama_produk'   =>$this->input->post('nama_produk'),
				'deskripsi'     =>$this->input->post('deskripsi'),
				'harga'         =>$this->input->post('harga'),
				'kategori'      =>$this->input->post('kategori'),
				'gambar'        =>$file['file_name']
					
				);
			$this->m_pelapak->tambahdata('tbl_produk',$data);
			$this->session->set_flashdata('profil', 'Data produk berhasil ditambahkan');
			redirect('PELAPAK/home/tambah');
 }
}

public function produk(){
	$data['hari']=$this->m_pelapak->penghasilan_harian();
	$data['minggu']=$this->m_pelapak->penghasilan_mingguan();
	$data['bulan']=$this->m_pelapak->penghasilan_bulanan();
	$data['tahun']=$this->m_pelapak->penghasilan_tahunan();
	$data['notif']=$this->m_pelapak->notifikasi();
	$data['hitung']=$this->m_pelapak->hitung();
	$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
	$data['database'] = $this->m_pelapak->get_all_data();
	$data['kodeunik'] = $this->m_pelapak->code_otomatis();

	 $this->load->view('pelapak/sidebar',$data);
	 $this->load->view('pelapak/header',$data);
	 $this->load->view('pelapak/dashboard',$data);
	 $this->load->view('pelapak/kaki',$data);
}

public function profil(){
	$data['hari']=$this->m_pelapak->penghasilan_harian();
	$data['minggu']=$this->m_pelapak->penghasilan_mingguan();
	$data['bulan']=$this->m_pelapak->penghasilan_bulanan();
	$data['tahun']=$this->m_pelapak->penghasilan_tahunan();
	$data['notif']=$this->m_pelapak->notifikasi();
	$data['hitung']=$this->m_pelapak->hitung();
	$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
    $data['title'] = "Pelapak";
    	$this->form_validation->set_rules('name', 'name','trim|required');
		$this->form_validation->set_rules('email', 'email','trim|required|valid_email');
		$this->form_validation->set_rules('kelas', 'kelas','trim|required');
		$this->form_validation->set_rules('contact', 'contact','trim|required');

		if ($this->form_validation->run() == false){
			$this->load->view('PELAPAK/sidebar', $data);
			$this->load->view('PELAPAK/header', $data);
			$this->load->view('PELAPAK/profil', $data);
			$this->load->view('PELAPAK/kaki');
		}
		else{
			$this->load->model('PELAPAK/m_akun_pelapak');
			$this->m_akun_pelapak->update_profile();
			$this->session->set_flashdata('profil', 'Profil berhasil diubah');

		redirect('PELAPAK/home');
		}
}

public function updatepassword()
	{
		$data['hari']=$this->m_pelapak->penghasilan_harian();
	$data['minggu']=$this->m_pelapak->penghasilan_mingguan();
	$data['bulan']=$this->m_pelapak->penghasilan_bulanan();
	$data['tahun']=$this->m_pelapak->penghasilan_tahunan();
	$data['notif']=$this->m_pelapak->notifikasi();
	$data['hitung']=$this->m_pelapak->hitung();
		$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
		$this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('newpassword1','password baru','required|trim|min_length[3]|matches[newpassword2]');
		$this->form_validation->set_rules('newpassword2','ulangi password','required|trim|min_length[3]|matches[newpassword1]');

		if ($this->form_validation->run() == false){
			$this->load->view('pelapak/sidebar',$data);
			$this->load->view('PELAPAK/header', $data);
			$this->load->view('PELAPAK/password', $data);
			$this->load->view('PELAPAK/kaki');
		}
		else{
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('newpassword1');
			$password = $this->session->userdata('password');

			if($password != $current_password){
				$this->session->set_flashdata('gagal', 'Password tidak sama dengan password sebelumnya');
				redirect('PELAPAK/home/updatepassword');
			}
			else{
				if($new_password == $current_password){
					$this->session->set_flashdata('gagal', 'Password baru tidak boleh sama dengan yang sebelumnya');
					redirect('PELAPAK/home/updatepassword');
				}
				else{
					$this->load->model('PELAPAK/m_akun_pelapak');
		$this->m_akun_pelapak->update_password();
		$this->session->set_flashdata('profil', 'password berhasil diubah');
		redirect('login/logout');
				}
			}
		}
	}

public function formedit_order($id){
	$data['hari']=$this->m_pelapak->penghasilan_harian();
	$data['minggu']=$this->m_pelapak->penghasilan_mingguan();
	$data['bulan']=$this->m_pelapak->penghasilan_bulanan();
	$data['tahun']=$this->m_pelapak->penghasilan_tahunan();
	$data['notif']=$this->m_pelapak->notifikasi();
	$data['hitung']=$this->m_pelapak->hitung();
	$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
	$data['title'] = 'Edit Data';
	$data['db'] = $this->m_pelapak->get_detail_order($id);
	$this->load->view('pelapak/sidebar',$data);
    $this->load->view('pelapak/header', $data);
	$this->load->view('pelapak/form_edit_produk', $data);
	$this->load->view('pelapak/kaki');
}

public function history(){
	$data['hari']=$this->m_pelapak->penghasilan_harian();
	$data['minggu']=$this->m_pelapak->penghasilan_mingguan();
	$data['bulan']=$this->m_pelapak->penghasilan_bulanan();
	$data['tahun']=$this->m_pelapak->penghasilan_tahunan();
	$data['notif']=$this->m_pelapak->notifikasi();
	$data['hitung']=$this->m_pelapak->hitung();
   		$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
		$data['database'] = $this->m_pelapak->history();
        $data['title'] = "Pelapak";
        $this->load->view('Pelapak/sidebar', $data);
    	$this->load->view('Pelapak/header', $data);
        $this->load->view('Pelapak/history', $data);
        $this->load->view('pelapak/kaki');
        
}

public function listorder(){
	$data['hari']=$this->m_pelapak->penghasilan_harian();
	$data['minggu']=$this->m_pelapak->penghasilan_mingguan();
	$data['bulan']=$this->m_pelapak->penghasilan_bulanan();
	$data['tahun']=$this->m_pelapak->penghasilan_tahunan();
	$data['notif']=$this->m_pelapak->notifikasi();
	$data['hitung']=$this->m_pelapak->hitung();
   		$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
		$data['database'] = $this->m_pelapak->get_list_order();
        $data['title'] = "Pelapak";
        $this->load->view('Pelapak/sidebar', $data);
    	$this->load->view('Pelapak/header', $data);
        $this->load->view('Pelapak/list_order', $data);
        $this->load->view('pelapak/kaki');
        
}


    public function update_order($id){
			$this->m_pelapak->update_detail_order();
			$this->session->set_flashdata('profil', 'Data produk berhasil diupdate');
			redirect('PELAPAK/home/listorder');
		
	}



	public function insert(){
        $config = array(
			'upload_path' => './assets/user/images/',
			'allowed_types' => 'jpeg|jpg|png',
			'max_size' => '10240',
			'max_width' => '600000',
			'max_height' => '600000'
 		);
		$this->load->library('upload', $config);
        $this->upload->do_upload('gambar');
            
			$file = $this->upload->data();
			$data = array(
					
				    'id_produk'     =>$this->input->post('id_produk'),
				    'nama_produk'   =>$this->input->post('nama_produk'),
				    'deskripsi'     =>$this->input->post('deskripsi'),
                    'harga'         =>$this->input->post('harga'),
                    'kategori'      =>$this->input->post('kategori'),
                    'gambar'        =>$file['file_name']
						
					);
				$this->m_pelapak->tambahdata('tbl_produk',$data);
				$this->session->set_flashdata('profil', 'Data produk berhasil ditambahkan');
            	redirect('PELAPAK/home/produk');
	      	
	}


	public function hapusdata($id)
	{
		$this->m_pelapak->hapus($id);
		$this->session->set_flashdata('profil', 'Data produk berhasil dihapus');
		redirect('PELAPAK/home/produk');
	}



	public function formedit($id){
		$data['hari']=$this->m_pelapak->penghasilan_harian();
		$data['minggu']=$this->m_pelapak->penghasilan_mingguan();
		$data['bulan']=$this->m_pelapak->penghasilan_bulanan();
		$data['tahun']=$this->m_pelapak->penghasilan_tahunan();
		$data['notif']=$this->m_pelapak->notifikasi();
		$data['hitung']=$this->m_pelapak->hitung();
		$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
		$data['title'] = 'Edit Data';
		$data['db'] = $this->m_pelapak->edit($id);
		$this->load->view('pelapak/sidebar', $data);
		$this->load->view('pelapak/header', $data);
		$this->load->view('pelapak/form_edit', $data);
		$this->load->view('pelapak/kaki');
	}


	public function updateproduk($id){
			$this->m_pelapak->update_produk();
			$this->session->set_flashdata('profil', 'Data produk berhasil diupdate');
			redirect('PELAPAK/home/produk');
	}


	public function batalkan($id){
		$this->m_pelapak->batal($id);
		$this->session->set_flashdata('profil', 'Data produk berhasil dihapus');
		redirect('/PELAPAK/home/listorder');
	}




}
