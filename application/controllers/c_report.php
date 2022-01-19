<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_report extends CI_Controller
{
  public function __construct()
  {
  	parent:: __construct();
  	$this->load->library('pdf_report');
    $this->load->model('user/m_keranjang');
  	$this->load->model('pelapak/m_pelapak');
    $this->load->model('admin/m_admin');
    $this->load->model('bank/m_bank');
    // $this->load->library('gaji');
	  $this->load->model('validasi');
  }



  public function struk($id)
  {
	$data = $this->m_keranjang->all_order($id);
  $this->load->view('laporan/user/v_laporan', ['data'=>$data]);
  }


  public function laporanp($id)
  {

   $data =$this->m_pelapak->all_order($id);
    $this->load->view('laporan/pelapak/v_laporan', ['data'=>$data]);
  }


  public function laporana($id)
  {

   $data =$this->m_admin->all_order($id);
    $this->load->view('laporan/admin/v_laporan', ['data'=>$data]);
  }



  public function lbmt($id)
  {

    // $data =$this->m_bank->ambilbmt($id);
    // $this->load->view('laporan/bank/v_laporanbmt', ['data'=>$data]);



     // $this->m_bank->updateambil();



        $kevin = array(
          'id_user' => $this->input->post('id_user'),
          'name' => $this->input->post('name'),
          'status' => $this->input->post('status'),
          'waktu' => $this->input->post('waktu'),
          'dompet' => $this->input->post('dompet')
        );


        $this->load->view('laporan/bank/v_laporanbmt', ['data'=>$kevin]);

$this->m_bank->updateambil();



  }


}


