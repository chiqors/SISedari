<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kupon extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->jabatan != 'Manager') {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data_get = $this->kupon_model->get_list();
		$data = array(
			'info' => $data_get,
			'activeMenu' => 'kupon',
            'title' => 'Kupon'
        );
		$this->slice->view('entities.manager.pages.kupon.index', $data);
	}

	public function create() {
		$data = array(
            'title' => 'Tambah Kupon'
        );
		$this->slice->view('entities.manager.pages.kupon.form', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
		$this->form_validation->set_rules('tanggal_hangus', 'Tanggal Hangus', 'required');
		$this->form_validation->set_rules('diskon', 'Diskon Kupon', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('manager/kupon/create');
		} else {
			$this->kupon_model->store();
			$this->session->set_flashdata('success', 'Kupon baru telah ditambahkan');
			redirect('manager/kupon');
		}
	}

	public function edit($id) {
		$data_get = $this->kupon_model->get_data($id);
		$data = array(
			'info' => $data_get,
            'title' => 'Ubah Kupon #'.$id
        );
		$this->slice->view('entities.manager.pages.kupon.form', $data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
		$this->form_validation->set_rules('tanggal_hangus', 'Tanggal Hangus', 'required');
		$this->form_validation->set_rules('diskon', 'Diskon Kupon', 'required|decimal');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('manager/kupon/edit/'.$id);
		} else {
			$this->kupon_model->update($id);
			$this->session->set_flashdata('success', 'Kupon '.$id.' telah diperbaharui');
			redirect('manager/kupon');
		}
	}

	public function destroy($id)
	{
		$this->kupon_model->destroy($id);
		$this->session->set_flashdata('success', 'Kupon '.$id.' telah terhapus');
		redirect('manager/kupon');
	}
}
