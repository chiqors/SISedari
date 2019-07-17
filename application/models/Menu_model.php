<?php

class Menu_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_list($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('menu');
			return $query->result();
		}
		$this->db->like('nama_menu', $search);
		$query = $this->db->get('menu');
		return $query->result();
	}

	public function get_data($info)
	{
		$query = $this->db->get_where('menu', array('id' => $info));
		return $query->row();
	}

	public function store()
	{
		$data = array(
			'nama_menu' => $this->input->post('nama_menu'),
			'harga' => $this->input->post('harga'),
			'stok' => $this->input->post('stok')
		);
		return $this->db->insert('menu', $data);
	}

	public function update($id)
	{
		$data = array(
			'nama_menu' => $this->input->post('nama_menu'),
			'harga' => $this->input->post('harga'),
			'stok' => $this->input->post('stok')
		);
		$this->db->where('id', $id);
		return $this->db->update('menu', $data);
	}

	public function destroy($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('menu');
		return true;
	}
	
}
