<?php
class m_bank extends CI_Model
{
        public function get_all_customer()
        {
            $query = $this->db->get_where('users', ['level' => '2']);
            return $query->result();
        }


        public function get_all_pelapak()
        {
            $query = $this->db->get_where('users', ['level' => '3']);
            return $query->result();
        }



        public function edit_topup($id){
            $query = $this->db->get_where('users', ['id_user' => $id]);
            return $query->row();
        }

        public function update_topup(){
            $kondisi = ['id_user' => $this->input->post('id_user')];
            $data = [
                'Dompet' => $this->input->post('Dompet')
            ];

            $this->db->update('users', $data, $kondisi);
        }


        public function update_dompet(){
            $kondisi = ['id_user' => $this->input->post('id_user')];
            $d = $this->input->post('dompet');
            $p = $this->input->post('bayar');
            $total = $d-$p;

                    if ($d>=$p) {
                                    $data = ['Dompet' => $total ];



                                     $this->db->update('users', $data, $kondisi);


                    }else{         $this->session->set_flashdata('error','Sorry, you are not logged in!'); 

                                    redirect('BANK/home/gaji/');}

        }


        public function ambilbmt($id)
        {
              $this->db->select('*');
              $this->db->from('users');
              $this->db->where('id_user', $id);
              $query = $this->db->get();
              return $query;
        }



        public function updateambil(){
            $kondisi = ['id_user' => $this->input->post('id_user')];
            $data = [
                'Dompet' => $this->input->post('koin')
            ];

            $this->db->update('users', $data, $kondisi);
        }



    }

    ?>