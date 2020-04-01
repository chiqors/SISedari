<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager_Beranda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->jabatan != 'Manager') {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data_get1 = $this->manager_model->get_list_rank_menu();
		$data = array(
			'info_rankmenu' => $data_get1,
			'activeMenu' => 'beranda',
			'title' => 'Beranda'
        );
		$this->slice->view('entities.manager.pages.beranda', $data);
	}
	
}
