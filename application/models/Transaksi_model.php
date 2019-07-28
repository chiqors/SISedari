<?php

class Transaksi_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_list($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('transaksi');
			return $query->result();
		}
	}

	public function get_list_child($id, $search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get_where('detail_transaksi', array('id_transaksi' => $id));
			return $query->result();
		}
	}

	public function get_data($info)
	{
		$query = $this->db->get_where('transaksi', array('id' => $info));
		return $query->row();
	}

	public function get_data_child($info)
	{
		$query = $this->db->get_where('detail_transaksi', array('id' => $info));
		return $query->row();
	}

	public function store()
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
		return $this->db->insert('transaksi', $data);
	}

	public function update($id)
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

	public function destroy($id)
	{
		$query2 = $this->db->where('id_transaksi', $id);
		$result2 = $query2->delete('detail_transaksi');
		$query1 = $this->db->where('id', $id);
		$result1 = $query1->delete('transaksi');
		return true;
	}
	
	// Child CRUD

	public function store_child()
	{
		$data = array(
			'id_transaksi' => $this->input->post('id_transaksi'),
			'id_menu' => $this->input->post('id_menu'),
			'jumlah_beli' => $this->input->post('jumlah_beli'),
			'total_harga' => $this->input->post('total_harga')
		);
		return $this->db->insert('detail_transaksi', $data);
	}

	public function update_child($id)
	{
		$data = array(
			'id_transaksi' => $this->input->post('id_transaksi'),
			'id_menu' => $this->input->post('id_menu'),
			'jumlah_beli' => $this->input->post('jumlah_beli'),
			'total_harga' => $this->input->post('total_harga')
		);
		$this->db->where('id', $id);
		return $this->db->update('detail_transaksi', $data);
	}

	public function destroy_child($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('detail_transaksi');
		return true;
	}
}
