<?php
class home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if ($this->session->userdata('Level') != "2") {
			$this->session->set_flashdata('logout', 'Anda dialihkan ke halaman logout');
			redirect('login/login');
		}

		$this->load->library('cart');
		$this->load->model('user/m_keranjang');
		$this->load->model('validasi');
	}

	public function form_input(){
		$this->load->view('form_input');
	}
	public function index()
	{
		$data['produk'] = $this->m_keranjang->get_produk_all();
		$data['kategori'] = $this->m_keranjang->get_kategori_all();
		$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
		$this->load->view('user/header', $data);
		$this->load->view('user/body', $data);
		$this->load->view('user/footer');
	}

	public function deskripsi($id)
	{
		$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
		$data['row'] = $this->m_keranjang->deskripsi($id);

		$this->form_validation->set_rules('qty', 'Qty','trim|required|is_natural');
		if ($this->form_validation->run() == false){
			$this->load->view('user/header', $data);
			$this->load->view('user/deskripsi', $data);
			$this->load->view('user/footer');
		}
		else{
			redirect('USER/home/tambah');
		}
	}

	public function profil()
	{
		$data['kategori'] = $this->m_keranjang->get_kategori_all();
		$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
		$this->form_validation->set_rules('name', 'name','trim|required');
		$this->form_validation->set_rules('email', 'email','trim|required|valid_email');
		$this->form_validation->set_rules('kelas', 'kelas','trim|required');
		$this->form_validation->set_rules('contact', 'contact','trim|required');

		if ($this->form_validation->run() == false){
			$this->load->view('user/header', $data);
			$this->load->view('user/profil', $data);
			$this->load->view('user/footer');
		}
		else{
			$this->load->model('user/m_akun_user');
			$this->m_akun_user->update_profile();
			$this->session->set_flashdata('profil', 'Profil berhasil diubah');

		redirect('USER/home');
		}
	}

	public function updatepassword()
	{
		$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
		$this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('newpassword1','password baru','required|trim|min_length[3]|matches[newpassword2]');
		$this->form_validation->set_rules('newpassword2','ulangi password','required|trim|min_length[3]|matches[newpassword1]');

		if ($this->form_validation->run() == false){
			$this->load->view('user/header', $data);
			$this->load->view('user/password', $data);
			$this->load->view('user/footer');
		}
		else{
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('newpassword1');
			$password = $this->session->userdata('password');

			if($password != $current_password){
				$this->session->set_flashdata('gagal', 'Password tidak sama dengan password sebelumnya');
				redirect('USER/home/updatepassword');
			}
			else{
				if($new_password == $current_password){
					$this->session->set_flashdata('gagal', 'Password baru tidak boleh sama dengan yang sebelumnya');
					redirect('USER/home/updatepassword');
				}
				else{
					$this->load->model('user/m_akun_user');
					$this->m_akun_user->update_password();
					$this->session->set_flashdata('profil', 'password berhasil diubah');
					redirect('login/logout');
				}
			}
		}
	}

	public function keresek()
	{
		$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
		$data['kategori'] = $this->m_keranjang->get_kategori_all();
		$this->form_validation->set_rules('', 'Password Lama', 'required|trim');
		
		$this->load->view('user/header', $data);
		$this->load->view('user/keresek', $data);
		$this->load->view('user/footer');
		
	}

	public function check_out()
	{
		$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
		$data['kategori'] = $this->m_keranjang->get_kategori_all();
		$data['kodeuni'] = $this->m_keranjang->code_otomati();

		$this->form_validation->set_rules('email', 'email','trim|required|valid_email');
		$this->form_validation->set_rules('nama', 'name','trim|required');
		$this->form_validation->set_rules('alamat', 'Kelas','trim|required');
		$this->form_validation->set_rules('telp', 'Nomor Telepon','trim|required');

		if ($this->form_validation->run() == false){
			$this->load->view('user/header', $data);
			$this->load->view('user/check_out', $data);
			$this->load->view('user/footer');
		}
		else{
			date_default_timezone_set('Asia/Jakarta');
		$this->m_keranjang->update_topup();
		$data_pelanggan = array(
			'id_user' => $this->input->post('id_user'),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp')
		);
		$id_pelanggan = $this->m_keranjang->tambah_pelanggan($data_pelanggan);


		$data_order = array(
			'tanggal' => date('Y-m-d'),
			'pelanggan' => $id_pelanggan
		);
		$id_order = $this->m_keranjang->tambah_order($data_order);

		if ($cart = $this->cart->contents()) {
			foreach ($cart as $item) {
				$data_detail = array(
					'id' => $this->input->post('id'),
					'id_pembeli' => $this->input->post('id_pembeli'),
					'id_user' => $item['id_user'],
					'id_produk' => $item['id'],
					'order_id' => $id_order,
					'produk' => $item['name'],
					'qty' => $item['qty'],
					'harga' => $item['subtotal'],
					'tgl_beli' => date('Y-m-d')
				);

				$proses = $this->m_keranjang->tambah_detail_order($data_detail);
			}
		}

		$this->cart->destroy();
		$this->session->set_flashdata('Belanja', 'Transaksi anda berhasil');
		redirect('USER/home');
		}
	}





	public function check_out1($id,$tgl,$lm)
	{
		$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
		$data['kategori'] = $this->m_keranjang->get_kategori_all();
		$data['kodeuni'] = $this->m_keranjang->code_otomati();

		$this->form_validation->set_rules('email', 'email','trim|required|valid_email');
		$this->form_validation->set_rules('nama', 'name','trim|required');
		$this->form_validation->set_rules('alamat', 'Kelas','trim|required');
		$this->form_validation->set_rules('telp', 'Nomor Telepon','trim|required');

		if ($this->form_validation->run() == false){
			$this->load->view('user/header', $data);
			$this->load->view('user/check_out', $data);
			$this->load->view('user/footer');
		}
		else{
			date_default_timezone_set('Asia/Jakarta');
		$this->m_keranjang->update_topup();
		$data_pelanggan = array(
			'id_user' => $this->input->post('id_user'),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp')
		);
		$id_pelanggan = $this->m_keranjang->tambah_pelanggan($data_pelanggan);


		$data_order = array(
			'tanggal' => date('Y-m-d'),
			'pelanggan' => $id_pelanggan
		);
		$id_order = $this->m_keranjang->tambah_order($data_order);

		if ($cart = $this->cart->contents()) {
			foreach ($cart as $item) {
				$data_detail = array(
					'id' => $this->input->post('id'),
					'id_pembeli' => $this->input->post('id_pembeli'),
					'id_user' => $item['id_user'],
					'id_produk' => $item['id'],
					'order_id' => $id_order,
					'produk' => $item['name'],
					'qty' => $item['qty'],
					'harga' => $item['subtotal'],
					'tgl_beli' => date('Y-m-d')
				);

				$proses = $this->m_keranjang->tambah_detail_order($data_detail);
			}
		}

		$this->cart->destroy();
		$this->session->set_flashdata('Belanja', 'Transaksi anda berhasil');
		redirect('c_report/struk/'.$id.'/'.$tgl.'/'.$lm);
		}
	}






	public function belanja()
	{
		$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
		$data['kategori'] = $this->m_keranjang->get_kategori_all();
		$data['database'] = $this->m_keranjang->status_done();
		$data['basisdata'] = $this->m_keranjang->status_not();
		$data['data'] = $this->m_keranjang->status_pending();
		$data['basedata'] = $this->m_keranjang->status_batal();
		$data['history'] = $this->m_keranjang->history();
		$this->load->view('user/header', $data);
		$this->load->view('user/belanja', $data);
		$this->load->view('user/footer');
	}

	public function lapak()
	{
		$id = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['produk'] = $this->m_keranjang->get_produk_kategori($id);
		$data['kategori'] = $this->m_keranjang->get_kategori_all();
		$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
		$this->load->view('user/header', $data);
		$this->load->view('user/body', $data);
		$this->load->view('user/footer', $data);
	}

	public function tambah()
	{
		$data_produk = array(
			'id' => $this->input->post('id'),
			'id_produk' => $this->input->post('id_produk'),
			'name' => $this->input->post('nama'),
			'price' => $this->input->post('harga'),
			'gambar' => $this->input->post('gambar'),
			'qty' => $this->input->post('qty'),
			'id_user' => $this->input->post('id_user')
		);
		$this->cart->insert($data_produk);
		$this->session->set_flashdata('beli', 'Produk dimasukan kedalam keranjang');
		redirect('USER/home/lapak');
	}

	public function ubah_cart()
	{
		$cart_info = $_POST['cart'];
		foreach ($cart_info as $id => $cart) {
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$gambar = $cart['gambar'];
			$amount = $price * $cart['qty'];
			$qty = $cart['qty'];
			$id_user = $cart['id_user'];
			$id_produk = $cart['id_produk'];
			$data = array(
				'rowid' => $rowid,
				'price' => $price,
				'gambar' => $gambar,
				'amount' => $amount,
				'qty' => $qty,
				'id_user' => $id_user,
				'id_produk' => $id_produk
			);
			$this->cart->update($data);
		}
		redirect('USER/home/keresek');
	}

	public function hapus($rowid)
	{
		if ($rowid == "all") {
			$this->cart->destroy();
			$this->session->set_flashdata('semua', 'Semua data berhasil di hapus');
		} else {
			$data = array(
				'rowid' => $rowid,
				'qty' => 0
			);
			$this->cart->update($data);
			$this->session->set_flashdata('hapus', 'Data berhasil di hapus');
		}
		redirect('USER/home/keresek');
	}

	public function batal($id)
	{
		$this->m_keranjang->batalin($id);
		$this->session->set_flashdata('hapus_sukses', 'Data berhasil di hapus');
		redirect('/USER/home/belanja');
	}


	public function hapusdetail($id)
	{
		$this->m_keranjang->hapus_detail($id);
		$this->session->set_flashdata('hapus_sukses', 'Data berhasil di hapus');
		redirect('USER/home/belanja');
	}

	public function cari()
	{
		$cari = $this->input->post('cari');
		$kategori = $this->input->post('kategori');
		$data['produk'] = $this->m_keranjang->cari_produk($kategori, $cari);
		$data['jumlah'] = $this->m_keranjang->jumlah($kategori, $cari);
		$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
		$this->load->view('user/header', $data);
		$this->load->view('user/cari', $data);
		$this->load->view('user/footer');
	}

	public function error()
	{
		$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
		$this->load->view('user/header', $data);
		$this->load->view('user/totos');
		$this->load->view('user/footer');
	}



		public function about()
	{
		$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
		$this->load->view('user/header', $data);
		$this->load->view('user/about');
		$this->load->view('user/footer');
	}
}
