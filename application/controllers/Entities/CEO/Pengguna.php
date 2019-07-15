<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {
	
	public function index()
	{
		$data = array(
			'activeMenu' => 'pengguna',
            'title' => 'Pengguna'
        );
		$this->slice->view('entities.ceo.pages.pengguna.index', $data);
	}

	public function create() {
		$data = array(
            'title' => 'Tambah Pengguna'
        );
		$this->slice->view('entities.ceo.pages.pengguna.form', $data);
	}

	public function show($id) {
		$data = array(
            'title' => 'Tampil Pengguna'
        );
		$this->slice->view('entities.ceo.pages.pengguna.show', $data);
	}

	public function edit($id) {
		$data = array(
			'info' => 'edit',
            'title' => 'Ubah Pengguna'
        );
		$this->slice->view('entities.ceo.pages.pengguna.form', $data);
	}
}
