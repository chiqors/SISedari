<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {
	
	public function index()
	{
		$data = array(
			'activeMenu' => 'entities',
			'activeSubMenu' => 'pengguna',
            'title' => 'Pengguna'
        );
		$this->slice->view('entities.manager.pages.pengguna.index', $data);
	}

	public function create() {
		$data = array(
            'title' => 'Create Pengguna'
        );
		$this->slice->view('entities.manager.pages.pengguna.form', $data);
	}

	public function show($id) {
		$data = array(
            'title' => 'Show Pengguna'
        );
		$this->slice->view('entities.manager.pages.pengguna.show', $data);
	}

	public function edit($id) {
		$data = array(
			'info' => 'edit',
            'title' => 'Edit Pengguna'
        );
		$this->slice->view('entities.manager.pages.pengguna.form', $data);
	}
}
