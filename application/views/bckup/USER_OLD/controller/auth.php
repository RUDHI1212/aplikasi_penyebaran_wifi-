<?php
class auth extends CI_Controller{

function __construct(){
  parent::__construct();
  $this->load->model('validasi');
   $this->load->library('session');
}

  public function login()
  {
    if(isset($_POST['submit'])){
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
                  redirect('BANK/home');
                  break;
        				case '5':
        					redirect('USER/home');
        					break;


				default:
                  redirect('auth/login');
                  break;
              }

          }else{ redirect('auth/login');}

    }else{

      $data['judul']= "Login||CAGON" ;
        $this->load->view('header1', $data);
        $this->load->view('login1');
        $this->load->view('footer');



    }
  }


  public function logout(){
    $this->session->sess_destroy();
    redirect('auth/login');
  
  }

}
