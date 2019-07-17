<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	
	public function index()
	{
		$data_get = $this->transaksi_model->get_list();
		$data = array(
			'info' => $data_get,
			'activeMenu' => 'transaksi',
            'title' => 'Transaksi'
        );
		$this->slice->view('entities.manager.pages.transaksi.index', $data);
	}

	public function show($id) 
	{
		$data_get1 = $this->transaksi_model->get_data($id);
		$data_get2 = $this->transaksi_model->get_list_child($id);
		$data = array(
			'info1' => $data_get1,
			'info2' => $data_get2,
            'title' => 'Tampil Transaksi #'.$id
        );
		$this->slice->view('entities.manager.pages.transaksi.show', $data);
	}

}
