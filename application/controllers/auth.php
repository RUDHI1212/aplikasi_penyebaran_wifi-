<?php
class auth extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('validasi');
    $this->load->library('session');
    $this->load->library('cart');
    if ($this->session->userdata('Level') == '1') {
        $sukses = $this->session->set_flashdata('sukses', 'Anda masih mempunyai sesi');
      redirect('ADMIN/home');
  }
  else if ($this->session->userdata('Level') == '2') {
    $sukses = $this->session->set_flashdata('sukses', 'Anda masih mempunyai sesi');
      redirect('USER/home');
  }
  else if ($this->session->userdata('Level') == '3') {
    $sukses = $this->session->set_flashdata('sukses', 'Anda masih mempunyai sesi');
      redirect('PELAPAK/home');
  }
  else if ($this->session->userdata('Level') == '4') {
    $sukses = $this->session->set_flashdata('sukses', 'Anda masih mempunyai sesi');
      redirect('BANK/home/customer');
  }
  }

  public function index()
  {
      $data['produk'] = $this->validasi->get_produk_all();
      $data['kategori'] = $this->validasi->get_kategori_all();
      $this->load->view('header', $data);
      $this->load->view('body', $data);
      $this->load->view('footer', $data);
  }

  public function cari()
  {
      $cari = $this->input->post('cari');
      $kategori = $this->input->post('kategori');
      $data['produk'] = $this->validasi->cari_produk($kategori, $cari);
      $data['jumlah'] = $this->validasi->jumlah($kategori, $cari);
      $this->session->set_flashdata('login', 'Silahkan login untuk melanjutkan');
      $this->load->view('header', $data);
      $this->load->view('cari', $data);
      $this->load->view('footer');
  }

  public function lapak()
	{
		$id = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['produk'] = $this->validasi->get_produk_kategori($id);
		$data['kategori'] = $this->validasi->get_kategori_all();
		$this->load->view('header', $data);
		$this->load->view('body', $data);
		$this->load->view('footer', $data);
	}

  function deskripsi($id)
  {
      $data['row'] = $this->validasi->deskripsi($id);
      $this->load->view('header', $data);
      $this->load->view('deskripsi', $data);
      $this->load->view('footer', $data);
  }
}
