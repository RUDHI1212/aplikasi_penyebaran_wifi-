<?php

class m_admin extends CI_Model
{

	public function get_all_data()
	{
		//$query = $this->db->get('items_seblak');
        $query = $this->db->get('tbl_produk');
		return $query->result();
	}

    public function code_otomatis(){
            $this->db->select('Right(tbl_produk.id_produk,3) as kode',FALSE);
            $this->db->order_by('id_produk','desc');
            $this->db->limit(1);
            $query=$this->db->get('tbl_produk');
                if($query->num_rows()<>0){
                    $data=$query->row();
                    $kode=intval($data->kode)+1;
                }
                else{
                    $kode=1;
                }
                $kodemax=str_pad($kode,3,"0",STR_PAD_LEFT);
                $kodejadi = "P".$kodemax;
                return $kodejadi;
		}
    

    public function orderan()
	{
		$query = $this->db->get('detail_order');
		return $query->result();
	}

    public function orderin()
    {
        $this->db->where(['status' => '3']);
        $query = $this->db->get('tr_order');
        return $query->result(); 
    }

    public function pelapak()
	{
        $query = $this->db->get_where('users', ['level' => '3']);
		return $query->result();
	}


    public function customer()
	{
         $query = $this->db->get_where('users', ['level' => '2']);
		return $query->result();
	}



       public function bank()
    {
         $query = $this->db->get_where('users', ['level' => '4']);
        return $query->result();
    }   



    public function edit_form($id){
        $query = $this->db->get_where('tbl_produk', ['id_produk' => $id]);
        return $query->row();
    }


    public function update_produk(){
        $kondisi = ['id_produk' => $this->input->post('id_produk')];
        $data = [
                    'nama_produk' => $this->input->post('nama_produk'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'harga' => $this->input->post('harga')
                ];

        $this->db->update('tbl_produk', $data, $kondisi);
    }


    public function hapus_produk($id)
    {
        $this->db->delete('tbl_detail_order', ['id_produk' => $id]);
        $this->db->delete('tbl_produk', ['id_produk' => $id]);
    }



    public function get_pelapak($id){
        $query = $this->db->get_where('users', ['id_user' => $id]);
        return $query->row();
    }



    public function update_pelapak(){
        $kondisi = ['id_user' => $this->input->post('id_user')];
        $data = [
                    'name' => $this->input->post('name'),
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'kelas' => $this->input->post('kelas'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'contact' => $this->input->post('contact'),
                    'role' => $this->input->post('rule'),
                    'level' => $this->input->post('level')  
                ];

        $this->db->update('users', $data, $kondisi);
    }



    public function update_customer(){
        $kondisi = ['id_user' => $this->input->post('id_user')];
        $data = [
                    'name' => $this->input->post('name'),
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'kelas' => $this->input->post('kelas'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'contact' => $this->input->post('contact'),
                    'role' => $this->input->post('rule'),
                    'level' => $this->input->post('level') 
                ];

        $this->db->update('users', $data, $kondisi);
    }


    public function update_bmt(){
        $kondisi = ['id_user' => $this->input->post('id_user')];
        $data = [
                    'name' => $this->input->post('name'),
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'kelas' => $this->input->post('kelas'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'contact' => $this->input->post('contact'),
                    'role' => $this->input->post('rule'),
                    'level' => $this->input->post('level')  
                ];

        $this->db->update('users', $data, $kondisi);
    }




    public function hapus_pelapak($id)
    {
        $this->db->delete('tbl_pelanggan', ['id_user' => $id]);
        $this->db->delete('tbl_detail_order', ['id_user' => $id]);
        $this->db->delete('tbl_produk', ['kategori' => $id]);
        $this->db->delete('users', ['id_user' => $id]);
    }    



    public function hapus_customer($id)
    {
        
        $this->db->delete('tbl_pelanggan', ['id_user' => $id]);
        $this->db->delete('tbl_detail_order', ['id_user' => $id]);
        $this->db->delete('users', ['id_user' => $id]);
    }


    public function tambahpelapak(){
    }


    public function edit_customer($id){
        $query = $this->db->get_where('users', ['id_user' => $id]);
        return $query->row();
    }




// Fungsi untuk melakukan proses upload file
  public function upload_file($filename){
    $this->load->library('upload'); // Load librari upload
    
    $config['upload_path'] = './excel/';
    $config['allowed_types'] = 'xlsx';
    $config['overwrite'] = true;
    $config['file_name'] = $filename;
  
    $this->upload->initialize($config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
    }

    

 public function viewCS(){
    $table = 'users';
    $where = 'Customer';
    return $this->db->get_where('users', array('role' => $where))->result(); // Tampilkan semua data yang ada di tabel users
  }


public function viewPL(){
    $table = 'users';
    $where = 'Pelapak';
    return $this->db->get_where('users', array('role' => $where))->result(); // Tampilkan semua data yang ada di tabel users
  }


public function insert_multiple($data){
    $this->db->insert_batch('users', $data);
}



    public function tambah_tambah($table_name,$data){
            //$this->db->insert('image', $data);
            $tambah = $this->db->insert($table_name,$data);
        
            return $tambah;
    }




    public function jumlahcs(){
 
    $this->db->select('role');
    $this->db->where('level','2');
    $q=$this->db->get('users');
    $count=$q->result();
    return count($count);
        
    }


    public function jumlahbmt(){
 
    $this->db->select('role');
    $this->db->where('level','4');
    $q=$this->db->get('users');
    $count=$q->result();
    return count($count);
        
    }



    public function jumlahpl(){
 
    $this->db->select('role');
    $this->db->where('level','3');
    $q=$this->db->get('users');
    $count=$q->result();
    return count($count);
        
    }


    public function jumlahpr(){
 
    $this->db->select('kategori');
    $q=$this->db->get('tbl_produk');
    $count=$q->result();
    return count($count);
        
    }

    public function report_line()
	{
		$query = $this->db->query("SELECT NAME,COUNT(id_produk) AS produk FROM produk GROUP BY NAME");

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

    public function report_bar()
	{
		$query = $this->db->query("SELECT name,SUM(harga) AS harga FROM report WHERE status = '3' GROUP BY name");

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $da) {
				$hasil[] = $da;
			}
			return $hasil;
		}
	}


public function all_order($id){
  $this->db->select('*');
  $this->db->from('report');
  $this->db->where('id_DO', $id);
  $query = $this->db->get();
  return $query;
}

}?>