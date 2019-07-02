<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	
	public function index()
	{
		$data = array(
			'activeMenu' => 'entities',
			'activeSubMenu' => 'transaksi',
            'title' => 'Transaksi'
        );
		$this->slice->view('pages.transaksi.index', $data);
	}

	public function create() 
	{
		$data = array(
            'title' => 'Create Transaksi'
        );
		$this->slice->view('pages.transaksi.form', $data);
	}

	public function show($id) 
	{
		$data = array(
            'title' => 'Show Transaksi'
        );
		$this->slice->view('pages.transaksi.show', $data);
	}

	public function edit($id) 
	{
		$data = array(
			'info' => 'edit',
            'title' => 'Edit Transaksi'
        );
		$this->slice->view('pages.transaksi.form', $data);
	}

	// DETAIL TRANSAKSI

	public function detail()
	{
		$data = array(
			'activeMenu' => 'entities',
			'activeSubMenu' => 'transaksi',
            'title' => 'Transaksi'
        );
		$this->slice->view('pages.transaksi.detail', $data);
	}

	public function detail_create() 
	{
		$data = array(
            'title' => 'Create Transaksi'
        );
		$this->slice->view('pages.transaksi.detail_form', $data);
	}

	public function detail_edit($id) 
	{
		$data = array(
			'info' => 'edit',
            'title' => 'Edit Transaksi'
        );
		$this->slice->view('pages.transaksi.detail_form', $data);
	}
}
