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
		$data = array(
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

	public function show($id) 
	{
		$data = array(
            'title' => 'Tampil Transaksi'
        );
		$this->slice->view('entities.kasir.pages.transaksi.show', $data);
	}

	public function edit($id) 
	{
		$data = array(
			'info' => 'edit',
            'title' => 'Ubah Transaksi'
        );
		$this->slice->view('entities.kasir.pages.transaksi.form', $data);
	}

	// DETAIL TRANSAKSI

	public function detail_create() 
	{
		$data = array(
            'title' => 'Tambah Detail Transaksi'
        );
		$this->slice->view('entities.kasir.pages.transaksi.detail_form', $data);
	}

	public function detail_edit($id) 
	{
		$data = array(
			'info' => 'edit',
            'title' => 'Ubah Detail Transaksi'
        );
		$this->slice->view('entities.kasir.pages.transaksi.detail_form', $data);
	}
}
