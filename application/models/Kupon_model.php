<?php

class Kupon_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_list($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('kupon');
			return $query->result();
		}
		$this->db->like('tanggal_mulai', $search);
		$query = $this->db->get('kupon');
		return $query->result();
	}

	public function get_data($info)
	{
		$query = $this->db->get_where('kupon', array('id' => $info));
		return $query->row();
	}

	public function store()
	{
		$data = array(
			'tanggal_mulai' => $this->input->post('tanggal_mulai'),
			'tanggal_hangus' => $this->input->post('tanggal_hangus'),
			'diskon' => $this->input->post('diskon')
		);
		return $this->db->insert('kupon', $data);
	}

	public function update($id)
	{
		$data = array(
			'tanggal_mulai' => $this->input->post('tanggal_mulai'),
			'tanggal_hangus' => $this->input->post('tanggal_hangus'),
			'diskon' => $this->input->post('diskon')
		);
		$this->db->where('id', $id);
		return $this->db->update('kupon', $data);
	}

	public function destroy($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('kupon');
		return true;
	}
	
}
