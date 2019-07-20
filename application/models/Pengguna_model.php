<?php

class Pengguna_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_list($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('pengguna');
			return $query->result();
		}
		$this->db->like('nip', $search);
		$query = $this->db->get('pengguna');
		return $query->result();
	}

	public function get_data($info)
	{
		$query = $this->db->get_where('pengguna', array('nip' => $info));
		return $query->row();
	}

	public function do_login()
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('pengguna');
		return $query->row();
	}

	public function store()
	{
		$data = array(
			'nip' => $this->input->post('nip'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'kontak' => $this->input->post('kontak'),
			'jabatan' => $this->input->post('jabatan'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		);
		return $this->db->insert('pengguna', $data);
	}

	public function update($id)
	{
		if (empty($this->input->post('password'))) {
			$data = array(
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'kontak' => $this->input->post('kontak'),
				'jabatan' => $this->input->post('jabatan'),
				'username' => $this->input->post('username')
			);
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'kontak' => $this->input->post('kontak'),
				'jabatan' => $this->input->post('jabatan'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
			);
		}
		$this->db->where('nip', $id);
		return $this->db->update('pengguna', $data);
	}

	public function destroy($id)
	{
		$this->db->where('nip', $id);
		$this->db->delete('pengguna');
		return true;
	}
	
}
