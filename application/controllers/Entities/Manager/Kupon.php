<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kupon extends CI_Controller {
	
	public function index()
	{
		$data = array(
			'activeMenu' => 'kupon',
            'title' => 'Kupon'
        );
		$this->slice->view('entities.manager.pages.kupon.index', $data);
	}

	public function create() {
		$data = array(
            'title' => 'Create Kupon'
        );
		$this->slice->view('entities.manager.pages.kupon.form', $data);
	}

	public function edit($id) {
		$data = array(
			'info' => 'edit',
            'title' => 'Edit Kupon'
        );
		$this->slice->view('entities.manager.pages.kupon.form', $data);
	}
}
