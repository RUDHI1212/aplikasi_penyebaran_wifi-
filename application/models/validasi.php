<?php
class validasi extends CI_Model{

function login($username,$password){

  $this->db->select('*');
  $this->db->from('users');
  $this->db->where('username', $username);
  $this->db->where('password', $password);
  $this->db->limit(1);

  $query = $this->db->get();
  return $query->result();
}

function aaaa($username){

  $this->db->select('*');
  $this->db->from('users');
	$this->db->where('username', $username);
  $this->db->limit(1);

  $query = $this->db->get();
  return $query->result();
}

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

	public function get_kategori_all()
	{
        $query = $this->db->get('kategori');
		return $query->result_array();
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
}
