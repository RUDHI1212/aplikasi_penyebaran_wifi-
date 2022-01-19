<?php

class m_pelapak extends CI_Model
{

	public function get_all_data()
	{
		//$query = $this->db->get('items_seblak');
		$query = $this->db->get_where('produk', ['id_user' => $this->session->userdata('id_user')]);
		return $query->result();
	}

	function code_otomatis()
	{
		$this->db->select('Right(tbl_produk.id_produk,3) as kode', FALSE);
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit(1);
		$query = $this->db->get('tbl_produk');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodejadi = "P" . $kodemax;
		return $kodejadi;
	}



	public function get_list_order()
	{
		$user = $this->session->userdata('id_user');
		$kondisi = "kategori = $user";
		$query = $this->db->query("SELECT * FROM detail_order WHERE " . $kondisi . " AND tgl_beli = CURDATE() ORDER BY tgl_beli ASC");
		return $query->result();
	}


	public function get_detail_order($id)
	{
		$query = $this->db->get_where('detail_order', ['id_DO' => $id]);
		return $query->row();
	}


	public function tambahdata($table_name, $data)
	{
		//$this->db->insert('image', $data);
		$tambah = $this->db->insert($table_name, $data);

		return $tambah;
	}

	public function batal($id)
	{
		$this->db->delete('tbl_detail_order', ['id_DO' => $id]);
	}


	public function edit($id)
	{
		$query = $this->db->get_where('tbl_produk', ['id_produk' => $id]);
		return $query->row();
	}

	public function update_produk()
	{
		$kondisi = ['id_produk' => $this->input->post('id_produk')];
		$data = [
			'nama_produk' => $this->input->post('nama_produk'),
			'deskripsi' => $this->input->post('deskripsi'),
			'harga' => $this->input->post('harga'),
			'status' => $this->input->post('status')

		];

		$this->db->update('tbl_produk', $data, $kondisi);
	}

	public function update_detail_order()
	{
		$kondisi = ['id_DO' => $this->input->post('id_DO')];
		$data = [
			'status' => $this->input->post('status')

		];

		$this->db->update('detail_order', $data, $kondisi);

		if ($this->input->post('status') == 4) {
			$this->db->delete('tbl_detail_order', $kondisi);
		}
	}

	public function hapus($id)
	{
		$this->db->delete('tbl_detail_order', ['id_produk' => $id]);
		$this->db->delete('tbl_produk', ['id_produk' => $id]);
	}

	public function report_line()
	{
		$user = $this->session->userdata('id_user');
		$kondisi = "id_user = $user";
		$query = $this->db->query("SELECT produk,SUM(harga) AS harga FROM report WHERE " . $kondisi . " AND status = '3' GROUP BY produk");

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

	public function penghasilan_harian()
	{
		$user = $this->session->userdata('id_user');
		$kondisi = " id_user = $user";
		$sql = "SELECT SUM(harga) AS harga FROM tr_order WHERE " . $kondisi . " AND tgl_beli = CURDATE() AND status = '3'";
		$result = $this->db->query($sql);
		return $result->row()->harga;
	}

	public function penghasilan_hariani($id)
	{
		$user = $this->session->userdata('id_user');
		$kondisi = " id_user = $user";
		$sql = "SELECT SUM(harga) AS harga FROM tr_order WHERE " . $kondisi . " AND tgl_beli = CURDATE() AND status = '3'";
		$result = $this->db->query($sql);
		return $result;
	}



	public function penghasilan_mingguan()
	{
		$user = $this->session->userdata('id_user');
		$kondisi = " id_user = $user";
		$sql = "SELECT SUM(harga) AS harga FROM tr_order WHERE " . $kondisi . " AND YEARWEEK(tgl_beli) AND status = '3'";
		$result = $this->db->query($sql);
		return $result->row()->harga;
	}

	public function penghasilan_bulanan()
	{
		$user = $this->session->userdata('id_user');
		$kondisi = " id_user = $user";
		$sql = "SELECT SUM(harga) AS harga FROM tr_order WHERE " . $kondisi . " AND MONTH(tgl_beli) AND status = '3'";
		$result = $this->db->query($sql);
		return $result->row()->harga;
	}
	public function penghasilan_tahunan()
	{
		$user = $this->session->userdata('id_user');
		$kondisi = " id_user = $user";
		$sql = "SELECT SUM(harga) AS harga FROM tr_order WHERE " . $kondisi . " AND YEAR(tgl_beli) AND status = '3'";
		$result = $this->db->query($sql);
		return $result->row()->harga;
	}

	public function notifikasi()
	{
		$user = $this->session->userdata('id_user');
		$kondisi = " kategori = $user";
		$sql = "SELECT * FROM detail_order WHERE " . $kondisi . " AND tgl_beli = CURDATE() ORDER BY tgl_beli ASC LIMIT 4";
		$result = $this->db->query($sql);
		return $result->result();
	}

	public function hitung()
	{
		$user = $this->session->userdata('id_user');
		$kondisi = " kategori = $user";
		$sql = "SELECT COUNT(id_DO) AS id_DO FROM detail_order WHERE " . $kondisi . " AND tgl_beli = CURDATE() AND status = '1'";
		$result = $this->db->query($sql);
		return $result->row()->id_DO;
	}

		public function history()
	{
		$this->db->where(['status' => '3']);
        $this->db->where(['id_user' => $this->session->userdata('id_user')]);
        $query = $this->db->get('tr_order');
		return $query->result(); 
	}


public function all_order($id){
  $this->db->select('*');
  $this->db->from('report');
  $this->db->where('id_DO', $id);
  $query = $this->db->get();
  return $query;
}


}
