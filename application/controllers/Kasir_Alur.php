<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir_Alur extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->jabatan != 'Kasir') {
			redirect('auth/login');
		}
	}

	public function start()
	{
		$id_transaksi = $this->alur_model->store_transaksi_id();
		$alurdata = array(
			'info_alur_total_semua_harga_menu' => 0,
			'info_alur_id_transaksi' => $id_transaksi
		);
		$this->session->set_userdata($alurdata);
		redirect('kasir/alur/transaksi/detail_transaksi');
	}

	public function detail_transaksi()
	{
		$id_transaksi = $this->session->info_alur_id_transaksi;
		$data_get1 = $this->alur_model->get_list_menu_available();
		$data_get2 = $this->alur_model->get_list_transaksi_menu($id_transaksi);
		$data_get3 = $this->alur_model->get_data_sub_total_transaksi($id_transaksi);
		$data = array(
			'info_menu' => $data_get1,
			'info_transaksi_menu' => $data_get2,
			'info_sub_total' => $data_get3,
			'info_transaksi' => $id_transaksi,
			'success' => 'Inisialisasi alur data transaksi telah dimulai. Mohon jangan tinggalkan halaman ini sampai alur selesai!',
            'title' => 'Alur (Detail Transaksi)'
        );
		$this->slice->view('entities.kasir.pages.alur.form_detail_transaksi', $data);
	}

	public function store_detail_transaksi()
	{
		$this->form_validation->set_rules('id_transaksi', 'ID Transaksi', 'required');
		$this->form_validation->set_rules('id_menu', 'ID Menu', 'required');
		$this->form_validation->set_rules('jumlah_beli', 'Jumlah Beli', 'required|numeric');
		$this->form_validation->set_rules('total_harga', 'Total Harga', 'required|max_length[7]|numeric');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('kasir/alur/transaksi/detail_transaksi');
		} else {
			if ($this->input->post('submitForm') == 'loop') {
				$this->alur_model->store_detail_transaksi();
				$alurdata = array(
					'info_alur_total_semua_harga_menu' => $this->session->info_alur_total_semua_harga_menu + $this->input->post('total_harga'),
					'info_alur_id_transaksi'  => $this->input->post('id_transaksi')
				);
				$this->session->set_flashdata('success', 'Detail Transaksi berhasil didaftarkan, Silahkan ulangi proses detail transaksi sampai memenuhi');
				redirect('kasir/alur/transaksi/detail_transaksi');
			} else {
				$this->alur_model->store_detail_transaksi();
				$alurdata = array(
					'info_alur_total_semua_harga_menu' => $this->session->info_alur_total_semua_harga_menu + $this->input->post('total_harga'),
					'info_alur_id_transaksi'  => $this->input->post('id_transaksi')
				);
				$this->session->set_userdata($alurdata);
				$this->session->set_flashdata('success', 'Detail Transaksi berhasil untuk menyelesaikan pendaftaran, Silahkan Isi bagian terakhir, Transaksi');
				redirect('kasir/alur/transaksi/transaksi');
			}
		}
	}

	public function transaksi()
	{
		if (empty($this->session->info_alur_total_semua_harga_menu)) {
			$this->session->set_flashdata('error', 'Anda harus mengikuti alur transaksi secara bertahap');
			redirect('kasir/alur/transaksi/start');
		}
		$data_get1 = $this->alur_model->get_data_sub_total_transaksi($this->session->info_alur_id_transaksi);
		$info_sub_total_transaksi = $data_get1->sub_total;
		$data_get2 = $this->alur_model->get_list_kupon_available();
		$data = array(
			'info_kupon' => $data_get2,
			'info_sub_total_transaksi' => $info_sub_total_transaksi,
            'title' => 'Alur (Transaksi)'
        );
		$this->slice->view('entities.kasir.pages.alur.form_transaksi', $data);
	}

	public function store_transaksi($id)
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('sub_total', 'Sub Total Pembayaran', 'required|max_length[7]|numeric');
		$this->form_validation->set_rules('kupon', 'ID Kupon', 'required');
		$this->form_validation->set_rules('total_harga', 'Total Harga', 'required|max_length[7]|numeric');
		$this->form_validation->set_rules('bayar', 'Bayar', 'required|max_length[7]|numeric');
		$this->form_validation->set_rules('kembalian', 'Kembalian', 'required|max_length[7]|numeric');
		$this->form_validation->set_rules('kasir', 'NIP Karyawan (Kasir)', 'required|max_length[10]');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('kasir/alur/transaksi/transaksi');
		} else {
			$this->alur_model->store_transaksi($id);
			$alurdata = array('info_alur_total_semua_harga_menu', 'info_alur_id_transaksi');
			$this->session->unset_userdata($alurdata);
			$this->session->set_flashdata('success', 'Alur Transaksi berhasil diproses! Anda dikembalikan ke halaman beranda');
			redirect('');
		}
	}

}
