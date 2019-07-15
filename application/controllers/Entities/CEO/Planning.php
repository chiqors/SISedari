<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planning extends CI_Controller {
	
	public function index()
	{
		$data = array(
			'activeMenu' => 'planning',
            'title' => 'Planning'
        );
		$this->slice->view('entities.ceo.pages.planning.index', $data);
	}

	public function create() {
		$data = array(
            'title' => 'Tambah Planning'
        );
		$this->slice->view('entities.ceo.pages.planning.form', $data);
	}

	public function show($id) {
		$data = array(
            'title' => 'Tampil Planning'
        );
		$this->slice->view('entities.ceo.pages.planning.show', $data);
	}

	public function edit($id) {
		$data = array(
			'info' => 'edit',
            'title' => 'Ubah Planning'
        );
		$this->slice->view('entities.ceo.pages.planning.form', $data);
	}
}
