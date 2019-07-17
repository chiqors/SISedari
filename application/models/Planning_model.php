<?php

class Planning_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_list($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('planning');
			return $query->result();
		}
		$this->db->like('judul', $search);
		$query = $this->db->get('planning');
		return $query->result();
	}

	public function get_data($info)
	{
		$query = $this->db->get_where('planning', array('id' => $info));
		return $query->row();
	}

	public function store()
	{
		$data = array(
			'judul' => $this->input->post('judul'),
			'konten' => $this->input->post('konten'),
			'tanggal_promo_mulai' => $this->input->post('tanggal_promo_mulai'),
			'tanggal_promo_selesai' => $this->input->post('tanggal_promo_selesai'),
			'nip_karyawan' => $this->input->post('nip_karyawan'),
			'status' => $this->input->post('status')
		);
		return $this->db->insert('planning', $data);
	}

	public function update($id)
	{
		$data = array(
			'judul' => $this->input->post('judul'),
			'konten' => $this->input->post('konten'),
			'tanggal_promo_mulai' => $this->input->post('tanggal_promo_mulai'),
			'tanggal_promo_selesai' => $this->input->post('tanggal_promo_selesai'),
			'nip_karyawan' => $this->input->post('nip_karyawan'),
			'status' => $this->input->post('status')
		);
		$this->db->where('id', $id);
		return $this->db->update('planning', $data);
	}

	public function destroy($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('planning');
		return true;
	}
	
}
