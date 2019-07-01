<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kupon extends CI_Controller {
	
	public function index()
	{
		$data = array(
			'activeMenu' => 'entities',
			'activeSubMenu' => 'kupon',
            'title' => 'Kupon'
        );
		$this->slice->view('pages.kupon.index', $data);
	}

	public function create() {
		$data = array(
            'title' => 'Create Kupon'
        );
		$this->slice->view('pages.kupon.form', $data);
	}

	public function edit($id) {
		$data = array(
			'info' => 'edit',
            'title' => 'Edit Kupon'
        );
		$this->slice->view('pages.kupon.form', $data);
	}
}
