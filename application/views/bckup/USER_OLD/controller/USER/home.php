<?php
class home extends CI_Controller{

function __construct(){
  parent::__construct();
	
  	if($this->session->userdata('Level')!="2"){
		redirect('auth/login');
	}

	$this->load->library('cart');
	$this->load->model('user/m_keranjang');
	$this->load->model('validasi');
	


}


	public function index()	{  
		
		  $data['produk'] = $this->m_keranjang->get_produk_all();
		  $data['kategori'] = $this->m_keranjang->get_kategori_all();
		  $data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
          $this->load->view('user/header', $data);
          $this->load->view('user/list_produk',$data);
          $this->load->view('user/footer');
	}


	public function updateprofile($id){
			$this->load->model('user/m_akun_user');
			$this->m_akun_user->update_profile();
			redirect('USER/home');
		
	}	


	public function profil(){
		  $data['kategori'] = $this->m_keranjang->get_kategori_all();
		  $data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
          $this->load->view('user/header',$data);
          $this->load->view('user/profil', $data);
          $this->load->view('user/footer');

      
	}



	public function keresek(){
		$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
		$data['kategori'] = $this->m_keranjang->get_kategori_all();
		$this->load->view('user/header',$data);
		$this->load->view('user/keresek',$data);
		$this->load->view('user/footer');
	}



	public function belanja()
		{
			$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
			$data['kategori'] = $this->m_keranjang->get_kategori_all();
            $data['database'] = $this->m_keranjang->status_done();
            $data['basisdata'] = $this->m_keranjang->status_not();
            $data['data'] = $this->m_keranjang->status_pending();
            $data['basedata'] = $this->m_keranjang->status_batal();
			$this->load->view('user/header',$data);
			$this->load->view('user/belanja',$data);
			$this->load->view('user/footer');
		}




		public function tambah(){
		$data_produk= array('id' => $this->input->post('id'),
                            'id_produk' => $this->input->post('id_produk'),
							 'name' => $this->input->post('nama'),
							 'price' => $this->input->post('harga'),
							 'gambar' => $this->input->post('gambar'),
							 'qty' => $this->input->post('qty'),
							 'id_user' => $this->input->post('id_user')
							);
		$this->cart->insert($data_produk);
		redirect('USER/home');
	}



	public function ubah_cart(){
			$cart_info = $_POST['cart'] ;
			foreach( $cart_info as $id => $cart)
			{
				$rowid = $cart['rowid'];
				$price = $cart['price'];
				$gambar = $cart['gambar'];
				$amount = $price * $cart['qty'];
				$qty = $cart['qty'];
				$id_user = $cart['id_user'];
	            $id_produk = $cart['id_produk'];
				$data = array('rowid' => $rowid,
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


	public function check_out(){
		$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
		$data['kategori'] = $this->m_keranjang->get_kategori_all();
        $data['kodeuni'] = $this->m_keranjang->code_otomati();
		$this->load->view('user/header',$data);
		$this->load->view('user/check_out',$data);
		$this->load->view('user/footer');
	}



	public function proses_order(){
        $this->m_keranjang->update_topup();
		$data_pelanggan = array(
                            'id_user' => $this->input->post('id_user'),
                            'nama' => $this->input->post('nama'),
							'email' => $this->input->post('email'),
							'alamat' => $this->input->post('alamat'),
							'telp' => $this->input->post('telp'));
		$id_pelanggan = $this->m_keranjang->tambah_pelanggan($data_pelanggan);
        
        
		$data_order = array('tanggal' => date('Y-m-d'),
					   		'pelanggan' => $id_pelanggan);
		$id_order = $this->m_keranjang->tambah_order($data_order);
                
		if ($cart = $this->cart->contents())
			{
				foreach ($cart as $item)
					{
						$data_detail = array(
                                        'id' => $this->input->post('id'),
                                        'id_pembeli' => $this->input->post('id_pembeli'),
                                        'id_user' => $item['id_user'],
                                        'id_produk' => $item['id'],
                                        'order_id' => $id_order,
										'produk' => $item['name'],
										'qty' => $item['qty'],
										'harga' => $item['subtotal']);
                                        
						$proses = $this->m_keranjang->tambah_detail_order($data_detail);
					}
			}

		$this->cart->destroy();
		$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
		$data['kategori'] = $this->m_keranjang->get_kategori_all();
		$this->load->view('user/header',$data);
		$this->load->view('user/sukses',$data);
		$this->load->view('user/footer');
	}



	public function hapus($rowid){
		if ($rowid=="all")
			{
				$this->cart->destroy();
			}
		else
			{
				$data = array('rowid' => $rowid,
			  				  'qty' =>0);
				$this->cart->update($data);
			}
		redirect('USER/home/keresek');
	}

	public function batal($id)
	{
		$this->m_keranjang->batalin($id);
		$this->session->set_flashdata('hapus_sukses','Data berhasil di hapus');
		redirect('/USER/home/belanja');
	}


public function lapak(){
		$id=($this->uri->segment(4))?$this->uri->segment(4):0;
		$data['produk'] = $this->m_keranjang->get_produk_kategori($id);
		$data['kategori'] = $this->m_keranjang->get_kategori_all();
		$data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
		$this->load->view('user/header',$data);
		$this->load->view('user/list_produk',$data);
		$this->load->view('user/footer');
}



     public function hapusdetail($id)
	{
		$this->m_keranjang->hapus_detail($id);
		
		redirect('USER/home/belanja');
	}


}
