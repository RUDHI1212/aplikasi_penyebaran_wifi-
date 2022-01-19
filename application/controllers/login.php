<?php
class login extends CI_Controller{

function __construct(){
parent::__construct();
$this->load->library('form_validation');
$this->load->model('validasi');
$sukses = $this->session->set_flashdata('sukses', 'Anda berhasil login');
}

public function login()
{
    if ($this->session->userdata('Level') == '1') {
        $this->session->set_flashdata('sukses', 'Anda masih mempunyai sesi');
        redirect('ADMIN/home');
    }
    else if ($this->session->userdata('Level') == '2') {
        $this->session->set_flashdata('sukses', 'Anda masih mempunyai sesi');
        redirect('USER/home');
    }
    else if ($this->session->userdata('Level') == '3') {
        $this->session->set_flashdata('sukses', 'Anda masih mempunyai sesi');
        redirect('PELAPAK/home');
    }
    else if ($this->session->userdata('Level') == '4') {
        $this->session->set_flashdata('sukses', 'Anda masih mempunyai sesi');
        redirect('BANK/home/customer');
    }

    $this->form_validation->set_rules('username', 'username','trim|required');
    $this->form_validation->set_rules('password','password','trim|required');

    if ($this->form_validation->run() == false){
        $data['judul']= "Login||CAGON" ;
        $this->load->view('login/header', $data);
        $this->load->view('login/login');
        $this->load->view('login/footer');
    }
    else{
        $this->_validasi();
    }
}

private function _validasi(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $berhasil = $this->validasi->login($username,$password);

    if($berhasil){
            foreach($berhasil as $row);
        
        $this->session->set_userdata('username', $row->username);
        $this->session->set_userdata('password', $row->password);
        $this->session->set_userdata('kelas', $row->kelas);
        $this->session->set_userdata('email', $row->email);
        $this->session->set_userdata('contact', $row->contact);
        $this->session->set_userdata('Level', $row->level);
        $this->session->set_userdata('name', $row->name);
        $this->session->set_userdata('id_user', $row->id_user);
        $this->session->set_userdata('Role', $row->role);
        $this->session->set_userdata('dompet', $row->Dompet);

        switch ($row->level)
        {

            case '1':
            redirect('ADMIN/home' );
            break;

            case '2':
            redirect('USER/home');
            break;

            case '3':
            redirect('PELAPAK/home');
            break;

            case '4': 
            redirect('BANK/home/customer');
            break;

            case '5':
            redirect('USER/home');
            break;

            default:
            redirect('login/login');
            break;

}
    }
else{
    $this->session->set_flashdata('validasi', 'NIS/password salah');
            redirect('login/login');
}
    }


public function logout(){
    $this->session->set_flashdata('logout', 'Anda berhasil logout');
    $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('kelas');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('contact');
        $this->session->unset_userdata('Level');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('Role');
        $this->session->unset_userdata('dompet');
    redirect('login/login');
}

public function error()
{
    $this->load->view('error404');
}

}
