<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CEO_Planning extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->jabatan != 'CEO') {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data_get = $this->planning_model->get_list();
		$data = array(
			'info' => $data_get,
			'activeMenu' => 'planning',
            'title' => 'Planning'
        );
		$this->slice->view('entities.ceo.pages.planning.index', $data);
	}

	public function create()
	{
		$data = array(
            'title' => 'Tambah Planning Baru'
        );
		$this->slice->view('entities.ceo.pages.planning.form', $data);
	}

	public function show($id) {
		$data_get = $this->planning_model->get_data($id);
		if(empty($data_get)) {
			redirect('ceo/planning');
		}
		$data = array(
			'info' => $data_get,
            'title' => 'Tampil Planning #'.$id
        );
		$this->slice->view('entities.ceo.pages.planning.show', $data);
	}

	public function edit($id) {
		$data_get = $this->planning_model->get_data($id);
		if(empty($data_get)) {
			redirect('ceo/planning');
		}
		$data = array(
			'info' => $data_get,
            'title' => 'Ubah Planning #'.$id
        );
		$this->slice->view('entities.ceo.pages.planning.form', $data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('konten', 'Konten', 'required|min_length[30]');
		$this->form_validation->set_rules('tanggal_promo_mulai', 'Tanggal Promo Mulai', 'required');
		$this->form_validation->set_rules('tanggal_promo_selesai', 'Tanggal Promo Selesai', 'required');
		$this->form_validation->set_rules('status', 'Status Planning', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('ceo/planning/edit/'.$id);
		} else {
			$this->planning_model->update($id);
			$this->session->set_flashdata('success', 'Planning '.$id.' telah diperbaharui');
			redirect('ceo/planning');
		}
	}

	public function destroy($id)
	{
		$this->planning_model->destroy($id);
		$this->session->set_flashdata('success', 'Planning '.$id.' telah dihapus');
		redirect('ceo/planning');
	}
}
