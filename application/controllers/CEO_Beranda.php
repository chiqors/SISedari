<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CEO_Beranda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->jabatan != 'CEO') {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data = array(
			'activeMenu' => 'beranda',
            'title' => 'Beranda'
        );
		$this->slice->view('entities.ceo.pages.beranda', $data);
	}
}
