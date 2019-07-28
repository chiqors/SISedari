<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->jabatan != 'Kasir') {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data_get = $this->transaksi_model->get_list();
		$data = array(
			'info' => $data_get,
			'activeMenu' => 'transaksi',
            'title' => 'Transaksi'
        );
		$this->slice->view('entities.kasir.pages.transaksi.index', $data);
	}

	public function create() 
	{
		$data = array(
            'title' => 'Tambah Transaksi'
        );
		$this->slice->view('entities.kasir.pages.transaksi.form', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('sub_total', 'Sub Total Pembayaran', 'required|max_length[7]|numeric');
		$this->form_validation->set_rules('kupon', 'ID Kupon', 'required');
		$this->form_validation->set_rules('total_harga', 'Total Harga', 'required|max_length[7]|numeric');
		$this->form_validation->set_rules('bayar', 'Bayar', 'required|max_length[7]|numeric');
		$this->form_validation->set_rules('kembalian', 'Kembalian', 'required|max_length[7]|numeric');
		$this->form_validation->set_rules('kasir', 'NIP Karyawan (Kasir)', 'required|max_length[10]');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('kasir/transaksi/create');
		} else {
			$this->tranksaksi_model->store();
			$this->session->set_flashdata('success', 'Transaksi baru telah ditambahkan');
			redirect('kasir/transaksi');
		}
	}

	public function show($id) 
	{
		$data_get1 = $this->transaksi_model->get_data($id);
		$data_get2 = $this->transaksi_model->get_list_child($id);
		$data = array(
			'info' => $data_get1,
			'info2' => $data_get2,
            'title' => 'Tampil Transaksi #'.$id
        );
		$this->slice->view('entities.kasir.pages.transaksi.show', $data);
	}

	public function edit($id) 
	{
		$data_get = $this->transaksi_model->get_data($id);
		$data = array(
			'info' => $data_get,
            'title' => 'Ubah Transaksi #'.$id
        );
		$this->slice->view('entities.kasir.pages.transaksi.form', $data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('sub_total', 'Sub Total Pembayaran', 'required|max_length[7]|numeric');
		$this->form_validation->set_rules('kupon', 'ID Kupon', 'required');
		$this->form_validation->set_rules('total_harga', 'Total Harga', 'required|max_length[7]|numeric');
		$this->form_validation->set_rules('bayar', 'Bayar', 'required|max_length[7]|numeric');
		$this->form_validation->set_rules('kembalian', 'Kembalian', 'required|max_length[7]|numeric');
		$this->form_validation->set_rules('kasir', 'NIP Karyawan (Kasir)', 'required|max_length[10]');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('kasir/transaksi/edit/'.$id);
		} else {
			$this->transaksi_model->update($id);
			$this->session->set_flashdata('success', 'Transaksi #'.$id.' telah diperbaharui');
			redirect('kasir/transaksi');
		}
	}

	public function destroy($id)
	{
		$this->transaksi_model->destroy($id);
		$this->session->set_flashdata('success', 'Transaksi #'.$id.' beserta detailnya telah dihapus');
		redirect('kasir/transaksi');
	}

	// DETAIL TRANSAKSI

	public function detail_create($id) 
	{
		$data_get = $this->transaksi_model->get_data($id);
		$data = array(
			'info' => $data_get,
            'title' => 'Tambah Detail Transaksi'
        );
		$this->slice->view('entities.kasir.pages.transaksi.detail_form', $data);
	}

	public function detail_store()
	{
		$this->form_validation->set_rules('id_transaksi', 'ID Transaksi', 'required');
		$this->form_validation->set_rules('id_menu', 'ID Menu', 'required');
		$this->form_validation->set_rules('jumlah_beli', 'Jumlah Beli', 'required|numeric');
		$this->form_validation->set_rules('total_harga', 'Total Harga', 'required|max_length[7]|numeric');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('kasir/transaksi/detail_create');
		} else {
			$this->tranksaksi_model->store_child();
			$this->session->set_flashdata('success', 'Detail Transaksi baru telah ditambahkan');
			redirect('kasir/transaksi/show/'.$this->input->post('id_transaksi'));
		}
	}

	public function detail_edit($id) 
	{
		$data_get = $this->transaksi_model->get_data_child($id);
		$data = array(
			'info' => $data_get,
            'title' => 'Ubah Detail Transaksi #'.$id
        );
		$this->slice->view('entities.kasir.pages.transaksi.detail_form', $data);
	}

	public function detail_update($id)
	{
		$this->form_validation->set_rules('id_transaksi', 'ID Transaksi', 'required');
		$this->form_validation->set_rules('id_menu', 'ID Menu', 'required');
		$this->form_validation->set_rules('jumlah_beli', 'Jumlah Beli', 'required|numeric');
		$this->form_validation->set_rules('total_harga', 'Total Harga', 'required|max_length[7]|numeric');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('kasir/transaksi/detail_update/'.$id);
		} else {
			$this->tranksaksi_model->update_child();
			$this->session->set_flashdata('success', 'Detail Transaksi #'.$id.' telah diperbaharui');
			redirect('kasir/transaksi/show/'.$this->input->post('id_transaksi'));
		}
	}

	public function detail_destroy($id)
	{
		$data_get = $this->transaksi_model->get_data($id);
		$this->tranksaksi_model->destroy_child($id);
		$this->session->set_flashdata('success', 'Detail Transaksi #'.$id.' telah dihapus');
		redirect('kasir/transaksi/show/'.$data_get->id);
	}

}
