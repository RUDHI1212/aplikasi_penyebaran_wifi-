<?php

class m_akun_user extends CI_Model
{

	 public function update_profile(){
        $kondisi = ['id_user' => $this->session->userdata('id_user')];
		$data = [
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
                    'kelas' => $this->input->post('kelas'),
                    'contact' => $this->input->post('contact'),
				];

		$this->db->update('users', $data, $kondisi);
	}

	public function update_password(){
        $kondisi = ['id_user' => $this->session->userdata('id_user')];
		$data = [
                    'password' => $this->input->post('newpassword1'),
				];

		$this->db->update('users', $data, $kondisi);
	}

}
