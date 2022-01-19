<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('Level') !='4'){
        $this->session->set_flashdata('error','Sorry, you are not logged in!');
        redirect('auth/login');
        }

        $this->load->model('bank/m_bank');
  $this->load->model('validasi');
    }

    function index(){
        $data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
        $data['database'] = $this->m_bank->get_all_customer() ;
        $data['title'] = "Bank";
        $this->load->view('bank/header', $data);
        $this->load->view('bank/dashboard', $data);
        $this->load->view('bank/footer');
    }

    public function profil(){
        $data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
        $data['title'] = "bank";
            $this->form_validation->set_rules('name', 'name','trim|required');
            $this->form_validation->set_rules('email', 'email','trim|required|valid_email');
            $this->form_validation->set_rules('kelas', 'kelas','trim|required');
            $this->form_validation->set_rules('contact', 'contact','trim|required');
    
            if ($this->form_validation->run() == false){
                $this->load->view('bank/header', $data);
                $this->load->view('bank/profil', $data);
                $this->load->view('bank/footer');
            }
            else{
                $this->load->model('bank/m_akun_bank');
                $this->m_akun_bank->update_profile();
                $this->session->set_flashdata('profil', 'Profil berhasil diubah');
    
            redirect('bank/home');
            }
    }
    
    public function updatepassword()
        {
            $data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
            $data['title'] = "bank";
            $this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim');
            $this->form_validation->set_rules('newpassword1','password baru','required|trim|min_length[3]|matches[newpassword2]');
            $this->form_validation->set_rules('newpassword2','ulangi password','required|trim|min_length[3]|matches[newpassword1]');
    
            if ($this->form_validation->run() == false){
                $this->load->view('bank/header', $data);
                $this->load->view('bank/password', $data);
                $this->load->view('bank/footer');
            }
            else{
                $current_password = $this->input->post('current_password');
                $new_password = $this->input->post('newpassword1');
                $password = $this->session->userdata('password');
    
                if($password != $current_password){
                    $this->session->set_flashdata('gagal', 'Password tidak sama dengan password sebelumnya');
                    redirect('bank/home/updatepassword');
                }
                else{
                    if($new_password == $current_password){
                        $this->session->set_flashdata('gagal', 'Password baru tidak boleh sama dengan yang sebelumnya');
                        redirect('bank/home/updatepassword');
                    }
                    else{
                        $this->load->model('bank/m_akun_bank');
            $this->m_akun_bank->update_password();
            $this->session->set_flashdata('profil', 'password berhasil diubah');
            redirect('login/logout');
                    }
                }
            }
        }

     function customer(){
        $data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
        $data['database'] = $this->m_bank->get_all_customer() ;
        $data['title'] = "Bank";
        $this->load->view('bank/header', $data);
        $this->load->view('bank/list_customer', $data);
        $this->load->view('bank/footer');
    }


     function pelapak(){
        $data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
        $data['database'] = $this->m_bank->get_all_pelapak() ;
        $data['title'] = "Bank";
        $this->load->view('bank/header', $data);
        $this->load->view('bank/list_pelapak', $data);
        $this->load->view('bank/footer');
    }




     function gaji(){
        $data['sess'] = $this->validasi->login($this->session->userdata('username'),$this->session->userdata('password'));
        $data['database'] = $this->m_bank->get_all_pelapak() ;
        $data['title'] = "Bank";
        $this->load->view('bank/header', $data);
        $this->load->view('bank/gaji_pelapak', $data);
        $this->load->view('bank/footer');
    }
   
   



    public function updatetopup($id){
        $this->load->model('m_bank');
        $this->m_bank->update_topup();
        // $this->session->set_flashdata('update_sukses', 'Data berhasil diperbaharui');
        $this->session->set_flashdata('profil', 'Top up berhasil');
        redirect('bank/home/customer');

    }


    public function updatetopuppel($id){
        $this->load->model('m_bank');
        $this->m_bank->update_topup();
        // $this->session->set_flashdata('update_sukses', 'Data berhasil diperbaharui');
        $this->session->set_flashdata('profil', 'Top up berhasil');
        redirect('bank/home/pelapak');

    }


    public function updategaji($id){
        $kondisi = ['id_user' => $this->input->post('id_user')];
        $d = $this->input->post('dompet');
        $p = $this->input->post('bayar');
        $total = $d-$p;

                if ($d>=$p) {
                                $data = ['Dompet' => $total ];
                                $this->db->update('users', $data, $kondisi);

                                $this->session->set_flashdata('profil','Pengambilan Dompet Tunai Berhasil');
                                redirect('bank/home/gaji');
                }else{
                            $this->session->set_flashdata('profill','Maaf,pengambilan dompet tunai gagal'); 
                                redirect('BANK/home/gaji/');}
    }





}