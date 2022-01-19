<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class m_keranjang extends CI_Model {

	public function get_produk_all()
	{
		$query = $this->db->get('produk');
		return $query->result_array();
	}

	public function get_deskripsi($id)
	{
		$query = $this->db->where('id_user',$id);
		return $this->db->get('produk')->row();
	}

	public function get_produk_kategori($id)
	{
		if($id>0)
			{
				$this->db->where('id_user',$id);
			}
		$query = $this->db->get('produk');
		return $query->result_array();
	}

    
    public function code_otomati(){
            $this->db->select('Right(tbl_detail_order.id,3) as kode',FALSE);
            $this->db->order_by('id','desc');
            $this->db->limit(1);
            $query=$this->db->get('tbl_detail_order');
                if($query->num_rows()<>0){
                    $data=$query->row();
                    $kode=intval($data->kode)+1;
                }
                else{
                    $kode=1;
                }
                $kodemax=str_pad($kode,3,"0",STR_PAD_LEFT);
                $kodejadi = "D".$kodemax;
                return $kodejadi;
}
    
	public function status_done()
	{
		$this->db->where(['status' => '3']);
        $this->db->where(['id_user' => $this->session->userdata('id_user')]);
        $query = $this->db->get('detail_order');
		return $query->result(); 
	}
	public function history()
	{
		$this->db->where(['status' => '3']);
        $this->db->where(['id_pembeli' => $this->session->userdata('id_user')]);
        $query = $this->db->get('tr_order');
		return $query->result(); 
	}
    public function status_not()
	{
		$this->db->where(['status' => '2']);
        $this->db->where(['id_user' => $this->session->userdata('id_user')]);
        $query = $this->db->get('detail_order');
		return $query->result();
	}
    public function status_pending()
    {
        $this->db->where(['status' => '1']);
        $this->db->where(['id_user' => $this->session->userdata('id_user')]);
        $query = $this->db->get('detail_order');
        return $query->result();
    }
    public function status_batal()
	{
		$this->db->where(['status' => '4']);
		$this->db->where(['id_pembeli' => $this->session->userdata('id_user')]);
		$query = $this->db->get('tr_order');
		return $query->result();
	}
    
	
	public function get_kategori_all()
	{
        $query = $this->db->get('kategori');
		return $query->result_array();
	}
	
	public  function get_produk_id($id)
	{
		$this->db->select('tbl_produk.*,nama_kategori');
		$this->db->from('tbl_produk');
		$this->db->join('tbl_kategori', 'kategori=tbl_kategori.id','left');
   		$this->db->where('id_produk',$id);
        return $this->db->get();
    }	
	
	public function tambah_pelanggan($data)
	{
		$this->db->insert('tbl_pelanggan', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}
    
	
	public function tambah_order($data)
	{
		$this->db->insert('tbl_order', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}
	
	public function tambah_detail_order($data)
	{
		$this->db->insert('tbl_detail_order', $data);
	}

    public function update_topup(){
        $kondisi = ['id_user' => $this->input->post('id_user')];
        $data = [
            'Dompet' => $this->input->post('Dompet')];

        $this->db->update('users', $data, $kondisi);
    }

     public function hapus_detail($id)
	{
		$this->db->delete('tbl_detail_order', ['id_DO' => $id]);
	}
	public function batalin($id)
	{
		$this->db->delete('tbl_order', ['id_DO' => $id]);
	}

	public function deskripsi($id){
		 $query = $this->db->get_where('produk', ['id_produk' => $id]);
        return $query->row();
	}

	public function cari_produk($kategori,$cari){
			$query = $this->db->query("SELECT * FROM produk WHERE ".$kategori." LIKE '%".$cari."%'");
			return $query->result();
	}
	public function jumlah($kategori,$cari){
			$query = $this->db->query("SELECT * FROM produk WHERE ".$kategori." LIKE '%".$cari."%'");
			return $query->num_rows();
	}



public function all_order($id){
  $this->db->select('*');
  $this->db->from('report');
  $this->db->where('id_DO', $id);
  $query = $this->db->get();
  return $query;
}










	
}
?>
