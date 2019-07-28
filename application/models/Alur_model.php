<?php

class Alur_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function store_transaksi_id()
	{
		$data = array(
			'tanggal' => null,
			'sub_total' => null,
			'kupon' => null,
			'total_harga' => null,
			'bayar' => null,
			'kembalian' => null,
			'kasir' => null
		);
		$this->db->insert('transaksi', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function get_list_transaksi_menu($id, $search = FALSE)
	{
		if ($search === FALSE) {
			$SQL = "
					SELECT menu.nama_menu, menu.harga, detail_transaksi.jumlah_beli, total_harga
					FROM menu JOIN detail_transaksi ON menu.id = detail_transaksi.id_menu
					WHERE detail_transaksi.id_transaksi = $id
			";
			$query = $this->db->query($SQL);
			return $query->result();
		}
	}

	public function get_data_sub_total_transaksi($id, $search = FALSE)
	{
		if ($search === FALSE) {
			$this->db->select('sum(detail_transaksi.total_harga) AS sub_total');
			$query = $this->db->get_where('detail_transaksi', array('id_transaksi' => $id));
			return $query->row();
		}
	}

	public function get_list_menu_available($search = FALSE)
	{
		if ($search === FALSE) {
			$this->db->where('stok >', '0');
			$query = $this->db->get('menu');
			return $query->result();
		}
	}

	public function get_data_menu_available($search = FALSE)
	{
		if ($search === FALSE) {
			$this->db->where('stok >', '0');
			$query = $this->db->get('menu');
			return $query->result();
		}
	}

	public function store_detail_transaksi()
	{
		$data = array(
			'id_transaksi' => $this->input->post('id_transaksi'),
			'id_menu' => $this->input->post('id_menu'),
			'jumlah_beli' => $this->input->post('jumlah_beli'),
			'total_harga' => $this->input->post('total_harga')
		);
		return $this->db->insert('detail_transaksi', $data);
	}

	public function get_list_kupon_available($search = FALSE)
	{
		if ($search === FALSE) {
			$SQL = "
					SELECT * 
					FROM kupon 
					WHERE CURRENT_DATE >= tanggal_mulai AND CURRENT_DATE <= tanggal_hangus
			";
			$query = $this->db->query($SQL);
			return $query->result();
		}
	}

	public function store_transaksi($id)
	{
		$data = array(
			'tanggal' => $this->input->post('tanggal'),
			'sub_total' => $this->input->post('sub_total'),
			'kupon' => $this->input->post('kupon'),
			'total_harga' => $this->input->post('total_harga'),
			'bayar' => $this->input->post('bayar'),
			'kembalian' => $this->input->post('kembalian'),
			'kasir' => $this->input->post('kasir')
		);
		$this->db->where('id', $id);
		return $this->db->update('transaksi', $data);
	}

}
